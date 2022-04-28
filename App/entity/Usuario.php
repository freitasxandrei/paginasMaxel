<?php

namespace App\entity;

use \App\db\database;
use \PDO;
use \App\entity\Empresa;

class Usuario
{
    /**
     * Objeto Grupo
     * @var object
     */
    public $fk_id_empresa;

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
    public $sobrenome;

    /**
     * Descrição da vaga (pode conter html)
     * @var int
     */
    public $cpf;

    /**
     * Define se a vaga está ativa ou não
     * @var bigint
     */
    public $telefone;

    /**
     * Descrição da vaga (pode conter html)
     * @var string
     */
    public $email;

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
     * Define se a vaga está ativa ou não
     * @var string
     */
    public $focal;

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

    public function cadastrarUsuario()
    {
        // Definir a data 
        $this->data_inc = date('Y-m-d H:i:s');
        // echo "<pre>"; print_r($this); echo "</pre>"; exit;

        // Inserir a vaga no bano e retornar o ID
        $objdatabase = new database('usuario');

        $this->id = $objdatabase->insert([
            'nome' => $this->nome,
            'sobrenome' => $this->sobrenome,
            'cpf' => $this->cpf,
            'telefone' => $this->telefone,
            'email' => $this->email,  
            'numero_end' => $this->numero_end,
            'rua_end' => $this->rua_end,
            'bairro_end' => $this->bairro_end,
            'cidade_end' => $this->cidade_end,
            'estado_end' => $this->estado_end,   
            'focal' => $this->focal,
            'ordem' => $this->ordem,
            'status' => $this->status,
            'fk_id_empresa' => $this->fk_id_empresa,                 
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

        $fk_id_empresa = new Empresa;
        $objDatabase = new Database('usuario');

        // echo "<pre>"; print_r($where); echo "</pre>"; exit;
        $return = ($objDatabase)->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
        $result = array();
        
        foreach ($return as $key => $value) {
            // echo "<pre>"; print_r($value); echo "</pre>"; exit;
            $result[$key]['id'] = $value->id;
            $result[$key]['nome'] = $value->nome;
            $result[$key]['sobrenome'] = $value->sobrenome;
            $result[$key]['cpf'] = $value->cpf;
            $result[$key]['telefone'] = $value->telefone;
            $result[$key]['email'] = $value->email;
            $result[$key]['numero_end'] = $value->numero_end;
            $result[$key]['rua_end'] = $value->rua_end;
            $result[$key]['bairro_end'] = $value->bairro_end;
            $result[$key]['cidade_end'] = $value->cidade_end;
            $result[$key]['estado_end'] = $value->estado_end;
            $result[$key]['focal'] = $value->focal;
            $result[$key]['ordem'] = $value->ordem;
            $result[$key]['status'] = $value->status;
            $result[$key]['fk_id_empresa'] = $fk_id_empresa::getArEmpresa($value->fk_id_empresa);
        }

        // echo "<pre>"; print_r($result); echo "</pre>"; exit;
        return $result;

    }

    /**
     * Método responsável por obter as vagas do banco de dados
     * @params string @id
     * @return Grupo
     */
    public static function getArUsuario($id)
    {
        $objdatabase = new database('usuario');

        return ($objdatabase)->select('id = ' . $id)->fetchObject(self::class);
    }
    /**
     * Função para excluir vagas no banco
     * @return boolean
     */
    public function excluirUsuario()
    {
        $objdatabase = new database('usuario');

        return ($objdatabase)->delete('id = ' . $this->id);
    }

    /**
     * Função para atualizar a vaga do banco de dados
     * @return boolean
     */
    public function atualizarUsuario() {
        //Definir a data
        // $this->data = date('Y-m-d H:i:s');

        $objDatabase = new database('usuario');

        return ($objDatabase)->update('id = ' . $this->id, [
            'nome' => $this->nome,
            'sobrenome' => $this->sobrenome,
            'cpf' => $this->cpf,
            'telefone' => $this->telefone,
            'email' => $this->email,  
            'numero_end' => $this->numero_end,
            'rua_end' => $this->rua_end,
            'bairro_end' => $this->bairro_end,
            'cidade_end' => $this->cidade_end,
            'estado_end' => $this->estado_end,   
            'focal' => $this->focal,
            'ordem' => $this->ordem,
            'status' => $this->status,
            'data_inc' => $this->data_inc,    
            'fk_id_empresa' => $this->fk_id_empresa,     
        ]);
    }
}
