<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $Nome = $_POST ['Nome'];
        $Email = $_POST ['Email'];
        $Celular = $_POST ['Celular'];


        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "amandinhaferreiradelgado240@gmail.com");
        $subject = "Dados do formulário";
        $to = new SendGrid\Email(null, "fedelgadoo86@gmail.com");
        $content = new SendGrid\Content("text/html", "Dados do formulário preenchido<br><br>Nome: $Nome<br>Email: $Email <br>Celular: $Celular");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = 'SENDGRID_API_KEY';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo $response->statusCode();
        echo $response->headers();
        echo $response->body();
        ?>
    </body>
</html>