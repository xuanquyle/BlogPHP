<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Contact_model','contact_model');
		$this->load->model('Visitor_model','visitor_model');
        $this->visitor_model->count_visitor();
	}
	function index(){
		$site_info = $this->db->get('tbl_site', 1)->row();
		$v['logo'] =  $site_info->site_logo_header;
		$data['icon'] = $site_info->site_favicon;
		$data['header'] = $this->load->view('header',$v,TRUE);
		$data['footer'] = $this->load->view('footer','',TRUE);
		$this->load->view('contact_view',$data);
	}

	function send(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[40]|htmlspecialchars');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'required|min_length[3]|max_length[100]|htmlspecialchars');
		$this->form_validation->set_rules('message', 'Message', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Thông tin nhập vào không hợp lệ!</div>');
			redirect('contact');
		}else{
			$name=$this->input->post('name',TRUE);
			$email=$this->input->post('email',TRUE);
			$subject=$this->input->post('subject',TRUE);
			$message=strip_tags(htmlspecialchars($this->input->post('message',TRUE),ENT_QUOTES));
			$this->contact_model->save_message($name,$email,$subject,$message);
			$this->session->set_flashdata('msg','<div class="alert alert-info">Cảm ơn bạn đã liên hệ với chúng tôi, tin nhắn của bạn sẽ được xử lý ngay lập tức.</div>');
			redirect('contact');
		}
	}
}