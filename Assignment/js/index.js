function createPagination(pagenator) {

    var navBar = document.createElement('nav')
    $(navBar).addClass("d-flex justify-content-center w-100")

    var previousBtn = document.createElement('a')
    var nextBtn = document.createElement('a')

    if(pagenator.total_pages > 0){

        $(previousBtn).addClass((pagenator.previous) ? "btn btn-primary" : "btn btn-primary disabled")
        $(previousBtn).attr('href', (pagenator.previous) ? "?page="+pagenator.previous : "#")
        $(previousBtn).text('Previous')
        $(navBar).append(previousBtn)

        for(i = 1; i <= pagenator.total_pages; i++){
            let page = $("<a>").attr('data-page', i)
            $(page).addClass((pagenator.current_page == i) ? "mx-2 btn btn-outline-primary" : "mx-2 btn")
            $(page).text(i)
            $(navBar).append(page)
        }

        $(nextBtn).addClass((pagenator.next) ? "btn btn-primary" : "btn btn-primary disabled")
        $(nextBtn).attr('href', (pagenator.next) ? "?page="+pagenator.next : "#")
        $(nextBtn).text('Next')
        $(navBar).append(nextBtn)
    }
    return navBar
}

function createTable(tableHeading, tableElements) {
    // var navBar = document.createElement('nav')
    for(i = 0; i < tableElements.length; i++) {
        var tableRow = document.createElement('tr')
        for(j = 0; j < tableHeading.length; j++) {
            var tableDesc = document.createElement('td')
            $(tableDesc).text(tableElements[i][tableHeading[j]])
            $(tableRow).append(tableDesc)
        }
    }
    return tableRow
}

function pageStart(table_attr, search_collection, pageNo) {
    $.ajax({
        url: "search.php",
        method: "POST",
        data: {
            table_attr: table_attr,
            search_term: search_collection,
            default: 'false',
            page: pageNo
        },
        success: function (data) {
            var navigation = $.parseJSON(data.navigation)
            var result = $.parseJSON(data.result)
            $("#pagination").html(createPagination(navigation))
            $('tbody').html(createTable(result[0], result[1]))
        },
        error: function (err) {
            console.log(err)
        },
    });
}

$(document).ready(function () {
    let search_collection = {};
    
    $(".search").on("keyup", function (e) {
        e.preventDefault();


        let table_attr = this.id
        // to get the initail page 
        const urlParams = new URLSearchParams(window.location.search);
        let pageNo = urlParams.get('pages');

        if (pageNo == null) {
            pageNo = 1
        }

        let search_term = $("#" + table_attr).val()
        search_collection[table_attr] = "%"+search_term+"%"

        // stroing in session for pagining purpose
        // sessionStorage.setItem('search', search_collection)
        // sessionStorage.setItem('search_term', search_term)
        // console.log(search_collection)
        // $("#" + table_attr).on("keyup", function () {

        // })

        if (!$.isEmptyObject(search_collection)) {

            // sending an ajax request to the search.php
            // to get the search result back
            
            // sending a request to navigator.php to get the correct pagination buttom navigation
            pageStart(table_attr, search_collection, pageNo)

        } else {

                // if search term is removed from the section
                // then to show the orginal table a request is send to
                // default.php
                $.ajax({

                    url: "search.php",
                    method: "POST",
                    data: {
                        default: 'true',
                        page: pageNo
                    },
                    success: function (data) {
                        $("tbody").html(data)
                    },
                    error: function (err) {
                        console.log(err)
                    },
                });

                // sending a request to navigator.php to get the correct pagination buttom navigation
                // for corresponding default page
                $.ajax({

                    url: "search.php",
                    method: "POST",
                    data: {
                        pagenation: "true",
                        default: 'false',
                        page: pageNo
                    },
                    success: function (data) {
                        $("nav").replaceWith(data);
                    },
                    error: function (err) {
                        console.log(err)
                    },
                });
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

        if (pageNo == null) {
            pageNo = 1
        }

        // getting the values from the session that was stored before
        let table_attr = sessionStorage.getItem('table_attr')
        let search_term = sessionStorage.getItem('search_term')
        // console.log(search_term)

        if (search_term != "") {

            // to getting the next page corresponding to the page with
            // offset and limit
            $.ajax({

                url: "search.php",
                method: "POST",
                data: {
                    table_attr: table_attr,
                    search_term: search_term,
                    default: 'false',
                    page: pageNo
                },
                success: function (data) {
                    // $("tbody").html(data)
                    console.log(data)
                },
                error: function (err) {
                    console.log(err)
                },
            });

            // sending a request to navigator.php to get the correct pagination buttom navigation
            // for corresponding default page
            $.ajax({

                url: "search.php",
                method: "POST",
                data: {
                    table_attr: table_attr,
                    search_term: search_term,
                    pagenation: "true",
                    default: 'false',
                    page: pageNo
                },
                success: function (data) {
                    $("nav").replaceWith(data);
                },
                error: function (err) {
                    console.log(err)
                },
            });
        }
    });
});