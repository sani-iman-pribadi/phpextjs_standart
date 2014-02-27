<?php
/**
 *
 * @author Sani Iman Pribadi
 *
 */
?>
Ext.define('PHPExtJS.model.<?php echo $this->modelClass; ?>', {
extend: 'Ext.data.Model',
fields: [
<?php foreach ($this->tableSchema->columns as $name => $column) { ?>
        {name: '<?php echo $name; ?>', type: '<?php
        if ($column->dbType == 'bigint' || $column->dbType == 'integer' || $column->dbType == 'smallint') {
            if($column->isPrimaryKey){
                echo 'string';
            }else{
                echo 'integer';
            }
        } else {
            echo 'string';
        }
        ?>'},
    <?php } ?>
]
});