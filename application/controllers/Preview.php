<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preview extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->helper('tgl_indo');
        $this->load->helper(array('url','download'));	
        $this->load->model('Tryout_model');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function sertif($slug)
	{
		if($this->db->where('slug', $slug)->get('kelas_sertif')->num_rows() > 0)
		{
			if(!get_cookie('email_regis')){ 
				$data['slug'] = $slug;
				$data['kelas'] = $this->db->where('slug', $slug)->get('kelas_sertif')->row();
				$this->load->view('landing/regis', $data);
			}else{
				$kelas_sertif = $this->db->where('slug', $slug)->get('kelas_sertif')->row();
				$email = get_cookie('email_regis');
				$id_kelas = $kelas_sertif->id;
				$cek = $this->Tryout_model->cek_user($email, $id_kelas);
				if($cek > 0){
					redirect(site_url('regis/status/'.$slug));
				}else{
					// setcookie("email_regis", "", time()-3600, "/");
					// setcookie("kelas_regis", "", time()-3600, "/");
					// redirect(site_url('regis/sertif/'.$slug));
					$data['slug'] = $slug;
					$data['kelas'] = $this->db->where('slug', $slug)->get('kelas_sertif')->row();
					$this->load->view('landing/regis', $data);
				}
			}
		}else{
			$this->load->view('welcome_message');
		}
	}

	public function status($slug)
	{
		$kelas_sertif = $this->db->where('slug', $slug)->get('kelas_sertif')->row();
		$email = get_cookie('email_regis');
		$id_kelas = $kelas_sertif->id;
		$cek = $this->Tryout_model->cek_user($email, $id_kelas);
		if($cek > 0){

			$regis = $this->db->where('email', $email)->where('id_kelas_sertif', $id_kelas)->get('regis_sertif')->row();
			$kelas = $this->db->where('slug', $slug)->get('kelas_sertif')->row();
			// Midtrans start
			// Midtrans end
            $panitia = explode("|", $kelas->panitia);
			$data = array(
				'kelas' => $kelas,
				'user_regis' => $regis,
				'nama_panitia' => $panitia[0],
				'wa_panitia' => $panitia[1],
			);
			$this->load->view('landing/status', $data);
		}else{
			// setcookie('email_regis', '', time()-3000000);
			// setcookie("email_regis", "", time()-3600, "/");
			// setcookie("kelas_regis", "", time()-3600, "/");
			redirect(site_url('regis/sertif/'.$slug));
		}
	}

	public function tryout($slug)
	{
		$kelas_sertif = $this->db->where('slug', $slug)->get('kelas_sertif')->row();
		$email = get_cookie('email_regis');
		$id_kelas = $kelas_sertif->id;
		$cek = $this->Tryout_model->cek_user($email, $id_kelas);
		if($cek > 0){
			$regis = $this->db->where('email', $email)->where('id_kelas_sertif', $id_kelas)->get('regis_sertif')->row();
			$cek_tryout = $this->Tryout_model->cek_tryout($id_kelas, $regis->id);
			if($cek_tryout > 0){
				$kelas = $this->db->where('slug', $slug)->get('kelas_sertif')->row();
				$soal_sb = $this->Tryout_model->get_soal('sb', $regis->id, $kelas_sertif->id);
				$soal_pg = $this->Tryout_model->get_soal('pg', $regis->id, $kelas_sertif->id);
				$soal_pgsk = $this->Tryout_model->get_soal('pgsk', $regis->id, $kelas_sertif->id);
				$data = array(
					'kelas' => $kelas,
					'user_regis' => $regis,
					'slug' => $slug,
					'soal_sb' => $soal_sb,
					'soal_pg' => $soal_pg,
					'soal_pgsk' => $soal_pgsk,
					'nilai_sb' => $this->Tryout_model->get_nilai_sb($regis->id),
					'nilai_pg' => $this->Tryout_model->get_nilai_pg($regis->id),
					'nilai_pgsk' => $this->Tryout_model->get_nilai_pgsk($regis->id),
					// 'soal_start' => $soal->id,
				);
				$this->load->view('landing/preview/tryout', $data);
			}else{
				redirect(site_url('regis/tryout/'.$slug));
			}
		}else{
			redirect(site_url('regis/sertif/'.$slug));
		}
	}

	public function test_query()
	{
	        $this->res['success'] = true;
			$this->res['msg'] = 'Berhasil';

	    echo json_encode($this->res);
	}

	public function start_tryout($id_kelas)
	{
		$email = get_cookie('email_regis');
		$regis = $this->db->where('email', $email)->where('id_kelas_sertif', $id_kelas)->get('regis_sertif')->row();
		$cek = $this->db->where('id_kelas_sertif', $id_kelas)->where('id_user', $regis->id)->get('tryout')->num_rows();
		if($cek > 1){
			$this->res['success'] = false;
			$this->res['msg'] = 'Anda sudah 2 kali mengikuti Try Out';
		}else{
			$end_date = $this->db->query('select DATE_ADD(NOW(), INTERVAL 2 HOUR) AS end_date')->row();
			$data = array(
				'id_kelas_sertif' => $id_kelas,
				'id_user' => $regis->id,
				'end_date' => $end_date->end_date,
			);
			$insert = $this->db->insert('tryout', $data);
			if($insert){
				$this->res['success'] = true;
				$this->res['msg'] = 'Selamat Mengerjakan';
			}else{
				$this->res['success'] = false;
				$this->res['msg'] = 'Gagal';
			}
		}
	    echo json_encode($this->res);
	}

	public function soal_sb($slug, $id_soal, $no_soal)
	{
		$kelas_sertif = $this->db->where('slug', $slug)->get('kelas_sertif')->row();
		$email = get_cookie('email_regis');
		$id_kelas = $kelas_sertif->id;
		$cek = $this->Tryout_model->cek_user($email, $id_kelas);
		if($cek > 0){

			$regis = $this->db->where('email', $email)->where('id_kelas_sertif', $id_kelas)->get('regis_sertif')->row();
			$tryout = $this->db->where('id_kelas_sertif', $id_kelas)
						->where('id_user', $regis->id)
						->order_by('id', 'DESC')
						->limit(1)
						->get('tryout')->row();
			$tglWaktu = $tryout->end_date;
			$endtahun = substr($tglWaktu,0,4);
			$endbulan = medium_english(substr($tglWaktu,5,2));
			$endtgl = substr($tglWaktu,8,2);
			$endwaktu = substr($tglWaktu,11);
			$end_gabung = $endbulan.' '.$endtgl.', '.$endtahun.' '.$endwaktu;

			$kelas = $this->db->where('slug', $slug)->get('kelas_sertif')->row();
			$soal_sb = $this->Tryout_model->get_soal('sb', $regis->id, $kelas_sertif->id);
			$soal_pg = $this->Tryout_model->get_soal('pg', $regis->id, $kelas_sertif->id);
			$soal_pgsk = $this->Tryout_model->get_soal('pgsk', $regis->id, $kelas_sertif->id);
			$detail_soal_sb = $this->db->where('id', $id_soal)->get('soal_sb')->row();
			$data_jawaban = array('id_regis_sertif' => $regis->id, 'jenis_soal' => 'sb', 'id_soal' =>  $id_soal);
			$jawaban = $this->Tryout_model->get_jawaban($data_jawaban);

			if($no_soal == 1){
				$next_id = $this->db->select('min(id) as next', false)->where('id >', $id_soal)->get('soal_sb')->row();
				$link = '
                    <div class="col-md-6 text-left">
                    </div>
                    <div class="col-md-6 text-right">
                      <a href="'.base_url().'preview/soal_sb/'.$slug.'/'.$next_id->next.'/'.($no_soal+1).'">Selanjutnya >></a>
                    </div>';
			}elseif($no_soal == 25){
            	$prev_id = $this->db->select('max(id) as prev', false)->where('id <', $id_soal)->get('soal_sb')->row();
				$next_id = $this->db->select('min(id) as next', false)->get('soal_pg')->row();
				$link = '
                    <div class="col-md-6 text-left">
                      <a href="'.base_url().'preview/soal_sb/'.$slug.'/'.$prev_id->prev.'/'.($no_soal-1).'"><< Seleblumnya</a>
                    </div>
                    <div class="col-md-6 text-right">
                      <a href="'.base_url().'preview/soal_pg/'.$slug.'/'.$next_id->next.'/'.($no_soal+1).'">Selanjutnya >></a>
                    </div>';
            }elseif($no_soal > 1 || $no_soal < 25 ){
            	$prev_id = $this->db->select('max(id) as prev', false)->where('id <', $id_soal)->get('soal_sb')->row();
				$next_id = $this->db->select('min(id) as next', false)->where('id >', $id_soal)->get('soal_sb')->row();
				$link = '
                    <div class="col-md-6 text-left">
                      <a href="'.base_url().'preview/soal_sb/'.$slug.'/'.$prev_id->prev.'/'.($no_soal-1).'"><< Seleblumnya</a>
                    </div>
                    <div class="col-md-6 text-right">
                      <a href="'.base_url().'preview/soal_sb/'.$slug.'/'.$next_id->next.'/'.($no_soal+1).'">Selanjutnya >></a>
                    </div>';
            }
            $panitia = explode("|", $kelas->panitia);
			$data = array(
				'kelas' => $kelas,
				'user_regis' => $regis,
				'slug' => $slug,
				'batas_waktu' => $end_gabung,
				'nama_panitia' => $panitia[0],
				'wa_panitia' => $panitia[1],
				'soal_sb' => $soal_sb,
				'soal_pg' => $soal_pg,
				'soal_pgsk' => $soal_pgsk,
				'detail_soal_sb' => $detail_soal_sb,
				'start_no' => $no_soal,
				'jawaban' => $jawaban,
				'link' => $link,
			);
			$this->load->view('landing/preview/soal_sb', $data);
		}else{
			redirect(site_url('regis/sertif/'.$slug));
		}
	}

	public function auto_save_jawaban($soal, $id_soal, $jawaban)
	{
		$email = get_cookie('email_regis');
		$regis = $this->db->where('email', $email)->get('regis_sertif')->row();
		$data = array('id_regis_sertif' => $regis->id, 'jenis_soal' => $soal, 'id_soal' => $id_soal);
		$cek = $this->db->where($data)->get('jawaban')->num_rows();
		if($cek > 0){
			$data_jawaban = $this->db->where($data)->get('jawaban')->row();
			$this->Tryout_model->update($data_jawaban->id, array('jawaban' => $jawaban,));
		}else{
			$data_jawaban = array('id_regis_sertif' => $regis->id, 'jenis_soal' => $soal, 'id_soal' => $id_soal, 'jawaban' => $jawaban,);
			$this->Tryout_model->insert($data_jawaban);
		}

	}

	public function soal_pg($slug, $id_soal, $no_soal)
	{
		$kelas_sertif = $this->db->where('slug', $slug)->get('kelas_sertif')->row();
		$email = get_cookie('email_regis');
		$id_kelas = $kelas_sertif->id;
		$cek = $this->Tryout_model->cek_user($email, $id_kelas);
		if($cek > 0){

			$regis = $this->db->where('email', $email)->where('id_kelas_sertif', $id_kelas)->get('regis_sertif')->row();
			$tryout = $this->db->where('id_kelas_sertif', $id_kelas)
						->where('id_user', $regis->id)
						->order_by('id', 'DESC')
						->limit(1)
						->get('tryout')->row();
			$tglWaktu = $tryout->end_date;
			$endtahun = substr($tglWaktu,0,4);
			$endbulan = medium_english(substr($tglWaktu,5,2));
			$endtgl = substr($tglWaktu,8,2);
			$endwaktu = substr($tglWaktu,11);
			$end_gabung = $endbulan.' '.$endtgl.', '.$endtahun.' '.$endwaktu;
			$kelas = $this->db->where('slug', $slug)->get('kelas_sertif')->row();
			$soal_sb = $this->Tryout_model->get_soal('sb', $regis->id, $kelas_sertif->id);
			$soal_pg = $this->Tryout_model->get_soal('pg', $regis->id, $kelas_sertif->id);
			$soal_pgsk = $this->Tryout_model->get_soal('pgsk', $regis->id, $kelas_sertif->id);
			$detail_soal_pg = $this->db->where('id', $id_soal)->get('soal_pg')->row();
			$data_jawaban = array('id_regis_sertif' => $regis->id, 'jenis_soal' => 'pg', 'id_soal' =>  $id_soal);
			$jawaban = $this->Tryout_model->get_jawaban($data_jawaban);

			if($no_soal == 26){
            	$prev_id = $this->db->select('max(id) as prev', false)->get('soal_sb')->row();
				$next_id = $this->db->select('min(id) as next', false)->where('id >', $id_soal)->get('soal_pg')->row();
				$link = '
                    <div class="col-md-6 text-left">
                      <a href="'.base_url().'preview/soal_sb/'.$slug.'/'.$prev_id->prev.'/'.($no_soal-1).'"><< Seleblumnya</a>
                    </div>
                    <div class="col-md-6 text-right">
                      <a href="'.base_url().'preview/soal_pg/'.$slug.'/'.$next_id->next.'/'.($no_soal+1).'">Selanjutnya >></a>
                    </div>';
			}elseif($no_soal == 80){
            	$prev_id = $this->db->select('max(id) as prev', false)->where('id <', $id_soal)->get('soal_sb')->row();
				$next_id = $this->db->select('min(id) as next', false)->get('soal_pg')->row();
				$link = '
                    <div class="col-md-6 text-left">
                      <a href="'.base_url().'preview/soal_pg/'.$slug.'/'.$prev_id->prev.'/'.($no_soal-1).'"><< Seleblumnya</a>
                    </div>
                    <div class="col-md-6 text-right">
                      <a href="'.base_url().'preview/soal_pgsk/'.$slug.'/'.$next_id->next.'/'.($no_soal+1).'">Selanjutnya >></a>
                    </div>';
            }elseif($no_soal > 26 || $no_soal < 80 ){
            	$prev_id = $this->db->select('max(id) as prev', false)->where('id <', $id_soal)->get('soal_pg')->row();
				$next_id = $this->db->select('min(id) as next', false)->get('soal_pgsk')->row();
				$link = '
                    <div class="col-md-6 text-left">
                      <a href="'.base_url().'preview/soal_pg/'.$slug.'/'.$prev_id->prev.'/'.($no_soal-1).'"><< Seleblumnya</a>
                    </div>
                    <div class="col-md-6 text-right">
                      <a href="'.base_url().'preview/soal_pgsk/'.$slug.'/'.$next_id->next.'/'.($no_soal+1).'">Selanjutnya >></a>
                    </div>';
            }

			// Midtrans start
			// Midtrans end
            $panitia = explode("|", $kelas->panitia);
			$data = array(
				'kelas' => $kelas,
				'user_regis' => $regis,
				'slug' => $slug,
				'batas_waktu' => $end_gabung,
				'nama_panitia' => $panitia[0],
				'wa_panitia' => $panitia[1],
				'soal_sb' => $soal_sb,
				'soal_pg' => $soal_pg,
				'soal_pgsk' => $soal_pgsk,
				'detail_soal_pg' => $detail_soal_pg,
				'start_no' => $no_soal,
				'jawaban' => $jawaban,
				'link' => $link,
			);
			$this->load->view('landing/preview/soal_pg', $data);
		}else{
			redirect(site_url('regis/sertif/'.$slug));
		}
	}

	public function soal_pgsk($slug, $id_soal, $no_soal)
	{
		$kelas_sertif = $this->db->where('slug', $slug)->get('kelas_sertif')->row();
		$email = get_cookie('email_regis');
		$id_kelas = $kelas_sertif->id;
		$cek = $this->Tryout_model->cek_user($email, $id_kelas);
		if($cek > 0){

			$regis = $this->db->where('email', $email)->where('id_kelas_sertif', $id_kelas)->get('regis_sertif')->row();
			$tryout = $this->db->where('id_kelas_sertif', $id_kelas)
						->where('id_user', $regis->id)
						->order_by('id', 'DESC')
						->limit(1)
						->get('tryout')->row();
			$tglWaktu = $tryout->end_date;
			$endtahun = substr($tglWaktu,0,4);
			$endbulan = medium_english(substr($tglWaktu,5,2));
			$endtgl = substr($tglWaktu,8,2);
			$endwaktu = substr($tglWaktu,11);
			$end_gabung = $endbulan.' '.$endtgl.', '.$endtahun.' '.$endwaktu;
			$kelas = $this->db->where('slug', $slug)->get('kelas_sertif')->row();
			$soal_sb = $this->Tryout_model->get_soal('sb', $regis->id, $kelas_sertif->id);
			$soal_pg = $this->Tryout_model->get_soal('pg', $regis->id, $kelas_sertif->id);
			$soal_pgsk = $this->Tryout_model->get_soal('pgsk', $regis->id, $kelas_sertif->id);
			$detail_soal_pgsk = $this->db->where('id', $id_soal)->get('soal_pgsk')->row();
			$data_jawaban = array('id_regis_sertif' => $regis->id, 'jenis_soal' => 'pgsk', 'id_soal' =>  $id_soal);
			$jawaban = $this->Tryout_model->get_jawaban($data_jawaban);

			if($no_soal == 81){
            	$prev_id = $this->db->select('max(id) as prev', false)->get('soal_pg')->row();
				$next_id = $this->db->select('min(id) as next', false)->where('id >', $id_soal)->get('soal_pgsk')->row();
				$link = '
                    <div class="col-md-6 text-left">
                      <a href="'.base_url().'preview/soal_pg/'.$slug.'/'.$prev_id->prev.'/'.($no_soal-1).'"><< Seleblumnya</a>
                    </div>
                    <div class="col-md-6 text-right">
                      <a href="'.base_url().'preview/soal_pgsk/'.$slug.'/'.$next_id->next.'/'.($no_soal+1).'">Selanjutnya >></a>
                    </div>';
			}elseif($no_soal == 80){
            	$prev_id = $this->db->select('max(id) as prev', false)->where('id <', $id_soal)->get('soal_sb')->row();
				$next_id = $this->db->select('min(id) as next', false)->get('soal_pg')->row();
				$link = '
                    <div class="col-md-6 text-left">
                      <a href="'.base_url().'preview/soal_pg/'.$slug.'/'.$prev_id->prev.'/'.($no_soal-1).'"><< Seleblumnya</a>
                    </div>
                    <div class="col-md-6 text-right">
                      <a href="'.base_url().'preview/soal_pgsk/'.$slug.'/'.$next_id->next.'/'.($no_soal+1).'">Selanjutnya >></a>
                    </div>';
            }elseif($no_soal > 80){
            	$prev_id = $this->db->select('max(id) as prev', false)->where('id <', $id_soal)->get('soal_pgsk')->row();
				$next_id = $this->db->select('min(id) as next', false)->where('id >', $id_soal)->get('soal_pgsk')->row();
				$link = '
                    <div class="col-md-6 text-left">
                      <a href="'.base_url().'preview/soal_pgsk/'.$slug.'/'.$prev_id->prev.'/'.($no_soal-1).'"><< Seleblumnya</a>
                    </div>
                    <div class="col-md-6 text-right">
                      <a href="'.base_url().'preview/soal_pgsk/'.$slug.'/'.$next_id->next.'/'.($no_soal+1).'">Selanjutnya >></a>
                    </div>';
            }

			// Midtrans start
			// Midtrans end
            $panitia = explode("|", $kelas->panitia);
			$data = array(
				'kelas' => $kelas,
				'user_regis' => $regis,
				'slug' => $slug,
				'batas_waktu' => $end_gabung,
				'nama_panitia' => $panitia[0],
				'wa_panitia' => $panitia[1],
				'soal_sb' => $soal_sb,
				'soal_pg' => $soal_pg,
				'soal_pgsk' => $soal_pgsk,
				'detail_soal_pgsk' => $detail_soal_pgsk,
				'start_no' => $no_soal,
				'jawaban' => $jawaban,
				'link' => $link,
			);
			$this->load->view('landing/preview/soal_pgsk', $data);
		}else{
			redirect(site_url('regis/sertif/'.$slug));
		}
	}


	public function register()
	{
		$email = $this->input->post('email');
		$id_kelas = $this->input->post('id_kelas_sertif');
		$cek = $this->Tryout_model->cek_user($email, $id_kelas);
		if($cek > 0){
			$this->res['success'] = false;
			$this->res['msg'] = 'Email Telah Terdaftar';
		}else{
			$id_kelas_sertif = $this->input->post('id_kelas_sertif');
			$nama_lengkap = $this->input->post('nama_lengkap');
			$no_hp = $this->input->post('no_hp');
			// $email = $email,
			$instansi = $this->input->post('instansi');
			$create_date = date('Y-m-d H:m:s');
		    $input = $this->db->query("insert into regis_sertif 
		    							(id_kelas_sertif, unik_code, nama_lengkap, no_hp, email, instansi, create_date)
		    							select ".$id_kelas_sertif.", (r.unik_code+1), '".$nama_lengkap."', '".$no_hp."', '".$email."', '".$instansi."', '".$create_date."'
										from regis_sertif r
										where r.id_kelas_sertif = ".$id_kelas_sertif."
										order by r.unik_code desc
										limit 1");
		    // $input = $this->db->insert('regis_sertif', $data);
		    if($input){
                $email_regis = array(
                        'name'   => 'email_regis',
                        'value'  => $email,
                        'expire' => '3000000',
                        'secure' => TRUE
                        );
            	set_cookie($email_regis);                   
                $kelas_regis = array(
                        'name'   => 'kelas_regis',
                        'value'  => $this->input->post('id_kelas_sertif'),
                        'expire' => '3000000',
                        'secure' => TRUE
                        );
            	// set_cookie($kelas_regis);                   
		    }
	        // $this->session->set_flashdata('message', 'Create Record Success');
	        $this->send_wa($email, $this->input->post('id_kelas_sertif'));
	        $this->res['success'] = true;
			$this->res['msg'] = 'Berhasil';
	        // redirect(site_url('prodi'));
	    }
	    echo json_encode($this->res);
	}

	public function test_replace($hp)
	{
		$hp0 = substr_replace($hp,'62',0,1);
		echo $hp0;
	}

	public function send_wa($email, $id_sertif)
	{
		$regis = $this->db->where('email', $email)->get('regis_sertif')->row();
		$sertif = $this->db->where('id', $id_sertif)->get('kelas_sertif')->row();
		$panitia = explode("|", $sertif->panitia);
		$no_wa = substr_replace($regis->no_hp,'62',0,1);
		$msg = '
Regestrasi Sertifikas
*'.$sertif->judul.'*
Atas Nama : *'.$regis->nama_lengkap.'* 
Telah kami terima,

Selanjutnya silahkan melakukan pembayaran pada :
'.base_url('regis/status').'/'.$sertif->slug.'
Untuk selanjutnya menerima pesan *WhatsApp* berupa *Link Sertifikat* Anda

*Info lebih lanjut*
WhatsApp Panitia :
https://wa.me/'.$panitia[1].'
Kontak Panitia :
'.substr_replace($panitia[1], '0','0',2).'
';
        $data_wa = array(
                    'to' => $no_wa, 
                    'message' => $msg,
        );

        $data_string = json_encode($data_wa);

        $authorization = "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1aWQiOjE1LCJpYXQiOjE2MzM1OTAzNTcsImV4cCI6MTY2NTEyNjM1N30.UwnYI2tAokuhNjRLUVFHmhFVBVSroEJy-TaBQ5cuTME";
        $device_key = "device-key: a7d7c713-c2aa-4330-9545-dbf4b9fcf26a";
        $ch = curl_init('https://waservice.e-lpkn.id/messages/send-text');

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            $authorization,
            $device_key,
            'Content-Length: ' . strlen($data_string)
            )
        );
        $result = curl_exec($ch);
	}

	public function cek_status()
	{
		$email = $this->input->post('email');
		$cek = $this->db->where('email', $email)->get('regis_sertif')->num_rows();
		if($cek > 0){
            $cookie = array(
                    'name'   => 'email_regis',
                    'value'  => $email,
                    'expire' => '3000000',
                    'secure' => TRUE
                    );
        	set_cookie($cookie);                   
	        $this->res['success'] = true;
			$this->res['msg'] = 'Berhasil';
		}else{
			$this->res['success'] = false;
			$this->res['msg'] = 'Email Tidak Ditemukan';
		}
		echo json_encode($this->res);
	}

	public function brosur($id)
	{
		$kelas = $this->db->where('id', $id)->get('kelas_sertif')->row();
		force_download('uploads/brosur/'.$kelas->brosur, NULL);
	}

}
