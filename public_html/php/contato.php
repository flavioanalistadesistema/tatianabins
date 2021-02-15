<?php
require_once("../conection/conection.php");

$emaildestinatario = 'flavioanalistadesistema@gmail.com';
$nome= $_POST['nome'];
$email= $_POST['email'];
$celular= $_POST['celular'];
$assunto= $_POST['assunto'];
$mensagem= $_POST['mensagem'];

		$nome     = utf8_decode (strip_tags(trim($_POST['nome'])));
		$email    = utf8_decode (strip_tags(trim($_POST['email'])));
		$celular = utf8_decode (strip_tags(trim($_POST['celular'])));
		$assunto = utf8_decode (strip_tags(trim($_POST['assunto'])));
		$mensagem = utf8_decode (strip_tags(trim($_POST['mensagem'])));

			
			require_once('../PHPMailer/class.phpmailer.php');

			$Email = new PHPMailer();
			$Email->SetLanguage("br");
			$Email->IsSMTP(); // Habilita o SMTP 
			$Email->SMTPAuth = true; //Ativa e-mail autenticado
			$Email->Host = 'email-ssl.com.br'; // Servidor de envio # verificar qual o host correto com a hospedagem as vezes fica como smtp.
			$Email->Port = '587'; // Porta de envio
			$Email->Username = 'tecnico@tatianabinns.com.br'; //e-mail que será autenticado
			$Email->Password = 'MeuBebeG12T'; // senha do email
			// ativa o envio de e-mails em HTML, se false, desativa.
			$Email->IsHTML(true); 
			// email do remetente da mensagem
			$Email->From = 'tecnico@tatianabinns.com.br';
			// nome do remetente do email
			$Email->FromName = utf8_decode($email);
			// Endereço de destino do emaail, ou seja, pra onde você quer que a mensagem do formulário vá?
			$Email->AddReplyTo($email, $nome);
			$Email->AddAddress("edgard.medeiros@shiftinc.com.br");
			$Email->AddCC("tatibinns@gmail.com"); // para quem será enviada a mensagem
			// informando no email, o assunto da mensagem
			$Email->Subject = "(Contato do site - tatianabinns.com.br)";
			// Define o texto da mensagem (aceita HTML)
			$Email->Body .= "<br /><br />
							<h2>(E-mail enviado via formulario do site - tatianabinns.com.br)</h2>
							 <strong>Nome:</strong> $nome<br /><br />
							 <strong>E-mail:</strong> $email<br /><br />
							 <strong>Celular:</strong> $ddd - $celular<br /><br />
							 <strong>Assunto:</strong> $assunto<br /><br />
							 <strong>Mensagem:</strong><br /> $mensagem";	
			// verifica se está tudo ok com oa parametros acima, se nao, avisa do erro. Se sim, envia.
			if(!$Email->Send()){
				echo "<p>A mensagem não foi enviada. </p>";
				echo "Erro: " . $Email->ErrorInfo;
			}			

if (empty($nome) || empty($email) || empty($celular) || empty($assunto) || empty($mensagem)) {
	echo "<script>alert('Preencha todos os campos.'); history.back();</script>";
}else{
	$inserir = mysql_query("INSERT INTO contato (nome, email, celular, assunto, mensagem) VALUES ('$nome','$email','$celular','$assunto','$mensagem')");
	
	echo "<script>alert('Mensagem enviada com sucesso!!'); </script>";
	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=http://tatianabinns.com.br/tatianabinns'>";
	}

?>