function completarscale(){

    var campo_manufacturer = window.document.getElementById('manufacturer').value;

    $.post('proc_scale_selected.php', {campo_manufacturer}, function(retorna){
            
        var retorno = (retorna).split(",");
    
        document.getElementById('model').value = retorno[0];
        //document.getElementById('manufacturer').value = retorno[1];
        document.getElementById('capacity').value = retorno[2];
        document.getElementById('mincapacity').value = retorno[3];
        document.getElementById('type').value = retorno[4];
        document.getElementById('location').value = retorno[5];
        document.getElementById('control').value = retorno[6];
        document.getElementById('measure').value = retorno[7];
            
        });

};