<?php

require 'Blueprint.php';
final class Schema
{
    public $name;
    public $blueprint;

     public function create($tablename, $callback)
    {
        $this->name = $tablename;
        $this->blueprint = new Blueprint($tablename);
        $callback($this->blueprint);
        return $this;
    }
    public function generate()
    {
       $this->blueprint->generate($this->name);
    }
}
