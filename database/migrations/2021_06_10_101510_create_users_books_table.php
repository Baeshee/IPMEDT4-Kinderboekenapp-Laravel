<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_books', function (Blueprint $table) {
            $table->id();
            $table->string('user_email')->nullable();
            $table->foreign('user_email')->references('email')->on('users');
            $table->bigInteger('book_isbn')->nullable();
            $table->foreign('book_isbn')->references('ISBN')->on('books');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_books', function (Blueprint $table) {
            $table->dropForeign('users_books_user_email_foreign');
            $table->dropForeign('users_books_book_isbn_foreign');
        });
        Schema::dropIfExists('users_books');
    }
}
