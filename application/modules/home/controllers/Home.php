<?php
/*
*  NEKO SIMPLE CMS v1.0.3 R1
* @ Developer: Novi
* @ Email: novhz0514@gmail.com
* @ Github: github.com/novhex
* @ Copyright (c) 2015-2016
* @ License MIT
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $theme;
  	private $str_output;

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('url','text','front_end'));
        $this->load->library(array('session','pagination','twitterbootstrap','form_validation','pageslib','themelib'));
        $this->load->model(array('home_model'));


        //Set Default theme. currently the theme selection is disabled

        if($this->themelib->is_custom_theme_activated()=='Yes'){
          $this->theme = $this->themelib->get_custom_theme_path();
        }else{
          $this->theme = '';
        }


    }

    public function index() {
		//get articles ## Search
		
        $config['base_url'] = base_url() . 'home/index/';
        $config['total_rows'] =$this->home_model->getRows();
        $config['per_page'] = 5;
        $config['use_page_numbers'] = TRUE ;
        $config['prev_link'] = '&laquo;';
        $config['next_link'] = '&raquo;';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['uri_segment'] = 3;
		$this->pagination->initialize($config);

		if ($this->input->get('q')) {
            $data['latest_articles'] = $this->home_model->getArticlePublished($config['per_page'], $this->uri->segment(3), $this->input->get('q'));
            if (empty($data['latest_articles'])) {
                $this->session->set_flashdata('error', 'Sorry, we could not find any article(s)');
                redirect(base_url());
            }
        } else {
            $data['latest_articles']=$this->home_model->_getLatest($config['per_page'], $this->uri->segment(3));
        }
			

		
        $data['css_files']=$this->twitterbootstrap->load_css_files();
        $data['js_files']=$this->twitterbootstrap->load_js_files();
        $data['pages'] = $this->home_model->_getHomeData('pages',NULL);
        $data['page_title']='Home';
		$data['site_desc'] = $this->home_model->getsite_meta_description();
		$data['site_keywords'] =$this->home_model->getsite_meta_keywords();
		$data['site_title']=$this->home_model->getsite_title();
		$data['site_owner']=$this->home_model->getsite_owner();
		$data['footer'] =$this->home_model->getsite_footer();
		$data['latest_comments']=$this->home_model->_getLatestComments();
		$data['latest_posts']=$this->home_model->_getLatestPosts();
		$data['archives'] = $this->home_model->getArchives();

		if($this->theme ===''){

		$this->load->view('tpl/'.$this->theme.'head',$data);
        $this->load->view('tpl/'.$this->theme.'navbar',$data);
        $this->load->view('home',$data);
        $this->load->view('tpl/'.$this->theme.'footer',$data);

		}else{

		$this->load->view('tpl/'.$this->theme.'head',$data);
        $this->load->view('tpl/'.$this->theme.'navbar',$data);
        $this->load->view('tpl/'.$this->theme.'home',$data);
        $this->load->view('tpl/'.$this->theme.'footer',$data);

		}

		
    }

    public function archives($year_month,$offset = 0){

    	  $year_month = str_replace("_", "-", $year_month);


    }

	public function article($slug){

		$slug = str_replace("_","-",$slug);
		$datasize =$this->home_model->_getHomeData('posts',array(array('field'=>'slug','parameter'=>$slug)));
		$is_published = $this->home_model->is_article_published($slug);
		

		if(sizeof($datasize)>0 && $is_published==1){

		$this->form_validation->set_rules('name','Name','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('email','Email Address','trim|required|valid_email');
        $this->form_validation->set_rules('comment','Comment','trim|required|min_length[2]|max_length[500]');
        $this->form_validation->set_error_delimiters("<p style='color:red;'>* ","</p>");
		
		if($this->form_validation->run()==FALSE){
        	

			$data['css_files']=$this->twitterbootstrap->load_css_files();
			$data['js_files']=$this->twitterbootstrap->load_js_files();
			$data['pages'] =$this->home_model->_getHomeData('pages',NULL);
			$data['post']=$this->home_model->_getHomeData('posts',array(array('field'=>'slug','parameter'=>$slug)));
			$data['page_title']='Category Posts';
			$data['article_title']=$this->home_model->get_article_title($slug);
			$data['site_title']=$this->home_model->getsite_title();
			$data['site_desc'] = word_limiter(strip_tags($this->pageslib->generateArticleDescription($slug)),155);
			$data['site_keywords'] =$this->home_model->getsite_meta_keywords();
			$data['footer'] =$this->home_model->getsite_footer();
			$data['site_orig_desc'] = $this->home_model->getsite_meta_description();
			$data['site_owner']=$this->home_model->getsite_owner();
			$data['latest_comments']=$this->home_model->_getLatestComments();
		    $data['latest_posts']=$this->home_model->_getLatestPosts();
		    $data['archives'] = $this->home_model->getArchives();
			if($this->theme ===''){

			$this->load->view('tpl/'.$this->theme.'head_article',$data);
	        $this->load->view('tpl/'.$this->theme.'navbar',$data);
	        $this->load->view('article',$data);
	        $this->load->view('tpl/'.$this->theme.'footer',$data);

			}else{

			$this->load->view('tpl/'.$this->theme.'head_article',$data);
	        $this->load->view('tpl/'.$this->theme.'navbar',$data);
	        $this->load->view('tpl/'.$this->theme.'article',$data);
	        $this->load->view('tpl/'.$this->theme.'footer',$data);

			}
		
		}
		else
		{	
			if($this->session->userdata('site_user')==''){
			$response = $this->home_model->savecomment($this->input->post('news_id'),
            $this->input->post('name'),$this->input->post('email'),date('Y-m-d h:i:s'),$this->input->post('comment'),0);	
			}

			if($this->session->userdata('site_user')!=''){
			$response = $this->home_model->savecomment($this->input->post('news_id'),
            $this->input->post('name'),$this->input->post('email'),date('Y-m-d h:i:s'),$this->input->post('comment'),1);	
			}
			

            if($response==1){
				$this->session->set_flashdata('comment_submitted','Your comment has been submitted and waiting for moderation.');
				redirect(base_url('article').'/'.$slug);
            }

		}
	 }else{
	 	redirect(base_url('page-not-found'));

	 }
	 
	}
   
 
    public function category($parent_category=NULL,$offset=0){

        if($parent_category!=NULL){

           $parent_category = str_replace("_", "-", $parent_category);
           $uri_segment = 3;
           $config['base_url'] = base_url('category').'/'.$parent_category;
           $config['total_rows'] =$this->home_model->countpost_from_category($this->home_model->getCategoryIdBySlug($parent_category));
           $config['per_page'] = 5;
           $config['use_page_numbers'] = TRUE ;
           $config['prev_link'] = '&laquo;';
           $config['next_link'] = '&raquo;';
           $config['full_tag_open'] = '<ul class="pagination">';
           $config['full_tag_close'] = '</ul>';
           $config['prev_link'] = '&laquo;';
           $config['prev_tag_open'] = '<li>';
           $config['prev_tag_close'] = '</li>';
           $config['next_tag_open'] = '<li>';
           $config['next_tag_close'] = '</li>';
           $config['cur_tag_open'] = '<li class="active"><a href="#">';
           $config['cur_tag_close'] = '</a></li>';
           $config['num_tag_open'] = '<li>';
           $config['num_tag_close'] = '</li>';
           $config['uri_segment'] = $uri_segment;
           $this->pagination->initialize($config);
           $data['categ_posts']=$this->home_model->allpost_from_category($this->home_model->getCategoryIdBySlug($parent_category),$offset,5);
           $data['css_files']=$this->twitterbootstrap->load_css_files();
           $data['js_files']=$this->twitterbootstrap->load_js_files();
           $data['pages'] =$this->home_model->_getHomeData('pages',NULL);
           $data['page_title']='Category Posts';
           $data['category_name']=$this->home_model->get_category_name($this->home_model->getCategoryIdBySlug($parent_category));
           $data['site_title']=$this->home_model->getsite_title();
           $data['site_owner']=$this->home_model->getsite_owner();
		   $data['site_desc'] = $this->home_model->getsite_meta_description();
		   $data['site_keywords'] =$this->home_model->getsite_meta_keywords();
		   $data['footer'] =$this->home_model->getsite_footer();
		   $data['latest_comments']=$this->home_model->_getLatestComments();
		   $data['latest_posts']=$this->home_model->_getLatestPosts();
		   $data['archives'] = $this->home_model->getArchives();


		   //if invalid or empty result for slug handler
			if(sizeof($data['categ_posts'])==0){
			   	redirect('/');
			 }

			if($this->theme ===''){

			$this->load->view('tpl/'.$this->theme.'head_categories',$data);
	        $this->load->view('tpl/'.$this->theme.'navbar',$data);
	        $this->load->view('category-post',$data);
	        $this->load->view('tpl/'.$this->theme.'footer',$data);

			}else{

			$this->load->view('tpl/'.$this->theme.'head_categories',$data);
	        $this->load->view('tpl/'.$this->theme.'navbar',$data);
	        $this->load->view('tpl/'.$this->theme.'category-post',$data);
	        $this->load->view('tpl/'.$this->theme.'footer',$data);

			}

        }else{
            show_404();
            exit();
        }

    }
	
	public function subscribe() {
        $this->load->library('email');
		// field name, error message, validation rules
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[newsletter.email]');
		$this->form_validation->set_message('is_unique', '%s is already subscribed. Provide different email');
		$this->form_validation->set_error_delimiters("<p style='color:red;'>* ","</p>");
		
		if($this->form_validation->run() == TRUE)
		{	
			$this->home_model->signup();
			$message = 'You have successfully sign up to our newsletter. Thanks. -Webmaster';
			$email = $this->input->post('email');
			$this->email->From($this->home_model->_getSiteEmail(), $this->home_model->getSiteOwner().' Admin');
			$this->email->To($email);		
			$this->email->Subject('Newsletter Signup Confirmation');		
			$this->email->message($message);
			$this->email->send();
			echo $this->email->print_debugger();
			$this->email->clear();
			
			$this->session->set_flashdata('success', '<div class="text-success text-center" role="alert">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Success:</span>
			You have successfully sign up to our newsletter. 
			</div>');
			redirect('home');
			
			if($this->email->send())
			{
				
				$this->session->set_flashdata('success', 'You have successfully sign up to our newsletter.');
				redirect('home');
			}	
        }
		else
		{
			$this->session->set_flashdata('error', 'Please enter your email and try again');
			redirect('home');
		}
		
		$data['css_files']=$this->twitterbootstrap->load_css_files();
        $data['js_files']=$this->twitterbootstrap->load_js_files();
        $data['pages'] = $this->home_model->_getHomeData('pages',NULL);
        $data['page_title']='Home';
        $data['site_title']=$this->home_model->getsite_title();
		$data['site_desc'] = $this->home_model->getsite_meta_description();
		$data['site_keywords'] =$this->home_model->getsite_meta_keywords();
		$data['footer'] =$this->home_model->getsite_footer();
		$data['latest_comments']=$this->home_model->_getLatestComments();
		$data['latest_posts']=$this->home_model->_getLatestPosts();
		$this->home_model->signup();

		if($this->theme ===''){

		$this->load->view('tpl/'.$this->theme.'head',$data);
        $this->load->view('tpl/'.$this->theme.'navbar',$data);
        $this->load->view('home',$data);
        $this->load->view('tpl/'.$this->theme.'footer',$data);

		}else{

		$this->load->view('tpl/'.$this->theme.'head',$data);
        $this->load->view('tpl/'.$this->theme.'navbar',$data);
        $this->load->view('tpl/'.$this->theme.'home',$data);
        $this->load->view('tpl/'.$this->theme.'footer',$data);

		}
	}
	
	public function contactus() {
        $this->form_validation->set_rules('name','Name','required|max_length[45]|trim');
        $this->form_validation->set_rules('email','Email Address','required|trim|valid_email');
        $this->form_validation->set_rules('message','Message','required|trim|max_length[160]');
        $this->form_validation->set_error_delimiters("<p style='color:red;'>&ndash; ","</p>");

        if ($this->form_validation->run() === FALSE)
        {	$data['site_owner']=$this->home_model->getsite_owner();
		    $data['css_files']=$this->twitterbootstrap->load_css_files();
			$data['js_files']=$this->twitterbootstrap->load_js_files();
			$data['pages'] = $this->home_model->_getHomeData('pages',NULL);
			$data['page_title']='Contact Us';
			$data['site_title']=$this->home_model->getsite_title();
			$data['site_desc'] = $this->home_model->getsite_meta_description();
			$data['site_keywords'] =$this->home_model->getsite_meta_keywords();
			$data['footer'] =$this->home_model->getsite_footer();
			$data['latest_comments']=$this->home_model->_getLatestComments();
			$data['latest_posts']=$this->home_model->_getLatestPosts();
		
			if($this->theme ===''){

			$this->load->view('tpl/'.$this->theme.'head',$data);
	        $this->load->view('tpl/'.$this->theme.'navbar',$data);
	        $this->load->view('contact',$data);
	        $this->load->view('tpl/'.$this->theme.'footer',$data);

			}else{

			$this->load->view('tpl/'.$this->theme.'head',$data);
	        $this->load->view('tpl/'.$this->theme.'navbar',$data);
	        $this->load->view('tpl/'.$this->theme.'contact',$data);
	        $this->load->view('tpl/'.$this->theme.'footer',$data);

			}


        }else {
			if($this->home_model->sendmessage()===TRUE){
                $this->session->set_flashdata('form_submission_success','Message successfully Sent');
                redirect('contact-us');
			}else{
				$this->session->set_flashdata('form_submission_error','Sorry, your message cannot be send.');
				redirect('contact-us');
			}
        }
	}

		public function loadcomments(){
		 
		if($this->input->is_ajax_request()){

		if($this->input->post('newsID')!=''){
		$news_id = $this->input->post('newsID');
		
		$data=$this->home_model->getComments($news_id);
		$i = 1;
		foreach($data as $html_output):
					$this->str_output="<div class=\"panel panel-default\">";
					$this->str_output.="<div class=\"panel-heading\"><i class='fa fa-comments'></i> Comment by ".$html_output['name']." on ".date('F  j, Y',strtotime($html_output['comment_date']))."</div>";
					$this->str_output.=" <div class=\"panel-body\">";
					$this->str_output.="<p>".$html_output['comment']."</p>";
					$this->str_output.="</div></div>";

					echo $this->str_output;


		endforeach;

		}else{
			redirect(base_url());
		}
		
	}

	}

	public function writesmap(){

		if($this->input->is_ajax_request()){
		
			if($this->session->userdata('site_user')!='' && $this->input->post('sitemap_update')=='yes' ){
		
			$urlsets = "";
			$xmlstr_start ="<?xml version=\"1.0\" encoding=\"UTF-8\"?>
		<urlset
	      xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"
	      xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"
	      xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9
	            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">\n\n\n <url>\n<loc>".base_url()."</loc></url>\n\n\n ";

	        $categories = $this->home_model->_getHomeData('categories',NULL);
	        $posts = $this->home_model->_getHomeData('posts',NULL);

	        foreach($categories as $i){
	        	$urlsets.="<url>\n<loc>".base_url()."category/".$i['category_slug']."</loc>\n</url>\n\n\n";
	        }

	        foreach ($posts as $v) {
	        	$urlsets.="<url>\n<loc>".base_url()."article/".$v['slug']."</loc>\n</url>\n\n\n";
	        }

	      $xmlstr_end = "</urlset>";

			$sitemap_file = fopen("sitemap.xml", "w") or die("Unable to open file!");
			fwrite($sitemap_file, $xmlstr_start);
			fwrite($sitemap_file, $urlsets);
			fwrite($sitemap_file, $xmlstr_end);
			fclose($sitemap_file);

		 }

		}else{
			show_404();
		}

	}
} 
