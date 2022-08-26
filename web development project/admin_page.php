<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

if(isset($_FILES['image'])){
  $errors= array();
  $file_name = $_FILES['image']['name'];
  $file_size =$_FILES['image']['size'];
  $file_tmp =$_FILES['image']['tmp_name'];
  $file_type=$_FILES['image']['type'];
  $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
  
  $extensions= array("jpeg","jpg","png");
  
  if(in_array($file_ext,$extensions)=== false){
     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
  }
  
  if($file_size > 2097152){
     $errors[]='File size must be excately 2 MB';
  }
  
  if(empty($errors)==true){
     move_uploaded_file($file_tmp,"upload-images/".$file_name);
     echo "Success";
  }else{
     print_r($errors);
  }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="css/style_admin.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin panel</title>
  </head>
  <body class="bg-right">
  <div class="container">

   <a href="logout.php" class="btn">logout</a>

</div>
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-md-10 col-11 mx-auto">
          
          <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb  bg-commom">
               
              <li class="breadcrumb-item active" aria-current="page">Welcome Admin</li>
            </ol>
            
          <div class="row">
            <!-- right side navbar -->
            <div class="col-lg-3 col-md-4 d-md-block">
              <div class="card bg-common card-left bg-commom">
                <div class="card-body">
                  <nav class="nav d-md-block d-none">
                    <a data-toggle='tab' class="nav-link active" aria-current="page" href="#profile">
                    <i class="fas fa-user mr-1"></i> Profile</a>
                    <a data-toggle='tab' class="nav-link" href="#account">
                    <i class="fas fa-monument mr-1"></i> Add Monuments</a>
                    <a data-toggle='tab' class="nav-link" href="#security">
                    <i class="fas fa-user-shield mr-1"></i> Security</a>
                    <a data-toggle='tab' class="nav-link" href="#notification">
                    <i class="fas fa-bell mr-1"></i> Notification</a>
                    <a data-toggle='tab' class="nav-link" href="#billing">
                    <i class="fas fa-money-check-alt mr-1"></i> Billing</a>
                    
                  </nav>
                </div>
              </div>
            </div>
            <!-- right side div starts -->
            <div class="col-lg-9 col-md-8">
              <div class="card">
                <div class="card-header border-bottom mb-3 d-md-none ">
                  <ul class="nav nav-tabs card-header-tabs nav-fill">
                    <li class="nav-item">
                      <a  data-toggle="tab" class="nav-link active" aria-current="page" href="#profile"> <i class="fas fa-user mr-1"></i></a>
                    </li>
                    <li class="nav-item">
                      <a  data-toggle="tab" class="nav-link" href="#account"><i class="fas fa-monument mr-1"></i> </a>
                    </li>
                    <li class="nav-item">
                      <a  data-toggle="tab" class="nav-link" href="#security"> <i class="fas fa-user-shield mr-1"></i></a>
                    </li>
                    <li class="nav-item">
                      <a  data-toggle="tab" class="nav-link" href="#notification"> <i class="fas fa-bell mr-1"></i></a>
                    </li>
                    <li class="nav-item">
                      <a  data-toggle="tab" class="nav-link" href="#billing">  <i class="fas fa-money-check-alt mr-1"></i></a>
                    </li>
                    
                  </ul>
                </div>
                <!-- actual data which is live start -->
                <div class="card-body tab-content border-0 ">
                  
                  <!-- //actual profile data -->
                  <div class="tab-pane active" id="profile">
                    <h6>YOUR PROFILE INFORMATION</h6>
                    <hr>
                    <form>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Your Name" autocomplete="off">
                        <small class="form-text text-muted">Please Enter your fullname</small>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Your Bio</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Please enter something about yourself" autocomplete="off"></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">URL</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Url" autocomplete="off">
                        
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Location </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Location" autocomplete="off">
                      </div>
                      <div class="form-group form-text text-muted small">
                        All of the fields on this page are optional and can be deleted at any time, and by filling them out, you're giving us consent to share this data wherever your user profile appears.
                      </div>
                      <br>
                      <button class="btn btn-outline-info" type="button">Update Profile</button>
                      <button class="btn btn-outline-info" type="reset">Reset Changes</button>
                    </form>
                  </div>
                  <!-- //actual account data -->
                  <div class="tab-pane " id="account">
                    <h6>ADD MONUMENTS</h6>
                    <hr>
                    <form action="" method="post" enctype="multipart/form-data">
                        
                        <label for="myfile">Add Monument Image:</label>
                        &nbsp
                        &nbsp
                        <input type="file" id="myfile" name="image"><br>

                    
                      

                    <br>
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Monument Place:</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name of the place" autocomplete="off">
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ticket Price:</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter Ticket price" autocomplete="off">
                        <small class="form-text text-muted"> </small>
                      <div class="mb-3">
                         <br> 

                        <label for="exampleFormControlInput1" class="form-label">URL:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter URL" autocomplete="off">
                        <br>

                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Location </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Location of place" autocomplete="off">
                        
                      </div>
                        <br>
                         <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Monument Description:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Enter Description of Place" autocomplete="off"></textarea>
                      </div>
                        
                      </div>
                      </div>
                      <div id="show_item">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="feature[]" id="" class="form-control"
                                placeholder="Add Feature" autocomplete="off">
                            </div>

                            <div class="col-md-4 mb-3">
                                <input type="number" name="price[]" id="" class="form-control"
                                placeholder="Feature price" autocomplete="off">
                            </div>

                            
                            <div class="col-md-2 mb-3 d-grid">
                                <button class="btn btn-success add_item_btn">Add More</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    
                      <!-- <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-danger"></label>
                        <p class="text-muted"></p>
                      </div> -->
                      
                      <button class="btn btn-outline-info" type="submit">Submit</button>
                    </form>
                  </div>
                  <!-- //actual security data -->
                  <div class="tab-pane " id="security">
                    <h6>SECURITY SETTINGS</h6>
                    <hr>
                    <form>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Change Password</label>
                        <input type="Password" class="form-control" id="exampleFormControlInput1" placeholder="your current Password" autocomplete="off">
                        <br>
                        <input type="Password" class="form-control" id="exampleFormControlInput1" placeholder="your new Password" autocomplete="off">
                        <input type="Password" class="form-control" id="exampleFormControlInput1" placeholder="confirm new Password" autocomplete="off">
                        
                      </div>
                    </form>
                    <hr>
                    <form>
                      <div class="form-group">
                        <label class="d-block mb-2">Two Factor Authentication</label>
                        <button class="btn btn-outline-info" type="submit"> Enable two-factor authentication</button>
                        <p class="text-muted small ">Two-factor authentication adds an additional layer of security to your account by requiring more than just a password to log in.</p>
                      </div>
                    </form>
                    <hr>
                    <form>
                      <div class="form-group">
                        <label class="d-block mb-2">Sessions</label>
                        <p class="text-muted small ">This is a list of devices that have logged into your account. Revoke any sessions that you do not recognize.</p>
                        <ul class="list-group ">
                          <li class="list-group-item">
                            <div>
                              
                              <small class="text-muted">Your current session seen in India</small>
                            </div>
                            <button class="btn btn-light btn-sm ml-auto" type="button">More Info</button>
                          </li>
                        </ul>
                        
                      </div>
                    </form>
                  </div>
                  <!-- //actual notification data -->
                  <div class="tab-pane " id="notification">
                    <h6>NOTIFICATION SETTINGS</h6>
                    <hr>
                    <form>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label d-block">Security Alerts</label>
                        <small class="form-text text-muted">Receive security alert notifications via email</small>
                        
                        <div class="form-check mt-3">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                          <label class="form-check-label" for="flexCheckDefault">
                            Email each time a vulnerability is found
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                          <label class="form-check-label" for="flexCheckDefault">
                            Email a digest summary of vulnerability
                          </label>
                        </div>
                      </div>
                      <!-- //sms notification -->
                      <div class="mb-3">
                        <label class="d-block mb-2">SMS Notifications</label>
                        <ul class="list-group">
                          <li class="list-group-item">
                            Comments
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                              <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                            </div>
                          </li>
                          <li class="list-group-item">
                            Updates From People
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                              <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                            </div>
                          </li>
                          <li class="list-group-item">
                            Reminders
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                              <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                            </div>
                          </li>
                          <li class="list-group-item">
                            Events
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                              <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                            </div>
                          </li>
                          <li class="list-group-item">
                            Pages You Follow
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                              <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </form>
                  </div>
                  <!-- //actual billing data -->
                  <div class="tab-pane " id="billing">
                    <h6>BILLING SETTINGS</h6>
                    <hr>
                    <form>
                      <div class="mb-3">
                        <label class="d-block">Payment Method</label>
                        <small class="text-muted small">You have not added a payment method</small>
                        <br>
                        <button class="btn btn-outline-info mt-2"> Add Payment Method</button>
                      </div>
                      <div class="mb-3">
                        <label class="d-block">Payment History</label>
                        <div class="border p-3 text-center">
                          You have not made any payment.
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".add_item_btn").click(function(e){
                e.preventDefault();
                $("#show_item").prepend(`<div class="row">
                    <div class="col-md-6 mb-3">
                                        <input type="text" name="feature[]" id="" class="form-control"
                                        placeholder="Add Feature" autocomplete="off">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <input type="number" name="price[]" id="" class="form-control"
                                        placeholder="Feature price" autocomplete="off">
                                    </div>
                                        
                                            
                                            <div class="col-md-2 mb-3 d-grid">
                                                <button class="btn btn-danger remove_item_btn">Remove</button>
                                            </div>
                                        </div>`);
            });
            $(document).on('click', '.remove_item_btn', function(e) {
                e.preventDefault();
                let row_item = $(this).parent().parent();
                $(row_item).remove();
            });
        });
    </script>
  </body>
</html>



 

 