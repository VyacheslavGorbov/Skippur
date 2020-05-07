<?php

    class Controller
    {
        public function model($model)
        {
            if(file_exists('app/models/' . $model . '.php'))
            {
                require_once 'app/models/' . $model . '.php';
                return new $model();
            }
            else
            {
                return null;
            }
        }

        public function view($name, $data = [])
        {
            if(file_exists('app/views/' . $name . '.php'))
            {
                //call the header here
                include 'app/views/' . $name . '.php';// don't put the header or footer code here...
                //call the footer here
            }
            else
            {
                echo "The view " . $name . " does not exist.";
            }
        }
    }

?>