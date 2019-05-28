@extends('layouts.app')

@section('content')
<article class="admin--container admin" >
    <p class="admin--container-h1"> Page Administrateur </p>
    <p class="admin--container-h2">Gestion des  filtres - types et catégories</p> 
    <div class="admin--container-edit">
        @foreach($types as $type)
            <div class="accordion admin--container-edit-accordion">
                <input id="type{{ $type->id }}" type="text" value="{{ $type->libType }}" />
                <div class="admin--container-edit-accordion-buttonBox">
                    <button class="admin--container-edit-accordion-buttonBox-check" onclick="modifyType({{ $type->id }})">
                        <i class="fas fa-check"></i>
                    </button>
                    <button class="admin--container-edit-accordion-buttonBox-delete" onclick="deleteType({{ $type->id }})">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
                <span>double clique pour modifier les catégories de {{ $type->libType }}</span>
            </div>
            <div class="admin--container-edit-panel">
                @foreach($type->categories as $categorie)
                    <div>
                        <input id="cat{{ $categorie->id }}" type="text" value='{{ $categorie->libCat }}'/>
                        <div class="admin--container-edit-panel-buttonBox">
                            <button class="admin--container-edit-accordion-buttonBox-check" onclick="modifyCategory({{ $categorie->id }})">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="admin--container-edit-accordion-buttonBox-delete" onclick="deleteCategory({{ $categorie->id }})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div> 
                @endforeach
                <div>
                    <input type='text' name="newCat" id="newCat{{ $type->id }}" placeholder="Nouvelle catégorie" />
                    <div class="admin--container-edit-panel-buttonBox">
                        <button class="admin--container-edit-panel-buttonBox-add" onclick="addCategory({{ $type->id }})">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="admin--container-addBox">
        <div class="admin--container-addBox-add">
            <label class="admin--container-addBox-add-label" for="newType">Ajouter un type</label>
            <input class="admin--container-addBox-add-input" type='text' name="newType" id="newType" placeholder="Entrez un nouveau type" />
            <div class="admin--container-addBox-add-buttonBox">
                <button class="admin--container-addBox-add-buttonBox-button" onclick="addType()">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
    </div>
</article>

<script type="text/javascript">
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].ondblclick = function(){

            this.classList.toggle("active");

            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        }
    }
                
    function ok (ok) {
        console.log(`Modifiction ok : ${ok.status}`);
        location.reload(true);
    }   
    function fail (err) {
        console.log(`Erreur ! status : ${err.status}`);
    }
    // FUNCTION AXIOS GET TO MODIFY A TYPE
    function modifyType(id) {
        let elementId = 'type'+id;
        let element = document.getElementById(elementId);
        let url = document.location.href+"/modify/type";
        //console.log(url);
        axios.get(
        url,{
                params : {
                    id : id,
                    value : element.value
                }
            }
        )
        .then(ok)
        .catch(fail) 
    }
    // FUNCTION AXIOS GET TO ADD A TYPE
    function addType() {
        let url = document.location.href+"/add/type";
        //console.log(url);
        axios.get(
            url,{
                    params : {
                        value : newType.value
                    }
                }
            )
            .then(ok)
            .catch(fail) 
    }

        // FUNCTION AXIOS GET TO DELETE A TYPE
        function deleteType(id) {
        let url = document.location.href+"/delete/type";
        //console.log(url);
        axios.get(
            url,{
                    params : {
                        id : id
                    }
                }
            )
            .then(ok)
            .catch(fail) 
    }

    // FUNCTION AXIOS GET TO MODIFY A CATEGORY
    function modifyCategory(id) {
        let elementId = 'cat'+id;
        let element = document.getElementById(elementId);
        let url = document.location.href+"/modify/category";
        //console.log(element.value);
        axios.get(
            url,{
                params : {
                    id : id,
                    value : element.value
                }
            }
        )
        .then(ok)
        .catch(fail) 
    }

    // FUNCTION AXIOS GET TO MODIFY A CATEGORY
    function addCategory(idType) {
        let url = document.location.href+"/add/category";
        let elementId = 'newCat'+idType;
        let element = document.getElementById(elementId);
        //console.log(url);
        axios.get(
            url,{
                params : {
                    idType : idType,
                    value : element.value
                }
            }
        )
        .then(ok)
        .catch(fail) 
    }

        // FUNCTION AXIOS GET TO DELETE A CATEGORY
        function deleteCategory(id) {
        let url = document.location.href+"/delete/category";
        //console.log(url);
        axios.get(
            url,{
                    params : {
                        id : id
                    }
                }
            )
            .then(ok)
            .catch(fail) 
    }
</script>
@endsection