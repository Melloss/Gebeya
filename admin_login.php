<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        form,section{
            display:flex;
            align-items:center;
            flex-direction:column;
        }
        h1,input[type="email"],input[type="password"]{
            margin-bottom:20px;
        }
        input[type="email"],input[type="password"]{
            padding:5px 5px 5px 10px;
            font-size:16px;
        }
        input[type="submit"]{
            padding:3px 10px;
            font-size:15px;
        }
    </style>
</head>

<body>
    <nav class="nav_container">
        <div class="container">
            <div class="logo"><span class="material-symbols-outlined">shopping_bag</span>Gebeya</div>
            <div class="nav_bars">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <h1>Admin Login</h1>
        <form action="admin_login.php" method="POST">
            <input type="email" name="email" placeholder="Email...">
            <input type="password" name="password" placeholder="Password...">
            <input type="submit" value="Login" name="login">
        </form>
        <?php
        if(isset($_POST['login'])){
            $email = $_POST['email'];
             $psw = $_POST['password'];
            if($email === "nigist@gmail.com" && $psw === "123"){
                //header("Location: product_upload.php");
                echo '<script type="text/javascript">location.href = "product_upload.php";</script>';
            }
        }
        ?>
    </section>
</body>
</html>