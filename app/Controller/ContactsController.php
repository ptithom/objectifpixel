<?php

App::uses('AppController', 'Controller');

class ContactsController extends AppController {

	public $uses = array();

	public function send_mail() {

        $this->autoRender = false;
          if($this->request->is('post')){
                $data = $this->request->data;

                if(filter_var($data['email'], FILTER_VALIDATE_EMAIL)){

                //L'email est bonne
                    $to = $data['email'];
                    $subject = "HTML email";

                    $message = "
                        <html>
                            <head>
                                <title>Contact ObjectifPixel</title>
                            </head>
                            <body>
                                <p>Message de ".$data['name']." a ".date('l jS \of F Y h:i:s A').": </p>
                                <p>".$data['message']."</p>
                            </body>
                        </html>
                    ";

                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    // More headers
                    $headers .= 'From: <contact@objectifpixel.com>' . "\r\n";

                    mail($to,$subject,$message,$headers);

                    echo "<div class='alert-success' style='width:70%;margin:auto;text-align:center;color:white,margin-bottom: 20px;'>Email bien envoyer.</div>";
                }else{
                    echo "<div class='alert-danger' style='width:70%;margin:auto;text-align:center;color:white,margin-bottom: 20px;'>Adresse email incorrect.</div>";
                }
          }else{
                echo "<div class='alert-danger' style='width:70%;margin:auto;text-align:center;color:white,margin-bottom: 20px;'>Un probleme est survenu lors de l'envoie de l'email, merci de recommencer ulterieurement.</div>";
          }
	}
}
