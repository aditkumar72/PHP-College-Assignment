<?php
// Initialize the session
session_start();
include('connection.php');
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $movie_title = $_POST['movie_title'];
    $movie_rating = $_POST['movie_rating'];
    $movie_genre = $_POST['movie_genre'];
    $movie_price = $_POST['movie_price'];

    $filename = $_FILES['movie_image']['name'];
    $tempname = $_FILES['movie_image']['tmp_name'];
    $folder = 'images/'.$filename;
    move_uploaded_file($tempname, $folder);

    $sql = "select * from movies where id =".$_POST['id'];
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count == 0){
        $sql = "insert into `movies` (`movie_title`, `movie_rating`, `movie_genre`, `movie_price`, `movie_image`) values ('$movie_title', '$movie_rating', '$movie_genre', '$movie_price', '$filename')";
        mysqli_query($con, $sql);
    }
    else{
        $row = mysqli_fetch_assoc($result);
        if(!empty($_FILES['movie_image']['name']))
            $sql = "update movies set movie_title='$movie_title', movie_rating='$movie_rating', movie_genre='$movie_genre', movie_price='$movie_price', movie_image='$filename' where id=".$row['id'];
        else
        $sql = "update movies set movie_title='$movie_title', movie_rating='$movie_rating', movie_genre='$movie_genre', movie_price='$movie_price' where id=".$row['id'];
        mysqli_query($con, $sql);
        unset($_GET['option']);
    }
}

if(isset($_GET['option']) && $_GET['option'] == 'del'){
    $sql = "delete from movies where id=".$_GET['id'];
    mysqli_query($con, $sql);
}
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        .greeting{
            font: 14px sans-serif; 
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="greeting">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Admin Page.</h1>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </div>
    
    <?php
        if(isset($_GET['option']) && $_GET['option'] == 'edit'){
            $sql = "select * from movies where id=".$_GET['id'];
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            echo "<div class='container'>
            <form action=''  method='post' enctype='multipart/form-data'>
                <p>
                    <label>Movie Title</label><br>
                    <input type='text' id= 'movie_title' name='movie_title' value='".$row['movie_title']."'>
                </p>
                <p>
                    <label>Ratings</label><br>
                    <input type='text' id= 'movie_rating' name='movie_rating' value='".$row['movie_rating']."'>
                </p>
                <p>
                    <label>Genre</label><br>
                    <input type='text' id= 'movie_genre' name='movie_genre' value='".$row['movie_genre']."'>
                </p>
                <p>
                    <label>Price</label><br>
                    <input type='text' id= 'movie_price' name='movie_price' value='".$row['movie_price']."'>
                </p>
                <p>
                    <input type='file' name='movie_image' id='movie_image' value=''/>
                </p>
                <p>
                    <input type='hidden' name='id' value=".$_GET['id'].">
                </p>
                <input type='submit' value='Edit Movie'>
            </form>
        </div>";
        }
        else{
            echo "<div class='container'>
            <form action=''  method='post' enctype='multipart/form-data'>
                <p>
                    <label>Movie Title</label><br>
                    <input type='text' id= 'movie_title' name='movie_title'>
                </p>
                <p>
                    <label>Ratings</label><br>
                    <input type='text' id='movie_rating' name='movie_rating'>
                </p>
                <p>
                    <label>Genre</label><br>
                    <input type='text' id='movie_genre' name='movie_genre'>
                </p>
                <p>
                    <label>Price</label><br>
                    <input type='text' id='movie_price' name='movie_price'>
                </p>
                <p>
                    <input type='file' name='movie_image' id='movie_image' >
                </p>
                <input type='submit' value='Add Movie'>
            </form>
        </div>";

        }
    ?>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">S.No</th>
                <th scope="col">Movie Image</th>
                <th scope="col">Movie Title</th>
                <th scope="col">Ratings</th>
                <th scope="col">Genre</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
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
                        <td> <a href='crud.php?id=".$row['id']."&option=edit' class='btn btn-primary btn-md' tabindex='-1' role='button'>Edit</a>  <a href='crud.php?id=".$row['id']."&option=del' class='btn btn-primary btn-md' tabindex='-1' role='button'>Delete</a>
                    </tr>";
                    }
                    
                    
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>