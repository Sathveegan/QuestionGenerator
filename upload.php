<?php

if(!isset($_SESSION))
    session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$target_dir = "uploads/";

$target_file = "";

if (file_exists($_FILES['imageFile']['tmp_name'])) {
    $target_file = $target_dir . (new DateTime())->getTimestamp() . "-" . basename($_FILES["imageFile"]["name"]);

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imageFile"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if image already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check image size
    if ($_FILES["imageFile"]["size"] > 500000) {
        echo "Sorry, your image is too large.";
        $uploadOk = 0;
    }
    // Allow certain image formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF images are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your image was not uploaded.";
        // if everything is ok, try to upload image
    } else {
        if (!move_uploaded_file($_FILES["imageFile"]["tmp_name"], $target_file)) {
            echo "Sorry, there was an error uploading your image.";
        }
    }
}

if (isset($_POST["question"]) && isset($_POST["answer1"]) && isset($_POST["answer2"]) && isset($_POST["answer3"]) && isset($_POST["answer4"])) {
    $stmt = $conn->prepare("INSERT INTO QTable(question_text, question_image, answer1, answer2, answer3, answer4) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $question_text, $question_image, $answer1, $answer2, $answer3, $answer4);

    $question_text = $_POST["question"];
    $question_image = $target_file; 
    $answer1 = $_POST["answer1"];
    $answer2 = $_POST["answer2"];
    $answer3 = $_POST["answer3"]; 
    $answer4 = $_POST["answer4"];

    if($stmt->execute() > 0)
        $_SESSION['result'] = '<div class="alert alert-success" role="alert">Insert Successfully</div>';
    else
        $_SESSION['result'] = '<div class="alert alert-danger" role="alert">Insert Unsuccessfull</div>';

    $stmt->close();
}

$conn->close();

header('Location: index.php');

?>
