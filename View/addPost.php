<?php
    session_start();
    if(!isset($_SESSION['userType']) || (strtolower($_SESSION['userType']) !== "admin" && strtolower($_SESSION['userType']) !== "editor")) {
        header('Location: wall.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.91);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }

        .container h2 {
            color: #343a40;
        }

        .container label {
            color: #495057;
        }

        .container .form-control {
            border-radius: 5px;
        }

        .container .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
        }

        .container .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php include("../assets/navBar/navBar.php"); ?> </br></br></br></br>

    <div class="container">
    <h2>Add a Post</h2>
    <form action="../controller/addPost_controller.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter the post title" required>
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" id="content" name="content" rows="5" placeholder="Enter the post content" required></textarea>
        </div>

        <div class="form-group">
            <select class="form-control form-control-lg" id="Type-Aritcal" name="Artical-role" required >
                <option value="" disabled selected>choose Type-Aritcal...</option>
                <option value="Sport">Sport</option>
                <option value="Cinema">Cinema</option>
                <option value="political">political</option>
                <option value="Social">Social</option>
                <option value="scientific">scientific</option>
                <option value="Economic">Economic</option>
                <option value="health">Health</option>
        </select>
        </div>

        <div class="form-group">
            <label for="urlToPhoto">URL to Photo:</label>
            <input type="file" class="form-control" id="urlToPhoto" name="urlToPhoto">
        </div>

        <button type="submit" class="btn btn-primary">Submit Post</button>
    </form>
</div>


</body>
</html>
