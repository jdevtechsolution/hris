<?php 
$fromdate=$_POST['fromdatepdf']; //post value of the date
$tilldate=$_POST['tilldatepdf']; //post value of the date
$newfromdate = date("Y-m-d", strtotime($fromdate));
$newtilldate = date("Y-m-d", strtotime($tilldate));
$filterdate="'$newfromdate'"; 
$filterdate2="'$newtilldate'"; 
?>

    <center><table width="95%" cellpadding="5" style="font-family: tahoma;font-size: 11">
            <tr>
                <td width="45%" valign="top">
                    <span>Company Name :</span>
                    <companyname>
                        <strong><?php echo $company_info->company_name; ?></strong><br>
                        <?php echo "Address :".$company_info->company_address; ?><br>
                        <?php echo "Email Address :".$company_info->email_address; ?><br>
                        <abbr title="Phone">Phone :</abbr> <?php echo $company_info->landline; ?>
                    </companyname>
                </td>

                <td width="50%" align="right">
						<img height="50px" width="50px" src="<?php echo $company_info->logo_path; ?>" ></img>
                </td>
            </tr>
        </table></center><center><?php echo "<h3 style='font-size:11px;text-align:center;font-family:tahoma;margin:0px;margin-bottom:5px;'>LIST OF SALES INVOICE</h3>"; ?></center>
<table width='95%' style='border-collapse: collapse;border-spacing: 0;font-family: tahoma;font-size: 11'>
			<thead>
			<tr>
				<th width='30%' style='text-align: left;'><?php echo "Period: <u>".$fromdate."</u> to <u>".$tilldate."<u/>"; ?></th>
            </tr>
            <tr>
				<th width='6%' style='border-bottom: 2px solid gray;text-align: left;'>Receipt No</th>
                <th width='12%' style='border-bottom: 2px solid gray;text-align: left;'>Customer</th>
				<th width='12%' style='border-bottom: 2px solid gray;text-align: left;'>Item</th>
                <th width='12%' style='border-bottom: 2px solid gray;text-align: left;'>SRP</th>
				<th width='12%' style='border-bottom: 2px solid gray;text-align: left;'>Qty</th>
				<th width='12%' style='border-bottom: 2px solid gray;text-align: right;'>Total</th>
            </tr>
            </thead>
 <tbody>
<?php
			
			$query = $this->db->query('SELECT receipt_no,pos_invoice.*,customers.customer_name FROM pos_payment 
							LEFT JOIN pos_invoice
							ON pos_payment.pos_invoice_id=pos_invoice.pos_invoice_id 
							LEFT JOIN customers
							ON pos_invoice.customer_id=customers.customer_id WHERE pos_payment.transaction_date BETWEEN CAST('.$filterdate.' AS DATE) AND CAST('.$filterdate2.' AS DATE)');
$gtotal = $query->row();
//$grandtotal = $gtotal->grand_total;	
					
						$grandtotal=0; //start value of grandtotal		
foreach ($query->result() as $row)
{
       $receiptno=  $row->receipt_no;
	   $invoiceid=  $row->pos_invoice_id;
	   $customer=  $row->customer_name;
		?> 
						<tr>
						<td width='6%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;text-align: left;'><?php echo $receiptno; ?></td>
						<td width='12%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;'><?php echo $customer; ?></td>
						<td width='12%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;'></td>
						<td width='12%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;'></td>
						<td width='12%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;'></td>
						<td width='12%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;'></td>
						</tr>


		<?php
					$query1 = $this->db->query('SELECT products.product_desc,pos_invoice_items.* FROM pos_invoice_items LEFT JOIN products
							ON pos_invoice_items.product_id=products.product_id 
							WHERE pos_invoice_id='.$invoiceid);

					foreach ($query1->result() as $prod)
					{
						
						?>
						<tr>
						<td width='6%' style='text-align: left;'></td>
						<td width='24%' style='text-align: left;'></td>
						<td width='32%' style='text-align: left;'><?php echo $prod->product_desc; ?></td>
						<td width='12%' style='text-align: left;'><?php echo $prod->pos_price; ?></td>
						<td width='12%' style='text-align: left;'><?php echo $prod->pos_qty; ?></td>
						<td width='12%' style='text-align: right;'><?php echo $prod->total; ?></td></tr>
						
				<?php	
					$grandtotal+=$prod->total; //computing for grandtotal
				}
	?>
	<tr>				<td width='12%' style='text-align: left;'></td>
						<td width='12%' style='text-align: left;'></td>
						<td width='6%' style='text-align: left;'></td>
						<td width='6%' style='text-align: left;'></td>
						<td width='6%' style='border-bottom:1px solid black;text-align: left;'><b>Sub Total :</b></td>
						<td width='12%' style='border-bottom:1px solid black;text-align: right;'><?php echo "<b>".number_format($row->total_after_tax)."</b>"; ?></tr>
						<tr>
						<td width='12%' style='text-align: left;'></td>
						<td width='12%' style='text-align: left;'></td>
						<td width='6%' style='text-align: left;'></td>
						<td width='6%' style='text-align: left;'></td>
						<td width='6%' style='text-align: left;'></td>
						<td width='12%' style='text-align: left;'></td>
						</tr>
<?php

	}
			?></tbody>
			<tfoot>
			<tr>
				<td ></td><td></td><td></td><td></td>
                <td style="border-bottom: 1px solid black;"><strong>Grand Total : </strong></td>
                <td style="border-bottom: 1px solid black;text-align:right;"><strong><?php echo number_format($grandtotal,2); ?></strong></td>
            </tr>
            </tfoot>
			</table>
