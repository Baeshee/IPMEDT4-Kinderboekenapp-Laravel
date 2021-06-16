<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Assignment;
use App\Models\User;

class UserAssignment extends Model
{
    protected $table = 'user_assignments';

    public function getAssignment(){
        return $this->belongsTo(Assignment::class, 'assignment', 'assignment');
    }

    public function getUser(){
        return $this->belongsTo(User::class, 'user_email', 'email');
    }
}
