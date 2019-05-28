<?php

use Illuminate\Database\Seeder;
use App\Avis;

class AvisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Avis::create( [
            'id'=>1,
            'noteAvis'=>4,
            'commentaireAvis'=>'Bonne promo, fiable et efficace. Bémol, ça fait commencer l\'apéro très tôt',
        ] );

        Avis::create( [
            'id'=>2,
            'noteAvis'=>3,
            'commentaireAvis'=>'Promo alléchante, néanmoins disponnible bien trop tôt.'
        ] );

        Avis::create( [
            'id'=>3,
            'noteAvis'=>5,
            'commentaireAvis'=>'Super promo ! Les tourtons sont vraiments bon ! En plus on peux choisir ceux qui sont offert. Nutella les best !'
        ] );

        Avis::create( [
            'id'=>4,
            'noteAvis'=>3,
            'commentaireAvis'=>'Une petite économie quand je veux inviter une fille. Not bad !'
        ] );

        Avis::create( [
            'id'=>5,
            'noteAvis'=>4,
            'commentaireAvis'=>'Mes enfants adorent leurs burgers, cette promo est une bonne excuse pour s\'y rendre.'
        ] );

        Avis::create( [
            'id'=>6,
            'noteAvis'=>2,
            'commentaireAvis'=>'J\'y mange souvent seul, cette promo n\'est pas vraiment interessante..'
        ] );

        Avis::create( [
            'id'=>7,
            'noteAvis'=>4,
            'commentaireAvis'=>'Petite économie non négligeable ! Mais nous obliges à nous lever le dimanche matin ! AHA'
        ] );

        Avis::create( [
            'id'=>8,
            'noteAvis'=>5,
            'commentaireAvis'=>'Moi qui ai l\'habitude de faire mes courses le dimanche matin, cette promotion est parfaite pour moi !!'
        ] );

        Avis::create( [
            'id'=>9,
            'noteAvis'=>3,
            'commentaireAvis'=>'Une promo qui permet de faire plaisir a mes enfants, ils adorent ces produits'
        ] );

        Avis::create( [
            'id'=>10,
            'noteAvis'=>4,
            'commentaireAvis'=>'Promotion idéal pour les étudiants, il suffit de faire ces courses de la semaine un dimanche matin'
        ] );

        Avis::create( [
            'id'=>11,
            'noteAvis'=>2,
            'commentaireAvis'=>'Promotion sans grand économie mais reste utile en cas de barbuc'
        ] );

        Avis::create( [
            'id'=>12,
            'noteAvis'=>1,
            'commentaireAvis'=>'Promotion classique que propose déjà des boulangerie sans frocément passer par ce site'
        ] );

        Avis::create( [
            'id'=>13,
            'noteAvis'=>4,
            'commentaireAvis'=>'Habituée a cette boulangerie, c\'est la première fois qu\'elle fait des réductions !'
        ] );

        
    }
}
