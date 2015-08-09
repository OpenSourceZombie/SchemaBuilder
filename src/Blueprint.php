<?php

require 'Column.php' ;
require_once('Commands.php');
class Blueprint
{
    protected $incrementFlag = false;
    protected $PrimaryKeyFlag = false;
    private $columns = array();
    /*
    public function integer($colname){
        $this->columns[$colname] = new Column($colname);
        return $this->columns[$colname];
    }
    */
/*    public function increments($colname)
    {
        $this->columns[$colname] = new Column($colname, "integer");
        return $this->columns[$colname];
    }
*/
    public function __call($columnType, $args)
    {
    
        $columnName = $args[0];
        $columnMax = (isset($args[1])) ? $args[1] : '';
        $this->columns[$columnName] = new Column($columnName, $columnType, $columnMax);
        return $this->columns[$columnName];
    }
    public function generate($name)
    {
        //$SQL = sprintf("CRAETE %s %s ");
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
 //       var_dump($this->columns);       
    }
}
