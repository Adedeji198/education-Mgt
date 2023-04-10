<?php
include __DIR__."/config.php";
//=========================================================

	$Loc =  $_SERVER['DOCUMENT_ROOT'];
	$Loc = str_replace("\\" ,"/", $Loc);
	
	$_FOLDER =substract($_SERVER['DOCUMENT_ROOT'], dirname(dirname(__DIR__)));
	
	define("SITE_FOLDER", "$Loc$_FOLDER");

	define(
		'SITE_PATH',
		$_SERVER['REQUEST_SCHEME'].'://'.
		$_SERVER['HTTP_HOST']."$_FOLDER"
	);


	define('DOWNLOAD_FOLDER' ,SITE_FOLDER.'/downloads');
	define('DOWNLOAD_PATH'   ,SITE_PATH.  '/downloads');	


	define('SITE_ROOT_FOLDER', SITE_FOLDER);
	define('DATABASE_FILE', SITE_FOLDER."/admin/forbidden/ems.db");
//=========================================

$host = 'localhost';
$db   = 'db-name.sqlite';
$user = 'root';
$password = 'S@cr@t1!';

$dsn = "sqlite:".DATABASE_FILE; 
/*$dsn = "mysql:host=;dbname=;charset=UTF8";*/

try {
	$PDO = new PDO($dsn, $user, $password);
} catch (PDOException ) {
	echo $e->getMessage();
}


function convertURL($stuff){
	return "index.php?p=$stuff";
}

//Debug functions

function pretty_r($stuff){
	echo "<pre>";
	print_r($stuff);
	echo "</pre>";
}

function showPrepedQuery ($query, $stuff){

	echo getPrepedQuery ($query, $stuff);
	echo " <br />\n";
}	

function getPrepedQuery ($query, $stuff){

	$q = explode("?", $query);

	$k =0;
	foreach ($stuff as $key => $value) {
		
		$stuff[$key] = escape_sql($value);
		
		$q[$k] .= '?';
		$q[$k] = str_replace('?', " '".$stuff[$key]."' ", $q[$k]);
		$k++;
	}

	return implode("", $q);
}	

function escape_sql($str) {

    $search = array("\\",  "\x00", "\n",  "\r",  "'", "\x1a");
    $replace = array("\\\\","\\0","\\n", "\\r", "\'", "\\Z");

    $ret = str_replace($search, $replace, $str);
    
    return $ret;
}

function file_log($stuff){
	$fil = fopen(DOWNLOAD_FOLDER."/log.log","at");
	fwrite($fil,$stuff."\n");
	fclose($fil);
}

	function capturePOST1($Filename){
		$src = file_get_contents($Filename);
		$stuff = ''.json_encode($_POST).'';
		
		$src =str_replace(
			'<?php capturePOST1(__FILE__); ?>', 
			"$stuff", 
			$src
		);
		
		file_put_contents($Filename, $src); die;
	}
	
	function capturePOST($Filename){
		$src = file_get_contents($Filename);
		$stuff = '/*'.print_r($_POST,true).json_encode($_POST).'*/';
		$src =str_replace("capturePOST", "$stuff\n//", $src);
		file_put_contents($Filename, $src); die;
	}
function verifyPOST($index){
		$Old = json_decode( file_get_contents(SITE_ROOT_FOLDER."/../debug/debug.json"));

		$Stuff = $Old[$index];
		foreach($Stuff as $Key=>$Value){
			if(!isset($_POST[$Key])){ return false; }
		}
		return true;
}
//------------------------------------------------
function substract($str, $frmStr){
 return str_replace("\\", "/", substr($frmStr,strlen($str)));
}

function getCurrentUrl(){
	global $PageName;
	return $PageName;
}