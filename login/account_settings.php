<?php
    session_start();
    $user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/b80eba6c42.js" crossorigin="anonymous"></script>
    <title>Account Settings</title>
</head>

<body>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Source Sans Pro', sans-serif;
        }
        body{
            background-color: #f2f2f2;
        }

        .navbar{
            background-color: #FFC000;
        }
        
    </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-orange bg-opacity-30" >
        <div class="container justify-content-between">
            <div class="d-flex">
                <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="#">
                    <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="20"
                        alt="MDB Logo" loading="lazy" style="margin-top: 2px;" />
                </a>

                <form class="input-group w-auto my-auto d-none d-sm-flex">
                    <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search"
                        style="min-width: 125px;" />
                    <span class="input-group-text border-0 d-none d-lg-flex"><i class="fas fa-search"></i></span>
                </form>
            </div>

            <ul class="navbar-nav flex-row">

                <li class="nav-item me-3 me-lg-1 active">
                    <a class="nav-link" href="#">
                        <span><i class="fas fa-home fa-lg"></i></span>
                    </a>
                </li>

                <li class="nav-item dropdown me-3 me-lg-1">
                    <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-comments fa-lg"></i>

                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Some news</a></li>
                        <li><a class="dropdown-item" href="#">Another news</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>

                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link d-sm-flex align-items-sm-center" href="#">
                        <img src="011191156.jpg" class="rounded-circle" height="30"
                            alt="Black and White Portrait of a Man" loading="lazy" />
                    </a>
                </li>
                
            </ul>

        </div>
    </nav>


    <div class="container mt-5">
        <div class="row">
            <!-- Right side navbar -->
            <div class="col-lg-3 col-md-4 d-md-block">
                <div class="card bg-common card-left">
                    <div class="card-body">
                        <nav class="nav d-md-block d-none">
                            <a data-mdb-toggle="tab" class="nav-link active" aria-current="page" href="#profile"><i class="fa-solid fa-user mr-1"></i> Profile</a>
                            <hr>
                            <a data-mdb-toggle="tab" class="nav-link" href="#picture"><i class="fa-solid fa-image"></i> Update Profile Picture</a>
                            <hr>
                            <a data-mdb-toggle="tab" class="nav-link" href="#password"><i class="fa-solid fa-lock"></i> Change Password</a>
                            <hr>
                            <a data-mdb-toggle="tab" class="nav-link" href="#notification"><i class="fa-solid fa-bell"></i> Notification</a>
                            <hr>
                            <a data-mdb-toggle="tab" class="nav-link" href="#terms"><i class="fa-solid fa-landmark"></i> Terms & Conditions</a>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- right side div starts -->
            <div class="col-lg-8 col-md-9">
                <div class="card">
                    <div class="card-header border-bottom mb-3 d-md-none">
                        <ul class="nav nav-tabs card-header-tabs nav-fill">
                            <li class="nav-item">
                              <a data-mdb-toggle="tab" class="nav-link active" aria-current="page" href="#profile"><i class="fa-solid fa-user mr-1"></i> </a>
                            </li>
                            <li class="nav-item">
                              <a data-mdb-toggle="tab" class="nav-link" href="#picture"><i class="fa-solid fa-image"></i> </a>
                            </li>
                            <li class="nav-item">
                              <a data-mdb-toggle="tab" class="nav-link" href="#password"><i class="fa-solid fa-lock"></i> </a>
                            </li>
                            <li class="nav-item">
                               <a data-mdb-toggle="tab" class="nav-link" href="#notification"><i class="fa-solid fa-bell"></i> </a>
                            </li>
                            <li class="nav-item">
                               <a data-mdb-toggle="tab"  class="nav-link" href="#terms"><i class="fa-solid fa-landmark"></i> </a>
                            </li>
                          </ul>
                    </div>

                    <!-- User Profile Start -->

                    <div class="card-body tab-content border-0">

                        <!-- Actual profile data start -->
                        <div class="tab-pane active" id="profile" >
                            <h6>YOUR PROFILE INFORMATION</h6>
                            <hr>

                            <?php
                                $con = mysqli_connect("localhost", "root", "", "uiucms");

                                
                                $sql = "SELECT * FROM users WHERE id = '$user'";
                                $result = $con->query($sql);
                            ?>

                            <form action="update_profile.php" method="POST">
                                <?php
                                    while($rows = mysqli_fetch_array($result)){
                                        extract($rows);
                                        ?>
                                        <div class="mb-3">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" placeholder="Your full name" value="<?php echo $name ?>" name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control" placeholder="e.g: name@xyz.com" value ="<?php echo $email ?>" name="email">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Your Bio</label>
                                            <textarea class="form-control" id rows="3" placeholder="I am a student of CSE department." value="<?php echo $bio ?>" name="bio"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">URL</label>
                                            <input type="text" class="form-control" placeholder="Facebook" value="<?php echo $fb ?>" name="fb">
                                            <input type="text" class="form-control mt-2" placeholder="LinkedIN" value="<?php echo $linked_in ?>" name="lnk">
                                            <input type="text" class="form-control mt-2" placeholder="GitHub" value="<?php echo $git ?>" name="git">
                                            <input type="text" class="form-control mt-2" placeholder="Personal Website" value="<?php echo $personal_web ?>" name="pweb">
                                            <small class="form-text text-muted">Please add your social platform</small>
                                        </div>
                                        <?php
                                    }

                                ?>
                                
                                
                                <div class="form-group form-text text-muted small">
                                    *All of fields of this page are optional and can be deleted at any time, 
                                    and by filling them out, you are giving us consent to share this data wherever your user profile appears.
                                </div>
                                <br>
                                <button class="btn mt-2" type="submit" style="background-color: #FFC000; color:white; font-weight: 600;" name="update_profile">Submit</button>
                            </form>
                        </div>
                        <div class="tab-pane" id="picture">
                            <h6>This is a update profile picture tab</h6>
                            <hr>
                            <form action="">
                                <label class="form-label">Please choose profile picture</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="inputGroupFile02">
                                    
                                </div>
                                <label class="form-label">Please choose cover picture</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="inputGroupFile02">
                                </div>
                                <button class="btn mt-2" type="submit" style="background-color: #FFC000; color:white; font-weight: 600;" name="button_submit">Submit</button>
                            </form>

                        </div>
                        
                        <div class="tab-pane" id="password">
                            <h6>PASSWORD SETTINGS</h6>
                            <hr>
                            <form action="change_password.php" method="POST">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Change Password</label>
                                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="your current password" name="cur_pass">
                                
                                    <input type="password" class="form-control mt-2" id="exampleFormControlInput1" placeholder="your new password" name="new_pass">
                                    <input type="password" class="form-control mt-2" id="exampleFormControlInput1" placeholder="confirm new password" name="conf_pass">
                                    <button class="btn mt-2" type="submit" style="background-color: #FFC000; color:white; font-weight: 600;" name="pass_but">Submit</button>
                                </div>
                                <hr>
                            </form>
                            
                        </div>
                        <div class="tab-pane" id="notification">
                            <h1>This is an notification tab</h1>
                        </div>
                        <div class="tab-pane" id="terms">
                            <h1>This is an terms tab</h1>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.js"></script>

</body>

</html>