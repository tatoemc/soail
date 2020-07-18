<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_type',10)->default('emp');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('gender');
            $table->date('Bdate');
            $table->date('Edate')->nullable();
            $table->string('qualification');
            $table->string('snb');
            $table->string('snb_type');
            $table->integer('phone');
            $table->integer('phone2')->nullable();
            $table->string('state');
            $table->string('city');
            $table->string('unit');
            $table->integer('home_no');
            $table->text('filename')->nullable();
            $table->string('images')->nullable();

            
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
        Schema::dropIfExists('users');
    }
}
