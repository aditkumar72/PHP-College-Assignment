<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Movie Booking</title>
    <style>
        .greeting{
            font: 14px sans-serif; 
            text-align: center;
        }
    </style>
  </head>
  <body>
    <div class="greeting mt-3">
        <h1>Hello and Welcome to our site.</h1>
    </div>

    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">S.No</th>
                <th scope="col">Movie Image</th>
                <th scope="col">Movie Title</th>
                <th scope="col">Ratings</th>
                <th scope="col">Genre</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include('connection.php');
                    $sql = "select * from movies";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>
                        <th scope='row'>" .$row['id']. "</th>
                        <td><img src='images/".$row['movie_image']."' width=90px height=90px ></td>
                        <td>" .$row['movie_title']. "</td>
                        <td>".$row['movie_rating']. "</td>
                        <td>" .$row['movie_genre']. "</td>
                        <td>" .$row['movie_price']. "</td>
                        <td> <a href='checkout.php?id=".$row['id']."' class='btn btn-primary btn-md' tabindex='-1' role='button'>Book Movie</a></td>
                    </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>