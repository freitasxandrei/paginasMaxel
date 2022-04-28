<?php

namespace App\entity;

use \App\db\database;
use \PDO;

class Grupo
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
     * Descrição da vaga (pode conter html)
     * @var int
     */
    public $ordem;

    /**
     * Define se a vaga está ativa ou não
     * @var string
     */
    public $status;

    /**
     * Data de publicação da vaga
     * @var timestamp
     */
    public $data_inc;

    /**
     * Função para cadastrar a vaga no banco
     * @return boolean
     */
    public function cadastrar()
    {
        // Definir a data 
        $this->data_inc = date('Y-m-d H:i:s');
        // echo "<pre>"; print_r($this); echo "</pre>"; exit;

        // Inserir a vaga no bano e retornar o ID
        $objdatabase = new database('grupo');

        $this->id = $objdatabase->insert([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'ordem' => $this->ordem,
            'status' => $this->status,
            'data_inc' => $this->data_inc,            
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
        $objdatabase = new database('grupo');

        return ($objdatabase)->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por obter as vagas do banco de dados
     * @params string @id
     * @return Grupo
     */
    public static function getArGrupo($id)
    {
        $objdatabase = new database('grupo');

        return ($objdatabase)->select('id = ' . $id)->fetchObject(self::class);
    }
    /**
     * Função para excluir vagas no banco
     * @return boolean
     */
    public function excluir()
    {
        $objdatabase = new database('grupo');

        return ($objdatabase)->delete('id = ' . $this->id);
    }

    /**
     * Função para atualizar a vaga do banco de dados
     * @return boolean
     */
    public function atualizar() {
        //Definir a data
        // $this->data = date('Y-m-d H:i:s');

        $objDatabase = new database('grupo');

        return ($objDatabase)->update('id = ' . $this->id, [
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'ordem' => $this->ordem,
            'status' => $this->status,
            'data_inc' => $this->data_inc,   
        ]);
    }
}
