<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('agent_type')->nullable();
            $table->enum('mode', array('appoint', 'become'))->default('appoint')->nullable();
            $table->string('gst',255)->nullable();
            $table->string('pan',255)->nullable();
            $table->string('annual_sale',200)->nullable();
            $table->date('dob')->nullable();
            $table->string('experience',100)->nullable();
            $table->string('education',200)->nullable();
            $table->string('logo',255)->nullable();
            $table->integer('category_id')->nullable();
            $table->text('sub_category_id')->nullable();
            $table->string('state_id',100)->nullable();
            $table->string('country_id',100)->nullable();
            $table->string('name')->nullable();
            $table->integer('user_id');
            $table->text('product_detail')->nullable();
            $table->text('target_customer')->nullable();
            $table->text('expected_work')->nullable();
            $table->text('cities_needed')->nullable();
            $table->text('remark')->nullable();
            $table->enum('status', array('0', '1'))->default('1');
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
        Schema::dropIfExists('sales');
    }
}
