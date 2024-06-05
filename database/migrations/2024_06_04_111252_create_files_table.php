<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company');
            $table->string('city');
            $table->string('country');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('email');
            $table->string('subscription_data');
            $table->string('website');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
