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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('creator_id');
            $table->timestamp('creation_date')->useCurrent();
            $table->index('owner_id', 'project_owner_idx');
            $table->foreign('owner_id', 'project_owner_fk')->on('users')->references('id');
            $table->foreign('creator_id', 'project_creator_fk')->on('users')->references('id');

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
        Schema::dropIfExists('projects');
    }
};
