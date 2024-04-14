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
        Schema::create('education', function (Blueprint $table) {
            $table->id();

            
            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');

            $table->string('name');
            $table->string('level');
            $table->string('country');
            $table->string('city');
            $table->date('start_educate');
            $table->date('end_educate');
            $table->text('details');
            $table->softDeletes();
            $table->boolean('is_currently_educate')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
