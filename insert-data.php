<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        #error-message {
            display: none;

        }

        #success-message {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Create New Record using AJAX PHP</h1>
        <table class="table">
            <form id="addform">
                <tr>
                    <td>Name</td>
                    <td><input type="text" required id="name" class="form-control"></td>
                </tr>
                <tr>

                    <td><input type="submit" id="savebtn" name="btn" class="btn btn-danger"></td>
                </tr>
            </form>

            <div class="alert alert-danger" id="error-message" role="alert"></div>
            <div class="alert alert-success" id="success-message" role="alert"></div>

            <tr>
                <td colspan="2" id="table-data"></td>
            </tr>

        </table>


        <script src="js/jquery.js"></script>
        <script>
            $(document).ready(function() {
                function loadtable() {
                    $.ajax({
                        url: "ajax-load.php",
                        type: "POST",
                        success: function(data) {
                            $("#table-data").html(data);
                        }
                    });
                }
                loadtable();

                $("#savebtn").on("click", function(e) {
                    e.preventDefault();
                    var fname = $("#name").val();

                    if (fname == "") {
                        $("#success-message").slideUp();
                        $("#error-message").html("All Feild are Required").slideDown();
                    } else {
                        $.ajax({
                            url: "ajax-insert.php",
                            type: "POST",
                            data: {
                                firstname: fname
                            },
                            success: function(data) {
                                if (data == 1) {
                                    loadtable();
                                    $("#addform").trigger("reset");
                                    $("#error-message").slideUp();
                                    
                                    $("#success-message").html("Data Save").slideDown();
                                    
                                } else {
                                    $("#error-message").html("Not Save");
                                }
                            }
                        });
                    }
                });
            });
        </script>


    </div>
</body>

</html>