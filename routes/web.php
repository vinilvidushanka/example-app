<?php

use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Models\Job;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canRegister' => Features::enabled(Features::registration()),
//     ]);
// })->name('home');





Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/',function(){
    return  view('home');
});

Route::get('/jobs',function() {
    return  view('jobs',[
        'jobs' => Job::all()
    ]);
});

Route::get('/jobs/{id}',function($id){

        $job = Job::find($id);

    return  view('job',['job' => $job]);
});

Route::get('/contact',function(){
    return  view('/contact');
});

require __DIR__.'/settings.php';
