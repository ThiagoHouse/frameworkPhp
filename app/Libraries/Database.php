<?php

class Database {

    private $host = DB['HOST'];
    private $usuario = DB['USUARIO'];
    private $senha = DB['SENHA'];
    private $banco = DB['BANCO'];
    private $porta = DB['PORTA'];
    private $dbh;
    private $stmt;

    public function __construct()
    {
        $dsn = 'mysql:host='.$this->host.';port='.$this->porta.';dbname='.$this->banco;
        $opcoes = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->dbh = new PDO ($dsn, $this->usuario, $this->senha, $opcoes);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function bind($parametro, $valor, $tipo = null)
    {
        if(is_null($tipo)):
            switch (true):
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                break;
                default:
                $tipo = PDO::PARAM_STR;
            endswitch;
        endif;

        $this->stmt->bindValue($parametro, $valor, $tipo);
    }

    //executa prepared statement
    public function executa()
    {
        return $this->stmt->execute();
    }

    //obtem um único registro
    public function resultado()
    {
        $this->executa();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //obtem um conjunto de registros
    public function resultados()
    {
        $this->executa();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //retorna o número de linhas afetadas pela última instrução SQL
    public function totalResultados()
    {
        return $this->stmt->rowCount();
    }

    //retorna o útimo ID inserido no banco de dados
    public function ultimoIdInserido()
    {
        return $this->dbh->lastInsertId();
    }
}