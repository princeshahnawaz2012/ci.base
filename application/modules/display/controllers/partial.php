<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partial extends MX_Controller 
{
    function __construct()
    {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    function index($data, $template)
    {
        $this->load->library('template');
        $this->template->CI = & $this;
          
        if ( $template != 'default' )
            $this->template->set_template($template);
          
        $this->template->regions['content']['wrapper'] = NULL;
        $this->template->regions['content']['attributes'] = NULL;
        
        $this->template->write('content', $data['regions']['content'], TRUE);
        
        return $this->template->render('content');
    }
}

/* End of file */
