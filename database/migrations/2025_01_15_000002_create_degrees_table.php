<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('degrees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('category', 50)->nullable(); // e.g., Engineering, Commerce, Arts
            $table->timestamps();
        });

        // Insert degree data
        \DB::table('degrees')->insert([
            ['name' => 'B.Tech', 'category' => 'Engineering'],
            ['name' => 'B.E.', 'category' => 'Engineering'],
            ['name' => 'B.Sc IT', 'category' => 'Engineering'],
            ['name' => 'B.Sc Computer Science', 'category' => 'Engineering'],
            ['name' => 'BCA', 'category' => 'Engineering'],
            ['name' => 'MCA', 'category' => 'Engineering'],
            ['name' => 'M.Tech', 'category' => 'Engineering'],
            ['name' => 'B.Com', 'category' => 'Commerce'],
            ['name' => 'M.Com', 'category' => 'Commerce'],
            ['name' => 'BBA', 'category' => 'Management'],
            ['name' => 'MBA', 'category' => 'Management'],
            ['name' => 'BA', 'category' => 'Arts'],
            ['name' => 'MA', 'category' => 'Arts'],
            ['name' => 'Diploma', 'category' => 'Diploma'],
            ['name' => 'ITI', 'category' => 'Diploma'],
            ['name' => 'PhD', 'category' => 'Doctorate'],
            ['name' => 'Other', 'category' => 'Other'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('degrees');
    }
};