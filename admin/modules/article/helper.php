<?php 
defined ("_JEXEC") or die;
	class DropdownCreator{ 
		/*
setClass
setID
setName
setValue
setDataArray
setValuekey
setTextkey
getDropdownstring
		*/
		var $TableName, $DataArray, $Value;
		var $ValueKey,$TextKey;
		var $Name, $Class, $ID;
		
		function setClass($C){
			$this->Class = $C;
		}

		function setID($Id){
			$this->ID = $Id;
		}


		function setName($Nm){
			$this->Name = $Nm;
		}
		
		function setValue($Val){
			$this->Value = $Val;
		}
		
		function setDataArray($Darray){
			$this->DataArray = $Darray;
		}

		
		function setValuekey($Vkey){
			$this->ValueKey = $Vkey;
		}
		
		function setTextkey($TKey){
			$this->TextKey = $TKey;
		}
		
		
				
		function getDropdownstring(){
			$Ret = '<select name="'.$this->Name.'" ';
			if($this->ID !=''){
				$Ret .= ' id="'.$this->ID.'" ';
			}
			if($this->Class !=''){
				$Ret .= ' class="'.$this->Class.'" ';
			}

			$Ret .='" >'."\n";
			
			foreach($this->DataArray AS $Key => $Value){
				$Ret .= '<option value="'.$Value[$this->ValueKey].'"';
				
				if($this->Value !='' && $this->Value == $Value[$this->ValueKey]){
					$Ret .= ' selected ';
				}
				$Ret .= '>'.$Value[$this->TextKey].'</option>'."\n";
			}
				
				
				
				$Ret .= '</select >' ;
				
				return $Ret;
			}
}