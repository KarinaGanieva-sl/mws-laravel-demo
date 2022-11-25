<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('reporter_id');
            $table->unsignedBigInteger('creator_id');
            $table->timestamp('creation_date')->useCurrent();
            $table->index('project_id', 'issue_project_idx');
            $table->foreign('project_id', 'issue_project_fk')->on('projects')->references('id');
            $table->foreign('reporter_id', 'issue_reporter_fk')->on('users')->references('id');
            $table->foreign('creator_id', 'issue_creator_fk')->on('users')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issues');
    }
};
