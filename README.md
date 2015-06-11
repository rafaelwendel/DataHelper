DataHelper
==================
Uma classe que fornece alguns recursos interessantes de Data (Em pt-BR).

### Inclusão

Simplesmente

	<?php
		include 'DataHelper.php';
		
### Exemplos

Pegar a data atual
	
	echo DataHelper::get_data('d/m/Y');
	//Data no formato dia/mes/ano
	
Pegar a data atual em formato de texto (Ex: Quinta-feira, 11 de Junho de 2015)

	echo DataHelper::get_data_texto();
	
Pegar o dia atual da semana (De Domingo à Sábado)

	echo DataHelper::get_dia_semana();
	
Um array com todos os dias da semana (De 0 => 'Domingo' à '6' => 'Sabado')

	echo DataHelper::get_dias_semana();
	
Um array com todos os meses do ano (De 1 => ['Janeiro', 'Jan'] até 12 => ['Dezembro', 'Dez'] )

	echo DataHelper::get_meses(false); //[Janeiro, Fevereiro, Março, ..., Dezembro]
	echo DataHelper::get_meses(true);  //[Jan, Fev, Mar, ..., Dez]
	
Verificar se um ano é bissexto.
	
	echo DataHelper::is_bissexto(2015); //false
	echo DataHelper::is_bissexto(2016); //true
	
Dentre outros...