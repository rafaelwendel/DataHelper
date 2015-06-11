<?php
/**
 * Classe que fornece alguns recursos interessantes de Data (Em pt-BR)
 *
 * @author Rafael Wendel Pinheiro
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
    
    public static function get_data($formato = 'd/m/Y')
    {
        return date($formato);
    }
	
    public static function get_data_texto()
    {
	return self::get_dia_semana() . ', ' .  self::get_dia_mes() . ' de ' . self::get_mes('nome') . ' de ' . self::get_ano();
    }
    
    public static function get_dia_semana()
    {
        return self::$dias_semana[date('w')];
    }
    
    public static function get_dias_semana()
    {
        return self::$dias_semana;
    }
	
    public static function get_dia_mes()
    {
        return date('d');
    }
    
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
    
    public static function get_mes_by_num($num, $formato = 'nome')
    {
        if(self::is_mes_valido($num))
        {
            return ($formato === 'nome' ? self::$meses[$num]['nome'] : self::$meses[$num]['abrev']);
        }
        return false;
    }
	
    public static function get_meses($abrev = false)
    {
        $meses = array();
        foreach (self::meses as $chave => $mes)
        {
                $meses[$chave] = ($abrev == false ? $mes['nome'] : $mes['abrev']);
        }
        return $meses;
    }
    
    protected static function is_mes_valido($mes)
    {
        return ($mes >= 1 && $mes <= 12 ? true : false);
    }
    
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
    
    public static function is_bissexto()
    {
        return (date('L') === 1 ? true : false);
    }
        
}