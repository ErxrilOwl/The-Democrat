<!--
	File name: sign_up.php
	Date Created: 10/21/2016
	Date Last Modified: 10/23/2016
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

			<div class="main-content-1 history constitutionAndByLaws">
				<header class="row header">
					<h2>Constitutions and By Laws</h2>
				</header>
			
				<div class="content">
					<div class="row">
						<h3>PREAMBLE</h3>
						<p>
							We, the staff of The DEMOCRAT, imploring the aid of Almighty God, in order to adhere to the principle
							of a freer student media and student-centered publication responsive to the needs of the college departments of
							the University of Nueva Caceres shall uphold the values and ethics of journalism, function as a mean to promote
							the holistic development of the students by exposing them to the objective social realities and to the nationalist
							perspective of issues, defend and assert the students’ and the people’s right and welfare, and contribute to the
							development of responsible and committed student-leaders and journalists, do hereby ordain and promulgate this
							Constitution.
						</p><br>
						<h3>ARTICLE I<br>NAME, SEAL, COLOR, SCOPE, OFFICE</h3>
						<p>
							<strong>Section 1. NAME.</strong> The official student-publication of the University of Nueva Caceres shall be known as The
							DEMOCRAT.<br><br>
							<strong>Section 2. SEAL.</strong> The official seal of The DEMOCRAT is the silhouette of the University founder, Dr. Jaime
							Hernandez, Sr., extending his arm to the open. It symbolizes the democracy he had given to the UNCeans to
							express themselves in the academe to be a productive and progressive citizens of the country. <br><br>
							<strong>Section 3. COLORS.</strong> The official colors of The DEMOCRAT shall be red and gray as they are the official colors
							of the University. <br><br>
							<strong>Section 4. SLOGAN.</strong> The slogan of The DEMOCRAT shall be, “For A Freer Student-Press.” <br><br>
							<strong>Section 5. SCOPE.</strong> The DEMOCRAT is a student-institution that publishes periodicals and other printed materials
							funded, managed, and read by the students. The DEMOCRAT shall publish at least four (4) issues and an annual
							literary folio. <br><br>
							<strong>Section 6. DOMICILE.</strong> The office of The DEMOCRAT shall be located at the right wing of the UNC Sports
							Palace, University of Nueva Caceres, J. Hernandez Avenue, City of Naga, Camarines Sur, Philippines.
						</p><br>

						<h3>ARTICLE II<br>OBJECTIVES</h3>
						<p>
							<strong>Section 1.</strong>
							The DEMOCRAT shall have the following objectives:
							<ol type="a">
								<li>a. to channel students’ interests and aptitudes into functional, productive, and significant activities and
							endeavors;</li>
								<li>b. to serve as an avenue of the students of the University of Nueva Caceres in voicing out their views and
							opinions regarding internal and external issues affecting the students and the people as a whole;</li>
								<li>c. to publish essential and significant information that concern the students and the UNC Community;</li>
								<li>d. to serve as training ground for campus journalists, creative writers and student-leaders of the University
							of Nueva Caceres;</li>
								<li>e. to protect and to assert the students’ and the people’s right and well-being; and</li>
								<li>f. to uphold the standards and ethics of journalism.</li>
							</ol>
							<br>
							<strong>Section 2.</strong>The DEMOCRAT shall adhere to the principle of a freer student media and student-centered campus
							paper. The publication staff shall be autonomous and democratic in the formulation and the interpretation of its
						</p><br>
						<h3>ARTICLE III<br>MEMBERS AND STAFF</h3>
						<p>
							<strong>Section 1. EDITORIAL BOARD.</strong> The Editorial Board (EB) shall be composed of the Editor-in-Chief, Associate
							Editor, Managing Editor, News Editor, Features Editor, Literary Editor, Filipino Editor, and Layout Editor.
							The EB shall be the highest policy-making and governing body of The DEMOCRAT. The members of the
							EB shall be selected through a deliberation participated in by all its regular staff members.<br><br>
							<strong>Section 2. STAFF MEMBERS.</strong> The staff members shall be composed of all regular and probationary staff
							writers or correspondents, circulation manager, layout artist, cartoonist, and photojournalist.
							The regular staff writers shall be assigned as members of the News, Features, and Literary Sections.
							They shall be considered as staff members only after passing the qualifying examinations and interview (for new
							members), which shall be administered by the members of the current EB. The publication may as well have
							apprentice-writer(s) at the option of the existing staffers.<br><br>
							<strong>Section 3. ARTIST.</strong> The DEMOCRAT shall have regular visual and layout artist(s) and shall be selected after
							undergoing a qualifying process to be set forth by the current staffers. The publication may as well have apprentice
							visual and layout artist(s) at the option of the existing staffers.<br><br>
							<strong>Section 4. PHOTOJOURNALIST.</strong> The DEMOCRAT shall have regular photojournalist(s). The publication
							may as well have apprentice or probationary photojournalist(s) at the option of the existing staffers.<br><br>
							<strong>Section 5. TECHNICAL ADVISER.</strong> The DEMOCRAT shall have, at least, one (1) technical adviser. The
							publication staff shall nominate at least three (3) qualified professors and shall submit the list to the Vice-President
							for Students and External Affairs (VPSEA) for approval. The publication staff shall choose the technical adviser
							from the list of nominees through secret balloting on the third week of June following the opening of classes. The
							nominated adviser shall obtain at least 75% of the votes from the whole publication staff. A letter of appointment,
							together with the letter of nomination from the publication staff and a letter of acceptance from the chosen
							technical adviser, shall be noted by the Directors of the Students Affairs (DSA) and approved by the VPSEA.				
						</p><br>
						<h3>ARTICLE IV<br>RIGHTS AND PRIVILEGES OF MEMBERS</h3>
						<p>
							<strong>Section 1.</strong> Every staff member of The DEMOCRAT shall have the following rights and privileges:
							<ol type="a">
								<li>a. shall be informed of all the affairs of the publication and the reasons behind the implementation of policies,
							projects and actions advocated by the publication;</li>
								<li>b. shall be able to participate in discussions and debates on matters concerning the publication;</li>
								<li>c. shall be able to hone and to develop their journalistic and creative skills;</li>
								<li>d. to have access to financial records and other files of the publication;</li>
								<li>e. shall have a Press Identification (ID) card and a Press Uniform;</li>
								<li>f. to avail themselves of the services rendered by the publication;</li>
								<li>g. to enjoy the other rights and privileges as dutiful members of the student press as embodied in national and
							international laws, as well as those provided by Philippine Constitution; and</li>
							<li>h. shall receive scholarship grants based on the following:<br>
							<ul>
								<li>Editor-in-chief - 100%</li>
								<li>Editor-in-chief 100%</li>
							<li>Associate Editor 75%</li>
							<li>Feature Editor 50%</li>
							<li>Literary Editor 50%</li>
							<li>News Editor 50%</li>
							<li>Filipino Editor 50%</li>
							<li>Managing Editor 50%</li>
							<li>Circulation Manager 50%</li>
							<li>Staff Writer 50%</li>
							<li>Layout Artist 50%</li>
							<li>Photojournalist 50%</li>
							<li>Cartoonist/Visual Artist 50%</li>
							<li>Student Assistant 100%</li>
							</ul>
							</li>
							</ol>
								The computation of the scholarship grants for the staff members will be based on the full subject loads
								according to their prospectus or the number of units enrolled during the current semester, whichever is lower. For
								the student assistant, only the 21-unit load will be granted. The laboratory and miscellaneous fees are not covered
								by the scholarship grant.
						</p><br>
						<h3>ARTICE V<br>EDITORIAL BOARD</h3>
						<p>
							<strong>Section 1.</strong>The EB shall have the following collective powers, duties and responsibilities:
							<ol type="a">
								<li>a. formulate and approve policies and guidelines with regards to the smooth functioning of The DEMOCRAT;</li>
								<li>b. discuss and approve disciplinary sanctions, promotions, demotion, and expulsion of the EB members,
							staff-writers, artists, photojournalists, and student assistant;</li>
								<li>c. determine and approve the contents of The DEMOCRAT issues before lay-outing;</li>
								<li>d. formulate and approve the publication’s Plan of Activities, Editorial Policy, and budget allocations;</li>
								<li>e. ensure the proper and the strict implementation of decisions and policies of The DEMOCRAT;</li>
								<li>f. set guidelines and administer the qualifying examinations and interview of new staff members;</li>
								<li>g. choose the official printing press of The DEMOCRAT from the list of the three printing press submitted
							by the Managing Editor; and</li>
								<li>h. deliberate and approve the official stand/view point of The DEMOCRAT on issues in coordination with
							the publication staff.</li>
							</ol>
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
