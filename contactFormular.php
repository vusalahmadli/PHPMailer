<?Php 
?>

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


<!-- Try to set a exact path -->

require 'path/src/PHPMailer.php';
require 'path/src/Exception.php';
require 'path/src/SMTP.php'; // include header markup
?>



<?php
                    if ( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
                        $honeypot = $_POST['surname'];
                        $userName = $_POST['name'];  //
                        $userMail = $_POST['email'];
                        $userPhone = $_POST['telephone'];
                        $subject = $_POST['subject'];
                        $privacy = $_POST['privacy'];


                        $body .= "Für: "." Main Head for Email". "\n";
                        $body .= "Von: ".$userName. "\n";
                        $body .= "Email: ".$userMail. "\n";
                        $body .= "Tel-Number: ".$userPhone. "\n";
                        $body .= "Gewünschte Kontaktaufnahme: ".$subject. "\n\n";
                        $body .= "Datenschutzerklärung gelesen und akzeptiert: Ja! ".$privacy. "\n";


                        $mail = new PHPMailer();
                        $mail->CharSet = 'UTF-8';

                        $mail->IsSMTP();
                        $mail->Host     = " Sender Email Server";
                        $mail->SMTPAuth = false;
                        $mail->Username = "Sender Email";
                        $mail->Password = "Sender Password";

                        $mail->From     = 'To Email';
                        $mail->FromName = 'Email Caption';

                        $mail->AddAddress('Which Email to be sent');

                        $mail->IsHTML(false);

                        $mail->Subject  =  'Email Subject';

                        $mail->Body     =  $body;
                        
                        // if every the condition exactly pass, Email will be send, and the user will get a message
                        
                        if(!$honeypot) {
                            $mail->Send();
                            $message_sent  = true;
                            echo '<div class="success-send" style="margin-top: 3rem; margin-bottom: 3rem;">
            <h3 class="text-center" style=" color:green"> Thanks, your Email is sent</h3>
        </div>
        <div class="back-to-contact text-center" style="margin-bottom: 3rem">
            <a class="text-center" href="*******"> <h4>back</h4> </a>
        </div>';

                        };

                    }
                    ?>

<?php
if (!$message_sent):

?>

<!-- // Below your HTML Formular could be added... -->