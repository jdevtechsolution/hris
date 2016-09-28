<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <title>JCORE - <?php echo $title; ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenxo Admin Theme">
    <meta name="author" content="">

    <?php echo $_def_css_files; ?>

    <link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">

    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">



    <link type="text/css" href="assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">              <!-- iCheck -->
    <link type="text/css" href="assets/plugins/iCheck/skins/minimal/_all.css" rel="stylesheet">                   <!-- Custom Checkboxes / iCheck -->
	
    <link href="assets/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">


    <link href="assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <style>

        .toolbar{
            float: left;
        }

        td.details-control {
            background: url('assets/img/Folder_Closed.png') no-repeat center center;
            cursor: pointer;
        }
        tr.details td.details-control {
            background: url('assets/img/Folder_Opened.png') no-repeat center center;
        }

        td.details-control1 {
            background: url('assets/img/Folder_Closed.png') no-repeat center center !important;
            cursor: pointer;
        }
        tr.details1 td.details-control1 {
            background: url('assets/img/Folder_Opened.png') no-repeat center center;
        }

        .child_table{
            padding: 5px;
            border: 1px #ff0000 solid;
        }

        .glyphicon.spinning {
            animation: spin 1s infinite linear;
            -webkit-animation: spin2 1s infinite linear;
        }
        .select2-container{
            min-width: 100%;
        }
        @keyframes spin {
            from { transform: scale(1) rotate(0deg); }
            to { transform: scale(1) rotate(360deg); }
        }

        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg); }
            to { -webkit-transform: rotate(360deg); }
        }

        .numeric{
            text-align: left;
            width: 100%;
        }

    </style>

</head>

<body class="animated-content" style="font-family: tahoma;">

<?php echo $_top_navigation; ?>

<div id="wrapper">
    <div id="layout-static">

        <?php echo $_side_bar_navigation;?>

        <div class="static-content-wrapper white-bg">
            <div class="static-content" >
                <div class="page-content">

                    <ol class="breadcrumb" style="margin-bottom:0px;">
                        <li><a href="dashboard">Dashboard</a></li>
                        <li><a href="employee">Employee</a></li>
                    </ol>

                    <div class="container-fluid">

                        <div id="div_product_list">
                            <div class="panel panel-default">
                                        <button class="btn"  id="btn_new" style="width:185px;font-family: Tahoma, Georgia, Serif;background-color:#2ecc71;color:white;margin-top:10px;margin-left:17px;" title="Create New Employee" >
                                        <i class="fa fa-user-plus"></i> New Employee</button>
                                        <button class="btn"  id="edit_duties" style="width:185px;font-family: Tahoma, Georgia, Serif;background-color:#2ecc71;color:white;margin-top:10px;margin-left:px;" title="Create New Employee" >
                                        <i class="fa fa-area-chart"></i> Rates and Duties</button>
                                        <div class="panel-heading" style="background-color:#2c3e50 !important;margin-top:5px;margin-left:17px;margin-right:17px;border-radius:5px;">
                                             <center><h2 style="color:white;font-weight:300;">Employee List</h2></center>
                                        </div>
                                    <div class="panel-body table-responsive" style="padding-top:8px;">
                                        <table id="tbl_employee_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th>First Name</th>
                                                    <th>Middle Name</th>
                                                    <th>Last Name</th>
                                                    <th><center>Action</center></th>
                                                 </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>

                                <div class="panel-footer"></div>
                            </div> <!--panel default -->

                        </div> <!--rates and duties list -->

                        <div id="div_product_fields" style="display: none;">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color:#2ecc71 !important;margin-top:5px;border-radius:5px;">
                                             <center><h2 style="color:white;font-weight:bold;">Personal Information</h2></center>
                                        </div>

                                    <div class="panel-body">
                                        <form id="frm_employee" role="form" class="form-horizontal row-border">
                                                <div class="container-fluid">
                                                    <div class="col-md-9">
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">*ID Number</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="emp_idnumber" class="form-control" value="" data-error-msg="ID Number is required!" required>
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">*First Name</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="emp_fname" class="form-control" value="" data-error-msg="First Name is required!" required>
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">*Middle Name</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="emp_mname" class="form-control" value="" data-error-msg="Middle Name is required!" required>
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">*Last Name</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="emp_lname" class="form-control" value="" data-error-msg="Last Name is required!" required>
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Address 1:</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="emp_address1" class="form-control" value="" data-error-msg="Address 1 is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Address 2:</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="emp_address2" class="form-control" value="" data-error-msg="Address 2 is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Email Address:</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="emp_email" class="form-control" value="" data-error-msg="Email Address 1 is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Gender:</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                               <select class="form-control" name="emp_gender" data-error-msg="Gender 1 is required!">
                                                                  <option>Male</option>
                                                                  <option>Female</option>
                                                                </select>
                                                                </div>
                                                          </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                             <label class="control-label boldlabel" style="text-align:left;">Cell No:</label>
                                                        </div>
                                                        <div class="col-md-3.5">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="emp_cell" class="form-control" value="" data-error-msg="Cell No is required!">
                                                                </div>
                                                          </div>
                                                        </div>

                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Birthdate:</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="emp_birthdate" class="date-picker form-control" value="" placeholder="Birthdate" data-error-msg="Birth Date is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        
                                                        <div class="col-md-2">
                                                             <label class="control-label boldlabel" style="text-align:left;">Tel No:</label>
                                                        </div>
                                                        <div class="col-md-3.5">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="emp_phone" class="form-control" value="" data-error-msg="TelePhone Number is required!">
                                                                </div>
                                                          </div>
                                                        </div>

                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Religion:</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <select class="form-control" id="emp_religion" name="emp_religion" data-error-msg="Religion is required!">
                                                                    <option value="select">Select Religion</option>
                                                                      <option value="0">[Create Religion]</option>
                                                                      <?php
                                                                    foreach($ref_religion as $row)
                                                                    {
                                                                        echo '<option value="'.$row->ref_religion_id  .'">'.$row->religion.'</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                                </div>
                                                          </div>
                                                        </div>
                                                        
                                                        <div class="col-md-2">
                                                             <label class="control-label boldlabel" style="text-align:left;">Blood:</label>
                                                        </div>
                                                        <div class="col-md-3.5">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="emp_bloodtype" class="form-control" value="" data-error-msg="Blood Type is required!">
                                                                </div>
                                                          </div>
                                                        </div>

                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Civil Status:</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <select class="form-control" id="emp_civilstatus" name="emp_civilstatus" data-error-msg="Civil Status is required!">
                                                                  <option>Single</option>
                                                                  <option>Married</option>
                                                                  <option>Divorced</option>
                                                                  <option>Widowed</option>
                                                                  <option>Separated</option>
                                                                </select>
                                                                </div>
                                                          </div>
                                                        </div>
                                                        
                                                        <div class="col-md-2">
                                                             <label class="control-label boldlabel" style="text-align:left;">Height:</label>
                                                        </div>
                                                        <div class="col-md-3.5">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="emp_height" class="form-control" value="" data-error-msg="Height is required!">
                                                                </div>
                                                          </div>
                                                        </div>

                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             
                                                        </div>
                                                        <div class="col-md-4">
                                                          
                                                        </div>
                                                        
                                                        <div class="col-md-2">
                                                             <label class="control-label boldlabel" style="text-align:left;">Weight:</label>
                                                        </div>
                                                        <div class="col-md-3.5">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="emp_weight" class="form-control" value="" data-error-msg="Weight is required!">
                                                                </div>
                                                          </div>
                                                        </div>

                                                        </div>

                                                    </div><!--end of 1st date entry -->

                                                    <div class="col-md-3">
                                                        
                                                        <div class="col-md-12">
                                                              <label class="control-label boldlabel" style="text-align:left;"><i class="fa fa-user" aria-hidden="true"></i>Employee Image</label>
                                                                <hr style="margin-top:0px !important;height:1px;background-color:black;"></hr>
                                                        </div>
                                                        <div style="width:100%; height:300px;border:2px solid #34495e;border-radius:5px;">
                                                        <center><img src="assets/img/anonymous-icon.png"></img></center>
                                                        <hr style="margin-top:0px !important;height:1px;background-color:black;"></hr>
                                                        <center>
                                                             <button type="button" style="width:150px;margin-bottom:5px;" class="btn btn-primary">Browse Photo</button>
                                                             <button type="button" style="width:150px;" class="btn btn-danger">Remove</button>
                                                           
                                                    </div>
                                                      
                                                    </div> <!--end of 1st date entry -->

                                                        <div class="col-md-12">
                                                        
                                                              <label class="control-label boldlabel" ><i class="fa fa-calendar" aria-hidden="true"></i> Employment Date</label>
                                                        <hr style="margin-top:0px !important;height:1px;background-color:black;">
                                                        </hr>
                                                        

                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Date Employment:</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                 <input type="text" name="emp_employmentdate" class="date-picker form-control" value="" placeholder="Employment Date" data-error-msg="Employment Date is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Date Regularization:</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="emp_regularizationdate" class="date-picker form-control" value="" placeholder="Regularization Date" data-error-msg="Regularization Date is required!" disabled>
                                                                </div>
                                                          </div>
                                                        </div>

                                                        

                                                       <div class="col-md-12">
                                                        
                                                              <label class="control-label boldlabel" ><i class="fa fa-user" aria-hidden="true"></i> Other Information</label>
                                                        <hr style="margin-top:0px !important;height:1px;background-color:black;">
                                                        </hr>
                                                        

                                                        </div>
                                                        <!--input1-->
                                                        <div class="col-md-8">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">SSS Number:</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="emp_sss" class="form-control" value="" data-error-msg="SSS is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <!--input1-->


                                                        <div class="col-md-8">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Phil. Health:</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="emp_philhealth" class="form-control" value="" data-error-msg="Phil. Health is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Pag Ibig:</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="emp_pagibig" class="form-control" value="" data-error-msg="Pag Ibig is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">TIN:</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="emp_tin" class="form-control" value="" data-error-msg="Tin is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Account No.:</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <input type="text" name="emp_accountno" class="form-control" value="" data-error-msg="Account Number is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        
                                                        <div class="col-md-2">
                                                             <label class="control-label boldlabel" style="text-align:left;">Process?</label>
                                                        </div>
                                                        <div class="col-md-3.5">
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <select class="form-control" id="emp_processaccount" name="emp_processaccount" data-error-msg="Process Account is required!">
                                                                  <option value="0">No</option>
                                                                  <option value="1">Yes</option>
                                                                </select>
                                                                </div>
                                                          </div>
                                                        </div>

                                                        </div>
                                                        <div class="col-md-8">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Tax Code</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <select class="form-control" id="emp_taxcode" name="emp_taxcode" data-error-msg="Tax Code is required!">
                                                                  <option value="0">No</option>
                                                                  <option value="1">Yes</option>
                                                                </select>
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                        
                                                              <label class="control-label boldlabel" ><i class="fa fa-user" aria-hidden="true"></i> Exemption</label>
                                                        <hr style="margin-top:0px !important;height:1px;background-color:black;">
                                                        </hr>
                                                        

                                                        </div>
                                                        <div class="col-md-6">
                                                        <div class="col-md-4">
                                                             <label class="control-label boldlabel" style="text-align:left;">SSS :</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <select class="form-control" id="emp_exemptss" name="emp_exemptss" data-error-msg="SSS exempt is required!">
                                                                  <option value="0">No</option>
                                                                  <option value="1">Yes</option>
                                                                </select>
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <div class="col-md-4">
                                                             <label class="control-label boldlabel" style="text-align:left;">Phil Health :</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <select class="form-control" id="emp_exemptpagibig" name="emp_exemptpagibig" data-error-msg="Pag-Ibig is required!">
                                                                  <option value="0">No</option>
                                                                  <option value="1">Yes</option>
                                                                </select>
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <div class="col-md-4">
                                                             <label class="control-label boldlabel" style="text-align:left;">Pag-Ibig :</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                <select class="form-control" id="emp_exemptphilhealth" name="emp_exemptphilhealth" data-error-msg="Phil health is required!">
                                                                  <option value="0">No</option>
                                                                  <option value="1">Yes</option>
                                                                </select>
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                        
                                                              <label class="control-label boldlabel" ><i class="fa fa-user" aria-hidden="true"></i> Loan</label>
                                                        <hr style="margin-top:0px !important;height:1px;background-color:black;">
                                                        </hr>
                                                        

                                                        </div>
                                                        <div class="col-md-6">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Loan Date:</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                 <input type="text" name="emp_loandate" class="date-picker form-control" value="" placeholder="Loan Date" data-error-msg="Employment Date is required!">
                                                                </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <div class="col-md-3">
                                                             <label class="control-label boldlabel" style="text-align:left;">Amount :</label>
                                                        </div>
                                                          <div class="form-group">
                                                             
                                                                <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-file-code-o"></i>
                                                                 </span>
                                                                 <input type="text" name="emp_loanamount" class="form-control" value="" placeholder="Loan Amount" data-error-msg="Loan Amount is required!">
                                                                </div>
                                                          </div>
                                                        </div>


                                                    <br/>
                                                </form>
                                    </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <button id="btn_save" class="btn-primary btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Save Changes</button>
                                            <button id="btn_cancelempfields" class="btn-default btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end of div employee fields -->
                    </div> 
                   
                            
                        <div id="div_rates_duties_list" style="display:none;">
                           
                            <div class="panel panel-default">
                                <button class="btn"  id="btn_cancelratesandduties" style="width:50px;font-family: Tahoma, Georgia, Serif;background-color:#e74c3c;color:white;margin-top:10px;margin-left:17px;" title="Create New Employee" >
                                    <span class="glyphicon glyphicon-arrow-left"></span>
                
                                <button class="btn"  id="btn_newratesandduties" style="width:120;font-family: Tahoma, Georgia, Serif;background-color:#2ecc71;color:white;margin-top:10px;margin-left:5px;" title="Create New Employee" >
                                    <i class="fa fa-file"></i> New </button>
                                <button class="btn"  id="" style="width:120;font-family: Tahoma, Georgia, Serif;background-color:#3498db;color:white;margin-top:10px;margin-left:0px;" title="Name" >
                                   <displayname id="display_name"></displayname> </button>
                                    
                                        <div class="panel-heading" style="background-color:#2c3e50 !important;margin-top:5px;margin-left:17px;margin-right:17px;border-radius:5px;">
                                             <center><h2 style="color:white;font-weight:300;">Rates and Duties</h2></center>
                                        </div>

                                    <div class="panel-body table-responsive" style="padding-top:5px;">
                                        <table id="tbl_rates_duties_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Employment Type</th>
                                                    <th>Date Start</th>
                                                    <th>Date End</th>
                                                    <th><center>Action</center></th>
                                                 </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>

                                <div class="panel-footer"></div>
                            </div> <!--panel default -->

                        </div> <!--rates and duties list -->

                    </div><!-- .container-fluid -->
                </div> <!-- #page-content -->
            </div><!--static content -->
            
        </div><!--content wrapper -->
    </div><!--static layout -->
</div> <!--wrapper -->

            <div id="modal_confirmation" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title"><span id="modal_mode"> </span>Confirm Deletion</h4>
                        </div>

                        <div class="modal-body">
                            <p id="modal-body-message">Are you sure ?</p>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                            <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
                </div>

                <div id="modal_confirmation_rates" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title"><span id="modal_mode"> </span>Confirm Deletion</h4>
                        </div>

                        <div class="modal-body">
                            <p id="modal-body-message">Are you sure ?</p>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_yes_rates" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                            <button id="btn_close_rates" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
                </div>

                <div id="modal_create_religion" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#27ae60;">
                            <button type="button" style="color:white;" class="close"  data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:white;"><span id="modal_mode"> </span>Create Religion</h4>
                        </div>

                        <div class="modal-body">
                            <form id="frm_religion">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Religion Name :</label>
                                    <input type="text" class="form-control" id="religion" name="religion" placeholder="Department name" data-error-msg="Department name is Required!" required>
                                </div>
                              </div>
                            </div><br>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Description :</label>
                                    <textarea type="text" class="form-control" id="description" name="description" placeholder="Department Description"></textarea>
                                </div>
                              </div>
                            </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_new_religion" type="button" class="btn btn-success" data-dismiss="modal">Create</button>
                            <button id="btn_close_religion" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
                </div>

                <div id="modal_rates_details" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#34495e;">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true" style="color:#ecf0f1;">X</button>
                            <h4 class="modal-title" style="color:#ecf0f1;"><span id="modal_mode"> </span>Rates and Duties Details</h4>
                        </div>

                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="col-md-12">
                                <h3 class="boldlabel"><span class="fa fa-circle fa-lg"></span> <text id="employment_type"></text></h3>
                                <p class="boldlabel">[ Position : <text id="position"> </text>] [ Department : <text id="department"></text>]</p>
                                <hr style="height:1px;background-color:black;"></hr>
                                </div>
                                
                                <div class="col-md-12">

                                <div class="col-md-4"><p class="nomargin"><b>Date Start</b> : <text id="date_start"></p>
                                <p class="nomargin"><b>Date End</b> : <text id="date_end"></text></p>
                                <p class="nomargin"><b>Section</b> : <text id="section"></text></p>
                                <p class="nomargin"><b>Branch</b> : <text id="branch"></text></p>
                                <p class="nomargin"><b>Payment Type</b> : <text id="payment_type"></text></p>
                                <p class="nomargin"><b>Level</b> : <text id="level"></text></p>
                                </div>
                                <div class="col-md-4">
                                <p class="nomargin"><b>Salary Reg Rates :</b><text id="salary_reg_rates"></text></p>
                                <p class="nomargin"><b>Daily Rate :</b> :<text id="daily_rate"></text></p>
                                <p class="nomargin"><b>Rate Factor </b> :<text id="daily_rate_factor"></text> </p>
                                <p class="nomargin"><b>SSS PHIC Salary Credit</b> :<text id="sss_phic_salary_credit"></text></p>
                                <p class="nomargin"><b>Pagibig Salary Credit</b> :<text id="pagibig_salary_credit"></text></p>
                                <p class="nomargin"><b>Tax Shield</b> :<text id="tax_shield"></text></p>
                                </div>
                                <div class="col-md-4">
                                <p class="nomargin"><b>Remarks :</b><br><text id="remarks"></text><br></p>
                                </div>
                                </div>
                                </div>
                        </div>

                        <div class="modal-footer" style="padding:10px;">
                            <button id="btn_close_details" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
                </div>
			

            <div id="modal_create_ratesandduties" class="modal fade modal_create_ratesandduties" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#2ecc71;">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:#ecf0f1;"><span id="modal_mode"> </span>Rates and Duties : New</h4>
                            <p style="color:white;margin:0px;" id="dataname">aw</p>
                        </div>

                        <div class="modal-body">
                            <form id="frm_ratesandduties">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label class="boldlabel" style="margin-bottom:0px;">Employee Type:</label>
                                          <select class="form-control" id="ref_employment_type_id" name="ref_employment_type_id" id="sel1">
                                            <option value="0">[ Create Employment Type ]</option>
                                            <?php
                                                                foreach($ref_emptype as $row)
                                                                {
                                                                    echo '<option value="'.$row->ref_employment_type_id  .'">'.$row->employment_type.'</option>';
                                                                }
                                                                ?>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label class="boldlabel" style="margin-bottom:0px;">Pay Type:</label>
                                          <select class="form-control" id="ref_payment_type_id" name="ref_payment_type_id" id="sel1">
                                            <option value="0">[ Create Payment Type ]</option>
                                          <?php
                                                                foreach($ref_payment as $row)
                                                                {
                                                                    echo '<option value="'.$row->ref_payment_type_id  .'">'.$row->payment_type.'</option>';
                                                                }
                                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label class="boldlabel" style="margin-bottom:0px;">Department:</label>
                                          <select class="form-control" id="ref_department_id" name="ref_department_id" id="sel1">
                                            <option value="0">[ Create Employment Type ]</option>
                                           <?php
                                                                foreach($ref_department as $row)
                                                                {
                                                                    echo '<option value="'.$row->ref_department_id  .'">'.$row->department.'</option>';
                                                                }
                                                                ?>
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label class="boldlabel" style="margin-bottom:0px;">Position:</label>
                                          <select class="form-control" id="ref_position_id" name="ref_position_id" id="sel1">
                                            <option value="0">[ Create Employment Type ]</option>
                                            <?php
                                                                foreach($ref_position as $row)
                                                                {
                                                                    echo '<option value="'.$row->ref_position_id  .'">'.$row->position.'</option>';
                                                                }
                                                                ?>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label class="boldlabel" style="margin-bottom:0px;">Branch:</label>
                                          <select class="form-control"  id="ref_branch_id" name="ref_branch_id" id="sel1">
                                            <option value="0">[ Create Employment Type ]</option>
                                            <?php
                                                                foreach($ref_branch as $row)
                                                                {
                                                                    echo '<option value="'.$row->ref_branch_id  .'">'.$row->branch.'</option>';
                                                                }
                                                                ?>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label class="boldlabel" style="margin-bottom:0px;">Section:</label>
                                          <select class="form-control" id="ref_section_id"  name="ref_section_id" id="sel1">
                                            <option value="0">[ Create Employment Type ]</option>
                                            <?php
                                                                foreach($ref_section as $row)
                                                                {
                                                                    echo '<option value="'.$row->ref_section_id  .'">'.$row->section.'</option>';
                                                                }
                                                                ?>
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label for="employeetype" class="boldlabel" style="margin-bottom:0px;">Date Start:</label>
                                          <input type="text" name="date_start" class="date-picker form-control" value="" placeholder="Date Start" data-error-msg="Date Start is required!">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label for="employeetype" class="boldlabel" style="margin-bottom:0px;">Date End:</label>
                                          <input type="text" name="date_end" class="date-picker form-control" value="" placeholder="Date End" data-error-msg="Date End is required!" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label for="employeetype" class="boldlabel" style="margin-bottom:0px;">Level:</label>
                                          <input type="text" name="level" class="form-control numeric" placeholder="level">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label for="employeetype" class="boldlabel" style="margin-bottom:0px;">Salary Reg Rates:</label>
                                          <input type="text" name="salary_reg_rates" class="form-control numeric" placeholder="Salary Reg Rates">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label for="employeetype" class="boldlabel" style="margin-bottom:0px;">Daily Rates</label>
                                          <input type="text" name="daily_rate"class="form-control numeric">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label for="employeetype" class="boldlabel" style="margin-bottom:0px;">Factor:</label>
                                          <input type="text" name="daily_rate_factor" class="form-control numeric" placeholder="Factor">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label for="employeetype" class="boldlabel" style="margin-bottom:0px;">SSS PHIC Salary Credit:</label>
                                          <input type="text" name="sss_phic_salary_credit"class="form-control numeric" placeholder="SSS PHIC Salary Credit">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label for="employeetype" class="boldlabel" style="margin-bottom:0px;">Pag-Ibig Salary Credit:</label>
                                          <input type="text" name="pagibig_salary_credit" class="form-control numeric" placeholder="Pag-Ibig Salary Credit">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label for="employeetype" class="boldlabel" style="margin-bottom:0px;">Tax Shield:</label>
                                          <input type="text" name="tax_shield" class="form-control numeric" placeholder="Factor">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group" style="margin-bottom:2px; !important">
                                          <label for="employeetype" class="boldlabel" style="margin-bottom:0px;">Remarks:</label>
                                          <textarea type="text" name="remarks" class="form-control" placeholder="Factor"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_createratesandduties" type="button" class="btn" style="background-color:#2ecc71;color:white;"data-dismiss="modal">Create</button>
                            <button id="btn_cancelcreateratesandduties" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div><!---content---->
                </div>
                </div>
            </div><!---modal-->

                <div id="modal_create_employment" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#27ae60;">
                            <button type="button" style="color:white;" class="close"  data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:white;"><span id="modal_mode"> </span>Create Employment Type</h4>
                        </div>

                        <div class="modal-body">
                            <form id="frm_employment_type">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Employment Name :</label>
                                    <input type="text" class="form-control" id="employment_type" name="employment_type" placeholder="Employment name" data-error-msg="Department name is Required!" required>
                                </div>
                              </div>
                            </div><br>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Description :</label>
                                    <textarea type="text" class="form-control" id="description" name="description" placeholder="Department Description"></textarea>
                                </div>
                              </div>
                            </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_new_employment_type" type="button" class="btn btn-success" data-dismiss="modal">Create</button>
                            <button id="btn_close_religion" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
                </div>

                <div id="modal_create_paymenttype" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#27ae60;">
                            <button type="button" style="color:white;" class="close"  data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:white;"><span id="modal_mode"> </span>Create Payment Type</h4>
                        </div>

                        <div class="modal-body">
                            <form id="frm_payment_type">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Payment Name :</label>
                                    <input type="text" class="form-control" id="payment_type" name="payment_type" placeholder="Payment name" data-error-msg="Department name is Required!" required>
                                </div>
                              </div>
                            </div><br>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Description :</label>
                                    <textarea type="text" class="form-control" id="description" name="description" placeholder="Department Description"></textarea>
                                </div>
                              </div>
                            </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_new_payment_type" type="button" class="btn btn-success" data-dismiss="modal">Create</button>
                            <button id="btn_close_payment_type" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
                </div>

                <div id="modal_create_department" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#27ae60;">
                            <button type="button" style="color:white;" class="close"  data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:white;"><span id="modal_mode"> </span>Create Department</h4>
                        </div>

                        <div class="modal-body">
                            <form id="frm_department">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Department Name :</label>
                                    <input type="text" class="form-control" id="department" name="department" placeholder="Department name" data-error-msg="Department name is Required!" required>
                                </div>
                              </div>
                            </div><br>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Description :</label>
                                    <textarea type="text" class="form-control" id="description" name="description" placeholder="Department Description"></textarea>
                                </div>
                              </div>
                            </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_new_department" type="button" class="btn btn-success" data-dismiss="modal">Create</button>
                            <button id="btn_close_department" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
                </div>

                <div id="modal_create_position" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#27ae60;">
                            <button type="button" style="color:white;" class="close"  data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:white;"><span id="modal_mode"> </span>Create Position</h4>
                        </div>

                        <div class="modal-body">
                            <form id="frm_position">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Position Name :</label>
                                    <input type="text" class="form-control" id="position" name="position" placeholder="Position name" data-error-msg="Department name is Required!" required>
                                </div>
                              </div>
                            </div><br>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Description :</label>
                                    <textarea type="text" class="form-control" id="description" name="description" placeholder="Position Description"></textarea>
                                </div>
                              </div>
                            </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_new_position" type="button" class="btn btn-success" data-dismiss="modal">Create</button>
                            <button id="btn_close_position" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
                </div>

                <div id="modal_create_branch" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#27ae60;">
                            <button type="button" style="color:white;" class="close"  data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:white;"><span id="modal_mode"> </span>Create Branch</h4>
                        </div>

                        <div class="modal-body">
                            <form id="frm_branch">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Branch Name :</label>
                                    <input type="text" class="form-control" id="branch" name="branch" placeholder="Branch name" data-error-msg="Branch name is Required!" required>
                                </div>
                              </div>
                            </div><br>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Description :</label>
                                    <textarea type="text" class="form-control" id="description" name="description" placeholder="Branch Description"></textarea>
                                </div>
                              </div>
                            </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_new_branch" type="button" class="btn btn-success" data-dismiss="modal">Create</button>
                            <button id="btn_close_branch" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
                </div>

                <div id="modal_create_section" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#27ae60;">
                            <button type="button" style="color:white;" class="close"  data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:white;"><span id="modal_mode"> </span>Create Section</h4>
                        </div>

                        <div class="modal-body">
                            <form id="frm_section">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Section Name :</label>
                                    <input type="text" class="form-control" id="section" name="section" placeholder="Branch name" data-error-msg="Section name is Required!" required>
                                </div>
                              </div>
                            </div><br>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group" style="margin-bottom:0px;">
                                    <label class="boldlabel">Description :</label>
                                    <textarea type="text" class="form-control" id="description" name="description" placeholder="Section Description"></textarea>
                                </div>
                              </div>
                            </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_new_section" type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                            <button id="btn_close_section" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
                </div>



<?php echo $_switcher_settings; ?>
<?php echo $_def_js_files; ?>


<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>


<!-- Date range use moment.js same as full calendar plugin -->
<script src="assets/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Select2 -->
<script src="assets/plugins/select2/select2.full.min.js"></script>


<!-- Date range use moment.js same as full calendar plugin -->
<script src="assets/js/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- twitter typehead -->
<script src="assets/plugins/twittertypehead/handlebars.js"></script>
<script src="assets/plugins/twittertypehead/bloodhound.min.js"></script>
<script src="assets/plugins/twittertypehead/typeahead.bundle.min.js"></script>
<script src="assets/plugins/twittertypehead/typeahead.jquery.min.js"></script>

<!-- touchspin -->
<script type="text/javascript" src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"></script>

<!-- numeric formatter -->
<script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>



<script>

$(document).ready(function(){
    var dt; var _txnMode; var _txnModeRate; var _selectedID; var _selectRowObj; var _isChecked;

    var initializeControls=function(){
        dt=$('#tbl_employee_list').DataTable({
            "dom": '<"toolbar">frtip',

            "bLengthChange":false,

            "ajax" : "Employee/transaction/list",
            "columns": [
                {
                    targets:[0],
                    render: function (data, type, full, meta){
                        var check='<input id="check1" type="checkbox" class="single-checkbox" name="check1" value="check1" /><br/>';
                        return '<center>'+check+'</center>';
                    }
                },
                {
                    "targets": [1],
                    "class":          "details-control",
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ""
                },
                { targets:[2],data: "emp_fname" },
                { targets:[3],data: "emp_mname" },
                { targets:[4],data: "emp_lname" },
                {
                    targets:[5],
                    render: function (data, type, full, meta){
                        var btn_duties='<button class="btn btn-default btn-sm" name="edit_duties"  data-toggle="tooltip" data-placement="top" title="Rates And Duties"><i class="fa fa-briefcase fa-lg" aria-hidden="true"></i> </button>';
                        var btn_edit='<button class="btn btn-default btn-sm" name="edit_info"   data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil fa-lg"></i> </button>';
                        var btn_trash='<button class="btn btn-default btn-sm" name="remove_info"  data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o fa-lg"></i> </button>';

                        return '<center>'+btn_duties+btn_edit+btn_trash+'</center>';
                    }
                }

            ],
            language: {
                         searchPlaceholder: "Search Employee"
                     },
            "rowCallback":function( row, data, index ){

                $(row).find('td').eq(5).attr({
                    "align": "right"
                });
            }
        });






        $('.numeric').autoNumeric('init');


    }();

    var getratesandduties=function(){
                    dt_rates=$('#tbl_rates_duties_list').DataTable({

            "dom": '<"toolbar">frtip',
            "bLengthChange":false,
            "ajax": {
            "url": "RatesDuties/transaction/testlist",
            "type": "POST",
            "bDestroy": true,
            "data": function ( d ) {
                return $.extend( {}, d, {
                    "employee_id": _selectedID
                    } );
                }
            },
            "columns": [
                {
                    "targets": [0],
                    "class":          "details-control1",
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": "",
                    "bDestroy": true,
                },
                { targets:[1],data: "employment_type" },
                { targets:[2],data: "date_start" },
                { targets:[3],data: "date_end" },
                {
                    targets:[4],
                    render: function (data, type, full, meta){
                        var btn_edit='<button class="btn btn-default btn-sm" name="rates_duties_edit"   data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </button>';
                        var btn_trash='<button class="btn btn-default btn-sm" name="rates_duties_remove"  data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>';

                        return '<center>'+btn_edit+btn_trash+'</center>';
                    }
                }
            ],
            language: {
                         searchPlaceholder: "Search Rates and Duties"
                     },
            "rowCallback":function( row, data, index ){

                $(row).find('td').eq(10).attr({
                    "align": "right"
                });
            }

        });

    }
	
    var bindEventHandlers=(function(){
        var detailRows = [];
         var detailRows1 = [];

        $('#tbl_employee_list tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();

                detailRows.splice( idx, 1 );
            }
            else {
                tr.addClass( 'details' );

                row.child( format( row.data() ) ).show();

                if ( idx === -1 ) {
                    detailRows.push( tr.attr('id') );
                }
            }
        } );


     $('#tbl_rates_duties_list tbody').on( 'click', 'tr td.details-control1', function () {
            _selectRowObj=$(this).closest('tr');
            var data=dt_rates.row(_selectRowObj).data();
            _selectedID=data.employee_rates_duties_id;

            $('#employment_type').text(data.employment_type);
            $('#position').text(data.position);
            $('#department').text(data.department);
            $('#date_start').text(data.date_start);
            $('#date_end').text(data.date_end);
            $('#section').text(data.section);
            $('#branch').text(data.branch);
            $('#payment_type').text(data.payment_type);
            $('#level').text(data.level);
            $('#salary_reg_rates').text(data.salary_reg_rates);
            $('#daily_rate').text(data.daily_rate);
            $('#daily_rate_factor').text(data.daily_rate_factor);
            $('#sss_phic_salary_credit').text(data.sss_phic_salary_credit);
            $('#pagibig_salary_credit').text(data.pagibig_salary_credit);
            $('#tax_shield').text(data.tax_shield);
            $('#remarks').text(data.remarks);
            
            $('#modal_rates_details').modal('show');

        } );

     /*   $('#tbl_rates_duties_list tbody').on( 'click', 'tr td.details-control1', function () {
            var tr = $(this).closest('tr');
            var row = dt_rates.row( tr );
            var idx1 = $.inArray( tr.attr('id'), detailRows1 );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details1' );
                row.child.hide();

                detailRows1.splice( idx1, 1 );
            }
            else {
                tr.addClass( 'details1' );

                row.child( format1( row.data() ) ).show();

                if ( idx1 === -1 ) {
                    detailRows1.push( tr.attr('id') );
                }
            }
        } );*/

            //singlee checkbox EZ trick by jbpv
            $('#tbl_employee_list tbody').on('change','input[class="single-checkbox"]',function(){
            $('.single-checkbox').attr('checked', false);
            $('.single-checkbox').closest("tr").css('background-color','white');
            this.checked = true;
            var x = this.checked = true;

            $(this).closest("tr").css('background-color','#bdc3c7');
                _selectRowObj=$(this).closest('tr');
                var data=dt.row(_selectRowObj).data();
                _selectedID=data.employee_id;
                _selectedname= '[Name : ' + data.emp_fname +' ' + data.emp_mname + ' ' + data.emp_lname + ']';
                _selectedname1= data.emp_fname +' ' + data.emp_mname + ' ' + data.emp_lname;
                //alert(_selectedID);
                _isChecked = this.checked = true;
             
            });

        $('#edit_duties').click(function(){
            if(_isChecked == true){
               _txnMode="ratesduties";
                $('#dataname').text(_selectedname);
                $('#display_name').text(_selectedname1);
                //alert(_selectedID);
                hideemployeeList();
                hideemployeeFields();
                showRatesduties();
                getratesandduties(); 
            }
            else{
                alert("nothing checked");
            }
            
        });

//SELECT CREATE OPTION WITH TXNMODE
        $('#emp_religion').change(function() {
            var a = $('#emp_religion').val();
            if(a=="0"){
                _txnMode="religion";
                $('#modal_create_religion').modal('show');
                return;
            }
            else{

            }
        });

        $('#ref_employment_type_id').change(function() {
            var a = $('#ref_employment_type_id').val();
            if(a=="0"){
                _txnModeRate="employment";
                $('#modal_create_employment').modal('show');
                return;
            }
            else{

            }
        });

        $('#ref_payment_type_id').change(function() {
            var a = $('#ref_payment_type_id').val();
            if(a=="0"){
                _txnModeRate="paymenttype";
                $('#modal_create_paymenttype').modal('show');
                return;
            }
            else{

            }
        });

        $('#ref_department_id').change(function() {
            var a = $('#ref_department_id').val();
            if(a=="0"){
                _txnModeRate="department";
                $('#modal_create_department').modal('show');
                return;
            }
            else{

            }
        });

        $('#ref_position_id').change(function() {
            var a = $('#ref_position_id').val();
            if(a=="0"){
                _txnModeRate="position";
                $('#modal_create_position').modal('show');
                return;
            }
            else{

            }
        });

        $('#ref_branch_id').change(function() {
            var a = $('#ref_branch_id').val();
            if(a=="0"){
                _txnModeRate="branch";
                $('#modal_create_branch').modal('show');
                return;
            }
            else{

            }
        });

        $('#ref_section_id').change(function() {
            var a = $('#ref_section_id').val();
            if(a=="0"){
                _txnModeRate="section";
                $('#modal_create_section').modal('show');
                return;
            }
            else{

            }
        });

        $('#btn_new').click(function(){
            clearFields($('#frm_employee'))
            _txnMode="new";
            hideemployeeList();
            hideRatesduties();
            showemployeeFields();
        });

        $('#btn_newratesandduties').click(function(){
            clearFields($('#frm_ratesandduties'));
            _txnMode="newrateandduties";

            $('#ref_employment_type_id').val(1);
            $('#ref_payment_type_id').val(1);
            $('#ref_department_id').val(1);
            $('#ref_position_id').val(1);
            $('#ref_branch_id').val(1);
            $('#ref_section_id').val(1);

            $('#modal_create_ratesandduties').modal('show');
            
        });

        $('#tbl_employee_list tbody').on('click','button[name="edit_duties"]',function(){

            _txnMode="ratesduties";
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.employee_id;
            _selectedname= '[Name : ' + data.emp_fname +' ' + data.emp_mname + ' ' + data.emp_lname + ']';
            _selectedname1= data.emp_fname +' ' + data.emp_mname + ' ' + data.emp_lname;
            $('#dataname').text(_selectedname);
            $('#display_name').text(_selectedname1);
            //alert(_selectedID);
            hideemployeeList();
            hideemployeeFields();
            showRatesduties();
            getratesandduties();
        });

        $('#tbl_employee_list tbody').on('click','button[name="edit_info"]',function(){
            _txnMode="edit";
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.employee_id;

			$('#emp_civilstatus').val(data.emp_civilstatus);
            $('#emp_religion').val(data.emp_religion);
            $('#emp_processaccount').val(data.emp_processaccount);
            $('#emp_taxcode').val(data.emp_taxcode);
            $('#emp_exemptss').val(data.emp_exemptss);
            $('#emp_exemptphilhealth').val(data.emp_exemptphilhealth);
            $('#emp_exemptpagibig').val(data.emp_exemptphilhealth);

           // alert($('input[name="tax_exempt"]').length);
            //$('input[name="tax_exempt"]').val(0);
            //$('input[name="inventory"]').val(data.is_inventory);

            $('input,textarea').each(function(){
                var _elem=$(this);
                $.each(data,function(name,value){
                    if(_elem.attr('name')==name){
                        _elem.val(value);
                    }
                });
            });

            hideRatesduties();
            hideemployeeList();
            showemployeeFields();

        });

        $('#tbl_employee_list tbody').on('click','button[name="remove_info"]',function(){
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.employee_id;

            $('#modal_confirmation').modal('show');
        });

        $('#tbl_rates_duties_list tbody').on('click','button[name="rates_duties_edit"]',function(){
            _txnMode="editratesandduties";
            $('.modal_create_ratesandduties').modal('show');
            _selectRowObj=$(this).closest('tr');
            var data=dt_rates.row(_selectRowObj).data();
            _selectedID=data.employee_rates_duties_id;

            $('#ref_employment_type_id').val(data.ref_employment_type_id);
            $('#ref_payment_type_id').val(data.ref_payment_type_id);
            $('#ref_department_id').val(data.ref_department_id);
            $('#ref_position_id').val(data.ref_position_id);
            $('#ref_branch_id').val(data.ref_branch_id);
            $('#ref_section_id').val(data.ref_section_id);
           // alert($('input[name="tax_exempt"]').length);
            //$('input[name="tax_exempt"]').val(0);
            //$('input[name="inventory"]').val(data.is_inventory);

            $('input,textarea').each(function(){
                var _elem=$(this);
                $.each(data,function(name,value){
                    if(_elem.attr('name')==name){
                        _elem.val(value);
                    }
                });
            });


        })

        $('#tbl_rates_duties_list tbody').on('click','button[name="rates_duties_remove"]',function(){
            _selectRowObj=$(this).closest('tr');
            var data=dt_rates.row(_selectRowObj).data();
            _selectedID=data.employee_rates_duties_id;

           $('#modal_confirmation_rates').modal('show');
        });

        $('#btn_yes').click(function(){
            removeEmployee().done(function(response){
                showNotification(response);
                dt.row(_selectRowObj).remove().draw();
            });
        });

        $('#btn_yes_rates').click(function(){
            removeRates().done(function(response){
                showNotification(response);
                dt_rates.row(_selectRowObj).remove().draw();
            });
        });

        $('input[name="file_upload[]"]').change(function(event){
            var _files=event.target.files;

            $('#div_img_product').hide();
            $('#div_img_loader').show();

            var data=new FormData();
            $.each(_files,function(key,value){
                data.append(key,value);
            });

            console.log(_files);

            $.ajax({
                url : 'Products/transaction/upload',
                type : "POST",
                data : data,
                cache : false,
                dataType : 'json',
                processData : false,
                contentType : false,
                success : function(response){
                    $('#div_img_loader').hide();
                    $('#div_img_product').show();
                }
            });
        });
        $('#btn_cancelempfields').click(function(){
            hideemployeeFields();
            hideRatesduties();
            showemployeeList();
        });

        $('#btn_cancelratesandduties').click(function(){
            hideRatesduties();
            hideemployeeFields();
            showemployeeList();
            $('#tbl_rates_duties_list').dataTable().fnDestroy();
            $('#tbl_rates_duties_list').fnClearTable();
        });

       /* $('#btn_save').click(function(){
            if(validateRequiredFields($('#frm_employee'))){
                if(_txnMode=="new"){
                    createEmployee().done(function(response){
                        showNotification(response);
                        dt.row.add(response.row_added[0]).draw();
                        clearFields($('#frm_employee'))

                    }).always(function(){
                        showSpinningProgress($('#btn_save'));
                    });
                    return;
                }
                if(_txnMode=="edit"){
                    updateEmployee().done(function(response){
                        showNotification(response);
                        dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                        clearFields($('#frm_employee'))
                        showList(true);
                    }).always(function(){
                        showSpinningProgress($('#btn_save'));
                    });
                    return;
                }
            }
        }); */
                //CREATE NEW EMPLOYEEE
        $('#btn_save').click(function(){
            if(validateRequiredFields($('#frm_employee'))){
                if(_txnMode=="new"){
                    createEmployee().done(function(response){
                        showNotification(response);
                        dt.row.add(response.row_added[0]).draw();
                        clearFields($('#frm_employee'))

                    }).always(function(){
                        showSpinningProgress($('#btn_save'));
                    });
                    return;
                }
                if(_txnMode=="edit"){
                    updateEmployee().done(function(response){
                        showNotification(response);
                        dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                        clearFields($('#frm_employee'))
                        showList(true);
                    }).always(function(){
                        showSpinningProgress($('#btn_save'));
                    });
                    return;
                }
            }
        });
            //CREATE RATES AND DUTIES
        $('#btn_createratesandduties').click(function(){
            if(validateRequiredFields($('#frm_ratesandduties'))){
                if(_txnMode=="newrateandduties"){
                    createRatesandDuties().done(function(response){
                        showNotification(response);
                        dt_rates.row.add(response.row_added[0]).draw();
                        clearFields($('#frm_ratesandduties'))
s
                    }).always(function(){
                        showSpinningProgress($('#btn_createratesandduties'));
                    });
                    return;
                }
                if(_txnMode=="editratesandduties"){
                    updateRatesandDuties().done(function(response){
                        showNotification(response);
                        dt_rates.row(_selectRowObj).data(response.row_updated[0]).draw();
                        clearFields($('#frm_ratesandduties'))
                    }).always(function(){
                        showSpinningProgress($('#btn_createratesandduties'));
                    });
                    return;
                }
            }
        });
            //SELECT CREATE OPTION
        $('#btn_new_religion').click(function(){
            if(validateRequiredFields($('#frm_religion'))){
                if(_txnMode=="religion"){
                    createReligion().done(function(response){
                        showNotification(response);
                        data=response.row_added[0];
                        var arr = [];
                        for (var prop in data) {
                            arr.push(data[prop]);
                        }
                        console.log(arr);
                        $('#emp_religion').append($('<option>', {value:arr[0], text:arr[1]}));
                        clearFields($('#frm_religion'))

                    }).always(function(){
                        showSpinningProgress($('#btn_new_religion'));
                    });
                    return;
                }
                else{
                    //do nothing :D
                }
            }
        });

        $('#btn_new_employment_type').click(function(){
            if(validateRequiredFields($('#frm_employment_type'))){
                if(_txnModeRate=="employment"){
                    createEmploymentType().done(function(response){
                        showNotification(response);
                        data=response.row_added[0];
                        var arr = [];
                        for (var prop in data) {
                            arr.push(data[prop]);
                        }
                        console.log(arr);
                        $('#ref_employment_type_id').append($('<option>', {value:arr[0], text:arr[1]}));
                        clearFields($('#frm_employment_type'))

                    }).always(function(){
                        showSpinningProgress($('#btn_new_employment_type'));
                    });
                    return;
                }
                else{
                    //do nothing :D
                }
            }
        });

        $('#btn_new_payment_type').click(function(){
            if(validateRequiredFields($('#frm_payment_type'))){
                if(_txnModeRate=="paymenttype"){
                    createPaymentType().done(function(response){
                        showNotification(response);
                        data=response.row_added[0];
                        var arr = [];
                        for (var prop in data) {
                            arr.push(data[prop]);
                        }
                        console.log(arr);
                        $('#ref_payment_type_id').append($('<option>', {value:arr[0], text:arr[1]}));
                        clearFields($('#frm_payment_type'))

                    }).always(function(){
                        showSpinningProgress($('#btn_new_payment_type'));
                    });
                    return;
                }
                else{
                    //do nothing :D
                }
            }
        });

        $('#btn_new_department').click(function(){
            if(validateRequiredFields($('#frm_department'))){
                if(_txnModeRate=="department"){
                    createDepartment().done(function(response){
                        showNotification(response);
                        data=response.row_added[0];
                        var arr = [];
                        for (var prop in data) {
                            arr.push(data[prop]);
                        }
                        console.log(arr);
                        $('#ref_department_id').append($('<option>', {value:arr[0], text:arr[1]}));
                        clearFields($('#frm_department'))

                    }).always(function(){
                        showSpinningProgress($('#btn_new_department'));
                    });
                    return;
                }
                else{
                    //do nothing :D
                }
            }
        });

        $('#btn_new_position').click(function(){
            if(validateRequiredFields($('#frm_position'))){
                if(_txnModeRate=="position"){
                    createPosition().done(function(response){
                        showNotification(response);
                        data=response.row_added[0];
                        var arr = [];
                        for (var prop in data) {
                            arr.push(data[prop]);
                        }
                        console.log(arr);
                        $('#ref_position_id').append($('<option>', {value:arr[0], text:arr[1]}));
                        clearFields($('#frm_position'))

                    }).always(function(){
                        showSpinningProgress($('#btn_new_position'));
                    });
                    return;
                }
                else{
                    //do nothing :D
                }
            }
        });

        $('#btn_new_branch').click(function(){
            if(validateRequiredFields($('#frm_branch'))){
                if(_txnModeRate=="branch"){ 
                    createBranch().done(function(response){
                        showNotification(response);
                        data=response.row_added[0];
                        var arr = [];
                        for (var prop in data) {
                            arr.push(data[prop]);
                        }
                        console.log(arr);
                        $('#ref_branch_id').append($('<option>', {value:arr[0], text:arr[1]}));
                        clearFields($('#frm_branch'))

                    }).always(function(){
                        showSpinningProgress($('#btn_new_branch'));
                    });
                    return;
                }
                else{
                    //do nothing :D
                }
            }
        });

        $('#btn_new_section').click(function(){
            if(validateRequiredFields($('#frm_section'))){
                if(_txnModeRate=="section"){ 
                    createSection().done(function(response){
                        showNotification(response);
                        data=response.row_added[0];
                        var arr = [];
                        for (var prop in data) {
                            arr.push(data[prop]);
                        }
                        console.log(arr);
                        $('#ref_section_id').append($('<option>', {value:arr[0], text:arr[1]}));
                        clearFields($('#frm_section'))

                    }).always(function(){
                        showSpinningProgress($('#btn_new_section'));
                    });
                    return;
                }
                else{
                    //do nothing :D
                }
            }
        });



    })();


    var validateRequiredFields=function(f){
        var stat=true;

        $('div.form-group').removeClass('has-error');
        $('input[required],textarea[required],select[required]',f).each(function(){


                if($(this).val()==""){
                    showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                    $(this).closest('div.form-group').addClass('has-error');
                    $(this).focus();
                    stat=false;
                    return false;
                }
            



        });

        return stat;
    };

    var createEmployee=function(){
        var _data=$('#frm_employee').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Employee/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var updateEmployee=function(){
        var _data=$('#frm_ratesandduties').serializeArray();

        console.log(_data);
        _data.push({name : "employee_id" ,value : _selectedID});
        //_data.push({name:"is_inventory",value: $('input[name="is_inventory"]').val()});

        //alert($('input[name="is_inventory"]').val());
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Employee/transaction/update",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var createRatesandDuties=function(){
        var _data=$('#frm_ratesandduties').serializeArray();
        _data.push({name : "employee_id" ,value : _selectedID});
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RatesDuties/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_createratesandduties'))
        });
    };

    var updateRatesandDuties=function(){
        var _data=$('#frm_ratesandduties').serializeArray();
        _data.push({name : "employee_rates_duties_id" ,value : _selectedID});
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RatesDuties/transaction/update",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_createratesandduties'))
        });
    };

    var removeEmployee=function(){
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Employee/transaction/delete",
            "data":{employee_id : _selectedID}
        });
    };

    var removeRates=function(){
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RatesDuties/transaction/delete",
            "data":{employee_rates_duties_id : _selectedID}
        });
    };

    var createReligion=function(){
        var _data=$('#frm_religion').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RefReligion/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_new_religion'))
        });
    };

    var createEmploymentType=function(){
        var _data=$('#frm_employment_type').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RefEmploymentType/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_new_religion'))
        });
    };

    var createPaymentType=function(){
        var _data=$('#frm_payment_type').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RefPaymentType/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_new_payment_type'))
        });
    };

    var createDepartment=function(){
        var _data=$('#frm_department').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RefDepartment/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_new_department'))
        });
    };

    var createPosition=function(){
        var _data=$('#frm_position').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RefPosition/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_new_position'))
        });
    };

    var createBranch=function(){
        var _data=$('#frm_branch').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RefBranch/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_new_branch'))
        });
    };

    var createSection=function(){
        var _data=$('#frm_section').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"RefSection/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_new_section'))
        });
    };

    var showList=function(b){
        if(b){
            $('#div_product_list').show();
            $('#div_product_fields').hide();
        }else{
            $('#div_product_list').hide();
            $('#div_product_fields').show();
        }
    };

    var hideemployeeList=function(){
         $('#div_product_list').hide();
    };

    var showemployeeList=function(){
        $('#div_product_list').show();
    };

    var hideemployeeFields=function(){
        $('#div_product_fields').hide();
    };

    var showemployeeFields=function(){
        $('#div_product_fields').show();
    };

    var hideRatesduties=function(){
        $('#div_rates_duties_list').hide();
    };

    var showRatesduties=function(){
        $('#div_rates_duties_list').show();
    };

    var showNotification=function(obj){
        PNotify.removeAll();
        new PNotify({
            title:  obj.title,
            text:  obj.msg,
            type:  obj.stat
        });
    };

        $('.date-picker').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true

        });
	
    var showSpinningProgress=function(e){
        $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
    };

    var clearFields=function(f){
        $('input,textarea',f).val('');
        $(f).find('input:first').focus();
    };



    function format ( d ) {
        return '<div class="container-fluid">'+
        '<div class="col-md-12">'+ 
        '<h3 class="boldlabel"><span class="glyphicon glyphicon-user fa-lg"></span> ' + d.emp_fname +' ' + d.emp_mname + ' ' +d.emp_lname + '</h3>'+
        '<p>[ ECODE : '+d.ecode+' ] [ ID : '+d.emp_idnumber+' ]</p>'+
        '<hr style="height:1px;background-color:black;"></hr>'+
        '</div>'+ //First Row//
        '<div class="row">'+
        '<div class="col-md-2">'+
        '<center><img style="margin-top:4px;" src="assets/img/anonymous-icon.png"></img></center>'+
        '</div>'+
        '<div class="col-md-4"><p class="nomargin"><b>Gender</b> : '+d.emp_gender+'</p>'+
        '<p class="nomargin"><b>Birthdate</b> : '+d.emp_birthdate+'</p>'+
        '<p class="nomargin"><b>Civil Status</b> : '+d.emp_civilstatus+'</p>'+
        '<p class="nomargin"><b>Blood Type</b> : '+d.emp_bloodtype+'</p>'+
        '<p class="nomargin"><b>Height</b> : '+d.emp_height+'</p>'+
        '<p class="nomargin"><b>Weight</b> : '+d.emp_weight+'</p>'+
        '<p class="nomargin"><b>Religion</b> : '+d.emp_religion+'</p>'+
        '</div>'+
        '<div class="col-md-4">'+
        '<p class="nomargin"><b>SSS</b> : '+d.emp_sss+'</p>'+
        '<p class="nomargin"><b>Phil Health</b> : '+d.emp_philhealth+'</p>'+
        '<p class="nomargin"><b>Pag-Ibig :</b> : '+d.emp_pagibig+'</p>'+
        '<p class="nomargin"><b>TIN :</b> : '+d.emp_tin+'</p>'+
        '<p class="nomargin"><b>Account No.</b> : '+d.emp_accountno+'</p>'+
        '<p class="nomargin"><b>Tax Code</b> : '+d.emp_taxcode+'</p>'+
        '</div>'+
        '</div>'+
        '<div class="col-md-12">'+ 
        '<h3 class="boldlabel"><h4 class="boldlabel"><span class="glyphicon glyphicon-info-sign fa-lg"></span> Employee Information</h4><hr style="height:1px;background-color:black;"></hr></div>'+
        '<div class="row">'+ //Second Row//
        '<div class="col-md-2">'+
        '<center></center>'+
        '</div>'+
        '<div class="col-md-4"><p class="nomargin"><b>Employee Type</b> : '+d.emp_gender+'</p>'+
        '<p class="nomargin"><b>Remarks</b> : '+d.emp_birthdate+'</p>'+
        '<p class="nomargin"><b>Department</b> : '+d.emp_civilstatus+'</p>'+
        '<p class="nomargin"><b>Position</b> : '+d.emp_bloodtype+'</p>'+
        '<p class="nomargin"><b>Branch</b> : '+d.emp_height+'</p>'+
        '</div>'+
        '<div class="col-md-4">'+
        '<p class="nomargin"><b>Section</b> : '+d.emp_weight+'</p>'+
        '<p class="nomargin"><b>Pay Type</b> : '+d.emp_religion+'</p>'+
        '<p class="nomargin"><b>Employment Date</b> : '+d.emp_employmentdate+'</p>'+
        '<p class="nomargin"><b>Date Regular</b> : '+d.emp_philhealth+'</p>'+
        '</div>'+
        '</div>'+
        '<div class="col-md-12">'+ 
        '<h3 class="boldlabel"><h4 class="boldlabel"><span class="glyphicon glyphicon-info-sign fa-lg"></span> Contact Information</h4><hr style="height:1px;background-color:black;"></hr></div>'+
        '<div class="row">'+ //Second Row//
        '<div class="col-md-2">'+
        '<center></center>'+
        '</div>'+
        '<div class="col-md-4"><p class="nomargin"><b>Address 1</b> : '+d.emp_address1+'</p>'+
        '<p class="nomargin"><b>Address 2</b> : '+d.emp_address2+'</p>'+
        '<p class="nomargin"><b>Email Address</b> : '+d.emp_email+'</p>'+
        '</div>'+
        '<div class="col-md-4"><p class="nomargin"><b>Mobile No.</b> : '+d.emp_cell+'</p>'+
        '<p class="nomargin"><b> Phone No.</b> : '+d.emp_phone+'</p>'+
        '</div>'+
        '</div>'+
        '</div>';
    };

    function format1 ( d ) {
        return '<div class="container-fluid">'+
        '<div class="col-md-12">'+ 
        '<h3 class="boldlabel"><span class="<"fa fa-circle fa-lg"></span> ' + d.employment_type +' </h3>'+
        '<p class="boldlabel">[ Position : '+d.position+' ] [ Department : '+d.department+' ]</p>'+
        '<hr style="height:1px;background-color:black;"></hr>'+
        '</div>'+ //First Row//
        '</div>'+
        '<div class="col-md-12">'+

        '<div class="col-md-4"><p class="nomargin"><b>Date Start</b> : '+d.date_start+'</p>'+
        '<p class="nomargin"><b>Date End</b> : '+d.date_end+'</p>'+
        '<p class="nomargin"><b>Section</b> : '+d.section+'</p>'+
        '<p class="nomargin"><b>Branch</b> : '+d.branch+'</p>'+
        '<p class="nomargin"><b>Payment Type</b> : '+d.payment_type+'</p>'+
        '<p class="nomargin"><b>Level</b> : '+d.level+'</p>'+
        '</div>'+
        '<div class="col-md-4">'+
        '<p class="nomargin"><b>Salary Reg Rates :</b> : '+d.salary_reg_rates+'</p>'+
        '<p class="nomargin"><b>Daily Rate :</b> : '+d.daily_rate+'</p>'+
        '<p class="nomargin"><b>Rate Factor </b> : '+d.emp_accountno+'</p>'+
        '<p class="nomargin"><b>SSS PHIC Salary Credit</b> : '+d.sss_phic_salary_credit+'</p>'+
        '<p class="nomargin"><b>Pagibig Salary Credit</b> : '+d.pagibig_salary_credit+'</p>'+
        '<p class="nomargin"><b>Tax Shield</b> : '+d.tax_shield+'</p>'+
        '</div>'+
        '<div class="col-md-4">'+
        '<p class="nomargin"><b>Remarks :</b> : <br>'+d.remarks+'</p>'+
        '</div>'+
        '</div>'+
        '</div>';
    };



   /* $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });*/


    // apply input changes, which were done outside the plugin
    //$('input:radio').iCheck('update');

});

</script>

</body>

</html>