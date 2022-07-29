<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name')->nullable();
            $table->string('lvl_1')->nullable();
            $table->string('lvl_2')->nullable();
            $table->string('lvl_3')->nullable();
            $table->string('price')->nullable();
            $table->string('priceSP')->nullable();
            $table->string('count')->nullable();
            $table->text('properties')->nullable();
            $table->string('purchases')->nullable();
            $table->string('unit')->nullable();
            $table->string('image')->nullable();
            $table->string('on_main_page')->nullable();
            $table->text('description')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
