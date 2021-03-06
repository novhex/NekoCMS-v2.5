<?php
defined('BASEPATH') or exit('Error!');


/*
*  NEKO SIMPLE CMS v1.0.3 R1
* @ Developer: Novi
* @ Email: novhz0514@gmail.com
* @ Github: github.com/novhex
* @ Copyright (c) 2015-2016
* @ License MIT
*/
class Admin extends CI_Controller{
	

    private $file ;
	private $dir_path="";
	private $project_url;
	
	public function __construct(){
		# code...
		parent::__construct();
		$this->dir_path='./images/';
		$this->load->library('session');
		$this->load->helper(array('url','adminvalidation','form','download_theme'));
		$this->load->library(array('adminlib','twitterbootstrap','form_validation','session','pagination','htmlfivegraphs'));
		$this->load->model(array('users_model','page_model','category_model','blog_model'));
		
	}
	

	public function index(){

		if($this->session->userdata('site_user')==''){

		$this->form_validation->set_rules(login_validators());
		$this->form_validation->set_error_delimiters("<p style='color:red;'>* ","</p>");

		if($this->form_validation->run()==FALSE){

			$data['page_title'] = 'Dashboard &ndash;Admin Login';
			$data['css_files'] = $this->twitterbootstrap->load_css_files();
			$data['js_files'] = $this->twitterbootstrap->load_js_files();
			$data['message_count']=$this->page_model->unread_message_count();
			$this->load->view('admin_login',$data);
			
		}else{
			$response = $this->users_model->_authenticate($this->input->post('txtusername',TRUE), $this->input->post('txtpassword',TRUE));
			
			if($response==1){
				$this->session->set_userdata('site_user',$this->input->post('txtusername',TRUE));
				$this->session->set_userdata('site_user_role',$this->users_model->_getUserRole($this->input->post('txtusername',TRUE)));
				$this->session->set_userdata('site_user_id',$this->users_model->_getUserID($this->input->post('txtusername',TRUE)));
				$this->users_model->_lastLogged($this->input->post('txtusername',TRUE));
				redirect(base_url('admin/dashboard'));
			}else{
				 $this->session->set_flashdata('auth_error','<p style="color:red;" class="text-center">Invalid Username or Password</p>');
				 redirect(base_url('admin'));
			}
		}
		}else{
			redirect(base_url('admin/dashboard'));
		}

	}



	public function add_category(){

		$this->form_validation->set_rules('page_category','Category Name','trim|required|min_length[4]|max_length[255]|is_unique[categories.category_name]');
		$this->form_validation->set_rules('page_list','Parent Page','trim|required');
		$this->form_validation->set_error_delimiters("<p style='color:red;'>* ","</p>");
		
		if($this->form_validation->run()==FALSE){

			$data['css_files'] = $this->twitterbootstrap->load_css_files();
			$data['js_files'] = $this->twitterbootstrap->load_js_files();
			$data['parent_pages'] = $this->page_model->_getPagesData('pages',NULL);
			$data['message_count']=$this->page_model->unread_message_count();
			$data['page_title'] = 'Dashboard &ndash;Add Category';
			$this->load->view('tpl/head',$data);
			$this->load->view('admin-addcategory');
			$this->load->view('tpl/footer',$data);
		}else{
			$response =$this->category_model->add_category(
				array('category_name'=>ucwords($this->input->post('page_category',TRUE)),
				'category_slug'=>url_title($this->input->post('page_category'), 'dash', TRUE),
				'parent_page'=> $this->input->post('page_list',TRUE)
				));
			if($response){
				$this->session->set_flashdata('addcategory_ok','Category added successfully.');
				redirect(base_url('admin/add-category'));
			}
		}

	}


	public function add_page_category(){

		$this->form_validation->set_rules('page_category_name','Page Category Name','trim|required|max_length[100]|min_length[3]');
		$this->form_validation->set_rules('cb_parentpage','Parent Page','trim|required');
		$this->form_validation->set_error_delimiters("<p style='color:red;'>* ","</p>");

		if($this->form_validation->run()==FALSE){
		
		$data['css_files'] = $this->twitterbootstrap->load_css_files();
		$data['js_files'] = $this->twitterbootstrap->load_js_files();
		$data['message_count']=$this->page_model->unread_message_count();
		$data['page_title'] = 'Dashboard &ndash;Add Page Category';
		$data['parent_pages'] = $this->page_model->_getPagesData('pages',NULL);
		$this->load->view('tpl/head',$data);
		$this->load->view('tpl/navbar');
		$this->load->view('admin_addpagecategory',$data);	
		$this->load->view('tpl/footer',$data);

		}else{

			$response = $this->page_model->add_page_category(
				array(
					'category_slug'=>url_title($this->input->post('page_category_name'), 'dash', TRUE),
					'category_name'=>$this->input->post('page_category_name'),
					'parent_page'=>$this->input->post('cb_parentpage')
					));
			if($response==1){
				$this->session->set_flashdata('addpagecategory_ok','Page Category Successfully Added');
				redirect(base_url('admin/add-page-category'));
			}

		}


	}
	



	public function add_user(){

		$this->form_validation->set_rules(add_username_validators());
		$this->form_validation->set_error_delimiters("<p style='color:red;'>* ","</p>");

		if($this->form_validation->run()==FALSE){

		$data['css_files'] = $this->twitterbootstrap->load_css_files();
		$data['js_files'] = $this->twitterbootstrap->load_js_files();
		$data['message_count']=$this->page_model->unread_message_count();
		$data['page_title'] = 'Dashboard &ndash;Add User';
		$this->load->view('tpl/head',$data);
		$this->load->view('tpl/navbar');
		$this->load->view('admin_adduser',$data);
		$this->load->view('tpl/footer',$data);

	  }else{

	  		$response =  $this->users_model->_addUsersData(

	  			array(
	  				'usrs_username'		=> strtolower($this->input->post('txt_username',TRUE)),
	  				'usrs_full_name'	=> $this->input->post('txt_user_fullname',TRUE),
	  				'usrs_pw'			=> $this->adminlib->hashPassword($this->input->post('txt_user_password',TRUE)),
	  				'usrs_email'		=> strtolower($this->input->post('txt_user_mail',TRUE)),
	  				'usrs_role'			=> $this->input->post('usr_role',TRUE),
	  				'usrs_date_added'	=> date('Y-m-d h:i:s'),
	  				
	  			)
	  		 );

	  		if($response==1){
	  			redirect(base_url('admin/user-list'));
	  		}

	  }
	}





	public function blog_post(){
		
          
           $config['total_rows'] =  $this->blog_model->countpost_from_category($this->session->userdata('site_user_id'),$this->session->userdata('site_user_role'));
			$data['css_files'] = $this->twitterbootstrap->load_css_files();
			$data['js_files'] = $this->twitterbootstrap->load_js_files();
			$data['message_count']=$this->page_model->unread_message_count();
			$data['page_title'] = 'Dashboard &ndash;Blog Post';
			$data['user_posts'] =$this->blog_model->user_blogs($this->session->userdata('site_user_id'),$this->session->userdata('site_user_role'));
			$this->load->view('tpl/head',$data);
			$this->load->view('tpl/navbar');
			$this->load->view('admin-viewpost',$data);
			$this->load->view('tpl/footer',$data);

	}


	public function categories(){

		$data['css_files'] = $this->twitterbootstrap->load_css_files();
		$data['js_files'] = $this->twitterbootstrap->load_js_files();
		$data['message_count']=$this->page_model->unread_message_count();
		$data['page_title'] = 'Dashboard &ndash;Categories';
		$data['categories']= $this->category_model->get_all_categories();
		$this->load->view('tpl/head',$data);
		$this->load->view('tpl/navbar');
		$this->load->view('admin_pagecategories',$data);
		$this->load->view('tpl/footer',$data);

	}
	
	//EDIT CATEGORY 
	public function edit_category($category){

		$this->form_validation->set_rules('txt_category','Page Category','required|min_length[4]|trim|max_length[45]');
		$this->form_validation->set_error_delimiters("<p style='color:red;'>* ","</p>");

		if($this->form_validation->run()===FALSE){
			$data['css_files'] = $this->twitterbootstrap->load_css_files();
			$data['js_files'] = $this->twitterbootstrap->load_js_files();
			$data['message_count']=$this->page_model->unread_message_count();
            $data['page_title'] = 'Dashboard &ndash;Edit Page Category';
			$data['category_to_edit']= $this->category_model->get_category($category);
            $this->load->view('tpl/head',$data);
			$this->load->view('tpl/navbar');
            $this->load->view('admin_edit_category',$data);
            $this->load->view('tpl/footer',$data);
		}
		else{

			$response = $this->category_model->update_category(array('category_name'=>$this->input->post('txt_category',TRUE),'category_slug'=>url_title($this->input->post('txt_category'), 'dash', TRUE)),$category);

			if($response==1){
				redirect(base_url('admin/categories'));
			}

		}
		
	}
	//END



	public function dashboard(){
			
			$data['css_files'] = $this->twitterbootstrap->load_css_files();
			$data['js_files'] = $this->twitterbootstrap->load_js_files();
			$data['subscribed_users']=$this->page_model->total_subscribed_emails();
			$data['total_article']=$this->page_model->total_article_posted();
			$data['message_count']=$this->page_model->unread_message_count();
			$data['page_title'] = 'Dashboard &ndash;Home';
			$this->load->view('tpl/head',$data);
			$this->load->view('tpl/navbar');
			$this->load->view('admin_dashboard',$data);
			$this->load->view('tpl/footer',$data);

	}



	public function edit_blog($slug){

		if($slug === NULL) {
		 redirect(base_url('admin/blog-post')); 
		}else{

			if(sizeof($this->blog_model->get_blog($slug))>0){

			$this->form_validation->set_rules('title','Title','trim|required|min_length[6]|max_length[255]');
			$this->form_validation->set_rules('content','Content','trim|required|min_length[6]');
			$this->form_validation->set_error_delimiters("<p style='color:red;'>* ","</p>");

			if($this->form_validation->run()==FALSE){

			$data['css_files'] = $this->twitterbootstrap->load_css_files();
			$data['js_files'] = $this->twitterbootstrap->load_js_files();
			$data['message_count']=$this->page_model->unread_message_count();
			$data['page_title'] = 'Dashboard &ndash;Edit Blog';
			$data['blog']=$this->blog_model->get_blog($slug);
			$this->load->view('tpl/head',$data);
			$this->load->view('tpl/navbar');
			$this->load->view('admin_editblog',$data);
			$this->load->view('tpl/footer',$data);

		}else{

			$response = $this->blog_model->update_blog(
				array(
					'is_visible'=>$this->input->post('is_visible'),
					'title'=>$this->input->post('title',TRUE),
					'content'=>$this->input->post('content'),
					'slug'=>url_title($this->input->post('title'), 'dash', TRUE),
					'tags'=>$this->input->post('post_tags_hidden_field',TRUE),
					'date_modified'=>date('Y-m-d h:i:s')),
					$slug);

			if($response==1){
				$this->session->set_flashdata('updateblog_ok','Blog successfully updated');
				redirect(base_url('admin/blog-post'));
			}
		}

		}else{
			redirect(base_url('admin/blog-post'));
		}

	 }

	}


		public function edit_page($page){

		$this->form_validation->set_rules('txt_pagetitle','Page Name','required|min_length[4]|trim|max_length[45]');
		$this->form_validation->set_error_delimiters("<p style='color:red;'>* ","</p>");

		if($this->form_validation->run()===FALSE){
			$data['css_files'] = $this->twitterbootstrap->load_css_files();
			$data['js_files'] = $this->twitterbootstrap->load_js_files();
			$data['message_count']=$this->page_model->unread_message_count();
            $data['page_title'] = 'Dashboard &ndash;Edit Page';
			$data['page_to_edit']= $this->page_model->get_page($page);
            $this->load->view('tpl/head',$data);
			$this->load->view('tpl/navbar');
            $this->load->view('admin_edit_page',$data);
            $this->load->view('tpl/footer',$data);
		}
		else{

			$response = $this->page_model->update_page(array('page_name'=>$this->input->post('txt_pagetitle',TRUE),'page_slug'=>url_title($this->input->post('txt_pagetitle'), 'dash', TRUE)),$page);

			if($response==1){
				redirect(base_url('admin/parent-pages'));
			}

		}
		
	}

	public function edit_user($user_id){

		$response =0;

			$validators = array(
				array(
					'label'=>'Full Name',
					'field'=>'txt_user_fullname',
					'rules'=>'trim|required|min_length[2]|max_length[100]'
					),
				
				array(
					'label'=>'Username',
					'field'=>'txt_username',
					'rules'=>'trim|required|min_length[6]|max_length[20]',
					),

				array(
					'label'=>'Email',
					'field'=>'txt_user_mail',
					'rules'=>'trim|required|valid_email',
					)
		);


			if($this->session->userdata('site_user_role')!='admin'){
				if($user_id != $this->session->userdata('site_user_id')){
					echo 'You cannot edit other users account!';
				}else{


			if($this->session->userdata('site_user_role')=='admin'){
				array_push($validators,array(
						'label'=>'User Role',
						'field'=>'usr_role',
						'rules'=>'trim|required',
						));
			}

			if(strlen($this->input->post('txt_user_password'))>0){
				array_push($validators, 
				array(
						'label'=>'Password',
						'field'=>'txt_user_password',
						'rules'=>'trim|required|min_length[6]',
						),

					array(
						'label'=>'Password Confirmation',
						'field'=>'txt_user_password_cf',
						'rules'=>'trim|required|matches[txt_user_password]',
						)
				);
			}	
				$this->form_validation->set_rules($validators);
				$this->form_validation->set_error_delimiters("<p style='color:red;'>* ","</p>");

				if($this->form_validation->run()==FALSE){

					$data['css_files'] = $this->twitterbootstrap->load_css_files();
					$data['js_files'] = $this->twitterbootstrap->load_js_files();
					$data['message_count']=$this->page_model->unread_message_count();
					$data['user_info'] = $this->users_model->_getUsersData('users',array(array('field'=>'usrs_ID','parameter'=>$user_id)));
					$data['page_title'] = 'Dashboard &ndash;Edit User';
					$this->load->view('tpl/head',$data);
					$this->load->view('tpl/navbar');
					$this->load->view('admin_edituser',$data);
					$this->load->view('tpl/footer',$data);
				}else{

				if(strlen($this->input->post('txt_user_password'))>0){

					$response =$this->users_model->_updateUserDetails(
						array(
							'usrs_username'=>$this->input->post('txt_username',TRUE),
							'usrs_full_name'=>$this->input->post('txt_user_fullname',TRUE),
							'usrs_email'=>$this->input->post('txt_user_mail',TRUE),
							'usrs_pw'=>$this->adminlib->hashPassword($this->input->post('txt_user_password',TRUE)),
							'usrs_role'=>$this->session->userdata('site_user_role')
							),
						$user_id
						);
					}else{

					$response =$this->users_model->_updateUserDetails(
						array(
							'usrs_username'=>$this->input->post('txt_username',TRUE),
							'usrs_full_name'=>$this->input->post('txt_user_fullname',TRUE),
							'usrs_email'=>$this->input->post('txt_user_mail',TRUE),
							'usrs_role'=>$this->session->userdata('site_user_role')
							),
						$user_id
						);
					}
				}

			}
		}else{


			if($this->session->userdata('site_user_role')=='admin'){
				array_push($validators,array(
						'label'=>'User Role',
						'field'=>'usr_role',
						'rules'=>'trim|required',
						));
			}

			if(strlen($this->input->post('txt_user_password'))>0){
				array_push($validators, 
				array(
						'label'=>'Password',
						'field'=>'txt_user_password',
						'rules'=>'trim|required|min_length[6]',
						),

					array(
						'label'=>'Password Confirmation',
						'field'=>'txt_user_password_cf',
						'rules'=>'trim|required|matches[txt_user_password]',
						)
				);
			}	
				$this->form_validation->set_rules($validators);
				$this->form_validation->set_error_delimiters("<p style='color:red;'>* ","</p>");

				if($this->form_validation->run()==FALSE){

					$data['css_files'] = $this->twitterbootstrap->load_css_files();
					$data['js_files'] = $this->twitterbootstrap->load_js_files();
					$data['message_count']=$this->page_model->unread_message_count();
					$data['user_info'] = $this->users_model->_getUsersData('users',array(array('field'=>'usrs_ID','parameter'=>$user_id)));
					$data['page_title'] = 'Dashboard &ndash;Edit User';
					$this->load->view('tpl/head',$data);
					$this->load->view('tpl/navbar');
					$this->load->view('admin_edituser',$data);
					$this->load->view('tpl/footer',$data);
				}else{
					
					if(strlen($this->input->post('txt_user_password'))>0){

					$response =$this->users_model->_updateUserDetails(
						array(
							'usrs_username'=>$this->input->post('txt_username',TRUE),
							'usrs_full_name'=>$this->input->post('txt_user_fullname',TRUE),
							'usrs_email'=>$this->input->post('txt_user_mail',TRUE),
							'usrs_pw'=>$this->adminlib->hashPassword($this->input->post('txt_user_password',TRUE)),
							'usrs_role'=>$this->input->post('usr_role',TRUE)
							),
						$user_id
						);
					}else{

					$response = $this->users_model->_updateUserDetails(
						array(
							'usrs_username'=>$this->input->post('txt_username',TRUE),
							'usrs_full_name'=>$this->input->post('txt_user_fullname',TRUE),
							'usrs_email'=>$this->input->post('txt_user_mail',TRUE),
							'usrs_role'=>$this->input->post('usr_role',TRUE)
							),
						$user_id
						);
					}


				}
		}

		if($response==1){
			$this->session->set_flashdata('account_updated','Account successfully updated.');
			redirect(base_url('admin/user-list'));
		}

	}


	public function forbidden_page(){

		$data['css_files'] = $this->twitterbootstrap->load_css_files();
		$data['js_files'] = $this->twitterbootstrap->load_js_files();
		$data['page_title'] = 'Dashboard &ndash;Error 403';
		$this->load->view('admin_forbidden-page',$data);
	}


	public function frontend_themes(){

		$data['css_files'] = $this->twitterbootstrap->load_css_files();
		$data['js_files'] = $this->twitterbootstrap->load_js_files();
		$data['message_count']=$this->page_model->unread_message_count();
		$data['page_title'] = 'Dashboard &ndash;Front End Themes';
		$this->load->view('tpl/head',$data);
		$this->load->view('tpl/navbar');
		$this->load->view('admin_themes',$data);
		$this->load->view('tpl/footer',$data);
	}


	public function logout(){

		$this->session->unset_userdata('site_user');
		$this->session->unset_userdata('site_user_role');
		redirect(base_url('admin'));
	
	}


	public function newsletter_subscribers(){

		$data['css_files'] = $this->twitterbootstrap->load_css_files();
		$data['js_files'] = $this->twitterbootstrap->load_js_files();
		$data['message_count']=$this->page_model->unread_message_count();
		$data['subscribers'] = $this->page_model->_getPagesData('newsletter',NULL);
		$data['page_title'] = 'Dashboard &ndash;Newsletter subscribers';
		$this->load->view('tpl/head',$data);
		$this->load->view('tpl/navbar');
		$this->load->view('admin_newsletter-subscribers',$data);
		$this->load->view('tpl/footer',$data);
	}


	public function parent_pages(){

		$data['css_files'] = $this->twitterbootstrap->load_css_files();
		$data['js_files'] = $this->twitterbootstrap->load_js_files();
		$data['message_count']=$this->page_model->unread_message_count();
		$data['page_title'] = 'Dashboard &ndash;Parent Pages';
		$data['parent_pages'] = $this->page_model->_getPagesData('pages',NULL);
		$this->load->view('tpl/head',$data);
		$this->load->view('tpl/navbar');
		$this->load->view('admin_parent_pages',$data);
		$this->load->view('tpl/footer',$data);

	}

	public function user_list(){

		$data['css_files'] = $this->twitterbootstrap->load_css_files();
		$data['js_files'] = $this->twitterbootstrap->load_js_files();
		$data['message_count']=$this->page_model->unread_message_count();
		$data['page_title'] = 'Dashboard &ndash;User List';
		$data['users']	= $this->users_model->_getUsersData('users',NULL);
		$this->load->view('tpl/head',$data);
		$this->load->view('tpl/navbar');
		$this->load->view('admin_users',$data);
		$this->load->view('tpl/footer',$data);
	}

	public function write_blog(){

		$data['css_files'] = $this->twitterbootstrap->load_css_files();
		$data['js_files'] = $this->twitterbootstrap->load_js_files();
		$data['message_count']=$this->page_model->unread_message_count();
		$data['page_title'] = 'Dashboard &ndash;Write a new post';	
		$data['categories']= $this->category_model->get_all_categories();	

		$this->form_validation->set_rules(add_blog_validators());
		$this->form_validation->set_error_delimiters("<p style='color:red;'>* ","</p>");
		if($this->form_validation->run()==FALSE){
			
			$this->load->view('tpl/head',$data);
			$this->load->view('tpl/navbar');
			$this->load->view('admin_write-blog');
			$this->load->view('tpl/footer',$data);

		}else{
			$response =  $this->blog_model->add_blog(
				array(
					'postID'=>($this->blog_model->get_lastblogId()+1),
					'title'=>$this->input->post('title',TRUE),
					'slug'=>url_title($this->input->post('title'), 'dash', TRUE),
					'date_posted'=>date('Y-m-d h:i:s'),
					'posted_by'=>$this->session->userdata('site_user_id'),
					'parent_category'=>$this->input->post('blog_categ',TRUE),
					'content'=>$this->input->post('content'),
					'is_visible'=>$this->input->post('is_visible'),
					'tags'=>$this->input->post('post_tags_hidden_field',TRUE)
				  )
				);

			if($response==1){
				$this->session->set_flashdata('saveblog_ok','Blog successfully posted');
				redirect(base_url('admin/blog-post'));
			}
		}


	}
	
	public function site_settings(){

		$data['css_files'] = $this->twitterbootstrap->load_css_files();
		$data['js_files'] = $this->twitterbootstrap->load_js_files();
		$data['page_title']='Dashboard &ndash; Site Settings';
		
		$this->form_validation->set_rules('txt_site_owner','Site Owner','required|trim|max_length[45]');
		$this->form_validation->set_rules('txt_site_title','Site Name','required|trim|max_length[45]');
		$this->form_validation->set_rules('site_meta','Site Meta','required|trim|max_length[250]');
		$this->form_validation->set_rules('site_metakw','Site Meta Keywords','required|trim');
		$this->form_validation->set_rules('site_footer','Footer','required|trim|max_length[500]');
		$this->form_validation->set_rules('txt_site_email','Site Email','trim|required|valid_email');
		$this->form_validation->set_error_delimiters("<p style='color:red;'>* ","</p>");
		
		if($this->form_validation->run()===FALSE){

			$data['site_meta']=	$this->users_model->get_site_property('meta_desc');
			$data['site_owner']=$this->users_model->get_site_property('site-owner');
			$data['site_title']=$this->users_model-> get_site_property('site_name');
			$data['site_metakw'] = $this->users_model->get_site_property('meta_keywords');
			$data['footer'] = $this->users_model->get_site_property('site_footer');
			$data['message_count']=$this->page_model->unread_message_count();
			$data['site_email'] =$this->users_model->_getSiteEmail();

			$this->load->view('tpl/head',$data);
			$this->load->view('tpl/navbar');
			$this->load->view('admin_settings', $data);
			$this->load->view('tpl/footer',$data);

		}else{

			$this->users_model->updateSiteDetails(1,$this->input->post('txt_site_title',true));
			$this->users_model->updateSiteDetails(2,$this->input->post('site_meta',true));
			$this->users_model->updateSiteDetails(3,$this->input->post('txt_site_owner',true));
			$this->users_model->updateSiteDetails(4,$this->input->post('site_metakw',true));
			$this->users_model->updateSiteDetails(5,$this->input->post('site_footer',true));
			$this->users_model->updateSiteDetails(6,$this->input->post('txt_site_email',true));

			$this->session->set_flashdata('changes1','Changes has been saved.');
			redirect(base_url().'admin/site-settings');
		}

	}
	

	public function newsletter() {

		$data['css_files'] = $this->twitterbootstrap->load_css_files();
		$data['js_files'] = $this->twitterbootstrap->load_js_files();
		$data['message_count']=$this->page_model->unread_message_count();
		$data['page_title'] = 'Dashboard &ndash;Newsletter';
		$this->load->view('tpl/head',$data);
		$this->load->view('tpl/navbar');
		$this->load->view('admin_newsletter',$data);
		$this->load->view('tpl/footer',$data);
	}
	
	public function send() {

		$this->form_validation->set_rules('subject','Subject','trim|required|max_length[200]|min_length[10]');
		$this->form_validation->set_rules('content','Content','trim|required|max_length[2000]|min_length[10]');
		$this->form_validation->set_error_delimiters("<p style='color:red;'>* ","</p>");

		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('send_subscription_error',validation_errors());
			redirect(base_url('admin/newsletter'));
		}else{
		$subscribers = $this->page_model->get_subscriber_data();
		foreach($subscribers as $subscriber)
    	{
		$this->load->library('email');
        $this->load->helper('typography');

        //Format email content using an HTML file
        $mes = $this->input->post('content');
		$subj = $this->input->post('subject');

        $config['mailtype'] = 'html';
        $this->email->initialize($config);

        $this->email->from($this->users_model->_getSiteEmail(), $this->users_model-> getsite_title().' newsletter');
        $this->email->to($subscriber->email);
        $this->email->subject($subj);
        $this->email->message($mes);

        $this->email->send();
		echo $this->email->print_debugger();
		$this->email->clear();
    }
	
	if($this->email->send())
        {       
            //echo 'Your email was sent.';
			$this->session->set_flashdata('success', 'Newsletterr Sent');
			$this->load->view('admin_newsletter', $data);
        }

		}
	
	}
	
	public function comments () {	

		$data['css_files'] = $this->twitterbootstrap->load_css_files();
		$data['js_files'] = $this->twitterbootstrap->load_js_files();
		$data['message_count']=$this->page_model->unread_message_count();
		$data['page_title'] = 'Dashboard &ndash;Comments';
		$data['comments']=$this->blog_model->getBlogComments();
		$this->load->view('tpl/head',$data);
		$this->load->view('tpl/navbar');
		$this->load->view('admin_comments',$data);
		$this->load->view('tpl/footer',$data);  
	}
	
	public function commentaction(){

		$action = $this->input->post('comment_action');
        $comment_id =$this->input->post('comment_id');
		echo $this->blog_model->comment_action($action,$comment_id);
	}
	

	public function inbox(){

		$data['message_count']=$this->page_model->unread_message_count();
		$data['message_list']=$this->page_model->fetch_unread_messages(10,$offset);
		$data['css_files'] = $this->twitterbootstrap->load_css_files();
		$data['js_files'] = $this->twitterbootstrap->load_js_files();
		$data['page_title'] = 'Dashboard &ndash;Inbox';
		$this->load->view('tpl/head',$data);
		$this->load->view('tpl/navbar');
		$this->load->view('admin_inbox');
		$this->load->view('tpl/footer',$data);
	}
	
	public function showmessage($msgid){

		if(empty($msgid))
		{
			redirect('admin/inbox');
		} else{
			if($this->page_model->viewmsg($msgid)!=NULL){
				$data['msg_content']=$this->page_model->viewmsg($msgid);
				$data['message_count']=$this->page_model->unread_message_count();
				$data['css_files'] = $this->twitterbootstrap->load_css_files();
				$data['js_files'] = $this->twitterbootstrap->load_js_files();
				$data['page_title'] = 'Dashboard &ndash;Inbox';
				$this->load->view('tpl/head',$data);
				$this->load->view('tpl/navbar');
				$this->load->view('admin_viewmessage');
				$this->load->view('tpl/footer',$data);
			}else{
				redirect('admin/inbox');
			}
		}
	}
	
	public function deletemessage($msgid){

		if(!empty($msgid)){
			$this->page_model->delete_message($msgid);
			$this->session->set_flashdata('msgdelete_success','Message Succesfully Deleted');
			redirect(base_url('admin/inbox'));	
		}else{
			redirect(base_url('admin/inbox'));	
		}

	}

	public function upload_theme(){

	$data['js_files'] = $this->twitterbootstrap->load_js_files();
		$this->load->view('admin_upload-theme',$data);
	}


}