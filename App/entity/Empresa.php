<?php

namespace App\entity;

use \App\db\database;
use \PDO;
use \App\entity\Grupo;

class Empresa
{
    /**
     * Objeto Grupo
     * @var object
     */
    public $fk_id_grupo;

    /**
     * Identificador único da vaga
     * @var integer
     */
    public $id;

    /**
     * Título da vaga
     * @var string
     */
    public $nome_fantasia;

    /**
     * Descrição da vaga (pode conter html)
     * @var string
     */
    public $nome;

    /**
     * Descrição da vaga (pode conter html)
     * @var int
     */
    public $cnpj;

    /**
     * Define se a vaga está ativa ou não
     * @var string
     */
    public $descricao;

    /**
     * Define se a vaga está ativa ou não
     * @var string
     */
    public $numero_end;

    /**
     * Define se a vaga está ativa ou não
     * @var string
     */
    public $rua_end;

    /**
     * Define se a vaga está ativa ou não
     * @var string
     */
    public $bairo_end;

    /**
     * Define se a vaga está ativa ou não
     * @var string
     */
    public $cidade_end;

    /**
     * Define se a vaga está ativa ou não
     * @var string
     */
    public $estado_end;

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
    public function cadastrarEmpresa()
    {
        // Definir a data 
        $this->data_inc = date('Y-m-d H:i:s');
        // echo "<pre>"; print_r($this); echo "</pre>"; exit;

        // Inserir a vaga no bano e retornar o ID
        $objdatabase = new database('empresa');

        $this->id = $objdatabase->insert([
            'nome_fantasia' => $this->nome_fantasia,
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
            'fk_id_grupo' => $this->fk_id_grupo,                 
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

    // public static function getnoar($where = null, $order = null, $limit = null)
    // {

    //     $fk_id_grupo = new Grupo;

        
    
    //     $objdatabase = new database('empresa');
    //     // echo "<pre>"; print_r($where); echo "</pre>"; exit;
    //     return ($objdatabase)->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    // }

    public static function getnoar($where = null, $order = null, $limit = null)
    {

        $fk_id_grupo = new Grupo;
        $objDatabase = new Database('empresa');

        // echo "<pre>"; print_r($where); echo "</pre>"; exit;
        $return = ($objDatabase)->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
        $result = array();
        
        foreach ($return as $key => $value) {
            // echo "<pre>"; print_r($value); echo "</pre>"; exit;
            $result[$key]['id'] = $value->id;
            $result[$key]['nome_fantasia'] = $value->nome_fantasia;
            $result[$key]['nome'] = $value->nome;
            $result[$key]['cnpj'] = $value->cnpj;
            $result[$key]['descricao'] = $value->descricao;
            $result[$key]['numero_end'] = $value->numero_end;
            $result[$key]['rua_end'] = $value->rua_end;
            $result[$key]['bairro_end'] = $value->bairro_end;
            $result[$key]['cidade_end'] = $value->cidade_end;
            $result[$key]['estado_end'] = $value->estado_end;
            $result[$key]['ordem'] = $value->ordem;
            $result[$key]['status'] = $value->status;
            $result[$key]['fk_id_grupo'] = $fk_id_grupo::getArGrupo($value->fk_id_grupo);
        }

        // echo "<pre>"; print_r($result); echo "</pre>"; exit;
        return $result;
    }

    /**
     * Método responsável por obter as vagas do banco de dados
     * @params string @id
     * @return Grupo
     */
    public static function getArEmpresa($id)
    {
        $objdatabase = new database('empresa');

        return ($objdatabase)->select('id = ' . $id)->fetchObject(self::class);
    }
    /**
     * Função para excluir vagas no banco
     * @return boolean
     */
    public function excluir()
    {
        $objdatabase = new database('empresa');

        return ($objdatabase)->delete('id = ' . $this->id);
    }

    /**
     * Função para atualizar a vaga do banco de dados
     * @return boolean
     */
    public function atualizarEmpresa() {
        //Definir a data
        // $this->data = date('Y-m-d H:i:s');

        $objDatabase = new database('empresa');

        return ($objDatabase)->update('id = ' . $this->id, [
            'nome_fantasia' => $this->nome_fantasia,
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
            'data_inc' => $this->data_inc,       
            'fk_id_grupo' => $this->fk_id_grupo,     
        ]);
    }
}
