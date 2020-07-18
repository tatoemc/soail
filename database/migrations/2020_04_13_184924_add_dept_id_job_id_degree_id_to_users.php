<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeptIdJobIdDegreeIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            
            $table->unsignedBigInteger('dept_id')->unsigned()->index();
            $table->foreign('dept_id')->references('id')->on ('depts')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('job_id')->unsigned()->index();
            $table->foreign('job_id')->references('id')->on ('jobs')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('degree_id')->unsigned()->index();
            $table->foreign('degree_id')->references('id')->on ('degrees')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
