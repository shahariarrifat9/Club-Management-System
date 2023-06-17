<?php include('clubPost_Fetch.php'); ?>
<?php
$conn = mysqli_connect("localhost", "root", "", "uiucms");
$query = "select * from post";
$connect = mysqli_query($conn, $query);
$num = mysqli_num_rows($connect);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>club page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="./image_files/animate.css">
	<link rel="stylesheet" type="text/css" href="./image_files/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./image_files/flatpickr.min.css">
	<link rel="stylesheet" type="text/css" href="./image_files/line-awesome.css">
	<link rel="stylesheet" type="text/css" href="./image_files/line-awesome-font-awesome.min.css">
	<link href="./image_files/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="./image_files/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./image_files/slick.css">
	<link rel="stylesheet" type="text/css" href="./image_files/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="./image_files/style.css">
	<link rel="stylesheet" type="text/css" href="./image_files/responsive.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.css" rel="stylesheet" />
</head>

<body data-new-gr-c-s-check-loaded="14.1073.0" data-gr-ext-installed="">
	<style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap');

        * {
            font-family: 'Source Sans Pro', sans-serif;
        }
        body{
            background-color: #f2f2f2;
        }

        .navbar{
            background-color: #FFC000;
			width: 100%;
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
						<img src="https://mdbcdn.b-cdn.net/img/new/avatars/1.webp" class="rounded-circle" height="22"
							alt="Black and White Portrait of a Man" loading="lazy" />
                            <?php
						if ($num > 0) {
							while ($data = mysqli_fetch_assoc($connect)) {
								echo "
							<strong> " . $data["user"] . "</strong>
							";
							}
						}

						?>
						<!--<strong class="d-none d-sm-block ms-1">Nola Rifat</strong>-->
					</a>
				</li>
				
			</ul>
            
		</div>
	</nav>
	<div class="wrapper">
		
		<section class="cover-sec">
			<img src="./image_files/rcover.jpg" alt="">
		</section>
		<main>
			<div class="main-section">
				<div class="container">
					<div class="main-section-data">
						<div class="row">
							<div class="col-lg-3">
								<div class="main-left-sidebar">
									<div class="user_profile">
										<div class="user-pro-img">
											<img src="./image_files/rsz_robotics-profile.png" alt="">
										</div>
										<div class="user_pro_status">
											<ul class="flw-hr">
												<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
														title="" class="flww"><i class="la la-plus"></i> Follow</a></li>
											</ul>
											<ul class="flw-status">
												<li>
													<span>Following</span>
													<b>34</b>
												</li>
												<li>
													<span>Followers</span>
													<b>155</b>
												</li>
											</ul>
										</div> 
										<ul class="social_links">
											<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
													title=""><i class="la la-globe"></i> www.example.com</a></li>
											<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
													title=""><i class="fa fa-facebook-square"></i>
													Http://www.facebook.com/john...</a></li>
											<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
													title=""><i class="fa fa-twitter"></i>
													Http://www.Twitter.com/john...</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="main-ws-sec">
									<div class="user-tab-sec">
										<h3>UIU Robotics</h3>
										<div class="star-descp">
											<span>Established Since 2017</span>
											<ul>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star-half-o"></i></li>
											</ul> 
										</div>
									</div>
                                    <div class="post-topbar">
                                        <div class="user-picy">
                                           <img src="./image_files/rsz_11rsz_robotics-profile.png" alt="">
                                        </div>
                                        <div class="post-st">
                                           <ul>
                                              <li><a class="post_project" href="https://gambolthemes.net/workwise-new/index.html#" title="">Post a Project</a></li>
                                              <li><a class="post-jb active" href="https://gambolthemes.net/workwise-new/index.html#" title="">Post a Job</a></li>
                                            </ul>
                                        </div>
                                    </div>
									<div class="product-feed-tab current" id="feed-dd">
										<div class="posts-section">
											<div class="post-bar">
												<div class="post_topbar">
													<div class="usy-dt">
														<img src="./image_files/rsz_11rsz_robotics-profile.png"
															alt="">
														<div class="usy-name">
                                                        <?php
																if ($num > 0) {
																	while ($data = mysqli_fetch_assoc($connect)) {
																		echo "<strong> " . $data["user"] . "</strong>";
																	}
																}

														?>
															<h3>UIU Robotics</h3>
															<span><img src="./image_files/clock.png"
																	alt="">2:41 am</span>
														</div>
													</div>
													<div class="ed-opts">
														<a href="https://gambolthemes.net/workwise-new/company-profile.html#"
															title="" class="ed-opts-open"><i
																class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																	title="">Edit Post</a></li>
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																	title="">Unsaved</a></li>
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																	title="">Unbid</a></li>
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																	title="">Close</a></li>
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																	title="">Hide</a></li>
														</ul>
													</div>
												</div>
												<div class="epi-sec">
                                                <?php
																if ($num > 0) {
																	while ($data = mysqli_fetch_assoc($connect)) {
																		echo "<strong> " . $data["user"] . "</strong>";
																	}
																}

												?>
													<p>Innobotics 2020 was a hit! <a
															href="https://gambolthemes.net/workwise-new/company-profile.html#"
															title="">view more</a></p>
												</div>
												<div class="job-status-bar">
													<ul class="like-com">
														<li>
															<a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																class="active"><i class="fas fa-heart"></i> Like</a>
															<img src="./image_files/liked-img.png"
																alt="">
                                                                <?php
																if ($num > 0) {
																	while ($data = mysqli_fetch_assoc($connect)) {
																		echo "
																		<span>".$data["total_reaction"]."</span>";
																	}
																}

																?>
															<span>546</span>
														</li>
														<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																class="com"><i class="fas fa-comment-alt"></i> Comments
																15</a></li>
													</ul>
													<a
														href="https://gambolthemes.net/workwise-new/company-profile.html#"><i
															class="fas fa-eye"></i>Views 50</a>
												</div>
											</div>
											<div class="post-bar">
												<div class="post_topbar">
													<div class="usy-dt">
														<img src="./image_files/rsz_11rsz_robotics-profile.png"
															alt="">
														<div class="usy-name">
															<h3>UIU Robotics</h3>
															<span><img src="./image_files/clock.png"
																	alt="">  <?php echo $time ?> 2:43am</span>
														</div>
													</div>
													<div class="ed-opts">
														<a href="https://gambolthemes.net/workwise-new/company-profile.html#"
															title="" class="ed-opts-open"><i
																class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																	title="">Edit Post</a></li>
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																	title="">Unsaved</a></li>
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																	title="">Unbid</a></li>
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																	title="">Close</a></li>
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																	title="">Hide</a></li>
														</ul>
													</div>
												</div>
												<div class="epi-sec">
                                                <?php
																if ($num > 0) {
																	while ($data = mysqli_fetch_assoc($connect)) {
																		echo "<strong> " . $data["user"] . "</strong>";
																	}
																}

												?>
                                                    <p> 
                                                        <?php echo $post_text ?>
                                                        Congratulations UIU Mars Rover!
                                                        #mavencrew
                                                         <a
															href="https://gambolthemes.net/workwise-new/company-profile.html#"
															title="">view more</a></p>
												</div>
												<div class="job-status-bar">
													<ul class="like-com">
														<li>
															<a
																href="https://gambolthemes.net/workwise-new/company-profile.html#"><i
																	class="fas fa-heart"></i> Like</a>
															<img src="./image_files/liked-img.png"
																alt="">
															<span>
													            <?php echo $post_raection ?>
                                                                322

                                                            </span>
														</li>
														<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																class="com"><i class="fas fa-comment-alt"></i> Comments
																15</a></li>
													</ul>
													<a
														href="https://gambolthemes.net/workwise-new/company-profile.html#"><i
															class="fas fa-eye"></i>Views 50</a>
												</div>
											</div>
											<div class="post-bar">
												<div class="post_topbar">
													<div class="usy-dt">
														<img src="./image_files/rsz_11rsz_robotics-profile.png"
															alt="">
														<div class="usy-name">
															<h3>UIU Robotics</h3>
															<span><img src="./image_files/clock.png"
																	alt="">12:23 am</span>
														</div>
													</div>
													<div class="ed-opts">
														<a href="https://gambolthemes.net/workwise-new/company-profile.html#"
															title="" class="ed-opts-open"><i
																class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																	title="">Edit Post</a></li>
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																	title="">Unsaved</a></li>
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																	title="">Unbid</a></li>
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																	title="">Close</a></li>
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																	title="">Hide</a></li>
														</ul>
													</div>
												</div>
												<div class="epi-sec">
                                                <?php
																if ($num > 0) {
																	while ($data = mysqli_fetch_assoc($connect)) {
																		echo "<strong> " . $data["user"] . "</strong>";
																	}
																}

												?>
													<p>Member Recruitment Coming Soon! <a
															href="https://gambolthemes.net/workwise-new/company-profile.html#"
															title="">view more</a></p>
												</div>
												<div class="job-status-bar">
													<ul class="like-com">
														<li>
															<a
																href="https://gambolthemes.net/workwise-new/company-profile.html#"><i
																	class="fas fa-heart"></i> Like</a>
															<img src="./image_files/liked-img.png"
																alt="">
                                                                <?php
																if ($num > 0) {
																	while ($data = mysqli_fetch_assoc($connect)) {
																		echo "
																		<span>".$data["total_reaction"]."</span>";
																	}
																}

																?>
															<span>109</span>
														</li>
														<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																class="com"><i class="fas fa-comment-alt"></i> Comments
																15</a></li>
													</ul>
													<a
														href="https://gambolthemes.net/workwise-new/company-profile.html#"><i
															class="fas fa-eye"></i>Views 50</a>
												</div>
											</div>
											<!--<div class="post-bar">
												<div class="post_topbar">
													<div class="usy-dt">
														<img src="./image_files/rsz_11rsz_robotics-profile.png"
															alt="">
														<div class="usy-name">
															<h3>UIU Robotics </h3>
															<span><img src="./image_files/clock.png"
																	alt="">3 min ago</span>
														</div>
													</div>
													<div class="ed-opts">
														<a href="https://gambolthemes.net/workwise-new/company-profile.html#"
															title="" class="ed-opts-open"><i
																class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																	title="">Edit Post</a></li>
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																	title="">Unsaved</a></li>
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																	title="">Unbid</a></li>
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																	title="">Close</a></li>
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																	title="">Hide</a></li>
														</ul>
													</div>
												</div>
												<div class="epi-sec">
                                                <?php
																if ($num > 0) {
																	while ($data = mysqli_fetch_assoc($connect)) {
																		echo "<strong> " . $data["user"] . "</strong>";
																	}
																}

												?>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
														luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id
														magna sit amet... <a
															href="https://gambolthemes.net/workwise-new/company-profile.html#"
															title="">view more</a></p>
												</div>
												<div class="job-status-bar">
													<ul class="like-com">
														<li>
															<a
																href="https://gambolthemes.net/workwise-new/company-profile.html#"><i
																	class="fas fa-heart"></i> Like</a>
															<img src="./image_files/liked-img.png"
																alt="">
                                                                <?php
																if ($num > 0) {
																	while ($data = mysqli_fetch_assoc($connect)) {
																		echo "
																		<span>".$data["total_reaction"]."</span>";
																	}
																}

																?>
															<span>25</span>
														</li>
														<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#"
																class="com"><i class="fas fa-comment-alt"></i> Comments
																15</a></li>
													</ul>
													<a
														href="https://gambolthemes.net/workwise-new/company-profile.html#"><i
															class="fas fa-eye"></i>Views 50</a>
												</div>
											</div>-->
											<div class="process-comm">
												<div class="spinner">
													<div class="bounce1"></div>
													<div class="bounce2"></div>
													<div class="bounce3"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						    <div class="col-lg-3">
								<div class="right-sidebar">
									<div class="message-btn">
										<a href="https://gambolthemes.net/workwise-new/company-profile.html#"
											title=""><i class="fa fa-envelope"></i> Message</a>
									</div>
								</div>
							</div> 
						</div>
					</div>
				</div>
			</div>
		</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.js"></script>
</body>
<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

</html>