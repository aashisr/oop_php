<?php

class UserModel extends Model{

    public function register(){
        //Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $password = md5($post['password']);

        if ($post['submit']) {
            //If submitted with empty fields
            if ($post['name'] == '' || $post['email'] == '' || $post['password'] == '') {
                Messages::setMsg('Please fill in all fields', 'error');
                return;
            }

            //Insert into database
            $this->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
            //Data binding
            $this->bind(':name', $post['name']);
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            //Execute query
            $this->execute();

            //Verify
            if ($this->lastInsertId()) {
                //Redirect
                header('Location: ' . ROOT_URL . 'users/login');
            }
            return;
        }
    }

    public function login(){
        //Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $password = md5($post['password']);

        if ($post['submit']) {
            //Check database
            $this->query('SELECT * FROM users WHERE email = :email AND password = :password');
            //Data binding
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);

            $row = $this->single();

            if($row){
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    "id" => $row['id'],
                    "name" => $row['name'],
                    "email" => $row['email']
                );
                //Redirect
                header('Location: ' . ROOT_URL . 'shares');
            } else {
                //Display error messages
                //No need to instantiate Message class since it is static
                Messages::setMsg('Incorrect Login', 'error');
            }
            return;
        }
    }
}

?>