Ext.define('PHPExtJS.controller.<?php echo $this->controller; ?>Controller', {
    extend: 'Ext.app.Controller',
    requires: [
    'Ext.data.Session'
    ],
    stores: [
        '<?php echo $this->controller; ?>',
    ],
    models: ['<?php echo $this->controller; ?>'],
    
    views: ['<?php echo $this->controller; ?>._grid'],
    
    init: function() {

        this.control({
        });

    },

    actionDbClick: function(dataview, record, item, index, e, options){
    },

    actionUpdate: function(dataview, record) { //function(grid, record) {
        var form<?php echo $this->controller; ?> = Ext.create('PHPExtJS.view.<?php echo $this->controller; ?>._form');

        if (record) {

            form<?php echo $this->controller; ?>.down('form').loadRecord(record);

        }
    },

    actionCreate: function(record) {
        Ext.create('PHPExtJS.view.<?php echo $this->controller; ?>._form').show();
    },

    actionSave: function(button) {

        var win = button.up('window'),
        form = win.down('form'),
        record = form.getRecord(),
        values = form.getValues();

        var isNewRecord = false;

        if (values.id_pasien_unit !='') {
            record.set(values); //baris untuk menyimpan
        } else {
            record = Ext.create('PHPExtJS.model.<?php echo $this->controller; ?>');
            record.set(values);
            this.get<?php echo $this->controller; ?>Store().add(record);
            isNewRecord = true;
        }

        win.close();
        this.get<?php echo $this->controller; ?>Store().sync();

        if (isNewRecord) {

            var form<?php echo $this->controller; ?> = Ext.create('PHPExtJS.view.<?php echo $this->controller; ?>._form');
            form<?php echo $this->controller; ?>.down('form').loadRecord(record);
            this.get<?php echo $this->controller; ?>Store().load();

        }

    },
    actionDelete: function(button) {

        var grid = this.get<?php echo $this->controller; ?>Grid();
        var record = grid.getSelectionModel().getSelection();
        var store = this.get<?php echo $this->controller; ?>Store();

        store.remove(record);
        this.get<?php echo $this->controller; ?>Store().sync();

        this.get<?php echo $this->controller; ?>Store().load();
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




