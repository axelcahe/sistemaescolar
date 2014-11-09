<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Theme Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body role="document">
<div class="table-responsive">
    <form id='frmdo' name='frmdo' method='post' action="Validar.php">
        <table class="table table-striped" align="center">
            <tr><td align=center colspan="2"><strong>Ingresar al Sistema</strong></td></tr>
            <tr>
                <td align="left"><strong>Usuario</strong></td>
                <td align="center"><input type='txt' name='usuario'  id='usuario' class='form-input addu'><br><br></td>
            </tr>
            <tr>
                <td align="left" class="textos0"><strong>Password</strong></td>
                <td align="center"><input type='password' name='psw' id='psw' class='form-input addu'></td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <p>
                        <input type='submit' value='Aceptar' class='form-btn'/>
                    </p></td>
            </tr>
        </table>
    </form>
</div>
<div id="ajax">&nbsp;</div>
<script type="text/javascript">
    $(function (e) {
        $('#form1').submit(function (e) {
            e.preventDefault()
            $('#ajax').load('Validar.php?' + $('#frmdo').serialize())
        })
    })
</script>
<?php
require('footer.php');
?>
