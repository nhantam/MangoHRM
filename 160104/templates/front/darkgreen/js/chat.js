$(document).ready(function() { 

	//loading
	if(task == "on" && login != '') { //after login
		$("#chat-window").show();
		$("#chat-message").animate({ scrollTop: $(document).height() }, "slow");
		
	} else if(task == "on" && login == '') {
		$('#view_login').modal('show');
	}
	
	$('#chat-emotions-btn').click(function() { $('#chat-emotions-selector').toggle(); });

	$("#chat-close-win").click(function(){
		//$('#chat-container').hide();
		$("#chat-window").hide();
	});
	
	$(".chat-nows").click(function(){
		//$("#chat-container").show();
		$("#chat-window").show();
	});
	
	$('#chat-max-win').click(function() {
	  $(this).toggleClass('chat-min-win');
	  $('#chat-container').toggleClass('fullchat');
	});
	
	$('#chat-dock-win').on('click', function(e) {
	   $('#chat-ui-wrap').toggleClass("none"); 
	   $('#chat-container').toggleClass("fixchat");
	   $('.chat-title-userid').toggleClass("none"); 
	   $('#chat-max-win').toggleClass("none"); 
	   e.preventDefault();
	 });
	
	// $("#chat-container").draggable({ containment: 'window', scroll: false, handle: '#chat-title' });
	
	//chat message			
	var b = $('#chat_section').val();
	
	// display message
	var k = 1;
	setInterval(function(){
		var flag = checkLive();
		
		if(flag == 1 || k == 1) {
							 	
			$('#chat-message').load(base_url+'chat/displaychat/b/'+b+'/');
			
			// scrollToBottom('chat-message');
			
			myScroll2();
			
			//var height = $('#chat-message')[0].scrollHeight;
            ///$("#chat-message").animate({ scrollTop: $("#chat-message").position().top }, 1000);

			// $('#chat-message').scrollTop(height);
			
			//myScroll();
			
		}
		
		k++;
	}, 2500);
	
	// Chat enter
	$('#chat-input').keyup(function(e) { 
		if(e.keyCode == 13) {
			var txt = $('#chat-input').val();
			addChat(txt);
			myScroll();
		}
	});
	
	$('#chat-send').click(function(){
		var txt = $('#chat-input').val();
		addChat(txt);
		
		myScroll();
		
	});
	
	
	
	/*
	setInterval(function(){
		$('#chat-message').load(base_url+'chat/displaychat/b/'+b+'/');
	}, 2500);
	*/
	
	// Sign in
	$('#btn_signin').on('click', function(e) { validateSignin(); });
	
	$("#chat-message").animate({ scrollTop: $(document).height() }, "slow");
	
});

function hideMsg(name_end){
	if( $('#'+name_end).val() != '') { $('#valid_'+name_end).html(''); }
}

function scrollToBottom(id){
  div_height = $("#"+id).height();
  div_offset = $("#"+id).offset().top;
  window_height = $(window).height();
  $('html,body').animate({
	scrollTop: div_offset-window_height+div_height
  },'slow');
}



function myScroll2() {
	
	$('#chat-message').mCustomScrollbar('scrollTo','bottom');
	
	myScroll();
	
	//$('#chat-message').mCustomScrollbar('scrollTo','last');
	//$('#chat-message').mCustomScrollbar('scrollTo',['bottom','right']);
	
	/*
	var myDiv = document.getElementById("#chat-message");
	var ms = myDiv.scrollTop + myDiv.scrollHeight;

	$("#chat-message").animate({ scrollTop:ms }, "slow");
	*/
	
	/*
	$("#chat-message").on("scroll", function() {
		var scrollHeight = $(document).height();
		var scrollPosition = $(window).height() + $(window).scrollTop();
		if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
			// when scroll to bottom of the page
		}
	});
	
	var newScrollHeight = $("#chat-message")[0].scrollHeight;
	newScrollHeight = newScrollHeight + 500;
	$("#chat-message").animate({ scrollTop: newScrollHeight }, "slow");
	
	/*
	$("#chat-message").scroll(function() {
	   if($(window).scrollTop() + $(window).height() == $(document).height()) {
		   //alert("bottom!");
		   // getData();
	   }
	});
	*/
	
	
	/*
	var height = 0;
	$('#chat-message li').each(function(i, value){
		height += parseInt($(this).height());
	});
	
	height += '';
	$('#chat-message').animate({scrollTop: height});
	*/
}


function myScroll() {
	var newScrollHeight = $("#chat-message")[0].scrollHeight;
	newScrollHeight = newScrollHeight + 500;
	$("#chat-message").animate({ scrollTop: newScrollHeight }, "slow");
}

function addChat(chatText) {
	if(chatText != '') {
		var b = $('#chat_section').val();
		var f = $("form#frm_chat");
		$.ajax({
			type: "POST",
			url: base_url+"chat/add/",
			async: false,		
			data: f.serialize(),
			success: function(text){ 
				$('#chat-input').val("");
				$('#chat-message').load(base_url+'chat/displaychat/b/'+b+'/');
			}
		});	
	}
}


function checkLive() {
	
	var chat_section = $('#chat_section').val();
	var flag= 2;
	
	$.ajax({
		type: "POST",
		url: base_url+"chat/chatlive/",
		async: false,		
		data: "b="+chat_section,
		success: function(text){ 
			flag = text;
		}
	});	
	
	return flag;
}


function validateSignin(){
	var username = $('#username').val();
	var pwd = $('#pwd').val();
	
	if(username == '') { $('#valid_username').html( required_input+' '+lang_username); return false; } 
	if( pwd =='') { $('#valid_pwd').html(required_input+' '+lang_passsword); return false; }
	
	var f = $("form#frm_signin");
	$.ajax({
		type: "POST",
		url: base_url+"signin/loginajx/",
		async: false,		
		data: f.serialize(),
		success: function(text){  
			if(text != 1) {
				$('#valid_pwd').html(text);
			} else {
				window.location.href = window.location.href.replace( /[\?#].*|$/, "?task=on" );
			}
		}
	});	
}


