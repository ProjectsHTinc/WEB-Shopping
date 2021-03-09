<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promomaster extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('promomodel');

	}
	public function index()
	{
		$data=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('role_type_id');
			if($user_role=='1' || $user_role=='2'){
			 	$data['res_promocodes']=$this->promomodel->get_all_promocodes();
				$this->load->view('admin/header',$data);
				$this->load->view('admin/promo/create_promo',$data);
				$this->load->view('admin/footer');
		}else{
			$this->load->view('admin/login');
		}
	}

	public function create_promo()
	{
		$data=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('role_type_id');
		if($user_role=='1' || $user_role=='2'){
			$promo_title= $this->db->escape_str($this->input->post('promo_title'));
			$promo_code= $this->db->escape_str($this->input->post('promo_code'));
			$offer_percentage= $this->db->escape_str($this->input->post('offer_percentage'));
			$promo_description= $this->db->escape_str($this->input->post('promo_description'));
			$offer_status= $this->db->escape_str($this->input->post('offer_status'));
						
				$data=$this->promomodel->create_promo($promo_title,$promo_code,$offer_percentage,$promo_description,$offer_status,$user_id);
				if($data['status']=="success"){
						$this->session->set_flashdata('msg', 'Promo Code Created Successfully');
						redirect('admin/promo#view');
				}else{
						$this->session->set_flashdata('msg', 'Failed to create');
						redirect('admin/promo#view');
				}
		}else{
			redirect('/');
		}
	}

	

	public function check_promo_code(){
		$data=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('role_type_id');
		
		$promo_code= $this->db->escape_str($this->input->post('promo_code'));
		$data=$this->promomodel->check_promo_code($promo_code,$user_id);
	}
	
	
	public function check_promo_code_exist(){
		$data=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('role_type_id');
		
		$promo_id=$this->uri->segment(3);
		$promo_code= $this->db->escape_str($this->input->post('promo_code'));
		$data=$this->promomodel->check_promo_code_exist($promo_id,$promo_code,$user_id);
	}

	public function edit_promo()
	{
		$data=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('role_type_id');
			if($user_role=='1' || $user_role=='2'){
				$promo_id=$this->uri->segment(3);
				
			 	$data['res_promocode']=$this->promomodel->get_promocode($promo_id);

				$this->load->view('admin/header',$data);
				$this->load->view('admin/promo/edit_promo',$data);
				$this->load->view('admin/footer');
		}else{
			$this->load->view('admin/login');
		}
	}
	
	public function update_promo()
	{
		$data=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('role_type_id');
		if($user_role=='1' || $user_role=='2'){
			
			$promo_id = $this->db->escape_str($this->input->post('promo_id'));
			$promo_title= $this->db->escape_str($this->input->post('promo_title'));
			$promo_code= $this->db->escape_str($this->input->post('promo_code'));
			$offer_percentage= $this->db->escape_str($this->input->post('offer_percentage'));
			$promo_description= $this->db->escape_str($this->input->post('promo_description'));
			$offer_status= $this->db->escape_str($this->input->post('offer_status'));
			
			
			$data=$this->promomodel->update_promo($promo_id,$promo_title,$promo_code,$offer_percentage,$promo_description,$offer_status,$user_id);
		if($data['status']=="success"){
				$this->session->set_flashdata('msg', 'Offer Updated Successfully');
				redirect('admin/promo#view');
		}else{
			$this->session->set_flashdata('msg', 'Failed to create');
			redirect('admin/promo#view');
		}
		}else{
			redirect('/');
		}
	}



}
