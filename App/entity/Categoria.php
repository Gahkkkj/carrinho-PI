<?php

namespace App\entity;

use \App\db\database;
use \PDO;

class Categoria
{
    /**
     * Identificador único da vaga
     * @var integer
     */
    public $id;

      /**
     * Descrição da vaga (pode conter html)
     * @var string
     */
    public $nome;

    /**
     * Descrição da vaga (pode conter html)
     * @var string
     */
    public $fornecedor;

    public function cadastrarCategoria()
    {
        // Definir a data 
        // $this->data_inc = date('Y-m-d H:i:s');
        // echo "<pre>"; print_r($this); echo "</pre>"; exit;

        // Inserir a vaga no bano e retornar o ID
        $objdatabase = new database('categorias');

        $this->id = $objdatabase->insert([
            'nome' => $this->nome,
            'fornecedor' => $this->fornecedor,
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

    public static function getCategoria($where = null, $order = null, $limit = null)
    {
        $objdatabase = new database('categorias');

        return ($objdatabase)->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por obter as vagas do banco de dados
     * @params string @id
     * @return Categoria
     */
    public static function getCategorias($id)
    {
        $objdatabase = new database('categorias');

        return ($objdatabase)->select('id = ' . $id)->fetchObject(self::class);
    }
    /**
     * Função para excluir vagas no banco
     * @return boolean
     */
    public function excluirCategoria()
    {
        $objdatabase = new database('categorias');

        return ($objdatabase)->delete('id = ' . $this->id);
    }

    /**
     * Função para atualizar a vaga do banco de dados
     * @return boolean
     */
    public function atualizarCategoria() {
        //Definir a data
        // $this->data = date('Y-m-d H:i:s');

        $objDatabase = new database('categorias');

        return ($objDatabase)->update('id = ' . $this->id, [
            'nome' => $this->nome,
            'fornecedor' => $this->fornecedor,
        ]);
    }
}
