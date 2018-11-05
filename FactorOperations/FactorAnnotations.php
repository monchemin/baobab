<?php
namespace FactorAnnotations;

/**
 * @Annotation 
 */
final class TableName {
    public $value;

}

/**
 * @Annotation 
 */
final class TableColumn  {
    public $columnName;
    public $isPK;
}
?>