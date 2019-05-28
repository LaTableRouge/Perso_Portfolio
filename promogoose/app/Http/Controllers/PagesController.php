<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use App\User;
use App\Magasin;
use App\Adhesion;
use App\Avis;
use App\Promotion;

class PagesController extends Controller
{
    public function test($name = "") {

        return view('test', [
            'name' => $name,
            'page_title' => 'Page de test'
        ]);
        //return 'Hello '.$name;
    }

    public function getUser() {
        $user = Auth::user();
        $nbAvis = Avis::join('adhesions','avis.id','=','adhesions.avis_id')->where('adhesions.user_id','=',$user->id)->count();
        $nbPromo = Adhesion::with('promotions')->where('user_id','=',$user->id)->count();
        $nbCommerce = Magasin::with('promotions')->where('commercant_id','=',$user->id)->count();
        return view('pages/monCompte' , [
            'user' => $user,
            'nbAvis' => $nbAvis,
            'nbPromo' => $nbPromo,
            'nbCommerce' => $nbCommerce
        ]);
    }

    public function postEditUser(Request $request) {

        $this->validate($request, [
            'name'=>'required',
            'prenom' =>'required',
            'telephone' => 'nullable',
            'email'=>'required'
        ]);

        $user = User::findOrFail($request->input('user_id'));
        $user->name = $request->input('name');
        $user->prenom = $request->input('prenom');
        $user->email = $request->input('email');
        $user->telUser = $request->input('telephone');

        $user->save();

        return redirect()->route('account', ['user' => $user]);
        //dd($request->all());
        //return 'OK MAGGLE';
    }

    public function displayShop($magasin_id) {
        $shop = Magasin::with('ville','promotions.adhesions.avis')->findOrFail($magasin_id);
        $users = User::All();
        return view('pages/commerces', [
            'shop' => $shop,
            'users' => $users
        ]);
    }

    public function displayMesPromos() {
        $user = Auth::user();
        $adhesions = Adhesion::with('promotion.magasin')->where('user_id','=',$user->id)->get();

        return view('pages/mesPromos', [
            'adhesions' =>$adhesions
        ]);
    }

    public function displayMesAvis() {
        $user = Auth::user();
        $adhesions = Adhesion::with('promotion.magasin','avis')->where('user_id','=',$user->id)->get();

        return view('pages/mesAvis', [
            'adhesions' =>$adhesions
        ]);
    }

    public function getCodePromo(Request $request){

        if(Auth::check())
        {
            $idPromo = $request['idPromo'];
            $user = Auth::user();

            $alreadyHad = Adhesion::where('promotion_id','=',$idPromo)->where('user_id','=',$user->id)->get();

            if(count($alreadyHad))
            {
                return [ 'redirect' => route('mesPromos')];
            }

            $adhesion = new Adhesion();
            $adhesion->promotion_id = $idPromo ;
            $adhesion->user_id = $user->id;
            $adhesion->save();

            $promoClicked = Promotion::where('id','=',$idPromo)->update(['clickPromo' => DB::raw('clickPromo+1')]);

            return [ 'redirect' => route('mesPromos')];
        }
        else
        {
            return ['redirect' => route('login')];
        }
    }

    public function postAvis(Request $request) {



        $this->validate($request, [
            'codeAvis'=>'required',
            'noteAvis' =>'required',
            'commentaireAvis' => 'nullable'
        ]);

        $user = Auth::user();
        $promotion = Promotion::where('codePourAvis','=',$request->input('codeAvis'))->first();

        if(!is_null($promotion))
        {
            $avis = new Avis();
            $avis->noteAvis = $request->input('noteAvis');
            $avis->commentaireAvis = $request->input('commentaireAvis');
            $avis->save();

            $adhesion = Adhesion::where('promotion_id','=',$promotion->id)->where('user_id','=',$user->id)->first();
            $adhesion->avis_id = $avis->id;
            $adhesion->save();

            return redirect()->route('commerces',['magasin_id' => $promotion->magasin->id])->with('Avis enregistrer');
        }
        else
        {
            return 'Mauvais code avis';
        }

    }

    public function devenirCommercant(Request $request){

        $user = User::findOrFail($request['id']);
        $user->commercant = 1;
        $user->save();
 
        return ['redirect' => route('stores')];
    
    }
}

