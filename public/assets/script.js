
    let menu = document.querySelector(".menu");
    let mobile = document.querySelector("header .mobile");
    let mobileul = document.querySelector("header .mobile ul");
    let overlay = document.querySelector(".overlay");
    let close = document.querySelector(".close");


    menu.addEventListener("click", function(){
        overlay.style.display ="block";
        mobile.style.display ="block";
        mobileul.style.display ="block";
    })

    overlay.addEventListener("click", function(){
        mobile.style.display = "none";
    })

    close.addEventListener("click", function(){
        mobile.style.display = "none";
    })

    $(".page-scroll").on('click', function(e){
        let tujuan = $(this).attr('href');
        mobile.style.display = "none";

        let elementTujuan = $(tujuan);
        $('html, body').animate({
            scrollTop: elementTujuan.offset().top - 87
        }, 1000, 'swing')

        e.preventDefault()
    })