<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Data extends CI_Controller {
		
		public function __construct()
    {
        parent::__construct();
    	
    	$this->load->model('Company');
        $this->load->model('City');
        $this->load->library('form_validation');
    }
 
	public function index()
	{
		$this->load->model('members');
		$file = $_FILES;

		
		
		$data['view'] = 'table';
		$data['title'] = 'Data Members';
		$data['members'] = $this->members->get_all();

		$this->load->view('main', $data);
	}

	public function detail($id){
		$this->load->model('members');

		$data['view'] = 'detail';		
		$data['member'] = $this->members->get($id);
		$data['title'] = $data['member']['fullname'];

		$this->load->view('main', $data);
	}

	public function add(){
		$this->load->model('members');
		
		$data['view'] = 'form';		
		$data['title'] = 'Add Member';
		$data['member'] = null;

		if($this->input->post()){
			$add = $this->members->add($this->input->post());
			if($add['sts']){
				$data['ok'] = $add['msg']; 
			}else{
				$data['error'] = $add['msg'];
			}
		}

		$data['city'] = $this->members->getCity();
		$data['company'] = $this->members->getCompany();
		$this->load->view('main', $data);
	}

	public function del($id){
		$this->load->model('members');
		
		$data['view'] = 'delete';		
		$data['title'] = 'Hapus Member';
		$data['member'] = $this->members->get($id);

		if($this->input->post()){
			$add = $this->members->del($id);
			if($add['sts']){
				$data['ok'] = $add['msg']; 
			}else{
				$data['error'] = $add['msg'];
			}
		}

		$this->load->view('main', $data);
	}

	public function edit($id){
		$this->load->model('members');

		$data['view'] = 'form';		
		$data['title'] = 'Edit Member';

		if($this->input->post()){

			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);
            if ( !$this->upload->do_upload('foto')){
            	$data['error'] = $this->upload->display_errors();	
            }else{
            	$newfile = $this->upload->data();
            	$post = $this->input->post();
            	$post['foto'] = $newfile['file_name'];

            	$add = $this->members->update($id, $post);
				if($add['sts']){
					$data['ok'] = $add['msg']; 
				}else{
					$data['error'] = $add['msg'];
				}	
            }	
			
		}

		$data['member'] = $this->members->get($id);
		$data['city'] = $this->members->getCity();
		$data['company'] = $this->members->getCompany();

		$this->load->view('main', $data);
	}

	public function city()
	{
		$this->load->model('city');
		
		$data['view'] = 'view_city';
		$data['title'] = 'CRUD CITY';
		$data['allCity'] = $this->city->getAllCity();

		$this->load->view('main', $data);
	}
 	public function addCity(){
		$this->load->model('city');
		
		$data['view'] = 'form_city';		
		$data['title'] = 'Add City';
		$data['city'] = null;

		if($this->input->post()){
			$this->City->insert_city();
			  redirect('data/city');
		}

		$this->load->view('main', $data);
	}
	public function editCity($idcity){
		$this->load->model('City');

		$data['view'] = 'form_city';		
		$data['title'] = 'Edit City';

        $data['city'] = $this->City->select_city($idcity);

    	if($this->input->post()){
     
            $this->City->update_city($idcity);

           redirect('data/city');					
		}
            	
		$this->load->view('main', $data);
	}
	 public function delCity($idcity)
    {
        $this->City->delete_city($idcity);
        redirect('data/city');
    }
    public function company()
	{
		$this->load->model('company');
		
		$data['view'] = 'view_company';
		$data['title'] = 'CRUD Company';
		$data['allCompany'] = $this->company->getAllCompany();

		$this->load->view('main', $data);
	}

	public function addCompany(){
		$this->load->model('company');
		
		$data['view'] = 'form_company';		
		$data['title'] = 'Add Company';
		$data['company'] = null;

		if($this->input->post()){
			$this->Company->insert_company();
			  redirect('data/company');
		}

		$this->load->view('main', $data);
	}

	 public function delCompany($idcompany)
    {
        $this->Company->delete_company($idcompany);
        redirect('data/company');
    }
    public function editCompany($idcompany){
		$this->load->model('Company');

		$data['view'] = 'form_company';		
		$data['title'] = 'Edit Company';

        $data['company'] = $this->Company->select_company($idcompany);

    	if($this->input->post()){
     
            $this->Company->update_company($idcompany);

           redirect('data/company');					
		}
            	
		$this->load->view('main', $data);
	}

}

