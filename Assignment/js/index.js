$(document).ready(function () {
    // console.log("Sf")
    $(".search").keyup(function () {
        // console.log("Sk")
        var ids = this.id
        var term = $("#" + ids).val()
        // var arr = { ids: ids, term: term }
        // var search = JSON.stringify()
        // console.log(ids, term)
        $.ajax({
            url: "search.php",
            method: "POST",
            // processData: false,
            // contentType: false,
            data: { id: this.id, term: term },
            success: function (data) {
                // $(".result-table").html(data)
                console.log(data)
            },
            error: function (err) {
                console.log(err)
            }
        })
    })
})