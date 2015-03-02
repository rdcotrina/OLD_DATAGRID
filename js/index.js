var index_ = function(){

    /*metodos, propiedades privadas*/
    var _private = {};
    
    /*metodos, propiedades publicas*/
    var _public = {};
    
    _public.init = function(){
        $('#btnGrid').click(function(){
            index.getDatagrid('',1,10);
        });
    };
    
    _public.getDatagrid = function(criterio,page,regxpag){
        var datos = '&_criterio='+criterio+'&_page='+page+'&_regxpag='+regxpag;
        
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
    
    _public.edit = function(ape,nom){
        alert(ape+' - '+nom)
    };
    
    return _public;
    
};

var index = new index_();
