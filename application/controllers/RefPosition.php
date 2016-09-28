<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RefPosition extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Employee_model');
        $this->load->model('RatesDuties_model');
        $this->load->model('Ref_Emptype_model');
        $this->load->model('RefDepartment_model');
        $this->load->model('RefPosition_model');



    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['title'] = 'RatesDuties';

        $this->load->view('ref_position_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $response['data']=$this->RefPosition_model->get_list(
                    array('ref_position.is_deleted'=>FALSE)
                    );
                echo json_encode($response);
                break;

            case 'create':
                $m_position = $this->RefPosition_model;
               
                $m_position->position = $this->input->post('postname', TRUE);
                $m_position->description = $this->input->post('postdescription', TRUE);
                $m_position->save();

                $ref_position_id = $m_position->last_insert_id();


                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'Position information successfully created.';

                $response['row_added'] = $this->RefPosition_model->get_list($ref_position_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_position=$this->RefPosition_model;

                $ref_position_id=$this->input->post('ref_position_id',TRUE);

                $m_position->is_deleted=1;
                if($m_position->modify($ref_position_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Position information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_position=$this->RefPosition_model;

                $ref_position_id=$this->input->post('ref_position_id',TRUE);

                $m_position->position = $this->input->post('position', TRUE);
                $m_position->description = $this->input->post('description', TRUE);
                $m_position->modify($ref_position_id);

                $response['title']='Success';
                $response['stat']='success';
                $response['msg']='Position information successfully updated.';
                $response['row_updated']=$this->RefPosition_model->get_list($ref_position_id);
                echo json_encode($response);

                break;

        }
    }











}
