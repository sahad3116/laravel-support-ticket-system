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
        $connections = ['technical', 'billing', 'product', 'general', 'feedback'];

        foreach ($connections as $conn) {
            Schema::connection($conn)->create('tickets', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email');
                $table->string('subject');
                $table->text('message');
                $table->string('type'); 
                $table->enum('status', ['Pending', 'Noted'])->default('Pending');
                $table->text('note')->nullable(); 
                $table->timestamps();
            });
        }
    }


    public function down(): void
    {
        $connections = ['technical', 'billing', 'product', 'general', 'feedback'];

        foreach ($connections as $conn) {
            Schema::connection($conn)->dropIfExists('tickets');
        }

        Schema::dropIfExists('tickets');
    }
};
