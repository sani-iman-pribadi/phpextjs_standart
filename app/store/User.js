Ext.define('PHPExtJS.store.User', {
    extend: 'Ext.data.Store',
    model: 'PHPExtJS.model.User',
    autoLoad: false,
    remoteFilter: true,
    autoSync: true,
    proxy: {
        type: 'rest',
        
        api: {
            create: 'User/create', 
            read: 'User/read',
            update: 'User/update',
            destroy: 'User/delete',
        },
        
        listeners: {
                exception: function(proxy, response, options){
                    Ext.MessageBox.alert('Warning!', response.status + ": " + response.statusText + " " + response.responseText + "!"); 
                    //Ext.MessagesBox.alert('Error', response.status + ": " + response);
                    //console.log(response);
                }
            },
        
        reader: {
            type: 'json',
            root: 'data',
            successProperty: 'success'
        },
        
        writer: {
            type: 'json',
            writeAllFields: true,
            encode: true,
            root: 'data'
        },
        
        // sends single sort as multi parameter
        simpleSortMode: true,

        // Parameter name to send filtering information in
        //filterParam: 'query',

        // The PHP script just use query=<whatever>
        
        encodeFilters: function(filters) {
            return filters[0].value;
        }
        
        
    }
});