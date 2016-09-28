<?php 
$fromdate=$_POST['fromdateinventory']; //post value of the date

$tilldate=$_POST['tilldateinventory']; //post value of the date
$newfromdate = date("Y-m-d", strtotime($fromdate));
$newtilldate = date("Y-m-d", strtotime($tilldate));
$filterdate="'$newfromdate'"; 
$filterdate2="'$newtilldate'"; 


//$product_filter=$_POST['product_id']; //post value of the date
$product_filter=25;
$date = date('Y-m-d H:i:s');
$today = date("m/d/Y", strtotime($date));

$time = date("H:i:s", strtotime($date));
?>

    <center><table width="95%" cellpadding="5" style="font-family: tahoma;font-size: 11">
            <tr>
                <td width="45%" valign="top">
                 
                    <company>
                       <?php echo "Company Name : <b>".$company_info->company_name."</b>"; ?><br>
                        <?php echo "Address : <b>".$company_info->company_address."</b>"; ?><br>
                         <?php echo "Email Address : <b>".$company_info->email_address."</b>"; ?><br>
                       <?php echo "Landline : <b>".$company_info->landline."</b>"; ?><br>
                    </company>
                </td>

                <td width="50%" align="right">
						<img height="50px" width="50px" src="<?php echo $company_info->logo_path; ?>" ></img>
                </td>
            </tr>
        </table></center><center><?php echo "<h3 style='font-size:11px;text-align:center;font-family:tahoma;margin:0px;margin-bottom:5px;'>LIST OF SALES INVOICE</h3>"; ?></center>
<table width='95%' style='border-collapse: collapse;border-spacing: 0;font-family: tahoma;font-size: 11'>
			<thead>
			<tr>
				<th width='30%' style='text-align: left;'><?php echo "As of: <u>".$today." ".$time."<u/>"; ?></th>
				
            </tr>
            <tr>
				<th width='6%' style='border-bottom: 2px solid gray;text-align: left'>Product Name</th>
                <th width='26%' style='border-bottom: 2px solid gray;text-align: left;'>InvoiceNO#</th>
				<th width='26%' style='border-bottom: 2px solid gray;text-align: left;'>Date</th>
				<th width='12%' style='border-bottom: 2px solid gray;text-align: left;'>In</th>
				<th width='12%' style='border-bottom: 2px solid gray;text-align: left;'>Out</th>
				<th width='12%' style='border-bottom: 2px solid gray;text-align: left;'>Out</th>
				<th width='12%' style='border-bottom: 2px solid gray;text-align: left;'>Balance</th>
            </tr>
            </tr>
            </thead>
 <tbody>
<?php

				$query = $this->db->query('SELECT product_id,product_desc from products WHERE product_id='.$product_filter);
			$gtotal = $query->row(); //$grandtotal = $gtotal->grand_total;	

foreach ($query->result() as $row)
{
       $product_name=  $row->product_desc;
	   $product_id=  $row->product_id;
		?> 
						<tr>
						<td width='6%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;text-align: left;'><?php echo $product_name; ?></td>
						<td width='26%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;'></td>
						<td width='26%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;'></td>
						<td width='12%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;'></td>
						<td width='12%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;'></td>
						<td width='12%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;'></td>
						<td width='12%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;'></td>
						</tr>


		<?php
					$query1 = $this->db->query('SELECT delivery_invoice.date_received,delivery_invoice.dr_invoice_no FROM delivery_invoice
							LEFT JOIN delivery_invoice_items
							ON delivery_invoice.dr_invoice_id=delivery_invoice_items.dr_invoice_id 
							WHERE delivery_invoice_items.product_id='.$product_filter.' GROUP BY date_received');
					$balance=0;
					foreach ($query1->result() as $invoice)
					{
						$dr_invoice_no = $invoice->dr_invoice_no;
						$datereceived = $invoice->date_received;
						$datereceivedfilter = "'$datereceived'"; 
						
							$receivingin = $this->db->query('SELECT SUM(dr_qty) as inreceive,delivery_invoice.dr_invoice_no,delivery_invoice.date_received FROM delivery_invoice
							LEFT JOIN delivery_invoice_items
							ON delivery_invoice.dr_invoice_id=delivery_invoice_items.dr_invoice_id 
							WHERE date_received='.$datereceivedfilter.' AND product_id='.$product_filter);
							
							$adjustmentin = $this->db->query('SELECT SUM(minus_stock) as minus_adjusment,SUM(added_stock) as add_adjustment FROM stock_details
								WHERE date_adjusted='.$datereceivedfilter.' AND product_id='.$product_filter);
								
							$possales = $this->db->query('SELECT SUM(pos_qty) as total_sales FROM pos_invoice_items
														LEFT JOIN pos_invoice
														ON pos_invoice_items.pos_invoice_id=pos_invoice.pos_invoice_id 
														WHERE pos_invoice.transaction_date='.$datereceivedfilter.' AND product_id='.$product_filter);
								foreach ($possales->result() as $pos)
								{
									 $total_sales = $pos->total_sales;
								}
								foreach ($receivingin->result() as $receivedsum)
								{
									 $receive = $receivedsum->inreceive;
								}
								foreach ($adjustmentin->result() as $inadjustsum)
								{
								    $sales_and_adjustment = $total_sales;
									$totalreceive = $receive+$inadjustsum->add_adjustment;
								}
								

											/*
					foreach ($query1->result() as $prod)
					{
						$product_id = $prod->product_id;
						
						$query2 = $this->db->query('SELECT SUM(dr_qty) as received FROM delivery_invoice_items
													LEFT JOIN delivery_invoice
													ON delivery_invoice_items.dr_invoice_id=delivery_invoice.dr_invoice_id 
													WHERE date_received BETWEEN CAST('.$filterdate.' AS DATE) AND CAST('.$filterdate2.' AS DATE) AND product_id='.$product_id);
								
						$query3 = $this->db->query('SELECT SUM(minus_stock) as minus_adjusment,SUM(added_stock) as add_adjustment FROM stock_details
								WHERE date_adjusted BETWEEN CAST('.$filterdate.' AS DATE) AND CAST('.$filterdate2.' AS DATE) AND product_id='.$product_id);
								
						$possales = $this->db->query('SELECT SUM(pos_qty) as total_sales FROM pos_invoice_items
													LEFT JOIN pos_invoice
													ON pos_invoice_items.pos_invoice_id=pos_invoice.pos_invoice_id 
													WHERE pos_invoice.transaction_date BETWEEN CAST('.$filterdate.' AS DATE) AND CAST('.$filterdate2.' AS DATE) AND product_id='.$product_id);
								
							foreach ($possales->result() as $sales)
							{
								$totalsales = $sales->total_sales;
							}
							foreach ($query2->result() as $inreceive)
							{
								$received = $inreceive->received;
							}
							foreach ($query3->result() as $inout)
							{
								$sales_and_adjustment = $inout->minus_adjusment+$totalsales;
								$totalreceive = $received+$inout->add_adjustment;
								$temp_balance = $totalreceive-$sales_and_adjustment;
							}
						*/
							
						//for other func product $balance+=$temp_balance;
						?>
						<tr>
						<td width='6%' style='text-align: left;'></td>
						<td width='26%' style='text-align: left;'><?php echo $invoice->dr_invoice_no; ?></td>
						<td width='26%' style='text-align: left;'><?php echo $datereceived; ?></td>
						<td width='12%' style='text-align: left;'><?php echo $totalreceive; ?></td>
						<td width='12%' style='text-align: left;'><?php //echo $totalreceive; ?></td>
						<td width='12%' style='text-align: left;'><?php //echo $sales_and_adjustment; ?></td>
						<td width='12%' style='text-align: left;'><?php //echo $temp_balance; ?></td>
				<?php	
					
											
						
					}
	?>

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
			<!-- <tfoot>
			<tr>
				<td ></td><td></td><td></td><td></td>
                <td style="border-bottom: 1px solid black;"><strong>Grand Total : </strong></td>
                <td style="border-bottom: 1px solid black;text-align:right;"><strong><?php // echo number_format($grandtotal,2); ?></strong></td>
            </tr>
            </tfoot> -->
			</table>
