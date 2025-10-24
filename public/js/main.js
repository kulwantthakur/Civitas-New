$(document).ready(function () {
    let page = 1;
    const $loader = $(".loader");
    const $container = $(".elements-container");
    const isCategory = category !== "";
    const url = isCategory ? "/load-more-category" : "/load-more";
    function loadNews(page) {
        $loader.show();

        const data = {
            page: page,
            section_id: sectionId,
        };

        if (isCategory) {
            data.category = category;
        }

        $.ajax({
            url: url,
            method: "GET",
            dataType: "json",
            data: data,
            success: function (data) {
                $container.append(data.html);
                hasMore = data.has_more;

                if (!hasMore) {
                    detachScrollListener();
                }
                $loader.hide();
            },
            error: function (error) {
                console.error("Error loading data:", error);
                $loader.hide();
            },
        });
    }
    function handleScroll() {
        const nearBottom =
            $(window).scrollTop() + $(window).height() >=
            $(document).height() - 100;

        if (nearBottom && hasMore) {
            detachScrollListener();
            page++;
            loadNews(page);
            attachScrollListener();
        }
    }

    function attachScrollListener() {
        $(window).on("scroll", handleScroll);
    }

    function detachScrollListener() {
        $(window).off("scroll", handleScroll);
    }
    attachScrollListener();
});

