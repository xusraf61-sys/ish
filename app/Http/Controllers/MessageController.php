<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MessageController extends Controller
{
    /**
     * Suhbatlar ro'yxati — faqat suhbat bo'lgan userlar + oxirgi xabar bilan
     */
    public function index()
    {
        $currentUserId = Auth::id();

        $users = User::query()
            ->select('users.id', 'users.name')
            ->addSelect([
                'last_message' => Message::select('message')
                    ->whereColumn('sender_id', 'users.id')
                    ->where('receiver_id', $currentUserId)
                    ->orWhereColumn('receiver_id', 'users.id')
                    ->where('sender_id', $currentUserId)
                    ->orderByDesc('created_at')
                    ->limit(1),

                'last_message_time' => Message::select('created_at')
                    ->whereColumn('sender_id', 'users.id')
                    ->where('receiver_id', $currentUserId)
                    ->orWhereColumn('receiver_id', 'users.id')
                    ->where('sender_id', $currentUserId)
                    ->orderByDesc('created_at')
                    ->limit(1)
            ])
            ->where(function ($query) use ($currentUserId) {
                $query->whereExists(function ($sub) use ($currentUserId) {
                    $sub->select(DB::raw(1))
                        ->from('messages')
                        ->whereColumn('sender_id', 'users.id')
                        ->where('receiver_id', $currentUserId);
                })
                ->orWhereExists(function ($sub) use ($currentUserId) {
                    $sub->select(DB::raw(1))
                        ->from('messages')
                        ->whereColumn('receiver_id', 'users.id')
                        ->where('sender_id', $currentUserId);
                });
            })
            ->where('users.id', '!=', $currentUserId)
            ->orderByDesc('last_message_time')
            ->get();

        return view('messages.index', compact('users'));
    }

    /**
     * Bitta foydalanuvchi bilan suhbatni ko'rsatish
     */
    public function show($userId)
    {
        try {
            $receiver = User::select('id', 'name')->findOrFail($userId);
        } catch (ModelNotFoundException $e) {
            abort(404, 'Foydalanuvchi topilmadi');
        }

        // O'zi bilan suhbat ochishni oldini olish
        if ($userId == Auth::id()) {
            return redirect()->route('messages.index')
                             ->with('error', 'O‘zingiz bilan suhbatlasha olmaysiz!');
        }

        $messages = Message::where(function ($q) use ($userId) {
            $q->where('sender_id', Auth::id())
              ->where('receiver_id', $userId);
        })->orWhere(function ($q) use ($userId) {
            $q->where('sender_id', $userId)
              ->where('receiver_id', Auth::id());
        })
        ->with(['sender', 'receiver'])
        ->orderBy('created_at', 'asc')
        ->get();

        return view('messages.show', compact('messages', 'receiver'));
    }

    /**
     * Yangi xabar yuborish
     */
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id|different:' . Auth::id(),
            'message'     => 'required|string|min:1|max:2000',
        ]);

        Message::create([
            'sender_id'   => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message'     => trim($request->message),
            'job_id'      => null,
        ]);

        return back()->with('success', 'Xabar muvaffaqiyatli yuborildi!');
    }
}