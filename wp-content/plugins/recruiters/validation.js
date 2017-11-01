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