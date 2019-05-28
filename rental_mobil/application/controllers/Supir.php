<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supir extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('app_admin');
	}

    public function index()
    {

    	$data['data'] = $this->app_admin->get_all('tb_supir');
    	$this->template->admin('admin/isi_datasupir', $data);
    }


	public function tambah_supir()
	{

if ($this->input->post('submit', TRUE) == 'Submit') 
		{

			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'jpg|png|jpeg|';
			$config['max_size'] = '2048';
			$config['file_name'] = 'foto'.date('Y_m_d_H_i_s');

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

	//check foto
	    if (!$this->upload->do_upload('foto')) {
		   	 	$error = array('error' => $this->upload->display_errors());
		    	$this->session->set_flashdata('error',$error['error']);
		    	redirect(current_url());
		}else {

		};
     //end check foto

			if ($this->upload->do_upload('foto')) 
			{

				$gbr = $this->upload->data(); 

			//insert

			$this->load->helper('date');

			$datauser = array (
				'nama_supir' => $this->input->post('nama_supir', TRUE),
				'nik' => $this->input->post('nik', TRUE),
				'no_ktp' => $this->input->post('no_ktp', TRUE),
				'no_hp' => $this->input->post('no_hp', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
				'umur' => $this->input->post('umur', TRUE),
				'foto' => $gbr['file_name']


			);
				$this->db->set('created', 'NOW()', FALSE);
				$this->app_admin->insert('tb_supir', $datauser);

				$this->session->set_flashdata('success', 'Sopi Telah Berhasil di tambahkan');
				redirect(current_url());

			} else {

				$this->session->set_flashdata('alert', 'Cek Kembali Foto Anda !');
				// echo $this->upload->display_errors('<p style="color:#fff">', '</p>');
			}


		}

				$data['nama_supir'] = $this->input->post('nama_supir', TRUE);
				$data['nik'] = $this->input->post('nik', TRUE);
				$data['no_ktp'] = $this->input->post('no_ktp', TRUE);
				$data['no_hp'] = $this->input->post('no_hp', TRUE);
				$data['jenis_kelamin'] = $this->input->post('jenis_kelamin', TRUE);
				$data['alamat'] = $this->input->post('alamat', TRUE);
				$data['tgl_lahir'] = $this->input->post('tgl_lahir', TRUE);
				$data['umur'] = $this->input->post('umur', TRUE);


		$data['header_tambahsupir'] = "Tambah supir Baru";

		$this->template->admin('admin/form_tambahsupir', $data);
	}

	
	public function detail()
	{
		$id_supir = $this->uri->segment(3);

		$supir = $this->app_admin->get_where('tb_supir', array('id_supir' => $id_supir));

		foreach ($supir->result() as $tampil) 
		{
			$data['id_supir'] = $tampil->id_supir;
			$data['nama_supir'] = $tampil->nama_supir;
			$data['nik'] = $tampil->nik;
			$data['no_ktp'] = $tampil->no_ktp;
			$data['no_hp'] = $tampil->no_hp;
			$data['jenis_kelamin'] = $tampil->jenis_kelamin;
			$data['alamat'] = $tampil->alamat;
			$data['tgl_lahir'] = $tampil->tgl_lahir;
			$data['umur'] = $tampil->umur;
			$data['foto'] = $tampil->foto;
			$data['created'] = $tampil->created;


		}

		$this->template->admin('admin/isi_detailsupir', $data);
	}

	public function update_supir($id)
	{
		$id_supir = $this->uri->segment(3);

		if ($this->input->post('submit', TRUE) == 'Submit') 
		{

			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'jpg|png|jpeg|';
			$config['max_size'] = '2048';
			$config['file_name'] = 'foto'.date('Y_m_d_H_i_s');

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->load->helper('date');


			//insert

			$supir = array (
				'id_supir' => $this->input->post('id_supir', TRUE),
				'nama_supir' => $this->input->post('nama_supir', TRUE),
				'nik' => $this->input->post('nik', TRUE),
				'no_ktp' => $this->input->post('no_ktp', TRUE),
				'no_hp' => $this->input->post('no_hp', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
				'umur' => $this->input->post('umur', TRUE),
				'foto' => $this->input->post('foto', TRUE),				
			);

// //cek gambar apakah kosong ?

// 			if($this->upload->do_upload('foto') == NULL){



// 				$this->app_admin->update('tb_mobil', $mobil, array('id_mobil' => $id_mobil));


// 			}else{
// 				    $error = array('error' => $this->upload->display_errors());
// 				    $this->session->set_flashdata('error',$error['error']);
// 				    redirect(current_url());
// 				};
	//proses upload

				if ($this->upload->do_upload('foto')) 
				{

					$foto = $this->upload->data(); 


					// $this->load->helper("file");
					// delete_files('./assets/upload'.$this->input->post('gambar_lama', TRUE));

					// $path = './assets/upload'.$this->input->post('gambar_lama', TRUE);
					// unlink($path);
					unlink('./assets/upload/'.$this->input->post('gambar_lama', TRUE));
					$supir['foto'] = $foto['file_name'];



				} else {

		  			$this->db->set('last_update', 'NOW()', FALSE);
					$this->app_admin->update('tb_supir', $supir, array('id_supir' => $id_supir));

					// echo $this->upload->display_errors('<p style="color:#fff">', '</p>');
				}
				

//check gambar

		  $this->db->set('last_update', 'NOW()', FALSE);
		  $this->app_admin->update('tb_supir', $supir, array('id_supir' => $id_supir));
		  $this->session->set_flashdata('success', 'Data Mobil Telah Berhasil di ubah');
		  redirect(current_url());

		}

		$supir = $this->app_admin->getIdSupir($id);
		foreach ($supir as $tampil) {
			$data['id_supir'] = $tampil->id_supir;
			$data['nama_supir'] = $tampil->nama_supir;
			$data['nik'] = $tampil->nik;
			$data['no_ktp'] = $tampil->no_ktp;
			$data['no_hp'] = $tampil->no_hp;
			$data['jenis_kelamin'] = $tampil->jenis_kelamin;
			$data['alamat'] = $tampil->alamat;
			$data['tgl_lahir'] = $tampil->tgl_lahir;
			$data['umur'] = $tampil->umur;
			$data['foto'] = $tampil->foto;
		}

		$data['header_updatesupir'] = "Update  Supir";
		$data['cek']= $this->app_admin->getAll();

		$this->template->admin('admin/form_updatesupir', $data);

	}
//hapus data supir
		function hapus($id){


	
			$supir = $this->app_admin->get_where('tb_supir', array('id_supir' => $id_supir));


			$where = array('id_supir' => $id);
	
			foreach ($supir->result() as $tampil ) {
				# code...
	
			$data['gambar'] = $tampil->gambar;
	
	
			}
	
			$this->app_admin->hapus_data($where,'tb_supir');
	
			unlink('./assets/upload/'.$gambar);
	
	
			$this->session->set_flashdata('success' ,'Data Mobil Berhasil di hapus');
	
			redirect('supir');
	}

}