<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_template', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('book_isbn');
            $table->foreign('book_isbn')->references('ISBN')->on('books');
            $table->text('assignment');
            $table->string('kind_of_assignment');
            $table->string('chapters');
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
        Schema::table('assignment_template', function (Blueprint $table) {
            $table->dropForeign('assignments_book_isbn_foreign');
        });
        Schema::dropIfExists('assignment_template');
    }
}
