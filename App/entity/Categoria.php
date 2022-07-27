<?php

namespace App\entity;

use \App\db\database;
use \PDO;

class Categoria
{
    /**
     * Identificador
     * @var integer
     */
    public $id;

    /**
     * Título
     * @var string
     */
    public $nome;

    /**
     * Descrição (pode conter html)
     * @var string
     */
    public $descricao;

    public function cadastrar()
    {

        $objdatabase = new database('categoria');

        $this->id = $objdatabase->insert([
            'nome' => $this->nome,
            'descricao' => $this->descricao,          
        ]);

        return true;
    }

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
