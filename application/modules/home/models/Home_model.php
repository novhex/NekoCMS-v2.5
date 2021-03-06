<?php
/*
*  NEKO SIMPLE CMS v1.0.3 R1
* @ Developer: Novi
* @ Email: novhz0514@gmail.com
* @ Github: github.com/novhex
* @ Copyright (c) 2015-2016
* @ License MIT
*/
defined('BASEPATH') or exit('Error!');

class Home_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

		public function _getHomeData($table,$params,$limit=NULL,$orderby=NULL){

		$query = $this->db->select('*');
		$query = $this->db->from($table);

		if(is_array($params)){

			foreach($params as $index){
				$query = $this->db->where($index['field'],$index['parameter']);
			}
		 }


		 if($orderby!==NULL){
		 	$query = $this->db->order_by($orderby);
		 }


		 if($limit!==NULL){
		 	$query = $this->db->limit($limit);
		 }

		 $query = $this->db->get();
		 
		 return $query->result_array();


	}

	public function allpost_from_category($parent_category,$offset,$limit){

			    $this->db->where('posts.parent_category',$parent_category);
			    $this->db->where('posts.is_visible',1);
			    $this->db->order_by("posts.postID", "DESC");
			    $query=$this->db->get('posts',$limit,$offset);
			    return $query->result_array();

	}

   
	public function countpost_from_category($parentID){

		        $this->db->from('posts');
		        $this->db->where('posts.parent_category',$parentID);
		        $this->db->where('is_visible',1);
		        $db_results=$this->db->get();
		        $results=$db_results->result();
		        $numrows=$db_results->num_rows();
		        return $numrows;

	}

	public function filter_archives($year_month){
		return $this->db->select('*')->from('posts')->like('posts.date_posted',$year_month)->get()->result_array();
	}
	
	public function getRows($postID = '')
	{
		$this->db->select('postID, title, slug, content, date_posted, posted_by, parent_category');
		$this->db->from('posts');

		if($postID){
			$this->db->where('postID',$postID);
			$query = $this->db->get();
			$result = $query->row_array();
		}else{
			$this->db->order_by('title','ASC');
			$query = $this->db->get();
			$result = $query->result_array();
		}
		return !empty($result)?$result:false;
	}


	public function _getSiteEmail(){

		return $this->db->where('site_info.configID',6)->get('site_info')->row()->configValue;
	}

	public function getArchives(){

		return $this->db->query("SELECT YEAR(date_posted) as YEAR , DATE_FORMAT(date_posted,'%m')as MONTH,COUNT(*)as TOTAL FROM posts GROUP BY YEAR,MONTH ORDER BY DATE_FORMAT(date_posted,'%m') DESC ")->result();
	}

	public function getSiteOwner(){

		return $this->db->where('site_info.configID',3)->get('site_info')->row()->configValue;
	}

	
	public function getArticlesByCategoryId($categoryId, $perPage = 6, $offset = 0) {
		
        $this->db->select('p.postID, p.title, p.content, p.slug, p.date_posted, p.posted_by, p.parent_category, c.category_name as categoryName');
        $this->db->join('categories c', 'c.categ_ID = p.parent_category');
        $this->db->where('p.parent_category', $categoryId);
        $this->db->where('p.is_visible',1);
        $this->db->limit($perPage, $offset);
        $query = $this->db->get('posts p');


        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
	
	public function getArticlePublished($perPage = 5, $offset = 0, $key = null) {

        $this->db->select('p.tags,p.postID, p.title, p.content, p.slug, p.date_posted, p.posted_by, p.parent_category, c.category_name as categoryName');
        $this->db->join('categories c', 'c.categ_ID = p.parent_category');
        $this->db->where('p.is_visible',1);
        $this->db->limit($perPage, $offset);
        if ($key != null) {
            $this->db->like('p.title', $key);
            $this->db->or_like('p.content', $key);
        }
        $query = $this->db->get('posts p');


        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    
    public function getCategoryIdBySlug($slug){
    	return $this->db->select('categ_ID')->from('categories')->where('category_slug',$slug)->get()->row()->categ_ID;
    }
 
	
	public function _getLatest(){
		$query = $this->db->select('*');
		$query = $this->db->from('posts');
		$query = $this->db->order_by('posts.postID','DESC');
		$query = $this->db->where('is_visible',1);
		$query = $this->db->limit(5);
		$query = $this->db->get();

		return $query->result_array();
	}
	
	public function _getLatestComments(){
		$query = $this->db->select('*');
		$query = $this->db->from('article_comments');
		$query = $this->db->join('posts','posts.postID = article_comments.news_id');
		$query = $this->db->order_by('article_comments.c_id','DESC');
		$query = $this->db->limit(5);
		$query = $this->db->get();

		return $query->result_array();
	}
	
	public function _getLatestPosts(){
		$query = $this->db->select('*');
		$query = $this->db->from('posts');
		$query = $this->db->order_by('posts.postID','DESC');
		$query = $this->db->limit(5);
		$query = $this->db->get();

		return $query->result_array();
	}
	
	public function getComments($newsid){
		$query = $this->db->where('article_comments.news_id',$newsid);
		$query = $this->db->where('article_comments.is_approved',1);
		$query = $this->db->get('article_comments');
     
		return $query->result_array();
	}

	public function is_article_published($article_slug){
		return $this->db->where('posts.slug',$article_slug)->get('posts')->row()->is_visible;
	}
   
    public function savecomment($newsID,$name,$email,$date,$comment){
        $data = array(
			'news_id'=>$newsID,
			'name'=>$name,
			'email'=>$email,
			'comment_date'=>$date,
			'comment'=>$comment,
			'is_approved'=>0
        );
        return $this->db->insert('article_comments',$data);
    }

    public function getArticleMetaDesc($article_slug){
    	return $this->db->select('content')->from('posts')->where('posts.slug',$article_slug)->get()->row()->content;
    }
	
	public function getBlogComments(){
        $query = $this->db->join('posts','posts.postID = article_comments.news_id ','INNER');
        $query = $this->db->get('article_comments');
        return $query->result_array();

    }

    public function getBlogCommentbyId($c_id){
		$query = $this->db->join('posts','posts.postID = article_comments.news_id ','INNER');
		$query = $this->db->where('article_comments.c_id',$c_id);
		$query = $this->db->get('article_comments');
		return $query->result_array();

    }
	
	public function getsite_meta_keywords(){

		$query = $this->db->select('configValue');
		$query = $this->db->from('site_info');
		$query = $this->db->where('site_info.configID',4);
		return $this->db->get()->row()->configValue;
	}
	
	public function getsite_meta_description(){

		$query = $this->db->select('configValue');
		$query = $this->db->from('site_info');
		$query = $this->db->where('site_info.configID',2);
		return $this->db->get()->row()->configValue;

	}

	public function get_article_title($slug){
		$query = $this->db->select('title');
		$query = $this->db->from('posts');
		$query = $this->db->where('posts.slug',$slug);
		return $this->db->get()->row()->title;
	}

	public function get_category_name($id){

		$query = $this->db->select('category_name');
		$query = $this->db->from('categories');
		$query = $this->db->where('categories.categ_ID',$id);
		return $this->db->get()->row()->category_name;
	}
	public function getsite_title(){
		
		$query = $this->db->select('configValue');
		$query = $this->db->from('site_info');
		$query = $this->db->where('site_info.configID',1);
		return $this->db->get()->row()->configValue;
	}
	public function getsite_footer(){

		$query = $this->db->select('configValue');
		$query = $this->db->from('site_info');
		$query = $this->db->where('site_info.configID',5);
		return $this->db->get()->row()->configValue;
	}

	public function getsite_owner(){
		$query = $this->db->select('configValue');
		$query = $this->db->from('site_info');
		$query = $this->db->where('site_info.configID',3);
		return $this->db->get()->row()->configValue;
	}
	
	public function signup() {
        $data = array(
            'email' => $this->input->post('email'),
			'date_subscribed' => date('Y-m-d h:i:s'),
        );
        $this->db->insert('newsletter',$data);
    }
	
	public function sendmessage(){
		$data = array(
			'visitor_email' => $this->input->post('email'),
			'body' => $this->input->post('message'),
			'from' => $this->input->post('name'),
			'ip_address' => $this->input->ip_address(),
			'is_read'=> 'N',
			'date_recieved'=>date('Y-m-d h:i:s')
		);
		$this->db->insert('messages', $data);
		return TRUE;  
	}
}