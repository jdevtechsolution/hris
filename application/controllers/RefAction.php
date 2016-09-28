<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RefAction extends CORE_Controller
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
        $this->load->model('RefCertificate_model');
        $this->load->model('RefAction_model');



    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['title'] = 'RatesDuties';

        $this->load->view('ref_action_taken_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $response['data']=$this->RefAction_model->get_list(
                    array('ref_action_taken.is_deleted'=>FALSE)
                    );
                echo json_encode($response);
                break;

            case 'create':
                $m_action = $this->RefAction_model;
               
                $m_action->action_taken = $this->input->post('action_taken', TRUE);
                $m_action->description = $this->input->post('description', TRUE);
                $m_action->save();

                $ref_action_taken_id = $m_action->last_insert_id();


                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'Action Taken information successfully created.';

                $response['row_added'] = $this->RefAction_model->get_list($ref_action_taken_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_action=$this->RefAction_model;

                $ref_action_taken_id=$this->input->post('ref_action_taken_id',TRUE);

                $m_action->is_deleted=1;
                if($m_action->modify($ref_action_taken_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Action Taken information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_action=$this->RefAction_model;

                $ref_action_taken_id=$this->input->post('ref_action_taken_id',TRUE);

                $m_action->action_taken = $this->input->post('action_taken', TRUE);
                $m_action->description = $this->input->post('description', TRUE);
                $m_action->modify($ref_action_taken_id);

                $response['title']='Success';
                $response['stat']='success';
                $response['msg']='Action Taken information successfully updated.';
                $response['row_updated']=$this->RefAction_model->get_list($ref_action_taken_id);
                echo json_encode($response);

                break;

        }
    }











}
