// JavaScript Document
function CheckSeachForm(){
	if(jQuery("#candidate_name").val()=="" && jQuery("#recruiter_name").val()==""){
		alert("Please select atleast one option to search");
		return false;
	}	
}