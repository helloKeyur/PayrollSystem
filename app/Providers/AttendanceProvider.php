<?php

namespace App\Providers;

use App\Attendance;
use App\Observer\AttendanceObserver;
use Illuminate\Support\ServiceProvider;

class AttendanceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Attendance::observe(AttendanceObserver::class);
    }
}
