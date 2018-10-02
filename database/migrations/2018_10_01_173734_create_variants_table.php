<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->bigInteger('product_id');
            $table->string('price');
            $table->string('sku');
            $table->integer('position');
            $table->string('inventory_policy');
            $table->string('compare_at_price')->nullable();
            $table->string('fulfillment_service');
            $table->string('inventory_management')->nullable();
            $table->string('option1')->nullable();
            $table->string('option2')->nullable();
            $table->string('option3')->nullable();
            $table->boolean('taxable');
            $table->string('barcode')->nullable();
            $table->string('grams');
            $table->string('image_id')->nullable();
            $table->string('inventory_quantity')->nullable();
            $table->decimal('weight')->nullable();
            $table->string('weight_unit')->nullable();
            $table->integer('inventory_item_id');
            $table->integer('old_inventory_quantity');
            $table->boolean('requires_shipping');
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
        Schema::dropIfExists('variants');
    }
}
