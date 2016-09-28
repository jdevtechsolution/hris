<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RefRelationship extends CORE_Controller
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
        $this->load->model('RefRelationship_model');



    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['title'] = 'RatesDuties';

        $this->load->view('ref_relationship_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $response['data']=$this->RefRelationship_model->get_list(
                    array('ref_relationship.is_deleted'=>FALSE)
                    );
                echo json_encode($response);
                break;

            case 'create':
                $m_relationship = $this->RefRelationship_model;
               
                $m_relationship->relationship = $this->input->post('relationship', TRUE);
                $m_relationship->description = $this->input->post('description', TRUE);
                $m_relationship->save();

                $ref_relationship_id = $m_relationship->last_insert_id();


                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'Relationship information successfully created.';

                $response['row_added'] = $this->RefRelationship_model->get_list($ref_relationship_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_relationship=$this->RefRelationship_model;

                $ref_relationship_id=$this->input->post('ref_relationship_id',TRUE);

                $m_relationship->is_deleted=1;
                if($m_relationship->modify($ref_relationship_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Relationship information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_relationship=$this->RefRelationship_model;

                $ref_relationship_id=$this->input->post('ref_relationship_id',TRUE);

                $m_relationship->relationship = $this->input->post('relationship', TRUE);
                $m_relationship->description = $this->input->post('description', TRUE);
                $m_relationship->modify($ref_relationship_id);

                $response['title']='Success';
                $response['stat']='success';
                $response['msg']='Relationship information successfully updated.';
                $response['row_updated']=$this->RefRelationship_model->get_list($ref_relationship_id);
                echo json_encode($response);

                break;

        }
    }











}
