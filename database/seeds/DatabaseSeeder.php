<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // users are first
        $this->call(UsersTableSeeder::class, 30);
        //$this->call(PropertiesTableSeeder::class, 10);
        //$this->call(PropertyPhotosTableSeeder::class, 200);
        //$this->call(PropertyAttributesTableSeeder::class, 200);

        $s = new ParserSeeder();
        
        $s->withFile ('database/seeds/Properties.txt')
          ->withModel('\App\Models\Property' )
          ->run();
        
        $s->withFile( 'database/seeds/PropertyAttributes.txt')
          ->withModel('\App\Models\PropertyAttribute' )
          ->run();

        $s->withFile( 'database/seeds/PropertyPhotos.txt')
          ->withModel('\App\Models\PropertyPhoto' )
          ->run();

        $s->withFile( 'database/seeds/BricsIcos.txt')
          ->withModel('\App\Models\BricsIco' )
          ->run();
/*
        $s->withFile( 'database/seeds/BricsWallets.txt')
          ->withModel('\App\Models\BricsWallet' )
          ->run();
*/
        // wallets are last
        $this->call(BricsWalletsTableSeeder::class, 10);

    }
    
    public function call($class, $extra = null)
    {
        $this->resolve($class)->run($extra);
        $this->command->info( "<info>Seeded:</info> $class");
    }
}

// ========================================================== class ParserSeeder

class ParserSeeder extends Seeder{
    
    private   $debug ;
    
    protected $file  ;
    protected $fmt   ;
    protected $table ;
    protected $msg   ;
    protected $model ;
    
    // ............................................................. __construct

    public function __construct()
    {
        $this->msg   = '';
        $this->debug = false;
        $this->fmt   = null;
        $this->table = null;
        $this->model = null;
    }
    
    public function withFile( $file )
    {
        $this->file = $file;
        //reset state of file parser
        $this->msg   = '';
        $this->debug = false;
        return $this;
    }
    
    public function withModel( $model, $reset_fmt_and_table = true )
    {
        $class = App::make($model);
        
        $this->model = $model;
        
        if ( $reset_fmt_and_table ){
            $this->fmt   = $class->getFillable();
            $this->table = $class->getTable();
        }
        
        return $this;
    }
    
    public function withFmt( $fmt )
    {
        $this->fmt = $fmt;
        return $this;
    }
    
    public function withTable( $table )
    {
        $this->table = $table;
        return $this;
    }
    
    // ..................................................................... log

    public function log( $msg )
    {
        $log_func = isset($this->command)? [$this->command,'info' ] : 'error_log';
        $log_func( $msg );
    }
    
    // .............................................................. is_comment
    
    protected function is_comment( $line )
    {
        if (  empty($line)       ) return true;
        if (  $line[0] == ';'    ) return true;
        if (  $line[0] == '#'    ) return true;
        
        if ( ($line[0] == '/' ) &&
             ($line[1] == '/' )  ) return true;
        
        // not a comment line
        return false;
    }
    
    protected function is_option( $line )
    {
        if (( $line[0] != '-' )||
            ( $line[1] != '-' ) ) return false;
        
        // its an option line, yay!
        $options = explode( '--', $line );
        
        foreach( $options as $option ){
            
            // skip 'false' options..
            $option = trim( $option);
            if (empty($option)) continue;
            
            switch( $option ){
                    
                case 'debug'      :
                case 'dbg'        :
                case 'verbose'    : $this->debug = true; break;
                    
                case 'dump_table' :
                    if ($this->debug ){
                        
                        $msg = '<info>ParserSeeder</info> - DB::table(' .
                                $this->table .
                                ')->delete()';
                        
                        $this->log( $msg );
                    }
                    DB::table( $this->table )->delete(); break;
                    break;
                    
                default:
                    $this->log('unknown option '.$option);
                    break;
            }
        }
        
        return true;
    }
    
    // ............................................................ process_line
    
    protected function process_line( $line )
    {
        $res   = array();
        $parts = explode( ':', $line );
        
        $ok = is_array($parts);
        if (!$ok) $res[ 'err' ] = 'syntax - line does not contain delimiter (:)';
        
        if ($ok){
            $num = count($parts);
            $ok = ( $num == count( $this->fmt ) );
            if (!$ok){
                $res[ 'err' ] ='systax - could not find parts in line (' . $num . ')' ;
            }
        }
        
        if ($ok){
            foreach( $parts as $ix => $part ){
                $name = $this->fmt[ $ix ];
                $res[ $name ] = trim( urldecode ( $part ) );
            }
        }
        
        return $res;
    }
    
    // ............................................................... get_lines
    
    protected function get_lines( $file )
    {
        $this->msg = '';
        
        $ok = ( false !== ($path = realpath( $file )));
        if (!$ok) $this->msg = $file . ' could not be located';
        
        if ($ok){
            $ok = file_exists( $path );
            if (!$ok) $this->msg = $path . ' does not exists';
        }
        
        $data = null;
        
        if ($ok){
            $ok = ( false !== ($data = file_get_contents( $path ) ) );
            if (!$ok) $this->msg =  $path . ' could not be read' ;
        }
        
        $lines = null;
        
        if ($ok){
            $lines = explode("\n", $data);
        }
        
        return $lines;
    }
    
    // ................................................................... parse
    
    protected function parse( $lines )
    {
        $ok = is_array( $this->fmt );
        if (!$ok ) $this->msg = 'invalid table row format';
        
        if ($ok ){
            $ok = is_array( $lines ) && ( count( $lines ) > 0 );
            if (!$ok) $this->msg = 'no lines found';
        }
        
        if ($ok){
            
            foreach( $lines as $ix => $line ){
                
                $line = trim( $line );
                
                // skip comments
                if ( $this->is_comment( $line ) ) continue;
                
                // process options and skip line
                if ( $this->is_option ( $line ) ) continue;
                
                // process lines
                $ds = $this->process_line( $line );
                
                $ok = !isset( $ds[ 'err' ] );
                if (!$ok){
                    $this->msg  = 'failed to process ' . $ix . ' line :\'' . $line . '\'';
                    $this->msg .= "\n" . $ds[ 'err' ];
                    break;
                }
                
                // debug output
                if ( $this->debug ){
                    $this->log( 'parse >> ' . $line );
                }
                
                // Create an db entry with $ds
                try{
                    $model_create = array($this->model, 'create');
                    $ok = is_callable( $model_create );
                    
                    if ($ok){
                        call_user_func( $model_create, $ds );
                    }
                    else{
                        $this->msg = $this->model . '::create is not callable';
                    }
                }
                catch( Exception $e ){
                    $this->msg = $e->getMessage();
                    $ok        = false;
                }
                
                if (!$ok){
                    break;
                }
            }
        }
        
        return $ok;
    }
    
    // ..................................................................... run
    
    public function run()
    {
        // get lines to process
        $lines = $this->get_lines( $this->file );
        $ok = is_array($lines) && (count( $lines ) > 0 );
        
        // do we have lines to process?
        if ($ok) $ok = $this->parse( $lines );
        
        // done!
        
        if ($ok){
            $this->msg .= 'seeding from ' . $this->file . ' successful!' ;
        }
        else{
            $this->msg .= "\n";
            $this->msg .= 'failed to process ' . $this->file;
        }
        
        $this->log( $this->msg );
    }
};
