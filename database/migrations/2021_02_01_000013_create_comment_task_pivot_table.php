<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTaskPivotTable extends Migration
{
    public function up()
    {
        Schema::create('comment_task', function (Blueprint $table) {
            $table->unsignedBigInteger('task_id');
            $table->foreign('task_id', 'task_id_fk_3086636')->references('id')->on('tasks')->onDelete('cascade');
            $table->unsignedBigInteger('comment_id');
            $table->foreign('comment_id', 'comment_id_fk_3086636')->references('id')->on('comments')->onDelete('cascade');
        });
    }
}
