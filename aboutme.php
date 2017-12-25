<?php
session_start();
require("database/connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Placement Details - AICTE</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1, minimum-scale=1.0, maximum-scale=1, user-scalable=no">

<!-- Bootstrap & jQuery (js,css) -->

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- External CSS & JS -->
<link rel="stylesheet" href="css/placement.css" />
<script src="js/placement.js"></script>

<link href="bootstrap/css/font-awesome.min.css" rel="stylesheet" />

<style>
         /* CTA CSS */
 .cta-padding35 {
    padding: 35px 0 35px;
    background-color: #b40028;
    color:#fff;
}
/* Buttons */
.site-btn {
    font-size: 14px;
    padding: 13px 30px;
    border-radius: 5px;
    border: 1px solid #b40028 ;
    min-width: 200px;
    display: inline-block;
    text-align: center;
    position: relative;
    z-index: 1;
    color: #b40028 ;
    background-color:transparent;
    transition: all .25s ease-in-out;
    margin: 10px 0px 10px 0px;
    
}
.site-btn:hover {
    background: #b40028 ;
    border: 1px solid #fff;
    font-weight:700px;
    
    
}
 
/* Footer */
.footer {
    position: relative;
    background-color: #fff;
    color: #707070;
    padding: 55px 0 40px;
}
.footer h5 {
    font-size: 18px;
    font-weight: 700;
    font-family: 'Open Sans', sans-serif;
    color: #707070;
    position: relative;
    padding-bottom: 16px;
}
.footer h5:after {
    content: '';
    display: block;
    margin: 5px 0 0;
    width: 40%;
    height: 1px;
    background-color: #fff;
}
.footer ul {
    list-style: none;
    line-height: 2.2em;
    padding-left:0px;
}
.footer ul a {
    color:#707070;;
}
.footer ul a:hover {
    color:#274abb;;
    text-decoration:none;
}
/*footer bottom */
.footer-bottom {
    padding-top: 5px;
    padding-bottom: 15px;
    border-top: 1px solid rgba(0,0,0,0.09);
    background: #fff;
    
}
.copyright-text p {
    color: #707070;
    margin-top: 18px;
    margin-bottom: 0;
    font-size:12px;
}


.team-content {
    padding: 0px 15px 15px 15px;
}
.border-team {
    border-bottom:1px solid #e2e2e2;
    margin-bottom:10px;
}
.team-img:hover {
    background:#f5f5f5;
    
}

/* Social Icons */

.social-icons{
    
    margin: 0;
    padding: 0;
    font-size : 10px;
}
.social {
    margin:7px 7px 7px 0px;
    color:#232323;
}


#social-fb:hover {
     color: #3B5998;
     transition:all .25s;
 }
 #social-tw:hover {
     color: #4099FF;
     transition:all .25s;
 }
 #social-gh:hover {
     color: #572A7C;
     transition:all .25s;
 }
 #social-em:hover {
     color: #f39c12;
     transition:all .25s;
 }


/* Site Heading */
.site-heading h3{
    font-size : 40px;
    margin-bottom: 15px;
    font-weight: 600;
}
.border {
    background: #e1e1e1;
    height: 1px;
    width: 25%;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 45px;
}

.paddingTB60 {
    padding-top:30px;
    padding-bottom:10px;
}

   .image-aboutus-banner {
    background: linear-gradient(rgba(0,0,0,.7), rgba(0,0,0,.7)), url("images/aboutus-bgimg.jpeg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    color: #fff;
    padding-top: 110px;
    padding-bottom:110px;
 }
 
  
.lg-text {
    font-size:52px;
    font-weight: 600;
    text-transform: none;
    color:#fff;
}
.image-aboutus-para {
    color:#fff;
}


/* font CSS */


h1 {
    font-size: 35px;
    line-height: 40px;
    letter-spacing: 0px;
    font-weight: 600;
    color: #000;
}
h2 {
    font-size: 30px;
    line-height: 40px;
    letter-spacing: 0px;
    font-weight: 600;
    color: #000;
}

h3 {
    line-height: 26px;
    font-size: 20px;
    letter-spacing: 0px;
    font-weight: 600;
    font-style: normal;
    color: #000;
}
 h4 { font-size: 19px; 
     letter-spacing: 0px; 
     font-weight: 600;
     font-style: normal;
     color: #000;
}

p {
    font-weight: 400;
    font-style: normal;
    color: #494949;
}


a {
    color: #494949;
}

.capital {
    text-transform:uppercase;
}



/* Breadcum bar */
.bread-bar {
    background: #f9f9f9;
    box-shadow: 0 1px 2px rgba(0,0,0,.1);
    min-height: 40px;
    height: auto;
    position: relative;
    z-index: 555;
}
.breadcrumb {
    background: none;
    margin: 0;
    font-weight: 300;
    padding-left: 0;
    font-size: 13px;
}
.breadcrumb a {
    color: #999;
}
.breadcrumb > .active {
    color: #666;
}
.breadcrumb > li + li::before {
    content: "\203A";
    color: #999;
    padding: 0 8px;
}
</style>

</head>
<body class="mainpage-body">

<?php require("sidenavpanel.php"); ?>	

<!-- This Div for Side Navigation -->
<div id="main" class="mainpage">

	<!-- Mainpage Navbar -->
	<?php require("navbar.php"); ?>
	
	<?php
		require("aboutmepanel.php"); 
	?>
</div>



</body>
</html>