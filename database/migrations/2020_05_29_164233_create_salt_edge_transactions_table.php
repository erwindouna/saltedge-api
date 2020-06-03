<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaltEdgeTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salt_edge_transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger('salt_edge_transaction_id', false, true);
            $table->bigInteger('salt_edge_account_id', false, true);
            $table->foreign('salt_edge_account_id')->references('id')->on('salt_edge_accounts')->onDelete('set null');
            $table->longText('object');
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
        Schema::dropIfExists('salt_edge_transactions');
    }
}
