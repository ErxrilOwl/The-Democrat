<!--
	File name: sign_up.php
	Date Created: 10/04/2016
	Date Last Modified: 10/16/2016
	Developer: Nikko Atuan
-->

<?php
	include("../php/validation.php");
	session_start();

	$conn = mysqli_connect("localhost", "1248099", "thedemocrat0", "1248099");
	$username = "";

	if(!$conn){
		die("Connection failed: ". mysqli_connect_error());
	}

	if(isset($_SESSION["username"]))
	{
		$username=$_SESSION["username"];
		$query = "SELECT * FROM tblauthor WHERE username ='$username'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
	}


	$errorMessage = "<p class='alert'></p>";

	if(isset($_POST["save"])){
		$conn = mysqli_connect("localhost", "1248099", "thedemocrat0", "1248099");
		$flag = true;

		
		if(checkError($_POST["frmFullName"], "strictString")){
			$errorMessage = "<p class='alert'>* Pls. enter a valid name</p>";
			$flag = false;
		}
		else{
			$varFullName = mysqli_real_escape_string($conn, $_POST["frmFullName"]);
		}
		
		if(checkError($_POST["frmUserName"], "regString")){
			$errorMessage = "<p class='alert'>Please enter a valid username</p>";
			$flag = false;
		}
		else{
			$varUserName = mysqli_real_escape_string($conn, $_POST["frmUserName"]);	
		}
		// check email
		if(checkError($_POST["frmEmail"], "email")){
			$errorMessage = "<p class='alert'>Please enter a valid email</p>";
			$flag = false;
		}
		else{
			$varEmail = mysqli_real_escape_string($conn, $_POST["frmEmail"]);
		}
		
		if(strtotime($_POST["frmBday"]) > strtotime(date("Y-m-d"))){
			$errorMessage = "<p class='alert'>Invalid birthdate</p>";
			$flag = false;
		}
		else{
			$varBday = $_POST["frmBday"];
		}
		if(checkError($_POST["frmPassword"], "regString")){
			$errorMessage = "<p class='alert'>Please input your password</p>";
			$flag = false;
		}
		else{
			if(password_verify($_POST["frmPassword"], $row["password"])){
				$varPassword = password_hash(mysqli_real_escape_string($conn, $_POST["frmPassword"]), PASSWORD_DEFAULT);	
			}
			else{
				$errorMessage = "<p class='alert'>Invalid password.</p>";
				$flag = false;
			}	
		}

		if($_POST["frmGender"] == "1"){
			$varGender = 1;
		}
		else{
			$varGender = 0;
		}
		$varBio = mysqli_real_escape_string($conn, $_POST["frmBio"]);

		$withImageQuery = false;
		if ($_FILES['image']['size'] == 0 && $_FILES['image']['error'] == 0)
		{
		    $errorMessage = "<p class='alert'>Pls. select an image</p>"; 
		    $flag = false;
		}
		else{
			try{
				if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
					$errorMessage = "<p class='alert'>Pls. select an image</p>";
					$flag = false;
				}
				else{
					$image = addslashes($_FILES['image']['tmp_name']);
					$name = addslashes($_FILES['image']['name']);
					$image = file_get_contents($image);
					$image = base64_encode($image);
					$withImageQuery = true;
				}
			}
			catch(Exception $e){
				$withImageQuery = false;
			}
		}

		if($flag){
			if($withImageQuery){
				$query = "UPDATE tblauthor
						SET
							username = '$varUserName', password = '$varPassword', email = '$varEmail', fullname ='$varFullName', gender = '$varGender',  birthdate = '$varBday', bio = '$varBio', profilepic = '$image'
						WHERE username = '$username'";	
			}
			else{
				$query = "UPDATE tblauthor
						SET
							username = '$varUserName', password = '$varPassword', email = '$varEmail', fullname ='$varFullName', gender = '$varGender',  birthdate = '$varBday', bio = '$varBio'
						WHERE username = '$username'";	
			}
			
			if(mysqli_query($conn, $query)){
				$errorMessage = "<p class='alert'>Success!!!</p>";
				$_SESSION['username'] = $varUserName;
				$username=$_SESSION["username"];
				$query = "SELECT * FROM tblauthor WHERE username ='$username'";
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);
			}
			else{
				$errorMessage = "<p class='alert'>Failed!!!</p>";
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

		<script type="text/javascript" src="../js/script.js"></script>
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
						<?php 
							if($_SESSION["username"]!=""){
								if($_SESSION["isadmin"]==true){
									echo "<a class='link-effect link-effect-tablet' href='../account/myAdmin.php'>".$_SESSION['username']."</a>";
								}
								else{
									echo "<a class='link-effect link-effect-tablet' href='../account/profile.php'>".$_SESSION['username']."</a>";
								}
								echo "<a class='link-effect link-effect-tablet' href='logout.php'>Logout</a>";
							}
							else{
								echo "<a class='link-effect link-effect-tablet' href='login.php'>Login</a>";
								echo "<a class='link-effect link-effect-tablet' href='sign_up.php'>Sign Up</a>";
							}
						?>	
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
							<?php 
							if($_SESSION['username']!=""){
								if($_SESSION["isadmin"]!=true){
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

			<div class="main-content-1 edit-profile profile">
				<header class="row header">
					<h2>My Profile</h2>
				</header>
				<div class="row row-signup">
						<div class="col side"></div>
						<div class="col center">
							<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" enctype="multipart/form-data">
								<div class="content content-0">
									<div class="col col-3">
										<div class="image" id="image"><?php echo '<img height="300" width="300" src="data:image;base64,'.$row['profilepic'].'">'; ?></div>
										<input type="file" id="selectedFile" name="image" style="display: none;" onchange="loadImageFileAsURL('image', 'selectedFile')" accept="image/x-png, image/gif, image/jpeg" />
										<input type="button" value="Upload" onclick="document.getElementById('selectedFile').click()" />
									</div>
									<div class="col col-9">
										<div class="row"><input class="text" type="text" placeholder="Full name" name="frmFullName" required="required" value=<?php echo $row["fullname"]; ?>></div>
										<div class="row"><textarea class="text" placeholder="Bio" name="frmBio" id="Bio" cols="10" rows="6"><?php echo nl2br($row["bio"]); ?></textarea></div>
									</div>
								</div>		

								<div class="content content-1">
									<div class="row">
										<div class="col col-3 col-label"><label for="frmUserName">Username : </label></div>
										<div class="col col-9"><input class="text" type="text" name="frmUserName" required="required" value=<?php echo $row["username"]; ?>></div>
									</div>
									<div class="row">
										<div class="col col-3 col-label"><label for="frmEmail">Email : </label></div>
										<div class="col col-9"><input class="text" type="text"  name="frmEmail" required="required" value=<?php echo $row["email"]; ?>></div>
									</div>
									<div class="row">
										<div class="col col-3 col-label"><label for="frmGender">Gender : </label></div>
										<div class="col col-9">
											<input type="radio" class="rdb" name="frmGender" value="1" <?php if($row["gender"] == 1) echo "checked='checked'"; ?>><label>Male</label>
											<input type="radio" class="rdb" name="frmGender" value="0" <?php if($row["gender"] != 1) echo "checked='checked'"; ?>><label>Female</label>
										</div>
									</div>
									<div class="row">
										<div class="col col-3 col-label"><label for="frmBday">Birthdate : </label></div>
										<div class="col col-9">
											<input class="text" type="date" name="frmBday" required="required" value=<?php echo date('Y-m-d', strtotime($row["birthdate"])); ?>>
										</div>
									</div>
									<div class="row">
										<div class="col col-3 col-label"><label for="frmPassword">Password : </label></div>
										<div class="col col-9">
											<input class="text" type="password" name="frmPassword">
										</div>
									</div>
									<div class="row"><?php echo $errorMessage; ?></div>
								</div>
								<div class="row row-btn-profile row-btn-profile-1">
									<a href=""><button type="submit" name="save">Save</button></a>	
								</div>
							</form>	
							<div class="row row-btn-profile row-btn-profile-2">
								<?php 
									if($_SESSION["isadmin"]==true){
										echo "<a href='myAdmin.php'><button>Back</button></a>";
									}
									else{
										echo "<a href='profile.php'><button>Back</button></a>";
									}
								?>
								
							</div>
						</div>
						<div class="col side"></div>
				</div>
			</div> <!-- End of main-content-->
			<div class="red-bar"></div>
		</div>
	</body>
</html>
