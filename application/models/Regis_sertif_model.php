<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Regis_sertif_model extends CI_Model
{

    public $table = 'regis_sertif';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,id_kelas_sertif,nama_lengkap,no_hp,email,instansi,status_pembayaran,create_date,update_date');
        $this->datatables->from('regis_sertif');
        //add this line for join
        // $this->datatables->join('tryout', 'regis_sertif.id = tryout.id_user');
        //$this->datatables->add_column('action', anchor(site_url('regis_sertif/read/$1'),'Read')." | ".anchor(site_url('regis_sertif/update/$1'),'Update')." | ".anchor(site_url('regis_sertif/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        $this->datatables->add_column('all', '<div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                    <button onclick="load_controler(\'regis_sertif/read/$1\');" class="btn btn-default" type="button"><i class="fa fa-eye"></i></button>
                                                    '.(($this->ion_auth->is_admin() OR $this->ion_auth_acl->has_permission('edit_regis_sertif'))?'<button onclick="load_controler(\'regis_sertif/update/$1\');" class="btn btn-primary" type="button"><i class="fa fa-pencil-square-o"></i></button>':"").'
                                                    '.(($this->ion_auth->is_admin() OR $this->ion_auth_acl->has_permission('delete_regis_sertif'))?'<button onclick="if(confirm(\'Are you sure?\')) load_controler(\'regis_sertif/delete/$1\');" class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>':"").'
                                                    </div>', 
                                        'id'
                                    );
        return $this->datatables->generate();
    }

    function json_kelas($id) {
        $this->datatables->select('regis_sertif.id AS id_regis,regis_sertif.id_kelas_sertif,nama_lengkap,no_hp,email,instansi,status_pembayaran,create_date,update_date,if(status is null, null, if(status = 0, null, nilai)) AS skor', false);
        $this->datatables->from('regis_sertif');
        $this->datatables->where('regis_sertif.id_kelas_sertif', $id);
        //add this line for join
        $this->datatables->join('tryout', 'regis_sertif.id = tryout.id_user', 'left');
        // $this->db->order_by('nilai', 'DESC');
        //$this->datatables->join('table2', 'regis_sertif.field = table2.field');
        //$this->datatables->add_column('action', anchor(site_url('regis_sertif/read/$1'),'Read')." | ".anchor(site_url('regis_sertif/update/$1'),'Update')." | ".anchor(site_url('regis_sertif/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        $this->datatables->add_column('all', '<div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                    <button onclick="load_controler(\'regis_sertif/read/$1\');" class="btn btn-default" type="button"><i class="fa fa-eye"></i></button>
                                                    '.(($this->ion_auth->is_admin() OR $this->ion_auth_acl->has_permission('edit_regis_sertif'))?'<button onclick="load_controler(\'regis_sertif/update/$1\');" class="btn btn-primary" type="button"><i class="fa fa-pencil-square-o"></i></button>':"").'
                                                    '.(($this->ion_auth->is_admin() OR $this->ion_auth_acl->has_permission('delete_regis_sertif'))?'<button onclick="if(confirm(\'Are you sure?\')) load_controler(\'regis_sertif/delete/$1\');" class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>':"").'
                                                    </div>', 
                                        'id_regis'
                                    );
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('id_kelas_sertif', $q);
	$this->db->or_like('nama_lengkap', $q);
	$this->db->or_like('no_hp', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('instansi', $q);
	$this->db->or_like('status_pembayaran', $q);
	$this->db->or_like('create_date', $q);
	$this->db->or_like('update_date', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('id_kelas_sertif', $q);
	$this->db->or_like('nama_lengkap', $q);
	$this->db->or_like('no_hp', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('instansi', $q);
	$this->db->or_like('status_pembayaran', $q);
	$this->db->or_like('create_date', $q);
	$this->db->or_like('update_date', $q);
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

}