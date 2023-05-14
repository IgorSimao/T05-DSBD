<?php
    class taskModel
    {
        private $id;
        private $sigla;
        private $descricao;
        private $dataInicial;
        private $dataFinal;

        

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of sigla
         */ 
        public function getSigla()
        {
                return $this->sigla;
        }

        /**
         * Set the value of sigla
         *
         * @return  self
         */ 
        public function setSigla($sigla)
        {
                $this->sigla = $sigla;

                return $this;
        }

        /**
         * Get the value of descricao
         */ 
        public function getDescricao()
        {
                return $this->descricao;
        }

        /**
         * Set the value of descricao
         *
         * @return  self
         */ 
        public function setDescricao($descricao)
        {
                $this->descricao = $descricao;

                return $this;
        }

        /**
         * Get the value of dataInicial
         */ 
        public function getDataInicial()
        {
                return $this->dataInicial;
        }

        /**
         * Set the value of dataInicial
         *
         * @return  self
         */ 
        public function setDataInicial($dataInicial)
        {
                $this->dataInicial = $dataInicial;

                return $this;
        }

        /**
         * Get the value of dataFinal
         */ 
        public function getDataFinal()
        {
                return $this->dataFinal;
        }

        /**
         * Set the value of dataFinal
         *
         * @return  self
         */ 
        public function setDataFinal($dataFinal)
        {
                $this->dataFinal = $dataFinal;

                return $this;
        }

        public function salvar(){
            require_once "conexaoBd.php";

            try {
                $stmt = $pdo->prepare("INSERT INTO tasks (sigla, descricao, dataInicial, dataFinal) VALUES (:sigla, :descricao, :dataInicial, :dataFinal)");
                $stmt->bindParam(":sigla", $this->sigla);
                $stmt->bindParam(":descricao", $this->descricao);
                $stmt->bindParam(":dataInicial", $this->dataInicial);
                $stmt->bindParam(":dataFinal", $this->dataFinal);
                $this->id = $pdo->lastInsertId();

                $stmt->execute();

            } catch (PDOException $e) {
                return throw new Exception("Não foi possível salvar a task ->" + $e, );
            }
        }

        public function listarTodasTasks(){
                require_once "conexaoBd.php";
                try {
                        $stmt = $pdo->prepare("SELECT * FROM tasks");
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'taskModel');
                        return $result;
                } catch (PDOException $e) {
                        return throw new Exception("Não foi possível buscar as tasks ->" + $e, );
                }
        }
    }
    
?>