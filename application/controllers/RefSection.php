<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RefSection extends CORE_Controller
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



    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['title'] = 'RatesDuties';

        $this->load->view('ref_section_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $response['data']=$this->RefSection_model->get_list(
                    array('ref_section.is_deleted'=>FALSE)
                    );
                echo json_encode($response);
                break;

            case 'create':
                $m_section = $this->RefSection_model;
               
                $m_section->section = $this->input->post('postname', TRUE);
                $m_section->description = $this->input->post('postdescription', TRUE);
                $m_section->save();

                $ref_section_id = $m_section->last_insert_id();


                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'Section information successfully created.';

                $response['row_added'] = $this->RefSection_model->get_list($ref_section_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_section=$this->RefSection_model;

                $ref_section_id=$this->input->post('ref_section_id',TRUE);

                $m_section->is_deleted=1;
                if($m_section->modify($ref_section_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Section information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_section=$this->RefSection_model;

                $ref_section_id=$this->input->post('ref_section_id',TRUE);

                $m_section->section = $this->input->post('section', TRUE);
                $m_section->description = $this->input->post('description', TRUE);
                $m_section->modify($ref_section_id);

                $response['title']='Success';
                $response['stat']='success';
                $response['msg']='Section information successfully updated.';
                $response['row_updated']=$this->RefSection_model->get_list($ref_section_id);
                echo json_encode($response);

                break;

        }
    }











}
