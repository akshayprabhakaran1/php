function createPagination(pagenator) {

    var navBar = document.createElement('nav')

    var previousBtn = document.createElement('a')
    var nextBtn = document.createElement('a')

    var ul = document.createElement('ul')
    $(ul).addClass("pagination")

    if (pagenator.total_pages > 0) {

        li = document.createElement('li')
        $(previousBtn).addClass((pagenator.previous) ? "page-link navigate" : "page-link disabled")
        $(previousBtn).attr('data-page', (pagenator.previous) ? pagenator.previous : "")
        $(previousBtn).text('Previous')
        $(li).addClass("page-item")
        $(li).append(previousBtn)
        $(ul).append(li)

        for (i = 1; i <= pagenator.total_pages; i++) {

            li = document.createElement('li')
            page = $("<a>").attr('data-page', i)
            $(page).addClass((pagenator.current_page == i) ? "page-link active navigate" : "page-link navigate")
            $(page).text(i)
            $(li).addClass("page-item")
            $(li).append(page)
            $(ul).append(li)
        }

        li = document.createElement('li')
        $(nextBtn).addClass((pagenator.next) ? "page-link navigate" : "page-link disabled")
        $(nextBtn).attr('data-page', (pagenator.next) ? pagenator.next : "")
        $(nextBtn).text('Next')
        $(li).addClass("page-item")
        $(li).append(nextBtn)
        $(ul).append(li)
    }
    $(navBar).append(ul)
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

function getRecords(search_collection = {}, sort = {}, page = 1) {
    $.ajax({
        url: "search.php",
        method: "POST",
        data: {
            search_term: (typeof search_collection == 'string') ? JSON.parse(search_collection) : search_collection,
            sort: (typeof sort == 'string') ? JSON.parse(sort) : sort,
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
    sessionStorage.clear();
    getRecords()

    $(".search").on("keyup", function (e) {
        e.preventDefault();

        let table_attr = this.id

        let search_term = $("#" + table_attr).val()
        search_collection[table_attr] = "%" + search_term + "%"

        sessionStorage.setItem('search', JSON.stringify(search_collection))

        getRecords(search_collection)
    });

    $(document).on('click', ".navigate", function (e) {
        e.preventDefault()
        pageNo = $(this).attr("data-page")
        getRecords(sessionStorage.getItem('search'), sessionStorage.getItem('sort'), pageNo)
    });

    $(document).on('click', ".sort", function (e) {
        e.preventDefault()
        let pageNo
        sorting = {}
        sorting['order'] = $(this).attr("data-order")
        sorting['type'] = $(this).attr("data-type")

        sessionStorage.setItem('sort', JSON.stringify(sorting))

        $(document).on('click', ".navigate", function (e) {
            e.preventDefault()
            pageNo = $(this).attr("data-page")
        });

        if (pageNo == null) {
            pageNo = 1
        }
        getRecords(sessionStorage.getItem('search'), sorting, pageNo)
    });
});