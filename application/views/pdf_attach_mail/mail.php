  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css"></script>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>



<?php 
if(isset($mail))
{
$subject=$mail[0]['subject'];
$greeting=$mail[0]['greeting'];
$message=$mail[0]['message'];
}
else
{

    $subject='Sales Invoice';
    $greeting='Dear sir';
    $message='Please find the attachement';

}
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
  
try {
    $mail->SMTPDebug = 2;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com;';                    
    $mail->SMTPAuth   = true;                             
   $mail->Username = 'krramjiamorio@gmail.com';               
    $mail->Password = 'fjrcwsrhknchhhzx';                      
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->Port       = 587;  
  
    $mail->setFrom($company_info[0]['email'], $company_info[0]['company_name']);           
              
    $mail->addAddress('ajithkumar0902001@gmail.com');
  
       
    $mail->isHTML(true);  
    if(isset($mail))
{
  
 $mail->Subject =$subject;
    $mail->Body    =$greeting.'<br></br>'.$message.'<br><br>regards<br><br>

    '.$company_info[0]['company_name'].'<br>
    '.$company_info[0]['address'].'<br>
    '.$company_info[0]['email'].'<br>';
 }
 else 
 {
   $mail->Subject = 'Sales Invoice';
    $mail->Body    = 'Dear sir,<br><br>
    Please find the attached<br>

    regards<br>

    '.$company_info[0]['company_name'].'<br>
    '.$company_info[0]['address'].'<br>
    '.$company_info[0]['email'].'<br>

    '; 
 }                                
    
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';


    $mail->addAttachment($file_name,$file_name);
    $mail->send();
    
   if($mail->send())
   {

        unlink($file_name);
      



    } 

   
} 
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
  ?>

 
<script type="text/javascript">



//   alert('Invoice sent Succefully');   
   history.back();

</script>
    

<?php 


  exit();
?>



<!-- s -->

 