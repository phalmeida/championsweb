<?php
/**
 * Verifica chaves de arrays
 *
 * Verifica se a chave existe no array e se ela tem algum valor.
 * Obs.: Essa função está no escopo global, pois, vamos precisar muito da mesma.
 *
 * @param array  $array O array
 * @param string $key   A chave do array
 * @return string|null  O valor da chave do array ou nulo
 */
function chk_array ( $array, $key ) {
	// Verifica se a chave existe no array
	if ( isset( $array[ $key ] ) && ! empty( $array[ $key ] ) ) {
		// Retorna o valor da chave
		return $array[ $key ];
	}
	
	// Retorna nulo por padrão
	return null;
} // chk_array


function gera_jogos($times) {
    $num_times = count($times);


       
    $jogo = array();
    foreach ($times as $k => $m) {
	// Vocź nćo precisa passar todos os times de novo
	// Somente os que nćo foram passados
        for( $i = $k+1;$i < count($times);$i++) {
		$v = $times[$i];
            if ($m != $v AND !in_array(array('m' => $v, 'v' => $m), $jogo)) {
                $jogo[] = array('m' => $m, 'v' => $v);
            }
        }
    }

    $rodada = array();
    $times_usados = array();
    $jogos_usados = array();

    $num_rodadas = $num_times - 1;
    $num_jogos = $num_times * $num_rodadas / 2;
    $num_jogos_realizados = 0;

    $rodada = array();
    shuffle($jogo);
    for ($i = 1; $i <= $num_rodadas; $i++) {
        foreach ($jogo as $c => $j) {
            if (!in_array($j['v'], $times_usados) AND !in_array($j['m'], $times_usados) AND !in_array($j, $jogos_usados)) {
                $rodada[$i][] = $j;

                $times_usados[] = $j['v'];
                $times_usados[] = $j['m'];

                $jogos_usados[] = $j;

                $num_jogos_realizados++;
            }
        }

        $times_usados = array();
    }

    
    if ($num_jogos_realizados == $num_jogos) {
        return $rodada;
    } else {
        return false;
        
        $tentativa++;
    }
}


/**
 * Generates random numbers
 *
 * @author    Paulo Freitas <paulofreitas dot web at gmail dot com>
 * @copyright Copyright (C) 2006-2010  Paulo Freitas
 * @license   http://creativecommons.org/licenses/by-sa/3.0
 * @version   20100107
 * @param     int $num amount of numbers to generate
 * @param     int $min minimum number to generate
 * @param     int $max maximum number to generate
 * @param     bool $repeat if the numbers can repeat
 * @param     int|bool $sort if the numbers must be ordered (SORT_ASC to
                              ascending order and SORT_DESC to descending order)
 * @return    array|bool array of generated numbers or false when invalid
                          conditions
 */
function getRandomNumbers($num, $min, $max, $repeat = false, $sort = false)
{
    if ((($max - $min) + 1) >= $num) {
        $numbers = array();

        while (count($numbers) < $num) {
            $number = mt_rand($min, $max);

            if ($repeat || !in_array($number, $numbers)) {
                $numbers[] = $number;
            }
        }

        switch ($sort) {
        case SORT_ASC:
            sort($numbers);
            break;
        case SORT_DESC:
            rsort($numbers);
            break;
        }

        return $numbers;
    }

    return false;
}


/*
*
*PHP mascara - PHP mask
*Usar para qualquer tipo de mascara que deseje exemplos abaixo com data, cep, cnpj e cpf
*
*/

function mask($val, $mask)
{
	 $maskared = '';
	 $k = 0;
	 for($i = 0; $i<=strlen($mask)-1; $i++)
	 {
		if($mask[$i] == '#')
		{
			if(isset($val[$k]))
			$maskared .= $val[$k++];
		}
		else
		{
			 if(isset($mask[$i]))
			 $maskared .= $mask[$i];
		}
	 }
	 return $maskared;
}
//Exemplos de máscaras em php
// $cnpj = "11222333000199";
// $cpf = "00100200300";
// $cep = "08665110";
// $data = "10102010";

// echo mask($cnpj,'##.###.###/####-##');
// echo mask($cpf,'###.###.###-##');
// echo mask($cep,'#####-###');
// echo mask($data,'##/##/####');



/**
 * Função para carregar automaticamente todas as classes padrão
 * Ver: http://php.net/manual/pt_BR/function.autoload.php.
 * Nossas classes estão na pasta classes/.
 * O nome do arquivo deverá ser class-NomeDaClasse.php.
 * Por exemplo: para a classe SistsalonMVC, o arquivo vai chamar class-SistsalonMVC.php
 */
function __autoload($class_name) {
	$file = ABSPATH . '/classes/class-' . $class_name . '.php';
	
	if ( ! file_exists( $file ) ) {
		require_once ABSPATH . '/includes/404.php';
		return;
	}
	
	// Inclui o arquivo da classe
    require_once $file;
} // __autoload
