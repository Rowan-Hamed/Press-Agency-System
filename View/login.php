<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>login</title>
</head>
<body>
    <div class="container mt-4" id="login">
        <h1 class="log">login</h1>
        <form action="register.html" method="post">

            <div class=" form-control-lg">
                <label for="username">Username</label>
                <input type="text" id="username" class="form-control" name="username" placeholder="Username" required>
            </div>

            <div class="form-control-lg mb-10">
                <label for="pass">passowrd</label>
                <input type="password" class="form-control" name="password" id="pass" placeholder="passowrd" required>
            </div>

            
            <div class="d-flex justify-content-end pt-3">
                <button class="btn btn-outline-success">Sign in</button>
                <button class="btn btn-outline-success ms-2">Sign up</button>
            </div>
        </div>

        </form>
    
    
</body>
</html>