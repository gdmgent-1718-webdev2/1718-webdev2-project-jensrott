<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    const TABLE = 'categories';
    const PK = 'id';
    const FK = 'category_id';

    public function up()
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->increments(self::PK);
            $table->timestamps();
            $table->string('name');
            $table->string('description');
            $table->string('picture');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
