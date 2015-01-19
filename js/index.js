var index_ = function(){

    /*metodos, propiedades privadas*/
    var _private = {};
    
    /*metodos, propiedades publicas*/
    var _public = {};
    
    _public.init = function(){
        $('#btnGrid').click(function(){
            index.getDatagrid();
        });
    };
    
    _public.getDatagrid = function(){
        var datos = '';
        
        $.ajax({
            type: "POST",
            data: datos,
            url: 'php/Grilla.php',
            dataType: 'html',
            success: function(result){
                $('#concainer_datagrid').html(result);
            }
        });
    };
    
    return _public;
    
};

var index = new index_();
