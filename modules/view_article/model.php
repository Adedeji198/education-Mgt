<?php defined('_JEXEC') or die;

function getArticles(){
		global $PDO;
		$Section = getCurrentSection();
		$Url     = getCurrentUrl();
		
		/*
		echo "$Section<br /> $Url";
       /***/
       
     $query  =  
     "SELECT articles.*, url.string AS turl ,section.string as tsection
     FROM url,section,articles 
     WHERE url.string = ? AND 
     section.string   = ? AND 
     (articles.url= url.id OR articles.url ='0') AND
     articles.section = section.id";

     $pds    = $PDO->prepare($query);
     
     $pds->execute(
     	array( $Url,$Section )
     );
     
     return $pds->fetchAll(2);
 }    
     /*(
  "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "string" TEXT NOT NULL,
  "title" VARCHAR(45) DEFAULT NULL,
  "category" INTEGER NOT NULL,
  "url" INTEGER NOT NULL,
  "section" INTEGER NOT NULL,
  "timecode" INTEGER DEFAULT NULL,
  "levl" INTEGER DEFAULT NULL,
  "author" INTEGER DEFAULT NULL,
  "source" INTEGER DEFAULT NULL,
  "status" INTEGER NOT NULL
  
  CREATE TABLE "section"(
  "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "string" VARCHAR(128) NOT NULL
)
)*/

 ?>