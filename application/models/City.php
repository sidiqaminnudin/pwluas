<?php

class City extends CI_model {
    
	public function getAllcity()
    {
        return $query = $this->db->get('city')->result_array();
    
        
    }


    public function insert_city()
    {
    	$data = [
            "cityname" => $this->input->post('cityname',true),
            "country" => $this->input->post('country',true)
        ];
        
        $this->db->insert('city', $data);
    }

    public function select_city($id)
    {
   
     

    	$this->db->where('idcity',$id);
      	return $query = $this->db->where('idcity',$id)->get('city')->row_array();
    }

    public function update_city($id)
    {
    	$data = [
            "cityname" => $this->input->post('cityname',true),
            "country" => $this->input->post('country',true)
        ];
        $this->db->where('idcity',$this->input->post('idcity'));
        $this->db->update('city', $data);
    }

    
    public function delete_city($id)
    {
        $this->db->delete('city', ['idcity' => $id]);
    }

}