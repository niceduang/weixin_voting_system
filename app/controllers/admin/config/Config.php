<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends MY_Controller {

	/**
	 * 基础配置
	 * 
	 */
	function __construct()
	{
		parent::__construct();
		$this->lang->load('admin/config/config');
		$this->load->model('admin/config/Config_model');
		$this->load->model('admin/menu/Menu_model');
	}
	
	public function index()
	{
		
		$data['base_url'] = $this->config->item('base_url');

		$data['action'] = 'admin/config/config';

		$data['groups'] = $this->Config_model->get_groups();

		//字段->值
		/*======================基础配置==================================*/
		$data['root_upload'] = $this->Config_model->getConfig('root_upload');
		$data['bp_upload_path'] = $this->Config_model->getConfig('bp_upload_path');
		$data['vm_upload_path'] = $this->Config_model->getConfig('vm_upload_path');
		$data['vm_music_upload_path'] = $this->Config_model->getConfig('vm_music_upload_path');
		$data['allow_image_type'] = $this->Config_model->getConfig('allow_image_type');
		$data['bp_image_limit'] = $this->Config_model->getConfig('bp_image_limit');
		$data['default_bp_image_name'] = $this->Config_model->getConfig('default_bp_image_name');
		/*======================全局配置==================================*/
		$data['global_groups'] = $this->Config_model->getConfig('global_groups');
		
		//加载相关类库
		$this->load->helper('form');
	    $this->load->library('form_validation');

	    /**
	    * 设置校验规则
	    */
	    /*======================基础配置==================================*/
	    $this->form_validation->set_rules('root_upload', lang('cl_help_root_upload'), array('trim','required','min_length[1]'));
	    $this->form_validation->set_rules('bp_upload_path', lang('cl_help_bp_upload_path'), array('trim','required','min_length[1]'));
 		$this->form_validation->set_rules('vm_upload_path', lang('cl_help_vm_upload_path'), array('trim','required','min_length[1]'));
 		$this->form_validation->set_rules('allow_image_type', lang('cl_help_allow_image_type'), array('trim','required','min_length[1]'));
 		$this->form_validation->set_rules('vm_music_upload_path', lang('cl_help_vm_music_upload_path'), array('trim','required','min_length[1]'));
 		$this->form_validation->set_rules('bp_image_limit', lang('cl_help_bp_image_limit'), array('trim','required','min_length[1]'));
 		$this->form_validation->set_rules('default_bp_image_name', lang('cl_help_default_bp_image_name'), array('trim','required','min_length[1]'));
 		/*======================全局配置==================================*/
 		$this->form_validation->set_rules('global_groups', lang('cl_help_global_groups'), array('trim','required','min_length[1]'));

		if($this->form_validation->run() === FALSE){
		    	
	        $this->load_view('config/config',$data); 
	    }else{

	    	$this->Config_model->save_config();

	       	$this->session->set_flashdata('success', '【'. lang('cl_success_save') .'】');
	       	
	       	redirect('admin/config/config','refresh');

	    }

	}

	/**
	 * 加载视图
	 *	路径 =>	$path
	 *	数据 => $data
	 */
	private function load_view($path,$data){
		$data['lefts'] = $this->Menu_model->access_the_menu();
		$this->load->view('admin/common/header',$data);
		$this->load->view('admin/common/left',$data);
		$this->load->view('admin/'.$path,$data);
		$this->load->view('admin/common/footer',$data);
	}

}