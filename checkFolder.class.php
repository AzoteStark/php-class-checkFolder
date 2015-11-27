<?php
//////////////////////////////////////////////////////////////////////////////////////////////////////
//																															                                    //
//				 CLASS checkFolder v1 by AzoteStark												                              	//
//								 Liste les fichiers d'un dossier passer en paramétre	                        		//
//								 Récupére le type MIME 													                                	//
//								 																						                                    	//
//								 																					                                    		//
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//
// =========================================  FAIRE ==================================================//
//
//		
//
//
// ======================================== CHANGELOG ===============================================//
//
//	
//
//
// ========================================= SCRIPT ==================================================//

class FilesInFolder
{ // DEBUT CLASS

///////////////////////
//    VARIABLES	     //
///////////////////////
private $files; // Array qui accueillera les nom de fichiers
private $path; // Dir

///////////////////////
//   CONSTRUCTEUR	 //
///////////////////////

function __construct($link)
{
	$d = new DirectoryIterator($link);
	while($d->valid()) {
		$file = $d->current();
		if( !$file->isDot() )
			$this->files[] =  $file->getFilename();
		$d->next();
	}
	$this->path = $d->getPath();
}

// Reorganisation Key
private function ReIndexArray( $array )
{
	$newKey =0;
	foreach( $array as $val ){
		$nArray[ $newKey ] = $val;
		$newKey++;
	}
	$array = $nArray;
	return $array;
}

// Get Array Files
public function GetFiles()
{
	$this->files = $this->ReIndexArray( $this->files );
	usort($this->files, "strcasecmp");
	return $this->files;
}

//Get Path Dir
public function GetPath()
{
	return $this->path;
}

} // fin class
?>
