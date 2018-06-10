<?php
/**
 * Created by Ahmad Nakouzi.
 * User: ahmad-nakouzi
 * Date: 6/8/18
 * Time: 11:31 PM
 */

abstract class Controller
{
    abstract public function index();

    abstract public function create();

    abstract public function read();

    abstract public function update();

    abstract public function delete();

    public function view($className)
    {
        readfile("Views/$className.php");
    }
}