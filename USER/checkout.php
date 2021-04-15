<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Checkout</title>
  </head>
  <body>
    <h1 style="text-align: center; margin-top: 5px;">Please fill up the checkout details</h1>
    <div class="container">
        <h2>Movie Details</h2>
        <?php
            include('connection.php');
            $sql = "select movie_title, movie_price, movie_image from movies where id=".$_GET['id'];
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            echo "<form action=''  method=''>
            <p>
                <label>Movie Image</label>
                <div>
                    <img src='images/".$row['movie_image']."' width=200px height=200px >
                </div>
            </p>
            <p>
                <label>Movie Title</label><br>
                <input type='text' id= 'movie_title' name='movie_title' value='".$row['movie_title']."' readonly>
            </p>
            <p>
                <label>Price</label><br>
                <input type='text' id='movie_price' name='movie_price' value=".$row['movie_price']." readonly>
            </p>
        </form>";
        ?>
    </div>
    <div class="container">
        <h2>User Details</h2>
        <form action="thankyou.php" method="post">
            <p>
                <label>First name</label><br>
                <input type="text" name="first_name" required>
            </p>
            <p>
                <label>Last name</label><br>
                <input type="text" name="last_name">
            </p>
            <p>
                <label>Email</label><br>
                <input type="email" name="email" required>
            </p>
            <p>
                <label>Phone number</label><br>
                <input type="tel" name="phone" required>
            </p>
            <p>
                <label>Country</label><br>
                <select>
                <option>India</option>
                <option>China</option>
                <option>United States</option>
                <option>Indonesia</option>
                <option>Brazil</option>
                </select>
            </p>
            <p>
                <label>Card Number</label><br>
                <input type="number" name="card_number" required>
            </p>
            <p>
                <label>CVV</label><br>
                <input type="number" name="cvv" required>
            </p>>
            <p>
                <button>Checkout</button>
                <button type="reset">Reset form</button>
            </p>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>