<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('app_admin');
        if(!$this->session->userdata('admin'))
        {
            redirect('login');
        }
	}

    public function index()
    {

    	$data['data'] = $this->app_admin->getMobil();
    	$this->template->admin('admin/isi_datamobil', $data);
    }


	public function tambah_mobil()
	{
		if ($this->input->post('submit', TRUE) == 'Submit') 
		{

			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'jpg|png|jpeg|';
			$config['max_size'] = '2048';
			$config['file_name'] = 'gambar'.date('Y_m_d_H_i_s');

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

	//check gambar
	    if (!$this->upload->do_upload('foto')) {
		   	 	$error = array('error' => $this->upload->display_errors());
		    	$this->session->set_flashdata('error',$error['error']);
		    	redirect(current_url());
		}else {

		};
     //end check gambar

			if ($this->upload->do_upload('foto')) 
			{

				$gbr = $this->upload->data(); 

			//insert

			$this->load->helper('date');

			$mobil = array (
				'nama_mobil' => $this->input->post('nama_mobil', TRUE),
				'id_merek' => $this->input->post('id_merek', TRUE),
				'deskripsi_mobil' => $this->input->post('deskripsi_mobil', TRUE),
				'tahun_mobil' => $this->input->post('tahun_mobil', TRUE),
				'kapasitas_mobil' => $this->input->post('kapasitas_mobil', TRUE),
				'harga_sewa' => $this->input->post('harga_sewa', TRUE),
				'warna_mobil' => $this->input->post('warna_mobil', TRUE),
				'transmisi_mobil' => $this->input->post('transmisi_mobil', TRUE),
				'plat_mobil' => $this->input->post('plat_mobil', TRUE),
				'status_sewa' => $this->input->post('status_sewa', TRUE),
				'gambar' => $gbr['file_name'],
				'status_mobil' => $this->input->post('status_mobil', TRUE),
				'fasilitas_mobil' => $this->input->post('fasilitas_mobil', TRUE),









			);
				$this->db->set('ditambahkan', 'NOW()', FALSE);
				$this->app_admin->insert('tb_mobil', $mobil);

				$this->session->set_flashdata('success', 'Mobil Telah Berhasil di tambahkan');
				redirect(current_url());

			} else {

				$this->session->set_flashdata('alert', 'Cek Kembali Foto Anda !');
				// echo $this->upload->display_errors('<p style="color:#fff">', '</p>');
			}


		}

		$data['nama_mobil'] = $this->input->post('nama_mobil', TRUE);
		$data['merk_mobil'] = $this->input->post('merk_mobil', TRUE);
		$data['kapasitas_mobil'] = $this->input->post('kapasitas_mobil', TRUE);
		$data['warna_mobil'] = $this->input->post('warna_mobil', TRUE);
		$data['tahun_mobil'] = $this->input->post('tahun_mobil', TRUE);
		$data['harga_sewa'] = $this->input->post('harga_sewa', TRUE);
		$data['plat_mobil'] = $this->input->post('plat_mobil', TRUE);
		$data['transmisi_mobil'] = $this->input->post('transmisi_mobil', TRUE);
		$data['status_mobil'] = $this->input->post('status_mobil', TRUE);
		$data['status_sewa'] = $this->input->post('status_sewa', TRUE);
		$data['deskripsi_mobil'] = $this->input->post('deskripsi_mobil', TRUE);
		$data['fasilitas_mobil'] = $this->input->post('fasilitas_mobil', TRUE);

		$data['cek']= $this->app_admin->getAll();
		$data['header_tambahmobil'] = "Tambah Mobil Baru";

		$this->template->admin('admin/form_tambahmobil', $data);
	}
	public function detail($id)
	{
		//$id_mobil = $this->uri->segment(3);

		// // $mobil = $this->app_admin->getIdMobil(array('id_mobil' => $id_mobil));
		// $idmobil = $id;
		$mobil = $this->app_admin->getIdMobil($id);
		foreach ($mobil as $mobs) {
			$data['id_mobil'] = $mobs->id_mobil;
			$data['nama_mobil'] = $mobs->nama_mobil;
			$data['nama_merek'] = $mobs->nama_merek;
			$data['kapasitas_mobil'] = $mobs->kapasitas_mobil;
			$data['warna_mobil'] = $mobs->warna_mobil;
			$data['tahun_mobil'] = $mobs->tahun_mobil;
			$data['harga_sewa'] = $mobs->harga_sewa;
			$data['plat_mobil'] = $mobs->plat_mobil;
			$data['transmisi_mobil'] = $mobs->transmisi_mobil;
			$data['gambar'] = $mobs->gambar;
			$data['status_mobil'] = $mobs->status_mobil;
			$data['status_sewa'] = $mobs->status_sewa;
			$data['deskripsi_mobil'] = $mobs->deskripsi_mobil;
			$data['fasilitas_mobil'] = $mobs->fasilitas_mobil;
		}
		// foreach ($mobil as $tampil) 
		// {
		// 	$data['id_mobil'] = $tampil->id_mobil;
		// 	$data['nama_mobil'] = $tampil->nama_mobil;
		// 	$data['merk_mobil'] = $tampil->nama_merek;
		// 	$data['kapasitas_mobil'] = $tampil->kapasitas_mobil;
		// 	$data['warna_mobil'] = $tampil->warna_mobil;
		// 	$data['tahun_mobil'] = $tampil->tahun_mobil;
		// 	$data['harga_sewa'] = $tampil->harga_sewa;
		// 	$data['plat_mobil'] = $tampil->plat_mobil;
		// 	$data['transmisi_mobil'] = $tampil->transmisi_mobil;
		// 	$data['gambar'] = $tampil->gambar;
		// 	$data['status_mobil'] = $tampil->status_mobil;
		// 	$data['status_sewa'] = $tampil->status_sewa;
		// 	$data['deskripsi_mobil'] = $tampil->deskripsi_mobil;
		// 	$data['fasilitas_mobil'] = $tampil->fasilitas_mobil;
		// }

		$this->template->admin('admin/isi_detailmobil', $data);
	}

	public function update_mobil($id)
	{
		$id_mobil = $this->uri->segment(3);

		if ($this->input->post('submit', TRUE) == 'Submit') 
		{

			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'jpg|png|jpeg|';
			$config['max_size'] = '2048';
			$config['file_name'] = 'gambar'.date('Y_m_d_H_i_s');

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->load->helper('date');


			//insert

			$mobil = array (
				'nama_mobil' => $this->input->post('nama_mobil', TRUE),
				'id_merek' => $this->input->post('id_merek', TRUE),
				'deskripsi_mobil' => $this->input->post('deskripsi_mobil', TRUE),
				'tahun_mobil' => $this->input->post('tahun_mobil', TRUE),
				'kapasitas_mobil' => $this->input->post('kapasitas_mobil', TRUE),
				'harga_sewa' => $this->input->post('harga_sewa', TRUE),
				'warna_mobil' => $this->input->post('warna_mobil', TRUE),
				'transmisi_mobil' => $this->input->post('transmisi_mobil', TRUE),
				'plat_mobil' => $this->input->post('plat_mobil', TRUE),
				'status_sewa' => $this->input->post('status_sewa', TRUE),
				'status_mobil' => $this->input->post('status_mobil', TRUE),
				'fasilitas_mobil' => $this->input->post('fasilitas_mobil',    TRUE),
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

					$gbr = $this->upload->data(); 


					// $this->load->helper("file");
					// delete_files('./assets/upload'.$this->input->post('gambar_lama', TRUE));

					// $path = './assets/upload'.$this->input->post('gambar_lama', TRUE);
					// unlink($path);
					unlink('./assets/upload/'.$this->input->post('gambar_lama', TRUE));
					$mobil['gambar'] = $gbr['file_name'];



				} else {

		  			$this->db->set('last_update', 'NOW()', FALSE);
					$this->app_admin->update('tb_mobil', $mobil, array('id_mobil' => $id_mobil));

					// echo $this->upload->display_errors('<p style="color:#fff">', '</p>');
				}
				

//check gambar

		  $this->db->set('last_update', 'NOW()', FALSE);
		  $this->app_admin->update('tb_mobil', $mobil, array('id_mobil' => $id_mobil));

		  $this->session->set_flashdata('success', 'Data Mobil Telah Berhasil di ubah');
		  redirect(current_url());

		}

		$mobil = $this->app_admin->getIdMobil($id);
		foreach ($mobil as $mobs) {
			$data['id_mobil'] = $mobs->id_mobil;
			$data['nama_mobil'] = $mobs->nama_mobil;
			$data['id_merek'] = $mobs->id_merek;
			$data['kapasitas_mobil'] = $mobs->kapasitas_mobil;
			$data['warna_mobil'] = $mobs->warna_mobil;
			$data['tahun_mobil'] = $mobs->tahun_mobil;
			$data['harga_sewa'] = $mobs->harga_sewa;
			$data['plat_mobil'] = $mobs->plat_mobil;
			$data['transmisi_mobil'] = $mobs->transmisi_mobil;
			$data['gambar'] = $mobs->gambar;
			$data['status_mobil'] = $mobs->status_mobil;
			$data['status_sewa'] = $mobs->status_sewa;
			$data['deskripsi_mobil'] = $mobs->deskripsi_mobil;
			$data['fasilitas_mobil'] = $mobs->fasilitas_mobil;
		}

		$data['header_tambahmobil'] = "Update  Mobil";
		$data['cek']= $this->app_admin->getAll();

		$this->template->admin('admin/form_updatemobil', $data);
	}
	function hapus($id){



		$mobil = $this->app_admin->get_where('tb_mobil', array('id_mobil' => $id_mobil));


		$where = array('id_mobil' => $id);

		foreach ($mobil->result() as $tampil ) {
			# code...

		$data['gambar'] = $tampil->gambar;


		}

		$this->app_admin->hapus_data($where,'tb_mobil');

		unlink('./assets/upload/'.$gambar);


		$this->session->set_flashdata('success' ,'Data Mobil Berhasil di hapus');

		redirect('mobil');
	}

}