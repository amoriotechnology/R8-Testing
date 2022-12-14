<!-- Product Purchase js -->
<script src="<?php echo base_url()?>my-assets/js/admin_js/json/product_purchase.js.php" ></script>
<!-- Supplier Js -->
<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script>

<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<!-- Datepicker -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<!-- Add New Purchase Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Ocean Export Tracking</h1>
            <small>Generate New Ocean Export Tracking</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Ocean Export Tracking</a></li>
                <li class="active">Generate New Ocean Export Tracking</li>
            </ol>
        </div>
    </section>

   <?php 
if(isset($_SESSION['oceanid']))
{

?>
<script type="text/javascript">
     $(document).ready(function(){

     $('#myModal1').modal('show');
     hide();
     });
     
</script>
<?php } ?>
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;">
        <div class="modal-header" style="">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ocean Export Tracking</h4>
        </div>
        <div class="modal-body">
          
          <h4>Ocean Export Invoice  Created Succefully</h4>
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>
    <section class="content">
        <!-- Alert Message -->
        <?php
            $message = $this->session->userdata('message');
            if (isset($message)) {
        ?>
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <?php echo $message ?>                    
        </div>
        <?php 
            $this->session->unset_userdata('message');
            }
            $error_message = $this->session->userdata('error_message');
            if (isset($error_message)) {
        ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
            <?php echo $error_message ?>                    
        </div>
        <?php 
            $this->session->unset_userdata('error_message');
            }
        ?>

        <!-- Purchase report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Create New Ocean Export Tracking Invoice</h4>
                        </div>
                    </div>

                    <div class="panel-body">
                     <?php  echo form_open_multipart('Cinvoice/insert_ocean_export',array('class' => 'form-vertical', 'id' => 'createform','name' => 'createform'));
                 ?>           

                        <div class="row">
                           
                             <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Shipper
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="supplier_id" id="supplier_id" class="form-control " required="" tabindex="1"> 
                                            <option value=" "><?php echo display('select_one') ?></option>
                                            {all_supplier}
                                            <option value="{supplier_id}">{supplier_name}</option>
                                            {/all_supplier}
                                        </select>
                                    </div>
                                  <?php if($this->permission1->method('add_supplier','create')->access()){ ?>
                                    <div class="col-sm-2">


                                     <!--    <a class="btn btn-success" title="Add New Supplier" href="<?php echo base_url('Csupplier'); ?>"><i class="fa fa-user"></i></a> -->



                                          <a href="#" class="client-add-btn btn btn-info" aria-hidden="true" data-toggle="modal" data-target="#add_vendor"><i class="fa fa-user"></i></a>


                                    </div>
                                <?php }?>
                                </div> 
                            </div>


                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="booking_no" class="col-sm-4 col-form-label">Booking No.
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="booking_no" placeholder="Booking or B/L number" id="booking_no" required />
                                    </div>
                                </div>
                            </div>




                            
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Invoice Date
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="text" required tabindex="2" class="form-control datepicker" name="invoice_date" value="<?php echo $date; ?>" id="date"  required/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Customer / Consignee <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                    <div class="form-group row">
                                    <div class="col-sm-6">
                                        <select name="consignee" id="consignee" class="form-control " required="" tabindex="1"> 
                                            <option value=" "><?php echo display('select_one') ?></option>
                                            {all_customer}
                                            <option value="{customer_name}">{customer_name}</option>
                                            {/all_customer}
                                        </select>
                                        </div>
                                        <div class="col-sm-2">
                                        <?php if($this->permission1->method('add_customer','create')->access()){ ?>

<a href="<?php echo base_url('Ccustomer') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-plus"> </i> <?php echo display('add_customer') ?> </a>

<?php }?>
                                      
</div>
</div>
                                    </div>
                                </div> 
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="etd" class="col-sm-4 col-form-label">Notify Party
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="etd" placeholder="Notify Party" id="notify_party" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="eta" class="col-sm-4 col-form-label">Vessel
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="vessel" name="vessel" placeholder="Vessel" rows="1"></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>




                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="shipping_line" class="col-sm-4 col-form-label">Voyage No.
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="voyage_no" placeholder="Voyage No." id="voyage_no" required/>
                                    </div>
                                </div>
                            </div>

                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="bl_number" class="col-sm-4 col-form-label">Port of loading
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="port_of_loading" placeholder="Port of loading" id="port_of_loading" required/>
                                    </div>
                                </div>
                            </div>


                          
                        </div>


                          <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="bl_number" class="col-sm-4 col-form-label">Port of discharge
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="port_of_discharge" placeholder="Port of discharge" id="port_of_discharge" required/>
                                    </div>
                                </div>
                            </div>


                                <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="container_no" class="col-sm-4 col-form-label">Place of Delivery <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="place_of_delivery" name="place_of_delivery" placeholder="Place of Delivery" rows="1" required></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="container_no" class="col-sm-4 col-form-label">Container No
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                       <textarea class="form-control" tabindex="4" id="container_no" name="container_no" placeholder="Container No" rows="1" required></textarea>
                                    </div>
                                </div>
                            </div>


                                <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="seal_no" class="col-sm-4 col-form-label">Seal No <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="seal_no" name="seal_no" placeholder="Seal No" rows="1" required></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="Freight forwarder" class="col-sm-4 col-form-label">Freight forwarder
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                       <input field class="form-control" tabindex="4" id="Freight forwarder" name="freight_forwarder" placeholder="Freight forwarder" rows="1" required>
                                    </div>
                                </div>
                            </div>


                                <div class="col-sm-6">
                               <div class="form-group row">
                               <label for="adress" class="col-sm-4 col-form-label">Attachements
                                    </label>
                                    
                                    <div class="col-sm-6">
                                       <input type="file" name="attachments" class="form-control">
                                    </div>
                                    
                                    <div class="col-sm-2">
                                    <button type="button" class="btn btn-info m-b-5 m-r-2" data-toggle="modal" data-target="#myModal">
                                    Track Online</button>
                                   
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="bl_number" class="col-sm-4 col-form-label">Estimated time of departure
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                    <?php $date = date('Y-m-d'); ?>
                                        <input type="date" required tabindex="2" class="form-control " name="delivery_date" value="<?php echo $date; ?>" id="date"  />
                                    </div>
                                </div>
                            </div>


                                <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="container_no" class="col-sm-4 col-form-label">Estimated Time of Arrival <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                    <?php $date = date('Y-m-d'); ?>
                                        <input type="date" required tabindex="2" class="form-control " name="arrival" value="<?php echo $date; ?>" id="date"  />
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="particulars" class="col-sm-2 col-form-label">Particulars
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-10">
                                       <textarea class="form-control" tabindex="4" id="particular" name="particular"  rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
               
                                        
                      
                       
                        
                        
                        
                        
                        
                        <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#datepicker-13" ).datepicker();
            $( "#datepicker-13" ).datepicker("hide");
            $( "#datepicker-12" ).datepicker();
            $( "#datepicker-12" ).datepicker("hide");
         });
      </script>
   </head>
   
  
     
   
<br>
                       

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <!-- <input type="submit" id="ocean_export_tracking" class="btn btn-primary btn-large" name="add-ocean-export" value="<?php echo display('submit') ?>" />
                                <input type="submit" value="<?php echo display('submit_and_add_another') ?>" name="add-ocean-export-another" class="btn btn-large btn-success" id="add-ocean-export-another" > -->

                                 <table>
                                <tr>
                                    <td>
                                        <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">
    
                                        <input type="submit" id="ocean_export_tracking" class="btn btn-primary btn-large" name="add-ocean-export" onclick="  
                                        "name="add-purchase" value="<?php echo display('Save') ?>" />
                                    </td>
                                    <td>&nbsp;</td>
                                   <?php  if(isset($_SESSION['oceanid']))    {?>    
                                    <td>
                                       <a href="<?php echo base_url('Cinvoice/manage_ocean_export_tracking/'); ?>" style="color: #fff ;" id="save_another" class="btn btn-primary">
                                           Submit
                                        </a>
                                        <a href="<?php echo base_url('Cinvoice/invoice_inserted_data/'); ?><?php echo $this->session->userdata('oceanid');?>" id="download" class="btn btn-primary">
                                            Download 
                                        </a>

                                    </td>
                                    <td>&nbsp;</td>
                                    <td>
                                       <a class="btn  btn-primary" style=" color: #fff;"  data-toggle="modal" data-target="#emailmodal">Send mail with attachment</a>

  <!-- Modal -->
<div id="emailmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<form action="insert_role">    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select Email Template </h4>
      </div>
      <div class="modal-body">
     <div class="row">
        <div class="col-sm-6" style="border: 1px solid #6666;text-align: center;">  <p style="font-weight: bold;">Standard</p>
            <br>
            <i>Standard Email Temeplate</i>
            <br>
            <br>
         <a href="<?php echo base_url('Cinvoice/ocean_with_attachment_stand/').$this->session->userdata('oceanid');  ?>" class="btn btn-default">Select</a></div>
        <div class="col-sm-6" style="border: 1px solid #6666;text-align: center;">  <p style="font-weight: bold;">Custom</p>
            <br>
            <i>Custom Email Temeplate</i>
            <br>
            <br>
         <a class="btn btn-default" href="<?php echo base_url('Cinvoice/ocean_with_attachment_cus/').$this->session->userdata('oceanid');  ?>">Select</a></div>
       
     </div>


</div>
      <div class="modal-footer">
      
      </div>
    </div>

  </div>
</div>
                                         
                                    </td>
                                <?php } ?>
                                  
                                  
                                    
                                </tr>
                               </table>
                            </div>
                        </div>

                        <input type ="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash();?>">

                  <?php      echo form_close(); ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Online Tracking</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      Vessel
      <br/>
      container no
      <br/>
      tracking
  </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- Purchase Report End -->


<div class="modal fade modal-success" id="add_vendor" role="dialog">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header">

                            <a href="#" class="close" data-dismiss="modal">&times;</a>

                            <h3 class="modal-title">Add New Vendor</h3>

                        </div>

                        

                        <div class="modal-body">

                            <div id="customeMessage" class="alert hide"></div>

                           

                             <?php echo form_open_multipart('Csupplier/insert_supplier', array('id' => 'insert_supplier')) ?>


                    <div class="panel-body">



                        <div class="col-sm-6">

                        <div class="form-group row">
                            <label for="supplier_name" class="col-sm-4 col-form-label">Vendor Name<i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name ="supplier_name" id="supplier_name" type="text" placeholder="Vendor Name"  required="" tabindex="1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-sm-4 col-form-label">Vendor Mobile<i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="mobile" id="mobile" type="number" placeholder="Vendor Mobile"  min="0" tabindex="2">
                            </div>
                        </div>
                            <div class="form-group row">
                            <label for="phone" class="col-sm-4 col-form-label"><?php echo display('phone') ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="phone" id="phone" type="number" placeholder="<?php echo display('phone') ?>"  min="0" tabindex="2">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label"><?php echo display('email') ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="email" id="email" type="email" placeholder="<?php echo display('email') ?>"   tabindex="2">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="emailaddress" class="col-sm-4 col-form-label"><?php echo display('email').' '.display('address'); ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="emailaddress" id="emailaddress" type="email" placeholder="<?php echo display('email').' '.display('address') ?>"  >
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="contact" class="col-sm-4 col-form-label"><?php echo display('contact'); ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="contact" id="contact" type="text" placeholder="<?php echo display('contact') ?>"  >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fax" class="col-sm-4 col-form-label"><?php echo display('fax'); ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="fax" id="fax" type="text" placeholder="<?php echo display('fax') ?>"  >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-sm-4 col-form-label"><?php echo display('city'); ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="city" id="city" type="text" placeholder="<?php echo display('city') ?>"  >
                            </div>
                        </div>


                         <div class="form-group-row">
                        <label for="" class="col-sm-4 col-form-label">Service Provider</label>
                            <div class="col-sm-8">
                               <select class="form-control" name="service_provider">
                                <option value="1">Yes</option>
                                <option value="0" selected>No</option>
                               </select>
                            </div>
                    </div>


                         
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group row">
                            <label for="state" class="col-sm-4 col-form-label"><?php echo display('state'); ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="state" id="state" type="text" placeholder="<?php echo display('state') ?>"  >
                            </div>
                        </div>
                      
                         
                         <div class="form-group row">
                            <label for="zip" class="col-sm-4 col-form-label"><?php echo display('zip'); ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="zip" id="zip" type="text" placeholder="<?php echo display('zip') ?>"  >
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="country" class="col-sm-4 col-form-label"><?php echo display('country') ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="country" id="country" type="text" placeholder="<?php echo display('country') ?>"  >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address " class="col-sm-4 col-form-label"><?php echo display('supplier_address') ?></label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="address" id="address " rows="2" placeholder="<?php echo display('supplier_address') ?>" ></textarea>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="address2 " class="col-sm-4 col-form-label"><?php echo display('address') ?>2</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="address2" id="address2" rows="2" placeholder="<?php echo display('supplier_address') ?>2" ></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="details" class="col-sm-4 col-form-label"><?php echo display('supplier_details') ?></label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="details" id="details" rows="2" placeholder="<?php echo display('supplier_details') ?>" tabindex="4"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo display('previous_balance') ?></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="previous_balance" id="previous_balance" type="text" min="0" placeholder="<?php echo display('previous_balance') ?>" tabindex="5">
                            </div>
                        </div>
                    </div> 

                    </div>

                    

                        </div>



                        <div class="modal-footer">

                            

                            <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>

                            

                            <input type="submit" id="add-supplier-from-oit" name="add-supplier-from-oit"  class="btn btn-success" value="Submit">

                        </div>

                        <?php echo form_close() ?>

                    </div><!-- /.modal-content -->

                </div><!-- /.modal-dialog -->

            </div><!-- /.modal -->


<style>
 #btn1_download{
display:none;
 }
     #btn1_email{
        display:none;
     }
    </style>




