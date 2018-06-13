<?php

$folder_source		= '1-mame_roms_all/';
$folder_destination	= '2-mame_roms_compatible/';

$supported_roms_file = file('supported_roms.txt');

foreach($supported_roms_file as $supported_rom_name){
	$supported_roms[] = substr($supported_rom_name, 0, strpos($supported_rom_name, ' '));
}

$dh = @opendir($folder_source);
while($file = readdir($dh)){
	$filename = substr($file, 0, strpos($file, '.'));
	
	if(in_array($filename, $supported_roms)){
		echo 'Supported:'."\t".$filename."\n";
		copy($folder_source.$file, $folder_destination.$file);
	}else{
		echo 'Not Supported:'."\t".$filename."\n";
	}
}
closedir($dh);

echo 'Finished!'."\n";

?>
