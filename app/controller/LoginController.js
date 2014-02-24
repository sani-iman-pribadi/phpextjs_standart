Ext.define('PHPExtJS.controller.LoginController', {
    extend: 'Ext.app.Controller',
    views: ['Login'],    
    init: function() {
        
        this.control({
            'Login button[action=submit]': {
                click: this.submit
            },          
        });
        
    },          
    
    submit: function(button) {
        var values    = button.up('form').getForm().getValues();
        
            Ext.Ajax.request({
                url: window.location.pathname+'site/login',
                success: function(response, opts) {
                    var data = Ext.JSON.decode(response.responseText);
                    if(data.success===false){
                        Ext.MessageBox.alert('Failed!', 'Your username or password is incorrect');
                    }
                    else{
                        window.location = '';   
                    }
                },
                failure: function(response, opts) {
                    Ext.MessageBox.alert('Status', 'Server-side failure with status code ' + response.status);
                },
                params: {'LoginForm[username]': values.username, 'LoginForm[password]':values.password}
            });
    },

    
});
