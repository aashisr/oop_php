<?php

    require 'classes/Database.php';

    $database = new Database;


    //To check if post is submitted
    //filter_input_array gets external variable and optionally filters them
    //input_post checks the _post type of input
    //filter_sanitize_string is the type of filter to be used which removes all HTML tags from a string
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //Add posts
    if(isset($post['submit'])){
        $title = $post['title'];
        $body = $post['body'];

        //query the database, database is already instantiated
        //Use of : binds the data
        $database->query('INSERT INTO posts (title, body) VALUES(:title, :body)');
        //Call bind method
        $database->bind(':title', $title);
        $database->bind(':body', $body);
        //CAll execute
        $database->execute();

    }


    //Update posts
    if (isset($post['update'])){
        $id = $post['id'];
        $title = $post['title'];
        $body = $post['body'];
        
        //query
        $database->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
        //Bind values
        $database->bind(':id', $id);
        $database->bind(':title', $title);
        $database->bind(':body', $body);

        //Execute query
        $database->execute();

    }

    $database->query('SELECT * FROM posts /*WHERE id = :id */');
    // $database->bind(':id', 1);
    $rows = $database->resultset();
?>

    <!-- Add Posts-->
    <h1>Add Posts</h1>
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <label>Post Title</label>
        <input type="text" name="title" placeholder="Add a Title..."><br>
        <label>Post Body</label>
        <textarea name="body"></textarea><br>
        <input type="submit" name="submit" value="Submit">

    </form>

    <!-- Update Posts-->
    <h1>Update Posts</h1>
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <label>Post Id</label>
        <input type="text" name="id" placeholder="Id..."><br>
        <label>Post Title</label>
        <input type="text" name="title" placeholder="Add a Title..."><br>
        <label>Post Body</label>
        <textarea name="body"></textarea><br>
        <input type="submit" name="update" value="Submit">

    </form>

    <!-- Display Posts-->
    <h1>Posts</h1>
    <?php foreach ($rows as $row){ ?>
        <div>
            <h3><?php echo $row['title'] ?></h3>
            <p><?php echo $row['body'] ?></p>
        </div>
<?php } ?>


