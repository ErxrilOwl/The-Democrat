<?php 
	function validateFormData($formData){
		$formData = trim(stripslashes(htmlspecialchars($formData)));
		return $formData;
	}

	function checkError($formData, $type){
		if($type == "number"){
			if(!is_numeric($formData)){
				return true;
			}
			else return false;
		}
		else if($type == "regString"){
			if(!preg_match("/^[a-zA-Z1-9]/", validateFormData($formData))){
				return true;
			}
			else return false;
		}
		else if($type == "strictString"){
			if(!preg_match("/^[a-zA-Z]/", validateFormData($formData))){
				return true;
			}
			else return false;	
		}
		else if($type == "email"){
			if (!filter_var($formData, FILTER_VALIDATE_EMAIL)) {
				return true;
			}
			else{
				return false;
			}
		}
	}
 ?>