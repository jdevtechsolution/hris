
            <?php 
			$val="";
			foreach($info as $item){ 
			
			if($item->receipt_no==$val){

	 echo "product desc:".$item->product_desc."<br>"; 
	 echo "qty:".number_format($item->pos_qty,2)."<br>";
	 echo "price:".number_format($item->pos_price,2)."<br>";
	 echo "total:".number_format($item->total,2)."<br>";
	 echo "summary total:".number_format($item->total_after_tax,2)."<br>";
			}
			else{
	echo "receipt no:".$item->receipt_no."<br>";
	echo "Customer:".$item->customer_name."<br>";
	echo "product desc:".$item->product_desc."<br>"; 
	echo "qty:".number_format($item->pos_qty,2)."<br>";
	echo "price:".number_format($item->pos_price,2)."<br>";
	echo "total:".number_format($item->total,2)."<br>";
	echo "summary total:".number_format($item->total_after_tax,2)."<br>";
			}
			$val=$item->receipt_no;
			}
echo "Grand Total:".$grandtotal;
			?>
