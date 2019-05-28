<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Ville;
use App\Magasin;
use App\Type;
use App\Categorie;
use App\Promotion;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','search','getCities','getShops','getCategories']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promoStars = Promotion::with('magasin')->where('etatPromo','=','1')->orderBy('clickPromo','desc')->limit(3)->get();
        $newsPromo = Promotion::with('magasin')->where('etatPromo','=','1')->orderBy('created_at','desc')->limit(3)->get();
    
        return view('index',[
            'promos' => $promoStars,
            'news' => $newsPromo
        ]);
    }

    public function getCities(Request $request)
    {
        $ville = $request->input('villeSelected');
        $cities = Ville::where('ville_slug','like',$ville.'%')->orderBy('ville_population_2012','DESC')->limit(10)->get();
        //var_dump($cities);
        return  $cities;
    }

    public function getShops(Request $request)
    {
        $longSW =$request->input('longSW');
        $latSW =$request->input('latSW');
        $longNE =$request->input('longNE');
        $latNE =$request->input('latNE');
        if($request->input('type') != 'false')
        {
            $type = $request->input('type');

            if($request->input('categorie') != 'false')
            {
                $categorie = $request->input('categorie');
                $shops = Magasin::with('promotions')->whereBetween('latMag',[$latSW,$latNE])->whereBetween('longMag',[$longSW,$longNE])->Where('type_id','=',$type)->Where('categorie_id','=',$categorie)->get();
            }
            else
            {
                $shops = Magasin::with('promotions')->whereBetween('latMag',[$latSW,$latNE])->whereBetween('longMag',[$longSW,$longNE])->Where('type_id','=',$type)->get();
            }
        }
        else
        {
            $shops = Magasin::with('promotions')->whereBetween('latMag',[$latSW,$latNE])->whereBetween('longMag',[$longSW,$longNE])->get();
        }
        
        return  $shops;
    }

    public function search()
    {
        $types = Type::All();
        return view('pages/searchMap', [
            'types' => $types
        ]);
    }

    public function getCategories(Request $request)
    {
        $type = $request->input('type');
        $categories=Categorie::where('type_id','=',$type)->get();
        //var_dump($cities);
        return  $categories;
    }

    

}
