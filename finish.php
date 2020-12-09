<?php
    session_start();
    // Validation vars
    $titleVal = true;
    $fileVal = true;
    $categoryVal = true;
    $priceVal = true;

    // TAKE DATA FROM FORM
    $title = $_POST["title"];
    $category = $_POST["category"];
    $price = $_POST["price"];

    // PRICE VALIDATION
    $priceCheck = (float)ltrim($price, "£");
    if($priceCheck < 5){
        $_SESSION["e_price"] = "Please provide a minimum fee";
        $priceVal = false;
    }

    // TITLE VALIDATION
    if(strlen($title) < 5 || strlen($title) > 50){
        $_SESSION["e_title"] = "Please provide a name for your quiz";
        $titleVal = false;
    }

    // CATEGORY VALIDATION
    if(empty($category)){
        $_SESSION["e_category"] = "Please select a category";
        $categoryVal = false;
    }

    // FILE VALIDATION
    if (isset($_FILES["fileUpload"]["tmp_name"]) && is_uploaded_file($_FILES["fileUpload"]["tmp_name"])){
        // Create Temp folder if not exist
        if(!file_exists("tmp")){
            mkdir("tmp");
        }
        // Clear Temp folder
        $tmpFiles = glob('tmp/*'); // get all file names
        foreach($tmpFiles as $file){ // iterate files
          if(is_file($file)) {
            unlink($file); // delete file
          }
        }
        // Save uploaded file
        move_uploaded_file($_FILES["fileUpload"]["tmp_name"], "tmp/".$_FILES["fileUpload"]["name"]);
    }else{
        $_SESSION["e_file"] = "error";
        $fileVal = false;
    }

    // VALID ALL VALIDATIONS
    if(!$titleVal || !$fileVal || !$categoryVal || !$priceVal){
        header("Location: index.php");
    }else{
        session_unset();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <!-- My Styles -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="finish">
    <div class="main-container">
        <h2 class="center-text">Quiz created, thank you!</h2>
        <div class="container completed">
            <div class="quiz-content">
                <img src="tmp/<?php echo $_FILES['fileUpload']['name'];?>">
                <!-- Quiz data details -->
                <div class="details">
                    <p class="quiz-title"><?php echo $title; ?></p>
                    <div class="quiz-price">Entry Fee: <div class="price"><?php echo $price; ?></div></div>
                </div>
            </div>
            <!-- Quiz category -->
            <div class="category-container">
                <p>Quiz category: <b><?php echo $category; ?></b></p>
            </div>
        </div>
        <!-- Create new quiz button -->
        <a href="index.php" class="btn proceed btn-new">Create another one!</a>
    </div>
</body>
</html>