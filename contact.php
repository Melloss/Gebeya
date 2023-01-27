<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>
        .image_info p{
            margin-bottom:20px;
        }
        .card img{
            width:350px;
            height:350px;
        }
        .card:hover .image_info,.card:focus .image_info{
            transform: translateY(-50%);
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
                    <li><a href="admin_login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <div class="container">
        <div class="card">
            <img src="images/nigist.jpg">
            <div class='image_info'>
                    <p>Nigist W/Mikael</p>
                    <p>+251 93 278 3354</p>
                    <div class='buy'>
                        <a href='https://t.me/mikk12'><span class="material-symbols-outlined">send</span>  Telegram
                        </a>
                    </div>
            </div>
        </div>
        <div class="card">
            <img src="images/miki.jpg">
            <div class='image_info'>
                    <p>Mikiyas Tekalign</p>
                    <p>+251 91 726 6009</p>
                    <div class='buy'>
                        <a href='https://t.me/mikk12'><span class="material-symbols-outlined">send</span>Telegram
                        </a>
                    </div>
            </div>
        </div>
        </div>
    </section>
    
</body>
</html>