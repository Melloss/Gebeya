<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebeya</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <nav class="nav_container">
        <div class="container">
            <div class="logo"><span class="material-symbols-outlined">shopping_bag</span>Gebeya</div>
            <div class="search">
                <form action="index.php" method="POST">
                    <input type="search" name="search">
                </form>
                
            </div>
            <div class="nav_bars">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="admin_login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section>
    <div class="new_product_con">
            <center><h1>Most Ordered Products</h1></center>
            <div class="new_products card">
                <?php
                    $image_names = file("images/most_ordered.txt");     
                    if(count($image_names) == 3){
                        echo "
                        <img src = \"images/".$image_names[0]."\">
                        <img src = \"images/".$image_names[1]."\">
                        <img src = \"images/".$image_names[2]."\">
                        ";
                    } 
                    else{
                        echo "<style>
                                .new_product_con{
                                    display:none;
                                }
                            </style>";
                    }          
                ?>
            </div>
        </div>
        <div class="container">
        <?php
        $search = $_POST['search'] ?? null;
        $image_names = file("images/image_names.txt") or die("No Product is Uploaded!");
        if(isset($search)){
            $isfound = false;
            for($i = 0; $i<count($image_names); $i++){
                if($i%3 === 0){
                    if($search == ""){
                        //header("Location: index.php");
                        echo '<script type="text/javascript">location.href = "index.php";</script>';
                    }
                    if($image_names[$i+1] != $search){
                        continue;
                        $isfound = false;
                    }
                    else{
                        echo "<style>
                                .new_product_con{
                                    display:none;
                                }
                            </style>";
                        $isfound = true;
                        echo "
                            <div class='card'>
                            <img src='images/".$image_names[$i]."'>
                            <div class='image_info'>
                                <p>".$image_names[$i+1]." Birr</p>
                                <div class='buy'>
                                    <a href='info/".$image_names[$i+2]."'><span class='material-symbols-outlined'>
                                        visibility
                                        </span>Quick view
                                    </a>
                                </div>
                            </div>
                            </div> "; 
                    }  
                }
            }
            if($isfound === false){
                echo "<style>
                                .new_product_con{
                                    display:none;
                                }
                            </style>";
                echo "<div class = 'container'><center><h2 style='color:brown'>$search Not Found!</h2></center></div>";
            }
        }
        else{
            for($i = 0; $i<count($image_names); $i++){
                if($i%3 === 0){
                    echo "
                    <div class='card'>
                    <img src='images/".$image_names[$i]."'>
                    <div class='image_info'>
                        <p>".$image_names[$i+1]." Birr</p>
                        <div class='buy'>
                            <a href='info/".$image_names[$i+2]."'><span class='material-symbols-outlined'>
                                visibility
                                </span>Quick view
                            </a>
                        </div>
                    </div>
                </div> 
                    ";   
                }
            }
        }
        ?>
        </div>
    </section>
</body>

</html>