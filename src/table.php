<?php

require './dbconnect.php';

if (isset($_GET['del_task'])) {
    $id = $_GET['del_task'];
    try {
        $stmt = $conn->prepare("DELETE FROM tasks WHERE id=$id");
        $stmt->execute();
      } catch(PDOException $e) {
        echo  $e->getMessage();
      }
}

$stmt = $conn->prepare("SELECT * FROM tasks");
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$conn = null;
?>
<style>
    table,
    th,
    td {
        border: 1px solid;
        padding: 10px 20px;
    }

    td a {
        color: #fff;
        text-decoration: none;
    }
</style>

<table class="m-5 w-75">
    <thead>
        <tr>
            <th>#</th>
            <th>Task</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $task) : ?>
            <tr>
                <td><?= $task['id'] ?></td>
                <td><?= $task['name'] ?></td>
                <td><?= $task['created_ad'] ?></td>
                <td><a href="index.php?del_task=<?= $task['id'] ?>" class="btn btn-danger">Delete</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
