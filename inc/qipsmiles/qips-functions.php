<?php

function qips_javascript_insert() {
	global $qips_conf;
	echo "\r\n<!-- Begin QipSmiles Javascript -->\r\n";
	echo '<script type="text/javascript" src="'. $qips_conf['dir_www_plugin']. '/qips.js"></script>';
	echo "\r\n<!-- End QipSmiles Javascript -->\r\n\r\n";
}

function qips_make_smile_array_unique_insert($smiles_array) {
	$smiles_array = array_flip($smiles_array);
	array_unique($smiles_array);
	$smiles_array = array_flip($smiles_array);	
	return $smiles_array;	
}

function qips_build_smile_images_insert($smiles_array) {
	global $qips_conf, $qips_options;
	
	$dirname = $qips_conf['dir_www_smiles'];
	
	$smiles_array = qips_make_smile_array_unique_insert($smiles_array);
					
	$smile_image_string = '';
	
	
	foreach($smiles_array as $key => $val) {		
			$smile_image_string .= '<img style="cursor: pointer;" onclick="javascript: qips_code(\''. $key. '\');" src="'. $dirname. '/'. $val.'" alt="'. $key. '" title="'. $key. '"> ';
	}
	return $smile_image_string;
}

?>