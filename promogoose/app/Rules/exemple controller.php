<?php
//ajouter la route ds web.php
//Route::post



public function postSearchCities(Request $request){
    $lat_ne = $request->input('lat_ne');
    $lat_nw = $request->input('lat_nw');
    $lat_ne = $request->input('lat_ne');
    $lat_ne = $request->input('lat_ne');



    $cities=city::with('stores')
        ->whereBetween('lat', [$lat_ne, $lat_nw])
        ->whereBetween('long', [$lon_ne, $lon_nw])
        ->get();
    return $cities;
}



//voir biblo axios

//pour  les photos

$file = $request->file('image');

if($file->isValid()) {

    $ext = $file->getOriginalClientExtension();

    $file->storeAs('/...', $m->id.'-photo1.'.$ext);

    $file->store('public');

}