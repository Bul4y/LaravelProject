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
            $table->id(); // Auto-incrementing primary key
            $table->string('asset_tag')->unique(); // Unique identifier (e.g., LAPTOP-001, PRINTER-A-005)
            $table->string('name'); // Common name of the asset (e.g., "Dell XPS 15", "Samsung Monitor")
            $table->string('serial_number')->unique()->nullable(); // Unique serial number, if available
            $table->string('model_name')->nullable(); // Specific model name (e.g., "XPS 15 9500", "U2719D")
            $table->date('purchase_date')->nullable(); // Date the asset was purchased
            $table->decimal('purchase_price', 10, 2)->nullable(); // Price of the asset
            // Status of the asset (e.g., deployed, in storage, maintenance, retired)
            $table->enum('status', ['Deployed', 'In Storage', 'Maintenance', 'Retired', 'Broken'])->default('In Storage');
            $table->text('notes')->nullable(); // Any additional notes about the asset
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('manufacturers');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('assets');
         Schema::dropIfExists('categories');
    }
};
