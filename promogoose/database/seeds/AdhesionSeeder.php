<?php

use Illuminate\Database\Seeder;
use App\Adhesion;

class AdhesionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Adhesion::create( [
            'promotion_id'=>1,
            'user_id'=>1,
            'avis_id'=>1
        ] );

        Adhesion::create( [
            'promotion_id'=>2,
            'user_id'=>1,
            'avis_id'=>NULL
        ] );

        Adhesion::create( [
            'promotion_id'=>3,
            'user_id'=>1,
            'avis_id'=>NULL
        ] );

        Adhesion::create( [
            'promotion_id'=>4,
            'user_id'=>1,
            'avis_id'=>2
        ] );

        Adhesion::create( [
            'promotion_id'=>11,
            'user_id'=>3,
            'avis_id'=>3
        ] );

        Adhesion::create( [
            'promotion_id'=>12,
            'user_id'=>3,
            'avis_id'=>4
        ] );

        Adhesion::create( [
            'promotion_id'=>13,
            'user_id'=>5,
            'avis_id'=>5
        ] );

        Adhesion::create( [
            'promotion_id'=>12,
            'user_id'=>4,
            'avis_id'=>6
        ] );

        Adhesion::create( [
            'promotion_id'=>14,
            'user_id'=>4,
            'avis_id'=>7
        ] );

        Adhesion::create( [
            'promotion_id'=>14,
            'user_id'=>5,
            'avis_id'=>8
        ] );

        Adhesion::create( [
            'promotion_id'=>15,
            'user_id'=>5,
            'avis_id'=>9
        ] );

        Adhesion::create( [
            'promotion_id'=>16,
            'user_id'=>3,
            'avis_id'=>10
        ] );

        Adhesion::create( [
            'promotion_id'=>17,
            'user_id'=>3,
            'avis_id'=>11
        ] );

        Adhesion::create( [
            'promotion_id'=>17,
            'user_id'=>4,
            'avis_id'=>12
        ] );

        Adhesion::create( [
            'promotion_id'=>17,
            'user_id'=>5,
            'avis_id'=>13
        ] );
        
    }
}
