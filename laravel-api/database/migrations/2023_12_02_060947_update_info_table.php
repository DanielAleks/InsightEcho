<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info', function (BluePrint $table) {
            $table->string('title')->nullable();
            $table->json('suppliers')->nullable();
            $table->json('sellingPrice')->nullable();
            $table->json('costs')->nullable();
            $table->json('links')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('research', function (BluePrint $tabe) {
            $table->dropColumn(['category']);
        });
    }
}
