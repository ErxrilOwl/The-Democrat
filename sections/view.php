<!--
	File name: profile.php
	Date Created: 10/16/2016
	Date Last Modified: 10/16/2016
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
	if(isset($_GET['articleId'])){
		$articleId = $_GET['articleId'];	
	}
	else{
		$articleId = 1;	
	}
	
	

	if(isset($_POST["save"])){
		$conn = mysqli_connect("localhost", "1248099", "thedemocrat0", "1248099");
		$query = "UPDATE tblarticle
						SET type = '".$_POST['frmSection']."', status ='".$_POST['frmStatus']."', isfeature=".$_POST['frmFeature']." WHERE id = '$articleId'";
		if(mysqli_query($conn, $query)){
				$errorMessage = "<p class='alert'>Success!!!</p>";
				echo $errorMessage;
			}
			else{
				$errorMessage = "<p class='alert'>Failed!!!</p>";
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
						<li class="menu-btn"><a class="nav-link-effect nav-before nav-after" href="gallery.php">GALLERY</a></li>
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

			<div class="main-content-1 myAdmin view" id="view">
				<?php 
					$username = 'nekokeeno';
					if(!isset($username)){
						if(!isset($_GET['articleId'])){
							echo "<h3 class='page-error-1'>Oops! Page is unavailable.</h3><h4 class='page-error-2'>Pls <a href='login.php'>login</a> or <a href='sign_up.php'>sign up</a></h4>";	
						}
						else{
							displayContent();
						}
					}
					else{
						displayContent();
					}

					function displayContent(){
						if(!isset($_GET['articleId'])){
							echo "<h3 class='page-error-1'>Oops! Page is unavailable.</h3><h4 class='page-error-2'>Pls <a href='login.php'>login</a> or <a href='sign_up.php'>sign up</a></h4>";	
						}
						else{
							$conn = mysqli_connect("localhost", "1248099", "thedemocrat0", "1248099");
							$query = "SELECT * FROM tblarticle WHERE id = '".$_GET['articleId']."'";
							$result = mysqli_query($conn, $query);
						
							if(mysqli_num_rows($result) > 0){
								while($row = mysqli_fetch_assoc($result)){
									$varStatus = $row['status'];
									$varTitle = $row['title'];
									$varSubTitle = $row['subtitle'];
									$varDate = strtotime($row['date_submitted']);
									$varIsFeature = $row['isfeature'];
									$varStatus = $row['status'];
									$varSection = $row['type'];
									$varSequence = $row['sequence'];
									$varAuthor = $row['author_id'];
								}
								$authorQuery = "SELECT * FROM tblauthor WHERE author_id = '".$varAuthor."'";
								$authorResult =  mysqli_query($conn, $authorQuery);	
								if(mysqli_num_rows($authorResult)>0){
									while($rowAuthor = mysqli_fetch_assoc($authorResult)){ $varAuthorName = $rowAuthor['fullname'];}
								}
								else{$varAuthorName = "Unknown";}

								if(isset($_SESSION['isadmin'])){
									echo "<div class='row-view'><div class='col col-title'><h3>View Article</h3></div><div class='col col-form'>
										<form action=".htmlspecialchars($_SERVER['PHP_SELF'])."?articleId=".$_GET['articleId']." method='post'>
											<div class='col'><a href='../account/usersSubmission.php?page=1'><button type='button'>Back</button></a></div>
											<div class='col'><button type='submit' name='save'>Save</button></div>
											<div class='col'>
												<select required='required' name='frmFeature'><option value='' disabled selected hidden>--Feature--</option>";
									if($varIsFeature == true){
										echo "<option value='true' selected='selected'>Feature Item</option>";
										echo "<option value='false'>Unfeature Item</option>";
									}
									else{
										echo "<option value='true'>Feature Item</option>";
										echo "<option value='false' selected='selected'>Unfeature Item</option>";	
									}
									
									echo "</select></div><div class='col'><select required='required' name='frmStatus'> <option value='' disabled selected hidden>--Status--</option>";

									if($varStatus == "pending"){
										echo "<option value='pending' selected>Pending</option>
									<option value='approved'>Approved</option>
									<option value='rejected'>Rejected</option>";	
									}
									else if($varStatus == "approved"){
										echo "<option value='pending'>Pending</option>
									<option value='approved' selected >Approved</option>
									<option value='rejected'>Rejected</option>";
									}
									else{
										echo "<option value='pending'>Pending</option>
									<option value='approved'>Approved</option>
									<option value='rejected' selected >Rejected</option>";	
									}
									

									echo "</select></div><div class='col'><select required='required' name='frmSection'><option value='' disabled selected hidden>--Section--</option>";

									
									if($varSection == "article"){
										echo "<option value='article' selected>Article</option>
										<option value='news'>News</option>
										<option value='opinion'>Opinion</option>
										<option value='sports'>Sports</option>
										<option value='hot-seat'>UNC Hot Seat</option>
										<option value='others'>Others</option>";
									}
									else if($varSection == "news"){
										echo "<option value='article'>Article</option>
										<option value='news' selected>News</option>
										<option value='opinion'>Opinion</option>
										<option value='sports'>Sports</option>
										<option value='hot-seat'>UNC Hot Seat</option>
										<option value='others'>Others</option>";	
									}
									else if($varSection == "opinion"){
										echo "<option value='article'>Article</option>
										<option value='news'>News</option>
										<option value='opinion' selected>Opinion</option>
										<option value='sports'>Sports</option>
										<option value='hot-seat'>UNC Hot Seat</option>
										<option value='others'>Others</option>";		
									}
									else if($varSection == "sports"){
										echo "<option value='article'>Article</option>
										<option value='news'>News</option>
										<option value='opinion'>Opinion</option>
										<option value='sports' selected>Sports</option>
										<option value='hot-seat'>UNC Hot Seat</option>
										<option value='others'>Others</option>";			
									}
									else if($varSection == "hot-seat"){
										echo "<option value='article'>Article</option>
										<option value='news'>News</option>
										<option value='opinion'>Opinion</option>
										<option value='sports'>Sports</option>
										<option value='hot-seat' selected>UNC Hot Seat</option>
										<option value='others'>Others</option>";			
									}
									else{
										echo "<option value='article'>Article</option>
										<option value='news'>News</option>
										<option value='opinion'>Opinion</option>
										<option value='sports'>Sports</option>
										<option value='hot-seat'>UNC Hot Seat</option>
										<option value='others' selected>Others</option>";				
									}
									echo "</select></div></form></div></div>";
								}

								echo "<div class='block'>
										<div class='row-title'>
											<h3>".$varTitle."</h3>
											<h4>".$varSubTitle."</h4>
											<h5>by :".$varAuthorName."</h5>
											<h6>".date('F j, Y',$varDate)."</h6>
										</div>
										<div class='row-content'>";

								$limit = (1+substr_count($varSequence, ','));
								$start = 0;
								for($i = 0; $i < $limit; $i++){
									$end = strpos($varSequence, ",", $start);
									if($i+1 == $limit){
										$end = strlen($varSequence);
									}
									$seqName = substr($varSequence, $start, $end-$start);
									$start = $end+1;

									if($seqName[3] == "P"){
									
										$queryPara = "SELECT * FROM tblsection WHERE article_id = '".$_GET['articleId']."' AND para_name = '".$seqName."'";

										$paraResult = mysqli_query($conn,$queryPara);
										if(mysqli_num_rows($paraResult)>0){
											while($rowPara = mysqli_fetch_assoc($paraResult)){
												$paraSectionTitle = $rowPara['section_title'];
												$paraParagraph = $rowPara['ptext'];
												
											}
											echo "<div class='row-section'><h4>".$paraSectionTitle."</h4><p>".nl2br($paraParagraph)."</p></div>";	
										}
										

									} 
									else{
										$queryImg = "SELECT * FROM tblarticleimg WHERE article_id = '".$_GET['articleId']."'";
										$paraImg = mysqli_query($conn,$queryImg);
										if(mysqli_num_rows($paraImg)>0){
											while($rowImg = mysqli_fetch_assoc($paraImg)){
												$imgImage = $rowImg['image'];
												
											}
											echo "<div class='row-image'>
												<img height='300' width='300' src='data:image;base64,".$imgImage."'></div>";
										}	
									}
									
								}
								echo "</div>";		
							}
							else{
								echo "Whoops! No results.";
							}
						}
					}
				?>
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
						<li><a href="../news/more-news.php?page=1">News</a></li>
						<li><a href="../sections/feature.php?page=1&sections=news">Feature</a></li>
						<li><a href="../sections/sections.php?page=1&sections=others">Sections</a></li>
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

			<div class="red-bar"></div>
		</div>
		<script type="text/javascript">
			(function(){ 
				var paraHeight = document.querySelectorAll('.row-section p');
				var totalHeight = 0;
				for(var i=0; i<paraHeight.length; i++){
					
					if(paraHeight[i].offsetHeight) {
					    totalHeight+=paraHeight[i].offsetHeight;

					} else if(paraHeight[i].style.pixelHeight) {
					    totalHeight+=paraHeight[i].style.pixelHeight;
					}
				}
				var countImg = document.querySelectorAll('.view .block .row-content .row-image').length;
				document.getElementById("view").style.height = ((totalHeight/3.6)+(countImg*20)+100)+"vh";
				document.querySelector(".view .block").style.height = ((totalHeight/3.6)+(countImg*20)+60)+"vh";
			})();
		</script>
	</body>
</html>
