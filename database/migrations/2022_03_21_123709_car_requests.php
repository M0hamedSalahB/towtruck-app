<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrequests', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('userlocation');
            $table->string('userphonenumber');
            $table->string('drivername')->nullable();
            $table->string('driverlocation')->nullable();
            $table->string('driverphonenumber')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('drivers');
    }
};
