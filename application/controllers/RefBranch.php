<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RefBranch extends CORE_Controller
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



    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['title'] = 'RatesDuties';

        $this->load->view('ref_branch_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $response['data']=$this->RefBranch_model->get_list(
                    array('ref_branch.is_deleted'=>FALSE)
                    );
                echo json_encode($response);
                break;

            case 'create':
                $m_branch = $this->RefBranch_model;
               
                $m_branch->branch = $this->input->post('postname', TRUE);
                $m_branch->description = $this->input->post('postdescription', TRUE);
                $m_branch->save();

                $ref_branch_id = $m_branch->last_insert_id();


                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'Branch information successfully created.';

                $response['row_added'] = $this->RefBranch_model->get_list($ref_branch_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_branch=$this->RefBranch_model;

                $ref_branch_id=$this->input->post('ref_branch_id',TRUE);

                $m_branch->is_deleted=1;
                if($m_branch->modify($ref_branch_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Branch information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_branch=$this->RefBranch_model;

                $ref_branch_id=$this->input->post('ref_branch_id',TRUE);

                $m_branch->branch = $this->input->post('branch', TRUE);
                $m_branch->description = $this->input->post('description', TRUE);
                $m_branch->modify($ref_branch_id);

                $response['title']='Success';
                $response['stat']='success';
                $response['msg']='Branch information successfully updated.';
                $response['row_updated']=$this->RefBranch_model->get_list($ref_branch_id);
                echo json_encode($response);

                break;

        }
    }











}
