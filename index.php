<?php 
    // require_once "taskController.php";
    // $controller = new taskController();
    // $tasks = $controller->listarTasks();

    require_once "taskModel.php";
    $taskModel = new taskModel();
    $tasks = $taskModel->listarTodasTasks();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');

        body{
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        .taskContainer {
            display: none;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 5px;
            
        }
        form label {
            display: block;
            margin-bottom: 10px;
        }
        form input[type="text"],
        form input[type="datetime-local"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            margin-bottom: 20px;
        }
        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        form input[type="submit"]:hover {
            background-color: #3e8e41;
        }
        .taskListContainer{
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .title{
            padding-top: 20px;
            text-align: center;
        }
        table {

            border-collapse: collapse;
            width: auto;

        }

        th, td {
            
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btnExibirAdd{
            font-size: 16px;
            cursor: pointer;
            text-align: center; 
            color: #fff;
            background-color: #4CAF50;
            width: 150px;
            border-radius: 5px;
            box-shadow: 0 3px #2E8B57;
        }
        .edit-button, .delete-button {
            display: inline-block;
            padding: 8px 16px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            box-shadow: 0 3px #2E8B57;
        }

        .edit-button:hover, .delete-button:hover, .btnExibirAdd:hover {
            background-color: #3e8e41;
        }

        .delete-button {
            background-color: #f44336;
            box-shadow: 0 3px #d45a4f;
        }

        .delete-button:hover {
            background-color: #c32b22;
        }
    </style>
</head>
<body>
    <div class="taskContainer">
        <form method="POST" action="taskController.php" >
            <label for="sigla">Sigla:
                <input type="text" name="sigla" placeholder="Defina uma sigla para a tarefa:" required>
            </label>
            <label for="descricao">Descrição:
                <input type="text" name="descricao" placeholder="Defina uma descricao para a tarefa:" required>
            </label>
            <label for="dataInicio">Data de Inicio:
                <input type="datetime-local" name="dataInicio" required>
            </label>
            <label for="dataFinal">Data de Final:
                <input type="datetime-local" name="dataFinal" required>
            </label>

            <input type="submit" value="Adicionar">
        </form>
    </div>
    <div class="btnExibirAdd">
        <a href="#" class="edit-button"><b>Adicionar Nova Task </b></a>
    </div>
    <h1 class="title">Lista de Tarefas</h1>
    <div class="taskListContainer">
        <table>
            <thead>
                <tr>
                    <th>ID Task</th>
                    <th>Sigla</th>
                    <th>Descrição</th>
                    <th>Data Inicial</th>
                    <th>Data Final</th>
                    <th>Edição</th>
                    <th>Exclusão</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($tasks as $task): ?>
                
                    <tr>
                        <td><?php echo $task->getId(); ?></td>
                        <td><?php echo $task->getSigla(); ?></td>
                        <td><?php echo $task->getDescricao(); ?></td>
                        <td><?php $dataInicial = new DateTime($task->getDataInicial()); echo  $dataInicial->format("d/m/y H:i:s"); ?></td>
                        <td><?php $dataFinal = new DateTime($task->getDataFinal()); echo  $dataFinal->format("d/m/y H:i:s")?></td>
                        <td><a href="editTask.php?id=<?php echo $task->getId(); ?>" class="edit-button">Editar</a></td>
                        <td><a href="deleteTask.php?id=<?php echo $task->getId(); ?>" class="delete-button">Excluir</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
    const btnExibirAdd = document.querySelector('.btnExibirAdd');
    const taskContainer = document.querySelector('.taskContainer');

    btnExibirAdd.addEventListener('click', () => {
        taskContainer.style.display = 'block';
        btnExibirAdd.style.display = 'none';
    });
</script>
</body>
</html>