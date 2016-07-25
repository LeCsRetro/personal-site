<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7 not-logged-in "> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8 not-logged-in "> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9 not-logged-in "> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js not-logged-in "> <!--<![endif]-->

<head>
	<title>Config</title>
	<link rel="stylesheet" type="text/css" href="config.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'>
	<meta charset="UTF-8">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>

<body>
	<h1 class="hello"><i class="fa fa-github"></i><br>Hello, you have to set up the template before.</h1>

<?php
function checkit($var){
if(isset($_POST['config'])){
		if($_POST[$var] != ''){
			echo 'inpurtSuccess1';
		}else{
			echo 'inputError1';
		}
}
}
function checkitt($var){
if(isset($_POST['config'])){
		if($_POST[$var] != ''){
			echo 'has-success';
		}else{
			echo 'has-error';
		}
}
}
function checkvalue($var){
if(isset($_POST['config'])){
		if($_POST[$var] != ''){
			echo $_POST[$var];
		}
}
}
	if(isset($_POST['config'])){
		$dhost = htmlspecialchars(addslashes($_POST['dhost']));
		$dusername = htmlspecialchars(addslashes($_POST['dusername']));
		$dpassword = htmlspecialchars(addslashes($_POST['dpassword']));
		$dbname = htmlspecialchars(addslashes($_POST['dbname']));

		$wname = htmlspecialchars(addslashes($_POST['wname']));
		$wlang = htmlspecialchars(addslashes($_POST['wlang']));
		$wdescr = htmlspecialchars(addslashes($_POST['wdescr']));

		$sfont = htmlspecialchars(addslashes($_POST['sfont']));
		$sfcolor = htmlspecialchars(addslashes($_POST['sfcolor']));
		$sscolor = htmlspecialchars(addslashes($_POST['sscolor']));
		$sftcolor = htmlspecialchars(addslashes($_POST['sftcolor']));
		$sstcolor = htmlspecialchars(addslashes($_POST['sstcolor']));
		$sbg = htmlspecialchars(addslashes($_POST['sbg']));

		$iname = htmlspecialchars(addslashes($_POST['iname']));
		$iborn = htmlspecialchars(addslashes($_POST['iborn']));
		$icity = htmlspecialchars(addslashes($_POST['icity']));
		$ijob = htmlspecialchars(addslashes($_POST['ijob']));
		$iphoto = htmlspecialchars(addslashes($_POST['iphoto']));
		$iskills = htmlspecialchars(addslashes($_POST['iskills']));

		$cemail = htmlspecialchars(addslashes($_POST['cemail']));
		$caddress = htmlspecialchars(addslashes($_POST['caddress']));
		$cfacebook = htmlspecialchars(addslashes($_POST['cfacebook']));
		$ctwitter = htmlspecialchars(addslashes($_POST['ctwitter']));
		$clinkedin = htmlspecialchars(addslashes($_POST['clinkedin']));
		$cyoutube = htmlspecialchars(addslashes($_POST['cyoutube']));
		$creddit = htmlspecialchars(addslashes($_POST['creddit']));
		$cdeviantart = htmlspecialchars(addslashes($_POST['cdeviantart']));
		$cgithub = htmlspecialchars(addslashes($_POST['cgithub']));
		$cgoogleplus = htmlspecialchars(addslashes($_POST['cgoogleplus']));

		if (empty($wname) || empty($wlang) || empty($wdescr) || empty($sfont) || 
			empty($sfcolor) || empty($sscolor) || empty($sftcolor) || empty($sstcolor) || empty($sbg) || 
			empty($iname) || empty($iborn) || empty($ijob) || empty($iphoto) || empty($iskills) || 
			empty($cemail)) {
				$error = "There are some fields empty";
		}else{
			$conn = new mysqli($dhost,$dusername,$dpassword,$dbname);
			if ($conn->connect_error) {
				$error = "Connection to the database failed.";
			}else{
			$sql = "CREATE TABLE IF NOT EXISTS `experience` (
`id` int(11) NOT NULL,
  `company` varchar(30) NOT NULL,
  `rank` varchar(30) NOT NULL,
  `logocompany` varchar(255) NOT NULL,
  `urlsitecompany` varchar(255) NOT NULL,
  `datafrom` varchar(30) NOT NULL,
  `at` varchar(30) NOT NULL,
  `description` text NOT NULL
)";
if ($conn->query($sql) === FALSE) {
    echo "Error creating tables: " . $conn->error;
}
$sql = "ALTER TABLE `experience` ADD PRIMARY KEY( `id`);";
$conn->query($sql);
$sql = "ALTER TABLE `experience` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS `portfolio` (
`id` int(11) NOT NULL,
`name` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text NOT NULL
)";
if ($conn->query($sql) === FALSE) {
    echo "Error creating tables: " . $conn->error;
}
$sql = "ALTER TABLE `portfolio` ADD PRIMARY KEY( `id`);";
$conn->query($sql);
$sql = "ALTER TABLE `portfolio` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;";
$conn->query($sql);

$filetocreate = fopen("script.php", "w") or die("Unable to open file!");
/* FILE ************ CREATE
***************************** WITH 
PHP ******************** */
fwrite($filetocreate, "<?php \n");
fwrite($filetocreate, "\$conn = new mysqli(\"".$dhost."\",\"".$dusername."\",\"".$dpassword."\",\"".$dbname."\");\n");
fwrite($filetocreate, "			if (\$conn->connect_error) {\n");
fwrite($filetocreate, "				\$error = \"Connection to the database failed.\";\n");
fwrite($filetocreate, "			}\n");
fwrite($filetocreate, "define('NAME_WEBSITE','".$wname."'); //Website name || Nome sito web \n");
fwrite($filetocreate, "define('LANG_WEBSITE','".$wlang."'); //Website language || Lingua sito web \n");
fwrite($filetocreate, "define('DESCR_WEBSITE','".$wdescr."'); //Website description || Descrizione del sito \n\n");
fwrite($filetocreate, "/* STYLE WEBSITE || STILE DEL SITO */\n");
fwrite($filetocreate, "\$DEFfont = '".$sfont."'; //Font\n");
fwrite($filetocreate, "\$DEFfirstColor = '".$sfcolor."'; //First color || Colore principale\n");
fwrite($filetocreate, "\$DEFsecondColor = '".$sscolor."'; //Second color || Colore secondario\n");
fwrite($filetocreate, "\$DEFtextFirstColor = '".$sftcolor."'; //text fisrt color || Colore testo primario\n");
fwrite($filetocreate, "\$DEFtextSecondColor = '".$sstcolor."'; //text second color || Colore testo secondario\n");
fwrite($filetocreate, "\$DEFdirBgHeader = '".$sbg."'; //directory bg header\n\n");
fwrite($filetocreate, "/* SHOW PAGES || MOSTRA PAGINA */\n");
fwrite($filetocreate, "\$PAGexperience = true; //page experience || pagina esperienze\n");
fwrite($filetocreate, "\$PAGportfolio = true; //page portoflio || pagina portfolio\n");
fwrite($filetocreate, "\$PAGcontact = true; //page contact || pagina contact\n\n");
fwrite($filetocreate, "/* USER INFO || INFO UTENTE */\n");
fwrite($filetocreate, "\$DEFname = '".$iname."'; //name and surname || nome e cognome\n");
fwrite($filetocreate, "\$DEFborn = '".$iborn."'; //birthday || data di nascita\n");
fwrite($filetocreate, "\$DEFcity = '".$icity."'; //city || città\n");
fwrite($filetocreate, "\$DEFjob = '".$ijob."'; //job || occupazione\n");
fwrite($filetocreate, "\$DEFphoto = '".$iphoto."'; //my photo || mia foto\n");
fwrite($filetocreate, "\$DEFskills = '".$iskills."'; //skills || capacità\n\n");
fwrite($filetocreate, "/* CONTACTS || CONTATTI */\n");
fwrite($filetocreate, "/* EVERY VARIABLE IS OPTIONAL || OGNI VARIABILE È OPZIONALE */\n");
fwrite($filetocreate, "\$DEFform = true; //do you want use an email contact form? || vuoi usare il form per il contatto email?\n");
fwrite($filetocreate, "\$DEFemail = '".$cemail."'; //your email || la tua email\n");
fwrite($filetocreate, "\$DEFaddress = '".$caddress."'; //your address || il tuo indirizzo\n");
fwrite($filetocreate, "    /* YOU MUSTN'T WRITE SOCIAL URL LINK\n");
fwrite($filetocreate, "      ES: DON'T http://facebook.com/usantoc\n");
fwrite($filetocreate, "          DO usantoc\n");
fwrite($filetocreate, "        NON DEVI SCRIVERE IL LINK URL DEL SOCIAL NETWORK\n");
fwrite($filetocreate, "      ES: NON FARLO http://facebook.com/usantoc\n");
fwrite($filetocreate, "          FALLO usantoc\n");
fwrite($filetocreate, "    */\n");
fwrite($filetocreate, "\$DEFfacebook = '".$cfacebook."'; //account facebook\n");
fwrite($filetocreate, "\$DEFtwitter = '".$ctwitter."'; //account twitter\n");
fwrite($filetocreate, "\$DEFlinkedin = '".$clinkedin."'; //account linkedin\n");
fwrite($filetocreate, "\$DEFyoutube = '".$cyoutube."'; //account youtube\n");
fwrite($filetocreate, "\$DEFreddit = '".$creddit."'; //account reddit\n");
fwrite($filetocreate, "\$DEFdeviantart = '".$cdeviantart."'; //account deviantart\n");
fwrite($filetocreate, "\$DEFgithub = '".$cgithub."'; //account github\n");
fwrite($filetocreate, "\$DEFgoogleplus = '".$cgoogleplus."'; //account google+\n\n");
fwrite($filetocreate, "class Style{\n");
fwrite($filetocreate, "	public \$font;\n");
fwrite($filetocreate, "	public \$firstColor;\n");
fwrite($filetocreate, "	public \$secondColor;\n");
fwrite($filetocreate, "  public \$textFirstColor;\n");
fwrite($filetocreate, "  public \$dirBgHeader;\n\n");
fwrite($filetocreate, "	public function __construct(\$font,\$firstColor,\$secondColor,\$textFirstColor,\$textSecondColor,\$dirBgHeader){\n");
fwrite($filetocreate, "            \$this->font = \$font;\n");
fwrite($filetocreate, "            \$this->firstColor = \$firstColor;\n");
fwrite($filetocreate, "            \$this->secondColor = \$secondColor;\n");
fwrite($filetocreate, "            \$this->textFirstColor = \$textFirstColor;\n");
fwrite($filetocreate, "            \$this->textSecondColor = \$textSecondColor;\n");
fwrite($filetocreate, "            \$this->dirBgHeader = \$dirBgHeader;\n");
fwrite($filetocreate, "    }\n");
fwrite($filetocreate, "    public function font(){return \$this->font;}\n");
fwrite($filetocreate, "    public function firstColor(){return \$this->firstColor;}\n");
fwrite($filetocreate, "    public function secondColor(){return \$this->secondColor;}\n");
fwrite($filetocreate, "    public function textFirstColor(){return \$this->textFirstColor;}\n");
fwrite($filetocreate, "    public function textSecondColor(){return \$this->textSecondColor;}\n");
fwrite($filetocreate, "    public function dirBgHeader(){return \$this->dirBgHeader;}\n");
fwrite($filetocreate, "}\n");
fwrite($filetocreate, "class Info{\n");
fwrite($filetocreate, "    public \$name;\n");
fwrite($filetocreate, "    public \$born;\n");
fwrite($filetocreate, "    public \$city;\n");
fwrite($filetocreate, "    public \$job;\n");
fwrite($filetocreate, "    public \$photo;\n");
fwrite($filetocreate, "    public \$skills;\n\n");
fwrite($filetocreate, "    public function __construct(\$name,\$born,\$city,\$job,\$photo,\$skills){\n");
fwrite($filetocreate, "            \$this->name = \$name;\n");
fwrite($filetocreate, "            \$this->born = \$born;\n");
fwrite($filetocreate, "            \$this->city = \$city;\n");
fwrite($filetocreate, "            \$this->job = \$job;\n");
fwrite($filetocreate, "            \$this->photo = \$photo;\n");
fwrite($filetocreate, "            \$this->skills = \$skills;\n");
fwrite($filetocreate, "    }\n");
fwrite($filetocreate, "    public function name(){return \$this->name;}\n");
fwrite($filetocreate, "    public function born(){return \$this->born;}\n");
fwrite($filetocreate, "    public function city(){return \$this->city;}\n");
fwrite($filetocreate, "    public function job(){return \$this->job;}\n");
fwrite($filetocreate, "    public function photo(){return \$this->photo;}\n");
fwrite($filetocreate, "    public function skills(){return \$this->skills;}\n\n");
fwrite($filetocreate, "}\n");
fwrite($filetocreate, "class Contact{\n");
fwrite($filetocreate, "    public \$email;\n");
fwrite($filetocreate, "    public \$address;\n");
fwrite($filetocreate, "    public \$facebook;\n");
fwrite($filetocreate, "    public \$twitter;\n");
fwrite($filetocreate, "    public \$linkedin;\n");
fwrite($filetocreate, "    public \$youtube;\n");
fwrite($filetocreate, "    public \$reddit;\n");
fwrite($filetocreate, "    public \$deviantart;\n");
fwrite($filetocreate, "    public \$github;\n");
fwrite($filetocreate, "    public \$googleplus;\n\n");
fwrite($filetocreate, "    public function __construct(\$email,\$address,\$facebook,\$twitter,\$linkedin,\$youtube,\$reddit,\$deviantart,\$github,\$googleplus){\n");
fwrite($filetocreate, "            \$this->email = \$email;\n");
fwrite($filetocreate, "            \$this->address = \$address;\n");
fwrite($filetocreate, "            \$this->facebook = \$facebook;\n");
fwrite($filetocreate, "            \$this->twitter = \$twitter;\n");
fwrite($filetocreate, "            \$this->linkedin = \$linkedin;\n");
fwrite($filetocreate, "            \$this->youtube = \$youtube;\n");
fwrite($filetocreate, "            \$this->reddit = \$reddit;\n");
fwrite($filetocreate, "            \$this->deviantart = \$deviantart;\n");
fwrite($filetocreate, "            \$this->github = \$github;\n");
fwrite($filetocreate, "            \$this->googleplus = \$googleplus;\n");
fwrite($filetocreate, "    }\n\n");
fwrite($filetocreate, "    public function email(){return \$this->email;}\n");
fwrite($filetocreate, "    public function address(){return \$this->address;}\n");
fwrite($filetocreate, "    public function facebook(){return \$this->facebook;}\n");
fwrite($filetocreate, "    public function twitter(){return \$this->twitter;}\n");
fwrite($filetocreate, "    public function linkedin(){return \$this->linkedin;}\n");
fwrite($filetocreate, "    public function youtube(){return \$this->youtube;}\n");
fwrite($filetocreate, "    public function reddit(){return \$this->reddit;}\n");
fwrite($filetocreate, "    public function deviantart(){return \$this->deviantart;}\n");
fwrite($filetocreate, "    public function github(){return \$this->github;}\n");
fwrite($filetocreate, "    public function googleplus(){return \$this->googleplus;}\n");
fwrite($filetocreate, "}?>\n");
/* END *************** FILE ********* WITH
************* PHP ******/
fclose($filetocreate);

			$success = "Set up complete. This file will be renamed";
			$conn->close();
			rename("config.php", md5(time()*round(100)).".txt");
			}
		}
	}
?>

<form method="POST">
	<?php if(isset($error)){ echo '<span class="configerror">'.$error.'</span>'; }?>
	<?php if(isset($success)){ echo '<a href="index.php"><span class="configsuccess">'.$success.'</span></a>'; }?>
	<h1>Database info</h1>
  	<div class="form-group <?php checkitt('dhost');?>">
    	<label>Host</label>
    	<input type="text" name="dhost" class="form-control" placeholder="Host" id="<?php checkit('dhost');?>" value="<?php checkvalue('dhost');?>">
  	</div>
  	<div class="form-group <?php checkitt('dusername');?>">
    	<label>Username</label>
    	<input type="text" name="dusername" class="form-control" placeholder="Username" id="<?php checkit('dusername');?>" value="<?php checkvalue('dusername');?>">
  	</div>
  	<div class="form-group">
    	<label>Password</label>
    	<input type="password" name="dpassword" class="form-control" placeholder="Password">
  	</div>
  	<div class="form-group <?php checkitt('dbname');?>">
    	<label>Database name</label>
    	<input type="text" name="dbname" class="form-control" placeholder="Database name" id="<?php checkit('dbname');?>" value="<?php checkvalue('dbname');?>">
  	</div>

	<h1>Website info</h1>
  	<div class="form-group <?php checkitt('wname');?>">
    	<label>Website name</label>
    	<input type="text" name="wname" class="form-control" placeholder="Website name" id="<?php checkit('wname');?>" value="<?php checkvalue('wname');?>">
  	</div>
  	<div class="form-group <?php checkitt('wlang');?>">
    	<label>Website language (en, it, fr, de, ...)</label>
    	<input type="text" name="wlang" class="form-control" placeholder="Website language" id="<?php checkit('wlang');?>" value="<?php checkvalue('wlang');?>">
  	</div>
  	<div class="form-group <?php checkitt('wdescr');?>">
    	<label>Website descripion</label>
    	<input type="text" name="wdescr" class="form-control" placeholder="Website descripition" id="<?php checkit('wdescr');?>" value="<?php checkvalue('wdescr');?>">
  	</div>

  	<h1>Website style</h1>
  	<div class="form-group <?php checkitt('sfont');?>">
    	<label>Font (Raleway, Open Sans, Lato, Roboto, Arial, ...)</label>
    	<input type="text" name="sfont" class="form-control" placeholder="Font" id="<?php checkit('sfont');?>" value="<?php checkvalue('sfont');?>">
  	</div>
  	<div class="form-group <?php checkitt('sfcolor');?>">
    	<label>First color</label>
    	<input type="text" name="sfcolor" class="form-control" placeholder="First color" id="<?php checkit('sfcolor');?>" value="<?php checkvalue('sfcolor');?>">
  	</div>
  	<div class="form-group <?php checkitt('sscolor');?>">
    	<label>Second color</label>
    	<input type="text" name="sscolor" class="form-control" placeholder="Second color" id="<?php checkit('sscolor');?>" value="<?php checkvalue('sscolor');?>">
  	</div>
  	<div class="form-group <?php checkitt('sftcolor');?>">
    	<label>First text color</label>
    	<input type="text" name="sftcolor" class="form-control" placeholder="First text color" id="<?php checkit('sftcolor');?>" value="<?php checkvalue('sftcolor');?>">
  	</div>
  	<div class="form-group <?php checkitt('sstcolor');?>">
    	<label>Second text color</label>
    	<input type="text" name="sstcolor" class="form-control" placeholder="Second text color" id="<?php checkit('sstcolor');?>" value="<?php checkvalue('sstcolor');?>">
  	</div>
  	<div class="form-group <?php checkitt('sbg');?>">
    	<label>Background header</label>
    	<input type="text" name="sbg" class="form-control" placeholder="Background header" id="<?php checkit('sbg');?>" value="<?php checkvalue('sbg');?>">
  	</div>

  	<h1>Your personal info</h1>
  	<div class="form-group <?php checkitt('iname');?>">
    	<label>Your name</label>
    	<input type="text" name="iname" class="form-control" placeholder="Name" id="<?php checkit('iname');?>" value="<?php checkvalue('iname');?>">
  	</div>
  	<div class="form-group <?php checkitt('iborn');?>">
    	<label>Where were you born? (00/00/0000)</label>
    	<input type="text" name="iborn" class="form-control" placeholder="Birthday" id="<?php checkit('iborn');?>" value="<?php checkvalue('iborn');?>">
  	</div>
  	<div class="form-group <?php checkitt('icity');?>">
    	<label>Your city</label>
    	<input type="text" name="icity" class="form-control" placeholder="City" id="<?php checkit('icity');?>" value="<?php checkvalue('icity');?>">
  	</div>
  	<div class="form-group <?php checkitt('ijob');?>">
    	<label>Your job</label>
    	<input type="text" name="ijob" class="form-control" placeholder="Job" id="<?php checkit('ijob');?>" value="<?php checkvalue('ijob');?>">
  	</div>
  	<div class="form-group <?php checkitt('iphoto');?>">
    	<label>Your photo</label>
    	<input type="text" name="iphoto" class="form-control" placeholder="Photo" id="<?php checkit('iphoto');?>" value="<?php checkvalue('iphoto');?>">
  	</div>  	
  	<div class="form-group <?php checkitt('iskills');?>">
    	<label>Your skills (separate those with a comma - es: Dance,Sing,Write)</label>
    	<input type="text" name="iskills" class="form-control" placeholder="Skills" id="<?php checkit('iskills');?>" value="<?php checkvalue('iskills');?>">
  	</div>

  	<h1>Your contacts</h1>
  	<div class="form-group <?php checkitt('cemail');?>">
    	<label>Your email</label>
    	<input type="text" name="cemail" class="form-control" placeholder="Email" id="<?php checkit('cemail');?>" value="<?php checkvalue('cemail');?>">
  	</div>
  	<div class="form-group">
    	<label>Your address (facoltative)</label>
    	<input type="text" name="caddress" class="form-control" placeholder="Address">
  	</div>
    <label>Facebook contact (facoltative)</label>
    <div class="input-group">
      <div class="input-group-addon">http://wwww.facebook.com/</div>
      <input type="text" class="form-control" name="cfacebook">
    </div>
    <label>Twitter contact (facoltative)</label>
    <div class="input-group">
      <div class="input-group-addon">http://wwww.twitter.com/</div>
      <input type="text" class="form-control" name="ctwitter">
    </div>
    <label>LinkedIn contact (facoltative)</label>
    <div class="input-group">
      <div class="input-group-addon">http://wwww.linkedin.com/in/</div>
      <input type="text" class="form-control" name="clinkedin">
    </div>
    <label>Youtube contact (facoltative)</label>
    <div class="input-group">
      <div class="input-group-addon">http://wwww.youtube.com/user/</div>
      <input type="text" class="form-control" name="cyoutube">
    </div>
    <label>Reddit contact (facoltative)</label>
    <div class="input-group">
      <div class="input-group-addon">http://wwww.reddit.com/user/</div>
      <input type="text" class="form-control" name="creddit">
    </div>
    <label>Deviantart contact (facoltative)</label>
    <div class="input-group">
      <div class="input-group-addon">http://</div>
      <input type="text" class="form-control" name="cdeviantart">
      <div class="input-group-addon">.deviantart.com</div>
    </div>
    <label>GitHub contact (facoltative)</label>
    <div class="input-group">
      <div class="input-group-addon">http://wwww.github.com/</div>
      <input type="text" class="form-control" name="cgithub">
    </div>
    <label>Google+ contact (facoltative)</label>
    <div class="input-group">
      <div class="input-group-addon">http://wwww.plus.google.com/</div>
      <input type="text" class="form-control" name="cgoogleplus">
    </div>

  <br><button type="submit" class="btn btn-default" name="config">Done</button>
</form>
</body>
<html>