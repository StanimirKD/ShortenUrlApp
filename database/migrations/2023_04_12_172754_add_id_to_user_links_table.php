<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
    {
        Schema::create('user_links', function (Blueprint $table) {
            $table->id(); // this will create an auto-incrementing primary key column
            $table->unsignedBigInteger('user_id');
            $table->string('short_link');
            $table->string('full_link');
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_links', function (Blueprint $table) {
            //
        });
    }
};
