<?php 
if(file_exists(dirname(__FILE__).'/connection.php')){
     include 'connection.php';
} else {
	header('location: setup.php');
}

function get_var($conn, $var){
	$get = $conn->query("SELECT value FROM cms_settings WHERE var = '{$var}' LIMIT 1");
	$get_a = $get->fetch_assoc();
	return $get_a['value'];
}

define('NAME_WEBSITE',get_var($conn, 'wname')); //Website name || Nome sito web 
define('LANG_WEBSITE',get_var($conn, 'wlang')); //Website language || Lingua sito web 
define('DESCR_WEBSITE',get_var($conn, 'wdescr')); //Website description || Descrizione del sito 

/* STYLE WEBSITE || STILE DEL SITO */
$DEFfont = get_var($conn, 'sfont'); //Font
$DEFfirstColor = get_var($conn, 'sfcolor'); //First color || Colore principale
$DEFsecondColor = get_var($conn, 'sscolor'); //Second color || Colore secondario
$DEFtextFirstColor = get_var($conn, 'sftcolor'); //text fisrt color || Colore testo primario
$DEFtextSecondColor = get_var($conn, 'sstcolor'); //text second color || Colore testo secondario
$DEFdirBgHeader = get_var($conn, 'sbg'); //directory bg header

/* SHOW PAGES || MOSTRA PAGINA */
$PAGexperience = true; //page experience || pagina esperienze
$PAGportfolio = true; //page portoflio || pagina portfolio
$PAGcontact = true; //page contact || pagina contact

/* USER INFO || INFO UTENTE */
$DEFname = get_var($conn, 'iname'); //name and surname || nome e cognome
$DEFborn = get_var($conn, 'iborn'); //birthday || data di nascita
$DEFcity = get_var($conn, 'icity'); //city || città
$DEFjob = get_var($conn, 'ijob'); //job || occupazione
$DEFphoto = get_var($conn, 'iphoto'); //my photo || mia foto
$DEFskills = get_var($conn, 'iskills'); //skills || capacità

/* CONTACTS || CONTATTI */
/* EVERY VARIABLE IS OPTIONAL || OGNI VARIABILE È OPZIONALE */
$DEFform = true; //do you want use an email contact form? || vuoi usare il form per il contatto email?
$DEFemail = get_var($conn, 'cemail'); //your email || la tua email
$DEFaddress = get_var($conn, 'caddress'); //your address || il tuo indirizzo
    /* YOU MUSTN'T WRITE SOCIAL URL LINK
      ES: DON'T http://facebook.com/usantoc
          DO usantoc
        NON DEVI SCRIVERE IL LINK URL DEL SOCIAL NETWORK
      ES: NON FARLO http://facebook.com/usantoc
          FALLO usantoc
    */
$DEFfacebook = get_var($conn, 'cfacebook'); //account facebook
$DEFtwitter = get_var($conn, 'ctwitter'); //account twitter
$DEFlinkedin = get_var($conn, 'clinkedin'); //account linkedin
$DEFyoutube = get_var($conn, 'cyoutube'); //account youtube
$DEFreddit = get_var($conn, 'creddit'); //account reddit
$DEFdeviantart = get_var($conn, 'cdeviantart'); //account deviantart
$DEFgithub = get_var($conn, 'cgithub'); //account github
$DEFgoogleplus = get_var($conn, 'cgoogleplus'); //account google+

class Style{
	public $font;
	public $firstColor;
	public $secondColor;
  	public $textFirstColor;
  	public $dirBgHeader;

	public function __construct($font,$firstColor,$secondColor,$textFirstColor,$textSecondColor,$dirBgHeader){
            $this->font = $font;
            $this->firstColor = $firstColor;
            $this->secondColor = $secondColor;
            $this->textFirstColor = $textFirstColor;
            $this->textSecondColor = $textSecondColor;
            $this->dirBgHeader = $dirBgHeader;
    }
    public function font(){return $this->font;}
    public function firstColor(){return $this->firstColor;}
    public function secondColor(){return $this->secondColor;}
    public function textFirstColor(){return $this->textFirstColor;}
    public function textSecondColor(){return $this->textSecondColor;}
    public function dirBgHeader(){return $this->dirBgHeader;}
}
class Info{
    public $name;
    public $born;
    public $city;
    public $job;
    public $photo;
    public $skills;

    public function __construct($name,$born,$city,$job,$photo,$skills){
            $this->name = $name;
            $this->born = $born;
            $this->city = $city;
            $this->job = $job;
            $this->photo = $photo;
            $this->skills = $skills;
    }
    public function name(){return $this->name;}
    public function born(){return $this->born;}
    public function city(){return $this->city;}
    public function job(){return $this->job;}
    public function photo(){return $this->photo;}
    public function skills(){return $this->skills;}

}
class Contact{
    public $email;
    public $address;
    public $facebook;
    public $twitter;
    public $linkedin;
    public $youtube;
    public $reddit;
    public $deviantart;
    public $github;
    public $googleplus;

    public function __construct($email,$address,$facebook,$twitter,$linkedin,$youtube,$reddit,$deviantart,$github,$googleplus){
            $this->email = $email;
            $this->address = $address;
            $this->facebook = $facebook;
            $this->twitter = $twitter;
            $this->linkedin = $linkedin;
            $this->youtube = $youtube;
            $this->reddit = $reddit;
            $this->deviantart = $deviantart;
            $this->github = $github;
            $this->googleplus = $googleplus;
    }

    public function email(){return $this->email;}
    public function address(){return $this->address;}
    public function facebook(){return $this->facebook;}
    public function twitter(){return $this->twitter;}
    public function linkedin(){return $this->linkedin;}
    public function youtube(){return $this->youtube;}
    public function reddit(){return $this->reddit;}
    public function deviantart(){return $this->deviantart;}
    public function github(){return $this->github;}
    public function googleplus(){return $this->googleplus;}
}
