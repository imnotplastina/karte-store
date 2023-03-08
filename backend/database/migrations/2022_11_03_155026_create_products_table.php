<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title');
            $table->text('description');
            $table->text('content');
            $table->integer('price');
            $table->integer('count');

            $table->boolean('is_published')->default(true);

            $table->foreignId('category_id')
                ->nullable()
                ->index()
                ->constrained();

            $table->foreignId('group_id')
                ->nullable()
                ->index()
                ->constrained();

            $table->softDeletes();

            $table->string('preview_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
