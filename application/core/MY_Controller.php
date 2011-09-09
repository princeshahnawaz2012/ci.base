<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* The MX_Controller class is autoloaded as required */
class MY_Controller extends MX_Controller
{
    public $data = array();
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function render($type = 'html', $template = null)
    {
        echo Modules::run('display/'.$type.'/index', $this->data, $template);
    }
    
    public function set_region($region, $content)
    {
        $this->data['regions'][$region] = $content;
    }
}