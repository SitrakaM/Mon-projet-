<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require'../PHPMailer-master/src/Exception.php';
require'../PHPMailer-master/src/PHPMailer.php';
require'../PHPMailer-master/src/SMTP.php';

function send_mail($destinataire,$sujet,$message){

    $mail= new PHPMailer();
    $mail->IsSMTP();
    $mail->CharSet = "UTF-8";
    // $mail->Host = 'smtp.gmail.com';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Username = "censuraofficiel@gmail.com";
    $mail->Password = 'gmdc ectb bsui zeut';
    
    $from= 'censuraofficiel@gmail.com';
    $from_name= 'Censura';
    $mail->SetFrom($from, $from_name);
    $mail->AddAddress($destinataire);
    $mail->Subject = $sujet;
    $mail->WordWrap=50;
    $mail->AltBody = $message;
    $mail->IsHTML(false);
    $mail->MsgHTML($message);
    
    if($mail->send()){
        echo 'oui nefa';
    }else{
        echo "$mail->ErrorInfo";
    }
}

//send_mail($destinataire,$sujet,$message);
    function sendRefus($nom,$destinataire,$titrevideo){
        $date= Date('d/m/Y');
        $sujet="Suite à votre publication sur notre site";
        $message1="<html>
            <head>
            <meta charset='UTF-8'>
            Aujourd’hui ".$date."
            </head>
            <body>
                <p>
                Cher/Chère ".$nom.", <br> 
                Merci beaucoup d’avoir proposé votre œuvre sur notre site, que nous avons étudiée avec attention.<br>
                Nous sommes au regret de vous informer que nous ne pouvons pas y donner une suite favorable.<br>
                En effet, notre équipe a examiné votre contenu. Malheureusement votre vidéo : « ".$titrevideo." » va à l’encontre de nos règlements relatifs aux contenus indécents ou pernicieux.
                Nous refusons la publication de votre vidéo sur notre site.   <br>
                Cordialement,<br>
                Censura

                </p>
            </body>
        </html>";
        send_mail($destinataire,$sujet,$message1); 
    }
    function sendValidation($nom,$destinataire,$titrevideo){
        $date= Date('d/m/Y');
        $sujet="Suite à votre publication sur notre site";
        $message2="<html>
            <head>
            <meta charset='UTF-8'>
            Aujourd’hui ".$date."
            </head>
            <body>
                <p>
                Cher/Chère ".$nom.", <br> 
                Merci beaucoup d’avoir proposé votre œuvre sur notre site.<br> 
                Nous sommes ravis de vous informer qu’après avoir analysé votre œuvre nous n’avons constaté aucun contenu qui va l’encontre de nos règlements relatifs aux contenus indécents ou pernicieux.<br>
                Ainsi, votre œuvre:« ".$titrevideo." » a été approuvée par les administrateurs de Censura et vous pouvez maintenant la consulter via le site officiel de Censura.<br>
                Censura vous remercie.<br>
                Cordialement,<br>
                Censura        

                </p>
            </body>
        </html>";
        send_mail($destinataire,$sujet,$message2); 
    }
?>