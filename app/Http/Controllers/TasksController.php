<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function get() {
        $user_id = Auth::user()->id;
        $tasks = Task::where('responsible', $user_id)
            ->orWhere('creator', $user_id)
            ->with('status', 'priority', 'responsible')
            ->orderByDesc('updated_at')
            ->get();
        return response()->json($tasks);
    }

    public function create(Request $request) {
        $valid = $request->validate([
            "task-title" => "required|between:1,20",
            "task-description" => "required|between:1,255",
            "task-deadline" => "required|date",
            "task-priority" => "required|integer",
            "task-responsible" => "required|integer",
        ]);

        $title = $request->input("task-title");
        $desc = $request->input("task-description");
        $deadline = $request->input("task-deadline");
        $priority = $request->input("task-priority");
        $responsible = $request->input("task-responsible");

        $p_model = Priority::findOrFail($priority);
        $r_model = Auth::user()->subordinates()->findOrFail($responsible);

        Task::create([
            'header' => $title,
            'description' => $desc,
            'deadline' => $deadline,
            'priority' => $p_model->id,
            'status' => 1,
            'creator' => Auth::user()->id,
            'responsible' => $r_model->id
        ]);

        return back();
    }

    public function update(Request $request) {
        $valid = $request->validate([
            "update-id" => "required|integer",
            "update-title" => "sometimes|required|between:1,20",
            "update-description" => "sometimes|required|between:1,255",
            "update-deadline" => "sometimes|required|date",
            "update-priority" => "sometimes|required|integer",
            "update-responsible" => "sometimes|required|integer",
            "update-status" => "required|integer",
        ]);

        $user_id = Auth::user()->id;
        $task_id = $request->input("update-id");
        $status = $request->input("update-status");
        $task = Task::find($task_id);
        if($task->responsible()->first()->id === $user_id) {
            $edit = Task::find($task_id);
            $edit->status = $status;
            $edit->save();
            return back();
        }
        if($task->creator()->first()->id === $user_id) {
            $edit = Task::find($task_id);
            $edit->header = $request->input("update-title");
            $edit->description = $request->input("update-description");
            $edit->deadline = $request->input("update-deadline");
            $edit->priority = $request->input("update-priority");
            $edit->status = $status;
            $edit->save();
            return back();
        }
        return back(500);
    }
}
