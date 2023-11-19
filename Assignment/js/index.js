$(document).ready(function () {

    $(".search").on("keyup", function () {

        // to get the initail page 
        const urlParams = new URLSearchParams(window.location.search);
        let pageNo = urlParams.get('pages');

        if (pageNo == null) {
            pageNo = 1
        }

        let table_attr = this.id
        let search_term = $("#" + table_attr).val()

        // stroing in session for pagining purpose
        sessionStorage.setItem('table_attr', table_attr)
        sessionStorage.setItem('search_term', search_term)

        if (search_term != "") {

            // sending an ajax request to the search.php
            // to get the search result back
            $.ajax({

                url: "search.php",
                method: "POST",
                data: {
                    table_attr: this.id,
                    search_term: search_term,
                    page: pageNo
                },
                success: function (data) {
                    $("tbody").html(data)
                },
                error: function (err) {
                    console.log(err)
                }
            });

            // sending a request to navigator.php to get the correct pagination buttom navigation
            $.ajax({

                url: "./includes/navigator.php",
                method: "POST",
                data: {
                    table_attr: this.id,
                    search_term: search_term,
                    page: pageNo
                },
                success: function (data) {
                    $("nav").replaceWith(data);
                },
                error: function (err) {
                    console.log(err)
                }
            });

        } else {

            // if search term is removed from the section
            // then to show the orginal table a request is send to
            // default.php
            $.ajax({

                url: "./includes/default.php",
                method: "POST",
                data: {
                    table_attr: this.id,
                    search_term: search_term,
                    page: pageNo
                },
                success: function (data) {
                    $("tbody").html(data)
                },
                error: function (err) {
                    console.log(err)
                }
            });

            // sending a request to navigator.php to get the correct pagination buttom navigation
            // for corresponding default page
            $.ajax({

                url: "./includes/navigator.php",
                method: "POST",
                data: {
                    table_attr: this.id,
                    search_term: search_term,
                    page: pageNo
                },
                success: function (data) {
                    $("nav").replaceWith(data);
                },
                error: function (err) {
                    console.log(err)
                }
            });
        }
    });


    $(".navigate").click(function (e) {

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

        if (search_term != "") {

            // to getting the next page corresponding to the page with
            // offset and limit
            $.ajax({

                url: "./includes/nextPage.php",
                method: "POST",
                data: {
                    table_attr: table_attr,
                    search_term: search_term,
                    page: pageNo
                },
                success: function (data) {
                    $("tbody").html(data)
                },
                error: function (err) {
                    console.log(err)
                }
            });

            // sending a request to navigator.php to get the correct pagination buttom navigation
            // for corresponding default page
            $.ajax({

                url: "./includes/navigator.php",
                method: "POST",
                data: {
                    table_attr: table_attr,
                    search_term: search_term,
                    page: pageNo
                },
                success: function (data) {
                    $("nav").replaceWith(data);
                },
                error: function (err) {
                    console.log(err)
                }
            });
        }
    });
});