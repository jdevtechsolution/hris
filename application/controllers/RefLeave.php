<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RefLeave extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Employee_model');
        $this->load->model('RatesDuties_model');
        $this->load->model('Ref_Emptype_model');
        $this->load->model('RefDepartment_model');
        $this->load->model('RefPosition_model');
        $this->load->model('RefBranch_model');
        $this->load->model('RefSection_model');
        $this->load->model('RefReligion_model');
        $this->load->model('RefCourse_model');
        $this->load->model('RefRelationship_model');
        $this->load->model('RefLeave_model');


    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['title'] = 'RatesDuties';

        $this->load->view('ref_leave_type_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $response['data']=$this->RefLeave_model->get_list(
                    array('ref_leave_type.is_deleted'=>FALSE)
                    );
                echo json_encode($response);
                break;

            case 'create':
                $m_leave = $this->RefLeave_model;
               
                $m_leave->leave_type = $this->input->post('leave_type', TRUE);
                $m_leave->description = $this->input->post('description', TRUE);
                $m_leave->save();

                $ref_leave_type_id = $m_leave->last_insert_id();


                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'Leave information successfully created.';

                $response['row_added'] = $this->RefLeave_model->get_list($ref_leave_type_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_leave=$this->RefLeave_model;

                $ref_leave_type_id=$this->input->post('ref_leave_type_id',TRUE);

                $m_leave->is_deleted=1;
                if($m_leave->modify($ref_leave_type_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Leave information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_leave=$this->RefLeave_model;

                $ref_leave_type_id=$this->input->post('ref_leave_type_id',TRUE);

                $m_leave->leave_type = $this->input->post('leave_type', TRUE);
                $m_leave->description = $this->input->post('description', TRUE);
                $m_leave->modify($ref_leave_type_id);

                $response['title']='Success';
                $response['stat']='success';
                $response['msg']='Leave information successfully updated.';
                $response['row_updated']=$this->RefLeave_model->get_list($ref_leave_type_id);
                echo json_encode($response);

                break;

        }
    }











}
