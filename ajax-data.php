<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <div class="container">
        <table class="table">
            <center>
                <h2>PHP WITH AJAX</h2>
            </center>
            <tr>
                <td id="table-load">
                    <input type="button" id="load-button" value="Load Data" class="btn btn-danger">
                </td>
            </tr>
            <tr>
                <td id="table-data">
                    <table class="table">
                    </table>
                </td>
            </tr>
        </table>
        <script src="js/jquery.js"></script>
        <script>
            $(document).ready(function() {
                $("#load-button").on("click", function(e) {
                    $.ajax({
                        url: "ajax-load.php",
                        type: "POST",
                        success: function(data) {
                            $("#table-data").html(data);
                        }
                    });
                });
            });
        </script>
    </div>
</body>
</html>