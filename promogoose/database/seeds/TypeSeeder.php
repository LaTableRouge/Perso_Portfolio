<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create( [
            'id'=>1,
            'libType'=>'Restaurant'
            ] );
            
                        
            
            Type::create( [
            'id'=>2,
            'libType'=>'Commerce'
            ] );
            
                        
            
            Type::create( [
            'id'=>3,
            'libType'=>'Bar'
            ] );
    }
}
