<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Model{
	
	public function __construct(){
        parent::__construct();
    }

    public function get_all(){
    	$this->db->select('*');
        $this->db->from('members a');
        $this->db->join('company b','b.idcompany=a.idcompany','left');
        $this->db->join('city c','c.idcity=a.idcity','left');
        return $query = $this->db->get()->result_array();
    }

    public function get($id){
        $this->db->select('*');
        $this->db->where('id',$id);
        $this->db->from('members');
        $this->db->join('company','company.idcompany=members.idcompany');
        $this->db->join('city','city.idcity=members.idcity');
    	return $query = $this->db->get()->row_array();
    }

    public function add($post){
    	 
    $file = $_FILES;
    $fileName = $_FILES['foto']['name'];
    $validEks = ['jpg', 'jpeg', 'png'];
    $pictEks = explode('.', $fileName);
    $pictEks = strtolower(end($pictEks));
    $randomName = uniqid();

        if(!empty($file)){
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 2000;
            $config['file_name']            = $randomName;
            $this->load->library('upload', $config);
            if ( !$this->upload->do_upload('foto')){
                $data['error'] = $this->upload->display_errors();   
            }else{
                $newfile = $this->upload->data();
                $handle = fopen($config['upload_path'].$newfile['file_name'], "r");
                fclose($handle);
            }
            $foto = $config['upload_path'].$config['file_name'].$config['allowed_types'];

          
         $fileName = $config['file_name'] . '.' . $pictEks;
        $data = [
            "fullname" => $this->input->post('fullname',true),
            "email" => $this->input->post('email',true),
            "address" => $this->input->post('address',true),
            "foto" => $fileName,
            "idcompany" => $this->input->post('company',true),
            "idcity" => $this->input->post('city',true)
        ];
        
        $this->db->insert('members', $data);

    }
    }

    public function del($id){
        $this->db->where('id', $id);
        if($this->db->delete('members')){
            $msg = "Delete data berhasil";
            return array('msg'=>$msg, 'sts'=>true);
        }else{
            $msg = $this->db->error();
            return array('msg'=>$msg, 'sts'=>false);
        }
    }

    public function update($id, $post){
        $this->db->where('id', $id);
        if($this->db->update('members', $post)){
            $msg = "Edit data berhasil";
            return array('msg'=>$msg, 'sts'=>true);
        }else{
            $msg = $this->db->error();
            return array('msg'=>$msg, 'sts'=>false);
        }   
    }

    public function getCity(){
        $query = $this->db->query('SELECT cityname,country FROM city');
        return $query->result();
    }

    public function getCompany(){
        $query = $this->db->query('SELECT name FROM company');
        return $query->result();
    }
}