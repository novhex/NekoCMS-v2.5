<?php

class Htmlfivegraphs {

    private $CI;

	public function __construct(){
        $this->CI = &get_instance();
	}

    public function get_total_views($ref_page){
        $this->CI->load->model('page_model');
        return $this->CI->page_model->total_visitor_by_ref($ref_page);
    }

	public function setLineGraphLabels($labels){
		return "labels: [".implode(",",$labels)."]";
	}
    
	public function setLineGraphDataSets($datasets){
		return " datasets: [
                {
                	label: '',
                    fillColor: 'transparent', 
                    strokeColor: 'rgba(251,146,125,1)',
                    pointColor: 'rgba(0, 155, 111, 77)',
                    pointStrokeColor: '#fff',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                   
                    data: [".implode(",", $datasets)."]
            },
                
        ]";
	}


}