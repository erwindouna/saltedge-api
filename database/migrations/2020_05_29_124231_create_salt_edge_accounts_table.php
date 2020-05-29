<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaltEdgeAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salt_edge_accounts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger('account_id');
            $table->string('account_name');
            $table->integer('salt_edge_customer_id', false, true);
            $table->foreign('salt_edge_customer_id')->references('id')->on('salt_edge_customers')->onDelete('set null');
            $table->binary('object');
            $table->string('hash');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salt_edge_accounts');
    }
}
