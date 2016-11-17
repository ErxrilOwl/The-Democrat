<!--
	File name: history.php
	Date Created: 10/19/2016
	Date Last Modified: 10/19/2016
	Developer: Nikko Atuan
-->

<?php
	include("../php/validation.php");
	session_start();

	if(isset($_SESSION["username"]))
	{
		$username=$_SESSION["username"];
	}
	else{
		$username = "";
	}
	if(isset($_SESSION["isadmin"])){
		$isadmin = $_SESSION['isadmin'];
	}
	else{
		$isadmin = false;
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
						<?php 
							if($username!=""){
								if($isadmin==true){
									echo "<a class='link-effect link-effect-tablet' href='../account/myAdmin.php'>".$username."</a>";
								}
								else{
									echo "<a class='link-effect link-effect-tablet' href='../account/profile.php'>".$username."</a>";
								}
								echo "<a class='link-effect link-effect-tablet' href='../account/logout.php'>Logout</a>";
							}
							else{
								echo "<a class='link-effect link-effect-tablet' href='../account/login.php'>Login</a>";
								echo "<a class='link-effect link-effect-tablet' href='../account/sign_up.php'>Sign Up</a>";
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
							<div class="menu-btn-burger-inner"><img class="burger-btn-unhover" src="../images/icons/burger-dropdown-inner-0.PNG"> <img class="burger-btn-hover" src="images/icons/burger-dropdown-inner.PNG"></div>
							<ul class="inner-menu hidden">
							<?php 
								if($username!=""){
									if($isadmin==true){
										echo "<li><a href='../account/myAdmin.php'>".$username."</a></li>";									
									}
									else{
										echo "<li><a href='../account/profile.php'>".$username."</a></li>";
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

			<div class="main-content-1 history">
				<header class="row header">
					<h2>The Democrat History</h2>
				</header>
			
				<div class="content">
					<div class="row row-top">
						<div class="col col-3"><img src="../images/logo/old-logo.jpg"></div>
						<div class="col col-9">
							<h2>The Democrat</h2>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tempus sapien ante, at finibus felis luctus a. Cras convallis elit vitae iaculis placerat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sit amet ex fringilla, accumsan velit ac, tincidunt massa. Praesent consequat eget magna ut elementum.
							</p>
						</div>
					</div>
					<div class="row">
						<p>
							Phasellus accumsan mauris eget dictum tincidunt. Vestibulum sit amet urna vel arcu finibus dapibus finibus eget enim. Sed mi elit, tincidunt at leo sed, sollicitudin scelerisque sem. Curabitur et felis odio. Fusce sed ultrices lorem. Nullam sed ex nec magna fermentum maximus sit amet in felis. Sed blandit volutpat purus, vel sodales lorem auctor eu. Sed egestas facilisis magna, id semper odio accumsan varius. Suspendisse posuere quam rhoncus, rutrum leo blandit, mollis libero. Donec volutpat mi vel lacus tempor, at eleifend mauris consectetur. Sed luctus auctor metus ut aliquet. Curabitur nec libero dignissim, feugiat nisi et, finibus nibh. Fusce rutrum volutpat turpis, et blandit odio vehicula sed. Curabitur id mauris vel nulla elementum maximus eu nec elit.
						</p>

						<p>
							Curabitur dictum urna vitae velit rutrum mattis. Donec posuere odio metus, et porta mauris tincidunt in. Nulla placerat sapien vel dolor auctor pretium. Duis id odio metus. Curabitur volutpat facilisis nulla, nec dignissim massa aliquam et. Nulla scelerisque auctor porta. Vivamus a pretium orci. Vivamus lacus sem, auctor eu tempor eget, dapibus ac risus. Curabitur cursus non dolor a pretium. Nulla feugiat ullamcorper ex, sed dignissim lectus vulputate in. Sed tempus orci nisl, eget faucibus enim varius egestas. Aenean maximus urna magna, id venenatis risus ultrices non. Aenean ultricies, sem a pellentesque luctus, lacus mi facilisis nibh, accumsan maximus dolor quam id lacus. Suspendisse ut neque et urna faucibus porta vitae vitae purus. In at odio in est lacinia porta.
						</p>

						<p>
							Donec lacinia varius fringilla. Suspendisse potenti. Donec elementum eros eget semper scelerisque. Integer hendrerit tincidunt diam non lacinia. Nullam pretium scelerisque nunc sed faucibus. Nullam in felis risus. In sit amet bibendum metus.
						</p>

						<p>
							Vivamus et lorem in nunc interdum commodo nec quis velit. Proin feugiat vel quam vitae feugiat. Phasellus tellus enim, aliquam eget imperdiet eget, maximus eget erat. Phasellus rhoncus venenatis neque nec ultrices. Maecenas quis elit arcu. Sed ornare, lorem ac vehicula volutpat, purus est aliquet odio, et feugiat dui odio in ex. Duis posuere malesuada eros, at commodo purus cursus vel. Aliquam id mauris ipsum. Vestibulum diam eros, faucibus eget nibh nec, accumsan feugiat tellus.
						</p>
					</div>
				</div>
			</div>


		<footer>
			<div class="col-4 col-6 col-12">
				<div class="col-1-content">
					<p class="p-1">Copyright &copy; 2016, THE DEMOCRAT </p> 
					<p class="pp">Powered by <a href="https://ph.linkedin.com/in/nikko-atuan-135aa9120">Nikko Atuan</a></p>
					<p class="pp"><a href="http://www.unc.edu.ph/" targer="_blank">University of Nueva Caceres</a></p>
					<p class="pp">City of Naga, 4400, Philippines</p>
				</div>
			</div>
			
			<div class="col-4 col-6 col-12">
				<div class="col-2-content">
					<p>The Democrat Website</p>
					<ul>
						<li><a href="../index.php">Home</a></li>
						<li><a href="../news/more-news.php?page=1">News</a></li>
						<li><a href="../sections/feature.php?page=1&sections=news">Feature</a></li>
						<li><a href="../sections/sections.php?page=1&sections=others">Sections</a></li>
						<li><a href="../sections/gallery.php">Gallery</a></li>
						<li><a href="../about/institutionProfile.php">About</a></li>
					</ul>
				</div>
			</div>
			
			<div class="col-4 col-12">
				<div class="col-3-content">
					<p>Our Social Presence</p>
					<div class="social-icons">
						<div><a href="#"><img src="../images/icons/facebook-icon.png"></a></div>
						<div><a href="#"><img src="../images/icons/twitter-icon.png"></a></div>
						<div><a href="#"><img src="../images/icons/google-plus-icon.png"></a></div>
						<div><a href="#"><img src="../images/icons/instagram-icon.png"></a></div>
						<div><a href="#"><img src="../images/icons/youtube-icon.png"></a></div>
					</div>
				</div>
			</div>
		</footer>

			<div class="red-bar"></div>
		</div>
	</body>
</html>
