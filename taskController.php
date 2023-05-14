<?php
    class taskController
    {
        public function cadastrar(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                require_once "taskModel.php";
                if($_POST["sigla"] and $_POST["descricao"] and $_POST["dataInicio"] and $_POST["dataFinal"])
                    $sigla = $_POST["sigla"];
                    $descricao = $_POST["descricao"];
                    $dataInicial = $_POST["dataInicio"];
                    $dataFinal = $_POST["dataFinal"];

                $model = new taskModel();
                $model->setSigla($sigla);
                $model->setDescricao($descricao);
                $model->setDataInicial($dataInicial);
                $model->setDataFinal($dataFinal);
                $model->salvar();
                header("Location: index.php");
            }

            // 
        }

        public function listarTasks(){
            require_once "taskModel.php";
            require_once "index.php";
            $model = new taskModel();
            $model->listarTodasTasks();
            return $model;
        }
    }
    
    $taskController = new taskController();
    $taskController->cadastrar();
?>