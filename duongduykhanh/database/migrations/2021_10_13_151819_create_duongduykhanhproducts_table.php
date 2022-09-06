<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateDuongduykhanhproductsTable extends Migration
{
    use SoftDeletes;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duongduykhanhproducts', function (Blueprint $table) {
            $table->id();
            $table->string('productName',100);
            $table->string('slug',100);
            $table->bigInteger('catId')->unsigned();
            $table->bigInteger('brandId')->unsigned();
            $table->mediumText('detail');
            $table->float('price',10,2);
            $table->float('salePrice',10,2);
            $table->string('image',100);
            $table->tinyInteger('status')->unsigned()->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('duongduykhanhproducts');
    }
}
