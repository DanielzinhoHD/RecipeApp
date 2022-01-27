<?php

require "../vendor/autoload.php";

class SendEmail{

    public static function sendMail($to, $subject, $content){
        $key = getenv("SENDGRID_API_KEY");

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("recipeappexercise@gmail.com", "Random Recipes");
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/html", $content);

        $sendGrid = new \SendGrid($key);
        
        try{
            $response = $sendGrid->send($email);
            // print $response->statusCode() . "\n";
            // print_r($response->headers());
            // print $response->body() . "\n";
            return $response;
        }catch(Exception $e){
            echo 'Caught email exception: '.$e->getMessage()."\n";
            return false;
        }
    }
}