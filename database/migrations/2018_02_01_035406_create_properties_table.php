<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('guid')->index();
            
            // location
            $table->string('location_desc')->nullable();
            $table->string('country_code')->index();
            $table->string('region')->index();
            $table->string('city')->index();
            $table->string('address');
            $table->string('zip')->index();

            // size of property
            $table->decimal('built_area',6,2) ; // XXXX.YY
            $table->decimal('land_area' ,6,2) ; 
            $table->enum   ('area_unit',['sqft','sqm'] ) ;
            
            // rooms
            $table->decimal('rooms'     ,6,2) ; // XXXX.YY
            $table->decimal('bed_rooms' ,6,2) ;
            $table->decimal('bath_rooms',6,2) ;

            // description
            $table->text('desc_short');
            $table->text('desc_full' );

            $table->timestamps();
        });
                       
       Schema::create('property_photos', function (Blueprint $table) {
            $table->increments('id');
                    
            $table->string('property_guid')->index();
                      
            $table->text   ( 'url'  );
            $table->text   ( 'desc' )->nullable();
            $table->integer( 'order')->unsigned();
                      
            $table->timestamps();
        });

       Schema::create('property_attributes', function (Blueprint $table) {
            $table->increments('id');
                      
            $table->string('property_guid')->index();
                      
            $table->string( 'name'  );
            $table->string( 'value' );
                      
            $table->string( 'group' )->index();
            $table->integer('order' )->unsigned();
                      
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
        Schema::dropIfExists('property_attributes');
        Schema::dropIfExists('property_photos');
        Schema::dropIfExists('properties');
    }
}
