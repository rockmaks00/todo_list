<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function get(Request $request) {
        $order = 'updated_at';
        $user_id = Auth::user()->id;
        $tasks = Task::where('responsible', $user_id)
            ->orWhere('creator', $user_id)
            ->with('status', 'priority', 'responsible')
            ->orderBy($order)
            ->get();
        return response()->json($tasks);
    }
}
