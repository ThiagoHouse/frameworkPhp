<?php

class Posts extends Controller
{
    public function index()
    {
        $this->view('posts/index');
    }
}