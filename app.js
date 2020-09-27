$(document).ready(function () {
    const token = $("#token").val();
   
    $("#submit").on("click", function () {
        const type = $("#type").val();
         if (token === "") {
             alert("token is required");
             return false;
        }
        if (token !== "" && token.length > 20) {
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

