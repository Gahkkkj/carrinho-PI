<?php

namespace App\entity;

use \App\db\database;
use \PDO;

class Pedido
{
    /**
     * Identificador único da vaga
     * @var integer
     */
    public $ID;

    /**
     * Título da vaga
     * @var integer
     */
    public $OID;

    /**
     * Descrição da vaga (pode conter html)
     * @var integer
     */
    public $PID;

    /**
     * Descrição da vaga (pode conter html)
     * @var varchar
     */
    public $PNAME;

    /**
     * Descrição da vaga (pode conter html)
     * @var double
     */
    public $preco_produto;

    /**
     * Define se a vaga está ativa ou não
     * @var integer
     */
    public $QTY;

    /**
     * Descrição da vaga (pode conter html)
     * @var double
     */
    public $TOTAL;

    public function cadastrarPedido()
    {
        // Definir a data 
        // $this->data_inc = date('Y-m-d H:i:s');
        // echo "<pre>"; print_r($this); echo "</pre>"; exit;

        // Inserir a vaga no bano e retornar o ID
        $objdatabase = new database('detalhes_pedido');

        $this->id = $objdatabase->insert([
            'OID' => $this->OID,
            'PID' => $this->PID,
            'PNAME' => $this->PNAME,
            'preco_produto' => $this->preco_produto,
            'QTY' => $this->QTY,   
            'TOTAL' => $this->TOTAL,    
        ]);

        return true;
    }


    /**
     * Método responsável por obter as vagas do banco de dados
     * @params string @where
     * @params string @order
     * @params string $limit
     * @return array
     */

    public static function getPedido($where = null, $order = null, $limit = null)
    {
        $objdatabase = new database('detalhes_pedido');

        return ($objdatabase)->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por obter as vagas do banco de dados
     * @params string @id
     * @return Pedido
     */
    public static function getPedidos($ID)
    {
        $objdatabase = new database('detalhes_pedido');

        return ($objdatabase)->select('id = ' . $ID)->fetchObject(self::class);
    }
    /**
     * Função para excluir vagas no banco
     * @return boolean
     */
    public function excluirPedido()
    {
        $objdatabase = new database('detalhes_pedido');

        return ($objdatabase)->delete('id = ' . $this->ID);
    }

    /**
     * Função para atualizar a vaga do banco de dados
     * @return boolean
     */
    public function atualizarPedido() {
        //Definir a data
        // $this->data = date('Y-m-d H:i:s');

        $objDatabase = new database('detalhes_pedido');

        return ($objDatabase)->update('ID = ' . $this->ID, [
            'OID' => $this->OID,
            'PID' => $this->PID,
            'PNAME' => $this->PNAME,
            'preco_produto' => $this->preco_produto,
            'QTY' => $this->QTY,   
            'TOTAL' => $this->TOTAL,        
        ]);
    }
}
