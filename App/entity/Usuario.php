<?php

namespace App\entity;

use \App\db\database;
use \PDO;

class Usuario
{
    /**
     * Identificador único da vaga
     * @var integer
     */
    public $UID;

    /**
     * Título da vaga
     * @var varchar
     */
    public $NAME;

    /**
     * Descrição da vaga (pode conter html)
     * @var varchar
     */
    public $CONTACT;

    /**
     * Descrição da vaga (pode conter html)
     * @var text
     */
    public $ADDRESS;

    /**
     * Descrição da vaga (pode conter html)
     * @var varchar
     */
    public $CITY;

    /**
     * Define se a vaga está ativa ou não
     * @var varchar
     */
    public $PINCODE;

    /**
     * Descrição da vaga (pode conter html)
     * @var varchar
     */
    public $EMAIL;



    public function cadastrarUsuario()
    {
        // Definir a data 
        // $this->data_inc = date('Y-m-d H:i:s');
        // echo "<pre>"; print_r($this); echo "</pre>"; exit;

        // Inserir a vaga no bano e retornar o ID
        $objdatabase = new database('Usuario');

        $this->id = $objdatabase->insert([
            'UID' => $this->UID,
            'NAME' => $this->NAME,
            'CONTACT' => $this->CONTACT,
            'ADDRESS' => $this->ADDRESS,
            'CITY' => $this->CITY,
            'PINCODE' => $this->PINCODE,  
            'EMAIL' => $this->EMAIL,
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

    public static function getUsuario($where = null, $order = null, $limit = null)
    {
        $objdatabase = new database('Usuario');

        return ($objdatabase)->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por obter as vagas do banco de dados
     * @params string @id
     * @return Grupo
     */
    public static function getUsuarios($UID)
    {
        $objdatabase = new database('Usuario');

        return ($objdatabase)->select('UID = ' . $UID)->fetchObject(self::class);
    }
    /**
     * Função para excluir vagas no banco
     * @return boolean
     */
    public function excluirUsuario()
    {
        $objdatabase = new database('Usuario');

        return ($objdatabase)->delete('UID = ' . $this->UID);
    }

    /**
     * Função para atualizar a vaga do banco de dados
     * @return boolean
     */
    public function atualizarUsuario() {
        //Definir a data
        // $this->data = date('Y-m-d H:i:s');

        $objDatabase = new database('Usuario');

        return ($objDatabase)->update('UID = ' . $this->UID, [
            'UID' => $this->UID,
            'NAME' => $this->NAME,
            'CONTACT' => $this->CONTACT,
            'ADDRESS' => $this->ADDRESS,
            'CITY' => $this->CITY,
            'PINCODE' => $this->PINCODE,  
            'EMAIL' => $this->EMAIL,
        ]);
    }
}
