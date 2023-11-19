$(document).ready(function () {
    $(".search").on("keyup", function () {
        var ids = this.id
        var term = $("#" + ids).val()
        console.log("pressed")
        if (term != "") {
            $.ajax({
                url: "search.php",
                method: "POST",
                data: { id: this.id, term: term },
                success: function (data) {
                    $("tbody").html(data)
                    // $("#main").addClass(".d-flex .flex-column .align-items-center .justify-content-center .m-5");
                },
                error: function (err) {
                    console.log(err)
                }
            });
        }
    });
});