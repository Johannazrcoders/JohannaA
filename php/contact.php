<?php
$subjectPrefix = '[Contacto vía web]';
$emailTo = '<johannazr98@gmail.com>';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name    = stripslashes(trim($_POST['form-name']));
    $email   = stripslashes(trim($_POST['form-email']));
    $phone   = stripslashes(trim($_POST['form-tel']));
    $subject = stripslashes(trim($_POST['form-assunto']));
    $message = stripslashes(trim($_POST['form-mensagem']));
    $pattern = '/[\r\n]|Content-Type:|Bcc:|Cc:/i';
    if (preg_match($pattern, $name) || preg_match($pattern, $email) || preg_match($pattern, $subject)) {
        die("Header injection detected");
    }
    $emailIsValid = filter_var($email, FILTER_VALIDATE_EMAIL);
    if($name && $email && $emailIsValid && $subject && $message){
        $subject = "$subjectPrefix $subject";
        $body = "Nombre: $name <br /> Correo: $email <br /> Teléfono: $phone <br /> Mensaje: $message";
        $headers .= sprintf( 'Return-Path: %s%s', $email, PHP_EOL );
        $headers .= sprintf( 'From: %s%s', $email, PHP_EOL );
        $headers .= sprintf( 'Reply-To: %s%s', $email, PHP_EOL );
        $headers .= sprintf( 'Message-ID: <%s@%s>%s', md5( uniqid( rand( ), true ) ), $_SERVER[ 'HTTP_HOST' ], PHP_EOL );
        $headers .= sprintf( 'X-Priority: %d%s', 3, PHP_EOL );
        $headers .= sprintf( 'X-Mailer: PHP/%s%s', phpversion( ), PHP_EOL );
        $headers .= sprintf( 'Disposition-Notification-To: %s%s', $email, PHP_EOL );
        $headers .= sprintf( 'MIME-Version: 1.0%s', PHP_EOL );
        $headers .= sprintf( 'Content-Transfer-Encoding: 8bit%s', PHP_EOL );
        $headers .= sprintf( 'Content-Type: text/html; charset="utf-8"%s', PHP_EOL );
        mail($emailTo, "=?utf-8?B?".base64_encode($subject)."?=", $body, $headers);
        $emailSent = true;
    } else {
        $hasError = true;
    }
}
?>
<!--<!DOCTYPE html>
<html lang="es"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title> | Contacto</title>

<!-- Favicon 
<link rel="shortcut icon" href="images/favicon.ico">

<!-- bootstrap
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

<!-- plugins 
<link href="css/plugins-css.css" rel="stylesheet" type="text/css">

<!-- mega menu
<link href="css/mega-menu/mega_menu.css" rel="stylesheet" type="text/css">

 <!-- default
<link href="css/default.css" rel="stylesheet" type="text/css">

<!-- main style <link href="css/style.css" rel="stylesheet" type="text/css">

<!-- responsive <link href="css/responsive.css" rel="stylesheet" type="text/css">

<!-- Style customizer (Remove these two lines please) -->
<!--<link href="css/skins/skin-default.css" data-style="styles" rel="stylesheet">
<link href="css/style-customizer.css" rel="stylesheet" type="text/css">-->

<!-- custom style
<link href="css/custom.css" rel="stylesheet" type="text/css">


</head>

<body class="wide-layout">

<div class="page-wrapper">

<!--=================================
 preloader -
 
<div id="preloader">
  <div class="clear-loading loading-effect"> <span></span> </div>
</div>

<!--=================================
 preloader -->



<!--=================================
 contact-->

<!--<section class="contact white-bg page-section-ptb">
  <div class="container">
     <div class="row">
       <div class="col-lg-12 col-md-12">
         <form class="contact-form"  action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="contact-form" role="form" method="post">
           <div class="section-field">
            <i class="fa fa-user"></i>
            <input type="text" class="placeholder" id="form-name" name="form-name" placeholder="Nombre" required >
           </div> 
           <div class="section-field">
              <i class="fa fa-envelope-o"></i>
              <input type="email" class="placeholder" id="form-email" name="form-email" placeholder="Correo" required>
            </div>
           <div class="section-field">
              <i class="fa fa-phone"></i>
              <input type="tel" class="placeholder" id="form-tel" name="form-tel" placeholder="Teléfono" >
            </div>

           <div class="section-field">
              <i class="fa fa-file-text-o"></i>
              <input type="text" class="placeholder" id="form-assunto" name="form-assunto" placeholder="Asunto" required>
            </div>

           <div class="section-field textarea">
             <i class="fa fa-pencil"></i>
             <textarea class="input-message placeholder" placeholder="Mensaje" rows="7" id="form-mensagem" name="form-mensagem" required></textarea>
            </div>

            <div class="form-group">
              <div class="col-lg-12"><button type="submit" class="button mt-15">Enviar Mensaje <i class="fa fa-paper-plane"></i></button></div>
            </div>
         </form> 
       </div> 
     </div>
 </div>
</section>-->

<!--=================================
 contac
 
 </div>

<div id="back-to-top" style="display: none;"><a class="top arrow" href="#top"><i class="fa fa-long-arrow-up"></i></a></div>
 
<!--=================================
 jquery -->

<!-- jquery  
<script type="text/javascript" src="js/jquery.min.js"></script>

<!-- bootstrap
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- plugins-jquery
<script type="text/javascript" src="js/plugins-jquery.js"></script>

<!-- mega menu
<script type="text/javascript" src="js/mega-menu/mega_menu.js"></script>
 
<!-- socialstream
<script src="js/social/socialstream.jquery.js"></script>
 
<!-- custom
<script type="text/javascript" src="js/custom.js"></script>

</body></html>-->