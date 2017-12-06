/*
*  NEKO SIMPLE CMS v1.0.3 R1
* @ Developer: Novi
* @ Email: novhz0514@gmail.com
* @ Github: github.com/novhex
* @ Copyright (c) 2015-2016
* @ License MIT
*/

$(document).ready(function(){
	
	var base_url;
	
	$(document).on('click','#add_page',function(){
		show_addpagedialog();
	});






});

  $(function(){
    $(".dropdown").hover(            
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            });
    $(".dropdown-toggle").on('click',function(){
        //alert($(this).attr('href'));
        var page_link = $(this).attr('href');

        window.location = page_link;
    })
    
    });

	function add_page(page_title){
		
		$.ajax({
			url: get_base_url()+"admin/admin_ajax/add_page",
			method: "POST",
			data: "page_title="+page_title,
			success:function(response){
				if(response==1){
					window.location = get_base_url()+"admin/parent-pages";
				}else{
					$('#add_page_ajax_messages').html(response);
				}
			}
		});
	}

	function show_addpagedialog(){

		bootbox.prompt("Enter page name:",function(x){
			if(x==''){
				show_addpagedialog();
			}else if(x==null){

			}
			else{
				add_page(x);
			}
			
		});
	}

	function set_base_url(url){
		base_url = url;	
	}

	function get_base_url(){
		return base_url;
	}