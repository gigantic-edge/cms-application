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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->string('featured_image');
            $table->integer('ranking')->length(11);
            $table->enum('is_featured_article', ['0', '1'])->default('0')->comment('0=No,1=Yes');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('is_deleted', ['0', '1'])->default('0')->comment('0=No,1=Yes');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
