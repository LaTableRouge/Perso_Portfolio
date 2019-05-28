<?php

namespace App\Http\Controllers\AdminStores;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Jenssegers\Date\Date;
use App\Magasin;
use App\Promotion;
use App\Adhesion;
use App\Avis;
use App\Type;
use App\Ville;
use DB;

class StoreController extends Controller
{
    //
    public function __construct()
    {
        //permet de mettre en place l'authentification pour l'ensemble de ce controleur
        $this->middleware('auth');
    }

    public function getEdit($magasin_id){

        //recoit en get le id du store et renvoie la vue du store en modification
        $magasin= Magasin::findOrFail($magasin_id);
        return view('adminStores.magasin_edit',[
            'magasin'=>$magasin
        ]);
    }

    public function postEdit(Request $request){
        //dd($request->all); //permet de recuperer le post complet
        //dd($request->input('title')); //permet de récuperer le post input avec id title

        //permet de valider les input
        $this->validate($request, [
            'nomMag'=>'required',
            'ad1Mag'=>'required',
            'ad2Mag'=>'required',
            'telMag'=>'required',
            'mailMag'=>'required',
            'siret'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
        ]);

        //stockage en bdd de toutes les variables issues du formulaire
        $magasin = Magasin::findOrFail($request->input('magasin_id'));
        $magasin->nomMag =  $request->input('nomMag');
        $magasin->ad1Mag =  $request->input('ad1Mag');
        $magasin->ad2Mag =  $request->input('ad2Mag');
        $magasin->telMag =  $request->input('telMag');
        $magasin->mailMag = $request->input('mailMag');
        $magasin->siret =   $request->input('siret');
        $magasin->latMag =  $request->input('latitude');
        $magasin->longMag = $request->input('longitude');

        $magasin->save();

        return redirect()->route('magasin_edit', ['magasin_id' => $magasin->id]);
    }

    public function getCreateStore(){
        $types = Type::All();
        $villes = Ville::All();
        return view('adminStores.magasin_creation', 
        [
            'types' => $types,
            'villes' => $villes
        ]);
    }

    public function postCreateStore(Request $data){
          //permet de valider les input
        /**
          $this->validate($data, [
            'nomMag'=>'required',
            'ad1Mag'=>'required',
            'ad2Mag'=>'required',
            'telMag'=>'required',
            'mailMag'=>'required',
            'siret'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
            'photo1mag'=>'required'
        ]);

**/
        $file = $data->file('photo1Mag');
        $nameFile = uniqId();
        $extension = $file->extension();
        $path = $file->move( public_path().'/img/magasins', $nameFile.'.'.$extension );
        // enregistrement d'un magasin à partir d'un formulaire
        //permet de valider les input
        $magasin = new Magasin;
        $magasin->nomMag = $data['nomMag'];
        $magasin->ad1Mag = $data['ad1Mag'];
        $magasin->telMag = $data['telMag'];
        $magasin->mailMag = $data['mailMag'];
        $magasin->siret = $data['siret'];
        $magasin->latMag = $data['latMag'];
        $magasin->longMag = $data['longMag'];
        $magasin->type_id = $data['type'];
        $magasin->categorie_id = $data['categorie'];
        $magasin->ville_id = DB::table('villes')->where('ville_nom_reel', '=', $data['nomVille'])->first()->id;//select('select id from villes where ville_nom_reel = "'.$data['nomVille'].'";');
        $magasin->commercant_id = Auth::user()->id;
        $magasin->photo1Mag = 'img/magasins/'. $nameFile.'.'.$extension;

        $magasin->save();

        //Redirection vers la page de tous les commerces
        return redirect()->route('commerces',$magasin->id)->with('success' , 'Enregistrement du commerce ok');
    }
    
    public function displayStores(){
        $user = Auth::User("id");
        $stores = Magasin::where('commercant_id','=',$user['id'])->get();
        return view('adminStores.magasin_gestion', [
            'stores' => $stores
        ]);
    }

    public function promoStore($magasin_id) {
        $store = Magasin::with('promotions.adhesions')->findOrFail($magasin_id);
        $avis = [];
        $moyNote = [];
        $nbAvis=[];
        foreach($store->promotions as $promotion)
        {
            $avis[$promotion->id] = DB::table('avis')
            ->join('adhesions', 'avis.id', '=', 'adhesions.avis_id')
            ->join('promotions', 'adhesions.promotion_id', '=', 'promotions.id')
            ->where('promotions.id', '=', $promotion->id)->get();

            $moyNote[$promotion->id] = $avis[$promotion->id]->avg('noteAvis');
            $nbAvis[$promotion->id] = count($avis[$promotion->id]);
        }
        

        return view('adminStores.magasin_promos', [
            'store' => $store,
            'nbAvis' => $nbAvis,
            'moyNote' => $moyNote
        ]);
    }


    public function deleteStore(Request $request) {

        $shop = Magasin::findOrFail($request->input('id'));
        $shop->delete();

        return 'suppression ok';
    }

    public function deletePromo(Request $request) {

        $promo = Promotion::findOrFail($request->input('id'));
        $promo->delete();

        return 'suppression ok';
    }

    
    public function activPromo(Request $data) {
        
        $promotions = DB::table('promotions')->where('magasin_id', '=', $data['idStore'])->get();
        
        foreach($promotions as $promotion)
        {   
            $promo = Promotion::findOrFail($promotion->id);
            $promo->etatPromo = false;
            $promo->save();
        }

        $promoActiv = Promotion::findOrFail($data['idPromo']);
        $promoActiv->etatPromo = true;
        $promoActiv->save();

        return 'activée';
    }

    public function desactivPromo(Request $data) {
        
        $promoDesactiv = Promotion::findOrFail($data['idPromo']);
        $promoDesactiv->etatPromo = false;
        $promoDesactiv->save();

        return 'Desactivée';
    }
}





