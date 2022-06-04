<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
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
            $table->string('name_ar', 191);
            $table->string('name_en', 191);
            $table->longText('description_ar');
            $table->longText('description_en');
            $table->string('image', 191)->nullable();
            $table->float('default_price')->default(0.0);
            $table->integer('status_id')->unsigned()->default(0);
            $table->string('slug', 191)->unique()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
