
let currentPage = 1;
let isLoading = false;
let hasMore = true;

function loadResults() {
    const sectionId = $(".results-filter-amissfs").data("section-id");
    const selectedYear = $(".annee").val();
    const searchText = $(".filter-amissfs").val();
    const perPage = $(".afficher").val();

    if (isLoading || !hasMore) return;

    isLoading = true;
    $(".loadMore").hide();
    $(".loadingSpinner").show();

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

            if (hasMore) {
                $(".loadMore").show();
            } else {
                $(".loadMore").hide();
            }

            $(".loadingSpinner").hide();
            isLoading = false;
        },
        error: function () {
            $(".loadingSpinner").hide();
            $(".loadMore").show();
            isLoading = false;
        },
    });
}

// When filters change, reset to first page
$(".annee, .afficher, .filter-amissfs").on("change keyup", function () {
    currentPage = 1;
    hasMore = true;
    $(".results-filter-amissfs").empty();
    loadResults();
});

// On button click, load next page
$(".loadMore").on("click", function () {
    if (!isLoading && hasMore) {
        currentPage++;
        loadResults();
    }
});

// Initial load
$(document).ready(function () {
    $(".loadMore").hide();
    $(".loadingSpinner").hide();
    loadResults();
});
