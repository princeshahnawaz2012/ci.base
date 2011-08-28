<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Html extends MX_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->template->CI = & $this;
    }

    function index($data = null)
    {
        foreach( $this->template->template_regions as $tr )
        {
            $this->template->write_view($tr, 'default/'.$tr, $data );
        }
        
		if ( !is_null($data) )
		{
			foreach( $data['regions'] as $key=>$value)
	        {
	            $this->template->write($key, $value, TRUE);
	        }
		}

        $this->template->render();
    }
}

/* End of file */