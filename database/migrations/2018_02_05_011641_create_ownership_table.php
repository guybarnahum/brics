<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnershipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ownership', function (Blueprint $table) {
                       
            $table->increments('id');
            $table->string( 'guid' )->index();
            
            $table->string ( 'property_guid' )->index();
            
            $table->integer( 'property_valuation' )->unsigned();
            $table->integer( 'amount_target' )->unsigned();
            $table->integer( 'amount_raised' )->unsigned();
            
            $table->string ( 'purpose' );
            $table->enum   ( 'pending', 'active', 'closed' )->index();
            
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
        Schema::dropIfExists('ownership');
    }
}
