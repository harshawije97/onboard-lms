<?php

use App\Enums\ContentType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('content_media', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('user_level', array_column(ContentType::cases(), 'value'));
            $table->text('content');
            $table->integer('min_completion_time')->default(1);
            $table->foreignUuid('course_id')->references('id')
                ->on('courses')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_media');
    }
};
