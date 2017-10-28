// JavaScript Document
function CheckSeachForm(){
	if(jQuery("#type").val()=="" && jQuery("#collection").val()=="" && jQuery("#product_id").val()=="" && jQuery("#date").val()=="" && jQuery("#date1").val()==""){
		alert("Please select atleast one option to search");
		return false;
	}	
}