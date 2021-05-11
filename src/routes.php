<?php

use Illuminate\Support\Facades\Route;

Route::resource('/api/changelogs', \Morsapt\Changelog\Http\Controllers\ChangelogController::class);
