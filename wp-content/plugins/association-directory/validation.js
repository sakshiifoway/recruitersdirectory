// JavaScript Document

function checkAssociation()
{	
	var flag = "";
	var association = association_register.association.value;
	var specialty = association_register.specialty.value;
	var location = association_register.location.value;
	var link_url = association_register.link_url.value;
	
	if(association == "")
	{
		flag += "Please Enter Association.\n";
	}
	if(specialty == "")
	{
		flag += "Please Enter Specialty\n";
	}
	if(location == "")
	{
		flag += "Please Enter Location.\n";
	}
	if(link_url == "")
	{
		flag += "Please Enter Link.";
	}
	if(flag != "")
	{
		alert(flag);
		return false;
	}
	else
	{
		return true;
	}
}

function deleteAssociation(path)
{
	if(confirm('Are you sure you want to delete?'))
	{
		window.location = path;
	}
}