$(document).ready(function () {
    let ids
    let term
    $(".search").on("keyup", function () {
        const urlParams = new URLSearchParams(window.location.search);
        let pageNo = urlParams.get('pages');
        if (pageNo == null) {
            pageNo = 1
        }
        ids = this.id
        term = $("#" + ids).val()
        sessionStorage.setItem('ids', ids)
        sessionStorage.setItem('term', term)
        if (term != "") {
            $.ajax({
                url: "search.php",
                method: "POST",
                data: {
                    id: this.id,
                    term: term,
                    page: pageNo
                },
                success: function (data) {
                    $("tbody").html(data)
                    // console.log(data);
                },
                error: function (err) {
                    console.log(err)
                }
            });

            $.ajax({
                url: "./includes/navigator.php",
                method: "POST",
                data: {
                    id: this.id,
                    term: term,
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
            $.ajax({
                url: "./includes/default.php",
                method: "POST",
                data: {
                    id: this.id,
                    term: term,
                    page: pageNo
                },
                success: function (data) {
                    $("tbody").html(data)
                },
                error: function (err) {
                    console.log(err)
                }
            });
            $.ajax({
                url: "./includes/navigator.php",
                method: "POST",
                data: {
                    id: this.id,
                    term: term,
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
        pageNo = $(this).attr("data-page")
        if (pageNo == null) {
            pageNo = 1
        }
        ids = sessionStorage.getItem('ids')
        term = sessionStorage.getItem('term')
        if (term != "") {
            $.ajax({
                url: "./includes/nextPage.php",
                method: "POST",
                data: {
                    id: ids,
                    term: term,
                    page: pageNo
                },
                success: function (data) {
                    $("tbody").html(data)
                },
                error: function (err) {
                    console.log(err)
                }
            });

            $.ajax({
                url: "./includes/navigator.php",
                method: "POST",
                data: {
                    id: ids,
                    term: term,
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