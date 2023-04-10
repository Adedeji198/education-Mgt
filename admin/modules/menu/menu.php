<?php defined('_JEXEC') or die ;

?>
<div class="page-sidebar-wrapper">
	<div class="page-sidebar navbar-collapse collapse">
		<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200"><li class="sidebar-toggler-wrapper"><div class="sidebar-toggler hidden-phone"></div></li>
<?php

	$Result = fetchMainMenu();
	$str = "";

	foreach ($Result as $key => $value) {
		
//pretty_r($_SESSION);		die;
		/*
		if(
			( 
				(0+$_SESSION['userprivilege']) & 
				(0+$value['privilege'])
			)   ){
			/****/
			$str .= '<li><a href="javascript:;"><i class="'.$value['icon'].'"></i><span class="title">'.$value['string'].'</span> <span class="arrow "></span></a>';
			if(($sub=fetchSubMenu($value['id'])) !=''){
				$str .= $sub;
			}//end if
			$str.= '</li>'; 
		//}//end if
	}
	echo $str;
?>			
		</ul>		
		</div>
</div>

<?php 
	function fetchMainMenu(){
		
		global $PDO;
		
		$query = "SELECT * FROM admin_menu WHERE levl= '1' ";
		$Result = $PDO->query($query);
		$Result = $Result->fetchAll();

		return $Result;
	}

	function fetchSubMenu($parent){
		global $PDO;
		$query = "SELECT * FROM admin_menu WHERE parent= ? ";
		$pds    =  $PDO->prepare($query);
		$Result = $pds->execute(array($parent));
		
		if($Result){
			$Result = $pds->fetchAll();
		}else{
			$Result ="";
		}

		$str ='';
		if(is_array($Result)){
			$str  = '<ul class="sub-menu">' ;  
			foreach ($Result  as $key => $value) {
				/*if(
					( 
						(0+$_SESSION['userprivilege']) & 
						(0+$value['privilege'])
					)   
				)
				{/****/

					$str .= '<li><a href="'.convertURL($value['url']).'">'.$value['string'].'</a></li>' ;
				}
			}
			$str  .= '<li></li></ul>';				
		//	}//end if
		return $str;
	}

?>
<!--
			<li><a href="javascript:;"><i class="fa fa-cloud"></i><span class="title">Manage Site</span> <span class="arrow "></span></a><ul class="sub-menu"><li><a href="<?php echo convertURL("manage-site-mail.html") ;?>">Site Mail</a></li></ul></li>
			<li>
				<a href="javascript:;">
				<i class="fa fa-group"></i>
				<span class="title">Users</span> 
				<span class="arrow "></span>
				</a>
				<ul class="sub-menu">
					<li>
					<a href="<?php echo convertURL("manage-users.html"); ?>">Manage Users</a>
					</li>
					<li>
					<a href="<?php echo convertURL("manage-user-account.html"); ?>">Manage Users Accounts
					</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="javascript:;">
					<i class="fa fa-bolt"></i>
					<span class="title">
							Tools
					</span>
					<span class="arrow ">
					</span>
				</a>
				<ul class="sub-menu">
					<li><a href="#">Imports</a></li>
					<li><a href="chat">Chat</a></li>
				</ul>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-exclamation-circle"></i>
					<span class="title">
						About
					</span>
				
				</a>
			</li>
-->