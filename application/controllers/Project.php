<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

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
		$data['title']	= 'Proyek';
		$data['projects']  = $this->M_project->get_data()->result_array();
		$this->load->view('project', $data);
	}

	public function save_new_project()
	{
		$data		= $this->input->post(null, true);

		$data_project	= [
			'name_project'			=> $data['name_project'],
			'client'			=> $data['client'],
			'unit'			=> $data['unit'],
			'nilai_project'		=> $data['nilai_project'],
			'status_project'			=> $data['status_project'],
			'description'			=> $data['description'],
			'date_start'		=> $data['date_start'],
			'date_end'			=> $data['date_end'],
			'id_user'			=> $this->session->userdata('id_user'),
			'created_at' => date('Y-m-d H:i:s')
		];

		if ($this->M_project->insert($data_project)) {
			$this->session->set_flashdata('msg', 'error');
			redirect('project');
		} else {
			$judul = "New Project!";
	        $konten = $this->session->userdata('name')." menambahkan Proyek Baru";
	        $url = "http://localhost/sistem-manajemen-proyek/project";
	        $response = $this->send_message($judul, $konten, $url);
			$this->session->set_flashdata('msg', 'success');
			redirect('project');
		}
	}

	public function save_edit_project($id_project)
	{
		$data		= $this->input->post(null, true);
		$data_project	= [
			'id_project'		=> $id_project,
			'name_project'			=> $data['name_project'],
			'client'			=> $data['client'],
			'unit'			=> $data['unit'],
			'nilai_project'		=> $data['nilai_project'],
			'status_project'			=> $data['status_project'],
			'description'			=> $data['description'],
			'date_start'		=> $data['date_start'],
			'date_end'			=> $data['date_end'],
			'id_user'			=> $this->session->userdata('id_user'),
			'created_at' => date('Y-m-d H:i:s')
		];
		
		if ($this->M_project->update($data_project)) {
			$this->session->set_flashdata('msg', 'error');
			redirect('project');
		} else {
			$judul = "Update Project!";
			$konten = $this->session->userdata('name')." mengupdate Proyek ".$data['name_project'];
	        $url = "http://localhost/sistem-manajemen-proyek/detail-project/".$id_project;
	        $response = $this->send_message($judul, $konten, $url);
			$this->session->set_flashdata('msg', 'edit');
			redirect('project');
		}
	}

	public function delete_project($id_project)
	{
		$p = $this->M_project->get_by_id($id_project);
		$this->M_project->delete($id_project);
		$judul = "Update Project!";
		$konten = $this->session->userdata('name')." menghapus Proyek ".$p['name_project'];
        $url = "http://localhost/sistem-manajemen-proyek/project";
        $response = $this->send_message($judul, $konten, $url);
		$this->session->set_flashdata('msg', 'delete');
		redirect('project');
	}

	public function detail_project($id_project)
	{
		$data['title']	= 'Proyek';
		$data['p']  = $this->M_project->get_by_id($id_project);
		$data['planning_activities']  = $this->db->get_where('tb_activity', ['id_project' => $id_project])->result_array();
		$data['realization_activities']  = $this->db->get_where('tb_activity', ['id_project' => $id_project])->result_array();
		$data['p']  = $this->M_project->get_by_id($id_project);
		$this->db->select('*');
		$this->db->from('tb_log_activity');
		$this->db->join('tb_user', 'tb_user.id_user=tb_log_activity.id_user');
		$this->db->where('tb_log_activity.id_project', $id_project);
		$this->db->order_by('tb_log_activity.created_at', 'DESC');
		$data['log_activities'] = $this->db->get()->result_array();
		$data['attachment'] = $this->db->get_where('tb_attachment', ['id_project' => $id_project])->result_array();
		$this->load->view('detail_project', $data);
	}

	public function save_new_activity($id_project)
	{
		$data		= $this->input->post(null, true);

		$data_project	= [
			'id_project'			=> $id_project,
			'name_activity'			=> $data['name_activity'],
			'categories_activity'			=> $data['categories_activity'],
			'bobot'		=> $data['bobot'],
			'budget_planning'		=> $data['budget_planning'],
			'status_activity'			=> 'Open',
			'description'			=> $data['description'],
			'date_start'		=> $data['date_start'],
			'date_plan_end'			=> $data['date_plan_end'],
			'id_user'			=> $this->session->userdata('id_user'),
			'created_at' => date('Y-m-d H:i:s')
		];

		if ($this->M_activity->insert($data_project)) {
			$this->session->set_flashdata('msg', 'error');
			redirect('detail-project/'.$id_project);
		} else {
			$description = $this->session->userdata('name').' menambahkan kegiatan '.$data['name_activity'];
			$mode = 'new';
			$id_user = $this->session->userdata('id_user');
			$data_log = [
				'id_project' => $id_project,
				'id_user'	=> $id_user,
				'description' => $description,
				'mode'	=> $mode,
				'created_at' => date('Y-m-d H:i:s')
			];
			$this->add_log_activity($data_log);
			$this->session->set_flashdata('msg', 'success');
			redirect('detail-project/'.$id_project);
		}
	}

	public function save_edit_activity($id_project, $id_activity)
	{
		$data		= $this->input->post(null, true);

		$data_project	= [
			'id_activity'			=> $id_activity,
			'id_project'			=> $id_project,
			'name_activity'			=> $data['name_activity'],
			'categories_activity'	=> $data['categories_activity'],
			'bobot'					=> $data['bobot'],
			'budget_planning'		=> $data['budget_planning'],
			'status_activity'		=> 'Open',
			'description'			=> $data['description'],
			'date_start'			=> $data['date_start'],
			'date_plan_end'			=> $data['date_plan_end'],
			'id_user'				=> $this->session->userdata('id_user'),
		];

		if ($this->M_activity->update($data_project)) {
			$this->session->set_flashdata('msg', 'error');
			redirect('detail-project/'.$id_project);
		} else {
			$description = $this->session->userdata('name').' mengupdate kegiatan '.$data['name_activity'];
			$mode = 'update';
			$id_user = $this->session->userdata('id_user');
			$data_log = [
				'id_project' => $id_project,
				'id_user'	=> $id_user,
				'description' => $description,
				'mode'	=> $mode,
				'created_at' => date('Y-m-d H:i:s')
			];
			$this->add_log_activity($data_log);
			$this->session->set_flashdata('msg', 'edit');
			redirect('detail-project/'.$id_project);
		}
	}

	public function delete_activity($id_project, $id_activity)
	{
		$a = $this->M_activity->get_by_id($id_activity);
		$this->M_activity->delete($id_activity);

		$description = $this->session->userdata('name').' menghapus kegiatan '.$a['name_activity'];
		$mode = 'delete';
		$id_user = $this->session->userdata('id_user');
		$data_log = [
			'id_project' => $id_project,
			'id_user'	=> $id_user,
			'description' => $description,
			'mode'	=> $mode,
			'created_at' => date('Y-m-d H:i:s')
		];
		$this->add_log_activity($data_log);

		$this->session->set_flashdata('msg', 'delete');
		redirect('detail-project/'.$id_project);
	}

	public function update_status_activity($id_project, $id_activity)
	{
		$data		= $this->input->post(null, true);

		$data_project	= [
			'id_activity'			=> $id_activity,
			'status_activity'		=> $data['status_activity'],
			'date_end'				=> $data['date_end'],
			'id_user'				=> $this->session->userdata('id_user'),
		];

		if ($this->M_activity->update($data_project)) {
			$this->session->set_flashdata('msg', 'error');
			redirect('detail-project/'.$id_project);
		} else {
			$description = $this->session->userdata('name').' mengupdate status kegiatan '.$data['name_activity'].' dari '.$data['status_before'].' ke '.$data['status_activity'];
			$mode = 'update';
			$id_user = $this->session->userdata('id_user');
			$data_log = [
				'id_project' => $id_project,
				'id_user'	=> $id_user,
				'description' => $description,
				'mode'	=> $mode,
				'created_at' => date('Y-m-d H:i:s')
			];
			$this->add_log_activity($data_log);
			$this->count_progress_project($id_project);
			$this->session->set_flashdata('msg', 'edit');
			redirect('detail-project/'.$id_project);
		}
	}

	private function add_log_activity($data_log)
	{
		$judul = "Manajemen Proyek";
		$konten = $data_log['description'];
        $url = "http://localhost/sistem-manajemen-proyek/detail-project/".$data_log['id_project'];
        $response = $this->send_message($judul, $konten, $url);
		$this->db->insert('tb_log_activity', $data_log);
		return true;
	}

	private function count_progress_project($id_project)
	{
		$this->db->select_sum('bobot');
		$this->db->from('tb_activity');
		$this->db->where('id_project', $id_project);
		$this->db->where('status_activity', 'Finish');
		$progress = $this->db->get()->row_array();

		$data_project	= [
			'id_project'		=> $id_project,
			'progress'			=> $progress['bobot'],
		];
		
		$this->M_project->update($data_project);
		return true;
	}

	public function save_new_attachment($id_project)
	{
		$data		= $this->input->post(null, true);
		$file = $this->upload_file();

		$data_project	= [
			'id_project'			=> $id_project,
			'name_activity'			=> $data['name_activity'],
			'description'			=> $data['description'],
			'file'		=> $file,
			'id_user'			=> $this->session->userdata('id_user'),
			'created_at' => date('Y-m-d H:i:s')
		];

		if (!$this->db->insert('tb_attachment', $data_project)) {
			$this->session->set_flashdata('msg', 'error');
			redirect('detail-project/'.$id_project);
		} else {
			$description = $this->session->userdata('name').' menambahkan lampiran '.$data['description'];
			$mode = 'new';
			$id_user = $this->session->userdata('id_user');
			$data_log = [
				'id_project' => $id_project,
				'id_user'	=> $id_user,
				'description' => $description,
				'mode'	=> $mode,
				'created_at' => date('Y-m-d H:i:s')
			];
			$this->add_log_activity($data_log);
			$this->session->set_flashdata('msg', 'success');
			redirect('detail-project/'.$id_project);
		}
	}

	private function upload_file()
	{
	    $config['upload_path'] = './assets/upload/attachment';
	    $config['allowed_types'] = 'pdf|doc|docx';
	    $config['max_size'] = 100000;
	    $this->upload->initialize($config);
	    $this->load->library('upload', $config);

	    if(! $this->upload->do_upload('file'))
	    {
	    	return '';
	    }

	    return $this->upload->data('file_name');
	}

	public function delete_attachment($id_project, $id_attachment)
	{
		$a = $this->db->get_where('tb_attachment', ['id_attachment' => $id_attachment])->row_array();
		$this->db->delete('tb_attachment', ['id_attachment' => $id_attachment]);
		unlink('assets/upload/attachment/'.$a['file']);
		$description = $this->session->userdata('name').' menghapus lampiran '.$a['description'];
		$mode = 'delete';
		$id_user = $this->session->userdata('id_user');
		$data_log = [
			'id_project' => $id_project,
			'id_user'	=> $id_user,
			'description' => $description,
			'mode'	=> $mode,
			'created_at' => date('Y-m-d H:i:s')
		];
		$this->add_log_activity($data_log);

		$this->session->set_flashdata('msg', 'delete');
		redirect('detail-project/'.$id_project);
	}

	public function print_project($id_project)
	{
		$this->load->library('pdf');
		$data['title']		= 'Berita Acara';
		$data['activities']  = $this->db->get_where('tb_activity', ['id_project' => $id_project])->result_array();
		// $data['bap']			= $this->M_fabrikasi->get_bap_by_id($id_bap_fabrikasi);
		// $pch_tgl			= explode('-', date('d-F-Y', strtotime($data['bap']['tanggal_bap'])));
		// $bulan 				= $this->bulan($pch_tgl[1]);
		// $data['tanggal_bap']	= date('d', strtotime($data['bap']['tanggal_bap'])).' '.$bulan.' '.date('Y', strtotime($data['bap']['tanggal_bap']));
		// $pch_tgl			= explode('-', date('d-F-Y', strtotime($data['bap']['tanggal_finish'])));
		// $bulan 				= $this->bulan($pch_tgl[1]);
		// $data['tanggal_finish']	= date('d', strtotime($data['bap']['tanggal_finish'])).' '.$bulan.' '.date('Y', strtotime($data['bap']['tanggal_finish']));
		// $data['bap_detail']	= $this->M_fabrikasi->get_detail_bap($id_bap_fabrikasi)->result_array();
		// $data['jum_bap_detail']	= $this->M_fabrikasi->get_detail_bap($id_bap_fabrikasi)->num_rows();

        //$this->load->view('print_project', $data);

        $html_content = $this->load->view('print_project', $data, true);
        $filename = 'BAPP.pdf';

        $this->pdf->loadHtml($html_content);

        $this->pdf->set_paper('a4','potrait');
        
        $this->pdf->render();
        $this->pdf->stream($filename, ['Attachment' => 1]);
	}

	private function send_message($judul, $konten, $url) {
        $content      = array(
            "en" => $konten
        );
        $heading =array(
            "en" => $judul
        );

        $fields = array(
            'app_id' => "cf9857c1-c107-4bf4-935d-509ab51e06a4",
            'included_segments' => array(
                'All'
            ),
            'contents' => $content,
            'headings' => $heading,
            'url' => $url
        );

        $fields = json_encode($fields);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json; charset=utf-8",
            "Authorization: Basic YjU5Y2U1M2UtMmI5OC00NWJmLWE2ZTktOWExMWUxMDkwMWU3"
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
        curl_setopt($ch, CURLOPT_STDERR, fopen('php://stderr', 'w'));
        
        $response = curl_exec($ch);
        curl_close($ch);
     
        return $response;
    }
}
