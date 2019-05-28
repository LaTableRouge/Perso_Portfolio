<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Jenssegers\Date\Date;
use App\Promotion;
use App\Adhesion;
use App\Magasin;
use App\User;


class PromotionController extends Controller
{
    public function index(){
        //liste toutes les promos

    }

    public function getCreate($magasin_id)
    {
        //recoit en get le id du store et renvoie la vue du store en modification
        $magasin= Magasin::findOrFail($magasin_id);
        return view('adminStores.promotion_creation',[
            'magasin'=>$magasin
        ]);
    }


    public function postCreate(Request $request){

        $magasin_id = $request['magasin_id'];


        //recuperation de toutes les promos du magasins pour mettre le bouleen à 0
        $promotions = Promotion::all()->where('magasin_id', $magasin_id);
        //dd($promotions);
        foreach ($promotions as $promotion){
            $promotion->etatPromo = false;
            $promotion->save();
        }

        //generation du code pour promo et avis
        function generateCode() {
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 5; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }


        //gestion des dates
        Date::setLocale('fr');
        $duree =  $request['dureePromo'];
        $dateDebutPromo = new Date($request['dateDebutPromo']);
        $dateFinPromo = $dateDebutPromo->add($duree.'day');
        //dd(Date::now()->timespan($dateFinPromo));


        $file = $request->file('photo1Promo');
        $nameFile = uniqId();
        $extension = $file->extension();
        $path = $file->storeAs('img/promos', $nameFile.'.'.$extension );


        // enregistrement d'une promo à partir d'un formulaire

        $promo = new Promotion();
        $promo->libPromo = $request['libPromo'];
        $promo->dateDebutPromo = $dateDebutPromo;
        $promo->dateFinPromo = $dateFinPromo;
        $promo->etatPromo = true;
        $promo->codePourPromo = generateCode();
        $promo->codePourAvis = generateCode();
        $promo->magasin_id = $request['magasin_id'];
        $promo->photo1Promo = $path;

        $promo->save();

        //Redirection vers la page de toutes les promo du commerce en id
        return redirect()->route('promos',$request['magasin_id'])->with('success' , 'Enregistrement de la promo ok');
    }
}
