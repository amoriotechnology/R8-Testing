<?php
$CI = & get_instance();
$CI->load->model('Web_settings');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('invoice_details') ?></h1>
            <small><?php echo display('invoice_details') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('invoice') ?></a></li>
                <li class="active"><?php echo display('invoice_details') ?></li>
            </ol>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Alert Message -->
        <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
            ?>
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('message');
        }
        $error_message = $this->session->userdata('error_message');
        if (isset($error_message)) {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error_message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('error_message');
        }
        ?>
<?php
  $myArray = explode('(',$tax_details); 
 $tax_amt=$myArray[0];
 $tax_des=$myArray[1];


?>
    <div class="container" id="content">
        <?php
    if($template==2)
            {
            ?>
        <div class="brand-section">
        <div class="row" >
     
     <div class="col-sm-2"><img src="<?php echo  base_url().'assets/'.$logo; ?>" style='width: 100%;'>
        
       </div>
     <div class="col-sm-6 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
    <div class="col-sm-4" style="color:white;font-weight:bold;" id='company_info'>
           
          <b> Company name : </b><?php echo $company[0]['company_name']; ?><br>
          <b>   Address : </b><?php echo $company[0]['address']; ?><br>
          <b>   Email : </b><?php echo $company[0]['email']; ?><br>
          <b>   Contact : </b><?php echo $company[0]['mobile']; ?><br>
       </div>
 </div>
        </div>


        <div class="body-section">
            <div class="row">
            <div class="col-6">
            <table id="one" >
            <tr><td  class="key">Commercial Invoice Number</td><td style="width:10px;">:</td><td calss="value"><?php echo $invoicenumber;  ?></td></tr>
    <tr><td  class="key">Customer Name</td><td style="width:10px;">:</td><td calss="value"><?php echo $customername;  ?></td></tr>
    <tr><td  class="key">Invoice No</td><td style="width:10px;">:</td><td calss="value"><?php echo $date;  ?></td></tr>
    <tr><td  class="key">Payment Due date</td><td style="width:10px;">:</td><td calss="value"><?php echo $paymentdue;  ?></td></tr>
    <tr><td  class="key">Payment Terms</td><td style="width:10px;">:</td><td calss="value"> <?php echo $paymentterms;  ?></td></tr>
    <tr><td  class="key">ETA</td><td style="width:10px;">:</td><td calss="value"><?php echo $eta;  ?></td></tr>
    <tr><td  class="key">ETD</td><td style="width:10px;">:</td><td calss="value"><?php echo $etd;  ?></td></tr>
    <tr><td  class="key">Payment Type</td><td style="width:10px;">:</td><td calss="value"><?php echo $payment;  ?></td></tr>
</table>

                </div>
                <div class="col-6">
                <table id="two">

    <tr><td  class="key">Container Number</td><td style="width:10px;">:</td><td calss="value"><?php echo $container;  ?></td></tr>
    <tr><td class="key">B/L No</td><td style="width:10px;">:</td><td calss="value"><?php echo $blno;  ?></td></tr>
    <tr><td  class="key">Number of days</td><td style="width:10px;">:</td><td calss="value"><?php echo $days;  ?></td></tr>
    <tr><td  class="key">Port of discharge</td><td style="width:10px;">:</td><td calss="value"><?php echo $port;  ?></td></tr>
   

    <tr><td  class="key">Billing Address</td><td style="width:10px;">:</td><td calss="value"><?php echo $billing;  ?></td></tr>
</table>
    </div>
                
        </div>

        <div class="body-section">
            <table class="table-bordered">
                <thead>
                    <tr>
                    <th class="text-center text-white">S.No</th>
                        <th class="text-center text-white">Product Name</th>
                        <th class="text-center text-white">In stock</th>
                        <th class="text-center text-white">Quantity / Sq ft.</th>
                        <th class="text-center text-white">Amount</th>
                        <th class="text-center text-white">Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                                    if ($all_invoice) {
                               $count=1;
                                   for($i=0;$i<sizeof($all_invoice);$i++){ ?>
                    <tr>
                    <td style="font-size: 16px;"><?php echo $count; ?></td>
                       <td style="font-size: 16px;"><?php echo $all_invoice[$i]['product_name']; ?></td>
                       <td style="font-size: 16px;"><?php echo $all_invoice[$i]['in_stock']; ?></td>
                       <td style="font-size: 16px;"><?php echo $all_invoice[$i]['quantity']; ?></td>
                       <td style="font-size: 16px;"><?php  echo $currency." " ; ?><?php echo $all_invoice[$i]['rate']; ?></td>
                       <td style="font-size: 16px;"><?php  echo $currency." " ; ?><?php echo $all_invoice[$i]['total_price']; ?></td>
                    </tr>
                  
                    <?php $count++;}}  ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5" style="text-align:right;font-weight:bold;">Total:</td>
                        <td style="font-size: 16px;"><?php  echo $currency." " ; ?><?php echo $all_invoice[0]['total_amount']; ?></td>
                    </tr>
                    <tr>
                       
                    <td colspan="5" style="text-align:right;font-weight:bold;"><?php echo  "Tax (".$tax_des;  ?></td>
                           <td style="font-size: 16px;"><?php  echo $currency." " ; ?><?php echo $tax_amt;  ?></td>
                       </tr>
                    <tr>
                    <td colspan="5" style="text-align:right;font-weight:bold;">Grand Total:</td>
                        <td style="font-size: 16px;"><?php  echo $currency." " ; ?><?php echo $all_invoice[0]['gtotal']; ?></td>
                    </tr>
                                   </tfoot>
            </table>
            <br>
            <h3 class="heading">Account Details/Additional Information : </h3><?php echo $all_invoice[0]['ac_details'];  ?>  <br/><br/>
            <h3 class="heading">Remarks/Conditions : </h3><?php  echo $all_invoice[0]['remark']; ?>  <br/><br/> 
        </div>
        <?php 

}
elseif($template==1)
{
?>   <div class="brand-section">
<div class="row">
   
   <div class="col-sm-2"><img src="<?php echo  base_url().'assets/'.$logo; ?>" style='width: 100%;'>
      
     </div>
   <div class="col-sm-6 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
  <div class="col-sm-4" id='company_info' style="color:white;">
         
  <b> Company name : </b><?php echo $company[0]['company_name']; ?><br>
          <b>   Address : </b><?php echo $company[0]['address']; ?><br>
          <b>   Email : </b><?php echo $company[0]['email']; ?><br>
          <b>   Contact : </b><?php echo $company[0]['mobile']; ?><br>
     </div>
</div>
     </div>
     <div class="body-section">
            <div class="row">
            <div class="col-6">
                <table id="one" >
                <tr><td  class="key">Commercial Invoice Number</td><td style="width:10px;">:</td><td calss="value"><?php echo $invoicenumber;  ?></td></tr>
    <tr><td  class="key">Customer Name</td><td style="width:10px;">:</td><td calss="value"><?php echo $customername;  ?></td></tr>
    <tr><td  class="key">Invoice No</td><td style="width:10px;">:</td><td calss="value"><?php echo $date;  ?></td></tr>
    <tr><td  class="key">Payment Due date</td><td style="width:10px;">:</td><td calss="value"><?php echo $paymentdue;  ?></td></tr>
    <tr><td  class="key">Payment Terms</td><td style="width:10px;">:</td><td calss="value"> <?php echo $paymentterms;  ?></td></tr>
    <tr><td  class="key">ETA</td><td style="width:10px;">:</td><td calss="value"><?php echo $eta;  ?></td></tr>
    <tr><td  class="key">ETD</td><td style="width:10px;">:</td><td calss="value"><?php echo $etd;  ?></td></tr>
    <tr><td  class="key">Payment Type</td><td style="width:10px;">:</td><td calss="value"><?php echo $payment;  ?></td></tr>
</table>

                </div>
                <div class="col-6">
                <table id="two">


    <tr><td  class="key">Container Number</td><td style="width:10px;">:</td><td calss="value"><?php echo $container;  ?></td></tr>
    <tr><td class="key">B/L No</td><td style="width:10px;">:</td><td calss="value"><?php echo $blno;  ?></td></tr>
    <tr><td  class="key">Number of days</td><td style="width:10px;">:</td><td calss="value"><?php echo $days;  ?></td></tr>
    <tr><td  class="key">Port of discharge</td><td style="width:10px;">:</td><td calss="value"><?php echo $port;  ?></td></tr>
   
   
    <tr><td  class="key">Billing Address</td><td style="width:10px;">:</td><td calss="value"><?php echo $billing;  ?></td></tr>
</table>
    </div>
                
        </div>
     <div class="body-section">
            <table class="table-bordered">
                <thead>
                    <tr>
                    <th class="text-center text-white">S.No</th>
                        <th class="text-center text-white">Product Name</th>
                        <th class="text-center text-white">In stock</th>
                        <th class="text-center text-white">Quantity / Sq ft.</th>
                        <th class="text-center text-white">Amount</th>
                        <th class="text-center text-white">Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                                    if ($all_invoice) {
                               $count=1;
                                   for($i=0;$i<sizeof($all_invoice);$i++){ ?>
                    <tr>
                    <td style="font-size: 16px;"><?php echo $count; ?></td>
                       <td style="font-size: 16px;"><?php echo $all_invoice[$i]['product_name']; ?></td>
                       <td style="font-size: 16px;"><?php echo $all_invoice[$i]['in_stock']; ?></td>
                       <td style="font-size: 16px;"><?php echo $all_invoice[$i]['quantity']; ?></td>
                       <td style="font-size: 16px;"><?php  echo $currency." " ; ?><?php echo $all_invoice[$i]['rate']; ?></td>
                       <td style="font-size: 16px;"><?php  echo $currency." " ; ?><?php echo $all_invoice[$i]['total_price']; ?></td>
                    </tr>
                  
                    <?php $count++;}}  ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5" style="text-align:right;font-weight:bold;">Total:</td>
                        <td style="font-size: 16px;"><?php  echo $currency." " ; ?><?php echo $all_invoice[0]['total_amount']; ?></td>
                    </tr>
                    <tr>
                       
                    <td colspan="5" style="text-align:right;font-weight:bold;"><?php echo  "Tax (".$tax_des;  ?></td>
                           <td style="font-size: 16px;"><?php  echo $currency." " ; ?><?php echo $tax_amt;  ?></td>
                       </tr>
                    <tr>
                    <td colspan="5" style="text-align:right;font-weight:bold;">Grand Total:</td>
                        <td style="font-size: 16px;"><?php  echo $currency." " ; ?><?php echo $all_invoice[0]['gtotal']; ?></td>
                    </tr>
                                   </tfoot>
            </table>
            <br>
            <h3 class="heading">Account Details/Additional Information : </h3><?php echo $all_invoice[0]['ac_details'];  ?>  <br/><br/>
            <h3 class="heading">Remarks/Conditions : </h3><?php  echo $all_invoice[0]['remark']; ?>  <br/><br/> 
        </div>
        <?php 

}
elseif($template==3)
{
?>
<div class="brand-section">
<div class="row">
       
       <div class="col-sm-2"><img src="<?php echo  base_url().'assets/'.$logo; ?>" style='width: 100%;'>
          
         </div>
       <div class="col-sm-6 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
    
   </div>
        </div>

        <div class="body-section">
        <div class="row">
        <div class="col-sm-6 "></div>
            <div class="col-sm-6 " style="width:50%;">
             <table>

        <tr>  <td style="100px;font-weight:bold;"> Company name </td><td style="width:10px;">:</td><td> <?php echo $company[0]['company_name']; ?></td></tr>
        <tr>   <td style="100px;font-weight:bold;"> Address </td><td style="width:10px;">:</td><td> <?php  echo $company[0]['address']; ?></td></tr>
        <tr>   <td style="100px;font-weight:bold;"> Email </td><td style="width:10px;">:</td><td> <?php $company[0]['email']; ?></td></tr>
        <tr>   <td style="100px;font-weight:bold;"> Contact </td><td style="width:10px;">:</td><td> <?php $company[0]['mobile']; ?></td></tr>
</tr>        
             
</table>
            </div></div>
              <div class="row"> <div class="col-sm-12 ">&nbsp;</div></div>
              <div class="row">
            <div class="col-6">
            <table id="one" >
            <tr><td  class="key">Commercial Invoice Number</td><td style="width:10px;">:</td><td calss="value"><?php echo $invoicenumber;  ?></td></tr>
    <tr><td  class="key">Customer Name</td><td style="width:10px;">:</td><td calss="value"><?php echo $customername;  ?></td></tr>
    <tr><td  class="key">Invoice No</td><td style="width:10px;">:</td><td calss="value"><?php echo $date;  ?></td></tr>
    <tr><td  class="key">Payment Due date</td><td style="width:10px;">:</td><td calss="value"><?php echo $paymentdue;  ?></td></tr>
    <tr><td  class="key">Payment Terms</td><td style="width:10px;">:</td><td calss="value"> <?php echo $paymentterms;  ?></td></tr>
    <tr><td  class="key">ETA</td><td style="width:10px;">:</td><td calss="value"><?php echo $eta;  ?></td></tr>
    <tr><td  class="key">ETD</td><td style="width:10px;">:</td><td calss="value"><?php echo $etd;  ?></td></tr>
    <tr><td  class="key">Payment Type</td><td style="width:10px;">:</td><td calss="value"><?php echo $payment;  ?></td></tr>
</table>

                </div>
                <div class="col-6">
                <table id="two">

   
    <tr><td  class="key">Container Number</td><td style="width:10px;">:</td><td calss="value"><?php echo $container;  ?></td></tr>
    <tr><td class="key">B/L No</td><td style="width:10px;">:</td><td calss="value"><?php echo $blno;  ?></td></tr>
    <tr><td  class="key">Number of days</td><td style="width:10px;">:</td><td calss="value"><?php echo $days;  ?></td></tr>
    <tr><td  class="key">Port of discharge</td><td style="width:10px;">:</td><td calss="value"><?php echo $port;  ?></td></tr>
   
   
    <tr><td  class="key">Billing Address</td><td style="width:10px;">:</td><td calss="value"><?php echo $billing;  ?></td></tr>
</table>
    </div>
                
        </div>
     <div class="body-section">
            <table class="table-bordered">
                <thead>
                    <tr>
                    <th class="text-center text-white">S.No</th>
                        <th class="text-center text-white">Product Name</th>
                        <th class="text-center text-white">In stock</th>
                        <th class="text-center text-white">Quantity / Sq ft.</th>
                        <th class="text-center text-white">Amount</th>
                        <th class="text-center text-white">Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                                    if ($all_invoice) {
                               $count=1;
                                   for($i=0;$i<sizeof($all_invoice);$i++){ ?>
                    <tr>
                    <td style="font-size: 16px;"><?php echo $count; ?></td>
                       <td style="font-size: 16px;"><?php echo $all_invoice[$i]['product_name']; ?></td>
                       <td style="font-size: 16px;"><?php echo $all_invoice[$i]['in_stock']; ?></td>
                       <td style="font-size: 16px;"><?php echo $all_invoice[$i]['quantity']; ?></td>
                       <td style="font-size: 16px;"><?php  echo $currency." " ; ?><?php echo $all_invoice[$i]['rate']; ?></td>
                       <td style="font-size: 16px;"><?php  echo $currency." " ; ?><?php echo $all_invoice[$i]['total_price']; ?></td>
                    </tr>
                  
                    <?php $count++;}}  ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5" style="text-align:right;font-weight:bold;">Total:</td>
                        <td style="font-size: 16px;"><?php  echo $currency." " ; ?><?php echo $all_invoice[0]['total_amount']; ?></td>
                    </tr>
                    <tr>
                       
                    <td colspan="5" style="text-align:right;font-weight:bold;"><?php echo  "Tax (".$tax_des;  ?></td>
                           <td style="font-size: 16px;"><?php  echo $currency." " ; ?><?php echo $tax_amt;  ?></td>
                       </tr>
                    <tr>
                    <td colspan="5" style="text-align:right;font-weight:bold;">Grand Total:</td>
                        <td style="font-size: 16px;"><?php  echo $currency." " ; ?><?php echo $all_invoice[0]['gtotal']; ?></td>
                    </tr>
                                   </tfoot>
            </table>
            <br>
            <h3 class="heading">Account Details/Additional Information : </h3><?php echo $all_invoice[0]['ac_details'];  ?>  <br/><br/>
            <h3 class="heading">Remarks/Conditions : </h3><?php  echo $all_invoice[0]['remark']; ?>  <br/><br/> 
        </div>
        <?php 

}
?>
        
    </div>   

    
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

<style>

.key{
    text-align:left;
font-weight:bold;

}
.value{
    text-align:left;
}
#one,#two{
float:left;
width:100%;
}
body{
    background-color: #fcf8f8; 
    margin: 0;
    padding: 0;
}
h1,h2,h3,h4,h5,h6{
    margin: 0;
    padding: 0;
}
p{
    margin: 0;
    padding: 0;
}
.heading_name{
    font-weight: bold;
}
.container{
    width: 100%;
    margin-right: auto;
    margin-left: auto;
    margin-top: 50px;
}
.brand-section{
   background-color: #5961b3;
   padding: 10px 40px;
}
.logo{
    width: 50%;
}

.row{
    display: flex;
    flex-wrap: wrap;
    
}
.col-6{
    width: 50%;
    flex: 0 0 auto;
   
}
.text-white{
    color: #fff;
}
.company-details{
    float: right;
    text-align: right;
}

.body-section{
    padding: 16px;
    border: 1px solid gray;
    
}
.heading{
    font-size: 20px;
    margin-bottom: 08px;
}
.sub-heading{
    color: #262626;
    margin-bottom: 05px;
}
table{
   
    background-color: #fff;
    width: 100%;
    border-collapse: collapse;
   
}

table thead tr{
    border: 1px solid #111;
    background-color: #5961b3;
   
}
.table-bordered td{
    text-align:center;
}
table td {
    vertical-align: middle !important;
  
    word-wrap: break-word;
}
th{
    text-align:center;
    color:white;
}
table th, table td {
    padding-top: 08px;
    padding-bottom: 08px;
}
.table-bordered{
    box-shadow: 0px 0px 5px 0.5px gray !important;
}
.table-bordered td, .table-bordered th {
    border: 1px solid #dee2e6 !important;
}
.text-right{
    text-align: right;
}
.w-20{
    width: 20%;
}
.float-right{
    float: right;
}
@media only screen and (max-width: 600px) {
    
}


</style>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
    
$(document).ready(function () {
 
 var pdf = new jsPDF('p','pt','a4');
    const invoice = document.getElementById("content");
             console.log(invoice);
             console.log(window);
             var pageWidth = 8.5;
             var margin=0.5;
             var opt = {
   lineHeight : 1.2,
   margin : 0.2,
   maxLineWidth : pageWidth - margin *1,
                 filename: 'invoice'+'.pdf',
                 allowTaint: true,
                 html2canvas: { scale: 3 },
                 jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
             };
              html2pdf().from(invoice).set(opt).toPdf().get('pdf').then(function (pdf) {
  var totalPages = pdf.internal.getNumberOfPages();
 for (var i = 1; i <= totalPages; i++) {
    pdf.setPage(i);
    pdf.setFontSize(10);
    pdf.setTextColor(150);
  }

  }).save();
  var timer = setTimeout(function() {
            window.location='<?php  echo base_url();   ?>'+'Cinvoice/manage_invoice'
        }, 1000);
   });
  
   </script>
