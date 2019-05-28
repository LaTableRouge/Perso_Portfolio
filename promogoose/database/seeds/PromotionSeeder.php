<?php

use Illuminate\Database\Seeder;
use App\Promotion;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promotion::create( [
            'id'=>1,
            'dateDebutPromo'=>'2019-03-25',
            'dateFinPromo'=>'2019-04-09',
            'libPromo'=>'Une pinte achetée, un shooter offert. Offre valable seulement les vendredi et samedi entre 18h et 20h',
            'etatPromo'=>1,
            'codePourPromo'=>'H79F4J',
            'codePourAvis'=>'H7Z4E5',
            'photo1Promo'=>NULL,
            'photo2Promo'=>NULL,
            'photo3Promo'=>NULL,
            'magasin_id'=>1,
            'clickPromo'=>5
            ] );

            Promotion::create( [
                'id'=>2,
                'dateDebutPromo'=>'2019-03-25',
                'dateFinPromo'=>'2019-04-09',
                'libPromo'=>'HAPPY HOURS -50%. Offre valable tous les vendredi entre 19h et 20h',
                'etatPromo'=>0,
                'codePourPromo'=>'H40F48',
                'codePourAvis'=>'CR5S8R',
                'photo1Promo'=>NULL,
                'photo2Promo'=>NULL,
                'photo3Promo'=>NULL,
                'magasin_id'=>2
            ] );

            Promotion::create( [
                'id'=>3,
                'dateDebutPromo'=>'2019-03-25',
                'dateFinPromo'=>'2019-04-09',
                'libPromo'=>'Apéro offert ! Offre valable tous les jours entre 17h et 20h',
                'etatPromo'=>1,
                'codePourPromo'=>'H4040F',
                'codePourAvis'=>'R4D6G5D',
                'photo1Promo'=>NULL,
                'photo2Promo'=>NULL,
                'photo3Promo'=>NULL,
                'magasin_id'=>3
            ] );

            Promotion::create( [
                'id'=>4,
                'dateDebutPromo'=>'2019-03-25',
                'dateFinPromo'=>'2019-04-09',
                'libPromo'=>'2 shooters achetés, un shooter offert. Offre valable tous les jours entre 19h et 21h',
                'etatPromo'=>1,
                'codePourPromo'=>'GR4FDG',
                'codePourAvis'=>'D4F8RD',
                'photo1Promo'=>NULL,
                'photo2Promo'=>NULL,
                'photo3Promo'=>NULL,
                'magasin_id'=>4
            ] );

            Promotion::create( [
                'id'=>5,
                'dateDebutPromo'=>'2019-03-25',
                'dateFinPromo'=>'2019-04-09',
                'libPromo'=>'2 shooters achetés, un shooter offert. Offre valable tous les jours entre 19 et 21h',
                'etatPromo'=>1,
                'codePourPromo'=>'F544EV',
                'codePourAvis'=>'F4G8R2',
                'photo1Promo'=>NULL,
                'photo2Promo'=>NULL,
                'photo3Promo'=>NULL,
                'magasin_id'=>5
            ] );

            Promotion::create( [
                'id'=>6,
                'dateDebutPromo'=>'2019-03-25',
                'dateFinPromo'=>'2019-04-09',
                'libPromo'=>'Un soft offert pour le SAM de la soirée. Offre valable tous les jours entre 17h et 22h',
                'etatPromo'=>1,
                'codePourPromo'=>'A448FF',
                'codePourAvis'=>'G86EG7',
                'photo1Promo'=>NULL,
                'photo2Promo'=>NULL,
                'photo3Promo'=>NULL,
                'magasin_id'=>6
            ] );
            
            Promotion::create( [
                'id'=>7,
                'dateDebutPromo'=>'2019-03-25',
                'dateFinPromo'=>'2019-04-09',
                'libPromo'=>'Soirée PUNCH à -50%. Offre valable seulement les vendredi et samedi entre 18h et 21h',
                'etatPromo'=>0,
                'codePourPromo'=>'S7VD9J',
                'codePourAvis'=>'S7C4ER',
                'photo1Promo'=>NULL,
                'photo2Promo'=>NULL,
                'photo3Promo'=>NULL,
                'magasin_id'=>1
            ] );

            Promotion::create( [
                'id'=>8,
                'dateDebutPromo'=>'2019-03-25',
                'dateFinPromo'=>'2019-04-09',
                'libPromo'=>'Soirée BIERES à -50%. Offre valable seulement les vendredi et samedi entre 18h et 21h',
                'etatPromo'=>0,
                'codePourPromo'=>'FB8D5V',
                'codePourAvis'=>'D4V8RV',
                'photo1Promo'=>NULL,
                'photo2Promo'=>NULL,
                'photo3Promo'=>NULL,
                'magasin_id'=>2
            ] );

            Promotion::create( [
                'id'=>9,
                'dateDebutPromo'=>'2019-03-25',
                'dateFinPromo'=>'2019-04-09',
                'libPromo'=>'Soft à -50%. Offre valable seulement les vendredi et samedi entre 18h et 21h',
                'etatPromo'=>0,
                'codePourPromo'=>'DCVP41',
                'codePourAvis'=>'F5V8B5',
                'photo1Promo'=>NULL,
                'photo2Promo'=>NULL,
                'photo3Promo'=>NULL,
                'magasin_id'=>3
            ] );

            Promotion::create( [
                'id'=>10,
                'dateDebutPromo'=>'2019-03-25',
                'dateFinPromo'=>'2019-04-09',
                'libPromo'=>'Shooter à 2€ au lieu de 3€. Offre valable seulement les vendredi et samedi entre 18h et 23h',
                'etatPromo'=>0,
                'codePourPromo'=>'DPBT42',
                'codePourAvis'=>'5D8V4D',
                'photo1Promo'=>NULL,
                'photo2Promo'=>NULL,
                'photo3Promo'=>NULL,
                'magasin_id'=>4
            ] );

            Promotion::create( [
                'id'=>11,
                'dateDebutPromo'=>'2019-03-25',
                'dateFinPromo'=>'2019-04-04',
                'libPromo'=>'10 tourtons achetés 2 tourtons OFFERT ! Offre valable tous les samedi',
                'etatPromo'=>1,
                'codePourPromo'=>'AC45D',
                'codePourAvis'=>'AD8V7',
                'photo1Promo'=>NULL,
                'photo2Promo'=>NULL,
                'photo3Promo'=>NULL,
                'magasin_id'=>7,
                'clickPromo'=>7,
            ] );

            Promotion::create( [
                'id'=>12,
                'dateDebutPromo'=>'2019-03-25',
                'dateFinPromo'=>'2019-04-04',
                'libPromo'=>'Un menu acheté le 2ème à -20% ! Offre valable tous les samedi et dimanche. HORS livraison.',
                'etatPromo'=>1,
                'codePourPromo'=>'CF4T8',
                'codePourAvis'=>'V478G',
                'photo1Promo'=>NULL,
                'photo2Promo'=>NULL,
                'photo3Promo'=>NULL,
                'magasin_id'=>8,
                'clickPromo'=>3
            ] );

            Promotion::create( [
                'id'=>13,
                'dateDebutPromo'=>'2019-03-25',
                'dateFinPromo'=>'2019-04-04',
                'libPromo'=>'Un menu acheté le 2ème à -20% ! Offre valable tous les samedi et dimanche. HORS livraison.',
                'etatPromo'=>1,
                'codePourPromo'=>'CD7T7',
                'codePourAvis'=>'C7RT4',
                'photo1Promo'=>NULL,
                'photo2Promo'=>NULL,
                'photo3Promo'=>NULL,
                'magasin_id'=>9,
                'clickPromo'=>4
            ] );

            Promotion::create( [
                'id'=>14,
                'dateDebutPromo'=>'2019-03-25',
                'dateFinPromo'=>'2019-04-04',
                'libPromo'=>'10% remboursé à partir de 50€ d\'achat ! Offre valable seulement dimanche matin.',
                'etatPromo'=>1,
                'codePourPromo'=>'CA4R4',
                'codePourAvis'=>'DFG7E',
                'photo1Promo'=>NULL,
                'photo2Promo'=>NULL,
                'photo3Promo'=>NULL,
                'magasin_id'=>10,
                'clickPromo'=>6
            ] );

            Promotion::create( [
                'id'=>15,
                'dateDebutPromo'=>'2019-03-25',
                'dateFinPromo'=>'2019-04-04',
                'libPromo'=>'Articles de la marque FERRERO à -25% !',
                'etatPromo'=>0,
                'codePourPromo'=>'CA4R4',
                'codePourAvis'=>'DFG7E',
                'photo1Promo'=>NULL,
                'photo2Promo'=>NULL,
                'photo3Promo'=>NULL,
                'magasin_id'=>10,
                'clickPromo'=>3
            ] );

            Promotion::create( [
                'id'=>16,
                'dateDebutPromo'=>'2019-03-25',
                'dateFinPromo'=>'2019-04-04',
                'libPromo'=>'10% remboursé à partir de 50€ d\'achat ! Offre valable seulement dimanche matin.',
                'etatPromo'=>1,
                'codePourPromo'=>'DT8FS',
                'codePourAvis'=>'C87DS',
                'photo1Promo'=>NULL,
                'photo2Promo'=>NULL,
                'photo3Promo'=>NULL,
                'magasin_id'=>11,
                'clickPromo'=>4
            ] );

            Promotion::create( [
                'id'=>17,
                'dateDebutPromo'=>'2019-03-25',
                'dateFinPromo'=>'2019-04-04',
                'libPromo'=>'3ème baguette offerte tous les jours entre 8h et 10h',
                'etatPromo'=>1,
                'codePourPromo'=>'WFTY7',
                'codePourAvis'=>'HTYD5',
                'photo1Promo'=>NULL,
                'photo2Promo'=>NULL,
                'photo3Promo'=>NULL,
                'magasin_id'=>12,
                'clickPromo'=>4
            ] );


            
    }
}
