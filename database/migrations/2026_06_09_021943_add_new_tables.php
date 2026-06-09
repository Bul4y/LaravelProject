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
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('url')->nullable();
            $table->string('support_url')->nullable();
            $table->string('support_phone')->nullable();
            $table->string('support_email')->nullable();
            $table->timestamps();
        });

        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('address')->nullable();
            $table->timestamps();
        });

        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('asset_tag')->unique();
            $table->string('name');
            $table->string('serial_number')->unique()->nullable();
            $table->string('model_name')->nullable();
            $table->date('purchase_date')->nullable();
            $table->decimal('purchase_price',10,2)->nullable();
            $table->enum('status', ['Deployed','In-Storage', 'Maintenance', 'Retired', 'Broken'])->default('In-Storage');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('manufacturers');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('assets');
    }
};
