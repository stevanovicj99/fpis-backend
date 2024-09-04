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
        Schema::create('consents', function (Blueprint $table) {
            $table->id();

            $table->date('consent_date');
            $table->unsignedBigInteger('proposal_id');
            $table->string('employee_id');
            $table->unsignedBigInteger('investor_id');
            $table->foreign('proposal_id')->references('id')->on('proposals')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('employee_id')->references('employee_identificator')->on('employees')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('investor_id')->references('id')->on('investors')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consents');
    }
};
