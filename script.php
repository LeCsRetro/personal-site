<?php 
$conn = new mysqli("localhost","root","","git");
			if ($conn->connect_error) {
				$error = "Connection to the database failed.";
			}
define('NAME_WEBSITE','Website'); //Website name || Nome sito web 
define('LANG_WEBSITE','en'); //Website language || Lingua sito web 
define('DESCR_WEBSITE','Website description'); //Website description || Descrizione del sito 

/* STYLE WEBSITE || STILE DEL SITO */
$DEFfont = 'Raleway'; //Font
$DEFfirstColor = '#4CD5FF'; //First color || Colore principale
$DEFsecondColor = '#00C3FF'; //Second color || Colore secondario
$DEFtextFirstColor = '#000'; //text fisrt color || Colore testo primario
$DEFtextSecondColor = '#FFF'; //text second color || Colore testo secondario
$DEFdirBgHeader = 'https://static.pexels.com/photos/479/landscape-nature-sunset-trees.jpg'; //directory bg header

/* SHOW PAGES || MOSTRA PAGINA */
$PAGexperience = true; //page experience || pagina esperienze
$PAGportfolio = true; //page portoflio || pagina portfolio
$PAGcontact = true; //page contact || pagina contact

/* USER INFO || INFO UTENTE */
$DEFname = 'Santo Cariotti'; //name and surname || nome e cognome
$DEFborn = '24/12/2000'; //birthday || data di nascita
$DEFcity = 'San Francisco, CA'; //city || città
$DEFjob = 'Web Developer'; //job || occupazione
$DEFphoto = 'https://avatars0.githubusercontent.com/u/20584215'; //my photo || mia foto
$DEFskills = 'HTML,CSS,PHP,Javascript,jQuery,vBulletin,MyBB,Linux,WIndows,C++,Java'; //skills || capacità

/* CONTACTS || CONTATTI */
/* EVERY VARIABLE IS OPTIONAL || OGNI VARIABILE È OPZIONALE */
$DEFform = true; //do you want use an email contact form? || vuoi usare il form per il contatto email?
$DEFemail = 'sancn@live.com'; //your email || la tua email
$DEFaddress = '1600 Pennsylvania Avenue NW Washington, D.C. 20500 U.S.'; //your address || il tuo indirizzo
    /* YOU MUSTN'T WRITE SOCIAL URL LINK
      ES: DON'T http://facebook.com/usantoc
          DO usantoc
        NON DEVI SCRIVERE IL LINK URL DEL SOCIAL NETWORK
      ES: NON FARLO http://facebook.com/usantoc
          FALLO usantoc
    */
$DEFfacebook = 'usantoc'; //account facebook
$DEFtwitter = 'usantoc'; //account twitter
$DEFlinkedin = ''; //account linkedin
$DEFyoutube = ''; //account youtube
$DEFreddit = ''; //account reddit
$DEFdeviantart = ''; //account deviantart
$DEFgithub = 'usantoc'; //account github
$DEFgoogleplus = ''; //account google+

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
}?>
