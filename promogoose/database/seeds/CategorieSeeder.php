<?php

use Illuminate\Database\Seeder;
use App\Categorie;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorie::create( [
            'id'=>1,
            'libCat'=>'Italien',
            'type_id'=>1
        ] );

			

        Categorie::create( [
            'id'=>2,
            'libCat'=>'Chinois',
            'type_id'=>1
        ]);

			

        Categorie::create( [
            'id'=>3,
            'libCat'=>'Grande Surface',
            'type_id'=>2
        ]);

			

        Categorie::create( [
            'id'=>4,
            'libCat'=>'Coiffeur',
            'type_id'=>2
        ] );

			

        Categorie::create( [
            'id'=>5,
            'libCat'=>'Boulangerie',
            'type_id'=>2
        ] );

        Categorie::create( [
            'id'=>6,
            'libCat'=>'Tourton',
            'type_id'=>1
        ] );

        Categorie::create( [
            'id'=>7,
            'libCat'=>'Fast-Food',
            'type_id'=>1
        ] );
    }
}
