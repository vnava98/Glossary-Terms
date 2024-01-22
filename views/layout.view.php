<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>PHP Fundamentals: <?= $view_bag['title']; ?></title>
    <!--Link to MAMP/htdocs/assets -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/css/php-fundamentals.css" rel="stylesheet" />
  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="navtop">
        <a class="navbar-brand" href="#">PHP Fundamentals: <?= $view_bag['title']; ?></a>
        <a href="index.php"> <?= $view_bag['home']; ?></a>
        <a href="login.php"> <?= $view_bag['login']; ?></a>
        <a href="signup.php"> <?= $view_bag['signup']; ?></a>
      </div>
    </nav>
        <?php require("$name.view.php"); ?>
    </body>
</html>