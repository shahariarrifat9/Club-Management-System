<?php
    session_start();
    $user = $_SESSION['user'];
    $con = mysqli_connect("localhost", "root", "", "uiucms");
    $sql = "SELECT * FROM users WHERE id = '$user'";
    $result = $con->query($sql);
    $pro_pic = "";
    $d_name = "";
    $b_io = "";
    while($rows = mysqli_fetch_array($result)){
        extract($rows);
        $pro_pic.= $profile_pic;
        $d_name.= $name;
        $b_io.= $bio;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" type="text/css" href="./css/animate.css">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/line-awesome.css">
    <link rel="stylesheet" type="text/css" href="./css/line-awesome-font-awesome.min.css">
    <link href="./css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="./css/slick.css">
    <link rel="stylesheet" type="text/css" href="./css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/responsive.css">
    <script src="./js/jquery.mousewheel.min.js.download"></script>
    <title>Account Settings</title>
</head>

<body>
    <header>
            <div class="container">
                <div class="header-data">
                    <div class="logo">
                        <a href="#" title=""><img
                                src="./images/cms_logo.png" alt="" width= 32></a>
                    </div>
                    <div class="search-bar">
                        <form>
                            <input type="text" name="search" placeholder="Search...">
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <nav>
                        <ul>
                            <li>
                                <a href="#" title="">
                                    <span><i class="fa fa-home" aria-hidden="true"></i></span>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#" title=""
                                    class="not-box-openm">
                                    <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                    Messages
                                </a>
                                <div class="notification-box msg" id="message">
                                    <div class="nott-list">
                                        <div class="notfication-details">
                                            <div class="noty-user-img">
                                                <img src="./homepage_files/ny-img1.png" alt="">
                                            </div>
                                            <div class="notification-info">
                                                <h3><a href="https://gambolthemes.net/workwise-new/messages.html"
                                                        title="">Jassica William</a> </h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
                                                <span>2 min ago</span>
                                            </div>
                                        </div>
                                        <div class="view-all-nots">
                                            <a href="https://gambolthemes.net/workwise-new/messages.html" title="">View
                                                All Messsages</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#" title=""
                                    class="not-box-open">
                                    <span><i class="fa fa-bell" aria-hidden="true"></i></span>
                                    Notification
                                </a>
                                <div class="notification-box noti" id="notification">
                                    <div class="nott-list">
                                        <div class="notfication-details">
                                            <div class="noty-user-img">
                                                <img src="./homepage_files/ny-img1.png" alt="">
                                            </div>
                                            <div class="notification-info">
                                                <h3><a href="https://gambolthemes.net/workwise-new/index.html#"
                                                        title="">Jassica William</a> Comment on your project.</h3>
                                                <span>2 min ago</span>
                                            </div>
                                        </div>
                                        <div class="view-all-nots">
                                            <a href="https://gambolthemes.net/workwise-new/index.html#" title="">View
                                                All Notification</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <div class="menu-btn">
                        <a href="#" title=""><i
                                class="fa fa-bars"></i></a>
                    </div>
                    <div class="user-account">
                        <div class="user-info">
                            <img src="./images/pro_pic/<?php echo $pro_pic?>" alt="" width = 30 height = 30>
                            <i class="fa fa-sort" aria-hidden="true"></i>
                        </div>
                        <div class="user-account-settingss" id="users">
                            <h3>Custom Status</h3>
                            <div class="search_form">
                                <form>
                                    <input type="text" name="search">
                                    <button type="submit">Ok</button>
                                </form>
                            </div>
                            <h3>Setting</h3>
                            <ul class="us-links">
                                <li><a href="#"
                                        title="">Account Setting</a></li>
                                <li><a href="#" title="">Faqs</a></li>
                                <li><a href="#" title="">Terms &amp;
                                        Conditions</a></li>
                            </ul>
                            <h3 class="tc"><a href="logout.php"
                                    title="">Logout</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </header>


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
                            <!-- <hr>
                            <form action="">
                                <div class="form group">
                                    <label class="d-block mb-2">Two Factor Authentication</label>
                                    <button class="btn btn-outline-info" type="submit">Enable two-factor authenticaiton</button>
                                </div>
                            </form> -->
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