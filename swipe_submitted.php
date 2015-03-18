<?php
require('resources/config.php');
require('resources/utilities.php');

if (empty($_SESSION['uid'])) {
  header('Location: index.php');
}

unset($_SESSION['uid']);

logUserVisit($_SERVER['REMOTE_ADDR'], $_SERVER['REQUEST_URI']);
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
              <h3 class="page-text text-center">Thank you for submitting a swipe. You may modify your listing at any time by visiting this <a href="http://www.bumswipes.com/modify_swipe.php?uid=<?php echo htmlspecialchars($_GET['uid']); ?>">link</a>. In case you lose your link, we have sent an email to: <?php echo htmlspecialchars($_GET['email']); ?></h3>
            </div>
          </div>
          <div class="row">
              <div class="col-md-offset-3 col-md-6 col-xs-offset-1 col-xs-10">
                  <h3 class="page-text text-center">What's Bum Swipes?</h3>
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