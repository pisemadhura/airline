var c,c1;
$(document).ready(function(e) {
    $(function(){
		c = document.URL.charAt(document.URL.length-1);
		$(".forms").css({'visibility':'hidden'});
		initialize();
	});			
});
function initialize()
{
		$(".forms").css({'visibility':'hidden'});
		$(".forms").hide();
		$("#result").hide();
		$("input[type='submit']").attr('disabled',true);
		if(c=='p')
		{
			$("#fuc1").show();
			$("#fuc1").css({'visibility':'visible'});
			$("#result").html("");
		}
		else
		{
			$('#fuc'+c).show();
			$("#fuc"+c).css({'visibility':'visible'});
			if(document.URL.charAt(document.URL.length-2)=='#')
			$("#result").html("");
			$("#result").show();
		}
		$("input[type='checkbox']").change(function(){
			if($("#d_airport").val().length==3 && $("#a_airport").val().length==3 && $("#d_airport").val()!=$("#a_airport").val())
			{
				$("#fire1").attr("disabled",false);
			}
		});
		$("#datepicker").datepicker({
			onSelect:function()
			{
				if(($("#fno").val().length==3 || $("#fno").val().length==4) && $("#datepicker").val()!="")
				{
					$("#fire2").attr("disabled",false);
				}
				else
				{
					$("#fire2").attr("disabled",true);
				}
			},
			onClose:function()
			{
				if(($("#fno").val().length==3 || $("#fno").val().length==4) && $("#datepicker").val()!="")
				{
					$("#fire2").attr("disabled",false);
				}
				else
				{
					$("#fire2").attr("disabled",true);
				}
			}
		});
		$("#pm").change(function(){
			if($('#pm').val()!='def')
			{
				if($('#pm').val()=="s1")
				{
					c1=0;
					$("#searchLabel").html("<h3>Flight Number : </h3>");
					$("#inputHolder").html("<input class='fnum' name='fno2' id='fno2' type='text' />");
					
					$("#fdate").html("<h3>Date : </h3>");
					$("#dateHolder").html("<input name='datepicker1' type='text' id='datepicker1'>");
					$("#submitHolder").html("<input class='fire' id='fire4' type='submit'/>");
					$("#fire4").attr("disabled",true);
					$("#datepicker1").datepicker({
						onSelect:function()
						{
							if(($("#fno2").val().length==3 || $("#fno2").val().length==4) && $("#datepicker1").val()!="")
							{
								$("#fire4").attr("disabled",false);
							}
							else
							{
								$("#fire4").attr("disabled",true);
							}
						},
						onClose:function()
						{
							if(($("#fno2").val().length==3 || $("#fno2").val().length==4) && $("#datepicker1").val()!="")
							{
								$("#fire4").attr("disabled",false);
							}
							else
							{
								$("#fire4").attr("disabled",true);
							}
						}
					});
				}
				else
				{
					c1=1;
					$("#searchLabel").html("<h3>Passenger Name : </h3>");
					$("#inputHolder").html("<input name='pname' id='pname' type='text' />");
					$("#datepicker1").html("");
					$("#dateHolder").html("");
					$("#submitHolder").html("<input class='fire' id='fire5' type='submit'/>");
				}
			}
			else
			{
				$("#searchLabel").html("");
				$("#inputHolder").html("");
					
				$("#datepicker1").html("");
				$("#dateHolder").html("");
				
				$("#submitHolder").html("");
			}
		});
}
$("#uc1").live("click",function(){
	$(".forms").hide();
	$("#fuc1").show();
	$(".forms").removeClass("active");
	$("#fuc1").addClass("active");
	c=1;
	initialize();
});
$("#uc2").live("click",function(){
	$(".forms").hide();
	$("#fuc2").show();
	$(".forms").removeClass("active");
	$("#fuc2").addClass("active");
	c=2;
	initialize();
});
$("#uc3").live("click",function(){
	$(".forms").hide();
	$("#fuc3").show();
	$(".forms").removeClass("active");
	$("#fuc3").addClass("active");
	c=3;
	initialize();
});
$("#uc4").live("click",function(){
	$(".forms").hide();
	$("#fuc4").show();
	$(".forms").removeClass("active");
	$("#fuc4").addClass("active");
	c=4;
	initialize();
});
$(".fnum").live("keypress",function(e){
	e.keyCode = (e.keyCode != 0)?e.keyCode:e.which; // Mozilla hack..
	if(e.keyCode == 13)
	{
		var a=$(this).attr('id');
	}
	else 
	{
		if($(this).val().length>3 || (e.keyCode<48 || e.keyCode>57) && e.keyCode!=8 && e.keyCode != 9)
		{
			e.preventDefault();
		}
	}
});
$(".fnum").live("keyup",function(e){
	if(c==1 && ($("#fno").val().length==3 || $("#fno").val().length==4) && $("#datepicker").val()!="")
	{
		$("#fire2").attr("disabled",false);
	}
	else
	$("#fire2").attr("disabled",true);
	
	if(c==4 && c1==0 && ($("#fno2").val().length==3 || $("#fno2").val().length==4) && $("#datepicker1").val()!="")
	{
		$("#fire4").attr("disabled",false);
	}
	else
	$("#fire4").attr("disabled",true);
	
	if(c==3 && $("#fno1").val().length==3 || $("#fno1").val().length==4)
	{
		$("#fire3").attr("disabled",false);
	}
	else
	$("#fire3").attr("disabled",true);
});
$(".fnum").live("focusout",function(e){
	if(c==1 && ($("#fno").val().length==3 || $("#fno").val().length==4) && $("#datepicker").val()!="")
	{
		$("#fire2").attr("disabled",false);
	}
	else
	$("#fire2").attr("disabled",true);
	
	if(c==4 && c1==0 && ($("#fno2").val().length==3 || $("#fno2").val().length==4) && $("#datepicker1").val()!="")
	{
		$("#fire4").attr("disabled",false);
	}
	else
	$("#fire4").attr("disabled",true);
	
	if(c==3 && $("#fno1").val().length==3 || $("#fno1").val().length==4)
	{
		$("#fire3").attr("disabled",false);
	}
	else
	$("#fire3").attr("disabled",true);
});
$(".acode").live("keypress",function(e){
	e.keyCode = (e.keyCode != 0)?e.keyCode:e.which; // Mozilla hack..
	if(e.keyCode == 13)
	{
		var a=$(this).attr('id');
	}
	else 
	{
		if($(this).val().length>2 || ((e.keyCode<65 || (e.keyCode<97 && e.keyCode>90) || e.keyCode>122)) && e.keyCode!=8 && e.keyCode != 9)
		{
			e.preventDefault();
		}
	}
});
$(".acode").live("keyup",function(e){
	e.keyCode = (e.keyCode != 0)?e.keyCode:e.which; // Mozilla hack..
	$(this).val($(this).val().toUpperCase());
	if($("#d_airport").val().length==3 && $("#a_airport").val().length==3 && $("#d_airport").val()!=$("#a_airport").val())
	{
		$("#fire1").attr("disabled",false);
	}
	else
	$("#fire1").attr("disabled",true);
});
$(".acode").live("focus",function(e){
	if($("#d_airport").val().length==3 && $("#a_airport").val().length==3 && $("#d_airport").val()!=$("#a_airport").val())
	{
		$("#fire1").attr("disabled",false);
	}
	else
	$("#fire1").attr("disabled",true);
});
$("#pname").live("keypress",function(e){
	e.keyCode = (e.keyCode != 0)?e.keyCode:e.which; // Mozilla hack..
	if(e.keyCode == 13)
	{
		var a=$(this).attr('id');
	}
	else 
	{
		if(((e.keyCode<65 || (e.keyCode<97 && e.keyCode>90) || e.keyCode>122)) && e.keyCode!=8 && e.keyCode != 9)
		{
			e.preventDefault();
		}		
	}
});
$("#pname").live("keyup",function(e){
	if($("#pname").val()!="")
	{
		$("#fire5").attr("disabled",false);
	}
	else
	$("#fire5").attr("disabled",true);
});
