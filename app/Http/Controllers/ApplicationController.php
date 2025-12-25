<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\job_post;  // JobPost emas, job_post
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Ariza topshirish
     */
    public function store(Request $request, job_post $job)
{
    if (Auth::id() === $job->user_id) {
        return back()->with('error', 'O‘z ishingizga ariza topshira olmaysiz!');
    }

    $alreadyApplied = Application::where('user_id', Auth::id())
                                 ->where('job_post_id', $job->id)
                                 ->exists();

    if ($alreadyApplied) {
        return back()->with('error', 'Siz allaqachon ariza topshirgansiz!');
    }

    // cover_letter ixtiyoriy qilamiz
    $request->validate([
        'cover_letter' => 'nullable|string|max:2000',  // required emas, nullable
    ]);

    Application::create([
        'user_id'      => Auth::id(),
        'job_post_id'  => $job->id,
        'cover_letter' => $request->cover_letter,  // bo‘sh bo‘lsa null saqlaydi
    ]);

    return back()->with('success', 'Ariza muvaffaqiyatli yuborildi!');
}
}