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

            $table->string('assignment_1');
            $table->foreign('assignment_1')->references('assignment_1')->on('assignments');
            $table->string('status_as_1');
            $table->string('answer_as_1')->nullable();
            $table->string('answer_as_1_opt')->nullable();

            $table->string('assignment_2');
            $table->foreign('assignment_2')->references('assignment_2')->on('assignments');
            $table->string('status_as_2');
            $table->string('answer_as_2')->nullable();
            $table->string('answer_as_2_opt')->nullable();
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
            $table->dropForeign('user_assignments_assignment_1_foreign');
            $table->dropForeign('user_assignments_assignment_2_foreign');
        });
        Schema::dropIfExists('user_assignments');
    }
}
