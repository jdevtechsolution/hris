<br />


<div class="row">
    <div class="col-sm-12">
        <div style='border-bottom:1px solid gray;'></div>
    </div>
</div><br />

<div class="row" >
    <div class="col-lg-12">
        <div class="title-action" style="margin-left: 3%;">
            <a id="btn_email" data-supplier-email="<?php echo $purchase_info->email_address; ?>" class="btn btn-primary" style="text-transform:none;font-family: tahoma;" ><i class="fa fa-envelope"></i> <span class=""></span> Email to Supplier</a>
            <a href="Templates/layout/po/<?php echo $purchase_info->purchase_order_id; ?>/preview" target="_blank" class="btn btn-default" style="text-transform:none;font-family: tahoma;" ><i class="fa fa-print"></i> Print PO </a>
            <a href="Templates/layout/po/<?php echo $purchase_info->purchase_order_id; ?>/pdf" class="btn btn-default" style="text-transform:none;font-family: tahoma;" ><i class="fa fa-file-pdf-o"></i> Download as PDF </a>
        </div>
    </div>

</div>

<br />