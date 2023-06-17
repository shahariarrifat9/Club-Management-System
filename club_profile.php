<?php
session_start();
include('includes/database.php');
include('includes/fetch-data.php');
$user = $_SESSION['user'];
$con = mysqli_connect("localhost", "root", "", "uiucms");
$sql = "SELECT * FROM users WHERE id = '$user'";
$result = $con->query($sql);
$pro_pic = "";
$d_name = "";
$b_io = "";
$c_p = "";
$f_b = "";
$li_in = "";
$gi_t = "";
$p_w = "";
while ($rows = mysqli_fetch_array($result)) {
	extract($rows);
	$pro_pic .= $profile_pic;
	$c_p .= $cover_pic;
	$d_name .= $name;
	$b_io .= $bio;
	$f_b .= $fb;
	$li_in .= $linked_in;
	$gi_t .= $git;
	$p_w = $personal_web;
}

$fol_in = 0;
$fol_er = 0;
$sql2 = "SELECT COUNT(follower) as total_followers FROM `followship` WHERE person =  '$user'";
$sql3 = "SELECT COUNT(person) as total_following FROM `followship` WHERE follower =  '$user'";
$result2 = $con->query($sql2);
$result3 = $con->query($sql3);
while ($rows = mysqli_fetch_array($result2)) {
	extract($rows);
	$fol_er = $total_followers;
}
while ($rows = mysqli_fetch_array($result3)) {
	extract($rows);
	$fol_in = $total_following;
}
function time_elapsed_string($datetime, $full = false)
{
	$now = new DateTime;
	$ago = new DateTime($datetime);
	$diff = $now->diff($ago);

	$diff->w = floor($diff->d / 7);
	$diff->d -= $diff->w * 7;

	$string = array(
		'y' => 'year',
		'm' => 'month',
		'w' => 'week',
		'd' => 'day',
		'h' => 'hour',
		'i' => 'minute',
		's' => 'second',
	);
	foreach ($string as $k => &$v) {
		if ($diff->$k) {
			$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
		} else {
			unset($string[$k]);
		}
	}

	if (!$full) $string = array_slice($string, 0, 1);
	return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>

<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>Profile</title>
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

	<style>
		.status-btn {
			border: none;
			color: white;
			padding: 5px 10px;
			width: 100px;
			cursor: pointer;
			box-shadow: 0px 0px 15px gray;
			float: right;
		}

		.approve {
			background-color: green;
		}

		.disapprove {
			background-color: red;
		}
	</style>
</head>

<body data-new-gr-c-s-check-loaded="14.1074.0" data-gr-ext-installed="">
	<div class="wrapper">
		<header>
			<div class="container">
				<div class="header-data">
					<div class="logo">
						<a href="#" title=""><img src="./images/cms_logo.png" alt="" width=32></a>
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
								<a href="home.php" title="">
									<span><i class="fa fa-home" aria-hidden="true"></i></span>
									Home
								</a>
							</li>
							<li>
								<a href="#" title="" class="not-box-openm">
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
												<h3><a href="https://gambolthemes.net/workwise-new/messages.html" title="">Jassica William</a> </h3>
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
								<a href="#" title="" class="not-box-open">
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
												<h3><a href="https://gambolthemes.net/workwise-new/index.html#" title="">Jassica William</a> Comment on your project.</h3>
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
						<a href="#" title=""><i class="fa fa-bars"></i></a>
					</div>
					<div class="user-account">
						<div class="user-info">
							<img src="./images/pro_pic/<?php echo $pro_pic ?>" alt="" width=30 height=30>
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
								<li><a href="#" title="">Account Setting</a></li>
								<li><a href="#" title="">Faqs</a></li>
								<li><a href="#" title="">Terms &amp;
										Conditions</a></li>
							</ul>
							<h3 class="tc"><a href="logout.php" title="">Logout</a></h3>
						</div>
					</div>
				</div>
			</div>
		</header>
		<section class="cover-sec">
			<img src="./images/cover_pic/<?php echo $c_p ?>" alt="">
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
											<img src="./images/pro_pic/<?php echo $pro_pic ?>" alt="" stylle="border-radius: 50%;">
										</div>
										<div class="user_pro_status">
											<ul class="flw-status">
												<li>
													<span>Following</span>
													<b><?php echo $fol_in ?></b>
												</li>
												<li>
													<span>Followers</span>
													<b><?php echo $fol_er ?></b>
												</li>
											</ul>
											<div>
												<ul class="flw-status pt-2">
													<li>
														<p><a href="member_rec_list.php">Recruit List</a></p>
													</li>
													<li>
														<p><a href="member_request_form.php">Request Form</a></p>
													</li>
												</ul>
											</div>

										</div>
										<ul class="social_links">
											<?php
											if ($f_b != null) {
											?>
												<li><a href="<?php echo $f_b ?>" title="" class="pb-1"><i class="fab fa-facebook" style="color: 	#4267B2;"></i> Facebook</a></li>
											<?php
											}
											?>
											<?php
											if ($li_in != null) {
											?>
												<li><a href="<?php echo $li_in ?>" title="" class="pb-1"><i class="fab fa-linkedin" style="color: #0072b1;"></i>Linked In</a></li>
											<?php
											}
											?>
											<?php
											if ($gi_t != null) {
											?>
												<li><a href="<?php echo $gi_t ?>" title="" class="pb-1"><i class="fab fa-github" style="color: black;"></i> Github</a></li>
											<?php
											}
											?>
											<?php
											if ($p_w != null) {
											?>
												<li><a href="<?php echo $p_w ?>" title="" class="pb-1"><i class="fas fa-globe" style="color: orange;"></i>Personal Website</a></li>
											<?php
											}
											?>
										</ul>
									</div>
								</div>
								<!-- <div class="right-sidebar">
									<div class="message-btn">
										<a href="#"
											title=""><i class="fas fa-cog"></i> Setting</a>
									</div>
								</div> -->
							</div>
							<div class="col-lg-9 col-md-8 no-pd">
								<div class="main-ws-sec">
									<div class="user-tab-sec rewivew">
										<h3><?php echo $d_name ?> <a href="settings.php"><i class="fas fa-edit"></i></a></h3>
										<div class="star-descp">
											<span><?php echo $b_io ?></span>
										</div>
										<div class="tab-feed st2 settingjb">
											<ul>
												<li data-tab="feed-dd" class="active">
													<a href="#" title="" style="color:#b2b2b2;">
														<i class="fa fa-rss mb-2" aria-hidden="true" style="font-size:23px;"></i>
														<span>Feed</span>
													</a>
												</li>
												<li data-tab="info-dd">
													<a href="#" title="" style="color:#b2b2b2;">
														<i class="fa fa-cubes mb-2" aria-hidden="true" style="font-size:23px;"></i>
														<span>logistic Request</span>
													</a>
												</li>
												<li data-tab="logistic-list">
													<a href="#" title="" style="color:#b2b2b2;">
														<i class="fa fa-cubes mb-2" aria-hidden="true" style="font-size:23px;"></i>
														<span>logistic List</span>
													</a>
												</li>
												<li data-tab="saved-jobs">
													<a href="#" title="" style="color:#b2b2b2;">
														<i class="fa fa-calendar mb-2" aria-hidden="true" style="font-size:23px;"></i>
														<span>Events Request</span>
													</a>
												</li>
												<li data-tab="creat-event">
													<a href="#" title="" style="color:#b2b2b2;">
														<i class="fa fa-calendar mb-2" aria-hidden="true" style="font-size:23px;"></i>
														<span>Events List</span>
													</a>
												</li>
												<li data-tab="member-rec">
													<a href="#" title="" style="color:#b2b2b2;">
														<i class="fa fa-calendar mb-2" aria-hidden="true" style="font-size:23px;"></i>
														<span>Member Recruitment</span>
													</a>
												</li>
												<li data-tab="approve-member">
													<a href="#" title="" style="color:#b2b2b2;">
														<i class="fa fa-calendar mb-2" aria-hidden="true" style="font-size:23px;"></i>
														<span>Approve Members</span>
													</a>
												</li>
												<li data-tab="club-members">
													<a href="#" title="" style="color:#b2b2b2;">
														<i class="fa fa-users mb-2" aria-hidden="true" style="font-size:23px;"></i>
														<span>Members</span>
													</a>
												</li>
												<!-- <li data-tab="portfolio-dd">
													<a href="#" title="" style="color:#b2b2b2;">
														<i class="fa fa-user-plus mb-2" aria-hidden="true" style="font-size:23px;"></i>
														<span>Following</span>
													</a>
												</li> -->


												<!-- <li data-tab="rewivewdata">
													<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
														title="">
														<img src="./profile_files/review.png" alt="">
														<span>Reviews</span>
													</a>
												</li>
												<li data-tab="payment-dd">
													<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
														title="">
														<img src="./profile_files/ic6.png" alt="">
														<span>Payment</span>
													</a>
												</li> -->
											</ul>
										</div>
									</div>
									<div class="product-feed-tab" id="creat-event">
										<div class="tab-content" id="myTabContent">
											<div class="tab-pane fade show active" id="mange" role="tabpanel" aria-labelledby="mange-tab">
												<?php
												$con = mysqli_connect("localhost", "root", "", "uiucms");
												$event_post = mysqli_query($con, "SELECT * FROM events WHERE status = '1' ORDER BY created_at DESC");
												if (mysqli_num_rows($event_post) > 0) {
													$data = mysqli_fetch_array($event_post);
												?>
													<div class="posts-bar">
														<div class="post-bar bgclr">
															<img class="event_images" src="images/<?php echo $data['event_image']; ?>" alt="">
															<div class="wordpressdevlp">
																<h2><?php echo $data['heading']; ?></h2>
																<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
															</div>
															<br>
															<p><?php echo $data['content']; ?></p>
															<br>
															<div class="row no-gutters">
																<div class="col-md-6 col-sm-12">
																	<div class="cadidatesbtn">
																		<?php

																		$status = 1;
																		$con3 = mysqli_connect("localhost", "root", "", "uiucms");
																		$show = mysqli_query($con3, "SELECT * FROM events");
																		$data5 = mysqli_fetch_array($show);
																		$perticipent = $data5['going'];
																		if (isset($_REQUEST['going'])) {

																			$going = mysqli_query($con3, "update events set going = going + 1 where id='{$data['id']}';");

																			mysqli_query($con, "insert into events_participant (user_id,event_id,status) 
																			values ('$user','{$data['id']}','$status')")
																				or die(mysqli_error($con));
																		}
																		ini_set('display_errors', 0);
																		$data6 = mysqli_query($con3, "SELECT * FROM events_participant p JOIN events e ON p.event_id = e.id");
																		$check1 = mysqli_fetch_array($data6);
																		if ($check1['status'] == '1') {
																		?>
																			<button class="btn btn-warning" disabled>Going</button>
																			Participent: <?php echo $perticipent ?>
																		<?php
																		} else {

																		?>
																			<form action="" method="post">
																				<button type="submit" class="btn btn-warning" name="going">Going</button>
																				Participent: <?php echo $perticipent ?>
																			</form>
																		<?php } ?>
																	</div>
																</div>
																<?php if ($_SESSION['role'] == 'dsa') { ?>
																	<div class="col-md-6 col-sm-12">
																		<button onclick="updateStatus(<?php echo $data['id']; ?>)" id="statusBtn<?php echo $data['id']; ?>" class="status-btn <?php echo $data['status'] == 0 ? 'approve' : 'disapprove'; ?>"><?php echo $data['status'] == 0 ? 'Approve' : 'Disapprove'; ?></button>
																	</div>
																<?php } else { ?>
																	<div class="col-md-6 col-sm-12"><br><br></div>
																<?php } ?>
															</div>
														</div>
													</div>
												<?php
												} else { ?>
													<div class="posts-bar">
														<div class="post-bar bgclr text-center">
															<h2>Event has not been approved yet.</h2>
														</div>
													</div>
												<?php } ?>
											</div>
										</div>
									</div>

									<div class="product-feed-tab" id="approve-member">
										<div class="tab-content" id="myTabContent">
											<div class="tab-pane fade show active" id="mange" role="tabpanel" aria-labelledby="mange-tab">
												<?php
												$con = mysqli_connect("localhost", "root", "", "uiucms");
												$sql66 = mysqli_query($con, "SELECT * FROM members m JOIN membership s ON m.club_id = s.club_id");
												if (mysqli_num_rows($sql66) > 0) {
													while ($rows = mysqli_fetch_array($sql66)) {
												?>
														<div class="col col-lg-6 my-1">
															<div class="mt-3 mb-3 d-flex align-items-center">

																<img src="./images/<?php echo $rows['mem_image'] ?>" alt="" width=100 style="border-radius: 20%;" class="mr-3">
																<a href=""> <strong>
																		<h3 class="ms-2"><?php echo $rows['full_name'] ?></h3>
																	</strong></a>
															</div>
														</div>
														<?php if ($_SESSION['role'] == 'club') { ?>
															<div class="col-md-6 col-sm-12 float-right">
																<button onclick="updateStatusMem(<?php echo $rows['club_id']; ?>)" id="statusBtn<?php echo $rows['club_id']; ?>" class="status-btn <?php echo $rows['status'] == 0 ? 'approve' : 'disapprove'; ?>"><?php echo $rows['status'] == 0 ? 'Approve' : 'Disapprove'; ?></button>
															</div>
														<?php } else { ?>
															<div class="col-md-6 col-sm-12 float-right"><br><br></div>
												<?php }
													}
												}

												?>
											</div>
										</div>
									</div>

									<div class="product-feed-tab" id="logistic-list">
										<div class="tab-content" id="myTabContent">
											<div class="tab-pane fade show active" id="mange" role="tabpanel" aria-labelledby="mange-tab">
												<?php
												$res00 = mysqli_query($con, "SELECT * FROM logistic ORDER BY created_at DESC");
												if (mysqli_num_rows($res00) > 0) {
													$data1 = mysqli_fetch_array($res00);
												?>
													<div class="posts-bar">
														<div class="post-bar bgclr">
															<div class="wordpressdevlp">
																<h2><?php echo $data1['logistic_name']; ?></h2>
																<span><img src="./homepage_files/clock.png" alt="">&nbsp;<?php echo $data1['logistic_date']; ?></span>
															</div>
															<br>
															<p><?php echo $data1['logistic_details']; ?></p>
															<br>
															<div class="row no-gutters">
																<div class="col-md-6 col-sm-12">
																	<div class="cadidatesbtn">
																		<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">
																			<i class="far fa-edit"></i>
																		</a>
																		<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">
																			<i class="far fa-trash-alt"></i>
																		</a>
																	</div>
																</div>
																<div class="col-md-6 col-sm-12"><br><br></div>
															</div>
														</div>
													</div>
												<?php
												} else { ?>
													<div class="posts-bar">
														<div class="post-bar bgclr text-center">
															<h2>Logistic request has not been approved yet.</h2>
														</div>
													</div>
												<?php } ?>
											</div>
										</div>
									</div>

									<div class="product-feed-tab current" id="feed-dd">
										<div class="post-topbar">
											<div class="user-picy">
												<img src="./images/pro_pic/<?php echo $pro_pic ?>" alt="" style="border-radius:50%;">
											</div>
											<div class="post-st">
												<ul>
													<li><a class="post-jb active" href="#" title="">What's on your mind?</a></li>
												</ul>
											</div>
										</div>

										<?php $sql = "SELECT * FROM post p JOIN users u ON p.user = u.id ORDER BY time DESC";
										$res = mysqli_query($con, $sql);
										if (mysqli_num_rows($res) > 0) {
											while ($rows = mysqli_fetch_assoc($res)) { ?>
												<div class="posts-section mb-4">
													<div class="posty">
														<div class="post-bar no-margin">
															<div class="post_topbar">
																<div class="usy-dt">
																	<img src="./images/pro_pic/<?php echo $rows['profile_pic'] ?>" alt="" width=45>
																	<div class="usy-name">
																		<h3><?php echo $rows["name"]; ?></h3>
																		<span><img src="./homepage_files/clock.png" alt="">
																			<?php
																			echo time_elapsed_string("{$rows['time']}", true);
																			?>
																		</span>
																	</div>
																</div>
																<div class="ed-opts">
																	<a href="#" title="" class="ed-opts-open"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
																	<ul class="ed-options">
																		<li><a href="#" title="">Edit Post</a></li>
																		<li><a href="#" title="">Hide</a></li>
																	</ul>
																</div>

															</div>
															<div class="job_descp mt-2 mb-3">
																<p?><?php echo $rows["post_text"]; ?></p>
															</div>
															<div class="job-status-bar">
																<ul class="like-com">
																	<li>
																		<a class="com" href="#"><i class="fas fa-heart"></i> Like</a>
																	</li>
																	<li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment
																			15</a></li>
																</ul>
															</div>
														</div>
														<div class="comment-section">

															<?php
															$comment_query = mysqli_query($con, "SELECT * ,UNIX_TIMESTAMP() - date_posted 
																		AS TimeSpent FROM comment LEFT JOIN users on users.id = comment.user_id_login 
																		where post_id = '{$rows['post_id']}'") or die(mysqli_error($con));
															while ($comment_row = mysqli_fetch_array($comment_query)) {
																$comment_id = $comment_row['comment_id'];
																$comment_by = $comment_row['name'];
															?>
																<div class="comment-sec">
																	<ul>
																		<li>
																			<div class="comment-list">
																				<div class="bg-img">
																					<img src="./homepage_files/bg-img1.png" alt="">
																				</div>
																				<div class="comment">
																					<h3><?php echo $comment_by; ?></h3>
																					<span><img src="./homepage_files/clock.png" alt="">
																						<?php
																						echo $comment_row['date_posted'];
																						?>

																					</span>
																					<p><?php echo $comment_row['content']; ?></p>
																				</div>
																			</div>
																		</li>
																	</ul>
																</div>
															<?php
															}
															?>
															<div class="post-comment">
																<div class="comment_box">
																	<?php

																	if (isset($_POST['comment'])) {
																		$comment_content = $_POST['comment_content'];
																		$user_id = $_POST['id'];
																		//INSERT INTO `comment` (`com_id`, `content`, `user_id_login`, `post_id`, `date_posted`)
																		// VALUES (NULL, 'test c', '011191117', '11', '');

																		mysqli_query($con, "insert into comment (content,user_id_login,post_id) 
																	values ('$comment_content','$user','{$rows['post_id']}')")
																			or die(mysqli_error($con));
																	?>
																		<script>
																			window.location.href = "club_profile.php";
																		</script>
																	<?php
																	}
																	?>
																	<hr>
																	<form method="post">
																		<input type="hidden" name="id" value="<?php echo $user; ?>">
																		<input type="text" placeholder="Post a comment" name="comment_content">
																		<button type="submit" name="comment">Send</button>
																	</form>
																</div>
															</div>
														</div>
													</div>
												</div>

										<?php }
										} ?>

									</div>
									<div class="post-popup job_post">
										<div class="post-project">
											<h3>What's on your mind?</h3>
											<div class="post-project-fields">
												<form action="" method="POST">
													<div class="row">
														<!-- <div class="col-lg-12">
                                <input type="text" name="title" placeholder="Title">
                            </div> -->
														<!-- <div class="col-lg-12">
                                <div class="inp-field">
                                    <select>
                                        <option>Category</option>
                                        <option>Category 1</option>
                                        <option>Category 2</option>
                                        <option>Category 3</option>
                                    </select>
                                </div>
                            </div> -->
														<!-- <div class="col-lg-12">
                                <input type="text" name="skills" placeholder="Skills">
                            </div> -->
														<!-- <div class="col-lg-6">
                                <div class="price-br">
                                    <input type="text" name="price1" placeholder="Price">
                                    <i class="la la-dollar"></i>
                                </div>
                            </div> -->
														<!-- <div class="col-lg-6">
                                <div class="inp-field">
                                    <select>
                                        <option>Full Time</option>
                                        <option>Half time</option>
                                    </select>
                                </div>
                            </div> -->
														<div class="col-lg-12">
															<textarea name="description" placeholder="Write something"></textarea>
														</div>
														<div class="col-lg-6">
															<select class="custom-select custom-select-sm" name="privacy">
																<option selected disabled>Privacy Option</option>
																<option value="Public">Public</option>
																<option value="Followers">Followers</option>
																<option value="Only me">Only me</option>
															</select>
														</div>
														<div class="col-lg-12">
															<ul>
																<li><button class="active" type="submit" value="post" name="post_btn">Post</button></li>
																</li>
															</ul>
														</div>
													</div>
												</form>
												<?php
												if (isset($_POST['post_btn'])) {
													$post_text = $_POST['description'];
													$privacy = $_POST['privacy'];
													$post_insertion = "INSERT INTO `post`(`user`, `post_text`,`privacy`) VALUES ('$user','$post_text','$privacy')";
													$con->query($post_insertion);
													// header("location: home.php");
												?>
													<script>
														window.location.href = "home.php";
													</script>
												<?php

												}
												?>
											</div>
											<a href="#" title=""><i class="fa fa-times" aria-hidden="true"></i></a>
										</div>
									</div>

									<div class="product-feed-tab" id="club-members">
										<div class="row  bg-white">
											<?php
											$con = mysqli_connect("localhost", "root", "", "uiucms");
											$sql66 = mysqli_query($con, "SELECT * FROM members m JOIN membership s ON m.club_id = s.club_id WHERE m.status='1'");
											if (mysqli_num_rows($sql66) > 0) {
												while ($rows = mysqli_fetch_array($sql66)) {
											?>
													<div class="col col-lg-6 my-1">
														<div class="mt-3 mb-3 d-flex align-items-center">

															<img src="./images/<?php echo $rows['mem_image'] ?>" alt="" width=100 style="border-radius: 20%;" class="mr-3">
															<a href=""> <strong>
																	<h3 class="ms-2"><?php echo $rows['full_name'] ?></h3>
																</strong></a>
														</div>
													</div>
											<?php
												}
											}

											?>

										</div>
									</div>
									<div class="product-feed-tab" id="info-dd">
										<div class="user-profile-ov">
											<h3>logistic request</h3>
											<?php
											if (isset($_POST['send_req1'])) {
												$logistic_name = $_POST['logistic_name'];
												$logistic_date = $_POST['logistic_date'];
												$logistic_details = $_POST['logistic_details'];
												mysqli_query($con, "insert into logistic (logistic_name,logistic_date,logistic_details)
											values ('$logistic_name','$logistic_date','$logistic_details')") or die(mysqli_error($con));
											?>
												<script>
													window.location.href = "club_profile.php";
												</script>
											<?php
											}
											?>
											<div class="acc-setting">
												<form method="post">
													<div class="cp-field">
														<div>
															<input type="text" name="logistic_name" placeholder="Program Name">
														</div>
													</div>
													<div class="cp-field">
														<div>
															<input type="date" name="logistic_date">
														</div>
													</div>
													<div class="cp-field">
														<h5>Details about logistic request</h5>
														<textarea name="logistic_details"></textarea>
													</div>
													<div class="save-stngs pd3">
														<ul>
															<li><button type="submit" name="send_req1">Send Request</button></li>
														</ul>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="product-feed-tab" id="saved-jobs">
										<div class="user-profile-ov">
											<h3>logistic request</h3>
											<?php
											if (isset($_POST['send_req'])) {
												$filename = $_FILES["event_image"]["name"];
												$tempname = $_FILES["event_image"]["tmp_name"];
												$folder = "images/" . $filename;

												move_uploaded_file($tempname, $folder);

												$heading = $_POST['heading'];
												$event_date = $_POST['event_date'];
												$content = $_POST['content'];
												mysqli_query($con, "insert into events (heading,event_date,event_image,content)
											values ('$heading','$event_date','$filename','$content')") or die(mysqli_error($con));
											?>
												<script>
													window.location.href = "club_profile.php";
												</script>
											<?php
											}
											?>
											<div class="acc-setting">
												<form method="post" enctype="multipart/form-data">
													<div class="cp-field">
														<div>
															<input type="text" name="heading" placeholder="Event Title">
														</div>
													</div>
													<div class="cp-field">
														<div>
															<input type="date" name="event_date">
														</div>
													</div>
													<div class="cp-field">
														<div>
															<input type="file" name="event_image">
														</div>
													</div>
													<div class="cp-field">
														<h5>Details about event request</h5>
														<textarea name="content"></textarea>
													</div>
													<div class="save-stngs pd3">
														<ul>
															<li><button type="submit" name="send_req">Send Request</button></li>
														</ul>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="product-feed-tab" id="member-rec">
										<div class="user-profile-ov">
											<h3>logistic request</h3>
											<?php
											if (isset($_POST['send_mem_req'])) {
												$filename = $_FILES["recrut_img"]["name"];
												$tempname = $_FILES["recrut_img"]["tmp_name"];
												$folder = "images/" . $filename;

												move_uploaded_file($tempname, $folder);

												$club_id = $_POST['club_id'];

												$heading = $_POST['heading'];
												$payment = $_POST['payment'];
												$join_date = $_POST['join_date'];
												$description = $_POST['description'];
												mysqli_query($con, "insert into membership (heading,club_id,payment,description,recrut_img,join_date)
											values ('$heading','$club_id','$payment','$description','$filename','$join_date')") or die(mysqli_error($con));
											?>
												<script>
													window.location.href = "club_profile.php";
												</script>
											<?php
											}
											?>
											<div class="acc-setting">
												<form method="post" enctype="multipart/form-data">
													<div class="cp-field">
														<div>
															<input type="text" name="heading" placeholder="Title">
														</div>
													</div>
													<div class="cp-field">
														<div>
															<input type="text" name="payment" placeholder="Payment Amount">
														</div>
													</div>
													<div class="cp-field">
														<div>
															<input type="date" name="join_date">
														</div>
													</div>
													<div class="cp-field">
														<div>
															<input type="file" name="recrut_img">
														</div>
													</div>
													<input type="hidden" name="club_id" value="<?php echo $user; ?>">
													<div class="cp-field">
														<h5>Details about member recruit</h5>
														<textarea name="description"></textarea>
													</div>
													<div class="save-stngs pd3">
														<ul>
															<li><button type="submit" name="send_mem_req">Send Request</button></li>
														</ul>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="col-lg-3">
								<div class="right-sidebar">
									<div class="message-btn">
										<a href="https://gambolthemes.net/workwise-new/profile-account-setting.html"
											title=""><i class="fas fa-cog"></i> Setting</a>
									</div>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</main>

	</div>
	<script type="text/javascript" src="./js/jquery.min.js.download"></script>
	<script type="text/javascript" src="./js/popper.js.download"></script>
	<script type="text/javascript" src="./js/bootstrap.min.js.download"></script>
	<script type="text/javascript" src="./js/jquery.mCustomScrollbar.js.download"></script>
	<script type="text/javascript" src="./js/slick.min.js.download"></script>
	<script type="text/javascript" src="./js/scrollbar.js.download"></script>
	<script type="text/javascript" src="./js/script.js.download"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js/custom-ajax.js"></script>

</body>

</html>