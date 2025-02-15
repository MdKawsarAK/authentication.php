<?php session_start();
require_once("db_config.php");

if(isset($_POST["btn"])){
    $name=trim($_POST["name"]);
    $password=trim($_POST["password"]);

    $result=$db->query("select id,name from users where name='$name' and password='$password'");
   
    list($id,$user)=$result->fetch_row();
   
    if($id!=null){
        $_SESSION["id"]=$id;
        $_SESSION["name"]=$user;

        header("location:home.php");
    }else{
        echo "user name or password incorrect";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
        <div>
            User<br>
            <input type="text" name="name" />
        </div>
        <div>
            Password<br>
            <input type="password" name="password" />
        </div>
        <div>          
            <input type="submit" name="btn" value="Login" />
        </div>
    </form>
</body>
</html>