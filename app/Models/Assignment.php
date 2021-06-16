<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\UserAssignment;

class Assignment extends Model
{
    protected $table = 'assignments';

    public function getBook(){
        return $this->belongsTo(Book::class, 'book_isbn', 'ISBN');
    }

    public function getUserAssignments(){
        return $this->hasMany(UserAssignment::class, 'assignment', 'assignment');
    }
}
