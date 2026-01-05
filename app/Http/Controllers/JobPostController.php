<?php

namespace App\Http\Controllers;

use App\Models\job_post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobPostController extends Controller
{
    public function index(Request $request)
    {
        // Qidiruv parametrlari
        $search = $request->query('search');
        $title = $request->query('title'); // mashhur kategoriyalar uchun

        $query = job_post::query();

        // Umumiy qidiruv: lavozim nomi yoki tavsif bo‘yicha
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%")
                  ->orWhere('location', 'LIKE', "%{$search}%");
            });
        }

        // Mashhur kategoriyalar (masalan: ?title=sotuv-menejeri)
        if ($title) {
            $query->where('title', 'LIKE', "%{$title}%");
        }

        // Yangi e'lonlar yuqorida chiqishi uchun
        $jobs = $query->latest()->get();

        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'salary' => 'required|string',
            'work_time' => 'required|string',
            'location' => 'required|string'
        ]);

        job_post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'salary' => $request->salary,
            'work_time' => $request->work_time,
            'location' => $request->location
        ]);

        return redirect()->route('jobs.index')->with('success', 'Ish eʼloni muvaffaqiyatli qoʻshildi!');
    }

    public function show(job_post $job)
    {
        return view('jobs.show', compact('job'));
    }
}