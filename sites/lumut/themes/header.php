<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <?php if ( ! empty($opengraph)) : ?>
    <?php foreach($opengraph as $name => $value) : ?>
      <meta property="og:<?php echo $name; ?>" content="<?php echo $value; ?>">
    <?php endforeach; ?>
  <?php endif; ?>
  
  <meta name="title" content="<?php echo $title; ?>">
  <meta name="description" content="<?php echo $site_description; ?>">
  
  <meta name="Rating" content="General">

  <link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo THEMEURL; ?>assets/css/style.css">

  <title><?php echo $title; ?></title>
</head>
<body>
  <div id="container">
    <div id="header">
      <h1><?php echo $title; ?></h1>
      <p><?php echo $description; ?></p>
    
      <nav>
        <ul>
          <?php foreach($menus as $name => $link) : ?>
            <li><a href="<?php echo BASEURL . $link; ?>"><?php echo $name; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </nav>
    </div>