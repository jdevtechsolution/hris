<?php 
$fromdate=$_POST['fromdateinventory']; //post value of the date
$tilldate=$_POST['tilldateinventory']; //post value of the date
$newfromdate = date("Y-m-d", strtotime($fromdate));
$newtilldate = date("Y-m-d", strtotime($tilldate));
$filterdate="'$newfromdate'"; 
$filterdate2="'$newtilldate'"; 
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
				<th width='30%' style='text-align: left;'><?php echo "Period: <u>".$fromdate."</u> to <u>".$tilldate."<u/>"; ?></th>
				
				<th width='30%' style='text-align: right;'><?php echo "<h3>List of Sales Invoice</h3>"; ?></th>
            </tr>
            <tr>
				<th width='6%' style='border-bottom: 2px solid gray;text-align: left'>Category</th>
                <th width='12%' style='border-bottom: 2px solid gray;text-align: left;'>Product Code</th>
				<th width='12%' style='border-bottom: 2px solid gray;text-align: left;'>Description</th>
				<th width='12%' style='border-bottom: 2px solid gray;text-align: left;'>Unit</th>
				<th width='12%' style='border-bottom: 2px solid gray;text-align: left;'>On Hand</th>

            </tr>
            </tr>
            </thead>
 <tbody>
<?php
			
			$query = $this->db->query('SELECT category_id,category_name from categories');
$gtotal = $query->row();
//$grandtotal = $gtotal->grand_total;	

foreach ($query->result() as $row)
{
       $category_name=  $row->category_name;
	   $category_id=  $row->category_id;
		?> 
						<tr>
						<td width='6%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;text-align: left;'><?php echo $category_name; ?></td>
						<td width='12%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;'></td>
						<td width='12%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;'></td>
						<td width='12%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;'></td>
						<td width='12%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;'></td>
						<td width='12%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;'></td>
						</tr>


		<?php
					$query1 = $this->db->query('SELECT products.*,units.unit_name FROM products
							LEFT JOIN categories
							ON products.category_id=categories.category_id 
							LEFT JOIN units
							ON products.unit_id=units.unit_id 
							WHERE products.category_id='.$category_id);
							
					foreach ($query1->result() as $prod)
					{
						
						?>
						<tr>
						<td width='6%' style='text-align: left;'></td>
						<td width='24%' style='text-align: left;'><?php echo $prod->product_code; ?></td>
						<td width='32%' style='text-align: left;'><?php echo $prod->product_desc; ?></td>
						<td width='32%' style='text-align: left;'><?php echo $prod->unit_name; ?></td>
						<td width='12%' style='text-align: left;'><?php echo $prod->quantity; ?></td>
				<?php	}
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
