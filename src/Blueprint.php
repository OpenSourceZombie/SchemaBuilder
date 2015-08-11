<?php

require 'Column.php' ;
require_once('Commands.php');
class Blueprint
{
    protected $incrementFlag = false;
    protected $PrimaryKeyFlag = false;
    private $columns = array();
 
    /**
     * @parm string $columnType
     * @parm array $args extra parameters for the column
     */
    public function __call($columnType, $args)
    {
    
        $columnName = $args[0];
        $columnMax = (isset($args[1])) ? $args[1] : '';
        $this->columns[$columnName] = new Column($columnName, $columnType, $columnMax);
        return $this->columns[$columnName];
    }

    /**
     *@parm $name string table name
     *@return stirng SQL generated string for this table
     */
    public function generate($name)
    {
        $format = "CREATE TABLE( %s ) %s";
            
        $cols = "";
        foreach($this->columns as $col){
            $cols .= vsprintf("%s %s %s %s %s %s ,", [
                $col->getName(), 
                $col->getType(),
                $col->getMax(),
                $col->getDefault(),
                $col->getNullable(),
                $col->getIncrements()
            ]);
        }

        echo  preg_replace('/\s+/', ' ', sprintf($format, $cols,'')), PHP_EOL ;
    }
}
