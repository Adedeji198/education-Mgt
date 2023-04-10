
<?php 			
class UserData 
{
	var $Data;


	function getData($tag){

		switch($tag){
			case '<span class="dynamic-text">users.surname</span>': 
				return '&lt;?php echo $users["surname"]; ?>';
			case '<span class="dynamic-text">users.id</span>': 
				return '&lt;?php echo $users["id"]; ?>';
			case '<span class="dynamic-text">users.firstname</span>': 
				return '&lt;?php echo $users["firstname"]; ?>';
			case '<span class="dynamic-text">users.adddress</span>': 
				return '&lt;?php echo $users["adddress"]; ?>';
			case '<span class="dynamic-text">users.username</span>': 
				return '&lt;?php echo $users["username"]; ?>';
			case '<span class="dynamic-text">users.phone</span>': 
				return '&lt;?php echo $users["phone"]; ?>';
			case '<span class="dynamic-text">users.nationality</span>': 
				return '&lt;?php echo $users["nationality"]; ?>';
			case '<span class="dynamic-text">users.nok_phone</span>': 
				return '&lt;?php echo $users["nok_phone"]; ?>';
			case '<span class="dynamic-text">users.passport</span>': 
				return '&lt;?php echo $users["passport"]; ?>';
			case '<span class="dynamic-text">users.signature</span>': 
				return '&lt;?php echo $users["signature"]; ?>';
			case '<span class="dynamic-text">users.level</span>': 
				return '&lt;?php echo $users["level"]; ?>';
			case '<span class="dynamic-text">users.matric</span>': 
				return '&lt;?php echo $users["matric"]; ?>';
			case '<span class="dynamic-text">users.clearance</span>': 
				return '&lt;?php echo $users["clearance"]; ?>';
			case '<span class="dynamic-text">users.mail</span>': 
				return '&lt;?php echo $users["mail"]; ?>';
			case '<span class="dynamic-text">users.faculty</span>': 
				return '&lt;?php echo $users["faculty"]; ?>';
			case '<span class="dynamic-text">users.department</span>': 
				return '&lt;?php echo $users["department"]; ?>';

			default: return "";
			break;
		}

	}
}//~class
		

	function replaceTextUsing_UserData($Str){
		$Replacer = new UserData();
		
		$Str = str_replace(
			'<span class="dynamic-text">users.surname</span>', 
			$Replacer->getData('<span class="dynamic-text">users.surname</span>'), 
			$Str
		);

		
		$Str = str_replace(
			'<span class="dynamic-text">users.id</span>', 
			$Replacer->getData('<span class="dynamic-text">users.id</span>'), 
			$Str
		);

		
		$Str = str_replace(
			'<span class="dynamic-text">users.firstname</span>', 
			$Replacer->getData('<span class="dynamic-text">users.firstname</span>'), 
			$Str
		);

		
		$Str = str_replace(
			'<span class="dynamic-text">users.adddress</span>', 
			$Replacer->getData('<span class="dynamic-text">users.adddress</span>'), 
			$Str
		);

		
		$Str = str_replace(
			'<span class="dynamic-text">users.username</span>', 
			$Replacer->getData('<span class="dynamic-text">users.username</span>'), 
			$Str
		);

		
		$Str = str_replace(
			'<span class="dynamic-text">users.phone</span>', 
			$Replacer->getData('<span class="dynamic-text">users.phone</span>'), 
			$Str
		);

		
		$Str = str_replace(
			'<span class="dynamic-text">users.nationality</span>', 
			$Replacer->getData('<span class="dynamic-text">users.nationality</span>'), 
			$Str
		);

		
		$Str = str_replace(
			'<span class="dynamic-text">users.nok_phone</span>', 
			$Replacer->getData('<span class="dynamic-text">users.nok_phone</span>'), 
			$Str
		);

		
		$Str = str_replace(
			'<span class="dynamic-text">users.passport</span>', 
			$Replacer->getData('<span class="dynamic-text">users.passport</span>'), 
			$Str
		);

		
		$Str = str_replace(
			'<span class="dynamic-text">users.signature</span>', 
			$Replacer->getData('<span class="dynamic-text">users.signature</span>'), 
			$Str
		);

		
		$Str = str_replace(
			'<span class="dynamic-text">users.level</span>', 
			$Replacer->getData('<span class="dynamic-text">users.level</span>'), 
			$Str
		);

		
		$Str = str_replace(
			'<span class="dynamic-text">users.matric</span>', 
			$Replacer->getData('<span class="dynamic-text">users.matric</span>'), 
			$Str
		);

		
		$Str = str_replace(
			'<span class="dynamic-text">users.clearance</span>', 
			$Replacer->getData('<span class="dynamic-text">users.clearance</span>'), 
			$Str
		);

		
		$Str = str_replace(
			'<span class="dynamic-text">users.mail</span>', 
			$Replacer->getData('<span class="dynamic-text">users.mail</span>'), 
			$Str
		);

		
		$Str = str_replace(
			'<span class="dynamic-text">users.faculty</span>', 
			$Replacer->getData('<span class="dynamic-text">users.faculty</span>'), 
			$Str
		);

		
		$Str = str_replace(
			'<span class="dynamic-text">users.department</span>', 
			$Replacer->getData('<span class="dynamic-text">users.department</span>'), 
			$Str
		);

		
		$Str = str_replace(
			'<span class="dynamic-text"></span>', 
			$Replacer->getData('<span class="dynamic-text"></span>'), 
			$Str
		);

		
		return $Str;					
	} 

