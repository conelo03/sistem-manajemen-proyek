<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != TRUE)
		{
			set_pesan('Silahkan login terlebih dahulu', false);
			redirect('');
		}
		date_default_timezone_set("Asia/Jakarta");
		$this->load->library('upload');
	}

	public function index()
	{
		$data['title']	= 'Users';
		$data['users']  = $this->M_user->get_data()->result_array();
		$this->load->view('user', $data);
	}

	public function save_new_user()
	{
		$data		= $this->input->post(null, true);

		if($data['password'] != $data['password_confirm']){
			$this->session->set_flashdata('msg', 'password-salah');
			redirect('user');
		}
		$data_user	= [
			'name'			=> $data['name'],
			'gender'			=> $data['gender'],
			'unit'			=> $data['unit'],
			'username'		=> $data['username'],
			'password'		=> password_hash($data['password'], PASSWORD_DEFAULT),
			'phone'			=> $data['phone'],
			'email'			=> $data['email'],
			'photos'		=> 'avatar.png',
			'role'			=> $data['role'],
		];

		if ($this->M_user->insert($data_user)) {
			$this->session->set_flashdata('msg', 'error');
			redirect('user');
		} else {
			$this->session->set_flashdata('msg', 'success');
			redirect('user');
		}
	}

	public function save_edit_user($id_user)
	{
		$data		= $this->input->post(null, true);
		if(!empty($data['password'])){
			if($data['password'] != $data['password_confirm']){
				$this->session->set_flashdata('msg', 'password-salah');
				redirect('user');
			}
			$data_user	= [
				'id_user'		=> $id_user,
				'name'			=> $data['name'],
				'gender'			=> $data['gender'],
				'unit'			=> $data['unit'],
				'username'		=> $data['username'],
				'password'		=> password_hash($data['password'], PASSWORD_DEFAULT),
				'phone'			=> $data['phone'],
				'email'			=> $data['email'],
				'role'			=> $data['role'],
			];
		} else {
			$data_user	= [
				'id_user'		=> $id_user,
				'name'			=> $data['name'],
				'gender'			=> $data['gender'],
				'unit'			=> $data['unit'],
				'username'		=> $data['username'],
				'phone'			=> $data['phone'],
				'email'			=> $data['email'],
				'role'			=> $data['role'],
			];
		}
		
		if ($this->M_user->update($data_user)) {
			$this->session->set_flashdata('msg', 'error');
			redirect('user');
		} else {
			$this->session->set_flashdata('msg', 'edit');
			redirect('user');
		}
	}

	public function change_photos($id_user)
	{
		$data		= $this->input->post(null, true);
		$photos = $this->upload_photos();

		$data_user	= [
			'id_user'		=> $id_user,
			'photos'			=> $photos,
		];

		if ($this->M_user->update($data_user)) {
			$this->session->set_flashdata('msg', 'error');
			redirect('user');
		} else {
			$this->session->set_flashdata('msg', 'edit');
			redirect('user');
		}

	}

	private function upload_photos()
	{
	    $config['upload_path'] = './assets/img/profile';
	    $config['allowed_types'] = 'jpg|png|jpeg';
	    $config['max_size'] = 10000;
	    $this->upload->initialize($config);
	    $this->load->library('upload', $config);

	    if(! $this->upload->do_upload('photos'))
	    {
	    	return '';
	    }

	    return $this->upload->data('file_name');
	}

	public function delete_user($id_user)
	{
		$this->M_user->delete($id_user);
		$this->session->set_flashdata('msg', 'delete');
		redirect('user');
	}
}
