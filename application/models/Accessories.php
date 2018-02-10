<?php

/**
 * Accessories.
 */
class Accessories extends CSV_Model
{
    private $everything;

    // Constructor
    public function __construct()
    {
        parent::__construct('../data/accessory.csv', 'itemid');
        $this->everything = parent::all();

        // Add derrived attributes to model
        for ($i = 0; $i < sizeof($this->everything); ++$i)
        {
            $this->everything[$i]->filepath = '/assets/img/'
                . $this->categories->get($this->everything[$i]->categoryid)->dirname
                . '/' . $this->everything[$i]->filename;

            $this->everything[$i]->itemvolume = $this->everything[$i]->itemlength
                * $this->everything[$i]->itemwidth
                * $this->everything[$i]->itemheight;
        }
    }

    /**
     * Return everything in model.
     */
    public function all()
    {
        return $this->everything;
    }

    /**
     * Get accessory item by name.
     */
    public function getByName($name)
    {
        $everything = $this->everything;
        for ($i = 0; $i < sizeof($everything); ++$i)
        {
            if ($everything[$i]->filename == $name)
            {
                return $everything[$i];
            }
        }
        return null;
    }

    /**
     * Get accessory item by id.
     */
    public function get($key1, $key2 = null)
    {
        return $this->everything[$key1];
    }

    /**
     * Get first accessory item.
     */
    public function first()
    {
        return $this->everything[0];
    }
}