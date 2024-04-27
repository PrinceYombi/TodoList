<?php
require_once('lib/header.php');

$todos = [];

if (file_exists("data_base/todo_data.json")) {

    $json = file_get_contents("data_base/todo_data.json");
    $todos = json_decode($json, true);
    
}
?>

    <div class="container">
        <h1>Todo List Project</h1>
        <form action="lib/new_todo.php" id="todoForm" method="POST" class="real-btn">
            <input type="text" name="todo_name" placeholder="Enter todo ..." id="todo">
            <button class="btn btn-success">Add Todo</button>
        </form>

        <ul id="todoList">
            <?php foreach($todos as $todoName => $todo): ?>
                <li>
                    <form action="lib/change_status.php" method="POST" class="form-1">
                        <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
                        <button class="<?php echo  $todo["completed"] ? "selected" : "non-selected"?>"><?php echo $todoName ?></button>
                    </form>
                    <form action="lib/delete.php" method="POST" class="real-btn">
                        <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
                        <a><button class="btn btn-danger">Delete</button></a>
                    </form>
                </li>
            <?php endforeach ?>
           <?php if(!empty($todos)): ?>
             <a href="lib/delete_all.php" class="deleteAll"><button class="btn btn-warning">Delete All</button></a>
            <?php endif ?>

        </ul>

<?php require_once('lib/footer.php') ?>