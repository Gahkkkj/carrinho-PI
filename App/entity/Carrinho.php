<?php

namespace App\entity;

use \App\db\database;
use \PDO;

class Carrinho
{
    /**
     * Identificador único da vaga
     * @var integer
     */
    public $IDCart;

      /**
     * Descrição da vaga (pode conter html)
     * @var varchar
     */
    public $PRODUCT;

    /**
     * Descrição da vaga (pode conter html)
     * @var double
     */
    public $preco_produto;

    /**
     * Descrição da vaga (pode conter html)
     * @var varchar
     */
    public $IMAGE;



    /**
     * Descrição da vaga (pode conter html)
     * @var text
     */
    public $DESCRIPTION;

    public function cadastrarCarrinho()
    {
        // Definir a data 
        // $this->data_inc = date('Y-m-d H:i:s');
        // echo "<pre>"; print_r($this); echo "</pre>"; exit;

        // Inserir a vaga no bano e retornar o ID
        $objdatabase = new database('produtos_carrinho');

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

    public static function getCarrinho($where = null, $order = null, $limit = null)
    {
        $objdatabase = new database('produtos_carrinho');

        return ($objdatabase)->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por obter as vagas do banco de dados
     * @params string @id
     * @return Carrinho
     */
    public static function getCarrinhos($ID)
    {
        $objdatabase = new database('produtos_carrinho');

        return ($objdatabase)->select('id = ' . $ID)->fetchObject(self::class);
    }
    /**
     * Função para excluir vagas no banco
     * @return boolean
     */
    public function excluirCarrinhos()
    {
        $objdatabase = new database('produtos_carrinho');

        return ($objdatabase)->delete('id = ' . $this->ID);
    }

    /**
     * Função para atualizar a vaga do banco de dados
     * @return boolean
     */
    public function atualizarCarrinho() {
        //Definir a data
        // $this->data = date('Y-m-d H:i:s');

        $objDatabase = new database('produtos_carrinho');

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
