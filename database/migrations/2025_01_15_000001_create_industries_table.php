<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('industries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->timestamps();
        });

        // Insert industry data
        \DB::table('industries')->insert([
            ['name' => 'Information Technology', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Software Development', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Banking & Financial Services', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Healthcare & Pharmaceuticals', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Education & Training', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Manufacturing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Retail & E-commerce', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Real Estate & Construction', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hospitality & Tourism', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Transportation & Logistics', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Telecommunications', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Media & Entertainment', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Automobile', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'BPO & Customer Service', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Consulting', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Others', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('industries');
    }
};