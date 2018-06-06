<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    const TABLE = 'users';
    const PK = 'id'; // user_id
    //const FK = 'user_id';

    public function up()
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->increments(self::PK);
            $table->string('user_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
           // $table->string('cover_image');

            
            $table->string('address_street');
            $table->string('address_number');
            $table->string('address_postcode');
            $table->string('address_location'); // Later afleiden van u postcode.
            $table->string('address_country');
        
           // $table->string('status'); // 2 mogelijke waardes Actief of niet actief

            $table->string('password');
            //$table->rememberToken();
            $table->timestamps();
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
