<!--
	File name: feature.php
	Date Created: 10/22/2016
	Date Last Modified: 10/22/2016
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
							<div class="menu-btn-burger-inner"><img class="burger-btn-unhover" src="images/icons/burger-dropdown-inner-0.PNG"> <img class="burger-btn-hover" src="../images/icons/burger-dropdown-inner.PNG"></div>
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
							<div class="menu-btn-burger-inner"><img class="burger-btn-unhover" src="images/icons/burger-dropdown-inner-0.PNG"> <img class="burger-btn-hover" src="images/icons/burger-dropdown-inner.PNG"></div>
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
		</div>

		<div class="main-news">
			<div class="main-news-header main-news-header-gray">
				<h2 id="hot-news">
					<?php 
						if(isset($_GET['sections'])){
							$section = $_GET['sections'];
						}
						else{
							$section = 'news';
						}
						echo $section 
					?>
				</h2>
			</div>
			<div class="news-main-hot">
				<div class="news-col news-col-1">
				
					<section class="news-latest">
						<?php 
							$conn = mysqli_connect("localhost", "1248099", "thedemocrat0", "1248099");
							$per_page = 6;

							if(isset($_GET['page'])){
								$page = $_GET['page'];
							}
							else{
								$page = 1;
							}
							
							$start = ($page-1)*$per_page;
							$query = "SELECT * FROM tblarticle WHERE type = '$section' AND isfeature = true ORDER BY date_submitted DESC LIMIT $start, $per_page";
							$result = mysqli_query($conn, $query);

							if(mysqli_num_rows($result) > 0){
								while($row = mysqli_fetch_assoc($result)){
									$varStatus = $row['status'];
									$varTitle = $row['title'];
									$varDate = $row['date_submitted'];


									$imgQuery ="SELECT * FROM tblarticleimg WHERE article_id ='".$row["id"]."'";
									$imgResult =  mysqli_query($conn, $imgQuery);	

									echo "<article class='col-6 col-12'><div class='nh-content'><div class='nh-img'><div class='nh-inside-img nh-new-img'>";

									if(mysqli_num_rows($imgResult)>0){
										while($rowImg = mysqli_fetch_assoc($imgResult)){
										$varImg = "<img height='300' width='300' src='data:image;base64,".$rowImg['image']."'></div></div>";
										}
										echo $varImg;
									}
									else{
										echo "<img height='300' width='300' src='..\\images\\noimage.jpg'></div></div>";
									}

									$authorQuery = "SELECT * FROM tblauthor WHERE author_id = '".$row['author_id']."'";
									$authorResult =  mysqli_query($conn, $authorQuery);	
									if(mysqli_num_rows($authorResult)>0){
										while($rowAuthor = mysqli_fetch_assoc($authorResult)){ $varAuthor = $rowAuthor['fullname'];}
									}
									else{$varAuthor = "Unknown";}


									echo "<div class='nh-desc'><h4><a href='#'>".$varTitle."</a></h4><p>By: ".$varAuthor."<br/>".$varDate."</p></p>";

									$paraQuery = "SELECT * FROM tblsection WHERE article_id ='".$row["id"]."'";
									$paraResult = mysqli_query($conn, $paraQuery);			
									if(mysqli_num_rows($paraResult) > 0){
										while($rowPara = mysqli_fetch_assoc($paraResult)){
											$para = "<p class='para'>".$rowPara['ptext']."</p></div>";
										}
										echo $para;
									}else{ echo "<p class='para'> No text to show </p></div>"; }
									echo  "<a href='view.php?articleId=".$row['id']."'><button class='button'><span>Read More</span></button></a></div></article>";

								}
							}
							else{
								echo "<h3>Whoops! No results.</h3>";
							}
						?>
					</section>

					<?php 
						$query = "SELECT * FROM tblarticle WHERE type = '$section' AND isfeature = true";
					
						$result = mysqli_query($conn, $query);
						$total_records = mysqli_num_rows($result);
						$total_pages = ceil($total_records/$per_page);

						echo "<div class='row row-page row-btn-profile'>".
								"<a href='feature.php?page=1&sections=$section'><button class='special'>First Page</button></a>";
						
						if($total_pages > 5){
							if($page > 2){
								if($page == $total_pages){
									$upper = $page;
									$lower = $page-4;
								}
								else if($page+2 <= $total_pages){
									$upper = $page+2;
									$lower = $page-2;
								}
								else if($page+1 <= $total_pages){
									$upper = $page+1;
									$lower = $page-3;
								}
								for($i = $lower; $i <= $upper; $i++){
									if($i == $page){
										echo "<a href='feature.php?page=".$i."&sections=$section'><button class='current'>".$i."</button></a>";	
									}
									else{
										echo "<a href='feature.php?page=".$i."&sections=$section'><button>".$i."</button></a>";	
									}
								}			
							}
							else{
								for($i = 1; $i <= 5; $i++){
									if($i == $page){
										echo "<a href='feature.php?page=".$i."&sections=$section'><button class='current'>".$i."</button></a>";	
									}
									else{
										echo "<a href='feature.php?page=".$i."&sections=$section'><button>".$i."</button></a>";	
									}
								}	
							}	
						}
						else{
							for($i = 1; $i <= $total_pages; $i++){
								if($i == $page){
									echo "<a href='feature.php?page=".$i."&sections=$section'><button class='current'>".$i."</button></a>";	
								}
								else{
									echo "<a href='feature.php?page=".$i."&sections=$section'><button>".$i."</button></a>";	
								}
							}	
						}
						
							
						echo "<a href='feature.php?page=".$total_pages."&sections=$section'><button class='special'>Last Page</button></a></div>";


						mysqli_close($conn);
					?>
				</div>
				<div id="twitter_widget" class="news-col news-col-2">
					<div class="dummy-block"></div>
					<a class="twitter-timeline" data-width="370" data-height="500" href="https://twitter.com/uncthedemocrat?lang=en">Tweets by @UNCTheDemocrat</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
				</div>
			</div>
		</div>
		<footer>
			<div class="col-4 col-6 col-12">
				<div class="col-1-content">
					<p class="p-1">Copyright &copy; 2016, THE DEMOCRAT </p> 
					<p class="pp">Powered by <a href="#">Nikko Atuan</a></p>
					<p class="pp"><a href="http://www.unc.edu.ph/" targer="_blank">University of Nueva Caceres</a></p>
					<p class="pp">City of Naga, 4400, Philippines</p>
				</div>
			</div>
			
			<div class="col-4 col-6 col-12">
				<div class="col-2-content">
					<p>The Democrat Website</p>
					<ul>
						<li><a href="../index.php">Home</a></li>
						<li><a href="#">News</a></li>
						<li><a href="#">Feature</a></li>
						<li><a href="#">Sections</a></li>
						<li><a href="#">Gallery</a></li>
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
	</body>

</html>