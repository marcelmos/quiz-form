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
                <h3>Your quiz details:</h3>
                <!-- Quiz title -->
                <label>
                    <p>Quiz title</p>
                    <input <?php if(isset($_SESSION["e_title"])) echo "style='border-bottom: solid 2px #FA4043;'"; ?> type="text" name="title" placeholder="Enter quiz title">
                    <small>The title can't be longer than 50 chars.</small>
                    <!-- ERROR MESSAGE -->
                    <p class="error error-title">
                        <?php if(isset($_SESSION["e_title"])) {
                        echo $_SESSION["e_title"];
                        unset($_SESSION["e_title"]);} ?>
                    </p>
                </label>

                <!-- Select Image -->
                <label>
                    <p>Quiz logo</p>
                    <div <?php if(isset($_SESSION["e_file"])) echo "style='border: solid 2px #FA4043;'"; ?> class="upload-file-wrapper">
                        <div class="position-element">
                            <div class="btn upload">Upload custom logo</div>
                        </div>
                        <div class="position-element">
                            <input type="file" name="fileUpload" accept="image/png, image/jpeg">
                        </div>
                    </div>

                    <p class="center-text"><small>.JPG, .PNG only</small></p>
                </label>
            </div>
            <div class="column mv">
                <h3>Select your quiz topic:</h3>
                <!-- Quiz Category -->
                <label>
                    <p>Category</p>
                    <div class="select">
                        <select <?php if(isset($_SESSION["e_category"])) echo "style='border-bottom: solid 2px #FA4043;'"; ?> name="category">
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
                </label>

                <!-- Quiz Fee -->
                <label>
                    <p>Quiz entry fee</p>
                    <input <?php if(isset($_SESSION["e_price"])) echo "style='border-bottom: solid 2px #FA4043;'"; ?> type="text" name="price" placeholder="£12.50">
                    <small>Min. entry fee is £5.00</small>

                    <!-- ERROR MESSAGE -->
                    <p class="error error-price">
                        <?php if(isset($_SESSION["e_price"])) {
                        echo $_SESSION["e_price"];
                        unset($_SESSION["e_price"]);} ?>
                    </p>
                </label>
            </div>
        </div>
        <button type="submit" name="submit" class="btn proceed">Proceed</button>
    </form>

<!-- Script link -->
    <script src="js/script.js"></script>

</body>
<?php
// Clear all sessions
session_unset();
?>
</html>