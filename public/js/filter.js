let currentPage = 1;
let isLoading = false;
let hasMore = true;

function loadResults() {
    const sectionId = $('.results-filter-amissfs').data('section-id');
    const selectedYear = $(".annee").val();
    const searchText = $(".filter-amissfs").val();
    const perPage = $(".afficher").val();

    if (isLoading || !hasMore) return;

    isLoading = true;
    $(".loadMore").show();

    $.ajax({
        url: `/filter-results/${sectionId}`,
        method: "GET",
        data: {
            year: selectedYear,
            searchText: searchText,
            perPage: perPage,
            page: currentPage,
        },
        success: function (response) {
            if (currentPage === 1) {
                $(".results-filter-amissfs").html(response.html);
            } else {
                $(".results-filter-amissfs").append(response.html);
            }
            hasMore = response.hasMore;
            if (!hasMore) {
                detachScrollListener();
            }
            isLoading = false;
            $(".loadMore").hide();
        },
        error: function (error) {
            isLoading = false;
            $(".loadMore").hide();
        },
    });
}

function handleScroll() {
    const nearBottom =
        $(window).scrollTop() + $(window).height() >=
        $(document).height() - 500;

    if (nearBottom && hasMore) {
        detachScrollListener();
        currentPage++;
        loadResults();
        attachScrollListener();
    }
}

function attachScrollListener() {
    $(window).on("scroll", handleScroll);
}

function detachScrollListener() {
    $(window).off("scroll", handleScroll);
}

$(".annee, .afficher, .filter-amissfs").on("change keyup", function () {
    currentPage = 1;
    hasMore = true;
    $(".results-filter-amissfs").empty();
    loadResults();
});

$(document).ready(function () {
    attachScrollListener();
    loadResults();
});
