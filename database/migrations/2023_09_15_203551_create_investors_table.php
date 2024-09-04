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
        Schema::create('investors', function (Blueprint $table) {
            $table->id();

            $table->string('investor_name');
            $table->integer('investor_taxID');
            $table->string('investor_type');

            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('township_id');
            $table->unsignedBigInteger('address_id');

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('township_id')->references('id')->on('townships')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investors');
    }
};
