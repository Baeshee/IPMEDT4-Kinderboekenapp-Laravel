<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class AssignmentTemplate extends Model
{
    protected $table = 'assignment_template';

    public function getBook(){
        return $this->belongsTo(Book::class, 'book_isbn', 'ISBN');
    }
}
