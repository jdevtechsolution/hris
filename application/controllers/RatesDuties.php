<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RatesDuties extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Employee_model');
        $this->load->model('RatesDuties_model');



    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['title'] = 'RatesDuties';

        $this->load->view('', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $response['data']=$this->RatesDuties_model->get_list(
                    array('employee_rates_duties.is_deleted'=>FALSE),
                    'emp_rates_duties.*,ref_employment_type.employment_type,
                    ref_position.position,ref_department.department,ref_section.section,ref_branch.branch,ref_payment_type.payment_type',
                        array(
                            array('ref_employment_type','ref_employment_type.ref_employment_type_id=emp_rates_duties.ref_employment_type_id','left'),
                            array('ref_position','ref_position.ref_position_id=emp_rates_duties.ref_position_id','left'),
                            array('ref_department','ref_department.ref_department_id=emp_rates_duties.ref_department_id','left'),
                            array('ref_section','ref_section.ref_section_id=emp_rates_duties.ref_section_id','left'),
                            array('ref_branch','ref_branch.ref_branch_id=emp_rates_duties.ref_branch_id','left'),
                            array('ref_payment_type','ref_payment_type.ref_payment_type_id=emp_rates_duties.ref_payment_type_id','left'),
                            )
                    );
                echo json_encode($response);
                break;

            case 'testlist':
                $employee_id = $this->input->post('employee_id', TRUE);

                $response['data']=$this->RatesDuties_model->get_list(
                    array('emp_rates_duties.employee_id'=>$employee_id,'emp_rates_duties.is_deleted'=>FALSE),
                    'emp_rates_duties.*,ref_employment_type.employment_type,
                    ref_position.position,ref_department.department,ref_section.section,ref_branch.branch,ref_payment_type.payment_type',
                        array(
                            array('ref_employment_type','ref_employment_type.ref_employment_type_id=emp_rates_duties.ref_employment_type_id','left'),
                            array('ref_position','ref_position.ref_position_id=emp_rates_duties.ref_position_id','left'),
                            array('ref_department','ref_department.ref_department_id=emp_rates_duties.ref_department_id','left'),
                            array('ref_section','ref_section.ref_section_id=emp_rates_duties.ref_section_id','left'),
                            array('ref_branch','ref_branch.ref_branch_id=emp_rates_duties.ref_branch_id','left'),
                            array('ref_payment_type','ref_payment_type.ref_payment_type_id=emp_rates_duties.ref_payment_type_id','left'),
                            )
                    );

                echo json_encode($response);
                break;

            case 'create':
                $m_ratesandduties = $this->RatesDuties_model;
                $m_employee = $this->Employee_model;
               
                $date_starttemp = $this->input->post('date_start', TRUE);
                $date_startendtemp = $this->input->post('date_end', TRUE);


				$date_start = date("Y-m-d", strtotime($date_starttemp));
                $date_end = date("Y-m-d", strtotime($date_startendtemp));

                $employee_id = $this->input->post('employee_id', TRUE);
// $pos_invoice_summary->total_after_tax=$this->get_numeric_value($summary_after_tax);

                $m_ratesandduties->employee_id = $this->input->post('employee_id', TRUE);
                $m_ratesandduties->ref_employment_type_id = $this->input->post('ref_employment_type_id', TRUE);
                $m_ratesandduties->ref_payment_type_id = $this->input->post('ref_payment_type_id', TRUE);
                $m_ratesandduties->ref_department_id = $this->input->post('ref_department_id', TRUE);
                $m_ratesandduties->ref_position_id = $this->input->post('ref_position_id', TRUE);
                $m_ratesandduties->ref_branch_id = $this->input->post('ref_branch_id', TRUE);
                $m_ratesandduties->ref_section_id = $this->input->post('ref_section_id', TRUE);
                $m_ratesandduties->date_start = $date_start;
                $m_ratesandduties->date_end = $date_end;

                $leveltemp = $this->input->post('level', TRUE);
                $salary_reg_rates_temp = $this->input->post('salary_reg_rates', TRUE);
                $daily_rate_temp = $this->input->post('daily_rate', TRUE);
                $daily_rate_factor_temp = $this->input->post('daily_rate_factor', TRUE);
                $sss_phic_salary_credit = $this->input->post('sss_phic_salary_credit', TRUE);
                $pagibig_salary_credit = $this->input->post('pagibig_salary_credit', TRUE);
                $tax_shield_temp = $this->input->post('tax_shield', TRUE);
                  
                $m_ratesandduties->level=$this->get_numeric_value($leveltemp);
                $m_ratesandduties->salary_reg_rates=$this->get_numeric_value($salary_reg_rates_temp);
                $m_ratesandduties->daily_rate=$this->get_numeric_value($daily_rate_temp);
                $m_ratesandduties->daily_rate_factor=$this->get_numeric_value($daily_rate_factor_temp);
                $m_ratesandduties->sss_phic_salary_credit=$this->get_numeric_value($sss_phic_salary_credit);
                $m_ratesandduties->pagibig_salary_credit=$this->get_numeric_value($pagibig_salary_credit);
                $m_ratesandduties->tax_shield=$this->get_numeric_value($tax_shield_temp);
                $m_ratesandduties->remarks = $this->input->post('remarks', TRUE);
                $m_ratesandduties->save();

                $emp_rates_duties_id = $m_ratesandduties->last_insert_id();
                $m_employee->emp_rates_duties_id = $emp_rates_duties_id;
                $m_employee->modify($employee_id);


                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'Rates and Duties successfully created.';

                $response['row_added'] = $this->RatesDuties_model->get_list(
                   $emp_rates_duties_id,
                    'emp_rates_duties.*,ref_employment_type.employment_type,
                    ref_position.position,ref_department.department,ref_section.section,ref_branch.branch,ref_payment_type.payment_type',
                        array(
                            array('ref_employment_type','ref_employment_type.ref_employment_type_id=emp_rates_duties.ref_employment_type_id','left'),
                            array('ref_position','ref_position.ref_position_id=emp_rates_duties.ref_position_id','left'),
                            array('ref_department','ref_department.ref_department_id=emp_rates_duties.ref_department_id','left'),
                            array('ref_section','ref_section.ref_section_id=emp_rates_duties.ref_section_id','left'),
                            array('ref_branch','ref_branch.ref_branch_id=emp_rates_duties.ref_branch_id','left'),
                            array('ref_payment_type','ref_payment_type.ref_payment_type_id=emp_rates_duties.ref_payment_type_id','left'),
                            )

                    );
                        //For Employeee list dropdown update details
                $response['row_update'] = $this->Employee_model->get_list(
                   array('employee_list.employee_id='=>$employee_id,'employee_list.is_deleted'=>FALSE),
                    'employee_list.*,ref_employment_type.employment_type,ref_department.department,ref_position.position,ref_branch.branch,ref_section.section,
                    ref_religion.religion,ref_payment_type.payment_type',
                    array(
                            array('emp_rates_duties','emp_rates_duties.emp_rates_duties_id=employee_list.emp_rates_duties_id','left'),
                            array('ref_employment_type','ref_employment_type.ref_employment_type_id=emp_rates_duties.ref_employment_type_id','left'),
                            array('ref_department','ref_department.ref_department_id=emp_rates_duties.ref_department_id','left'),
                            array('ref_position','ref_position.ref_position_id=emp_rates_duties.ref_position_id','left'),
                            array('ref_branch','ref_branch.ref_branch_id=emp_rates_duties.ref_branch_id','left'),
                            array('ref_section','ref_section.ref_section_id=emp_rates_duties.ref_section_id','left'),
                            array('ref_payment_type','ref_payment_type.ref_payment_type_id=emp_rates_duties.ref_payment_type_id','left'),
                            array('ref_religion','ref_religion.ref_religion_id=employee_list.ref_religion_id','left'),
                            ) 
                    );
                echo json_encode($response);

                break;

            case 'delete':
                $m_ratesandduties=$this->RatesDuties_model;
                $m_employee=$this->Employee_model;

                $emp_rates_duties_id=$this->input->post('emp_rates_duties_id',TRUE);

                $m_ratesandduties->is_deleted=1;
                if($m_ratesandduties->modify($emp_rates_duties_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Rates and Duties successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_ratesandduties = $this->RatesDuties_model;
                $m_employee = $this->Employee_model;
                $employee_id = $this->input->post('employee_id', TRUE);
                $date_starttemp = $this->input->post('date_start', TRUE);
                $date_startendtemp = $this->input->post('date_end', TRUE);


                $date_start = date("Y-m-d", strtotime($date_starttemp));
                $date_end = date("Y-m-d", strtotime($date_startendtemp));

// $pos_invoice_summary->total_after_tax=$this->get_numeric_value($summary_after_tax);
                $emp_rates_duties_id = $this->input->post('emp_rates_duties_id', TRUE);
        //      $m_ratesandduties->employee_id = $this->input->post('employee_id', TRUE);
                $m_ratesandduties->ref_employment_type_id = $this->input->post('ref_employment_type_id', TRUE);
                $m_ratesandduties->ref_payment_type_id = $this->input->post('ref_payment_type_id', TRUE);
                $m_ratesandduties->ref_department_id = $this->input->post('ref_department_id', TRUE);
                $m_ratesandduties->ref_position_id = $this->input->post('ref_position_id', TRUE);
                $m_ratesandduties->ref_branch_id = $this->input->post('ref_branch_id', TRUE);
                $m_ratesandduties->ref_section_id = $this->input->post('ref_section_id', TRUE);
                $m_ratesandduties->date_start = $date_start;
                $m_ratesandduties->date_end = $date_end;

                $leveltemp = $this->input->post('level', TRUE);
                $salary_reg_rates_temp = $this->input->post('salary_reg_rates', TRUE);
                $daily_rate_temp = $this->input->post('daily_rate', TRUE);
                $daily_rate_factor_temp = $this->input->post('daily_rate_factor', TRUE);
                $sss_phic_salary_credit = $this->input->post('sss_phic_salary_credit', TRUE);
                $pagibig_salary_credit = $this->input->post('pagibig_salary_credit', TRUE);
                $tax_shield_temp = $this->input->post('tax_shield', TRUE);
                  
                $m_ratesandduties->level=$this->get_numeric_value($leveltemp);
                $m_ratesandduties->salary_reg_rates=$this->get_numeric_value($salary_reg_rates_temp);
                $m_ratesandduties->daily_rate=$this->get_numeric_value($daily_rate_temp);
                $m_ratesandduties->daily_rate_factor=$this->get_numeric_value($daily_rate_factor_temp);
                $m_ratesandduties->sss_phic_salary_credit=$this->get_numeric_value($sss_phic_salary_credit);
                $m_ratesandduties->pagibig_salary_credit=$this->get_numeric_value($pagibig_salary_credit);
                $m_ratesandduties->tax_shield=$this->get_numeric_value($tax_shield_temp);
                $m_ratesandduties->remarks = $this->input->post('remarks', TRUE);
                $m_ratesandduties->modify($emp_rates_duties_id);

                $m_employee->emp_rates_duties_id= $this->input->post('emp_rates_duties_id', TRUE);
                $m_employee->modify($employee_id);

                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'Rates and Duties successfully Updated.';
                
                $response['row_updated']=$this->RatesDuties_model->get_list(
                    $emp_rates_duties_id,
                    'emp_rates_duties.*,ref_employment_type.employment_type,
                    ref_position.position,ref_department.department,ref_section.section,ref_branch.branch,ref_payment_type.payment_type',
                        array(
                            array('ref_employment_type','ref_employment_type.ref_employment_type_id=emp_rates_duties.ref_employment_type_id','left'),
                            array('ref_position','ref_position.ref_position_id=emp_rates_duties.ref_position_id','left'),
                            array('ref_department','ref_department.ref_department_id=emp_rates_duties.ref_department_id','left'),
                            array('ref_section','ref_section.ref_section_id=emp_rates_duties.ref_section_id','left'),
                            array('ref_branch','ref_branch.ref_branch_id=emp_rates_duties.ref_branch_id','left'),
                            array('ref_payment_type','ref_payment_type.ref_payment_type_id=emp_rates_duties.ref_payment_type_id','left'),
                            )                    
                        );

                $response['row_update'] = $this->Employee_model->get_list(
                   array('employee_list.employee_id='=>$employee_id,'employee_list.is_deleted'=>FALSE),
                    'employee_list.*,ref_employment_type.employment_type,ref_department.department,ref_position.position,ref_branch.branch,ref_section.section,
                    ref_religion.religion,ref_payment_type.payment_type',
                    array(
                            array('emp_rates_duties','emp_rates_duties.emp_rates_duties_id=employee_list.emp_rates_duties_id','left'),
                            array('ref_employment_type','ref_employment_type.ref_employment_type_id=emp_rates_duties.ref_employment_type_id','left'),
                            array('ref_department','ref_department.ref_department_id=emp_rates_duties.ref_department_id','left'),
                            array('ref_position','ref_position.ref_position_id=emp_rates_duties.ref_position_id','left'),
                            array('ref_branch','ref_branch.ref_branch_id=emp_rates_duties.ref_branch_id','left'),
                            array('ref_section','ref_section.ref_section_id=emp_rates_duties.ref_section_id','left'),
                            array('ref_payment_type','ref_payment_type.ref_payment_type_id=emp_rates_duties.ref_payment_type_id','left'),
                            array('ref_religion','ref_religion.ref_religion_id=employee_list.ref_religion_id','left'),
                            ) 
                    );
                echo json_encode($response);

                break;

            case 'test':
function replaceCharsInNumber($num, $chars) {
   return substr((string) $num, 0, -strlen($chars)) . $chars;
}

$format = "000000";
$temp = replaceCharsInNumber($format, '200'); //5069xxx
$ecode = $temp .'-'. $today = date("Y");
echo $ecode;


                break;
        }
    }











}
