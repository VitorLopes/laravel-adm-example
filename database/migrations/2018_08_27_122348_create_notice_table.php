<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('body');
            $table->integer('credit_id', false, true);
            $table->string('photocover', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('credit_id')
                    ->references('id')
                    ->on('credits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notices');
    }
}
