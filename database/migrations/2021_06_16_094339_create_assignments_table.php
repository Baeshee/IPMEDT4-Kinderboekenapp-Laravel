<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('book_isbn');
            $table->foreign('book_isbn')->references('ISBN')->on('books');
            $table->integer('assignment_position');
            $table->string("assignment")->unique();
            $table->string('kind_of_assignment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assignments', function (Blueprint $table) {
            $table->dropForeign('assignments_book_isbn_foreign');
        });
        Schema::dropIfExists('assignments');
    }
}
