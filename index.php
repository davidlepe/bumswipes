<?php
require('resources/config.php');
require('resources/utilities.php');

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
        </style>
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
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
              <div class="col-md-6">
                  <h4 class="page-text text-center">Bum swipes</h4>
                  <form class="form-inline" method="post" action="find_swipes.php">
                      <label for="maxAmount" class="page-text">I will pay at most </label>
                      <div class="input-group">
                          <div class="input-group-addon">$</div>
                          <input name="maxAmount" type="number" min="0" class="form-control" id="maxAmount" placeholder="dollars for a swipe">
                      </div>
                      <button type="submit" class="btn btn-default">Find Swipes</button>
                      <div class="text-center page-text">
                        <p>Average Listing: $<?php echo getAveragePrice(); ?></p>
                      </div>
                  </form>
              </div>
              <div class="col-md-6">
                  <h4 class="page-text text-center">Post swipes</h4>
                  <form method="post" action="post_swipe.php">
                      <div class="form-group">
                          <label for="userEmail" class="page-text">Email address</label>
                          <input name="email" type="email" class="form-control" id="userEmail" placeholder="Enter email (this is so you can delete your posting later)">
                      </div>
                      <div class="form-group">
                          <label for="userName" class="page-text">Name</label>
                          <input name="name" type="text" class="form-control" id="userName" placeholder="Enter name (it can be your Starbucks name or something)">
                      </div>
                      <div class="form-group">
                          <label for="phone" class="page-text">Phone Number</label>
                          <input name="phone" type="text" class="form-control" id="phone" placeholder="Enter phone number so people can contact you for swipes">
                        </div>
                      <div class="form-group" style="float:left; padding-right:20px">
                          <label for="quantitySwipes" class="page-text">How many swipes?</label>
                          <input name="quantity" type="number" class="form-control" id="quantitySwipes">
                      </div>
                      <div class="form-group" style="float:left;">
                          <label for="swipePrice" class="page-text">How much each? (in USD)</label>
                          <input name="price" type="number" class="form-control" id="swipePrice" min="0" max="20">
                      </div>
                      <br>
                      <div>
                        <button type="submit" class="btn btn-default pull-right">Post Swipe</button>
                      </div>
                  </form>
              </div>
          </div>
          <div class="row">
              <div class="col-md-offset-3 col-md-6 col-xs-offset-1 col-xs-10">
                  <h3 class="page-text text-center">What's Bum Swipes?</h3>
                  <p class="page-text text-justify">BumSwipes is a web platform made by UCI students to make it easy to sell off any excess food commons swipes. At the end of every school year, thousands of freshman who were forced into meal plans have an excess of swipes. If these swipes are not used, they are lost. Every year a small black market surfaces and thousands of freshman sell their swipes all over Facebook. We created this platform to make this process extremely easy.</p>
                  <p class="page-text text-justify">BumSwipes is simple to use. If you are looking to score on a low cost swipe to any of UC Irvine's food commons, simply enter the max price you'd like to pay a swipe and click "Find Swipes". You'll be given contact information of people who have listed their swipes listed under your desired price.</p>
                  <p class="page-text text-justify">If you are trying to sell some swipes, simply enter some basic contact information and your swipes will be listed. You will receive a unique link to your email that will allow you to remove your listing at any moment.</p>
                  <p class="page-text text-center">Questions/Concerns/Feedback? Contact me at <b>admin@bumswipes.com</b></p>
              </div>
          </div>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- footer_ad -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-2992325810015220"
     data-ad-slot="8205985997"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
    </div>
    </body>
</html>