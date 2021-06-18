<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignments;


class AssignmentsController extends Controller
{
    public function getAllAssignments(){
        $assignments = Assignment::all()->toJson(JSON_PRETTY_PRINT);
        return response($assignments, 200);
    }
}
