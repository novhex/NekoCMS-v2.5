<?php
defined('BASEPATH') or exit('Error');

class Zipper{

	public $_zipper;

	public function __construct(){

		$this->_zipper = new ZipArchive();
	}

	public function extract_zip($zip_path,$file_name ='' ){

		$resource = $this->_zipper->open($zip_path);

		if($resource == TRUE){
			$this->_zipper->extractTo(APPPATH.'modules/home/views/tpl/custom-themes/'.$file_name);
			$this->_zipper->close();
			return TRUE;
		}else{
			return FALSE;
		}

	}
}
