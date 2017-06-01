<!doctype html>
<html lang="pt-br">
<head>
   <meta charset="utf-8">
   <title>FoxTrot-Login</title>
   <meta name="description" content="Site de brinquedos, colecionaveis">
   <meta name="keywords" content="Site, Tutorial, Aplicativo, App">
   <meta name="author" content="Julia Visolli, José Wagner">
   <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"> 
   <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="../css/login.css"> 
   <link rel="stylesheet" type="text/css" href="../css/style.css">
   <link rel="shortcut icon" href="../img/logo/LogoFoxtrot.png">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
        <header>
           <div class="box-logo center-block">
               <a href="index.html"><img class="img-responsive" src="../img/logo/LogoFoxtrot.png"></a> 
           </div>
        </header>
        <section class="pd-full-40 bg-foxtrot text-center">
             <div class="box-form-login center-block bg-orange pd-full-20 br-4">
                <form class="form-template" method="post">
                   <center>
                        <?php
                        if(isset($erro))
                          echo "  <font class='msg-erro-login'>
                              $erro
                              </font>";
                        ?>
                    </center>
                    <h1>Login</h1>
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-usuario" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <div class="form-group">
                     <input type="password" name="senha" class="form-control form-senha" id="exampleInputPassword1" placeholder="Password">
                   </div>
                   <button type="submit" class="btn btn-default btn-login-enviar bg-foxtrot">Entrar</button>
                </form>

             </div>
<!--          <a class="link-clear" href="senha.html">Esqueceu sua senha?</a>
         <a class="link-clear" href="crieconta.html">Crie sua conta FoxTrot</a> -->
</section>
</body>
</html>