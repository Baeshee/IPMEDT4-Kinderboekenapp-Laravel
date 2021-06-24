<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index() {
        return view('test.index', [
            'users' => User::all(),
        ]);
    }

    public function show($id) {
        return view('test.show', [
            'user' => User::find($id),
        ]);
    }
}
