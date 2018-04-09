<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    const TABLE = 'products';
    const PK = 'id'; // product_id
    // const FK = 'product_id';
    public function up()
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->increments(self::PK);
            $table->string('name');
            $table->string('description');
            $table->string('picture'); // Later anders, geen string natuurlij
            $table->date('start_of_bid_period');
            $table->date('end_of_bid_period');
            $table->string('offered_by'); // many to one , verbonden met user en admins
            $table->timestamps(); // Datum dat product is gemaakt
            // $table->integer('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE);
    }
}
