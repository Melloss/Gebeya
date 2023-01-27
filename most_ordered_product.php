<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Upload</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        h1{
            text-align:center;
        }
        form{
            display:flex;
            flex-direction:column;
            align-items:center;
        }
        input{
            margin-top:15px;
        }
        input{
            padding:5px 10px 5px 5px;
            font-size:15px;
            font-weight:bold;
        }
        input[type="submit"]{
            padding:5px;
            font-size:15px;
            font-weight:bold;
            margin-bottom:10px;
        }
        input[type="file"]{
            font-size:15px;
            font-weight:bold;
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
    <div class="image_container">
            <h1>Most Ordered Product</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
            <input type="file" name="image1">
            <input type="file" name="image2">
            <input type="file" name="image3">
            <input type="submit" value="Upload" name="upload">
        </form>
    </div>
    <?php
        $image1 = $_FILES["image1"];
        $image2 = $_FILES["image2"];
        $image3 = $_FILES["image3"];
        if(isset($image1) && isset($image2) && isset($image3)){
            if(getimagesize($image1['tmp_name']) && getimagesize($image2['tmp_name']) && getimagesize($image3['tmp_name'])){
                if(move_uploaded_file($image1['tmp_name'],"images/".$image1['name']) &&
                 move_uploaded_file($image2['tmp_name'],"images/".$image2['name']) &&
                 move_uploaded_file($image3['tmp_name'],"images/".$image3['name'])){
                    $file = fopen('images/most_ordered.txt','w');
                    fwrite($file,$image1['name']."\n");
                    fwrite($file,$image1['name']."\n");
                    fwrite($file,$image1['name']);
                    fclose($file);
                 }
            }
        }
    ?>
    </section>
</body>
</html>