<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index() {
        $subs = Auth::user()->subordinates()->get();
        return view('main')->with([
            'user_id' => Auth::user()->id,
            'surname' => Auth::user()->surname,
            'name' => Auth::user()->name,
            'patronymic' => Auth::user()->patronymic,
            'subordinates' => $subs->count() == 0 ? null : $subs,
            'priorities' => Priority::all(),
            'statuses' => Status::all(),
        ]);
    }
}
