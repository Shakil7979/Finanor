<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailySavingsTable extends Migration
{
    public function up()
    {
        Schema::create('daily_savings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->decimal('amount', 10, 2); // Positive = saved, Negative = overspent
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('daily_savings');
    }
}
