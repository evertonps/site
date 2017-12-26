<?php
header('Content-Type: text/html; charset=UTF-8');
/*================================ 
=== RECEBE DADOS DO FORMULÁRIO ===
================================*/ 

$nome       = trim($_POST['nome']);
$email      = trim($_POST['email']);
$mensagem   = trim($_POST['mensagem']);
$assunto    = "Contato através do site";
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

if($nome != "" && $email != "" && $mensagem != ""){

    $nome     = $nome;
    $email    = $email;
    $mensagem   = $mensagem;
    $assunto  = "Contato do visitante";
    $conteudo = "
    <!DOCTYPE html>
    <html lang='pt-BR'>
        <section class='corpo' style='
          margin: 0px;
          padding-top: 60px;
          padding-bottom: 60px;
          width: 100%;
          height: auto;
          float: left;
          background: #fff;
          z-index: -1;
          position: relative;'>

          <div class='titulo' style='
            text-align: center;
            font-size: 26px;
            text-transform: uppercase;
            font-family: arial;'>Informações do visitante</div>
          <div class='escopo' style='margin-top: 40px;'>
            <div class='campos' style='
              margin-bottom: 20px;
              text-align: center;
              font-size: 18px;
              font-family: arial;
              color:#000;'>Nome: $nome</div>
			<div class='campos' style='
              margin-bottom: 20px;
              text-align: center;
              font-size: 18px;
              font-family: arial;
              color:#000;
              '>Email: $email </div>
            <div class='campos'style='
              margin-bottom: 20px;
              text-align: center;
              font-size: 18px;
              font-family: arial;
              color:#000;
              '>Mensagem: $mensagem</div>
        </section>
        <section class='rodape' style='
            margin: 0px;
            padding-top: 20px;
            padding-bottom: 10px;
            width: 100%;
            height: auto;
            float: left;
            background: #fff;
            box-shadow: 0px -23px 98px -35px rgba(0, 0, 0, 0.76);
            -moz-box-shadow: 0px -23px 98px -35px rgba(0, 0, 0, 0.76);
            -webkit-box-shadow: 0px -23px 98px -35px rgba(0, 0, 0, 0.76);
            -o-box-shadow: 0px -23px 98px -35px rgba(0, 0, 0, 0.76);
            z-index: 1;
            position: relative;'>
        </section>
    </html>";
	//enviar
	// emails para quem será enviado o formulário

    $emailenviar = "tonsilva99@gmail.com";
    $destino = $emailenviar;
    
		// É necessário indicar que o formato do e-mail é html
		$email_remetente = "tonsilva99@gmail.com";
		$headers = "MIME-Version: 1.1\n";
		$headers .= "Content-Type: text/html; charset=UTF-8";
		$headers .= "From: $email_remetente\n"; // remetente
		$headers .= "Return-Path: $email_remetente\n"; // return-path
		$headers .= "Reply-To: $email\n"; // Endereço (devidamente validado) que o seu usuário informou no contato
		$envio = mail($destino, $assunto, $conteudo , $headers, "-f$email_remetente");

		//$headers .= "Bcc: $EmailPadrao\r\n";
		if($envio){
			echo "<script type=\"text/JavaScript\">alert(\"Parabéns, dados enviados com sucesso! \"); </script>\n <meta http-equiv='refresh' content='0.7;URL=http://corridaquemsaoelas.com.br'>";
		} else {
			echo "<script type=\"text/JavaScript\">alert(\"Houve uma falha. Tente novamente! \"); </script>\n <meta http-equiv='refresh' content='0.7;URL=http://corridaquemsaoelas.com.br/contato'>"; 
		}
	
}
?>
