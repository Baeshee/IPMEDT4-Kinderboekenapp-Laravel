<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAssignments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_assignments', function (Blueprint $table) {
            $table->id();
            $table->string('user_email');
            $table->foreign('user_email')->references('user_email')->on('users_books');
            $table->bigInteger('book_isbn');
            $table->foreign('book_isbn')->references('book_isbn')->on('users_books');

            $table->string('assignment');
            $table->foreign('assignment')->references('assignment')->on('assignments');
            $table->string('status');
            $table->string('answer_1')->nullable();
            $table->string('answer_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_assignments', function (Blueprint $table) {
            $table->dropForeign('user_assignments_user_email_foreign');
            $table->dropForeign('user_assignments_book_isbn_foreign');
            $table->dropForeign('user_assignments_assignment_foreign');
        });
        Schema::dropIfExists('user_assignments');
    }
}
