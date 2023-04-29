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
        Schema::create('form_eights', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('name_slug')->nullable();
            $table->string('desi')->nullable();
            $table->string('dob')->nullable();
            $table->string('nid_no')->nullable();
            $table->string('phone')->nullable();
            $table->string('father_name')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('name_supouse')->nullable();
            $table->string('edu_quali')->nullable();
            $table->string('profession')->nullable();
            $table->string('job_des')->nullable();
            $table->string('service_status')->nullable();
            $table->string('remarks')->nullable();
            $table->string('form_date')->nullable();
            $table->string('to_date')->nullable();
            $table->string('total_year')->nullable();
            $table->text('time_for_api')->nullable();
            $table->string('complete_status')->nullable();
            $table->string('verified_form_eight')->nullable();
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
        Schema::dropIfExists('form_eights');
    }
};
