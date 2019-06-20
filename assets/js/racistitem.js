
//Racist function
function racist(){
    let pageCover = document.getElementById("page-cover");
        pageCover.classList.toggle("is-racist");
    
    let social = document.getElementById("social");
        social.classList.toggle("is-racist-nav-social");
    
    let buttonb = document.getElementById("changeColor-Black");
        buttonb.classList.toggle("is-racist-button-black");

    let buttonw = document.getElementById("changeColor-White");
        buttonw.classList.toggle("is-racist-button-white");

    let prev = document.getElementById("nav-prev");
        prev.classList.toggle("is-racist-nav-prev");
    
    let next = document.getElementById("nav-next");
        next.classList.toggle("is-racist-nav-next");

    let menu = document.getElementById("navbarMenu");
        menu.classList.toggle("is-racist-menuitem");
    
    let p = document.getElementsByTagName("p");
        for (let i = 0; i < p.length; i++) {
            p[i].classList.toggle("is-racist-content");
        }
    let a = document.getElementsByTagName("a");
        for (let i = 0; i < a.length; i++) {
            a[i].classList.toggle("is-racist-content");
        }
    let h1 = document.getElementsByTagName("h1");
        for (let i = 0; i < h1.length; i++) {
            h1[i].classList.toggle("is-racist-content");
        }
    let h2 = document.getElementsByTagName("h2");
        for (let i = 0; i < h2.length; i++) {
            h2[i].classList.toggle("is-racist-content-h2");
        }
    let h3 = document.getElementsByTagName("h3");
        for (let i = 0; i < h3.length; i++) {
            h3[i].classList.toggle("is-racist-content");
        }
    let h4 = document.getElementsByTagName("h4");
        for (let i = 0; i < h4.length; i++) {
            h4[i].classList.toggle("is-racist-content");
        }
    let h5 = document.getElementsByTagName("h5");
        for (let i = 0; i < h5.length; i++) {
            h5[i].classList.toggle("is-racist-content");
        }
    let h6 = document.getElementsByTagName("h6");
        for (let i = 0; i < h6.length; i++) {
            h6[i].classList.toggle("is-racist-content");
        }

    let li = document.getElementsByTagName("li");
        for (let i = 0; i < li.length; i++) {
            li[i].classList.toggle("is-racist-content");
        }
    let shine = document.getElementsByClassName("shine");
        for (let i = 0; i < shine.length; i++) {
            shine[i].classList.toggle("is-racist-shine");
        }
}
