 $(document).ready(function(){
        $(".widget_choose").change(function(){
            $( "select option:selected").each(function(){
                if($(this).attr("value")=="authorprofile"){
                    $(".box").hide();
                    $(".author_profile").show();
                }
                if($(this).attr("value")=="banner"){
                    $(".box").hide();
                    $(".banner").show();
                }
                
                if($(this).attr("value")=="nowidget"){
                    $(".box").hide();
                   
                }
                
            });
        }).change();
        
        
        
                
        $(document).ready(function($) {
		$('.my-color-picker').wpColorPicker();
	});

    });
