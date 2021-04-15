<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div id = "frm">  
        <h1>Login</h1>  
        <form name="f1" action = "authentication.php" method = "POST">  
            <p>  
                <label> UserName: </label>  
                <input type = "text" id ="user" name  = "user" required/>  
            </p>  
            <p>  
                <label> Password: </label>  
                <input type = "password" id ="pass" name  = "pass" required/>  
            </p>  
            <p>     
                <input type =  "submit" id = "btn" value = "Login" />
            </p>  
            <p>
                <input type="reset" id = "btn">
            </p>
        </form>  
    </div>  
</body>
</html>