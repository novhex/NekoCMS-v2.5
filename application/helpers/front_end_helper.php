<?php



if(!function_exists('show_navbar_links')){

	function show_navbar_links(){

		$CI =& get_instance();
		$CI->load->database();

		$parent_pages = $CI->db->get('pages')->result();

		foreach($parent_pages as $pages){

			 echo "<li class=\"dropdown\">";
             echo "<a style=\"font-size: 12px; font-weight: bold;\" href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">".$pages->page_name."<span class=\"caret\"></span></a>";

             echo"<ul id=\"dp-caret\" class=\"dropdown-menu\">";

				 foreach(get_page_subcategory($pages->pageID) as $subpages){


				 	if($subpages->category_name !==''){

				 		echo "<li><a href='".base_url('category')."/".$subpages->category_slug."'>".$subpages->category_name."</a></li>";
				 	}
				}

		   echo  "</ul>";
           echo  "</li>";
		}

	}
}


if(!function_exists('get_page_subcategory')){

	function get_page_subcategory($parent_pageID){

		$CI =& get_instance();

		$CI->load->database();


		$page_subcategory = $CI->db->where('parent_page',$parent_pageID)->get('categories')->result();

		return $page_subcategory;

	}
}


if(!function_exists('get_post_archives')){

	function get_post_archives($archives =NULL){

		if($archives!==NULL){
		
		foreach($archives as $archives_posts){
         	echo "<li style='list-style-type: none;'><a href='".base_url('archives/').$archives_posts->YEAR."-".$archives_posts->MONTH."'>".date('F Y ',strtotime($archives_posts->YEAR."-".$archives_posts->MONTH))."($archives_posts->TOTAL)" ."</a></li>";
          }

      	}else{

      		echo '<p> No archives to show.</p>';
      	}

	}

}

if(!function_exists('get_latest_comments')){

	function get_latest_comments($comments = NULL){

		if($comments!==NULL){

		foreach($comments as $com): 
                       echo "<p>". 
                              $com['name']. " on   <strong><a href=".base_url('article').'/'.$com['slug'].">".$com['title']."</a></strong> <br/>
                         </p>";
         endforeach;
     	}else{

     		echo '<p> No comments to show</p>';
     	}
	}
}


if(!function_exists('show_search_post_error')){

	function show_search_post_error(){
		$CI =& get_instance();

		$CI->load->library('session');

		//$CI->load->library('input');


		   if ($CI->session->flashdata('error')):

					echo "<div class='alert alert-danger'><a class='close' data-dismiss='alert'>×</a><strong>Error: </strong>".$CI->session->flashdata('error')."</div>";

			 endif;
	}
}


if(!function_exists('show_articles')){

	function show_articles($latest_articles=NULL){


		$CI =& get_instance();

		$CI->load->library('pageslib');

		if($latest_articles){

			if(isset($_GET['q'])){

				echo  "<div class='alert alert-success'><a class='close' data-dismiss='alert'>×</a>".count($latest_articles)." post(s) found. for keyword ' <strong>".$_GET['q']."</strong> '</div>";
			}
		}

		foreach($latest_articles as $index):

                echo "<div class=\"well\">";

                echo "<h1><a href=".base_url('article').'/'.$index['slug'].">".$index['title']."</a></h1> ";

                echo "<strong><i class='fa fa-user'></i>  Posted by: ".$CI->pageslib->getAuthorFullName($index['posted_by'])."</strong> <br>";

        		echo "<div>".$index['tags'] !='' ? "<i class='fa fa-tags'></i> Tags: ".$index['tags'].'<br>' : ''."</div> ";

        		echo "<strong><i class='fa fa-calendar'></i> Posted on: ".date('F j,  Y',strtotime($index['date_posted']))."</strong>
                    <br><br>";
                    
				        $content = strip_tags($index['content']);

				        if (strlen($content) > 250) {

				          $stringCut = substr($content, 0, 500);
				          $string_to_replace=".....";
				            $content= substr($stringCut, 0, strrpos($stringCut, ' '))."  ".$string_to_replace;
				            echo "<p style='text-align: justify;'>".strip_tags($content)."</p>";
				         }
       				 
               echo "</div>";

			endforeach;

	}
}

if(!function_exists('show_category_posts')){

	function show_category_posts($category_post){

		$CI =& get_instance();

		$CI->load->library('pageslib');

				foreach($category_post as $index):

                echo "<div class=\"well\">";

                echo "<h1><a href=".base_url('article').'/'.$index['slug'].">".$index['title']."</a></h1> ";

                echo "<strong><i class='fa fa-user'></i>  Posted by: ".$CI->pageslib->getAuthorFullName($index['posted_by'])."</strong> <br>";

        		echo "<div>".$index['tags'] !='' ? "<i class='fa fa-tags'></i> Tags: ".$index['tags'].'<br>' : ''."</div> ";

        		echo "<strong><i class='fa fa-calendar'></i> Posted on: ".date('F j,  Y',strtotime($index['date_posted']))."</strong>
                    <br><br>";
                    
				        $content = strip_tags($index['content']);

				        if (strlen($content) > 250) {

				          $stringCut = substr($content, 0, 500);
				          $string_to_replace=".....";
				            $content= substr($stringCut, 0, strrpos($stringCut, ' '))."  ".$string_to_replace;
				            echo "<p style='text-align: justify;'>".strip_tags($content)."</p>";
				         }
       				 
               echo "</div>";

			endforeach;

			/* Create Pagination Links */

		   echo  "<div style=\"text-align: center;\">";
		   echo "<!-- Create pagination !-->";
		   echo $CI->pagination->create_links(); 
		   echo "</div>";

	}
}

if(!function_exists('latest_posts')){

	function latest_posts($latest_posts){
		foreach($latest_posts as $post):
							echo "<p>";
							echo "<strong style=\"color: blue;\"><a href=".base_url('article').'/'.$post['slug']." class=''><i class='fa fa-thumb-tack'></i> &nbsp;".$post['title']."</a></strong>";
							echo "<small></small>";
							echo "</p>";
			endforeach; 
	}
}

if(!function_exists('show_post')){

	function show_post($post){

		$CI =& get_instance();

		$CI->load->library('pageslib');
		
 foreach($post as $index): 
                echo "<div class=\"well\">";
            	echo "<input type='hidden' id='news_id' name='news_id' value='".$index['postID']."' />";
                echo "<div class=\"social_media_btns\" style=\"text-align: center;\">";
            	echo "<p style=\"text-align: center; font-weight: bold;\"> SHARE POST  </p>";
          		echo "<a title='Share on Facebook' href=\"https://www.facebook.com/sharer/sharer.php?u=".base_url('article').'/'.$index['slug']."?ref=fbs\">"."<i class=\"fa fa-facebook-square fa-2x\" style=\"color:#3b5998;\"></i></a>";

           		echo "<a title='Share on Twitter' href=\"https://twitter.com/home?status=".base_url('article').'/'.$index['slug']."?ref=tws\">"."<i class=\"fa fa-twitter fa-2x\" style=\"color:#337ab7;\"></i></a>";

            	echo "<a title='Share on Google+' href=\"https://plus.google.com/share?url=".base_url('article').'/'.$index['slug']."?ref=gps\">"."<i class=\"fa fa-google-plus-square fa-2x\" style=\"color:red;\"></i></a></div>";
        

                echo "<h1>".$index['title']."</h1>";
                echo "<strong><i class='fa fa-user'></i>  Posted by: ".$CI->pageslib->getAuthorFullName($index['posted_by'])."</strong> <br>";
                echo "<div>".$index['tags'] !='' ? "<i class='fa fa-tags'></i> Tags: ".$index['tags'].'<br>' : ''."</div>";

                echo"<strong><i class='fa fa-calendar'></i> Posted on: ".date('F j,  Y',strtotime($index['date_posted']))."</strong>";
                    
                    echo "<div id=\"full-content\"><br>";
                    echo $index['content'];

                echo "</div></div>";

                
 endforeach;
	
	}

}