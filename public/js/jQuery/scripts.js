$(document).ready(function () {
    $(".back-button").click(function () {
        window.history.back();
    });
});

$(document).on("click", function (event) {
    if (
        !$(event.target).closest(".collapse").length &&
        !$(event.target).is('[data-bs-toggle="navbar-collapse"]')
    ) {
        $(".collapse.show").collapse("hide");
    }
});

$(document).on("click", ".mobile-submenu", function () {
    $(".nav-item").addClass("d-none");
    $(".nav-item").css("background-color", "rgba(225, 11, 23, 1)");
    $(this).parent().find(".submenu").removeClass("d-none");
    $(this).parent().find(".nav-item").removeClass("d-none");
    $(this).parent().find(".nav-item").css("padding-left", 0);
    $(this).addClass("d-none");
    $(this).parent().removeClass("d-none");
    $(".responsive-menu-back").css("background-color", "rgba(225, 11, 23, 1)");
    $(".home-button").addClass("d-none");
    $(".nav-link").css("color", "#fff");
    $(".close-menu").addClass("back-menu").removeClass("close-menu");
});
$(document).on("click", ".back-menu", function () {
    $(".submenu").addClass("d-none");
    $(".nav-item").removeClass("d-none");
    $(".nav-item").css("background-color", "");
    $(".mobile-submenu").removeClass("d-none");
    $(".responsive-menu-back").css("background-color", "");
    $(".home-button").removeClass("d-none");
    $(".nav-link").css("color", "");
    $(".back-menu").removeClass("back-menu").addClass("close-menu");
});
$(document).on("click", ".close-menu", function () {
    $(".navbar-collapse").collapse("hide");
});

topbar.config({
    autoRun: true,
    barThickness: 4,
    barColors: {
        0: "#E10B17",
    },
    shadowBlur: 10,
    shadowColor: "rgba(0,   0,   0,   .6)",
});
topbar.show();
setTimeout(function () {
    topbar.hide();
    if (
        $(".video_home")[0] !== undefined &&
        $(".video_home").eq(0).parent().css("display") == "block"
    ) {
        $(".video_home")[0].play();
    } else if (
        $(".video_home")[1] !== undefined &&
        $(".video_home").eq(1).parent().css("display") == "block"
    ) {
        $(".video_home")[1].play();
    }
}, 1500);

$(document).ready(function () {
    $(
        ".home-right-image-box, .home-right-image-big-box, .support-boxes, .support-boxes-big"
    ).on("click", function (e) {
        e.preventDefault();
        var value = $(this).data("value");
        $(
            ".home-right-image-box, .home-right-image-big-box, .support-boxes, .support-boxes-big"
        ).removeClass("active-box-soutenir");
        $(this).addClass("active-box-soutenir");

        if (value !== "custom") {
            $("#custom-amount").val("");
        }

        $.ajax({
            url: "/store-value",
            method: "POST",
            data: {
                value: value,
                custom_amount:
                    value === "custom" ? $("#custom-amount").val() : null,
            },
            success: function (response) {},
            error: function (xhr, status, error) {
                toastr.error("{!! trans('words.unexpected_error') !!}");
            },
        });
    });

    function setCustomBoxActiveState() {
        const amount = $("#custom-amount").val().replace(",", ".");

        if (amount && !isNaN(amount) && parseFloat(amount) > 0) {
            $(".home-right-image-box, .support-boxes").removeClass(
                "active-box-soutenir"
            );
            $(".home-right-image-big-box, .support-boxes-big").addClass(
                "active-box-soutenir"
            );
            $("#custom-amount").addClass("active-box-soutenir");

            $.ajax({
                url: "/store-value",
                method: "POST",
                data: {
                    value: "custom",
                    custom_amount: amount,
                },
                success: function () {},
                error: function () {
                    toastr.error("{!! trans('words.unexpected_error') !!}");
                },
            });
        } else {
            $(".home-right-image-big-box, .support-boxes-big").removeClass(
                "active-box-soutenir"
            );
            $("#custom-amount").removeClass("active-box-soutenir");
        }
    }

    $("#custom-amount").on("focus input blur", function () {
        setCustomBoxActiveState();
    });
});

$(document).ready(function () {
    $(".toggle-icon").on("click", function (e) {
        e.stopPropagation();

        var $icon = $(this);
        var $content = $icon
            .closest(".legal-plan-bold")
            .next(".toggle-content");

        $content.slideToggle(200, function () {
            $icon.text($content.is(":visible") ? "-" : "+");
        });
    });
});

$(document).ready(function () {
    $(".toggle-icon").on("click", function (e) {
        e.stopPropagation();

        var $icon = $(this);
        var $li = $icon.closest("li");
        var $content = $li.find(".toggle-content");

        $content.slideToggle(200, function () {
            $icon.text($content.is(":visible") ? "–" : "+");
        });
    });
});

$(document).ready(function () {
    function createCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + value + expires + "; path=/";
    }

    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(";");
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === " ") c = c.substring(1);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length);
        }
        return null;
    }

    function updateLabelColors(isEnabled) {
        if (isEnabled) {
            $("#label-on").css("color", "#000");
            $("#label-off").css("color", "#fff");
        } else {
            $("#label-on").css("color", "#fff");
            $("#label-off").css("color", "#000");
        }
    }

    const cookieConsent = readCookie("google_analytics_plus41");
    const $toggle = $("#tracking-toggle");

    // Set toggle state based on cookie
    if (cookieConsent === "1") {
        $toggle.prop("checked", true);
        $(".cookie-bar").hide();
        $("body").removeClass("cookie-space");
        updateLabelColors(true);
    } else {
        $toggle.prop("checked", false);
        $(".cookie-bar").show();
        $("body").addClass("cookie-space");
        updateLabelColors(false);
    }

    // Accept cookies
    $(document).on("click", ".cookies-accept", function () {
        createCookie("google_analytics_plus41", "1", 365);
        $toggle.prop("checked", true);
        $(".cookie-bar").fadeOut();
        $("body").removeClass("cookie-space");
        updateLabelColors(true);
    });

    // Reject cookies (show again next page)
    $(document).on("click", ".cookies-close", function () {
        createCookie("google_analytics_plus41", "0", 365);
        $toggle.prop("checked", false);
        $(".cookie-bar").fadeOut();
        $("body").addClass("cookie-space");
        updateLabelColors(false);
    });

    // Toggle manually
    $toggle.on("change", function () {
        if ($(this).is(":checked")) {
            createCookie("google_analytics_plus41", "1", 365);
            $(".cookie-bar").fadeOut();
            $("body").removeClass("cookie-space");
            updateLabelColors(true);
        } else {
            createCookie("google_analytics_plus41", "0", 365);
            $(".cookie-bar").fadeIn();
            $("body").addClass("cookie-space");
            updateLabelColors(false);
        }
    });
});

// Optional: Disable Google Analytics on cookie reject
if (document.cookie.indexOf("google_analytics_plus41=0") > -1) {
    window["ga-disable-UA-XXXXXXX-Y"] = true; // Replace with your GA ID
}

$(document).ready(function () {
    const hash = window.location.hash;

    if (hash === "#cookies-settings") {
        // Scroll to the entire section
        const $section = $("#cookies-settings");
        if ($section.length) {
            $("html, body").animate(
                {
                    scrollTop: $section.offset().top,
                },
                400
            );
        }

        // Find the toggle inside that section and open it
        const $toggle = $section.find(".toggle-content");
        const $icon = $section.find(".toggle-icon");

        if ($toggle.length && !$toggle.is(":visible")) {
            $toggle.slideDown(200);
            $icon.text("–");
        }
    }
});
