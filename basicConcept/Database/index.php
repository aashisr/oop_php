<?php

    require 'classes/Database.php';

    $database = new Database;

    $database->query('SELECT * FROM posts WHERE id = :id');
    $database->bind(':id', 2);
    $rows = $database->resultset();

    //print_r($rows);
?>
    <h1>Posts</h1>
    <?php foreach ($rows as $row){ ?>
        <div>
            <h3><?php echo $row['title'] ?></h3>
            <p><?php echo $row['body'] ?></p>
        </div>
<?php } ?>


