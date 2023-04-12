<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name',190);
            $table->string('position',190);
            $table->string('department',190);
            $table->string('phone_office',100)->nullable();
            $table->string('inter_com',100)->nullable();
            $table->string('mobile_number',11);
            $table->text('address')->nullable();
            $table->text('image')->nullable();
            $table->string('nid',50)->nullable();
            $table->string('start_date',150)->nullable();
            $table->string('end_date',150)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('status',1)->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
