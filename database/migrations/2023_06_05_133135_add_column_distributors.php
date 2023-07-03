<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnDistributors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('distributors', function (Blueprint $table) {
            $table->text("experience")->nullable()->after('gallery');
            $table->text("remark")->after('experience');
            $table->text("type_distributorship")->after('remark');
            $table->text("business_profile")->after('type_distributorship');
            $table->text("product_keyword")->after('business_profile');
            $table->text("investment_required")->after('product_keyword');
            $table->json("country_id")->nullable()->after('investment_required');
            $table->json("state_id")->nullable()->after('country_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('distributors', function (Blueprint $table) {
            //
        });
    }
}
