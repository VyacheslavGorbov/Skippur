<?php

    class HomeController extends Controller
    {
        public function index()
        {
            $items = $this->model('item')->get();
            $this->view('home/index', ['items'=>$items]);
        }
    }

?>