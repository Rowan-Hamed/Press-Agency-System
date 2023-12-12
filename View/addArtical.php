<<?php include ("../assets/navBar/navBar.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/addArtical.css">

    <title>Write_Posts</title>
</head>
<body>


<section class="art">
    <div class="container rounded bg-white mt-5 mb-5">
    <h1 class="add">Write_Posts</h1>
    <form action="../controller/addPost_controller.php" method="post" enctype="multipart/form-data">
        <div class="form-outline">
            <label class="form-label" for="Name">Name</label>
            <input type="text" id="Name" class="form-control form-control-lg" placeholder="Name" required name="name"/>   
          </div><br>
          <div class="form-outline">
            <label class="form-label" for="date">date</label>
            <input type="date" id="date" class="form-control form-control-lg" placeholder="date" required name="date"/>   
          </div><br>

          <div class="col-md-6 mb-4">
              <h6 class="mb-2 pb-1">Type_Post</h6>
              
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
          </div><br>
       
          <div class="form-outline">
            <label class="form-label" for="Title_Artical">Title_Post</label>
            <input type="text" id="Title_Artical" class="form-control form-control-lg" placeholder="Title_Post" required name="Title_Post"/>   
          </div><br>
        <div class="form-outline">
            <label class="form-check-label" for="Artical">post</label>
            <textarea id="Artical" name="post" class="form-control" placeholder="text" required rows="5"></textarea>
        </div><br>
          <div class="col-md-12">
            <label class="labels" for="photo">photo</label>
            <input type="file" name="photo" class="form-control" id="photo" >
            </div><br>

            <div class="d-flex justify-content-end pt-3">
                <button class="btn btn-outline-success" name="Add">Add</button> 
            </div>
    </form> 
 </div>
</div>
</section>  
</body>
</html>