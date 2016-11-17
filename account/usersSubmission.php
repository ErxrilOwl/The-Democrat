<!--
	File name: profile.php
	Date Created: 10/16/2016
	Date Last Modified: 10/16/2016
	Developer: Nikko Atuan
-->

<?php
	include("../php/validation.php");
	session_start();
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

			<div class="main-content-1 myAdmin usersSubmission">

				<?php 
					if(!isset($_SESSION['username'])){
						echo "<h3 class='page-error-1'>Oops! Page is unavailable.</h3><h4 class='page-error-2'>Pls <a href='login.php'>login</a> or <a href='sign_up.php'>sign up</a></h4>";
					}
					else{
						echo "<div>".
							"<div class='news-col-header myAdmin-header'>".
							"<h3 class='nh-latest'>Users</h3><h3 class='nh-news'><span>Submission</span></h3></div>";

						$conn = mysqli_connect("localhost", "1248099", "thedemocrat0", "1248099");
						$per_page = 10;

						if(isset($_GET['page'])){
							$page = $_GET['page'];
						}
						else{
							$page = 1;
						}

						$start = ($page-1)*$per_page;
							
							
						$query = "SELECT * FROM tblarticle LIMIT $start, $per_page";
						$result = mysqli_query($conn, $query);
						
						if(mysqli_num_rows($result) > 0){
							echo "<div class='row-table'><table><tr><th class='td-no'>No.</th><th class='td-title'>Title</th><th class='td-status'>Status</th><th class='td-date'>Date Submitted</th><th class='td-view'></th></tr>";

							while($row = mysqli_fetch_assoc($result)){
								echo "<tr><td class='td-no'>".$row['id']."</td>
											<td class='td-title-link'><a href='../sections/view.php?articleId=".$row['id']."'>".$row['title']."</a></td>";
								if($row['status'] == "pending"){
									echo "<td class=td-status-gray>".$row['status'];
								}
								else if($row['status'] == "approved"){
									echo "<td class=td-status-green>".$row['status'];	
								}
								else{
									echo "<td class=td-status-red>".$row['status'];	
								}

								echo "...</td> <td class='td-date'>".$row['date_submitted']."</td> <td class='td-view'><a href='../sections/view.php?articleId=".$row['id']."'><button>View</button></a></td> <tr>";
							}
							echo "</table></div>";
						}
						else{
							echo "Whoops! No results.";
						}
						
					}
				?>
				<?php 
					$query = "SELECT * FROM tblarticle";
					$result = mysqli_query($conn, $query);
					$total_records = mysqli_num_rows($result);
					$total_pages = ceil($total_records/$per_page);

					echo "<div class='row row-page row-btn-profile'>".
							"<a href='usersSubmission.php?page=1'><button class='special'>First Page</button></a>";
					
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
									echo "<a href='usersSubmission.php?page=".$i."'><button class='current'>".$i."</button></a>";	
								}
								else{
									echo "<a href='usersSubmission.php?page=".$i."'><button>".$i."</button></a>";	
								}
							}			
						}
						else{
							for($i = 1; $i <= 5; $i++){
								if($i == $page){
									echo "<a href='usersSubmission.php?page=".$i."'><button class='current'>".$i."</button></a>";	
								}
								else{
									echo "<a href='usersSubmission.php?page=".$i."'><button>".$i."</button></a>";	
								}
							}	
						}	
					}
					else{
						for($i = 1; $i <= $total_pages; $i++){
							if($i == $page){
								echo "<a href='usersSubmission.php?page=".$i."'><button class='current'>".$i."</button></a>";	
							}
							else{
								echo "<a href='usersSubmission.php?page=".$i."'><button>".$i."</button></a>";	
							}
						}	
					}
						
					echo "<a href='usersSubmission.php?page=".$total_pages."'><button class='special'>Last Page</button></a></div>";

					mysqli_close($conn);
				?>
			</div>	

		</div>
		<div class="red-bar"></div>
	</body>
</html>
