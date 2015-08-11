<?php

require 'Blueprint.php';
final class Schema
{
    public $name;
    public $blueprint;
    
    /**
     * @param $tablename string
     * @param $callback clouser CalLback method
     * @return $this to be used for the generation part
     */ 
    
    public function create($tablename, $callback)
    {
        $this->name = $tablename;
        $this->blueprint = new Blueprint($tablename);
        $callback($this->blueprint);
        return $this;
    }
    /*
     * start SQL generation for the table's Blueprint object
     */   
    public function generate()
    {
       $this->blueprint->generate($this->name);
    }
}
