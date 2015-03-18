<?php
require('resources/config.php');
require('resources/utilities.php');

logUserVisit($_SERVER['REMOTE_ADDR'], $_SERVER['REQUEST_URI']);
if (empty($_GET['uid']) or !(validUID($_GET['uid']))) {
	header("Location: index.php");
}



?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="bumswipes">
        <meta name="author" content="David Lepe">
        <title>BumSwipes - Bum a Swipe!</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            body {
                background: deepskyblue;
            }

            .page-text {
                color: #ffffff;
            }

            .side-by-side-form {
                display: inline-block;
                width: 45%
            }
        </style>
    </head>
    <body>
    <div class="container">
          <div class="row">
              <div class="col-md-offset-3 col-md-6 col-xs-offset-1 col-xs-10">
                  <h1 class="page-text text-center"><a href="index.php" style="color: #ffffff; text-decoration: none">Bum Swipes</a></h1>
                  <h4 class="page-text text-center">For UCI Students, by UCI Students</h4>
              </div>
          </div><br><br>
          <div class="row">
            <div class="col-md-offset-3 col-md-6 col-xs-offset-1 col-xs-10">
              <h3 class="page-text text-center">Modify Swipe</h3>
            </div>

            <div class="col-md-offset-3 col-md-6 col-xs-offset-1 col-xs-10">
            	<form method="post" action="update_swipe.php?uid=<?php echo htmlspecialchars($_GET['uid']) ?>">
              		<div class="col-xs-12 page-text">
	              		<?php 
		              	$row = retrieveSwipe(htmlspecialchars($_GET['uid'])); 
		              	echo "<b>Name: </b>" . $row[1] . "<br>";
		              	echo "<b>Email: </b>" . $row[0] . "<br>";
		              	echo "<b>Phone Number: </b>" . $row[2] . '<input name="phone" type="text" class="form-control" id="userName">' . "<br>";
		              	echo "<b>Quantity: </b>" . $row[3] . '<input name="quantity" type="number" class="form-control" id="quantitySwipes">' . "<br>";
		              	echo "<b>Price: </b>$" . $row[4] . '<input name="price" type="text" class="form-control" id="swipePrice">' . "<br>";		     
		              	?>
		              	<br><br><br>
		              	<button type="submit" name="update" class="btn btn-default">Update Swipe</button>
		              	<button type="submit" name="delete" class="btn btn-danger pull-right">Delete Swipe</button>
              		</div>
              	</form>
            </div>

          </div>
          <div class="row">
              <div class="col-md-offset-3 col-md-6 col-xs-offset-1 col-xs-10">
                  <h3 class="page-text text-center">What's BumSwipes?</h3>
                  <p class="page-text text-justify">BumSwipes is a web platform made by UCI students to make it easy to sell off any excess food commons swipes. At the end of every school year, thousands of freshman who were forced into meal plans have an excess of swipes. If these swipes are not used, they are lost. Every year a small black market surfaces and thousands of freshman sell their swipes all over Facebook. We created this platform to make this process extremely easy.</p>
                  <p class="page-text text-justify">BumSwipes is simple to use. If you are looking to score on a low cost swipe to any of UC Irvine's food commons, simply enter the max price you'd like to pay a swipe and click "Find Swipes". You'll be given contact information of people who have listed their swipes listed under your desired price.</p>
                  <p class="page-text text-justify">If you are trying to sell some swipes, simply enter some basic contact information and your swipes will be listed. You will receive a unique link to your email that will allow you to remove your listing at any moment.</p>
              </div>
          </div>
    </div>
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>