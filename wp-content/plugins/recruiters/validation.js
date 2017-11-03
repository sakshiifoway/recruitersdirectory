// JavaScript Document

function emailInvalid(s)
{
	if(!(s.match(/^[\w]+([_|\.-][\w]{1,})*@[\w]{1,}([_|-|\.-][\w]{1,})*\.([a-z]{2,4})$/i)) )
    {
		return false;
	}
	else
	{
		return true;
	}
}

function isNumberKey(evt)
{
	 var charCode = (evt.which) ? evt.which : event.keyCode
	 if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
	
	 return true;
}

function checkRecruiter()
{	
	var flag = "";
	var firmname = recruiter_register.firmname.value;
	var keyword = recruiter_register.keyword.value;
	var add1 = recruiter_register.add1.value;
	var country = recruiter_register.country.value;
	var state = recruiter_register.state.value;
	var city = recruiter_register.city.value;
	var zip = recruiter_register.zip.value;
	var phone = recruiter_register.phone.value;
	var email = recruiter_register.email.value;
	var contact = recruiter_register.contact.value;
	var estdate = recruiter_register.estdate.value;
	var category = recruiter_register.category.value;
	var type = recruiter_register.type.value;
	
	if(firmname == "")
	{
		flag += "Please Enter Firm Name.\n";
	}
	if(keyword == "")
	{
		flag += "Please Enter Key Word\n";
	}
	if(contact == "")
	{
		flag += "Please Enter Contact Name.\n";
	}
	if(add1 == "")
	{
		flag += "Please Enter Address 1.\n";
	}
	if(country == "")
	{
		flag += "Please Select Country.\n";
	}
	if(state.length == 0)
	{
		flag += "Please Select State.\n";
	}
	if(city == "")
	{
		flag += "Please Enter City.\n";
	}
	if(zip == "")
	{
		flag += "Please Enter Zip.\n";
	}
	if(phone == "")
	{
		flag += "Please Enter Phone No.\n";
	}
	if(email == "")
	{
		flag += "Please Enter Email.\n";
	}
	else if(!emailInvalid(email))
	{
		flag +="Please enter Valid Email\n";
	}
	if(category.length == 0)
	{
		flag += "Please Select Category.\n";
	}
	if(type.length == 0)
	{
		flag += "Please Select Type.\n";
	}
	if(estdate == "")
	{
		flag += "Please Enter Established Year.";
	}
	else if(estdate.length!=4)
	{
		flag += "Enter Established Year in Four Character.";
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

function ApproveRecruiter(id,val,path)
{
	if(confirm('Are you sure you want to change status of this recruiter?'))
	{
		jQuery.ajax({
			type: "POST",
			url: path+"ajaxprocess_recruiter.php",
			data: "flag=ApproveRecruiter&id="+id,
			dataType: '',
			async: true,
			success:function(data){
				jQuery("#aprovehid"+id).val(data);
				if(data == "YES")
					alert("Recruiter Approved Successfully.");
				else
					alert("Recruiter Rejected.");
			}
		});
	}
	else
	{
		var aproveVal = jQuery("#aprovehid"+id).val();
		if(aproveVal == "YES")
			jQuery('#aprove'+id).attr('checked', true);
		else
			jQuery('#aprove'+id).attr('checked', false);
	}
}

function deleteRecruiter(path)
{
	if(confirm('Are you sure you want to delete?'))
	{
		window.location = path;
	}
}

function getState(countryid,path)
{
	jQuery.ajax({
		type: "POST",
		url: path+"ajaxprocess_recruiter.php",
		data: "flag=getState&id="+countryid,
		dataType: '',
		async: true,
		success:function(data){
			//alert(data);
			jQuery("#state").html(data);
		}
	});	
}

function checkDuplicate(tblnm,fldname,fldval,id,path)
{
	jQuery.ajax({
		type: "POST",
		url: path+"ajaxprocess_recruiter.php",
		data: "flag=chkDuplicate&tblnm="+tblnm+"&fldname="+fldname+"&fldval="+fldval+"&id="+id,
		dataType: '',
		async: true,
		success:function(data){
			//alert(data);
			data = data.trim();
			if(data!='')
			{
				jQuery("#"+fldname).val("");
				alert(data);
			}
		}
	});	
}