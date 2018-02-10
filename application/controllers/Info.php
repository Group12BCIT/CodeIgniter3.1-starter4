<?php

/**
 * Displays info in JSON format.
 * 
 * Using categories as an example, the URI /info/category would return all categories as a JSON document,
 * and /info/category/abc would return the data for just the one.
 */
class Info extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * return a description of your scenario, eg. {"scenario":"Duckey player"}
     */
    public function index()
    {
        echo "How to accessorize a room.";
    }

    /**
     * return the designated category, or all of them if none is specifically requested
     */
    public function category($key = null)
    {
        $output = ($key == null) ? $this->categories->all() : $this->categories->getByName($key);
        header("Content-type: application/json");
        echo json_encode($output);
    }

    /**
     * return the designated accessory, or all of them if none is specifically requested
     */
    public function catalog($key = null)
    {
        $output = ($key == null) ? $this->accessories->all() : $this->accessories->getByName($key);
        header("Content-type: application/json");
        echo json_encode($output);
    }

    /**
     * return the designated category, or all of them if none is specifically requested
     */
    public function bundle($key)
    {
    }
}