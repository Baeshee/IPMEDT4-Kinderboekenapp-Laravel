<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
      		      ->constrained()
      		      ->onUpdate('cascade')
      		      ->onDelete('cascade');
            $table->string('value', 500);
            $table->string('jti', 50)->unique();
            $table->string('type', 15);
            $table->bigInteger('pair')->nullable();
            $table->string('status', 20)->default('issued');
            $table->json('payload');
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
        Schema::dropIfExists('tokens');
    }
}