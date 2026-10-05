<?php

use App\Enums\UserLevel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 100);
            $table->string('course_type', 25);
            $table->string('short_description', 25);
            $table->enum('user_level', array_column(UserLevel::cases(), 'value'));
            $table->string('thumbnail');
            $table->text('learning_outcome');
            $table->string('created_by', 100);
            $table->foreignUuid('org_id')->references('id')
            ->on('organizations')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
