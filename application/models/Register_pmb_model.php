<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register_pmb_model extends CI_Model
{

    public $table = 'register_pmb';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('pmb.id,nama_lengkap,email,no_hp,lokasi,nama_kampus,affiliasi,nama_bank,no_rek,ref,ref_by,if(status_pembayaran = 0,"Belum","Lunas") AS status_pembayaran,created_at,updated_at');
        $this->datatables->from('register_pmb pmb');
        //add this line for join
        $this->datatables->join('lokasi_kampus lk', 'pmb.lokasi = lk.id');
        //$this->datatables->add_column('action', anchor(site_url('register_pmb/read/$1'),'Read')." | ".anchor(site_url('register_pmb/update/$1'),'Update')." | ".anchor(site_url('register_pmb/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        $this->datatables->add_column('all', '<div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                    <button onclick="load_controler(\'register_pmb/read/$1\');" class="btn btn-secondary" type="button"><i class="fa fa-eye"></i></button>
                                                    '.(($this->ion_auth->is_admin() OR $this->ion_auth_acl->has_permission('edit_register_pmb'))?'<button onclick="load_controler(\'register_pmb/update/$1\');" class="btn btn-primary" type="button"><i class="fa fa-pencil-square-o"></i></button>':"").'
                                                    '.(($this->ion_auth->is_admin() OR $this->ion_auth_acl->has_permission('delete_register_pmb'))?'<button onclick="if(confirm(\'Are you sure?\')) load_controler(\'register_pmb/delete/$1\');" class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>':"").'
                                                    </div>', 
                                        'id'
                                    );
        return $this->datatables->generate();
    }

    function json_affiliasi() {
        $this->datatables->select('pmb.id,nama_lengkap,email,no_hp,lokasi,nama_kampus,affiliasi,nama_bank,no_rek,ref,ref_by,if(status_pembayaran = 0,"Belum","Lunas") AS status_pembayaran,created_at,updated_at');
        $this->datatables->from('register_pmb pmb');
        //add this line for join
        $this->datatables->join('lokasi_kampus lk', 'pmb.lokasi = lk.id');
        $this->datatables->where('affiliasi', 1);
        //$this->datatables->add_column('action', anchor(site_url('register_pmb/read/$1'),'Read')." | ".anchor(site_url('register_pmb/update/$1'),'Update')." | ".anchor(site_url('register_pmb/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        $this->datatables->add_column('all', '<div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                    <button onclick="load_controler(\'register_pmb/read_affiliasi/$1\');" class="btn btn-secondary" type="button"><i class="fa fa-eye"></i></button>
                                                    </div>', 
                                        'id'
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
	$this->db->or_like('nama_lengkap', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('no_hp', $q);
	$this->db->or_like('lokasi', $q);
	$this->db->or_like('affiliasi', $q);
	$this->db->or_like('nama_bank', $q);
	$this->db->or_like('no_rek', $q);
	$this->db->or_like('ref', $q);
	$this->db->or_like('ref_by', $q);
	$this->db->or_like('status_pembayaran', $q);
	$this->db->or_like('created_at', $q);
	$this->db->or_like('updated_at', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('nama_lengkap', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('no_hp', $q);
	$this->db->or_like('lokasi', $q);
	$this->db->or_like('affiliasi', $q);
	$this->db->or_like('nama_bank', $q);
	$this->db->or_like('no_rek', $q);
	$this->db->or_like('ref', $q);
	$this->db->or_like('ref_by', $q);
	$this->db->or_like('status_pembayaran', $q);
	$this->db->or_like('created_at', $q);
	$this->db->or_like('updated_at', $q);
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