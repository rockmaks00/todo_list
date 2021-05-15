<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(Request $request) {
        return view('main')->with([
            'surname' => Auth::user()->surname,
            'name' => Auth::user()->name,
            'patronymic' => Auth::user()->patronymic
        ]);
    }
}
