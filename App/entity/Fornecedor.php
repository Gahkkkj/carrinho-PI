<?php

namespace App\entity;

use \App\db\database;
use \PDO;

class fornecedor
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
     * @var bigint
     */
    public $cnpj;

    /**
     * Descrição da vaga (pode conter html)
     * @var text
     */
    public $descricao;

    /**
     * Descrição da vaga (pode conter html)
     * @var int
     */
    public $numero_end;

    /**
     * Define se a vaga está ativa ou não
     * @var string
     */
    public $rua_end;

    /**
     * Descrição da vaga (pode conter html)
     * @var string
     */
    public $bairro_end;

    /**
     * Descrição da vaga (pode conter html)
     * @var string
     */
    public $cidade_end;

    /**
     * Define se a vaga está ativa ou não
     * @var string
     */
    public $estado_end; 

        /**
     * Define se a vaga está ativa ou não
     * @var int
     */
    public $ordem; 

        /**
     * Define se a vaga está ativa ou não
     * @var string
     */
    public $status; 

    public function cadastrarFornecedor()
    {
        // Definir a data 
        // $this->data_inc = date('Y-m-d H:i:s');
        // echo "<pre>"; print_r($this); echo "</pre>"; exit;

        // Inserir a vaga no bano e retornar o ID
        $objdatabase = new database('fornecedor');

        $this->id = $objdatabase->insert([
            'nome' => $this->nome,
            'cnpj' => $this->cnpj,
            'descricao' => $this->descricao,
            'numero_end' => $this->numero_end,
            'rua_end' => $this->rua_end,
            'bairro_end' => $this->bairro_end,  
            'cidade_end' => $this->cidade_end,
            'estado_end' => $this->estado_end,
            'ordem' => $this->ordem,
            'status' => $this->status,
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

    public static function getFornecedor($where = null, $order = null, $limit = null)
    {
        $objdatabase = new database('fornecedor');

        return ($objdatabase)->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por obter as vagas do banco de dados
     * @params string @id
     * @return Grupo
     */
    public static function getArFornecedor($id)
    {
        $objdatabase = new database('fornecedor');

        return ($objdatabase)->select('id = ' . $id)->fetchObject(self::class);
    }
    /**
     * Função para excluir vagas no banco
     * @return boolean
     */
    public function excluirFornecedor()
    {
        $objdatabase = new database('fornecedor');

        return ($objdatabase)->delete('id = ' . $this->id);
    }

    /**
     * Função para atualizar a vaga do banco de dados
     * @return boolean
     */
    public function atualizarFornecedor() {
        //Definir a data
        // $this->data = date('Y-m-d H:i:s');

        $objDatabase = new database('fornecedor');

        return ($objDatabase)->update('id = ' . $this->id, [
            'nome' => $this->nome,
            'cnpj' => $this->cnpj,
            'descricao' => $this->descricao,
            'numero_end' => $this->numero_end,
            'rua_end' => $this->rua_end,
            'bairro_end' => $this->bairro_end,  
            'cidade_end' => $this->cidade_end,
            'estado_end' => $this->estado_end,
            'ordem' => $this->ordem,
            'status' => $this->status,    
        ]);
    }
}
