<?php
	class ValidarFone{
		function soNumero($fone) {
		if(!preg_match('^\(+[0-9]{2,3}\) [0-9]{4}-[0-9]{4}$^', $fone)) {
		echo "<script>alert('Telefone inválido');history.back();</script>";
		}
	}
}
