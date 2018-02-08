<?php
    
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brics_icos', function (Blueprint $table) {
                       
            $table->increments('id');
            $table->string( 'guid' )->unique();

            // shares offering info
            $table->string ( 'desc' );
            $table->string ( 'purpose' );

            $table->enum   ( 'status', ['pending', 'active', 'closed'] )->index();
            $table->string ( 'property_guid' )->index();

            // valuation of property as cost basis
            $table->integer( 'property_valuation' )->unsigned();
            $table->string ( 'property_valuation_currency' )->default( 'usd' );
            $table->date   ( 'property_valuation_date' );

            // number of brics allocated and circulated
            $table->integer( 'ico_total_value'  )->unsigned();
            $table->integer( 'brics_allocated'  )->unsigned();
            $table->integer( 'brics_circulated' )->unsigned();

            $table->timestamps();
        });

        Schema::create('brics_wallets', function (Blueprint $table) {
                       
            $table->increments('id');
            $table->string( 'guid' )->unique();

            // user
            $table->string ( 'user_guid' )->index;

            // shares offering
            $table->string ( 'ico_guid' )->index;

            // bric and cost basis
            $table->decimal( 'brics'     , 16,8 ); // amount of brics
            $table->decimal( 'cost_basis', 16,8 ); // amount paid for brics
            $table->string ( 'cost_currency' )->default( 'usd' );

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
        Schema::dropIfExists('brics_wallets');
        Schema::dropIfExists('brics_icos');
    }
}
