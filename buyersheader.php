<?php
session_start();
include './db.php';
if(!isset($_SESSION['buyerid'])) {
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="not-ie"> <!--<![endif]-->
<head>
  <title>Mingle Box</title>  
  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon" type="image/png">

  <!-- Styles -->
  <link href="css/styles.css" rel="stylesheet">
  <link href="css/bootstrap-override.css" rel="stylesheet">

  <!-- Font Avesome Styles -->
  <link href="css/font-awesome/font-awesome.css" rel="stylesheet">
	<!--[if IE 7]>
		<link href="css/font-awesome/font-awesome-ie7.min.css" rel="stylesheet">
	<![endif]-->
  <!-- FlexSlider Style -->
  <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen">
</head>       
<body>
  <!-- Header -->
  <header id="header">      
    <div class="container">
        
      <div class="row t-container" style="text-align: center;">
          
        <!-- Logo -->
        <div class="span3">
          <div class="logo">
            <a href="#"></a>
          </div>
        </div>

        <div class="span12" style="margin-left:0;">
            <h1 class="clg_head">Mingle Box</h1>
            <div class="sub_head">DEVELOPING AN EFFICIENT INTERFACE TO GET THE SOFTWARE REQUIREMENTS OF BUYERS FULFILLED BY CODERS</div>
            <h3 class="center"></h3>
          <div class="row"></div>
             <!--nav id="nav" role="navigation">
               	<a href="#nav" title="Show navigation">Show navigation</a>
	            <a href="#" title="Hide navigation">Hide navigation</a>
	            <ul class="clearfix">
	           	<li class="active"><a href="index.php" title="">Home</a></li>
                <li><a href="about-us.htm" title="">About Us</a></li>                
                <li><a href="gallery.htm" title="">Gallery</a></li>
                <li><a href="services.htm" title="">Services</a></li>
                <li><a href="components.htm" title=""><span>Features</span></a>
  			      <ul> <!-- Submenu>
                      <li><a href="components.htm" title="">Components</a></li>
                      <li><a href="blog.htm" title="">Blog</a></li>
                      <li><a href="blog-detail.htm" title="">Blog Detail</a></li>
                      <li><a href="contact.htm" title="">Contact</a></li>
  		         </ul> <!-- End Submenu>      
               </li>
	           </ul>
          </nav-->
         </div> 
      </div>
        <div class="row">
            <div class="row space10"></div>
             <nav id="nav" role="navigation">               	
	            <ul class="clearfix">
	           	<li class="active"><a href="buyerhome.php" title="">New Project</a></li>
                                <li><a href="bviewreq.php">View Request</a></li>
                                <li><a href="bviewallot.php">View Allotment</a></li>
                                <li><a href="signout.php">Signout</a></li>
	           </ul>
          </nav>
        </div>
       <div class="row space40"></div>
  </div>
</header>
  <!-- Header End -->
  <!-- Content -->
  <div id="content">
    <div class="container">
       <div class="f-center">
              <h2></h2>
    <div class="head-info">
        
    </div>  
       </div>
       <div class="f-hr"></div>
      <div class="row space40"></div>
      <div class="row">