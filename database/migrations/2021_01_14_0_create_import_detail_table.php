<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_detail', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('imd_id');
            $table->unsignedInteger('imd_price')->comment('Giá mua # Giá mua mỗi sản phẩm, đơn vị Ngàn VND');
            $table->unsignedInteger('imd_priceExp')->comment('Giá bán dự kiến # Giá bán dự kiến mỗi sản phẩm, đơn vị Ngàn VND');
            $table->unsignedsmallInteger('imd_amount')->comment('Số lượng # Số lượng sản phẩm nhập');

            $table->unsignedInteger('pro_id');
            $table->unsignedBigInteger('bii_id');

            $table->foreign('pro_id') 
                    ->references('pro_id')->on('product') 
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');

            $table->foreign('bii_id') 
                    ->references('bii_id')->on('bill_import') 
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');

        });
        DB::statement("ALTER TABLE `import_detail` comment 'Chi tiết nhập # Chi tiết hóa đơn nhập'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('import_detail');
    }
}
