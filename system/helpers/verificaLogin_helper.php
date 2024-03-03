<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CI_verificaLogin{

    
	/**
	 * Constructor
	 *
	 * @param	array	$config
	 * @return	void
	 */
	public function __construct($config = array())
	{
		empty($config) OR $this->initialize($config, FALSE);

		$this->_mimes =& get_mimes();
		$this->_CI =& get_instance();

		log_message('info', 'Upload Class Initialized');
    }
    
    function verificar(){
        if($_SESSION('Logado')){
            redirect('new_page');
        }else{
            redirect('home');
        }
    }


}
