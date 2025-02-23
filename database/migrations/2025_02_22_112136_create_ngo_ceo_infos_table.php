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
        Schema::create('ngo_ceo_infos', function (Blueprint $table) {
            $table->id();
            $table->string('user_id',11)->nullable();
            $table->string('ceo_name')->nullable();
            $table->string('ceo_designation')->nullable();
            $table->string('ceo_signature')->nullable();
            $table->string('ceo_seal')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('ngo_ceo_infos');
    }
};
