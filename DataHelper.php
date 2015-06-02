<?php
/**
 * Classe que fornece alguns recursos interessantes de Data (Em pt-BR)
 *
 * @author Rafael Wendel Pinheiro
 */
class DataHelper {
    
    protected $dias_semana = array(
        0 => 'Domingo',
        1 => 'Segunda-feira',
        2 => 'Terca-feira',
        3 => 'Quarta-feira',
        4 => 'Quinta-feira',
        5 => 'Sexta-feira',
        6 => 'Sabado'
    );
    
    protected $meses = array(
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
    
    public function __construct() 
    {
        
    }
    
    public function get_data_atual($formato = 'd/m/Y')
    {
        return date($formato);
    }
    
    public function get_dia_semana_atual()
    {
        return $this->dias_semana[date('w')];
    }
    
    public function get_dias_semana()
    {
        return $this->dias_semana;
    }
    
    public function get_mes_atual($formato = 'num')
    {
        $mes = date('n');
        if ($formato == 'num')
        {
            return $mes;
        }
        else if ($formato == 'nome')
        {
            return $this->meses[$mes]['nome'];
        }
        else if ($formato == 'abrev')
        {
            return $this->meses[$mes]['abrev'];
        }
        else
        {
            return false;
        }
    }
    
    public function get_mes_by_num($num, $formato = 'nome')
    {
        if($this->is_mes_valido($num))
        {
            return ($formato === 'nome' ? $this->meses[$num]['nome'] : $this->meses[$num]['abrev']);
        }
        return false;
    }
    
    protected function is_mes_valido($mes)
    {
        return ($mes >= 1 && $mes <= 12 ? true : false);
    }
    
    public function get_ano_atual($digitos = 4)
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
    
    public function is_bissexto()
    {
        return (date('L') === 1 ? true : false);
    }
        
}
