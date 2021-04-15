<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>ThankYou!</title>
    <style>
        .greeting{
            font: 14px sans-serif; 
            text-align: center;
        }
    </style>
  </head>
  <body>
    <div class="greeting">
        <h1>Your Transaction is Successful!</h1>
        <h1>Thank you, <b><?php echo $_POST['first_name']." ".$_POST['last_name']; ?></b>. Enjoy your movie.</h1>
        <a href="book.php" class="btn btn-success ml-3">Browse Other Movies</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
  </body>
</html>