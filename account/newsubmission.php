<!--
	File name: sign_up.php
	Date Created: 10/04/2016
	Date Last Modified: 10/16/2016
	Developer: Nikko Atuan
-->

<?php
	include("../php/validation.php");
	session_start();
	$errorMessage = "";
	if(isset($_POST["send"])){
		$conn = mysqli_connect("localhost", "1248099", "thedemocrat0", "1248099");

		$flag = true;
		if(checkError($_POST["frmTitle"], "regString")){
			$flag = false;
			$errorMessage = "<p class='errorMessage'>*Pls. enter a valid title</p>";
		}
		else{
			$varTitle = mysqli_real_escape_string($conn, $_POST["frmTitle"]);
		}

		$query = "SELECT author_id FROM tblauthor WHERE username = '".$_SESSION["username"]."'";
		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				$varUserId = $row['author_id'];
			}
		}

		if($_POST["frmSubtitle"] != ""){
			if(checkError($_POST["frmSubtitle"], "regString")){
				$flag = false;
				$errorMessage = "<p class='errorMessage'>*Pls. enter a valid subtitle</p>";
			}
			else{
				$varSubtitle = mysqli_real_escape_string($conn, $_POST["frmSubtitle"]);
			}			
		}
		else{
			$varSubtitle = null;
		}
		$varType = null;
		$varSeq = $_POST["frmSequence"];
		
		if(isset($_POST["frmSecContent"])){
			if($flag){
				$query = "INSERT INTO tblarticle(id, author_id, title, subtitle, type, sequence, status, date_submitted, isfeature)
							VALUES(null, '$varUserId', '$varTitle', '$varSubtitle', null, '$varSeq', 'pending', NOW(), false)";
				
				if(mysqli_query($conn, $query)){
					$last_id = mysqli_insert_id($conn);	

					for($i=0; $i<sizeof($_POST["frmSecContent"]); $i++){
						$paraName = $_POST["paraNames"][$i];
						$secTitle = $_POST["frmSecTitle"][$i];
						$content = $_POST["frmSecContent"][$i];
						$query1 = sprintf("INSERT INTO tblsection(id, article_id, para_name, section_title, ptext)
								VALUES(null, '$last_id', '%s', '%s', '%s')",mysqli_real_escape_string($conn, $paraName), 
								mysqli_real_escape_string($conn, $secTitle), mysqli_real_escape_string($conn, $content));

						if(mysqli_query($conn,$query1)){}
					}

					for($i=0; $i<sizeof($_POST["imgNames"]); $i++){
						$imgName = $_POST["imgNames"][$i];

						if(getimagesize($_FILES['image']['tmp_name'][$i]) == FALSE){
							$image = null;
						}
						else{
							$image = addslashes($_FILES['image']['tmp_name'][$i]);
							$name = addslashes($_FILES['image']['name'][$i]);
							$image = file_get_contents($image);
							$image = base64_encode($image);
							$withImageQuery = true;
						}

						$query2 = sprintf("INSERT INTO tblarticleimg(id, article_id, imageName, image)
												VALUES(null, '$last_id', '%s', '$image')", mysqli_real_escape_string($conn, $imgName));

						if(mysqli_query($conn,$query2)){}
					}
					$errorMessage = "<p class='errorMessage'>New submission has successfully send!!!</p>";
				}
				else{
					$errorMessage = "<p class='errorMessage'>Failed to save in the database...</p>";
				}
			}
			else{
				$errorMessage = "<p class='errorMessage'>*Pls enter a valid input</p>";
			}
		}
		else{
			$errorMessage = "<p class='errorMessage'>*Pls add at least one section</p>";
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

			<div class="main-content submission" id="submission">
				<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" enctype="multipart/form-data">
					<div class="row row-main" id="row-main">
						<div class="row header">
							<div class="col col-title"><div class="underline"><h2>New Submission</h2></div></div>
							<div class="col col-btn-grp">
								<button type="button" onclick="addPara();">Add Section</button>
								<button type="button" onclick="addImage();">Add Image</button>
							</div>
						</div>
						<div class="row row-title-input row-para">
							<input type="text" name="frmTitle" placeholder="Title" required="required"><br>
							<input type="text" name="frmSubtitle" placeholder="Subtitle">
							<input type="text" name="frmSequence" id="sequence" style="display: none">
						</div>		
					</div>
					<div id="hideError"></div>
					<div class="row row-btn-profile row-btn-profile-1">
						<?php echo $errorMessage; ?>	
						<?php 
							if($_SESSION['isadmin']){
								echo "<a href='myAdmin.php'><button type='button'>Back</button></a>";
							}
							else{
								echo "<a href='profile.php'><button type='button'>Back</button></a>";	
							}
						?>
						<a href=""><button type="submit" name="send">Send</button></a>
					</div>
				</form>
			</div> <!-- End of main-content-->
			<div class="red-bar"></div>
		</div>
	</body>
</html>
