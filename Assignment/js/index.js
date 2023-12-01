function createPagination(pagenator) {

    var navBar = document.createElement('nav')
    $(navBar).addClass("d-flex justify-content-center w-100")

    var previousBtn = document.createElement('a')
    var nextBtn = document.createElement('a')

    if (pagenator.total_pages > 0) {

        $(previousBtn).addClass((pagenator.previous) ? "btn btn-primary navigate" : "btn btn-primary disabled")
        $(previousBtn).attr('data-page', (pagenator.previous) ? pagenator.previous : "")
        $(previousBtn).text('Previous')
        $(navBar).append(previousBtn)

        for (i = 1; i <= pagenator.total_pages; i++) {
            let page = $("<a>").attr('data-page', i)
            $(page).addClass((pagenator.current_page == i) ? "mx-2 btn btn-outline-primary navigate" : "mx-2 btn navigate")
            $(page).text(i)
            $(navBar).append(page)
        }

        $(nextBtn).addClass((pagenator.next) ? "btn btn-primary navigate" : "btn btn-primary disabled")
        $(nextBtn).attr('data-page', (pagenator.next) ? pagenator.next : "")
        $(nextBtn).text('Next')
        $(navBar).append(nextBtn)
    }
    return navBar
}

function createTable(tableHeading, tableElements) {

    let i = 0
    var tableBody = document.createElement('tbody')
    do {
        var tableRow = document.createElement('tr')
        if (tableElements.length != 0) {
            for (j = 0; j < tableHeading.length; j++) {
                var tableDesc = document.createElement('td')
                $(tableDesc).text(tableElements[i][tableHeading[j]])
                $(tableRow).append(tableDesc)
            }
            $(tableBody).append(tableRow)
        } else {
            var tableDesc = document.createElement('td')
            $(tableDesc).attr('colspan', tableHeading.length)
            $(tableDesc).css("text-align", "center")
            $(tableDesc).text("Record Not Found")
            $(tableRow).append(tableDesc)
            $(tableBody).append(tableRow)
        }
        i++
    } while (i < tableElements.length)
    return tableBody
}

function pageStart(table_attr = false, search_collection = {}, page = 1) {

    $.ajax({
        url: "search.php",
        method: "POST",
        data: {
            table_attr: table_attr,
            search_term: (typeof search_collection == 'string') ? JSON.parse(search_collection) : search_collection,
            default: (!table_attr) ? 'false' : 'true',
            page: page
        },
        success: function (data) {
            var navigation = $.parseJSON(data.navigation)
            var result = $.parseJSON(data.result)
            $("#pagination").html(createPagination(navigation))
            $('tbody').replaceWith(createTable(result[0], result[1]))
        },
        error: function (err) {
            console.log(err.responseText)
        },
    });

}

$(document).ready(function () {

    let search_collection = {};
    pageStart()

    $(".search").on("keyup", function (e) {
        e.preventDefault();

        let table_attr = this.id

        let search_term = $("#" + table_attr).val()
        search_collection[table_attr] = "%" + search_term + "%"

        // stroing in session for pagining purpose
        sessionStorage.setItem('search', JSON.stringify(search_collection))

        if (!$.isEmptyObject(search_collection)) {

            // sending an ajax request to the search.php
            // to get the search result back

            // sending a request to navigator.php to get the correct pagination buttom navigation
            pageStart(table_attr, search_collection)

        }
        var uri = window.location.href.toString();
        if (uri.indexOf("?") > 0) {
            var clean_uri = uri.substring(0, uri.indexOf("?"));
            window.history.replaceState({}, document.title, clean_uri);
        }
    });


    $(document).on('click', ".navigate", function (e) {
        e.preventDefault()
        // getting the page number from the curresponding buttons
        // like next, prevoius buttons
        pageNo = $(this).attr("data-page")
        // getting the values from the session that was stored before   
        // console.log(pageNo, sessionStorage.getItem('search'))

        // to getting the next page corresponding to the page with
        // offset and limit
        pageStart(false, sessionStorage.getItem('search'), pageNo)
    });
});