Ext.define('PHPExtJS.controller.UserController', {
    extend: 'Ext.app.Controller',
    requires: [
        
    ],
    stores: [
        'User',
    ],
    models: ['User'],
    views: ['User._grid'],
    init: function() {

        this.control({
            'userGrid dataview': {
                itemdblclick: this.actionDbClick
            },
            'userGrid button[action=delete]': {
                click: this.actionDelete
            },
            'userGrid button[action=create]': {
                click: this.actionCreate
            },
            'userForm button[action=save]': {
                click: this.actionSave
            },
            'userForm button[action=cancel]': {
                click: this.actionCancel
            },
            'userGrid button[action=search]': {
                click: this.actionSearch
            },
            'userForm button[action=reset]': {
                click: this.actionReset
            }
        });

    },
    refs: [
        {
            ref: 'userGrid',
            selector: 'grid',
            //xtype: 'gridpanel'
        }
    ],
    actionDbClick: function(dataview, record, item, index, e, options) {
        var formUser = Ext.create('PHPExtJS.view.User._form');

        if (record) {

            formUser.down('form').loadRecord(record);

        }
    },
    actionUpdate: function(dataview, record) { //function(grid, record) {
        var formUser = Ext.create('PHPExtJS.view.User._form');

        if (record) {

            formUser.down('form').loadRecord(record);

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

        if (values.id != '') {

            record.set(values); //baris untuk menyimpan
        } else {
            
            record = Ext.create('PHPExtJS.model.User');          
            record.set(values);
            this.getUserStore().add(record);
            isNewRecord = true;
        }

        win.close();

    },
    actionDelete: function(button) {

        var grid = this.getUserGrid();
        var record = grid.getSelectionModel().getSelection();
        var store = this.getUserStore();

        store.remove(record);

        this.getUserStore().load();
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