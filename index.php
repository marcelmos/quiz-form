<?php
    // Start session
    session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <!-- My Styles -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form enctype="multipart/form-data" action="finish.php" method="post" class="main-container">
        <div class="container">
            <div class="column">
                <h2>Your quiz details:</h2>
                <!-- Quiz title -->
                <section>
                    <label for="ltitle">Quiz title</label>
                    <input <?php if(isset($_SESSION["e_title"])) echo "class='error-border-bottom' aria-invalid='true'"; else echo "aria-invalid='false'"; ?> type="text" id="ltitle" name="title" placeholder="Enter quiz title" >
                    <small>The title can't be longer than 50 chars.</small>
                    <!-- ERROR MESSAGE -->
                    <p class="error error-title">
                        <?php if(isset($_SESSION["e_title"])) {
                        echo $_SESSION["e_title"];
                        unset($_SESSION["e_title"]);} ?>
                    </p>
                </section>

                <!-- Select Image -->
                <section>
                    <label for="lfile">Quiz logo</label>
                    <div class="upload-file-wrapper <?php if(isset($_SESSION["e_file"])) echo "error-border"; ?>">
                        <div class="position-element">
                            <div class="btn upload">Upload custom logo</div>
                        </div>
                        <div class="position-element">
                            <input type="file" id="lfile" name="fileUpload" accept="image/png, image/jpeg" <?php if(isset($_SESSION["e_file"])) echo "aria-invalid='true'"; else echo "aria-invalid='false'"; ?>>
                        </div>
                    </div>

                    <p class="center-text"><small>.JPG, .PNG only</small></p>
                </section>
            </div>
            <div class="column mv">
                <h2>Select your quiz topic:</h2>
                <!-- Quiz Category -->
                <section>
                    <label for="lcategory">Category</label>
                    <div class="select">
                        <select <?php if(isset($_SESSION["e_category"])) echo "class='error-border-bottom' aria-invalid='true'"; else echo "aria-invalid='false'"; ?> id="lcategory" name="category" aria-invalid="false">
                            <option disabled selected>Choose category</option>
                            <option>General Knowledge</option>
                            <option>Movies</option>
                            <option>Science</option>
                            <option>Biology</option>
                            <option>Art</option>
                            <option>Sport</option>
                        </select>
                    </div>
                    <!-- ERROR MESSAGE -->
                    <p class="error error-category">
                        <?php if(isset($_SESSION["e_category"])) {
                        echo $_SESSION["e_category"];
                        unset($_SESSION["e_category"]);} ?>
                    </p>
                </section>

                <!-- Quiz Fee -->
                <section>
                    <label for="lprice">Quiz entry fee</label>
                    <input <?php if(isset($_SESSION["e_price"])) echo "class='error-border-bottom' aria-invalid='true'"; else echo "aria-invalid='false'"; ?> type="text" id="lprice" name="price" placeholder="£12.50" value="£12.50">
                    <small>Min. entry fee is £5.00</small>

                    <!-- ERROR MESSAGE -->
                    <p class="error error-price">
                        <?php if(isset($_SESSION["e_price"])) {
                        echo $_SESSION["e_price"];
                        unset($_SESSION["e_price"]);} ?>
                    </p>
                </section>
            </div>
        </div>
        <button type="submit" name="submit" class="btn proceed">Proceed</button>
    </form>

    <script src="js/script.js"></script>

</body>
<?php
// Clear all sessions
session_unset();
?>
</html>
