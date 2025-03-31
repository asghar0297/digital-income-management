<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranscationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transcations', function (Blueprint $table) {
            $table->id();
            $table->date('date')->default(Carbon::now());
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('account_id');
            $table->decimal('amount',12,2)->default(0.00);
            $table->enum('type', ['income', 'expense', 'transfer'])->nullable(); 
            $table->mediumText('description')->nullable();
            $table->softdeletes();
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null'); // category_id -> categories table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // user_id -> users table
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade'); // account_id -> accounts table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transcations');
    }
}
