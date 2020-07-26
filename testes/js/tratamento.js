function verificafleg(){
    texto =  window.document.getElementById("unablecalibrate");
    
//    if (texto.value == 1){
        document.getElementById('comment').value = texto.value;//"False";
//    } else {
//        document.getElementById('comment').value = "True";
//    }
    
}

//var check = document.getElementsById("itemCheck"); 
//alert("check");
//alert(texto.value);

function verificaChecks() {
      var aChk = document.getElementsByName("item"); 
            for (var i=0;i<aChk.length;i++){ 
                if (aChk[i].checked == true){ 
                    // CheckBox Marcado... Faça alguma coisa... Ex:
                    alert(aChk[i].value + " marcado.");
                }  else {
                    // CheckBox Não Marcado... Faça alguma outra coisa...
                }
           }
        }
    