<?php
Class Column
{
    protected $name;
    protected $default;
    protected $type;
    protected $nullable;
    protected $max;
    protected $increments;

    function __construct($name, $type = '', $max = '') {
        $this->name = $name;
        $this->type = $type;
        $this->max = $max;
    }
    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getMax()
    {
        return ($this->max)?'('.$this->max .')':''; 
    }

    public function getIncrements()
    {
        return ($this->increments) ? 'AUTO_INCREMENT' : ''; 
    }

    public function getNullable()
    {
        return ($this->nullable) ? '' : 'NOT NULL'; 
    }

    public function getDefault()
    {
        return ($this->default) ? 'DEFAULT \''.$this->default.'\'' : ''; 
    }

    public function autoinc()
    {
        $this->increments = true;
        return $this;
    }

    public function nullable()
    {
        $this->nullable =  true;
        return $this;
    }

    public function primary_key()
    {
        $this->primary_key =  true;
        return $this;
    }

    public function default_value($value)
    {
        $this->default = $value;
        return $this;
    }
    public function max($value)
    {
        $this->max = $value;
        return $this;
    }

}
