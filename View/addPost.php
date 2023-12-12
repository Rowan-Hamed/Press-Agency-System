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
            background-color: #ffffff;
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

<?php include("../assets/navBar/navBar.php"); ?>

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
            <label for="postType">Post Type:</label>
            <input type="text" class="form-control" id="postType" name="postType" placeholder="Enter the post type" required>
        </div>

        <div class="form-group">
            <label for="urlToPhoto">URL to Photo:</label>
            <input type="file" class="form-control" id="urlToPhoto" name="urlToPhoto">
        </div>

        <button type="submit" class="btn btn-primary">Submit Post</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
