<?php
/**
 * mm_synch_fields
 * @version 1.1 (2012-11-13)
 * 
 * @see README.md
 * 
 * @link https://code.divandesign.biz/modx/mm_synch_fields
 * 
 * @copyright 2012 DD Group {@link https://DivanDesign.biz }
 */

function mm_synch_fields(
	$fields,
	$roles = '',
	$templates = ''
){
	global
		$modx,
		$mm_fields
	;
	
	$e = &$modx->Event;
	
	//if we've been supplied with a string, convert it into an array
	$fields = makeArray($fields);
	
	//We need at least 2 values
	if (count($fields) < 2){
		return;
	}
	
	if (
		$e->name == 'OnDocFormRender' &&
		//If the current page is being edited by someone in the list of roles, and uses a template in the list of templates
		useThisRule(
			$roles,
			$templates
		)
	){
		$output =
			'//---------- mm_synch_fields :: Begin -----' .
			PHP_EOL
		;
		
		$output .=
			'synch_field[mm_sync_field_count] = new Array();' .
			PHP_EOL
		;
		
		foreach (
			$fields as
			$field
		){
			if (isset($mm_fields[$field])){
				$fieldtype = $mm_fields[$field]['fieldtype'];
				$fieldname = $mm_fields[$field]['fieldname'];
				
				$valid_fieldtypes = array(
					'input',
					'textarea'
				);
				
				//Make sure we're dealing with an input
				if (
					!in_array(
						$fieldtype,
						$valid_fieldtypes
					)
				){
					break;
				}
				
				//Add this field to the array of fields being synched
				$output .= '
					synch_field[mm_sync_field_count].push($j("' . $fieldtype . '[name=' . $fieldname . ']"));
				';
				
			//Or we don't recognise it
			}else{
				break;
			}
		}
		
		// Output some javascript to sync these fields
		$output .= '
$j.each(
	synch_field[mm_sync_field_count],
	function(
		i,
		n
	){
		$j.each(
			synch_field[mm_sync_field_count],
			function(
				j,
				m
			){
				if (i != j){
					n.keyup(function(){
						m.val($j(this).val());
					});
				}
			}
		);
	}
);

mm_sync_field_count++;
		';
		
		$output .=
			'//---------- mm_synch_fields :: End -----' .
			PHP_EOL
		;
		
		$e->output($output);
	}
}
?>