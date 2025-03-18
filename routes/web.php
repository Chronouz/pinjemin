<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard/admin', function () {
    return view('dashboard.admin');
});

