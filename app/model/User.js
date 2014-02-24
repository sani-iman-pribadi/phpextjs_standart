Ext.define('PHPExtJS.model.User', {
extend: 'Ext.data.Model',
fields: [
            {name: 'id', type: 'string'},
            {name: 'username', type: 'string'},
            {name: 'password', type: 'string'},
            {name: 'name', type: 'string'},
            {name: 'photo', type: 'string'},
    ]
});