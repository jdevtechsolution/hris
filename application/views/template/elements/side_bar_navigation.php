<div class="static-sidebar-wrapper sidebar-default">
    <div class="static-sidebar">
        <div class="sidebar">
            <div class="widget">
                <div class="widget-body">
                    <div class="userinfo">
                        <div class="avatar">
                            <img src="<?php echo $this->session->user_photo; ?>" class="img-responsive img-circle">
                        </div>
                        <div class="info">
                            <span class="username"><?php echo $this->session->user_fullname; ?></span>
                            <span class="useremail"><?php echo $this->session->user_email; ?></span>

                        </div>
                    </div>
                </div>
            </div>
            <div class="widget stay-on-collapse" id="widget-sidebar">
                <nav role="navigation" class="widget-body">
                    <ul class="acc-menu">
                        <li class="nav-separator"><span>Explore</span></li>

                        <li><a href="Dashboard"><i class="ti ti-home"></i><span>Dashboard</span></a></li>
                        <!--<li><a href="#"><i class="ti ti-package"></i><span>Purchasing</span></a>
                            <ul class="acc-menu">
                                <li><a href="Purchases">Purchase Order</a></li>
                                <li><a href="Deliveries">Purchase Invoice</a></li>
                                <li><a href="#">Record Payment</a></li>
                                <li><a href="#">Item Issuance</a></li>
                                <li><a href="#">Item Adjustment</a></li>
                            </ul>
                        </li>-->
                        <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i><span>Personal Information</span></a>
                            <ul class="acc-menu">
                                <li><a href="Employee" class="employeejs" id="employeejs" >Employee Management</a>
                                </li>
								
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Leave</span></a>
                            <ul class="acc-menu">
                                <li><a href="RefLeave" class="departmentjs" id="departmentjs">Leave Type</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></i><span>Employee References</span></a>
                            <ul class="acc-menu">
                                <li><a href="RefDepartment" class="departmentjs" id="departmentjs">Department</a>
                                </li>
                                <li><a href="RefPosition" class="departmentjs" id="departmentjs">Position</a>
                                </li>
                                <li><a href="RefBranch" class="departmentjs" id="departmentjs">Branch</a>
                                </li>
                                <li><a href="RefSection" class="departmentjs" id="departmentjs">Section</a>
                                </li>
                                <li><a href="RefReligion" class="departmentjs" id="departmentjs">Religion</a>
                                </li>
                                <li><a href="RefCourse" class="departmentjs" id="departmentjs">Course/Degree</a>
                                </li>
                                <li><a href="RefRelationship" class="departmentjs" id="departmentjs">Relationship</a>
                                </li>
                                <li><a href="RefCompensation" class="departmentjs" id="departmentjs">Compensation Type</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-folder" aria-hidden="true"></i><span>Document References</span></a>
                            <ul class="acc-menu">
                                <li><a href="RefCertificate" class="departmentjs" id="departmentjs">Certificate</a>
                                </li>
                                <li><a href="RefAction" class="departmentjs" id="departmentjs">Action Taken</a>
                                </li>
                                <li><a href="RefDiscipline" class="departmentjs" id="departmentjs">Disciplinary Action Policy</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i><span>Compensation References</span></a>
                            <ul class="acc-menu">
                                <li><a href="RefCompensation" class="departmentjs" id="departmentjs">Compensation Type</a>
                                </li>
                                
                            </ul>
                        </li>

                     <!--     <li><a href="#"><i class="ti ti-shopping-cart"></i><span>Sales</span></a>
                            <ul class="acc-menu">
                                <li><a href="pos" class="posjs" id="posjs">POS</a>
                                </li>
								
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-book" aria-hidden="true"></i><span>Journal</span></a>
                            <ul class="acc-menu">
                                <li><a href="Receipts" class="transactionsjs" id="transactionsjs">Transactions</a>
                                </li>
                                <li><a data-toggle="modal" class="sales_reportsjs" id="sales_reportsjs" data-target="#modal_sales_reportsjs">Daily Sales Reports</a>
                                </li>
								<li><a data-toggle="modal" class="inventory_reportsjs" id="inventory_reportsjs" data-target="#modal_inventory_reportsjs">Inventory Reports</a>
                                </li>
								<li><a data-toggle="modal" class="stock_cardjs" id="stock_cardjs" data-target="#modal_stock_cardjs">Stock Card</a>
                                </li>
								
                            </ul>
                        </li>
                        <!--<li><a href="#"><i class="ti ti-view-list-alt"></i><span>References</span></a>
                            <ul class="acc-menu">
                                <li><a href="categories">Category Management</a></li>
                                <li><a href="departments">Department Management</a></li>
                                <li><a href="units">Unit Management</a></li>
                                <li><a href="brands">Brand Management</a></li>
                                <li><a href="discounts">Discount Management</a></li>
                                <li><a href="cards">Card Management</a></li>
                                <li><a href="generics">Generic Management</a></li>
                                <li><a href="giftcards">Gift Card Management</a></li>
                                <li><a href="locations">Location Management</a></li>
                            </ul>
                        </li>-->

                      <!--  <li><a href="#"><i class="ti ti-harddrive"></i><span>Masterfiles</span></a>
                            <ul class="acc-menu">
                                <li><a href="products" class="product_managementjs" id="product_managementjs">Product Management</a></li>
                                <li><a href="suppliers" class="supplier_managementjs" id="supplier_managementjs">Supplier Management</a></li>
                                <li><a href="customers" class="customer_managementjs" id="customer_managementjs">Customer Management</a></li>
                                <li><a href="stock" class="stock_managementjs" id="stock_managementjs">Stock Management</a></li>
                            </ul>
                        </li>

                        <li><a href="#"><i class="ti ti-settings"></i><span>Admin</span></a>
                            <ul class="acc-menu">
								<li><a href="xreading" class="xreading_reportjs" id="xreading_reportjs" >X-Reading</a></li>
								<li><a data-toggle="modal" class="zreading_reportjs" id="zreading_reportjs" data-target="#modal_zreading_reportsjs">Z-Reading</a>
                                </li>
                                <li><a href="users" class="user_accountjs" id="user_accountjs">User Account</a></li>
								<li><a href="rights" class="user_rightsjs" id="user_rightsjs">Setup User Group Rights</a></li>
                                <li><a href="company" class="company_infojs" id="company_infojs">Setup Company Info</a></li>
								<li><a href="notes" class="notesjs" id="notesjs" >Setup Notes</a></li>
                            </ul>
                        </li> -->

                    </ul>
                </nav>
            </div>

            <!--<div class="widget" id="widget-progress">
                <div class="widget-heading">
                    Progress
                </div>
                <div class="widget-body">

                    <div class="mini-progressbar">
                        <div class="clearfix mb-sm">
                            <div class="pull-left">Bandwidth</div>
                            <div class="pull-right">50%</div>
                        </div>

                        <div class="progress">
                            <div class="progress-bar progress-bar-lime" style="width: 50%"></div>
                        </div>
                    </div>
                    <div class="mini-progressbar">
                        <div class="clearfix mb-sm">
                            <div class="pull-left">Storage</div>
                            <div class="pull-right">25%</div>
                        </div>

                        <div class="progress">
                            <div class="progress-bar progress-bar-info" style="width: 25%"></div>
                        </div>
                    </div>

                </div>
            </div>-->
        </div>
    </div>
</div>

