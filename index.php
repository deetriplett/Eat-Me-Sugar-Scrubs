<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $pageTitle; ?></title> <!--Will allow us to have same html but different titles-->
		<meta name="description" content="Sugar Scrub with some sass" />
		<meta name="keywords" content="sugar, scrub, handcrafted, natural, beauty, skincare" />
		<meta name="author" content="DawnMonroe" />
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<!-- <link rel="stylesheet" href="css/style.css" type="text/css"> -->
		<link rel="stylesheet" href="css/custom.css" type="text/css">
	</head>
<body>

    <div class="jumbotron">
    			<h1 class=""><a href="">EAT ME SUGAR SCRUBS</a></h1>
				</div>
    	<div class="container-fliud col-lg-12" id="intro">
				<h2>So good, you'll want to eat it. But you probably shouldn't.</h2>
			</div>
    </div>

			<div class="container-fluid left">
	    <p> A high-sugar diet won’t do your skin many favors, but incorporating it into your topical beauty routine can deliver some pretty sweet results.</p>
    	</div>

      <div class="container-fluid">
        <ul class="">
                  <li class="flavors<?php if($section == "flavors"){echo "on";}?>"><a href="flavors.php?cat=flavors">Flavors</a></li>
                  <li class="ingredients<?php if($section == "ingredients"){echo "on";}?>"><a href="flavors.php?cat=ingredients">Ingredients</a></li>
                  <li class="about<?php if($section == "order"){echo "on";}?>"><a href="order.php?">Order</a></li>
              </ul><!--End Nav-->
              </div><!--End Wrapper-->
		<div class="container-fluid">
    <div class="footer">
          <a href="http://twitter.com/treehouse">Twitter</a>
          <a href="https://www.facebook.com/TeamTreehouse">Facebook</a>
        <p>&copy;<?php echo date("Y"); ?> Eat me Sugar Scrubs | Dawn Monroe</p> <!--Updates the year-->
			</div>
    </div><!--End Footer-->
    </body>
    </html>
