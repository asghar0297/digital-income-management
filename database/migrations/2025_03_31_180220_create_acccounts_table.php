<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->string('name', 100); // Account name
            $table->enum('account_type', ['cash', 'bank', 'credit_card', 'digital_wallet', 'investment','saving', 'other']); // Account type
            $table->decimal('initial_balance', 12, 2)->default(0.00); // Starting balance
            $table->decimal('current_balance', 12, 2)->default(0.00); // Current balance
            $table->string('currency', 3)->default('USD'); // Currency code (USD, EUR, etc.)
            $table->text('description')->nullable(); // Optional description
            $table->boolean('is_active')->default(true); // Active status
            $table->softDeletes();
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
