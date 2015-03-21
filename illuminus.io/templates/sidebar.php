<div class="col-md-2">
	<?php
	foreach($fb_data as $key => $a){

		if (isset($permissions[$a['scope']]) && $permissions[$a['scope']] == 'granted' ||
				isset($permissions[$a['name']]) && $permissions[$a['name']] == 'granted'){
			$title = 'permission is granted';
			print '<span title="'.$title.'" class="circle success"></span> ';
		} else {
			$title = 'NO permissions granted';
			print '<span title="'.$title.'" class="circle danger"></span> ';
		}
		print '<a title="'.$title.'" href="./app.php?q='.$a['name'].'" >'.$a['name'].'</a> ';
		if (isset($a['approval'])){
			print '<span class="text-danger" title="this permission requires approval!"><b>!!!</b></span> ';
		}
		print '<br>';
	}
	print "<br><br><br><a href='./app.php?revoke=true&q=all'>revoke all</a>";
	?>
</div>