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
     * Título da vaga
     * @var string
     */
    public $nome;

    /**
     * Descrição da vaga (pode conter html)
     * @var string
     */
    public $descricao;

    /**
     * Função para cadastrar a vaga no banco
     * @return boolean
     */
    public function cadastrar()
    {

        // Inserir a vaga no bano e retornar o ID
        $objdatabase = new database('categoria');

        $this->id = $objdatabase->insert([
            'nome' => $this->nome,
            'descricao' => $this->descricao,          
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
        $objdatabase = new database('categoria');

        return ($objdatabase)->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por obter as vagas do banco de dados
     * @params string @id
     * @return Categoria
     */
    public static function getCategorias($id)
    {
        $objdatabase = new database('categoria');

        return ($objdatabase)->select('id = ' . $id)->fetchObject(self::class);
    }
    /**
     * Função para excluir vagas no banco
     * @return boolean
     */
    public function excluir()
    {
        $objdatabase = new database('categoria');

        return ($objdatabase)->delete('id = ' . $this->id);
    }

    /**
     * Função para atualizar a vaga do banco de dados
     * @return boolean
     */
    public function atualizar() {

        $objDatabase = new database('categoria');

        return ($objDatabase)->update('id = ' . $this->id, [
            'nome' => $this->nome,
            'descricao' => $this->descricao,
        ]);
    }
}
