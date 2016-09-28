        <table width="95%" style="border-collapse: collapse;border-spacing: 0;font-family: tahoma;font-size: 11">
            <thead>
            <tr>
				<th width="12%" style="border-bottom: 2px solid gray;text-align: left;height: 30px;padding: 6px;">1</th>
                <th width="12%" style="border-bottom: 2px solid gray;text-align: left;height: 30px;padding: 6px;">Customer</th>
                <th width="12%" style="border-bottom: 2px solid gray;text-align: left;height: 30px;padding: 6px;">Item</th>
                <th width="6%" style="border-bottom: 2px solid gray;text-align: right;height: 30px;padding: 6px;">Qty</th>
                <th width="6%" style="border-bottom: 2px solid gray;text-align: right;height: 30px;padding: 6px;">Price</th>
                <th width="12%" style="border-bottom: 2px solid gray;text-align: right;height: 30px;padding: 6px;">Total</th>
            </tr>
            </thead>
            <tbody>
            <?php 
			$val="";
			$summary="";
			foreach($info as $item){ 
				if($item->receipt_no==$val){
			?>
                <tr>
					<td width="12%" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;"><?php echo ""; ?></td>
					<td width="12%" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;"><?php echo ""; ?></td>
                    <td width="6%" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;"><?php echo $item->product_desc; ?></td>
                    <td width="6%" style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->pos_qty,2); ?></td>
                    <td width="6%" style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->pos_price,2); ?></td>
                    <td width="12%" style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->total,2); ?></td>
                </tr>
				<tr>
					<td width="12%" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;"><?php echo ""; ?></td>
					<td width="12%" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;"><?php echo ""; ?></td>
                    <td width="6%" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;"></td>
                    <td width="6%" style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"></td>
                    <td width="6%" style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"></td>
				<td width="12%" style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->total_after_tax,2); ?></td>
				</tr>
            <?php 
				}
				else{
					
						
			?>

				
				<tr>
					<td width="12%" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;"><?php echo $item->receipt_no ?></td>
                    <td width="12%" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;"><?php echo $item->customer_name ?></td>
                    <td width="12%" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;"><?php echo $item->product_desc; ?></td>
                    <td width="6%" style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->pos_qty,2); ?></td>
                    <td width="6%" style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->pos_price,2); ?></td>
                    <td width="12%" style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->total,2); ?></td>
					
                </tr>

				<?php
					}
				
				
				
				
				$val=$item->receipt_no;
			}
			
				?>

            </tbody>
			            <tfoot>
						            <tr>
                <td colspan="2" style="text-align: right;height: 30px;padding: 6px;"></td>
                <td colspan="2" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;">Discount : </td>
                <td style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php //echo number_format($delivery_info->totaldiscount,2);// ?></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;height: 30px;padding: 6px;"></td>
                <td colspan="2" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;">Total before Tax : </td>
                <td style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php //echo number_format($delivery_info->before_tax,2);// ?></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;height: 30px;padding: 6px;"></td>
                <td colspan="2" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;">Tax Amount : </td>
                <td style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php // echo number_format($delivery_info->tax_amount,2);// ?></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;height: 30px;padding: 6px;"></td>
                <td colspan="2" style="border-bottom:1px solid gray;text-align: left;height: 30px;padding: 6px;"><strong>Grand Total: </strong></td>
                <td style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><strong><?php echo $grandtotal; ?></strong></td>
            </tr>
            </tfoot>
        </table><br /><br />
		
		
            <?php 
			$val="";

			foreach($info as $item){ 
			
			if($item->receipt_no!=$val){
				
					echo "receipt no:".$item->receipt_no."<br>";
					echo "Customer:".$item->customer_name."<br>";
					echo "product desc:".$item->product_desc."<br>"; 
					echo "qty:".number_format($item->pos_qty,2)."<br>";
					echo "price:".number_format($item->pos_price,2)."<br>";
					echo "total:".number_format($item->total,2)."<br>";
					echo "summary total:".number_format($item->total_after_tax,2)."<br>";	
			 


			}
			else{
					 echo "product desc:".$item->product_desc."<br>"; 
					 echo "qty:".number_format($item->pos_qty,2)."<br>";
					 echo "price:".number_format($item->pos_price,2)."<br>";
					 echo "total:".number_format($item->total,2)."<br>";
					 echo "summary total:".number_format($item->total_after_tax,2)."<br>";	

			}
			$val=$item->receipt_no;

			}
			$query = $this->db->query('SELECT receipt_no,pos_invoice.*,customers.customer_name FROM pos_payment 
							LEFT JOIN pos_invoice
							ON pos_payment.pos_invoice_id=pos_invoice.pos_invoice_id 
							LEFT JOIN customers
							ON pos_invoice.customer_id=customers.customer_id');
$gtotal = $query->row();
//$grandtotal = $gtotal->grand_total;	

foreach ($query->result() as $row)
{
       $receiptno=  $row->receipt_no;
	   $invoiceid=  $row->pos_invoice_id;
	   $customer=  $row->customer_name;
		echo "<br>".$receiptno." ".$customer."<br>";
					$query1 = $this->db->query('SELECT products.product_desc,pos_invoice_items.* FROM pos_invoice_items LEFT JOIN products
							ON pos_invoice_items.product_id=products.product_id 
							WHERE pos_invoice_id='.$invoiceid);
					foreach ($query1->result() as $prod)
					{
						echo "Product Desc:".$prod->product_desc." ";
						echo "SRP:".$prod->pos_price." ";
						echo "Qty:".$prod->pos_qty." ";
						echo "Total:".$prod->total."<br>";
					}
	$subtotal=  $row->total_after_tax;
	echo "<br>".$subtotal;
	}
			?>
