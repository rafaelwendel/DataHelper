<?php
/**
 * Classe que fornece alguns recursos interessantes de Data (Em pt-BR)
 *
 * @author Rafael Wendel Pinheiro (http://www.rafaelwendel.com)
 * @version 1.0
 * @link https://github.com/rafaelwendel/DataHelper/
 */
class DataHelper {
    
    protected static $dias_semana = array(
        0 => 'Domingo',
        1 => 'Segunda-feira',
        2 => 'Terca-feira',
        3 => 'Quarta-feira',
        4 => 'Quinta-feira',
        5 => 'Sexta-feira',
        6 => 'Sabado'
    );
    
    protected static $meses = array(
         1 => array('nome' => 'Janeiro',   'abrev' => 'Jan'),
         2 => array('nome' => 'Fevereiro', 'abrev' => 'Fev'),
         3 => array('nome' => 'Marco',     'abrev' => 'Mar'),
         4 => array('nome' => 'Abril',     'abrev' => 'Abr'),
         5 => array('nome' => 'Maio',      'abrev' => 'Mai'),
         6 => array('nome' => 'Junho',     'abrev' => 'Jun'),
         7 => array('nome' => 'Julho',     'abrev' => 'Jul'),
         8 => array('nome' => 'Agosto',    'abrev' => 'Ago'),
         9 => array('nome' => 'Setembro',  'abrev' => 'Set'),
        10 => array('nome' => 'Outubro',   'abrev' => 'Out'),
        11 => array('nome' => 'Novembro',  'abrev' => 'Nov'),
        12 => array('nome' => 'Dezembro',  'abrev' => 'Dez')
    );
    
    /**
     * Retorna a data atual
     * 
     * @access public
     * @param String $formato Formato da data
     * @return String
    */
    public static function get_data($formato = 'd/m/Y')
    {
        return date($formato);
    }
	
    /**
     * Retorna a data atual em formato de texto (Ex: Domingo, 1 de Janeiro de 1990)
     * 
     * @access public
     * @return String
    */
    public static function get_data_texto()
    {
	return self::get_dia_semana() . ', ' .  self::get_dia_mes() . ' de ' . self::get_mes('nome') . ' de ' . self::get_ano();
    }
    
    /**
     * Retorna o dia da semana em formato de texto (Ex: Segunda-feira)
     * 
     * @access public
     * @return String
    */
    public static function get_dia_semana()
    {
        return self::$dias_semana[date('w')];
    }
    
    /**
     * Retorna um array com todos os dias da semana (De 0 => Domingo até 7 => Sabado)
     * 
     * @access public
     * @return array
    */
    public static function get_dias_semana()
    {
        return self::$dias_semana;
    }
    
    /**
     * Retorna o dia atual do mes
     * 
     * @access public
     * @return String
    */
    public static function get_dia_mes()
    {
        return date('d');
    }
    
    /**
     * Retorna o mes atual
     * 
     * @access public
     * @param String $formato Formato do mês ('num', 'nome' ou 'abrev')
     * @return String
    */
    public static function get_mes($formato = 'num')
    {
        $mes = date('n');
        if ($formato == 'num')
        {
            return $mes;
        }
        else if ($formato == 'nome')
        {
            return self::$meses[$mes]['nome'];
        }
        else if ($formato == 'abrev')
        {
            return self::$meses[$mes]['abrev'];
        }
        else
        {
            return false;
        }
    }
    
    /**
     * Retorna um determinado mes pelo numero
     * 
     * @access public
     * @param int $num O mes desejado
     * @param String $formato Formato do mes ('nome' ou 'abrev')
     * @return String
    */
    public static function get_mes_by_num($num, $formato = 'nome')
    {
        if(self::is_mes_valido($num))
        {
            return ($formato === 'nome' ? self::$meses[$num]['nome'] : self::$meses[$num]['abrev']);
        }
        return false;
    }
    
    /**
     * Retorna um array com todos os meses do ano (De 1 => Janeiro até 12 => Dezembro)
     * 
     * @access public
     * @param boolean $abrev (true) abreviado ou (false) não abreviado
     * @return array
    */
    public static function get_meses($abrev = false)
    {
        $meses = array();
        foreach (self::meses as $chave => $mes)
        {
                $meses[$chave] = ($abrev == false ? $mes['nome'] : $mes['abrev']);
        }
        return $meses;
    }
    
    /**
     * Valida um mês de acordo com o numero
     * 
     * @access protected
     * @param int $mes O mes em numero
     * @return boolean
    */
    protected static function is_mes_valido($mes)
    {
        return ($mes >= 1 && $mes <= 12 ? true : false);
    }
    
    /**
     * Retorna o ano atual
     * 
     * @access public
     * @param int $digitos O ano em 2 ou 4 digitos
     * @return String
    */
    public static function get_ano($digitos = 4)
    {
        if ($digitos == 2)
        {
            return date('y');
        }
        else if ($digitos == 4)
        {
            return date('Y');
        }
        else
        {
            return false;
        }
    }
    
    /**
     * Verifica se o ano é bissexto (true) ou não (false)
     * 
     * @access public
     * @param Mixed $ano O ano atual '' ou um ano com 4 digitos
     * @return boolean
    */
    public static function is_bissexto($ano = '')
    {
        if($ano == '' || ! is_numeric($ano) || strlen($ano) != 4)
        {
            return (date('L') === 1 ? true : false);
        }
        else
        {
            if ($ano % 400 == 0 || ($ano % 4 == 0 && $ano % 100 != 0))
            {
                    return true;
            }
        }
        return false;
    }
        
}