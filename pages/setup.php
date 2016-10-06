<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7 not-logged-in "> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8 not-logged-in "> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9 not-logged-in "> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js not-logged-in "> <!--<![endif]-->

<head>
	<title>Setup & Config</title>
	<link rel="stylesheet" type="text/css" href="setup.css">
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
		$data['db_host'] = htmlspecialchars(addslashes($_POST['dhost']));
		$data['db_root'] = htmlspecialchars(addslashes($_POST['dusername']));
		$data['db_pass'] = htmlspecialchars(addslashes($_POST['dpassword']));
		$data['db_name'] = htmlspecialchars(addslashes($_POST['dbname']));

		$var['wname'] = htmlspecialchars(addslashes($_POST['wname']));
		$var['wlang'] = htmlspecialchars(addslashes($_POST['wlang']));
		$var['wdescr'] = htmlspecialchars(addslashes($_POST['wdescr']));

		$var['sfont'] = htmlspecialchars(addslashes($_POST['sfont']));
		$var['sfcolor'] = htmlspecialchars(addslashes($_POST['sfcolor']));
		$var['sscolor'] = htmlspecialchars(addslashes($_POST['sscolor']));
		$var['sftcolor'] = htmlspecialchars(addslashes($_POST['sftcolor']));
		$var['sstcolor'] = htmlspecialchars(addslashes($_POST['sstcolor']));
		$var['sbg'] = htmlspecialchars(addslashes($_POST['sbg']));

		$var['iname'] = htmlspecialchars(addslashes($_POST['iname']));
		$var['iborn'] = htmlspecialchars(addslashes($_POST['iborn']));
		$var['icity'] = htmlspecialchars(addslashes($_POST['icity']));
		$var['ijob'] = htmlspecialchars(addslashes($_POST['ijob']));
		$var['iphoto'] = htmlspecialchars(addslashes($_POST['iphoto']));
		$var['iskills'] = htmlspecialchars(addslashes($_POST['iskills']));

		$var['cemail'] = htmlspecialchars(addslashes($_POST['cemail']));
		$var['caddress'] = htmlspecialchars(addslashes($_POST['caddress']));
		$var['cfacebook'] = htmlspecialchars(addslashes($_POST['cfacebook']));
		$var['ctwitter'] = htmlspecialchars(addslashes($_POST['ctwitter']));
		$var['clinkedin'] = htmlspecialchars(addslashes($_POST['clinkedin']));
		$var['cyoutube'] = htmlspecialchars(addslashes($_POST['cyoutube']));
		$var['creddit'] = htmlspecialchars(addslashes($_POST['creddit']));
		$var['cdeviantart'] = htmlspecialchars(addslashes($_POST['cdeviantart']));
		$var['cgithub'] = htmlspecialchars(addslashes($_POST['cgithub']));
		$var['cgoogleplus'] = htmlspecialchars(addslashes($_POST['cgoogleplus']));

		if ($var['wname'] == '' || $var['wlang'] == '' || $var['wdescr'] == '' || $var['sfont'] == '' || 
			$var['sfcolor'] == '' || $var['sscolor'] == '' || $var['sftcolor'] == '' || $var['sstcolor'] == '' || $var['sbg'] == '' || 
			$var['iname'] == '' || $var['iborn'] == '' || $var['ijob'] == '' || $var['iphoto'] == '' || $var['iskills'] == '' || 
			$var['cemail'] == '') {
				$error = "There are some fields empty";
		}else{

		/* EDIT BY LEX */

		                    # START NEW CONNECTION #
			$conn = new mysqli($data['db_host'],$data['db_root'],$data['db_pass']);
			if ($conn->connect_error) {
				$error = "Connection to the server failed.";
			}else{
                            # CREATE NEW DATABASE #
		        $sql = "CREATE DATABASE IF NOT EXISTS ".$data['db_name'];
                if ($conn->query($sql) === FALSE) {
                    echo "Error creating database: " . $conn->error;
                    exit; // Stop setup
                }

                $conn->select_db($data['db_name']);

                            # CREATE TABLES #
                // GETTING THE MODEL         
                $data_structure = file_get_contents(dirname(__FILE__).'\models\sql\db.sql');

                // SPLITTING LINES
                $queries = explode(';', $data_structure);

                // EXECUTING QUERIES
                foreach($queries as $query){
                  if($query != ''){
                    if ($conn->query($query) === FALSE) {
                        echo "Error creating table: " . $conn->error;
                        exit; // Stop setup
                    }
                  }
                }

                            # SAVE VARIABLES #
                foreach($var as $key => $value){
                    $sql = "INSERT INTO cms_settings (var, value) VALUES ('{$key}','{$value}')";
                    if ($conn->query($sql) === FALSE) {
                        echo "Error creating table: " . $conn->error;
                        exit; // Stop setup
                    }
                }

                            # CREATE connection.php #
                // GETTING THE MODEL
                $code = file_get_contents(dirname(__FILE__).'\models\connection.mdl');

                // REPLACING TAGS
                $tags = explode('{{ ', $code);

                foreach($tags as $tag){
                    $get_tag =  explode(' }}', $tag);
                    $code = str_replace('{{ '.$get_tag[0].' }}', $data[$get_tag[0]], $code);
                }

                // CREATING THE FILE
                $filetocreate = fopen("connection.php", "w+") or die("Unable to open file!");
                fwrite($filetocreate,$code);
                fclose($filetocreate);
                $success = "Set up complete. This file will be renamed";

                                # SETUP DONE! #
                // CLOSING CONNECTION
			    $conn->close();
			    // RENAME FILE
			    rename("setup.php", md5(time()*round(100)).".txt");
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
