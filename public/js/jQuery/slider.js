$(".recommended").owlCarousel({
    nav: false,
    dots: true,
    // center: true,
    items: 2,
    loop: true,
    margin: 20,
    responsive: {
        0: { items: 1 },
        768: { items: 2 },
        1200: { items: 3 }
    }
});

function updateNavButtons(event) {
    const current = event.item.index;
    const total = event.item.count;
    const itemsPerPage = event.page.size;

    if (current === 0) {
        $(".owl-prev").hide();
    } else {
        $(".owl-prev").show();
    }

    if (current + itemsPerPage >= total) {
        $(".owl-next").hide();
    } else {
        $(".owl-next").show();
    }
}


$(".initiative-slider").owlCarousel({
    nav: true,
    dots: false,
    loop: false,
    margin: 10,
    autoWidth: false,
    items: 3,
    responsive: {
        0: { items: 1 },
        600: { items: 2 },
        1000: { items: 3 }
    },
    onInitialized: function (event) {
        $(".owl-prev span, .owl-next span").remove();
        $(".owl-prev").addClass("custom-prev");
        $(".owl-next").addClass("custom-next");

        updateNavButtons(event); 
    },
    onChanged: function (event) {
        updateNavButtons(event);
    }
});




