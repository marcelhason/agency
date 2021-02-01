<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTasksTable extends Migration
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id', 'client_fk_3086566')->references('id')->on('clients');
            $table->unsignedBigInteger('porject_type_id')->nullable();
            $table->foreign('porject_type_id', 'porject_type_fk_3086567')->references('id')->on('project_types');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_3086612')->references('id')->on('statuses');
        });
    }
}
