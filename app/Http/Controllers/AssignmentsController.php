<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;


class AssignmentsController extends Controller
{
    public function getAllAssignments(){
        $assignments = Assignment::all()->toJson(JSON_PRETTY_PRINT);
        return response($assignments, 200);
    }
    public function index() {
        return view('test.assignmentIndex', [
            'assignments' => Assignment::all(),
        ]);
    }

    public function show($id) {
        return view('test.assignmentIndex', [
            'assignment' => Assignment::find($id),
        ]);
    }
    



}
