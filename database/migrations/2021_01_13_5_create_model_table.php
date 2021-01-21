<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->Increments('mod_id');
            $table->string('mod_name', 100);
            $table->timestamp('mod_created')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo dòng sản phẩm');
            $table->timestamp('mod_updated')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật thông tin dòng sản phẩm gần nhất');
            $table->unsignedSmallInteger('mnf_id');
            
            $table->foreign('mnf_id') 
                    ->references('mnf_id')->on('manufacture') 
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `models` comment 'Dòng sản phẩm # Dòng sản phẩm: Galaxy Note, Galaxy S, ...'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('models');
    }
}