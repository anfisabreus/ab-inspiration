<?php 

header('Content-Type: application/x-javascript');
include('../../../../../wp-config.php');
?>


function qips_$(id) {
	return document.getElementById(id);
}

function qips_toggle(id) {
	elm = qips_$(id);
	if(elm.style.display == 'none') {
		elm.style.display = 'block';
	}
	else {
		elm.style.display = 'none';
	}
}

function qips_switch_innerHTML(id, innerHTML_1, innerHTML_2) {
	elm = qips_$(id);
	if(elm.innerHTML == innerHTML_1 || elm.innerHTML == '') {
		elm.innerHTML = innerHTML_2;
	}
	else {
		elm.innerHTML = innerHTML_1;
	}	
}

qips_$("qips_button_smiles").onclick = function ()  
{
	qips_toggle("qips_smiles_toggle_wrapper"); 
} 

function qips_code(qips_tag) {
	var aTag;
	aTag = ' ' + qips_tag + ' ';
	qips_insert(aTag);
}

function qips_insert(aTag)
{
	var input = qips_$('comment');
	input.focus();    
    
	if(typeof input.selectionStart != 'undefined') {
		var start = input.selectionStart;
		var end = input.selectionEnd;		
		
		var scrollTop = input.scrollTop;
		
		var insText = qips_rTrimString(input.value.substring(start, end));
		input.value = input.value.substr(0, start) + aTag + insText + qips_whitespace + input.value.substr(end);
        
		var pos;
		if (insText.length == 0) {
			pos = start + aTag.length;
		}
		else {
			pos = start + aTag.length + insText.length;
		}
		input.selectionStart = pos;
		input.selectionEnd = pos;
		input.scrollTop = scrollTop;
	}    
	else if(typeof document.selection != 'undefined') {
		var range = document.selection.createRange();
		var insText = qips_rTrimString(range.text);
		range.text = aTag + insText + qips_whitespace;
		
		range = document.selection.createRange();
		if (insText.length == 0) {
			range.move('character', 0);
		}
		else {
			range.moveStart('character', aTag.length + insText.length + qips_whitespace.length); 
		}
		range.select();
	}
}

function qips_rTrimString(myString) {
	qips_whitespace = '';
	var lastSign = myString.substring(myString.length-1);
	if( lastSign == ' ') {
		qips_whitespace = ' ';
		return myString.replace( /\s+$/g, "" );
	}
	else {
		return myString;	
	}
} 

var actualSize = 200;
function qips_resizeTextarea(size) {
	if((actualSize < 2000 && size > 0) || (actualSize >= 200 && size < 0)) {
		actualSize += size;
		qips_$("comment").style.height = actualSize + "px";
	}
}