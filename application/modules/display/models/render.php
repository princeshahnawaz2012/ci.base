<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Render extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    /**
    * renderiza la página HTML en la vista
    * 
    * @param mixed $content     - contenido de página (view)
    * @param mixed $data        - datos dinámicos
    * @param mixed $template    - selección de plantilla
    */
    public function html($content, $data=null, $template=null, $sidebar = 'none')
    {
        $data['pagina']->seo->title     = BASE_TITLE." | ".$data['pagina']->seo->title;   
        $data['meta_lang']              = $this->site_model->current_lang; 
        $data['meta_gsv']               = GSV;     

        if ( !isset($data['selected_submenu']) ) $data['selected_submenu'] = '';
        
        $data['main_menu']              = $this->site_model->mainMenu($data['selected_menu'], $data['selected_submenu']);
        $data['pagina']->content        = $this->load->view($content.'_view', $data, true);
        
        $data['javascripts'] = $this->javascripts->get();
        $data['stylesheets'] = $this->stylesheet->get();
        
        if ( $sidebar != 'none')
            $data['sidebar'] = $this->load->view('templates/'.$sidebar.'_view', $data, true);
        else
            $data['sidebar'] = '';
        
        $this->load->view('templates/'.$template.'/meta_view', $data);
        $this->load->view('templates/'.$template.'/header_view', $data);
        $this->load->view('templates/'.$template.'/template_view', $data);
        $this->load->view('templates/'.$template.'/footer_view', $data);
    }    
}

/* End of file */
