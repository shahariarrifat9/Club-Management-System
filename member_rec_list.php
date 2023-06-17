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
		<main style="padding: 10px 0 !important;">
			<div class="main-section">
				<div class="container">
					<div class="main-section-data">
						<div class="row">
							<div class="col-lg-9 col-md-8 no-pd">
								<?php if (isset($_REQUEST['posted'])) {
									echo "<h2 class='mb-2' style='color:green;text-align: center;'> Request succesfull.</h2> ";
								} ?>
								<div class="main-ws-sec">
									<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade show active" id="mange" role="tabpanel" aria-labelledby="mange-tab">
											<?php
											$con = mysqli_connect("localhost", "root", "", "uiucms");
											$recruit_post = mysqli_query($con, "SELECT * FROM membership ORDER BY mem_id DESC");
											if (mysqli_num_rows($recruit_post) > 0) {
												while ($data = mysqli_fetch_array($recruit_post)) {

											?>
													<div class="posts-bar">
														<div class="post-bar bgclr">
															<img class="event_images" width="100%" height="300px" src="images/<?php echo $data['recrut_img']; ?>" alt="">
															<br>
															<div class="wordpressdevlp">
																<h2><?php echo $data['heading']; ?></h2>
															</div>
															<h3>Payment Amount: <?php echo $data['payment']; ?></h3>
															<br>
															<h3>Dead Line: <?php echo $data['join_date']; ?></h3>
															<br>
															<p>
															<h3>Description:</h3> <br> <?php echo $data['description']; ?></p><br>
															<?php
															$con2 = mysqli_connect("localhost", "root", "", "uiucms");
															$test = mysqli_query($con2, "SELECT * FROM members");
															if (mysqli_num_rows($test) > 0) {
																$i = 0;
																while (mysqli_fetch_array($test)) {
																	$i++;
																}
															}
															?>
															<h3>Applied: <?php echo $i; ?></p>
															</h3>

															<a href="member_request_form.php?user_id=<?php echo $user ?>&club_id=<?php echo $data['club_id'] ?>">Apply</a>

															<br>
														</div>
													</div>
												<?php
												}
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
							</div>
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