<?php

/**
* Designed by Omar BERRAYTI
* <berrayti.omar@gmail.com>
**/

$title     = "Wamp Home Page"; // The page title
$firstName = "Omar";           // Your first name
$lastName  = "Berrayti";       // Your last name
$phpmyadminDirectory = "../phpmyadmin/"; // PhpMyAdmin Directory
$wampConfFile = '../wampmanager.conf'; // Wamp conf file
$email  = "berrayti.omar@gmail.com";       // Your email address

$folder             = opendir('.');
$projectContents    = '';
$projectsListIgnore = array ('.','..');
while($file = readdir($folder)){
	if(is_dir($file) && !in_array($file, $projectsListIgnore)){
		$screenshot = file_exists($file.'/screenshot.png') ? $file.'/screenshot.png' : "holder.js/260x200/text:".$file;
		$favicon = 'check.png';
		if(file_exists($file.'/favicon.png')){
			$favicon = $file.'/favicon.png';
		}else if(file_exists($file.'/favicon.ico')){
			$favicon = $file.'/favicon.ico';
		}
		$projectContents .= '<div class="span3">
			<a href="/'.$file.'" class="project">
				<span class="favicon"><img src="'.$favicon.'"></span>
				<img src="'.$screenshot.'" style="width:260px;height:200px;">
				<span class="overlay"><h1>'.$file.'</h1></span>
			</a>
		</div>';
	}
		
}
closedir($folder);

if (isset($_GET['phpinfo']))
{
	phpinfo();
	exit();
}

// load conf local file
if (!is_file($wampConfFile))
    die ('Unable to open WampServer\'s config file, please change path in index.php file');
//require $wampConfFile;
$fp = fopen($wampConfFile,'r');
$wampConfFileContents = fread ($fp, filesize ($wampConfFile));
fclose ($fp);

preg_match('|phpVersion = (.*)\n|',$wampConfFileContents,$result);
$phpVersion = str_replace('"','',$result[1]);
preg_match('|apacheVersion = (.*)\n|',$wampConfFileContents,$result);
$apacheVersion = str_replace('"','',$result[1]);
preg_match('|mysqlVersion = (.*)\n|',$wampConfFileContents,$result);
$mysqlVersion = str_replace('"','',$result[1]);
preg_match('|wampserverVersion = (.*)\n|',$wampConfFileContents,$result);
$wampserverVersion = str_replace('"','',$result[1]);


?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
	<style type="text/css">
		#admin a {text-decoration: none; color:#0051AA } #admin a:hover {color:#8EC5FF } #admin {width: 100%; height: 100px; background: #308AEE url(logo.png) no-repeat 10px center; color: #fff; padding : 10px;} #menu { width: 158px; height: 35px; background: #308AEE; color: #fff; float: right; margin: -50px 0; line-height: 35px; text-align: center;} #menu:hover { background: #5DA8F7} .row {margin-left: -30px; *zoom: 1; } .row:before, .row:after {display: table; content: ""; line-height: 0; } .row:after {clear: both; } [class*="span"] {float: left; min-height: 1px; margin-right: 30px; } .container {width: 1170px; margin: 0 auto; } .span12 {width: 1170px; } .span11 {width: 1070px; } .span10 {width: 970px; } .span9 {width: 870px; } .span8 {width: 770px; } .span7 {width: 670px; } .span6 {width: 570px; } .span5 {width: 470px; } .span4 {width: 370px; } .span3 {width: 270px; } .span2 {width: 170px; } .span1 {width: 70px; } .offset12 {margin-left: 1230px; } .offset11 {margin-left: 1130px; } .offset10 {margin-left: 1030px; } .offset9 {margin-left: 930px; } .offset8 {margin-left: 830px; } .offset7 {margin-left: 730px; } .offset6 {margin-left: 630px; } .offset5 {margin-left: 530px; } .offset4 {margin-left: 430px; } .offset3 {margin-left: 330px; } .offset2 {margin-left: 230px; } .offset1 {margin-left: 130px; } .pull-right{float: right; } .pull-left{float: left; } /** * Main rules **/ *{margin: 0; padding: 0; outline: 0; } body{background: #000 url(bg.png); font-family: 'Segoe UI Light', 'Open Sans', Verdana, Arial, Helvetica, sans-serif; color: #FFF; } h1,h2,h3,h4,h5,h6{font-weight: 200; text-shadow: 0 0 1px #FFF; letter-spacing: 0.01em; line-height: 24pt; } /** * Header rules **/ .header{margin: 50px 0; } .header .welcome{font-size: 25pt; } .header .avatar small{font-size: 15px; float: right; } .header .avatar img{width: 50px; height: 50px; margin-left: 10px; vertical-align: middle; } .header .avatar .name{overflow: hidden; } /** * Projects rules **/ .projects .project{border: 5px solid #2D89EF; width: 260px; height: 200px; display: inline-block; position: relative; overflow: hidden; margin-bottom: 10px; -webkit-transition: all 1s ease; -moz-transition: all 1s ease; -o-transition: all 1s ease; -ms-transition: all 1s ease; transition: all 1s easet; } .projects .project:after{width: 0; height: 0; border-top: 40px solid #2D89EF; border-left: 40px solid transparent; position: absolute; display: block; right: 0; content: ""; top: 0; } .projects .project:hover{border-color: #BBB; } .projects .project:hover:after{border-top-color: #BBB; -webkit-transition: all 3s ease; -moz-transition: all 3s ease; -o-transition: all 3s ease; -ms-transition: all 3s ease; transition: all 3s easet; } .projects .project .favicon{position: absolute; top: 0; right: 0; z-index: 999; } .projects .project .favicon img{width: 16px; height: 16px; } .projects .project .overlay{position: absolute; width: 240px; height: 20px; overflow: hidden; background-color: #1e1e1e; color: #fff; font-size: 8pt; text-align: left; line-height: 12px; padding: 5px 10px; opacity: .8; bottom: -55px; } .projects .project .overlay h1{font-size: 20px; line-height: 17px; } .projects .project:hover .overlay{-webkit-transform: translate(0, -55px); -ms-transform: translate(0, -55px); -o-transform: translate(0, -55px); -moz-transform: translate(0, -55px); transform: translate(0, -55px); -webkit-transition: all 0.3s ease; -moz-transition: all 0.3s ease; -o-transition: all 0.3s ease; -ms-transition: all 0.3s ease; transition: all 0.3s easet; }
	</style>
</head>
<body>
	<div class="container">

		<!-- Header section -->
		<div id="admin">
			<div style="margin: 0 0 0 140px">
				<p><strong>Wamp</strong>: <?php echo $wampserverVersion; ?></p>
				<p><strong>MySQL</strong>: <?php echo $mysqlVersion; ?></p>
				<p><strong>Apache</strong>: <?php echo $apacheVersion; ?></p>
				<p><strong>PHP</strong>: <?php echo $phpVersion; ?></p>
			</div>
			<div style="margin: -90px 0 0 320px">
				<p><a href="?phpinfo">> PHP Info</a></p>
				<p><a href="<?php echo $phpmyadminDirectory; ?>">> PhpMyAdmin</a></p>
			</div>
		</div>
		<a href="#"><div id="menu">Admin</div></a>
		<div class="header">
			<div class="row">
				<div class="pull-left">
					<h1 class="welcome">Welcome</h1>
				</div>
				<div class="pull-right">
					<div class="avatar">
						<div class="row">
							<div class="name pull-left">
								<h1><?php echo $firstName; ?></h1>
								<small><?php echo $lastName; ?></small>
							</div>
							<div class="pull-right">
								<img src="http://cdn.libravatar.org/avatar/<?php echo md5($email);?>?s=180">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Projects -->
		<div class="projects">
			<div class="row">
				<?php echo $projectContents; ?>
			</div>
		</div>

	</div>
	
	<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="holder.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var open = false;
			$('#admin').hide();
			$('#menu').click(function() {
				if(!open) {
					$('#admin').slideDown();
					$('#menu').text('Close');
					open = true;
				} else if(open) {
					$('#admin').slideUp();
					$('#menu').text('Admin');
					open = false;
				}
			});
		});
	</script>
</body>
</html>
