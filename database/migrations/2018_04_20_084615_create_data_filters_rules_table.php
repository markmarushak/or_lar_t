<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataFiltersRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_filters_rules', function (Blueprint $table) {
            $table->increments('data_filters_rules_id');
            $table->string('domain', 100);
            $table->string('category', 100);
            $table->string('source', 100);
            $table->enum('type', ['email']);


            $table->enum('edit', ['edit']);

            $table->enum('status', ['active'], ['offline'], ['disabled']);
            $table->string('country', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_filters_rules');
    }
}
