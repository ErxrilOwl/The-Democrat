<!--
	File name: index.php
	Date Created: 10/16/2016
	Date Last Modified: 10/16/2016
	Developer: Nikko Atuan
-->

<?php 
	include("php/validation.php");
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

		<link rel="icon" type="image/png" href="images/logo/The DEMOCRAT Logo Tab.png">
		<link href="stylesheets/style.css" type="text/css" rel="stylesheet">
		<link href="stylesheets/responsive.css" type="text/css" rel="stylesheet">
		<link href="stylesheets/slideshow.css" type="text/css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">

		<script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
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
						<img class="logo-1" src="images/logo/University of Nueva Caceres Logo.png">	
					</div>
					<div class="t-elem-2">
						<h1><a href="index.html">THE DEMOCRAT</a></h1>	
					</div>
					<div class="t-elem-3">
						<img class="logo-2" src="images/logo/The DEMOCRAT Logo.png">
					</div>
					<nav class="link-account">
					<?php 
						if($username!=""){
							if($isadmin==true)
							{
								echo "<a class='link-effect link-effect-tablet' href='account/myAdmin.php'>".$username."</a>";
							}
							else{
								echo "<a class='link-effect link-effect-tablet' href='account/profile.php'>".$username."</a>";
							}
							echo "<a class='link-effect link-effect-tablet' href='account/logout.php'>Logout</a>";
						}
						else{
							echo "<a class='link-effect link-effect-tablet' href='account/login.php'>Login</a>";
							echo "<a class='link-effect link-effect-tablet' href='account/sign_up.php'>Sign Up</a>";
						}
					?>		
					</nav>
				</div> <!-- End of title -->

				<div class="row nav-menu title-col-2">
					<div class="menu-btn-burger"><img src="images/icons/burger-dropdown.PNG"></div>
					<ul class="menu">
						<li class="menu-btn"><a class="nav-link-effect nav-before nav-after" href="">HOME</a></li>
						<span class="asterisk">*</span>
						<li id="menu-btn-news" class="menu-btn dropdown">
							<a class="nav-link-effect nav-before nav-after dropbtn" href="news/news.php">NEWS</a>
							<div class="menu-btn-burger-inner"><img class="burger-btn-unhover" src="images/icons/burger-dropdown-inner-0.PNG"> <img class="burger-btn-hover" src="images/icons/burger-dropdown-inner.PNG"></div>
							<ul class="inner-menu inner-menu-news hidden">
								<li><a href="news/news.php#hot-news">Hot</a></li>
								<li><a href="news/news.php#fresh-news">Fresh</a></li>
								<li><a href="news/more-news.php?page=1">More News</a></li>
							</ul>
						</li >
						<span class="asterisk">*</span>
						<li id="menu-btn-feature" class="menu-btn dropdown">
							<a class="nav-link-effect nav-before nav-after dropbtn" href="sections/feature.php?page=1&sections=article">FEATURE</a>
							<div class="menu-btn-burger-inner"><img class="burger-btn-unhover" src="images/icons/burger-dropdown-inner-0.PNG"> <img class="burger-btn-hover" src="images/icons/burger-dropdown-inner.PNG"></div>
							<ul class="inner-menu hidden">
								<li><a href="sections/feature.php?page=1&sections=news">Featured News</a></li>
								<li><a href="sections/feature.php?page=1&sections=article">Featured Articles</a></li>
							</ul>
						</li>
						<span class="asterisk">*</span>
						<li id="menu-btn-feature" class="menu-btn dropdown">
							<a class="nav-link-effect nav-before nav-after dropbtn" href="sections/sections.php?page=1&sections=others">SECTIONS</a>
							<div class="menu-btn-burger-inner"><img class="burger-btn-unhover" src="images/icons/burger-dropdown-inner-0.PNG"> <img class="burger-btn-hover" src="images/icons/burger-dropdown-inner.PNG"></div>
							<ul class="inner-menu inner-menu-sections hidden">
								<li><a href="sections/unc-hot-seat.php?page=1">UNC Hot Seat</a></li>
								<li><a href="sections/sections.php?page=1&sections=articles">Articles</a></li>
								<li><a href="sections/sections.php?page=1&sections=opinion">Opinion</a></li>
								<li><a href="sections/sections.php?page=1&sections=sports">Sports</a></li>
								<li><a href="sections/sections.php?page=1&sections=others">Others</a></li>
							</ul>
						</li>
						<span class="asterisk">*</span>
						<li class="menu-btn"><a class="nav-link-effect nav-before nav-after" href="sections/gallery.php">GALLERY</a></li>
						<span class="asterisk">*</span>
						<li id="menu-btn-about" class="menu-btn dropdown">
							<a class="nav-link-effect nav-before nav-after dropbtn" href="about/institutionProfile.php">ABOUT</a>
							<div class="menu-btn-burger-inner"><img class="burger-btn-unhover" src="images/icons/burger-dropdown-inner-0.PNG"> <img class="burger-btn-hover" src="images/icons/burger-dropdown-inner.PNG"></div>
							<ul class="inner-menu hidden">
								<li><a href="about/history.php">History</a></li>
								<li><a href="about/institutionProfile.php">Institution Profile</a></li>
								<li><a href="about/editorial.php">Editorial Board</a></li>
								<li><a href="about/constitutionAndByLaws.php">Constitution and by Laws</a></li>
							</ul>
						</li>
						<li class="menu-btn menu-btn-account dropdown">
							<a class="nav-link-effect nav-before nav-after" href="#">ACCOUNT</a>
							<div class="menu-btn-burger-inner"><img class="burger-btn-unhover" src="images/icons/burger-dropdown-inner-0.PNG"> <img class="burger-btn-hover" src="images/icons/burger-dropdown-inner.PNG"></div>
							<ul class="inner-menu hidden">
								<?php 
								if($username!=""){
									if($isadmin==true){
										echo "<li><a href='account/myAdmin.php'>".$_SESSION["username"]."</a></li>";									
									}
									else{
										echo "<li><a href='account/profile.php'>".$_SESSION["username"]."</a></li>";
									}
									echo "<li><a href='account/logout.php'>Logout</a></li>";
								}
								else{
									echo "<li><a href='account/login.php'>Login</a></li>";
									echo "<li><a href='account/sign_up.php'>Signup</a></li>";
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

			<div id="da-slider" class="da-slider slideshow">
				<div class="da-slide" style=" background: url('images/slideshow/palaro-2016.jpg') no-repeat; background-size: 100% 100%;">
				</div>
				<div class="da-slide" style=" background: url('images/slideshow/agrarian-reform.jpg') no-repeat; background-size: 100% 100%;">
					<h2>Lorem</h2>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec erat nunc. Ut sagittis felis eu est sollicitudin lobortis. In ac ipsum sit amet enim auctor egestas. Morbi libero neque, ultrices sit amet est fringilla, sollicitudin mollis orci.
					</p>
					<a href="sections/view.php?articleId=34" class="da-link">Read more</a>

				</div>
				<div class="da-slide" style=" background: url('images/slideshow/tosb-2016.jpg') no-repeat; background-size: 100% 100%;">
					<a href="#" class="da-link">Read more</a>
				</div>
				<div class="da-slide" style=" background: url('images/slideshow/cegp.jpg') no-repeat; background-size: 100% 100%;">
					<h2>Lorem Ipsum</h2>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec erat nunc. Ut sagittis felis eu est sollicitudin lobortis. In ac ipsum sit amet enim auctor egestas. Morbi libero neque, ultrices sit amet est fringilla, sollicitudin mollis orci.
					</p>
					<a href="sections/view.php?articleId=32" class="da-link">Read more</a>
				</div>
				<nav class="da-arrows">
					<span class="da-arrows-prev"></span>
					<span class="da-arrows-next"></span>
				</nav>
			</div> <!-- End of the slider -->
		</div>

		<div class="news-block">
			<div class="news-col news-col-1">
				<div class="news-col-header">
					<h3 class="nh-latest">Latest</h3>
					<h3 class="nh-news"><span>News</span></h3>
				</div>	
				
				<section class="news-latest">
					<article class="col-6 col-12">
						<div class="nh-content">
							<div class="nh-img">
								<div class="nh-inside-img" style="background: url(images/news/latest-news/duterte-edca-featured.jpg) no-repeat; background-size: 100% 100%;"></div>
							</div>
							<div class="nh-desc">
								<h4><a href="sections/view.php?articleId=31">Lorem Ipsum</a></h4>
								<p>
									By: Lorem Lorem <br/>
									October 25, 2016
								</p>

								</p>

								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
									Curabitur a porta urna, ut auctor felis. Pellentesque ac 
									commodo mi. Maecenas vitae ipsum in arcu pharetra volutpat. 
									Cras sit amet ligula dolor.
								</p>
							</div>
							<a href="sections/view.php?articleId=31"><button class="button" >
								<span>Read More</span>
							</button></a>
							
						</div>
					</article>

					<article class="col-6 col-12">
						<div class="nh-content">
							<div class="nh-img">
								<div class="nh-inside-img" style="background: url(images/news/latest-news/cegp.jpg) no-repeat; background-size: 100% 100%;"></div>
							</div>
							<div class="nh-desc">
								<h4><a href="sections/view.php?articleId=32">Lorem Ipsum Ipsum Ipsum Ipsum</a></h4>
								<p>
									By: Lorem Lorem <br/>
									October 25, 2016
								</p>

								</p>

								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
									Curabitur a porta urna, ut auctor felis. Pellentesque ac 
									commodo mi. Maecenas vitae ipsum in arcu pharetra volutpat. 
									Cras sit amet ligula dolor.
								</p>
							</div>
							<a href="sections/view.php?articleId=32">
							<button class="button" >
								<span>Read More</span>
							</button></a>
						</div>
					</article>

					<article class="col-6 col-12">
						<div class="nh-content">
							<div class="nh-img">
								<div class="nh-inside-img" style="background: url(images/news/latest-news/download.jpg) no-repeat; background-size: 100% 100%;"></div>
							</div>
							<div class="nh-desc">
								<h4><a href="sections/view.php?articleId=33">Lorem Ipsum</a></h4>
								<p>
									By: Lorem Lorem <br/>
									October 25, 2016
								</p>

								</p>

								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
									Curabitur a porta urna, ut auctor felis. Pellentesque ac 
									commodo mi. Maecenas vitae ipsum in arcu pharetra volutpat. 
									Cras sit amet ligula dolor.
								</p>
							</div>
							<a href="sections/view.php?articleId=33">
							<button class="button" >
								<span>Read More</span>
							</button></a>
						</div>
					</article>

					<article class="col-6 col-12">
						<div class="nh-content">
							<div class="nh-img">
								<div class="nh-inside-img" style="background: url(images/news/latest-news/agrarian-reform.jpg) no-repeat; background-size: 100% 100%;"></div>
							</div>
							<div class="nh-desc">
								<h4><a href="sections/view.php?articleId=34">Lorem Ipsum</a></h4>
								<p>
									By: Lorem Lorem <br/>
									October 25, 2016
								</p>

								</p>

								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
									Curabitur a porta urna, ut auctor felis. Pellentesque ac 
									commodo mi. Maecenas vitae ipsum in arcu pharetra volutpat. 
									Cras sit amet ligula dolor.Maecenas vitae ipsum in arcu pharetra volutpat. 
									Cras sit amet ligula dolor.Maecenas vitae ipsum in arcu pharetra volutpat. 
									Cras sit amet ligula dolor.
								</p>
							</div>
							<a href="sections/view.php?articleId=34">
							<button class="button" >
								<span>Read More</span>
							</button></a>
						</div>
					</article>

					<article class="col-6 col-12">
						<div class="nh-content">
							<div class="nh-img">
								<div class="nh-inside-img" style="background: url(images/news/latest-news/gabiola-featured.jpg) no-repeat; background-size: 100% 100%;"></div>
							</div>
							<div class="nh-desc">
								<h4><a href="sections/view.php?articleId=35">Lorem Ipsum Lorem Ipsum Ipsum Ipsum</a></h4>
								<p>
									By: Lorem Lorem <br/>
									October 25, 2016
								</p>

								</p>

								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
									Curabitur a porta urna, ut auctor felis. Pellentesque ac 
									commodo mi. Maecenas vitae ipsum in arcu pharetra volutpat. 
									Cras sit amet ligula dolor.Maecenas vitae ipsum in arcu pharetra volutpat. 
									Cras sit amet ligula dolor.
								</p>
							</div>
							<a href="sections/view.php?articleId=35">
							<button class="button" >
								<span>Read More</span>
							</button></a>
						</div>
					</article>

					<article class="col-6 col-12">
						<div class="nh-content">
							<div class="nh-img">
								<div class="nh-inside-img" style="background: url(images/news/latest-news/pananalakay-featured.jpg) no-repeat; background-size: 100% 100%;"></div>
							</div>
							<div class="nh-desc">
								<h4><a href="sections/view.php?articleId=36">Lorem Ipsum</a></h4>
								<p>
									By: Lorem Lorem <br/>
									October 25, 2016
								</p>

								</p>

								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
									Curabitur a porta urna, ut auctor felis. Pellentesque ac 
									commodo mi. Maecenas vitae ipsum in arcu pharetra volutpat. 
									Cras sit amet ligula dolor.
								</p>
							</div>
							<a href="sections/view.php?articleId=36">
							<button class="button" >
								<span>Read More</span>
							</button></a>
						</div>
					</article>
				</section>
			</div>

			<div id="twitter_widget" class="news-col news-col-2">
				<div class="dummy-block"></div>
				<a class="twitter-timeline" data-width="370" data-height="500" href="https://twitter.com/uncthedemocrat?lang=en">Tweets by @UNCTheDemocrat</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
		</div>
		
		<!-- Feature Block -->
		<div class="feature-block">
			<div class="h-feature-header"><h2><a href="#">Feature</a></h2></div>
			<div class="h-feature-content">
				<div class="h-feat-col-1">					
					<section class="feat-latest">
						<article class="col-6 col-12">
							<div class="fh-content">
								<div class="fh-img">
									<div class="fh-inside-img" style="background: url(images/feature/futsal-champion.jpg) no-repeat; background-size: 100% 100%;"></div>
								</div>
								<div class="fh-desc">
									<h4><a href="sections/view.php?articleId=37">Lorem Ipsum</a></h4>
									<p>
										By: Lorem Lorem <br/>
										October 25, 2016
									</p>

									</p>

									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
										Curabitur a porta urna, ut auctor felis. Pellentesque ac 
										commodo mi. Maecenas vitae ipsum in arcu pharetra volutpat. 
										Cras sit amet ligula dolor.
									</p>
								</div>
								<a href="sections/view.php?articleId=37">
								<button class="button" >
									<span>Read More</span>
								</button></a>
							</div>
						</article>

						<article class="col-6 col-12">
							<div class="fh-content">
								<div class="fh-img">
									<div class="fh-inside-img" style="background: url(images/feature/cheerdance-cba.jpg) no-repeat; background-size: 100% 100%;"></div>
								</div>
								<div class="fh-desc">
									<h4><a href="sections/view.php?articleId=38">Lorem Ipsum Ipsum Ipsum Ipsum</a></h4>
									<p>
										By: Lorem Lorem <br/>
										October 25, 2016
									</p>

									</p>

									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
										Curabitur a porta urna, ut auctor felis. Pellentesque ac 
										commodo mi. Maecenas vitae ipsum in arcu pharetra volutpat. 
										Cras sit amet ligula dolor.
									</p>
								</div>
								<a href="sections/view.php?articleId=38">
								<button class="button" >
									<span>Read More</span>
								</button></a>
							</div>
						</article>

						<article class="col-6 col-12">
							<div class="fh-content">
								<div class="fh-img">
									<div class="fh-inside-img" style="background: url(images/feature/jj.jpg) no-repeat; background-size: 100% 100%;"></div>
								</div>
								<div class="fh-desc">
									<h4><a href="sections/view.php?articleId=39">Lorem Ipsum</a></h4>
									<p>
										By: Lorem Lorem <br/>
										October 25, 2016
									</p>

									</p>

									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
										Curabitur a porta urna, ut auctor felis. Pellentesque ac 
										commodo mi. Maecenas vitae ipsum in arcu pharetra volutpat. 
										Cras sit amet ligula dolor.
									</p>
								</div>
								<a href="sections/view.php?articleId=39">
								<button class="button" >
									<span>Read More</span>
								</button></a>
							</div>
						</article>

						<article class="col-6 col-12">
							<div class="fh-content">
								<div class="fh-img">
									<div class="fh-inside-img" style="background: url(images/feature/mr-ms-palaro-2015.jpg) no-repeat; background-size: 100% 100%;"></div>
								</div>
								<div class="fh-desc">
									<h4><a href="sections/view.php?articleId=40">Lorem Ipsum</a></h4>
									<p>
										By: Lorem Lorem <br/>
										October 25, 2016
									</p>

									</p>

									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
										Curabitur a porta urna, ut auctor felis. Pellentesque ac 
										commodo mi. Maecenas vitae ipsum in arcu pharetra volutpat. 
										Cras sit amet ligula dolor.Maecenas vitae ipsum in arcu pharetra volutpat. 
										Cras sit amet ligula dolor.Maecenas vitae ipsum in arcu pharetra volutpat. 
										Cras sit amet ligula dolor.
									</p>
								</div>
								<a href="sections/view.php?articleId=40">
								<button class="button" >
									<span>Read More</span>
								</button></a>
							</div>
						</article>

						<article class="col-6 col-12">
							<div class="fh-content">
								<div class="fh-img">
									<div class="fh-inside-img" style="background: url(images/feature/democrat-64.jpg) no-repeat; background-size: 100% 100%;"></div>
								</div>
								<div class="fh-desc">
									<h4><a href="sections/view.php?articleId=41">Lorem Ipsum Lorem Ipsum Ipsum Ipsum</a></h4>
									<p>
										By: Lorem Lorem <br/>
										October 25, 2016
									</p>

									</p>

									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
										Curabitur a porta urna, ut auctor felis. Pellentesque ac 
										commodo mi. Maecenas vitae ipsum in arcu pharetra volutpat. 
										Cras sit amet ligula dolor.Maecenas vitae ipsum in arcu pharetra volutpat. 
										Cras sit amet ligula dolor.
									</p>
								</div>
								<a href="sections/view.php?articleId=41">
								<button class="button" >
									<span>Read More</span>
								</button></a>
							</div>
						</article>

						<article class="col-6 col-12">
							<div class="fh-content">
								<div class="fh-img">
									<div class="fh-inside-img" style="background: url(images/feature/educ-cheerdance.jpg) no-repeat; background-size: 100% 100%;"></div>
								</div>
								<div class="fh-desc">
									<h4><a href="sections/view.php?articleId=42">Lorem Ipsum</a></h4>
									<p>
										By: Lorem Lorem <br/>
										October 25, 2016
									</p>

									</p>

									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
										Curabitur a porta urna, ut auctor felis. Pellentesque ac 
										commodo mi. Maecenas vitae ipsum in arcu pharetra volutpat. 
										Cras sit amet ligula dolor.
									</p>
								</div>
								<a href="sections/view.php?articleId=42">
								<button class="button" >
									<span>Read More</span>
								</button></a>
							</div>
						</article>
					</section>
				</div>	
				<div class="h-feat-col-2">
					<div class="fb-page" data-href="https://www.facebook.com/thedemocratunc/?ref=br_tf" data-tabs="timeline" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true">
						<blockquote cite="https://www.facebook.com/thedemocratunc/?ref=br_tf" class="fb-xfbml-parse-ignore">
							<a href="https://www.facebook.com/thedemocratunc/?ref=br_tf">The DEMOCRAT</a>
						</blockquote>
					</div>
				</div>
			</div>
		</div> <!--End of feature block -->

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
						<li><a href="index.php">Home</a></li>
						<li><a href="news/more-news.php?page=1">News</a></li>
						<li><a href="sections/feature.php?page=1&sections=news">Feature</a></li>
						<li><a href="sections/sections.php?page=1&sections=others">Sections</a></li>
						<li><a href="sections/gallery.php">Gallery</a></li>
						<li><a href="about/institutionProfile.php">About</a></li>
					</ul>
				</div>
			</div>
			
			<div class="col-4 col-12">
				<div class="col-3-content">
					<p>Our Social Presence</p>
					<div class="social-icons">
						<div><a href="#"><img src="images/icons/facebook-icon.png"></a></div>
						<div><a href="#"><img src="images/icons/twitter-icon.png"></a></div>
						<div><a href="#"><img src="images/icons/google-plus-icon.png"></a></div>
						<div><a href="#"><img src="images/icons/instagram-icon.png"></a></div>
						<div><a href="#"><img src="images/icons/youtube-icon.png"></a></div>
					</div>
				</div>
			</div>
		</footer>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.cslider.js"></script>
		<script type="text/javascript">
			$(function() {
			
				$('#da-slider').cslider({
					autoplay	: true,
					bgincrement	: 450
				});
			
			});
		</script>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
	</body>

</html>