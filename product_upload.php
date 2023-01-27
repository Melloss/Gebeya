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
        textarea{
            margin-top:10px;
            padding:5px 10px 5px 5px;
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
                    <li><a href="most_ordered_product.php">Most Ordered</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <div class="image_container">
            <h1>Product Upload</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
            <input type="file" name="image1">
            <input type="file" name="image2">
            <input type="file" name="image3">
            <input type="text" name="productName" placeholder="Enter Product Name...">
            <input type="text" name="productId" placeholder="Enter Product ID...">
            <input type="number" name="price" id="" placeholder="Enter Price...">
            <textarea name="description" cols="30" rows="5" placeholder="Product Description here..."></textarea>
            <input type="submit" value="Upload" name="upload">
            
            <?php
                $image1 = $_FILES["image1"];
                $image2 = $_FILES["image2"];
                $image3 = $_FILES["image3"];
                $productName = $_POST["productName"];
                $productId = $_POST["productId"];
                $price = $_POST["price"];
                $description = $_POST["description"];
                if(isset($image1) && isset($image2) && isset($image3) && !empty($price) && !empty($productName) && !empty($productId) && !empty($description)){
                    if(getimagesize($image1['tmp_name']) && getimagesize($image2['tmp_name']) && getimagesize($image3['tmp_name'])){
                        if(move_uploaded_file($image1['tmp_name'],"images/".$image1['name']) &&
                         move_uploaded_file($image2['tmp_name'],"images/".$image2['name']) &&
                         move_uploaded_file($image3['tmp_name'],"images/".$image3['name'])){
                            $file_info = fopen("info/".$productId.".php","w") or die("Unable to open the file");
                            fwrite($file_info,'
                            <!DOCTYPE html>
                            <html lang="en">
                            
                            <head>
                                <meta charset="UTF-8">
                                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <title>Gebeya</title>
                                <link rel="stylesheet" href="../style/style.css">
                                <link rel="stylesheet" href="../style/info_style.css">
                            
                                <link rel="stylesheet"
                                    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
                            </head>
                            <body>
                            <nav class="nav_container">
                                <div class="container">
                                    <div class="logo"><span class="material-symbols-outlined">shopping_bag</span>Gebeya</div>
                                    <div class="nav_bars">
                                        <ul>
                                            <li><a href="../index.php">Home</a></li>
                                            <li><a href="../contact.php">Contact</a></li>
                                            <li><a href="../admin_login.php">Login</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <header>
                                <div class="container">
                                    <p class="product_info">Product Name: <span>'.$productName.'</span></p>
                                    <p class="product_info">Product ID: <span>'.$productId.'</span></p>
                                    <p class="product_info">Price: <span>'.$price.' Birr</span></p>
                                    <p class="product_info">Description: <span>'.$description.'</span></p>
                                </div>
                            </header>
                            <section>
                                <div class="container">
                                    <div class="card">
                                        <img src="../images/'.$image1["name"].'" alt="">
                                    </div>
                                    <div class="card">
                                        <img src="../images/'.$image2["name"].'" alt="">
                                    </div>
                                    <div class="card">
                                        <img src="../images/'.$image3["name"].'" alt="">
                                    </div>
                                </div>
                            </section>
                            <footer>
                                <div class="containerr">
                                    <h3>Order via Telegram</h3>
                                    <div class="tg">
                                        <img src="../images/telegram.png" width="50px" height="50px"><a href="http://t.me/">Nigist Gebeya Bot</a>
                                    </div>
                                    <h3>Order via Telephone</h3>
                                    <div class="call1">
                                        <img src="../images/call.png" width="40px" height="40px"> <p>+251 93 278 3354</p>
                                    </div>
                                    <div class="call2">
                                        <img src="../images/call.png" width="40px" height="40px"> <p>+251 91 726 6009</p>   
                                    </div>     
                                </div>
                            </footer>
                        </body>

                        </html>
                            ');
                            fclose($file_info);
                            $image_names = file("images/image_names.txt") ?? "";
                            $file = fopen("images/image_names.txt","w") or die("Unable to open the file");
                            fwrite($file,$image1['name']."\n");
                            fwrite($file,$_POST['price']."\n");
                            fwrite($file,$productId.".php\n");
                            fclose($file);
                            $file_append = fopen("images/image_names.txt","a") or die("Unable to open the file");
                            foreach($image_names as $line){
                                fwrite($file_append,$line);
                            }
                            fclose($file);
                        }
                        else echo "failed to move the file!";
                    }
                    else echo "Error: File is not Image format!";
                }
            ?>
            </form>
        </div>

    </section>
</body>
</html>