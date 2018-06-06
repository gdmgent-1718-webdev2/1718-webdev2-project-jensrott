<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    const TABLE = 'bids';
    const PK = 'id'; // bid_id
    //const FK = 'bid_id'

    public function up()
    {
        // Het laatste bod in deze tabel is aan de persoon die heeft gewonnen.
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->increments(self::PK);
            $table->timestamps();
            $table->date('date'); // Updates every time someone makes a new bid
            $table->integer('user_id'); // We see which user made a bid
            $table->integer('product_id'); // We see for everyone product
            $table->integer('value'); // Value of the last bid, updated every time
            $table->string('status'); // Accepted, Pending, Declined ; reflects if the auction is still running or if the product is finally sold
            
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
