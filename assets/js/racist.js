
//Racist function
function racist(){
    let pageCover = document.getElementById("page-cover");
        pageCover.classList.toggle("is-racist");

    let nav = document.getElementById("fp-nav");
        nav.classList.toggle("is-racist-nav");

    let social = document.getElementById("social");
        social.classList.toggle("is-racist-nav-social");
    
    let contact = document.getElementById("message_form");
        contact.classList.toggle("is-racist-contact")

    let logob = document.getElementById("logo-black");
        logob.classList.toggle("is-racist-logo-black");

    let logow = document.getElementById("logo-white");
        logow.classList.toggle("is-racist-logo-white");

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
            h2[i].classList.toggle("is-racist-content");
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

    let iframe = document.getElementById("iframe");
    let slideshow =  iframe.contentWindow.document.getElementById("slideshow");
        slideshow.classList.toggle("is-racist-slideshow");
    let slideshowContent = iframe.contentWindow.document.getElementsByClassName("slide__title-wrap");
        for (let i = 0; i < slideshowContent.length; i++) {
            slideshowContent[i].classList.toggle("is-racist-slideshow-content")
        }
}
