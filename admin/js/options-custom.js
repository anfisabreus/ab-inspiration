/**
 * Prints out the inline javascript needed for the colorpicker and choosing
 * the tabs in the panel.
 */

jQuery(document).ready(function($) {
	
	// Fade out the save message
	$('.fade').delay(1000).fadeOut(1000);
	
	$('.of-color').wpColorPicker();
	
	// Switches option sections
	$('.group').hide();
	var active_tab = '';
	if (typeof(localStorage) != 'undefined' ) {
		active_tab = localStorage.getItem("active_tab");
	}
	if (active_tab != '' && $(active_tab).length ) {
		$(active_tab).fadeIn();
	} else {
		$('.group:first').fadeIn();
	}
	$('.group .collapsed').each(function(){
		$(this).find('input:checked').parent().parent().parent().nextAll().each( 
			function(){
				if ($(this).hasClass('last')) {
					$(this).removeClass('hidden');
						return false;
					}
				$(this).filter('.hidden').removeClass('hidden');
			});
	});
	if (active_tab != '' && $(active_tab + '-tab').length ) {
		$(active_tab + '-tab').addClass('nav-tab-active');
	}
	else {
		$('.nav-tab-wrapper a:first').addClass('nav-tab-active');
	}
	
	$('.nav-tab-wrapper a').click(function(evt) {
		$('.nav-tab-wrapper a').removeClass('nav-tab-active');
		$(this).addClass('nav-tab-active').blur();
		var clicked_group = $(this).attr('href');
		if (typeof(localStorage) != 'undefined' ) {
			localStorage.setItem("active_tab", $(this).attr('href'));
		}
		$('.group').hide();
		$(clicked_group).fadeIn();
		evt.preventDefault();
		
		// Editor Height (needs improvement)
		$('.wp-editor-wrap').each(function() {
			var editor_iframe = $(this).find('iframe');
			if ( editor_iframe.height() < 30 ) {
				editor_iframe.css({'height':'auto'});
			}
		});
	
	});
           					
	$('.group .collapsed input:checkbox').click(unhideHidden);
				
	function unhideHidden(){
		if ($(this).attr('checked')) {
			$(this).parent().parent().parent().nextAll().removeClass('hidden');
		}
		else {
			$(this).parent().parent().parent().nextAll().each( 
			function(){
				if ($(this).filter('.last').length) {
					$(this).addClass('hidden');
					return false;		
					}
				$(this).addClass('hidden');
			});
           					
		}
	}
	

     

// form _form
   
   $("#form_choose").change(function() {
     
  if($('#form_choose option:selected').val() == "smartform") {
    
         $("#section-smart_form").show();
         $("#section-just_form").hide();
         $("#section-getresp_form").hide();
         $("#section-getresp360_form").hide();
         $("#section-sendpulse_form").hide();
         $("#section-mailchimp_form").hide();
         $("#section-unisender_form").hide();
         $("#section-autoweboffice_form").hide();
         $("#section-mailerlite_form").hide();
         $("#section-onebutton_form").hide();
  }
 
   if($('#form_choose option:selected').val() == "justform") {
    
         $("#section-just_form").show();
         $("#section-smart_form").hide();
         $("#section-getresp_form").hide();
         $("#section-getresp360_form").hide();
         $("#section-sendpulse_form").hide();
         $("#section-mailchimp_form").hide();
         $("#section-unisender_form").hide();  
         $("#section-autoweboffice_form").hide();
         $("#section-mailerlite_form").hide();
         $("#section-onebutton_form").hide();
  }
  
    if($('#form_choose option:selected').val() == "getresponseform") {
         $("#section-getresp_form").show();
         $("#section-getresp360_form").hide();
         $("#section-sendpulse_form").hide();
         $("#section-just_form").hide();
         $("#section-smart_form").hide();  
         $("#section-mailchimp_form").hide();
         $("#section-unisender_form").hide();
         $("#section-autoweboffice_form").hide();
         $("#section-mailerlite_form").hide();
         $("#section-onebutton_form").hide();
         }
         
         
         
          if($('#form_choose option:selected').val() == "getresponseform360") {
         $("#section-getresp360_form").show();
         $("#section-sendpulse_form").hide();
         $("#section-getresp_form").hide();
         $("#section-just_form").hide();
         $("#section-smart_form").hide();  
         $("#section-mailchimp_form").hide();
         $("#section-unisender_form").hide();
         $("#section-autoweboffice_form").hide();
         $("#section-mailerlite_form").hide();
         $("#section-onebutton_form").hide();
         }
         
         
           if($('#form_choose option:selected').val() == "sendpulseform") {
         $("#section-sendpulse_form").show();
         $("#section-getresp360_form").hide();
         $("#section-getresp_form").hide();
         $("#section-just_form").hide();
         $("#section-smart_form").hide();  
         $("#section-mailchimp_form").hide();
         $("#section-unisender_form").hide();
         $("#section-autoweboffice_form").hide();
         $("#section-mailerlite_form").hide();
         $("#section-onebutton_form").hide();
         }
         
         
         
         
          if($('#form_choose option:selected').val() == "mailchimpform") {
         $("#section-mailchimp_form").show();
         $("#section-just_form").hide();
         $("#section-smart_form").hide();  
         $("#section-getresp_form").hide();
         $("#section-getresp360_form").hide();
         $("#section-sendpulse_form").hide();
         $("#section-unisender_form").hide();
         $("#section-autoweboffice_form").hide();
         $("#section-mailerlite_form").hide();
         $("#section-onebutton_form").hide();
         }
         
           if($('#form_choose option:selected').val() == "unisenderform") {
         $("#section-unisender_form").show();
         $("#section-just_form").hide();
         $("#section-smart_form").hide();  
         $("#section-getresp_form").hide();
         $("#section-getresp360_form").hide();
         $("#section-sendpulse_form").hide();
         $("#section-mailchimp_form").hide();
         $("#section-autoweboffice_form").hide();
         $("#section-mailerlite_form").hide();
         $("#section-onebutton_form").hide();
         }
         
             if($('#form_choose option:selected').val() == "autowebofficeform") {
         $("#section-autoweboffice_form").show();
         $("#section-just_form").hide();
         $("#section-smart_form").hide();  
         $("#section-getresp_form").hide();
         $("#section-getresp360_form").hide();
         $("#section-sendpulse_form").hide();
         $("#section-mailchimp_form").hide();
         $("#section-unisender_form").hide();
         $("#section-mailerlite_form").hide();
         $("#section-onebutton_form").hide();
         }
         
             if($('#form_choose option:selected').val() == "mailerliteform") {
         $("#section-mailerlite_form").show();
         $("#section-just_form").hide();
         $("#section-smart_form").hide();  
         $("#section-getresp_form").hide();
         $("#section-getresp360_form").hide();
         $("#section-sendpulse_form").hide();
         $("#section-mailchimp_form").hide();
         $("#section-unisender_form").hide();
         $("#section-autoweboffice_form").hide();
         $("#section-onebutton_form").hide();
         }
         
           if($('#form_choose option:selected').val() == "onebuttonform") {
         $("#section-onebutton_form").show();
         $("#section-just_form").hide();
         $("#section-smart_form").hide();
         $("#section-mailchimp_form").hide(); 
         $("#section-unisender_form").hide(); 
         $("#section-getresp_form").hide();
         $("#section-getresp360_form").hide();
         $("#section-sendpulse_form").hide();
         $("#section-autoweboffice_form").hide();
         $("#section-mailerlite_form").hide();
         }
   
 });
 
 if($('#form_choose option:selected').val() == "smartform") {
    localStorage.setItem('form',true);
          $("#section-smart_form").show();
         $("#section-just_form").hide();
         $("#section-getresp_form").hide();
         $("#section-getresp360_form").hide();
         $("#section-sendpulse_form").hide();
         $("#section-mailchimp_form").hide();
          $("#section-unisender_form").hide();
          $("#section-autoweboffice_form").hide();
          $("#section-mailerlite_form").hide();
         $("#section-onebutton_form").hide();
         
  }
 
   if($('#form_choose option:selected').val() == "justform") {
     localStorage.setItem('form',true);
          $("#section-just_form").show();
         $("#section-smart_form").hide();
         $("#section-getresp_form").hide();
         $("#section-getresp360_form").hide();
         $("#section-sendpulse_form").hide();
         $("#section-mailchimp_form").hide();
          $("#section-unisender_form").hide();
          $("#section-autoweboffice_form").hide();
          $("#section-mailerlite_form").hide();
         $("#section-onebutton_form").hide();
  }
  
    if($('#form_choose option:selected').val() == "getresponseform") {
    localStorage.setItem('form',true);
       $("#section-getresp_form").show();
       $("#section-getresp360_form").hide();
       $("#section-sendpulse_form").hide();
         $("#section-just_form").hide();
         $("#section-smart_form").hide(); 
         $("#section-mailchimp_form").hide();
         $("#section-unisender_form").hide();
         $("#section-autoweboffice_form").hide(); 
         $("#section-mailerlite_form").hide();
         $("#section-onebutton_form").hide();  
         
         }
         
          if($('#form_choose option:selected').val() == "getresponseform360") {
    localStorage.setItem('form',true);
    $("#section-getresp360_form").show();
    $("#section-sendpulse_form").hide();
       $("#section-getresp_form").hide();
         $("#section-just_form").hide();
         $("#section-smart_form").hide(); 
         $("#section-mailchimp_form").hide();
         $("#section-unisender_form").hide();
         $("#section-autoweboffice_form").hide(); 
         $("#section-mailerlite_form").hide();
         $("#section-onebutton_form").hide();  
         
         }
         
             if($('#form_choose option:selected').val() == "sendpulseform") {
    localStorage.setItem('form',true);
     $("#section-sendpulse_form").show();
    $("#section-getresp360_form").hide();
   
       $("#section-getresp_form").hide();
         $("#section-just_form").hide();
         $("#section-smart_form").hide(); 
         $("#section-mailchimp_form").hide();
         $("#section-unisender_form").hide();
         $("#section-autoweboffice_form").hide(); 
         $("#section-mailerlite_form").hide();
         $("#section-onebutton_form").hide();  
         
         }
         
         if($('#form_choose option:selected').val() == "mailchimpform") {
    localStorage.setItem('form',true);
       $("#section-mailchimp_form").show();
         $("#section-just_form").hide();
         $("#section-smart_form").hide(); 
         $("#section-getresp_form").hide(); 
         $("#section-getresp360_form").hide();
         $("#section-sendpulse_form").hide();
         $("#section-unisender_form").hide();
         $("#section-autoweboffice_form").hide();
         $("#section-mailerlite_form").hide();
         $("#section-onebutton_form").hide();  }
         
         
          
          
        
          
          
          
           if($('#form_choose option:selected').val() == "unisenderform") {
    localStorage.setItem('form',true);
       $("#section-unisender_form").show();
         $("#section-just_form").hide();
         $("#section-smart_form").hide(); 
         $("#section-getresp_form").hide(); 
         $("#section-getresp360_form").hide();
         $("#section-sendpulse_form").hide();
         $("#section-mailchimp_form").hide();
         $("#section-autoweboffice_form").hide();
         $("#section-mailerlite_form").hide();
         $("#section-onebutton_form").hide();  
         }
         
         
         
         
         if($('#form_choose option:selected').val() == "autowebofficeform") {
    localStorage.setItem('form',true);
       $("#section-autoweboffice_form").show();
         $("#section-just_form").hide();
         $("#section-smart_form").hide(); 
         $("#section-getresp_form").hide(); 
         $("#section-getresp360_form").hide();
         $("#section-sendpulse_form").hide();
         $("#section-mailchimp_form").hide();
         $("#section-unisender_form").hide();
         $("#section-mailerlite_form").hide();
         $("#section-onebutton_form").hide();  
         
         }
        
         
         if($('#form_choose option:selected').val() == "mailerliteform") {
    localStorage.setItem('form',true);
         $("#section-mailerlite_form").show();
         $("#section-just_form").hide();
         $("#section-smart_form").hide(); 
         $("#section-getresp_form").hide();
         $("#section-getresp360_form").hide();
         $("#section-sendpulse_form").hide(); 
         $("#section-mailchimp_form").hide();
         $("#section-autoweboffice_form").hide();
         $("#section-unisender_form").hide();
         $("#section-onebutton_form").hide();
           }

if($('#form_choose option:selected').val() == "onebuttonform") {
    localStorage.setItem('form',true);
         $("#section-onebutton_form").show();
         $("#section-just_form").hide();
         $("#section-smart_form").hide();  
         $("#section-mailchimp_form").hide();
         $("#section-unisender_form").hide();
         $("#section-autoweboffice_form").hide();
         $("#section-mailerlite_form").hide();
         $("#section-getresp_form").hide();
         $("#section-getresp360_form").hide();
         $("#section-sendpulse_form").hide(); }
         
         
         
        	
	// Image Options
	$('.of-radio-img-img').click(function(){
		$(this).parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
		$(this).addClass('of-radio-img-selected');		
	});
		
	$('.of-radio-img-label').hide();
	$('.of-radio-img-img').show();
	$('.of-radio-img-radio').hide();
	
	    $( ".radio" ).buttonset();
    $( ".multicheck" ).buttonset();
		 		
});	