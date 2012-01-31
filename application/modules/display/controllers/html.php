<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Html extends MX_Controller 
{
    function __construct()
    {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    function index($data, $template)
    {
        $this->load->library('template');
        $this->load->library('lessc');
        
        $this->template->CI = & $this;   
        if ( $template != 'default' )
            $this->template->set_template($template);     
        
        /* Javascripts */
        if ( isset($data['javascript']) && is_array($data['javascript']))
        {
            foreach($data['javascript'] as $js)
            {
                $this->template->add_js($js);
            }
        }
        
        /* Stylesheets */
        if ( isset($data['stylesheet']) && is_array($data['stylesheet']))
        {
            foreach($data['stylesheet'] as $css)
            {
				if ( strpos($css, ".less") !== FALSE )
				{
					$in_file  = FCPATH."assets/css/".$css;
					$out_file = FCPATH."assets/css/".$css.".css";
					
					if ( filemtime($in_file) > filemtime($out_file) )					
						file_put_contents($out_file, $this->lessc->parse(file_get_contents($in_file)));

					$this->template->add_css($css.".css");
				} else {
					$this->template->add_css($css);
				}
            }
        }    
        
        /* Template Regions */
        foreach( $this->template->template_regions as $tr )
        {             
            $this->template->write_view($tr, $template.'/'.$tr, $data );
        }
        
        /* Dinamic Regions */
        if ( isset($data['regions']) )
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
