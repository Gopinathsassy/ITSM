<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('summary');
            $table->text('description');
            $table->string('level');
            $table->string('severity');
            $table->string('responsible');
            $table->string('status');
            $table->string('fileformat');
            $table->string('created_by');
            $table->string('assignedto');
            $table->timestamp('assignedat');
            $table->timestamp('acceptedat');
            $table->string('solution');
            $table->timestamp('completedat');
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
        Schema::dropIfExists('tickets');
    }
}
