<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->datetime('start_date')->nullable();
            $table->datetime('deadtime')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->decimal('costs', 15, 2)->nullable();
            $table->boolean('invoice')->default(0)->nullable();
            $table->boolean('paid')->default(0)->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
