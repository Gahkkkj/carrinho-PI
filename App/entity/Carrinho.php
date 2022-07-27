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
    public $PID;

      /**
     * Descrição da vaga (pode conter html)
     * @var varchar
     */
    public $PRODUCT;
   
   
    /**
     * @var timestamp
     */
    public $data_compra;


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

    /**
    * Descrição da vaga (pode conter html)
    * @var int
    */
    public $quantidade;

    /**
    * Descrição da vaga (pode conter html)
    * @var int
    */
    public $fk_id_categoria;

    public function cadastrarCarrinho()
    {
        // Definir a data 
        // $this->data_inc = date('Y-m-d H:i:s');
        // echo "<pre>"; print_r($this); echo "</pre>"; exit;

        // Inserir a vaga no bano e retornar o ID
        $objdatabase = new database('produtos_carrinho');

        $this->PID = $objdatabase->insert([
            'PRODUCT' => $this->PRODUCT,
            'data_compra' => $this->data_compra,
            'preco_produto' => $this->preco_produto,
            'IMAGE' => $this->IMAGE,   
            'DESCRIPTION' => $this->DESCRIPTION,    
            'quantidade' => $this->quantidade,
       
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

    public static function getnoar($where = null, $order = null, $limit = null)
    {

        $fk_id_categoria = new Categoria;
        $objdatabase = new Database('produtos_carrinho');

        // echo "<pre>"; print_r($where); echo "</pre>"; exit;
        $return = ($objdatabase)->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
        $result = array();
        
        foreach ($return as $key => $value) {
            // echo "<pre>"; print_r($value); echo "</pre>"; exit;
            $result[$key]['PID'] = $value->PID;
            $result[$key]['PRODUCT'] = $value->PRODUCT;
            $result[$key]['data_compra'] = $value->data_compra;
            $result[$key]['preco_produto'] = $value->preco_produto;
            $result[$key]['IMAGE'] = $value->IMAGE;
            $result[$key]['DESCRIPTION'] = $value->DESCRIPTION;
            $result[$key]['quantidade'] = $value->quantidade;
            $result[$key]['fk_id_categoria'] = $fk_id_categoria::getCategorias($value->fk_id_categoria);
        }

        // echo "<pre>"; print_r($result); echo "</pre>"; exit;
        return $result;
    }


    /**
     * Método responsável por obter as vagas do banco de dados
     * @params string @id
     * @return Carrinho
     */
    public static function getCarrinhos($PID)
    {
        $objdatabase = new database('produtos_carrinho');

        return ($objdatabase)->select('PID = ' . $PID)->fetchObject(self::class);
    }
    /**
     * Função para excluir vagas no banco
     * @return boolean
     */
    public function excluirCarrinhos()
    {
        $objdatabase = new database('produtos_carrinho');

        return ($objdatabase)->delete('PID = ' . $this->PID);
    }

    /**
     * Função para atualizar a vaga do banco de dados
     * @return boolean
     */
    public function atualizarCarrinho() {

        $objDatabase = new database('produtos_carrinho');

        return ($objDatabase)->update('PID = ' . $this->PID, [
            'PRODUCT' => $this->PRODUCT,
            'data_compra' => $this->data_compra,
            'preco_produto' => $this->preco_produto,
            'IMAGE' => $this->IMAGE,   
            'DESCRIPTION' => $this->DESCRIPTION,    
            'quantidade' => $this->quantidade,
            'fk_id_categoria' => $this->fk_id_categoria,
        ]);
    }
}
