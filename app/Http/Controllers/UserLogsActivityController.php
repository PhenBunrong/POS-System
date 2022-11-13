<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class UserLogsActivityController extends Controller
{
    public function activity(){
        $activity = Activity::all();
        return view('users.activity_log')->with('activity', $activity);
    }
}
