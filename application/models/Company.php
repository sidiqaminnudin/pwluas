<?php

class Company extends CI_model {

	public function getAllCompany()
    {
        return $query = $this->db->get('company')->result_array();

        
    }


    public function insert_company()
    {
    	$data = [
            "name" => $this->input->post('companyname',true)
        ];
        
        $this->db->insert('company', $data);
    }

    public function select_company($id)
    {
    

        $this->db->where('idcompany',$id);
        return $query = $this->db->where('idcompany',$id)->get('company')->row_array();
    }

    public function update_company($id)
    {
    	$data = [
            "name" => $this->input->post('name',true)
        ];
        $this->db->where('idcompany',$this->input->post('idcompany'));
        $this->db->update('company', $data);
    }


    
    public function delete_company($id)
    {
        $this->db->delete('company', ['idcompany' => $id]);
    }
}