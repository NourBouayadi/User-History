<?php

namespace App\Http\Controllers;

use App\ActivityLog;
use Illuminate\Http\Request;


class ActivityLogController extends Controller
{

    public function index()
    {

        $activity_logs = ActivityLog::paginate(3);

        return view('user.activity', compact(['activity_logs']));
    }
}
