<?php

namespace App\Http\Controllers;

use App\Models\job_post;  // <-- job_post (snake_case bilan)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobPostController extends Controller
{
    public function index()
    {
        $jobs = job_post::latest()->get();  // <-- job_post (kichik harflar bilan)
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
return view('jobs.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'salary' => 'required',
            'work_time' => 'required',
            'location' => 'required'
        ]);

        job_post::create([  // <-- job_post
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'salary' => $request->salary,
            'work_time' => $request->work_time,
            'location' => $request->location
        ]);

        return redirect()->route('jobs.index')->with('success', 'Ish qo‘shildi!');
    }

    public function show(job_post $job)  // <-- job_post
    {
        return view('jobs.show', compact('job'));
    }
}