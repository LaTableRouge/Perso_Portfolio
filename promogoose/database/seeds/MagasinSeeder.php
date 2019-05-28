<?php

use Illuminate\Database\Seeder;
use App\Magasin;

class ShopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Magasin::create( [
        'id'=>1,
        'nomMag'=>'Black Lion',
        'ad1Mag'=>'1 Rue Amédée Para',
        'ad2Mag'=>'05000 Gap',
        'latMag'=>'44.5583',
        'longMag'=>'6.07767',
        'telMag'=>'061235678',
        'mailMag'=>'magasin@mail.fr',
        'siret'=>513842,
        'photo1Mag'=>'img/magasins/the_black_lions_gap.jpg',
        'photo2Mag'=>NULL,
        'type_id'=>3,
        'categorie_id'=>NULL,
        'commercant_id'=>2,
        'ville_id'=>1819
        ] );

                    

        Magasin::create( [
        'id'=>2,
        'nomMag'=>'La Fée Verte',
        'ad1Mag'=> '23 Place Thiars',
        'ad2Mag'=>'13001 Marseille',
        'latMag'=>'43.2931',
        'longMag'=>'5.37311',
        'telMag'=>'061235678',
        'mailMag'=>'magasin@mail.fr',
        'siret'=>513842,
        'photo1Mag'=>'img/magasins/lafeeverte.jpeg',
        'photo2Mag'=>NULL,
        'type_id'=>3,
        'categorie_id'=>NULL,
        'commercant_id'=>2,
        'ville_id'=>4440
        ] );

                    

        Magasin::create( [
        'id'=>3,
        'nomMag'=>'Baba\'s Bar',
        'ad1Mag'=> '21 avenue Jean Jaurès',
        'ad2Mag'=>'13100 Aix en Provence',
        'latMag'=>'43.5326',
        'longMag'=>'5.44626',
        'telMag'=>'061235678',
        'mailMag'=>'magasin@mail.fr',
        'siret'=>513842,
        'photo1Mag'=>'img/magasins/babasbar.jpg',
        'photo2Mag'=>NULL,
        'type_id'=>3,
        'categorie_id'=>NULL,
        'commercant_id'=>2,
        'ville_id'=>4421
        ] );

                    

        Magasin::create( [
        'id'=>4,
        'nomMag'=>'Le rubis',
        'ad1Mag'=> '25 rue Vauban',
        'ad2Mag'=>'69006 Lyon',
        'latMag'=>'45.765',
        'longMag'=>'4.84421',
        'telMag'=>'061235678',
        'mailMag'=>'magasin@mail.fr',
        'siret'=>513842,
        'photo1Mag'=>'img/magasins/lerubis.jpg',
        'photo2Mag'=>NULL,
        'type_id'=>3,
        'categorie_id'=>NULL,
        'commercant_id'=>2,
        'ville_id'=>28153
        ] );

                    

        Magasin::create( [
        'id'=>5,
        'nomMag'=>'Le Doreur',
        'ad1Mag'=> '2 rue des carmelites',
        'ad2Mag'=>'44000 Nantes',
        'latMag'=>'47.2164',
        'longMag'=>'-1.55139',
        'telMag'=>'061235678',
        'mailMag'=>'magasin@mail.fr',
        'siret'=>513842,
        'photo1Mag'=>'img/magasins/doreur.jpg',
        'photo2Mag'=>NULL,
        'type_id'=>3,
        'categorie_id'=>NULL,
        'commercant_id'=>2,
        'ville_id'=>16756
        ] );

        Magasin::create( [
        'id'=>6,
        'nomMag'=>'Dick Turpin\'s',
        'ad1Mag'=> '72 Rue du Loup',
        'ad2Mag'=>'33000 Bordeaux',
        'latMag'=>'44.8379',
        'longMag'=>'-0.574817',
        'telMag'=>'061235678',
        'mailMag'=>'magasin@mail.fr',
        'siret'=>513842,
        'photo1Mag'=>'img/magasins/dickturpins.jpg',
        'photo2Mag'=>NULL,
        'type_id'=>3,
        'categorie_id'=>NULL,
        'commercant_id'=>2,
        'ville_id'=>12679
        ] );

        Magasin::create( [
            'id'=>7,
            'nomMag'=>'Papi Ours',
            'ad1Mag'=> '16 Rue Perolière',
            'ad2Mag'=>'05000 Gap',
            'latMag'=>'44.560349',
            'longMag'=>'6.079971',
            'telMag'=>'061235678',
            'mailMag'=>'magasin@mail.fr',
            'siret'=>513842,
            'photo1Mag'=>'img/magasins/papiours.jpg',
            'photo2Mag'=>NULL,
            'type_id'=>1,
            'categorie_id'=>6,
            'commercant_id'=>2,
            'ville_id'=>1819
            ] );

        Magasin::create( [
            'id'=>8,
            'nomMag'=>'Chicken Vil',
            'ad1Mag'=> '31 Boulevard de la Libération',
            'ad2Mag'=>'05000 Gap',
            'latMag'=>'44.560681',
            'longMag'=>'6.078095',
            'telMag'=>'061235678',
            'mailMag'=>'magasin@mail.fr',
            'siret'=>513842,
            'photo1Mag'=>'img/magasins/chickenvil.jpeg',
            'photo2Mag'=>'img/magasins/chickenvilmenu.jpg',
            'type_id'=>1,
            'categorie_id'=>7,
            'commercant_id'=>2,
            'ville_id'=>1819
            ] );

        Magasin::create( [
            'id'=>9,
            'nomMag'=>'Arthur\'s',
            'ad1Mag'=> '1 Place Frédéric Euzières',
            'ad2Mag'=>'05000 Gap',
            'latMag'=>'44.556682',
            'longMag'=>'6.077121',
            'telMag'=>'061235678',
            'mailMag'=>'magasin@mail.fr',
            'siret'=>513842,
            'photo1Mag'=>'img/magasins/arthurs.jpg',
            'photo2Mag'=>'img/magasins/arthursmenu.jpg',
            'type_id'=>1,
            'categorie_id'=>7,
            'commercant_id'=>2,
            'ville_id'=>1819
                ] );

        Magasin::create( [
            'id'=>10,
            'nomMag'=>'Galerie Géant',
            'ad1Mag'=> '28 Boulevard d\'Orient',
            'ad2Mag'=>'05000 Gap',
            'latMag'=>'44.56895',
            'longMag'=>'6.103336',
            'telMag'=>'061235678',
            'mailMag'=>'magasin@mail.fr',
            'siret'=>513842,
            'photo1Mag'=>'img/magasins/geant.jpg',
            'photo2Mag'=>NULL,
            'type_id'=>2,
            'categorie_id'=>3,
            'commercant_id'=>2,
            'ville_id'=>1819
        ] );

        Magasin::create( [
            'id'=>11,
            'nomMag'=>'Leclerc',
            'ad1Mag'=> 'Route des Fauvins',
            'ad2Mag'=>'05000 Gap',
            'latMag'=>'44.563622',
            'longMag'=>'6.105159',
            'telMag'=>'061235678',
            'mailMag'=>'magasin@mail.fr',
            'siret'=>513842,
            'photo1Mag'=>'img/magasins/leclerc.jpg',
            'photo2Mag'=>NULL,
            'type_id'=>2,
            'categorie_id'=>3,
            'commercant_id'=>2,
            'ville_id'=>1819
        ] );

        Magasin::create( [
            'id'=>12,
            'nomMag'=>'Les dauphins',
            'ad1Mag'=> '26 Place de la République',
            'ad2Mag'=>'05000 Gap',
            'latMag'=>'44.558508',
            'longMag'=>'6.077076',
            'telMag'=>'061235678',
            'mailMag'=>'magasin@mail.fr',
            'siret'=>513842,
            'photo1Mag'=>'img/magasins/les_dauphins.jpg',
            'photo2Mag'=>NULL,
            'type_id'=>2,
            'categorie_id'=>5,
            'commercant_id'=>2,
            'ville_id'=>1819
                            ] );

    }
}