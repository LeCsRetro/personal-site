<?php
if(file_exists('config.php')){
	header('Location: config.php');
}
include (__DIR__.'\script.php');
$style = new style($DEFfont,$DEFfirstColor,$DEFsecondColor,$DEFtextFirstColor,$DEFtextSecondColor,$DEFdirBgHeader);
$info = new info($DEFname,$DEFborn,$DEFcity,$DEFjob,$DEFphoto,$DEFskills);
$contact = new contact($DEFemail,$DEFaddress,$DEFfacebook,$DEFtwitter,$DEFlinkedin,$DEFyoutube,$DEFreddit,$DEFdeviantart,$DEFgithub,$DEFgoogleplus);
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="<?php echo LANG_WEBSITE;?>" class="no-js lt-ie9 lt-ie8 lt-ie7 not-logged-in "> <![endif]-->
<!--[if IE 7]>         <html lang="<?php echo LANG_WEBSITE;?>" class="no-js lt-ie9 lt-ie8 not-logged-in "> <![endif]-->
<!--[if IE 8]>         <html lang="<?php echo LANG_WEBSITE;?>" class="no-js lt-ie9 not-logged-in "> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="<?php echo LANG_WEBSITE;?>" class="no-js not-logged-in "> <!--<![endif]-->


<head>
	<title><?php echo NAME_WEBSITE;?></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='https://fonts.googleapis.com/css?family=<?php echo $style->font();?>:400,500,600,700,300' rel='stylesheet' type='text/css'>
	<meta name="description" content="<?php echo NAME_WEBSITE;?>">
	<meta charset="UTF-8">
	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="<?php echo $style->firstColor();?>">	
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="<?php echo $style->firstColor();?>">	
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<meta property="og:type" content="website" /> 
	<meta property="og:site_name" content="<?php echo NAME_WEBSITE;?>" />
	<meta property="og:url" content="<?php echo $_SERVER['HTTP_HOST'];?>" /> 
	<meta property="og:title" content="<?php echo NAME_WEBSITE;?>" /> 
	<meta property="og:description" content="<?php echo DESCR_WEBSITE;?>" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<script type="text/javascript">
	$(document).ready(function(){
  		$('.downPage').click(function() {
       		$('body,html').animate({scrollTop:400},500);
    	});
    	$('.pexp').click(function() {
       		$('body,html').animate({scrollTop:400},500);
    	});
    	$('.pport').click(function() {
       		$('body,html').animate({scrollTop:$('.portfolio').position().top},500);
    	});
    	$('.pcont').click(function() {
       		$('body,html').animate({scrollTop:$('.contact').position().top},500);
    	});
    	$('.aOpenCookies').click(function(){
    		$('.cookies_message').fadeIn();
    	});
    	$('.cookies_message').click(function(){
    		$(this).fadeOut();
    	});
	});
	</script>
	<style type="text/css">
		html,body,.contact form input,.contact form textarea{font-family: '<?php echo $style->font();?>',sans-serif,Arial;color: <?php echo $style->textFirstColor();?>}
		a {color: <?php echo $style->firstColor();?>;}
		a:hover{color: <?php echo $style->secondColor();?>;}
		.alertCookie {background-color: <?php echo $style->firstColor();?>;color:<?php echo $style->textFirstColor();?>;}
		header{background-image: url('<?php echo $style->dirBgHeader;?>')}
		nav ul li{color: <?php echo $style->textSecondColor();?>}
		nav ul li:hover{color: <?php echo $style->firstColor();?>;}
		.photoUser{background-image: url('<?php echo $info->photo;?>')}
		.infoUser h1,.skills h1,.hExpe,.hPortf,.hContact{color: <?php echo $style->textFirstColor();?>}
		.circle-infoUser,.social ul li{background-color: <?php echo $style->firstColor;?>;color: <?php echo $style->textSecondColor;?>}
		.infoUser p{color: <?php echo $style->textSecondColor;?>}
		.downPage{color: <?php echo $style->textSecondColor;?>}
		.downPage:hover{color: <?php echo $style->firstColor;?>;}
		#rightexp img{background-color: <?php echo $style->firstColor;?>;}
		.contact form input,.contact form textarea{outline-color: <?php echo $style->secondColor;?>}
		.inputsend{background-color: <?php echo $style->firstColor;?>;}
		.social ul li:hover{background-color:<?php echo $style->secondColor;?>}
		.body_cmess h1{color: <?php echo $style->textSecondColor;?>;background: <?php echo $style->firstColor;?>;}
	</style>
</head>
<body>
	<div class="cookies_message">
		<div class="body_cmess">
		<?php if(LANG_WEBSITE == 'it'){?>
			<h1>Cosa sono i cookies?</h1>
			<blockquote>I cookie sono piccoli frammenti di testo usati per memorizzare le informazioni nei browser Web. I cookie vengono usati per memorizzare e ricevere identificativi e altre informazioni su computer, cellulari e altri dispositivi. Altre tecnologie, compresi i dati memorizzati nel tuo browser Web o dispositivo, gli identificativi associati al dispositivo e altri software, vengono usate per scopi simili. Nella presente normativa, tutte queste tecnologie vengono definite "cookie". </blockquote>
		<?php }else{ ?>
			<h1>What are cookies?</h1>
			<blockquote>Cookies are small pieces of text used to store information on web browsers. Cookies are used to store and receive identifiers and other information on computers, phones, and other devices. Other technologies, including data we store on your web browser or device, identifiers associated with your device, and other software, are used for similar purposes. In this policy, we refer to all of these technologies as "cookies."</blockquote>
		<?php } ?>
		</div>
	</div>
	<header>
		<div class="alertCookie">
			<?php 
			if(LANG_WEBSITE == 'it'){
				echo 'Questo sito web utilizza i cookies per aiutarci a darti la miglior esperienza di navigazione possibile. Usando questo sito, ne acconsenti all\'utilizzo. <span class="aOpenCookies">Scopri di più</span>.';
			}else{
				echo 'This website uses cookies to help us give you the best experience when you visit.
By using this website you consent to our use of these cookies. <span class="aOpenCookies">Read more</span>.';
			}
			?>
		</div>
	<div class="bodyHeader">
		<nav>
			<ul>
				<li>About</li>
				<?php
				if(LANG_WEBSITE == 'it'){
					if($PAGexperience) { echo '<li class="pexp">Esperienza</li>'; }
					if($PAGportfolio) { echo '<li class="pport">Portfolio</li>'; }
					if($PAGcontact) { echo '<li class="pcont">Contatti</li>'; }
				}else{
					if($PAGexperience) { echo '<li class="pexp">Experience</li>'; }
					if($PAGportfolio) { echo '<li class="pport">Portfolio</li>'; }
					if($PAGcontact) { echo '<li class="pcont">Contact</li>'; }
				}
				?>
			</ul>
		</nav>
		<div class="infoAbout">
			<div class="photoUser" alt="Photo" title="My photo"></div>
			<ul class="infoUser">
				<li><h1><?php echo $info->name;?></h1></li>
				<li><span class="circle-infoUser" title="I was born in"><i class="fa fa-calendar"></i></span><p><?php echo $info->born;?></p></li>
				<li><span class="circle-infoUser" title="I live in"><i class="fa fa-map-marker"></i></span><p><?php echo $info->city;?></p></li>
				<li><span class="circle-infoUser" title="My job is"><i class="fa fa-coffee"></i></span><p><?php echo $info->job;?></p></li>
				<li></li>
			</ul>
			<ul class="skills">
				<h1>Skills</h1>
				<li><?php echo str_replace(",","</li><li>",$info->skills); ?></li>
			</ul>
		</div>
		<span class="downPage fa fa-arrow-circle-down"></span>
	</div>
	</header>
	<?php if($PAGexperience) { ?>
	<section class="experience">
		<div class="bodyex">
		<h1 class="hExpe"><?php if(LANG_WEBSITE == 'it') { echo 'Esperienza'; }else{ echo 'Experience';} ?> <i class="fa fa-archive"></i></h1>
		<?php 
			$result = mysqli_query($conn,"SELECT * FROM experience GROUP BY id DESC");
			while($row = mysqli_fetch_array($result)){
		?>
		<div class="bodyExpe">
			<div class="left" id="leftexp">
				<span><strong><?php echo $row['rank'];?></strong> at <a href="<?php echo $row['urlsitecompany'];?>" target="_blank"><?php echo $row['company'];?></a></span>
				<span><?php echo $row['datafrom'];?> - <?php echo $row['at'];?></span>
				<blockquote><?php echo $row['description'];?></blockquote>
			</div>
			<div class="right" id="rightexp">
				<img src="<?php echo $row['logocompany'];?>" />
			</div>
		</div>
		<?php } 
		mysqli_free_result($result);
		?>
		</div>
	</section>
	<?php } if($PAGportfolio) { ?>
	<section class="portfolio">
		<div class="bodyportf">
			<h1 class="hPortf">Portfolio <i class="fa fa-laptop"></i></h1>
			<?php 
				$result = mysqli_query($conn,"SELECT * FROM portfolio GROUP BY id DESC");
				while($row = mysqli_fetch_array($result)){
			?>
			<div class="oneProject">
				<div class="monitorPrj" style="background-image: url('<?php echo $row['image'];?>');">
					<a href="<?php echo $row['image'];?>" target="_blank">
						<img src="monitor.png" style="height:156px;" />
					</a>
				</div>
				<h2><a <?php if(!empty($row['url'])){ echo 'href="'.$row['url'].'" target="_blank"';}?>><?php echo $row['name'];?></a> (<?php echo $row['year'];?>)</h2>
				<blockquote><?php echo $row['description'];?></blockquote>
			</div>
			<?php } 
			mysqli_free_result($result);
			?>
		</div>
	</section>
	<?php } if($PAGcontact) { ?>
	<section class="contact">
		<div class="bodycontact">
			<h1 class="hContact"><?php if(LANG_WEBSITE == 'it') { echo 'Contatti'; }else{ echo 'Contact';} ?> <i class="fa fa-envelope"></i></h1>
			<?php if($DEFform && $contact->email != ''){
				$errormail = '';
				if(isset($_POST['esend'])){
					$ename = htmlspecialchars(addslashes($_POST['ename']));
					$emmail = htmlspecialchars(addslashes($_POST['emmail']));
					$emessage = htmlspecialchars(addslashes($_POST['emessage']));

					if(empty($ename) || empty($emmail) || empty($emessage)){
						if(LANG_WEBSITE == 'it') {
							$errormail = 'Ci sono alcuni campi vuoti';
						}else{
							$errormail = 'There are some fields empty';
						}
					}else{
						$emessage .= ' @@ From '.$emmail; 
						if(mail($contact->email,"Email from your website",$emessage)){
							if(LANG_WEBSITE == 'it') {
								$errormail = 'Email inviata';
							}else{
								$errormail = 'Email sent';
							}
						}else{
							if(LANG_WEBSITE == 'it') {
								$errormail = 'Errore, riprova';
							}else{
								$errormail = 'Error, try again';
							}
						}
					}
				}
			?>
			<form method="POST">
				<span class="errormail" <?php if($errormail != ''){echo 'style="display:block !important;"';} ?>><?php if($errormail != ''){echo $errormail; } ?></span>
				<span><label><?php if(LANG_WEBSITE == 'it') { echo 'Nome e cognome'; }else{ echo 'Name and surname';} ?>:</label><input type="text" name="ename" <?php if(isset($_POST['ename'])){echo 'value="'.$_POST['ename'].'"';} ?> /></span>
				<span><label>E-mail:</label><input type="text" name="emmail" <?php if(isset($_POST['emmail'])){echo 'value="'.$_POST['emmail'].'"';} ?> /></span>
				<span><label><?php if(LANG_WEBSITE == 'it') { echo 'Messaggio'; }else{ echo 'Message';} ?>:</label><textarea name="emessage"><?php if(isset($_POST['emmail'])){echo $_POST['emessage'];} ?></textarea></span>
				<span><input type="submit" value="Send" class="inputsend" name="esend" /></span>
			</form>
			<?php } ?>
			<div class="rightSide">
				<?php if($contact->address != ''){ ?>
					<p><?php if(LANG_WEBSITE == 'it') { echo 'Puoi trovarmi qui'; }else{ echo 'You can find me here';} ?>: <br><strong><?php echo $contact->address;?></strong></p><br>
				<?php }if($contact->email != ''){ ?>
					<p><?php if(LANG_WEBSITE == 'it') { echo 'Mia e-mail'; }else{ echo 'My e-mail';} ?>: <br><strong><?php echo $contact->email;?></strong></p>
				<?php } ?>
				<div class="social">
					<ul>
		<?php 	if($contact->facebook != ''){ echo '<a href="http://facebook.com/'.$contact->facebook.'" target="_blank"><li class="fa fa-facebook"></li></a>';}
				if($contact->twitter != ''){ echo '<a href="http://twitter.com/'.$contact->twitter.'" target="_blank"><li class="fa fa-twitter"></li></a>';}
				if($contact->linkedin != ''){ echo '<a href="http://linkedin.com/in/'.$contact->linkedin.'" target="_blank"><li class="fa fa-linkedin"></li></a>';}
				if($contact->youtube != ''){ echo '<a href="http://youtube.com/user/'.$contact->youtube.'" target="_blank"><li class="fa fa-youtube-play"></li></a>';}
				if($contact->reddit != ''){ echo '<a href="http://reddit.com/user/'.$contact->reddit.'" target="_blank"><li class="fa fa-reddit"></li></a>';}
				if($contact->deviantart != ''){ echo '<a href="http://'.$contact->deviantart.'.deviantart.com" target="_blank"><li class="fa fa-deviantart"></li></a>';}
				if($contact->github != ''){ echo '<a href="http://github.com/'.$contact->github.'" target="_blank"><li class="fa fa-github"></li></a>';}
				if($contact->googleplus){ echo '<a href="http://plus.google.com/'.$contact->googleplus.'" target="_blank"><li class="fa fa-google-plus"></li></a>';}
				?>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>
	<footer>
		<p><strong class="fa fa-code"></strong> with <strong class="fa fa-heart"></strong> by <a href="http://github.com/usantoc" target="_blank" class="fa fa-github"></a></p>
	</footer>
</body>
</html>
<?php $conn->close(); ?>