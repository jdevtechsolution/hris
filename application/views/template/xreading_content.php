<?php 
$fromdate="1900/10/01"; //post value of the date
$tilldate="2016/09/10"; //post value of the date
$newfromdate = date("Y-m-d", strtotime($fromdate));
$newtilldate = date("Y-m-d", strtotime($tilldate));
$filterdate="'$newfromdate'"; 
$filterdate2="'$newtilldate'"; 

$date = date('Y-m-d H:i:s');
$today = date("m/d/Y", strtotime($date));
$time = date("H:i:s", strtotime($date));

$user_id = $id;
?>
<center><?php echo "<h2 style='font-size:11px;text-align:center;font-family:tahoma;margin:0px;margin-bottom:5px;'>X-READING</h2>"; ?></center>
<center><?php echo "<h2 style='font-size:11px;text-align:center;font-family:tahoma;margin:0px;margin-bottom:5px;'></h2>"; ?></center>
<center><?php echo "<h3 style='font-size:11px;text-align:center;font-family:tahoma;margin:0px;margin-bottom:5px;'>".$company_info->company_name."</h3>"; ?></center>
<center><?php echo "<h3 style='font-size:11px;text-align:center;font-family:tahoma;margin:0px;margin-bottom:5px;'>".$company_info->company_address."</h3>"; ?></center>
<center><?php echo "<h3 style='font-size:11px;text-align:center;font-family:tahoma;margin:0px;margin-bottom:5px;'>".$company_info->email_address."</h3>"; ?></center>
<center><?php echo "<h3 style='font-size:11px;text-align:center;font-family:tahoma;margin:0px;margin-bottom:5px;'>".$company_info->landline."</h3>"; ?></center>
    <center><table width="95%" cellpadding="5" style="font-family: tahoma;font-size: 11">
            <tr>
               <!-- <td width="45%" valign="top">
                    <span>Company Name :</span>
                    <companyname>
                        <strong><?php // echo $company_info->company_name; ?></strong><br>
                        <?php// echo "Address :".$company_info->company_address; ?><br>
                        <?php //echo "Email Address :".$company_info->email_address; ?><br>
                        <abbr title="Phone">Phone :</abbr> <?php// echo $company_info->landline; ?>
                    </companyname>
                </td>  -->
				<td width="45%" valign="top">
                    <companyname>
                        <?php echo ""; ?><br>
                        <strong><?php  echo "Date :<u>".$today."</u> Time : <u>".$time."</u>";?></strong><br>
                          <strong><?php echo "Cashier Name :".$user_info->full_name; ?> </strong>
                    </companyname>
                </td>

                <td width="50%" align="right">
						<img height="50px" width="50px" src="<?php echo $company_info->logo_path; ?>" ></img>
                </td>
            </tr>
        </table></center>
<table width='95%' style='border-collapse: collapse;border-spacing: 0;font-family: tahoma;font-size: 11'>
			<thead>
			<!--<tr>
				<th width='30%' style='text-align: left;'><?php echo "Date: <u>".$fromdate."</u>"; ?></th>
            </tr>
			<tr>
				<th width='30%' style='text-align: left;'><?php echo "Cashier Name: <u>".$this->session->user_fullname."</u>"; ?></th>
			</tr> -->
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
			
			$query = $this->db->query('SELECT receipt_no,pos_invoice.*,customers.customer_name,pos_payment.pos_payment_id FROM pos_payment 
							LEFT JOIN pos_invoice
							ON pos_payment.pos_invoice_id=pos_invoice.pos_invoice_id 
							
							LEFT JOIN customers
							ON pos_invoice.customer_id=customers.customer_id WHERE user_id='.$user_id);
			$gtotal = $query->row();
//$grandtotal = $gtotal->grand_total;	
					
						$grandtotal=0; //start value of grandtotal	
						$cash_amount=0;
						$card_amount=0;
foreach ($query->result() as $row)
{
       $receiptno=  $row->receipt_no;
	   $invoiceid=  $row->pos_invoice_id;
	   $customer=  $row->customer_name;
	   $pos_payment_id=  $row->pos_payment_id;
	   

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
						<tr>
						<td width='12%' style='text-align: left;'></td>
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

				$getcash = $this->db->query('SELECT pos_payment_details.card_amount FROM pos_payment_details
							WHERE pos_payment_id='.$pos_payment_id);
							foreach($getcash->result() as $row){
								$card_amount += $row->card_amount;
							}

	}
			?></tbody>
			<tfoot>
			<tr>
				<td ></td><td></td><td></td><td></td>
                <td style="border-bottom: 1px solid black;"><strong>Grand Total : </strong></td>
                <td style="border-bottom: 1px solid black;text-align:right;"><strong><?php echo number_format($grandtotal,2); ?></strong></td>
            </tr>
			<tr>
				<td ></td><td></td><td></td><td></td>
                <td><strong>BreakDown : </strong></td>
                <td><strong></strong></td>
            </tr>
			<tr>
				<td ></td><td></td><td></td><td></td>
                <td style="border-bottom: 1px solid black;"><strong>Cash Sale : </strong></td>
                <td style="border-bottom: 1px solid black;text-align:right;"><strong><?php echo number_format($grandtotal-$card_amount,2); ?></strong></td>
            </tr>
			<tr>
				<td ></td><td></td><td></td><td></td>
                <td style="border-bottom: 1px solid black;"><strong>Card Sale : </strong></td>
                <td style="border-bottom: 1px solid black;text-align:right;"><strong><?php echo number_format($card_amount,2); ?></strong></td>
            </tr>
			<tr>
				<td ></td><td></td><td></td><td></td>
                <td style="border-bottom: 1px solid black;"><strong>Gift Cert : </strong></td>
                <td style="border-bottom: 1px solid black;text-align:right;"><strong><?php echo number_format(0,2); ?></strong></td>
            </tr>
			<tr>
				<td ></td><td></td><td></td><td></td>
                <td style="border-bottom: 1px solid black;"><strong>Total : </strong></td>
                <td style="border-bottom: 1px solid black;text-align:right;"><strong><?php echo number_format($grandtotal-$card_amount+$card_amount,2); ?></strong></td>
            </tr>
            </tfoot>
			</table>
			<?php echo "<p style='text-align:center;font-family:tahoma;font-size:11px'>".$notes->note1 . "<br>" . $notes->note2 ."<br>" .
			$notes->note3 ."<br>" . $notes->note4 ."<br>" . $notes->note5 ."<br>" . $notes->note6 ."<br>" . $notes->note7 ."<br>" . $notes->note8 .
			"<br>" . $notes->note9 ."<br>" . $notes->note10 ."</p>"; ?>
