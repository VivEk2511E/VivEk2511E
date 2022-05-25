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
             
         </div> 
      </div>
        <div class="row">
            <div class="row space10"></div>
             <nav id="nav" role="navigation">               	
	            
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
<?php
//include './buyersheader.php';
include './db.php';
$result = mysqli_query($link, "select c.buyerid,buyername,cmp,country,c.cmnt from coderreview c,buyers b where c.buyerid=b.userid and c.coderid='$_GET[coderid]'");
echo "<div class='f-center'><h2>REVIEWS ABOUT CODER</h2></div>";
echo "<div class='disp'>";
if(mysqli_num_rows($result)>0) {
echo "<table class='user_view'><thead><tr><th>Buyer id<th>Buyer Name<th>Company<th>Country<th>Review<tbody>";
while($row = mysqli_fetch_row($result)) {
    echo "<tr>";
    foreach($row as $k=>$r) { 
        //if($k!=0&&$k!=1&&$k!=8)
        echo "<td>$r";        
    }    
}
mysqli_free_result($result);
echo "</tbody></table>";
} else {
    echo "<div class='center'>No Review Found for this Coder...!<br></div>";
}
echo "</div>";
include './footer.php';
?>