<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employe extends MX_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->Model('employe_model');
    }

    function index(){
        $this->load->model('Employe_model');
        
        $row = $this->employe_model->getData();
        $data['row'] = $row;
        $this->load->view('employeview',$data);
    }

    function delete(){
        $id=$this->input->get('EMPLOYEID');
        $rep = $this->employe_model->deleteData($_GET['id']);
    }

    function update(){
        // $data = array(
        //     'EMPLOYE' => $employe,
        //     'EMPLOYEID' => $employeid,
        //     'EMPLOYENAME' => $employename,
        //     'EMPLOYEMAIL' => $employemail
        //  );
         
        // $this->load->model('employe_model');
        // $this->employe_model->updateData($data);

        $employename = $this->input->post('employename', TRUE);
        $employeid = $this->input->post('employeid');
        $employemail = $this->input->post('employemail');
        
        $alldata = $this->employe_model->updateData($employename,$employeid,$employemail);

        $this->load->model('employe_model'); // load the model first
        // $this->employe_model->updateData($alldata); // call the method from the model
    }

    // function showview(){
    //     // $data=array();
    //     // $this->view_name="employeview";
    //     // $this->display($data);
    // }

        #request Type is either GET OR POST
            # 1. GET - $this->input->get('data_posted'); 
            # 2. POST - $this->input->post('data_posted'); 
        // $employename=$this->input->post('employename');
        // $employeid=$this->input->post('employeid');
        // $employemail=$this->input->post('employemail');

        

        //now go to model and load database

        //status check 
       
        //ava encode the data go to view for it

      
    function saveEmployee()
    {
        $employename = $this->input->post('employename', TRUE);
        $employeid = $this->input->post('employeid');
        $employemail = $this->input->post('employemail');


        $alldata = $this->employe_model->saveData($employename,$employeid,$employemail);

        // echo "test";die;



        if ($alldata){
            $status='success';
        }else{
            $status='Failed';
        }
        
        echo json_encode(
            array(
               'status'=>$status
            )
        );
    }

  
}
?>