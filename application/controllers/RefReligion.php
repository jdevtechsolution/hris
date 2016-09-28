<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RefReligion extends CORE_Controller
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



    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['title'] = 'RatesDuties';

        $this->load->view('ref_religion_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $response['data']=$this->RefReligion_model->get_list(
                    array('ref_religion.is_deleted'=>FALSE)
                    );
                echo json_encode($response);
                break;

            case 'create':
                $m_religion = $this->RefReligion_model;
               
                $m_religion->religion = $this->input->post('religion', TRUE);
                $m_religion->description = $this->input->post('description', TRUE);
                $m_religion->save();

                $ref_religion_id = $m_religion->last_insert_id();


                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'Religion information successfully created.';

                $response['row_added'] = $this->RefReligion_model->get_list($ref_religion_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_religion=$this->RefReligion_model;

                $ref_religion_id=$this->input->post('ref_religion_id',TRUE);

                $m_religion->is_deleted=1;
                if($m_religion->modify($ref_religion_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Religion information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_religion=$this->RefReligion_model;

                $ref_religion_id=$this->input->post('ref_religion_id',TRUE);

                $m_religion->religion = $this->input->post('religion', TRUE);
                $m_religion->description = $this->input->post('description', TRUE);
                $m_religion->modify($ref_religion_id);

                $response['title']='Success';
                $response['stat']='success';
                $response['msg']='Religion information successfully updated.';
                $response['row_updated']=$this->RefReligion_model->get_list($ref_religion_id);
                echo json_encode($response);

                break;

        }
    }











}
