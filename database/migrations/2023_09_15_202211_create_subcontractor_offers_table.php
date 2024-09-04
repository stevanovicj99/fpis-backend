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
        Schema::create('subcontractor_offers', function (Blueprint $table) {
            $table->id();

            $table->string('subcontractorOffer_name');
            $table->date('subcontractorOffer_date');
            $table->integer('subcontractorOffer_price');
            $table->enum('subcontractor_status', ['created', 'updated', 'signed']);

            $table->unsignedBigInteger('subcontractor_id');
            $table->foreign('subcontractor_id')->references('id')->on('subcontractors')->onDelete('restrict')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcontractor_offers');
    }
};
