<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});
// Display All Jobs
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->cursorPaginate(3);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});
// Create a Job
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Show a Job
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', [
        'job' => $job]);
});

// Store a Job
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});
// Edit a Job
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', [
        'job' => $job]);
});

// Update a Job
Route::patch('/jobs/{id}', function ($id) {
    //validate
    //authorize
    //update
    //and persist
    //redirect to the job page
});

// Destroy a Job
Route::delete('/jobs/{id}', function ($id) {

});



Route::get('/contact', function () {
    return view('contact');
});
