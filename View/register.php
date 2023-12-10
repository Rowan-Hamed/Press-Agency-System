<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/register.css">
    <title>Register</title>
</head>
<body>
     

    
                    <section class="vh-100 gradient-custom">
                        <div class="container py-5 h-100">
                            
                            <div class="row justify-content-center align-items-center h-100">
                            <div class="col-12 col-lg-9 col-xl-7">
                           
                                <div class="card-body p-4 p-md-5">
                                  <h1 class="mb-4 pb-2 pb-md-0 mb-md-5" id="register">Registration Form</h1>
                                  <form>
                      
                                    <div class="row">
                                      <div class="col-md-6 mb-4">
                      
                                        <div class="form-outline">
                                          <input type="text" id="firstName" class="form-control form-control-lg" placeholder="First_Name" required name="first_name"/>
                                          <label class="form-label" for="firstName">First Name</label>
                                        </div>
                      
                                      </div>
                                      <div class="col-md-6 mb-4">
                      
                                        <div class="form-outline">
                                          <input type="text" id="lastName" class="form-control form-control-lg" placeholder="Last_Name" required name="last_name" />
                                          <label class="form-label" for="lastName">Last Name</label>
                                        </div>
                      
                                      </div>
                                    </div>
                      
                                    <div class="row">
                                      <div class="col-md-6 mb-4 d-flex align-items-center">
                      
                                        <div class="form-outline datepicker w-100">
                                          <input type="text" class="form-control form-control-lg" id="birthdayDate" placeholder="Birthday" required name="birthdayDate"/>
                                          <label for="birthdayDate" class="form-label">Birthday</label>
                                        </div>
                      
                                      </div>
                                      <div class="col-md-6 mb-4">
                      
                                        <h6 class="mb-2 pb-1">User_Role </h6>
                      
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="type" id="viewer"
                                            value="option1" checked required/>
                                          <label class="form-check-label" for="viewer">Viewer</label>
                                        </div>
                      
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="type" id="Editor"
                                            value="option2"required />
                                          <label class="form-check-label" for="Editor">Editor</label>
                                        </div>
                      
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="type" id="admin"
                                            value="option3" required/>
                                          <label class="form-check-label" for="admin">admin</label>
                                        </div>
                      
                                      </div>
                                    </div>
                      
                                    <div class="row">
                                      <div class="col-md-6 mb-4 pb-2">
                      
                                        <div class="form-outline">
                                          <input type="email" id="emailAddress" class="form-control form-control-lg"  placeholder="Email" required name="email"/>
                                          <label class="form-label" for="emailAddress">Email</label>
                                        </div>
                      
                                      </div>
                                      <div class="col-md-6 mb-4 pb-2">
                      
                                        <div class="form-outline">
                                          <input type="tel" id="phoneNumber" class="form-control form-control-lg" placeholder="phone_Number" required name="phone_Number"/>
                                          <label class="form-label" for="phoneNumber">Phone Number</label>
                                        </div>
                      
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="labels" for="photo">photo</label>
                                        <input type="file" name="photo" class="form-control" id="photo" >
                                        </div>
                                    <div class="d-flex justify-content-end pt-3" >
                                    <div class="mt-4 pt-2">
                                      <input class="btn btn-primary btn-lg" type="submit" value="Submit" id="reg"/>
                                      <input class="btn btn-primary btn-lg" type="reset" value="Reset" id="res"/>
                                    </div>
                      </div>
                   
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
       
                </div>
            </div>
    
        </div>
</div>
</body>
</html>
