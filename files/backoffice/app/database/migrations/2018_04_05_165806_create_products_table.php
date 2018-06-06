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
            $table->integer('user_id'); // many to one , verbonden met users, offered_by
            $table->timestamps(); // Datum dat product is gemaakt
            $table->integer('category_id'); // Verbonden met category one to many
            // 1 category kan meerdere producten bevatten.
            $table->softDeletes(); // Softdelete
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
