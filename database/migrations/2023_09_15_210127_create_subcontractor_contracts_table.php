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
        Schema::create('subcontractor_contracts', function (Blueprint $table) {
            $table->id();
            $table->date('subcontractorContract_conclusionDate');
            $table->date('subcontractorContract_deadline');

            $table->unsignedBigInteger('consent_id');
            $table->unsignedBigInteger('subcontractor_offer_id');
            $table->string('employee_id');


            $table->foreign('consent_id')->references('id')->on('consents')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('subcontractor_offer_id')->references('id')->on('subcontractor_offers')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('employee_id')->references('employee_identificator')->on('employees')->onDelete('restrict')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcontractor_contracts');
    }
};
