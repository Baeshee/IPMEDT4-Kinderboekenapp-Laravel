<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Assignment;
use App\Models\getAssignmentsTemplate;

class Book extends Model
{
    protected $table = 'books';

    public function getAssignments(){
        return $this->hasMany(Assignment::class, 'book_isbn', 'ISBN');
    }

    public function getAssignmentsTemplates(){
        return $this->hasMany(AssignmentTemplate::class, 'book_isbn', 'ISBN');
    }
}
