<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RefDepartment extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Employee_model');
        $this->load->model('RatesDuties_model');
        $this->load->model('Ref_Emptype_model');
        $this->load->model('RefDepartment_model');



    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['title'] = 'RatesDuties';

        $this->load->view('ref_department_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $response['data']=$this->RefDepartment_model->get_list(
                    array('ref_department.is_deleted'=>FALSE)
                    );
                echo json_encode($response);
                break;

            case 'create':
                $m_department = $this->RefDepartment_model;
               
                $m_department->department = $this->input->post('postname', TRUE);
                $m_department->description = $this->input->post('post_description', TRUE);
                $m_department->save();

                $ref_department_id = $m_department->last_insert_id();
                
                
                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'Department information successfully created.';

                $response['row_added'] = $this->RefDepartment_model->get_list($ref_department_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_department=$this->RefDepartment_model;

                $ref_department_id=$this->input->post('ref_department_id',TRUE);

                $m_department->is_deleted=1;
                if($m_employee->modify($ref_department_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Department information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_department=$this->RefDepartment_model;

                $ref_department_id=$this->input->post('ref_department_id',TRUE);

                $m_department->department = $this->input->post('department', TRUE);
                $m_department->description = $this->input->post('description', TRUE);
                $m_department->modify($ref_department_id);

                $response['title']='Success';
                $response['stat']='success';
                $response['msg']='Department information successfully updated.';
                $response['row_updated']=$this->RefDepartment_model->get_list($ref_department_id);
                echo json_encode($response);

                break;

        }
    }











}
