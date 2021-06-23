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
            $table->string('user_email');
            $table->foreign('user_email')->references('user_email')->on('users_books');
            $table->bigInteger('book_isbn');
            $table->foreign('book_isbn')->references('book_isbn')->on('users_books');
            $table->text('assignment');
            $table->string('assignmentChild1')->nullable();
            $table->string('assignmentChild2')->nullable();
            $table->string('assignmentChild3')->nullable();
            $table->string('kind_of_assignment');
            $table->string('status')->nullable();
            $table->string('chapters');
            $table->string('answer_1')->nullable();
            $table->string('answer_2')->nullable();
            $table->string('answer_3')->nullable();
            $table->string('answer_4')->nullable();
            $table->string('correct_answer_1')->nullable();
            $table->string('correct_answer_2')->nullable();
            $table->string('correct_answer_3')->nullable();
            $table->string('correct_answer_4')->nullable();
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
            $table->dropForeign('assignments_user_email_foreign');
            $table->dropForeign('assignments_book_isbn_foreign');
        });
        Schema::dropIfExists('assignments');
    }
}
