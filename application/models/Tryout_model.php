<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tryout_model extends CI_Model
{

    // public $table = 'tahun_akademik';
    // public $id = 'id_tahun_akademik';
    // public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_kelas($slug)
    {
        $this->db->where('slug', $slug);
        $data = $this->db->get('kelas_sertif')->row();
        return $data;
    }

    function get_user($email, $id_kelas)
    {
        $data = $this->db->where('email', $email)
                ->where('id_kelas_sertif', $id_kelas)
                ->where('status_user', 1)
                ->get('regis_sertif')
                ->row();
        return $data;
    }

    function login($email, $password, $id_kelas)
    {
        $cek = $this->db->where('email', $email)
                ->where('password', md5($password))
                ->where('id_kelas_sertif', $id_kelas)
                ->where('status_user', 1)
                ->get('regis_sertif')
                ->num_rows();
        return $cek;
    }

    function cek_user($email, $id_kelas)
    {
        $cek = $this->db->where('email', $email)
                ->where('id_kelas_sertif', $id_kelas)
                ->where('status_user', 1)
                ->get('regis_sertif')
                ->num_rows();
        return $cek;
    }

    function cek_tryout($id_kelas, $id_user)
    {
        $cek_tryout = $this->db->where('id_kelas_sertif', $id_kelas)
                        ->where('id_user', $id_user)
                        ->get('tryout')
                        ->num_rows();
        if($cek_tryout > 0){
            $tryout = $this->db->where('id_kelas_sertif', $id_kelas)
                            ->where('id_user', $id_user)
                            ->get('tryout')
                            ->row();
            if($tryout->status > 0){
                $status = 1;
            }else{
                $status = 0;
            }
        }else{
            $status = 0;
        }
        return $status;
    }

    function get_start_soal($id_user, $id_kelas)
    {
        $result = $this->db->query("SELECT s.id
                                    FROM soal_sb s 
                                    LEFT JOIN jawaban j ON s.id = j.id_soal AND j.id_regis_sertif = ".$id_user." AND jenis_soal = 'sb'
                                    WHERE id_kelas = ".$id_kelas." order by RAND(".$id_user.") LIMIT 1")->row();
        return $result;
    }

    function get_soal($soal, $id_user, $id_kelas)
    {
        $result = $this->db->query("SELECT s.*, if(j.jawaban is null, 0, j.jawaban) AS jawaban
                                    FROM soal_".$soal." s 
                                    LEFT JOIN jawaban j ON s.id = j.id_soal AND j.id_regis_sertif = ".$id_user." AND jenis_soal = '".$soal."'
                                    WHERE id_kelas = ".$id_kelas." order by RAND(".$id_user.")")->result();
        return $result;
    }

    // get data by id
    function get_jawaban($data)
    {
        $cek = $this->db->where($data)->get('jawaban')->num_rows();
        if($cek > 0){
            $jawaban = $this->db->where($data)->get('jawaban')->row();
            $data_jawaban = array('jawaban' => $jawaban->jawaban, 'nilai' => $jawaban->nilai );
        }else{
            $data_jawaban = array('jawaban' => null, 'nilai' => null );
        }
        return $data_jawaban;
    }

    function update_kode($kode, $data)
    {
        $this->db->where('verifikasi_kode', $kode);
        $this->db->update('regis_sertif', $data);
    }

    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('jawaban', $data);
    }

    function insert($data)
    {
        $this->db->insert('jawaban', $data);
    }

    function get_nilai_sb($id_user)
    {
        $sb = $this->db->query("SELECT count(j.id) AS nilai
                                FROM jawaban j
                                INNER JOIN soal_sb s ON j.id_soal = s.id
                                WHERE jenis_soal = 'sb'
                                AND id_regis_sertif = ".$id_user."
                                AND j.jawaban = s.jawaban_benar")->row();
        return $sb->nilai;
    }
    function get_nilai_pg($id_user)
    {
        $pg = $this->db->query("SELECT count(j.id) AS nilai
                                FROM jawaban j
                                INNER JOIN soal_pg s ON j.id_soal = s.id
                                WHERE jenis_soal = 'pg'
                                AND id_regis_sertif = ".$id_user."
                                AND j.jawaban = s.jawaban_benar")->row();
        return $pg->nilai;
    }
    function get_nilai_pgsk($id_user)
    {
        $pgsk = $this->db->query("SELECT count(j.id) AS nilai
                                FROM jawaban j
                                INNER JOIN soal_pgsk s ON j.id_soal = s.id
                                WHERE jenis_soal = 'pgsk'
                                AND id_regis_sertif = ".$id_user."
                                AND j.jawaban = s.jawaban_benar")->row();
        return $pgsk->nilai;
    }

/*    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_tahun_akademik', $q);
	$this->db->or_like('kode_tahun_akademik', $q);
	$this->db->or_like('nama_tahun_akademik', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('ket', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_tahun_akademik', $q);
	$this->db->or_like('kode_tahun_akademik', $q);
	$this->db->or_like('nama_tahun_akademik', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('ket', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
*/

}