<?php
	// Start session.
	session_start();
	
	// Set a key, checked in mailer, prevents against spammers trying to hijack the mailer.
	$security_token = $_SESSION['security_token'] = uniqid(rand());
	
	if ( ! isset($_SESSION['formMessage'])) {
		$_SESSION['formMessage'] = 'Fill in the form below to send me an email.';	
	}
	
	if ( ! isset($_SESSION['formFooter'])) {
		$_SESSION['formFooter'] = ' ';
	}
	
	if ( ! isset($_SESSION['form'])) {
		$_SESSION['form'] = array();
	}
	
	function check($field, $type = '', $value = '') {
		$string = "";
		if (isset($_SESSION['form'][$field])) {
			switch($type) {
				case 'checkbox':
					$string = 'checked="checked"';
					break;
				case 'radio':
					if($_SESSION['form'][$field] === $value) {
						$string = 'checked="checked"';
					}
					break;
				case 'select':
					if($_SESSION['form'][$field] === $value) {
						$string = 'selected="selected"';
					}
					break;
				default:
					$string = $_SESSION['form'][$field];
			}
		}
		return $string;
	}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>

		
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="robots" content="index, follow" />
		
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="Contact | Numbars">
	<meta name="twitter:url" content="https://carsojo.github.io/Main/contact/index.php">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="Numbars">
	<meta property="og:title" content="Contact | Numbars">
	<meta property="og:url" content="https://carsojo.github.io/Main/contact/index.php">

		<title>Contact | Numbars</title>

       	<link rel="stylesheet" type="text/css" media="all" href="../rw_common/themes/Veerle/consolidated.css?rwcache=692566749" />
		
		
		
		<script type="text/javascript" src="../rw_common/themes/Veerle/javascript.js?rwcache=692566749"></script>
				
				
		
		
		
		

	</head>

	<body>
		
		
		
		<div id="container">
			<div id="navcontainer">
				<ul><li><a href="../" rel="">Home</a></li><li><a href="./" rel="" id="current">Contact</a></li></ul>
			</div>
			
			<div class="clearer"></div>
				
			<div id="siteHeader">
				<div id="siteLogo"></div>
				<h1>Numbars</h1>
				<h2>We give you the answer, you find the sum...</h2>
			</div>
			
			<div id="contentContainer">
				<div id="content">
					
<div class="message-text"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']); ?></div><br />

<form class="rw-contact-form" action="./files/mailer.php" method="post" enctype="multipart/form-data">
	 <div>
		<label>Your Name</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element0'); ?>" name="form[element0]" size="40"/><br /><br />

		<label>Your Email</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element1'); ?>" name="form[element1]" size="40"/><br /><br />

		<label>Type of message</label> *<br />
		<select class="form-select-field" name="form[element2]">			<option <?php echo check('element2', 'select','General Comment about the App.'); ?> value="General Comment about the App.">General Comment about the App.</option>
			<option <?php echo check('element2', 'select','To report a bug.'); ?> value="To report a bug.">To report a bug.</option>
			<option <?php echo check('element2', 'select','How the App could be better.'); ?> value="How the App could be better.">How the App could be better.</option>
		</select><br /><br />

		<label>Subject</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element3'); ?>" name="form[element3]" size="40"/><br /><br />

		<label>Message</label> *<br />
		<textarea class="form-input-field" name="form[element4]" rows="8" cols="38"><?php echo check('element4'); ?></textarea><br /><br />

		<div style="display: none;">
			<label>Spam Protection: Please don't fill this in:</label>
			<textarea name="comment" rows="1" cols="1"></textarea>
		</div>
		<input type="hidden" name="form_token" value="<?php echo $security_token; ?>" />
		
		<input class="form-input-button" type="submit" name="submitButton" value="Submit" />
	</div>
</form>

<br />
<div class="form-footer"><?php echo $_SESSION['formFooter']; unset($_SESSION['formFooter']); ?></div><br />

<?php unset($_SESSION['form']); ?>

				</div>
				<div class="clearer"></div>
			</div>
			<div id="breadcrumb">
				
			</div>
			<div id="footer">
				<div id="archives">
					
				</div>
				<div id="sidebar">
					<h3>About Me</h3>
					Hi.<br /><br />I am a new SwiftUI developer on the IOS platform and this is my first app.<br /><br />If you would like to provide me with feedback, please send me an email.<br /><br />Thanks.
				</div>			
				<div class="clearer"></div>
			</div>
			
			<div id="copyright">
				<span class="inset">&copy; 2022 John Carson</span>
			</div>
			
		</div>			
	<rapidweaver-badge url="https://www.realmacsoftware.com" position-x="left" position-y="bottom" transition="slide" delay-type="time" delay="1000" mode="auto" target="_blank"><img src= "../rw_common/assets/RWBadge.png" alt="RapidWeaver Icon" /><p>Made in RapidWeaver</p></rapidweaver-badge>
<script src="../rw_common/assets/rw-badge.js?rwcache=692566749"></script>
</body>

</html>