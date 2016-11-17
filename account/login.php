<!--
	File name: login.php
	Date Created: 10/04/2016
	Date Last Modified: 10/13/2016
	Developer: Nikko Atuan
-->

<?php
	include("../php/validation.php");
	include("../php/password.php");
	$errorMessage = "<p class='alert'>*Please Fill Up all the fields</p>";

	if(isset($_POST["login"])){
		$conn = mysqli_connect("localhost", "1248099", "thedemocrat0", "1248099");
		$flag = true;

		//check username
		if(checkError($_POST["frmUserName"], "regString")){
			$errorMessage = "<p class='alert'>Please enter a valid username</p>";
			$flag = false;
		}
		else{		
			$varUserName = $_POST["frmUserName"];	
		}

		if(checkError($_POST["frmPassword"], "regString")){
			$errorMessage = "<p class='alert'>Please enter a valid password</p>";
			$flag = false;
		}
		else{
			$varPassword = $_POST["frmPassword"];
		}
		
		$query = "SELECT * FROM tblauthor WHERE username = '$varUserName'";
		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				$username = $row['username'];
				$hashedPass = $row['password'];
				$fullname = $row['fullname'];
				$isadmin = $row['isadmin'];
				$id = $row['author_id'];
			}

			if(password_verify($varPassword, $hashedPass)){
				session_start();
				$_SESSION['username'] = $username;
				$_SESSION['isadmin'] = $isadmin;
				$_SESSION['id'] = $id;
				$errorMessage = "<p class='alert'>Success!!!</p>";
				
				if($_SESSION['isadmin'] == false){header("Location: profile.php");}
				else{header("Location: myAdmin.php");}
				
			}
			else{
				$errorMessage = "<p class='alert'>Wrong Username/Password.</p>";
			}
		}
		else{
			$errorMessage = "<p class='alert'>No such user exists in the database</p>";
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
							<a class="nav-link-effect nav-before nav-after dropbtn" href="#">SECTIONS</a>
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
							<?php 
								if($_SESSION['username']!=""){
									if($_SESSION["isadmin"]==true){
										echo "<li><a href='../account/myAdmin.php'>".$_SESSION["username"]."</a></li>";									
									}
									else{
										echo "<li><a href='../account/profile.php'>".$_SESSION["username"]."</a></li>";
									}
									echo "<li><a href='../account/logout.php'>Logout</a></li>";
								}
								else{
									echo "<li><a href='../account/login.php'>Login</a></li>";
									echo "<li><a href='../account/sign_up.php'>Signup</a></li>";
								}
							?>
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

			<div class="main-content sign-in">
				<header class="header-login">
					<h2>*** LOGIN ***</h2>
				</header>
				<hr class="hr1">
				<div class="row row-signup">
					<div class="col col-side"></div>
					<div class="col col-center">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
							<div class="error-block"><?php echo $errorMessage; ?></div><br>
							<input type="text" placeholder="Username" name="frmUserName" required="required"><br><br>
							<input type="password" placeholder="Password" name="frmPassword" required="required">
							<button type="submit" name="login" class="submit-button submit-button-mtop">Login</button><br>
							<a href="sign_up.php" class="sign-up-link">Not yet a member?</a>
						</form>
					</div>	
					<div class="col col-side"></div>
				</div>
				<hr class="hr2">
			</div>
			<div class="red-bar"></div>
		</div>
	</body>

</html>