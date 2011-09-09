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
                $this->template->add_css($css);
            }
        }    
        
        /* Template Regions */
        foreach( $this->template->template_regions as $tr )
        {
            if ( $tr == 'sidebar' && !$data['sidebar'])
                continue;
                
            $this->template->write_view($tr, $template.'/'.$tr, $data );
        }
        
        /* Dinamic Regions */
        if ( isset($data['regions']) )
        {
            foreach( $data['regions'] as $key=>$value)
            {
                if ( $key == 'content' && !$data['sidebar'])
                    $this->template->regions['content']['attributes']['class'] = 'nosidebar';
                else if ( $key == 'content' && $data['sidebar'])                
                    $this->template->regions['content']['attributes']['class'] = 'sidebar';

                $this->template->write($key, $value, TRUE);
            }
        }
        $this->template->render();
    }
}

/* End of file */
