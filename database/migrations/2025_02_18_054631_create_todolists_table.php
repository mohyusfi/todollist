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

        Schema::create('teams', function(Blueprint $table){
            $table->id();
            $table->string('name', 100)->nullable(false);
            $table->unsignedBigInteger('owner_id')->nullable(false);
            $table->timestamps();
            $table->foreign('owner_id', 'fk_owner_id')->references('id')->on('users')->onDelete('CASCADE');
        });


        Schema::create('todolists', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200)->nullable(false);
            $table->text('description')->nullable();
            $table->enum('status', ['to-do', 'in-progress', 'done'])->default('to-do');
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
            $table->date('deadline')->nullable();
            $table->unsignedBigInteger('created_by')->nullable(false);
            $table->unsignedBigInteger('team_id')->nullable();
            $table->timestamps();
            $table->foreign('created_by', 'fk_created_by')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('team_id','fk_team_id')->references('id')->on('teams')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
        Schema::dropIfExists('todolists');
    }
};
