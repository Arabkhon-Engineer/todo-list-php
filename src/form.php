<?php
require './dbconnect.php';

if (isset($_POST['submit']) && !empty($_POST['task'])) {
    $error = "please enter typing input tag";
    $sql = $conn->prepare("insert into tasks(name) value(:name) ");
    $task = $_POST['task'];
    $sql->bindValue(':name', $task);
    try {
        header('localhost: index.php');
        $sql->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>

<form class="container m-5 p-2" method="post" action="index.php">
    <div class="mb-3 d-flex justify-content-around">
        <input type="text" class="form-control w-100" id="task" name="task" aria-describedby="task">
        <button type="submit" class="btn btn-primary" name="submit">Add</button>
    </div>
</form>
