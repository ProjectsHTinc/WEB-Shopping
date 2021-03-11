<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customerprofile extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
			$this->load->model('customerprofilemodel');
	}
	public function index()
	{
		$data=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('role_type_id');
			if($user_role=='1' || $user_role=='2'){
				$data['res']=$this->customerprofilemodel->get_all_customer();
				$this->load->view('admin/header',$data);
				$this->load->view('admin/customer/view_customer',$data);
				$this->load->view('admin/footer');
		}else{
			$this->load->view('admin/login');
		}
	}

	public function change_status()
	{
		$data=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('role_type_id');
		if($user_role=='1' || $user_role=='2'){
			 $rw_id= $this->db->escape_str($this->input->post('rw_id'));

			$stat_id=$this->db->escape_str($this->input->post('stat_id'));
			$data=$this->customerprofilemodel->change_status($rw_id,$stat_id,$user_id);
		}else{
			redirect('/');
		}

	}

	public function customer_details()
	{
		$data=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('role_type_id');
			if($user_role=='1' || $user_role=='2'){
				$cus_id=$this->uri->segment(3);
				$data['res_profile']=$this->customerprofilemodel->get_customer_details($cus_id);
				$data['res_address']=$this->customerprofilemodel->get_customer_address_details($cus_id);
				$this->load->view('admin/header',$data);
				$this->load->view('admin/customer/view_customer_details',$data);
				$this->load->view('admin/footer');
		}else{
			$this->load->view('admin/login');
		}
	}


	public function customer_wallet_history()
	{
		$data=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('role_type_id');
			if($user_role=='1' || $user_role=='2'){
				$cus_id=$this->uri->segment(3);
				$data['res_wallet']=$this->customerprofilemodel->get_customer_wallet_history($cus_id);
				$this->load->view('admin/header',$data);
				$this->load->view('admin/customer/customer_wallet_history',$data);
				$this->load->view('admin/footer');
		}else{
			$this->load->view('admin/login');
		}
	}



}
