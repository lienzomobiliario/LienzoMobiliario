<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
header('Allow: GET, POST, OPTIONS, PUT, DELETE');

    $errors = array();

    // Check if name has been entered
    if (!isset($_POST['name'])) {
        $errors['name'] = 'Please enter your name';
    }

    // Check if email has been entered and is valid
    if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address';
    }

    //Check if message has been entered
    if (!isset($_POST['message'])) {
        $errors['message'] = 'Please enter your message';
    }

    $errorOutput = '';

    if (!empty($errors)) {
        $errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
        $errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

        $errorOutput .= '<ul>';

        foreach ($errors as $key => $value) {
            $errorOutput .= '<li>'.$value.'</li>';
        }

        $errorOutput .= '</ul>';
        $errorOutput .= '</div>';

        echo $errorOutput;
        die();
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $from = $email;
    $to = 'johnangel63@hotmail.com';  // please change this email id
    $subject = 'Formulario de contacto en LienzoMobiliario';

    $body = "De: $name\n E-Mail: $email\n Message:\n $message";

    $body = '
        
    '

    $headers = 'From: '.$from;

    //send the email
    $result = '';
    if (mail($to, $subject, $body, $headers)) {
        $result .= '<div class="alert alert-success alert-dismissible" role="alert">';
        $result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        $result .= 'Gracias por tu interes en nuestros servicios, permitenos darle algo de tiempo a tu solicitud';
        $result .= '</div>';

        echo $result;
        die();
    }

    $result = '';
    $result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
    $result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    $result .= 'Ha ocurrido un error mientras enviabamos tu mensaje, por favor intenta más tarde o comunícate a nuestra línea teléfonica';
    $result .= '</div>';

    echo $result;
