// JavaScript Document

function ApproveCompany(id,val,path)
{
	if(confirm('Are you sure you want to change status?'))
	{
		jQuery.ajax({
			type: "POST",
			url: path+"ajaxprocess_company.php",
			data: "flag=ApproveCompany&id="+id,
			dataType: '',
			async: true,
			success:function(data){
				//alert(data);
				jQuery("#aprovehid"+id).val(data);
				if(data == "YES")
					alert("Approved Successfully.");
				else
					alert("Rejected Successfully.");
			}
		});
	}
	else
	{
		var aproveVal = jQuery("#aprovehid"+id).val();
		if(aproveVal == "YES")
			jQuery('#approvechk'+id).attr('checked', true);
		else
			jQuery('#approvechk'+id).attr('checked', false);
	}
}