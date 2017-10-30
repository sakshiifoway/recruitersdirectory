<?php

function candidates_list() {
	
	$pageflag = $_REQUEST['flag'];
	
	if($pageflag == "candidate-profile")
	{
		include "candidates-profile.php";//
	}
	else if($pageflag == "recruiter-profile")
	{
		include "recruiter-profile.php"; ///
	}
	else
	{ 
		include "candidates-list.php"; ///
	}
}