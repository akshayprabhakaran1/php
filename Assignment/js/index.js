$(document).ready(function () {
    $(".search").on("keyup", function () {
        // var newURLString = window.location.href +
        //     "&id=" + this.id +
        //     "&trem=" + $("#" + this.id).val();
        const urlParams = new URLSearchParams(window.location.search);
        let pageNo = urlParams.get('page');
        if (pageNo == null) {
            pageNo = 1
        }
        var ids = this.id
        var term = $("#" + ids).val()
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
                    console.log(data);
                },
                error: function (err) {
                    console.log(err)
                }
            });
            // window.location.href = newURLString;

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
                    // console.log(data);
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
                    console.log(data);
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
                    // console.log(data);
                },
                error: function (err) {
                    console.log(err)
                }
            });
        }
    });

    // $("#prev").on('click', function () {
    //     const urlParams = new URLSearchParams(window.location.search);
    //     let pageNo = urlParams.get('page');
    //     if (pageNo == null) {
    //         pageNo = 1
    //     }
    //     var ids = this.id
    //     var term = $("#" + ids).val()
    //     if (term != "") {
    //         $.ajax({
    //             url: "nextPage.php",
    //             method: "POST",
    //             data: {
    //                 id: this.id,
    //                 term: term,
    //                 page: pageNo
    //             },
    //             success: function (data) {
    //                 // var res = $.parseJSON(data);
    //                 $("tbody").html(data)
    //                 // console.log(data);
    //                 // $("#main").addClass(".d-flex .flex-column .align-items-center .justify-content-center .m-5");
    //             },
    //             error: function (err) {
    //                 console.log(err)
    //             }
    //         });
    //     }
    // });

    // $("#next").on('click', function () {
    //     console.log("next clicked")
    // })
});