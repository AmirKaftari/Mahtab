$(document).ready(function()
{
	/*
   $('#profile-tab').attr('class', 'disabled');
   $('#messages-tab').attr('class', 'disabled');
   $('#settings-tab').attr('class', 'disabled');
   $('#wife-tab').attr('class', 'disabled');
   $('#confirm-tab').attr('class', 'disabled');
   
   
   $('#profile-tab').click(function(event){
        if ($(this).hasClass('disabled')) 
		{ 
			return false; 
		}
        $('#profile-tab').attr('class', 'active');
        return true;
    });
	
	
	$('#messages-tab').click(function(event){
        if ($(this).hasClass('disabled')) 
		{ 
			return false; 
		}
        $('#messages-tab').attr('class', 'active');
        return true;
    });
	$('#settings-tab').click(function(event){
        if ($(this).hasClass('disabled')) 
		{ 
			return false; 
		}
        $('#settings-tab').attr('class', 'active');
        return true;
    });
	$('#wife-tab').click(function(event){
        if ($(this).hasClass('disabled')) 
		{ 
			return false; 
		}
        $('#wife-tab').attr('class', 'active');
        return true;
    });
	$('#confirm-tab').click(function(event){
        if ($(this).hasClass('disabled')) 
		{ 
			return false; 
		}
        $('#confirm-tab').attr('class', 'active');
        return true;
    });
	
	$('#stepTwo').click(function()
        {
            // Find the target tab li (or anchor) that links to the content you want to show.
            alert("jafarrrrrrrrrrr");
            $('a[href="#profile"]').tab('show');
            //$('ul.nav-tabs li:eq(1)').tab('show');
        });
	*/

	//$("#observer").persianDatepicker({
     //       altField: '#observerAlt',
     //       altFormat: "YYYY MM DD HH:mm:ss",
     //       observer: true,
     //       format: 'YYYY/MM/DD'
    //
     //   });


	$('#datepicker5').datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true
	});


});

function selectCity(stateId)
{
	if(stateId!="-1")
	{
		loadCityByStateId(stateId);
	}
	else
	{
		$("#city_dropdown").html("<option value='-1'>Select city</option>");		
	}
}

function loadCityByStateId(stateId)
{	
	var dataString = '&loadId='+ stateId;
   
	$.ajax({
		type: "POST",
		url: "http://localhost/Rasool/AjaxCallController/loadCityByStateId",
		data: dataString,
		cache: false,
		success: function(result)
		{
			$("#city_dropdown").html("<option value='-1'>انتخاب کنید</option>");  
			$("#city_dropdown").append(result); 
			
		}
		
	});
}

//$(function(){
//	var timer = 10;
//	var userId = '1';
//	function inTime()
//	{
//		setTimeout(inTime,1000);
//
//		if(timer == 8)
//		{
//			$.post("<?php base_url(Users/Dashboard/Test) ?>",{currentUserId:userId}, function(data){
//				$(".messagefavorite").html(data);
//			})
//			timer = 11;
//			clearTimeout(inTime);
//		}
//
//		timer--;
//	}
//	inTime();
//});
