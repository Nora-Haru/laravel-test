$("button").click(function () {
    $("html,body").animate(
        {
            scrollTop: $(".sectionf").offset().top,
        },
        "slow"
    );
});

// slide menu navbar di display hp
document.addEventListener("DOMContentLoaded", function () {
    var $navbarBurgers = Array.prototype.slice.call(
        document.querySelectorAll("#nav-menu"),
        0
    );

    if ($navbarBurgers.length > 0) {
        $navbarBurgers.forEach(function ($el) {
            $el.addEventListener("click", function () {
                var target = $el.dataset.target;
                var $target = document.getElementById(target);

                $el.classList.toggle("is-active");
                $target.classList.toggle("is-active");
            });
        });
    }

    // slide categories di home
    bulmaCarousel.attach("#slider", {
        slidesToScroll: 1,
        slidesToShow: 5,
        infinite: true,
    });
});
