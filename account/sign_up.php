<!--
	File name: sign_up.php
	Date Created: 10/04/2016
	Date Last Modified: 10/16/2016
	Developer: Nikko Atuan
-->

<?php
	include("../php/validation.php");
	include("../php/password.php");
	$errorMessage = "<p class='alert'>*Please Fill Up all the fields</p>";

	if(isset($_POST["signup"])){
		$conn = mysqli_connect("localhost", "1248099", "thedemocrat0", "1248099");
		$flag = true;

		// check full nanme
		if(checkError($_POST["frmFullName"], "strictString")){
			$errorMessage = "<p class='alert'>* Pls. enter a valid name</p>";
			$flag = false;
		}
		else{
			$varFullName = $_POST["frmFullName"];
		}
		//check username
		if(checkError($_POST["frmUserName"], "regString")){
			$errorMessage = "<p class='alert'>Please enter a valid username</p>";
			$flag = false;
		}
		else{
			try{
				$query = sprintf("SELECT * FROM tblauthor WHERE username = '%s'", mysqli_real_escape_string($conn, $_POST["frmUserName"]));

				$result = mysqli_query($conn, $query);
				if(mysqli_num_rows($result) > 0){
					$errorMessage = "<p class='alert'>Username has already been taken</p>";
					$flag = false;
				}else{
					$varUserName = $_POST["frmUserName"];	
				}
			}catch(Exception $e){
				echo "".mysqli_error($conn);
			}
		}
		// check email
		if(checkError($_POST["frmEmail"], "email")){
			$errorMessage = "<p class='alert'>Please enter a valid email</p>";
			$flag = false;
		}
		else{
			$varEmail = $_POST["frmEmail"];
		}
		// check passwords
		if(checkError($_POST["frmPassword"], "regString") || checkError($_POST["frmCPassword"], "regString")){
			$errorMessage = "<p class='alert'>Password does not match each other.</p>";

			$flag = false;
		}
		else{
			$varPassword = password_hash(mysqli_real_escape_string($conn, $_POST["frmPassword"]), PASSWORD_DEFAULT);
		}

		// add new author
		if($flag){
			$query = sprintf("INSERT INTO tblauthor(author_id, username, password, email, fullname, gender, birthdate, date_registered, bio, profilepic, isadmin)
						VALUES(null, '%s', '$varPassword', '%s', '%s', true, null, NOW(), null, null, false)", mysqli_real_escape_string($conn, $varUserName), mysqli_real_escape_string($conn, $varEmail), mysqli_real_escape_string($conn, $varFullName));

				if(mysqli_query($conn, $query)){
					$last_id = mysqli_insert_id($conn);	
					$errorMessage = "<p class='alert'>Success!!!</p>";
					session_start();
					$_SESSION['username'] = $varUserName;
					$_SESSION['isadmin'] = false;
					$_SESSION['id'] = $last_id;
					header("Location: profile.php");
				}
				else{
					$errorMessage = "<p class='alert'>Failed!!!</p>".mysqli_error($conn);
				}
		}
	}
?>

<!DOCTYPE html>

<html lang="en-ph">

	<head>
		<meta charset="utf-8">
		<meta name="description" content="Student Journalist Website of the University of Nueva Caceres">
		<meta name="keywords" content="Student Press, Students Journalist, The Democrat, University of Nueva Caceres">
		<meta name="author" content="Nikko Atuan">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">

		<title>The Democrat</title>

		<link rel="icon" type="image/png" href="../images/logo/The DEMOCRAT Logo Tab.png">
		<link href="../stylesheets/style.css" type="text/css" rel="stylesheet">
		<link href="../stylesheets/responsive.css" type="text/css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
	</head>

	<body>
		<div class="container home">
			<div class="red-bar"></div>
			<header class="title-bar">
				<div class="title row title-col-1">
					<form class="search-form-big">
						<input type="text" name="search" id="search" class="search-small" placeholder="search...">
					</form>
					<div class="t-elem-1">
						<img class="logo-1" src="../images/logo/University of Nueva Caceres Logo.png">	
					</div>
					<div class="t-elem-2">
						<h1><a href="../index.php">THE DEMOCRAT</a></h1>	
					</div>
					<div class="t-elem-3">
						<img class="logo-2" src="../images/logo/The DEMOCRAT Logo.png">
					</div>
					<nav class="link-account">
						<a class="link-effect link-effect-tablet" href="login.php">Login</a>
						<a class="link-effect link-effect-tablet" href="sign_up.php">Sign Up</a>
					</nav>
				</div> <!-- End of title -->

				<div class="row nav-menu title-col-2">
					<div class="menu-btn-burger"><img src="../images/icons/burger-dropdown.PNG"></div>
					<ul class="menu">
						<li class="menu-btn"><a class="nav-link-effect nav-before nav-after" href="../index.php">HOME</a></li>
						<span class="asterisk">*</span>
						<li id="menu-btn-news" class="menu-btn dropdown">
							<a class="nav-link-effect nav-before nav-after dropbtn" href="../news/news.php#hot-news">NEWS</a>
							<div class="menu-btn-burger-inner"><img class="burger-btn-unhover" src="../images/icons/burger-dropdown-inner-0.PNG"> <img class="burger-btn-hover" src="../images/icons/burger-dropdown-inner.PNG"></div>
							<ul class="inner-menu inner-menu-news hidden">
								<li><a href="../news/news.php#hot-news">Hot</a></li>
								<li><a href="../news/news.php#fresh-news">Fresh</a></li>
								<li><a href="../news/more-news.php?page=1">More News</a></li>
							</ul>
						</li >
						<span class="asterisk">*</span>
						<li id="menu-btn-feature" class="menu-btn dropdown">
							<a class="nav-link-effect nav-before nav-after dropbtn" href="../sections/feature.php?page=1&sections=article">FEATURE</a>
							<div class="menu-btn-burger-inner"><img class="burger-btn-unhover" src="../images/icons/burger-dropdown-inner-0.PNG"> <img class="burger-btn-hover" src="../images/icons/burger-dropdown-inner.PNG"></div>
							<ul class="inner-menu hidden">
								<li><a href="../sections/feature.php?page=1&sections=news">Featured News</a></li>
								<li><a href="../sections/feature.php?page=1&sections=article">Featured Articles</a></li>
							</ul>
						</li>
						<span class="asterisk">*</span>
						<li id="menu-btn-feature" class="menu-btn dropdown">
							<a class="nav-link-effect nav-before nav-after dropbtn" href="../sections/sections.php?page=1&sections=others">SECTIONS</a>
							<div class="menu-btn-burger-inner"><img class="burger-btn-unhover" src="../images/icons/burger-dropdown-inner-0.PNG"> <img class="burger-btn-hover" src="../images/icons/burger-dropdown-inner.PNG"></div>
							<ul class="inner-menu inner-menu-sections hidden">
								<li><a href="../sections/unc-hot-seat.php?page=1">UNC Hot Seat</a></li>
								<li><a href="../sections/sections.php?page=1&sections=articles">Articles</a></li>
								<li><a href="../sections/sections.php?page=1&sections=opinion">Opinion</a></li>
								<li><a href="../sections/sections.php?page=1&sections=sports">Sports</a></li>
								<li><a href="../sections/sections.php?page=1&sections=others">Others</a></li>
							</ul>
						</li>
						<span class="asterisk">*</span>
						<li class="menu-btn"><a class="nav-link-effect nav-before nav-after" href="../sections/gallery.php">GALLERY</a></li>
						<span class="asterisk">*</span>
						<li id="menu-btn-about" class="menu-btn dropdown">
							<a class="nav-link-effect nav-before nav-after dropbtn" href="../about/institutionProfile.php">ABOUT</a>
							<div class="menu-btn-burger-inner"><img class="burger-btn-unhover" src="../images/icons/burger-dropdown-inner-0.PNG"> <img class="burger-btn-hover" src="../images/icons/burger-dropdown-inner.PNG"></div>
							<ul class="inner-menu hidden">
								<li><a href="../about/history.php">History</a></li>
								<li><a href="../about/institutionProfile.php">Institution Profile</a></li>
								<li><a href="../about/editorial.php">Editorial Board</a></li>
								<li><a href="../about/constitutionAndByLaws.php">Constitution and by Laws</a></li>
							</ul>
						</li>
						<li class="menu-btn menu-btn-account dropdown">
							<a class="nav-link-effect nav-before nav-after" href="#">ACCOUNT</a>
							<div class="menu-btn-burger-inner"><img class="burger-btn-unhover" src="../images/icons/burger-dropdown-inner-0.PNG"> <img class="burger-btn-hover" src="../images/icons/burger-dropdown-inner.PNG"></div>
							<ul class="inner-menu hidden">
								<li><a href="login.php">Login</a></li>
								<li><a href="sign_up.php">Sign Up</a></li>
							</ul>
						</li>
						
						<li class="menu-btn menu-btn-account dropdown li-search-small">
							<div class="nav-link-effect nav-before nav-after">
								<input type="text" id="search-small" placeholder="Search...">
							</div>
						</li>
					</ul>
				</div>
			</header> <!-- End of header title-bar -->

			<div class="main-content sign-up">
				<header class="header-sign-up">
					<h2>*** SIGN UP ***</h2>
				</header>
				<hr class="hr1">
				<div class="row row-signup">
					<div class="col col-side"></div>
					<div class="col col-center">
						<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
							<div class="error-block"><?php echo $errorMessage; ?></div>
							<input type="text" placeholder="Full name" name="frmFullName" required="required">
							<input type="text" placeholder="Username" name="frmUserName" required="required">
							<input type="text" placeholder="Email address" name="frmEmail" required="required">
							<input type="password" placeholder="Password" name="frmPassword" required="required">
							<input type="password" placeholder="Confirm Password" name="frmCPassword" required="required">
							<br>
							<div class="row"><button type="submit" name="signup" class="submit-button">Sign up</button><br></div>
						</form>
					</div>	
					<div class="col col-side"></div>
				</div>
				<hr class="hr2">
			</div> <!-- End of main-content-->
			<div class="red-bar"></div>
		</div>
	</body>
</html>
