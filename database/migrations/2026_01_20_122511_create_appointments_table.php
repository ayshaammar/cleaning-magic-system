<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('patient_name');
            $table->string('patient_phone')->nullable();
            $table->text('complaint'); // وصف الحالة
            $table->date('date');
            $table->time('time');

            $table->enum('status', ['pending','approved','rejected'])->default('pending');
            $table->text('admin_note')->nullable(); // ملاحظة للطبيب
            $table->timestamp('reviewed_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
