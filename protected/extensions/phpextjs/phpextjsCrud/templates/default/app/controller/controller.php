<?php
/**
 *
 * @author Sani Iman Pribadi
 *
 */
?>
Ext.define('PHPExtJS.controller.<?php echo $this->modelClass; ?>Controller', {
    extend: 'Ext.app.Controller',
    stores: [
        '<?php echo $this->modelClass; ?>',
    ],
    models: ['<?php echo $this->modelClass; ?>'],
    
    views: ['<?php echo $this->modelClass; ?>._grid'],
    
    refs: [
        {
        ref: '<?php echo strtolower($this->modelClass); ?>Form',
            selector: 'panel'
        },
        {
        ref: '<?php echo strtolower($this->modelClass) ?>Grid',
            selector: 'grid',
        }
    ],
    
    init: function() {

        this.control({
            '<?php echo strtolower($this->modelClass); ?>Grid dataview': {
                itemdblclick: this.actionDbClick
            },
            '<?php echo strtolower($this->modelClass); ?>Grid button[action=delete]': {
                click: this.actionDelete
            },
            '<?php echo strtolower($this->modelClass); ?>Form button[action=save]': {
                click: this.actionSave
            },
            '<?php echo strtolower($this->modelClass); ?>Form button[action=cancel]': {
                click: this.actionCancel
            },
            '<?php echo strtolower($this->modelClass); ?>Grid button[action=search]': {
                click: this.actionSearch
            },
            '<?php echo strtolower($this->modelClass); ?>Form button[action=reset]': {
                click: this.actionReset
            }
        });

    },

    actionDbClick: function(dataview, record, item, index, e, options){
        var form<?php echo $this->modelClass; ?> = Ext.create('PHPExtJS.view.<?php echo $this->modelClass; ?>._form');

        if (record) {

            form<?php echo $this->modelClass; ?>.down('form').loadRecord(record);

        }    
    },

    actionUpdate: function(dataview, record) { //function(grid, record) {
        var form<?php echo $this->modelClass; ?> = Ext.create('PHPExtJS.view.<?php echo $this->modelClass; ?>._form');

        if (record) {

            form<?php echo $this->modelClass; ?>.down('form').loadRecord(record);

        }
    },

    actionCreate: function(button, e, options) {
        this.actionUpdate();
    },

    actionSave: function(button) {

        var win = button.up('window'),
        form = win.down('form'),
        record = form.getRecord(),
        values = form.getValues(false, false, false, true);

        var isNewRecord = false;
        
        <?php
            foreach ($this->tableSchema->columns as $name => $column) {
                if($column->isPrimaryKey){
                    $primaryKey = $name;
                }
            }            
        ?>
        if (values.<?php echo $primaryKey; ?> !='') {
            record.set(values); //saving line
        } else {
            record = Ext.create('PHPExtJS.model.<?php echo $this->modelClass; ?>');
            record.set(values);
            this.get<?php echo $this->modelClass; ?>Store().add(record);
            isNewRecord = true;
        }

        win.close();
        //this.get<?php echo $this->modelClass; ?>Store().sync(); use this code for autoSync : false

    },
    actionDelete: function(button) {

        var grid = this.get<?php echo $this->modelClass; ?>Grid();
        var record = grid.getSelectionModel().getSelection();
        var store = this.get<?php echo $this->modelClass; ?>Store();

        store.remove(record);
        //this.get<?php echo $this->modelClass; ?>Store().sync();

        this.get<?php echo $this->modelClass; ?>Store().load();
    },
    actionReset: function(button, e, options) {
        var win = button.up('window'),
        form = win.down('form');
        form.getForm().reset();
    },

    actionCancel: function(button, e, options) {

        var win = button.up('window'),
        form = win.down('form');
        form.getForm().reset();
        win.close();

    },
    actionSearch: function(button) {

        var win = button.up('window'),
        form = win.down('textfield'),
        grid = win.down('grid'),
        values = form.getSubmitValue();

        grid.getStore().load({params: {q: values}});

    },
});