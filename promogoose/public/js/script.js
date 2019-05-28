
/*------------REQUETE AJAX VILLE - AUTOCOMPLETION [PAGE : HOME & SEARCH] ------------*/

function success (res) {
    //console.log(res.data);
    let obj =res.data;
    listVilles.innerHTML = "";
    
    var dataGO ={};

    
    for(let i = 0; i<obj.length; i++)
    {
        //console.log(obj[i].ville_slug);
        let option = document.createElement('option');
        let ville = document.createTextNode(obj[i].ville_slug+" "+obj[i].ville_code_postal);
        option.value = obj[i].ville_nom_reel;
        option.appendChild(ville);
        listVilles.appendChild(option);

        let longitude = obj[i].ville_longitude_deg;
        let latitude = obj[i].ville_latitude_deg;

        dataGO[option.value] = latitude+','+longitude;
    }

    villeSelected.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            selected.click();
        }
    });

    selected.onclick = () => {

        if(!dataGO[villeSelected.value])
        {
            villeSelected.value = listVilles.options[0].value ;
        }
        let go = dataGO[villeSelected.value].split(",");
        let Latitude = go[0];
        let Longitude = go[1];

        map.setView([Latitude, Longitude], 14);
        map.addLayer(osm);
    }   
}
function error (err) {
    console.log(`Erreur ! status : ${err.status}`);
}

//Remplie la datalist de toutes les villes selon la requête AJAX
villeSelected.onkeyup = () => {

    if(villeSelected.value.length > 2)
    {
        //console.log(villeSelected.value);
        // autocomplete_test(villeSelected.value);
        axios.get(
            "getCities",{
                params:{
                    villeSelected : villeSelected.value
                }
        })
        .then(success)
        .catch(error)
    }
}

 /*---------------REQUETE AJAX MAGASIN  [PAGE : SEARCH]-----------------------*/
 function ajout_magasins(longSW,latSW,longNE,latNE,type,category){
    //console.log(value);
    container.innerHTML = "";
    ok = (res)=> {
        //console.log(res.data);
        let obj = res.data;

       for(let i = 0; i<obj.length; i++)
        {
            //console.log(obj[i].nom+" "+obj[i].lat+" "+obj[i].long);
            var nom = obj[i].nomMag;
            var idMag  = obj[i].id;
            var lat = obj[i].latMag;
            var long = obj[i].longMag;

            for(let y = 0; y<obj[i].promotions.length; y++)
            {
                if(obj[i].promotions[y].etatPromo)
                {
                    var promo = obj[i].promotions[y].libPromo;
                    let hrefMag = document.location.href+"/shop/"+idMag;
                    console.log(hrefMag);
                    var marker = L.marker([lat,long]).bindPopup(`<b>${nom}</b><br />${promo} <br/>  <a href="${hrefMag}">Voir la promo</a> `);
                    markers.push(marker);
        
                    let ResultStore = new DisplayStore(obj[i].id,container,obj[i].nomMag,obj[i].photo1Mag,obj[i].ad1Mag,obj[i].ad2Mag,promo);
                }
            }
           


        }
        //Affiche les markers sur la map
        for(let i = 0 ; i<markers.length ; i++)
        {
            markers[i].addTo(map);
        }
    }

    nul = (err)=> {
        alert(`Erreur ! status : ${err.status}`);
    }
        axios.get("getShops",{
            params: {  'longSW':longSW,
                        'latSW' : latSW,
                        'longNE' :longNE,
                        'latNE' : latNE,
                        'type' : type,
                        'categorie' : category
                    }, 
        })
        .then(ok)
        .catch(nul)
}

map.on('moveend', function(evt) {
    //suppression de tous les markers
    for(let i = 0 ; i<markers.length ; i++)
    {
        map.removeLayer(markers[i]);
    }
    //reinitialisation du tableau de markers
    markers = [];
    //récupération des coordonnées de la BBox
    let param = map.getBounds().toBBoxString();
    let position = param.split(',');
    //console.log(position[0],position[1],position[2],position[3])
    ajout_magasins(position[0],position[1],position[2],position[3],type.value,category.value);
});

// [PAGE : SEARCH]

class DisplayStore {

    constructor(id,parent,nom,image,adresse1,adresse2,promo){
        this.id = id;
        this.nom = nom;
        this.image = image;
        this.adr = adresse1+' '+adresse2;
        this.promo = promo;

        this.box = document.createElement("div");
        let box = this.box;
        box.className = "result--container-scroll-box";

        this.a = document.createElement("a");
        let a = this.a ;
        a.className= "result--container-scroll-box-content-img";
        a.href=document.location.href+"/shop/"+this.id;
        box.appendChild(a);

        this.photo = document.createElement("div");
        let photo = this.photo;
        photo.className = "result--container-scroll-box-content-img";
        photo.style.backgroundImage = "url(" + this.image + ")";
        a.appendChild(photo);

        this.titre = document.createElement("p");
        let titre = this.titre;
        titre.className = "result--container-scroll-box-title";
        let titreMag = document.createTextNode(this.nom);
        titre.appendChild(titreMag);
        box.appendChild(titre);

        this.content = document.createElement("div");
        let content = this.content;
        content.className = "result--container-scroll-box-content";
        box.appendChild(content);

        this.adresse = document.createElement("p");
        let adresse = this.adresse;
        adresse.className = "result--container-scroll-box-content-txt adresse";
        let adresseMag = document.createTextNode(this.adr);
        adresse.appendChild(adresseMag);
        content.appendChild(adresse);

        this.prom = document.createElement("p");
        let prom = this.prom;
        prom.className = "result--container-scroll-box-content-txt";
        let promoMag = document.createTextNode(this.promo);
        prom.appendChild(promoMag);
        content.appendChild(prom);
        
    
        parent.appendChild(box); 


    }
} 

// ******** GET CATEGORIES - FILTRE [PAGE : SEARCH] ************************
// fonction permettant de rechercher et ajouter les catégories d'un type de commerce choisi dans un select

function succ (res) {
    //console.log(res.data);
    let obj =res.data;
    category.innerHTML = "";

    if(obj.length == 0)
    {
    // SI AUCUNE REPONSE
        let defaut = document.createElement('option');
        let txtDefaut = document.createTextNode('Aucune catégorie');
        defaut.value = 'false';
        defaut.appendChild(txtDefaut);
        category.appendChild(defaut);
        category.disabled = true;
        category.style.backgroundColor = 'grey';
    }
    // DEFAUT OPTION
    let defaut = document.createElement('option');
    let txtDefaut = document.createTextNode('Toute catégories');
    defaut.value = 'false';
    defaut.appendChild(txtDefaut);
    category.appendChild(defaut);
    
    for(let i = 0; i<obj.length; i++)
    {
        //console.log(obj[i]);
        let option = document.createElement('option');
        let libCat = document.createTextNode(obj[i].libCat);
        option.value = obj[i].id;
        option.appendChild(libCat);
        category.appendChild(option);
    }
}
function err (err) {
    console.log(`Erreur ! status : ${err.status}`);
}






villeSelected.onchange = function(event)
{
    if(!villeSelected)
    {
        type.disabled = true;
        type.style.backgroundColor = 'grey';
    }
    else
    {
        type.disabled = false;
        type.style.backgroundColor = null;
    }

}
  

type.onchange = function(event) {

    if(type.value == 'false')
    {
        category.disabled = true;
        category.style.backgroundColor = 'grey';
    }
    else
    {
        category.disabled = false;
        category.style.backgroundColor = null;

        axios.get(
            "getCategories",{
                params:{
                    type : type.value
                }
        })
        .then(succ)
        .catch(err)
    } 
        //suppression de tous les markers
        for(let i = 0 ; i<markers.length ; i++)
        {
            map.removeLayer(markers[i]);
        }
        //reinitialisation du tableau de markers
        markers = [];
    //récupération des coordonnées de la BBox
    let param = map.getBounds().toBBoxString();
    let position = param.split(',');
    //console.log(position[0],position[1],position[2],position[3])
    ajout_magasins(position[0],position[1],position[2],position[3],type.value,category.value);
}

category.onchange = function(event) {
        //suppression de tous les markers
        for(let i = 0 ; i<markers.length ; i++)
        {
            map.removeLayer(markers[i]);
        }
        //reinitialisation du tableau de markers
        markers = [];
    //récupération des coordonnées de la BBox
    let param = map.getBounds().toBBoxString();
    let position = param.split(',');
    //console.log(position[0],position[1],position[2],position[3])
    ajout_magasins(position[0],position[1],position[2],position[3],type.value,category.value);
}

