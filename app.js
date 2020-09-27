$(document).ready(function () {
   
    $("#submit").on("click", function () {
        var token = $("#token").val();
        var type = $("#type").val();
         if (token == "") {
             alert("token is required");
             //return false;
        }else {
            $.ajax({
                url: "reaction.php",
                type: "GET",
                data: { type: type, token: token },
                success: function (response) {
                    if (response) {
                        alert("reaction activated successfully");
                    }
                }
            })
        }
    })
})

