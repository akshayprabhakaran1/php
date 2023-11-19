$(document).ready(function () {
    $(".search").keyup(function () {
        var ids = this.id
        var term = $("#" + ids).val()
        $.ajax({
            url: "search.php",
            method: "POST",
            data: { id: this.id, term: term },
            success: function (data) {
                $(".result-table").html(data)
                // console.log(data)
            },
            error: function (err) {
                console.log(err)
            }
        })
    })
})