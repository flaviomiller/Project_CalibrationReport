

function autocompletar(){
    //tratamento dos campos de resultados da Pré Inspeção
    //variaveis que coletam as informações do formulario
    var vpw1 = window.document.getElementById('cpw') // Variável do peso inserido (Test Load)
    var vpe1 = window.document.getElementById('cpe') // Variável da margem de erro inserida
    var vmincap =  window.document.getElementById("mincapacity") // Variável da medida da balança selecionada
    var vmeasure =  window.document.getElementById("measure") // Variável da tipo de medida selecionada
    var vdif =  window.document.getElementById("dif") // Variável da diferença selecionada
    
    //variaveis que convetem as informações coletadas do fomrulario para tratamento dentro da função
    var cmincap = vmincap.options[vmincap.selectedIndex].value    
    var cmeasure = vmeasure.options[vmeasure.selectedIndex].value
    var cmeasuretype = cmeasure
    var cdif = vdif.options[vdif.selectedIndex].value
    var convpw1 = vpw1.value
    var ctestload = convpw1
    var convpe1 = vpe1.value
    var measureselec = " "
    var difselec = " "
    var casasdec = 0
    var valbase = 0
    
    //variaveis para calculo dos valores dos campos
    var cweight1 = 0
    var cweight2 = 0
    var cweight3 = 0
    var cweight4 = 0

    //variáveis de controle minimo do peso da balança
    var verror1 = 0
    var verror2 = 0
    var verror3 = 0
    var verror4 = 0

    //variaveis que atribuem o valor aos campos
    var cerror1 = 0 
    var cerror2 = 0
    var cerror3 = 0
    var cerror4 = 0


    //tratamento da variável do fleg do tipo de medida
    if (cmeasure == 1) {
        measureselec = "LB"
    } else if (cmeasure == 2) {
        measureselec = "g"
    } else if (cmeasure == 3) {
        measureselec = "oz"
    }else if (cmeasure == 4) {
        measureselec = "kg"
    }

    //tratamento da variável do fleg do tipo de medida
    if (cdif == 1) {
       difselec = "+"
    } else if (cdif == 2) {
        difselec = "-"
    }

    //tratamento da medida da balança selecionada para determinar as casas decimais a serem calculadas
    if (cmincap == 1 || cmincap == 2 || cmincap == 3 ) {
        
        casasdec = 2


    } else if (cmincap == 4 || cmincap == 5 || cmincap == 6 ) {

        casasdec = 1

    } else if (cmincap == 7 || cmincap == 8 || cmincap == 9 || cmincap == 10 || cmincap == 11  ) {

        casasdec = 0

    }else if (cmincap == 12 || cmincap == 13 || cmincap == 14 ) {

        casasdec = 3

    }else if (cmincap == 15 || cmincap == 16 || cmincap == 17 ) {

        casasdec = 4

    }
    
    
    //Tratamento da medida inserida no campo TEST LOAD e setagem das variáveis para cálculo das medidas
    if (convpw1 == 10) {
        cweight1 = 10
        cweight2 = 5
        cweight3 = 3
        cweight4 = 1

        cerror1 = (1*convpe1)
        cerror2 = (0.5*convpe1)
        cerror3 = (0.3*convpe1)
        cerror4 = (0.1*convpe1)

    } else if (convpw1 == 25) {
        cweight1 = 25
        cweight2 = 20
        cweight3 = 10
        cweight4 = 5

        cerror1 = (1*convpe1)
        cerror2 = (0.8*convpe1)
        cerror3 = (0.4*convpe1)
        cerror4 = (0.2*convpe1)

    } else if (convpw1 == 30) {
        cweight1 = 30
        cweight2 = 20
        cweight3 = 10
        cweight4 = 5

        cerror1 = (1*convpe1)
        cerror2 = ((2/3)*convpe1)
        cerror3 = ((1/3)*convpe1)
        cerror4 = ((1/6)*convpe1)

    } else if (convpw1 == 50) {
        cweight1 = 50
        cweight2 = 30
        cweight3 = 20
        cweight4 = 10

        cerror1 = (1*convpe1)
        cerror2 = (0.6*convpe1)
        cerror3 = (0.4*convpe1)
        cerror4 = (0.2*convpe1)

    } else if (convpw1 == 100) {
        cweight1 = 100
        cweight2 = 50
        cweight3 = 25
        cweight4 = 10

        cerror1 = (1*convpe1)
        cerror2 = (0.5*convpe1)
        cerror3 = (0.25*convpe1)
        cerror4 = (0.1*convpe1)

    } else if (convpw1 == 150) {
        cweight1 = 150
        cweight2 = 100
        cweight3 = 50
        cweight4 = 25

        cerror1 = (1*convpe1)
        cerror2 = ((2/3)*convpe1)
        cerror3 = ((1/3)*convpe1)
        cerror4 = ((1/6)*convpe1)

    } else if (convpw1 == 200) {
        cweight1 = 200
        cweight2 = 150
        cweight3 = 100
        cweight4 = 50

        cerror1 = (1*convpe1)
        cerror2 = (0.75*convpe1)
        cerror3 = (0.5*convpe1)
        cerror4 = (0.25*convpe1)

    } else if (convpw1 == 500) {
        cweight1 = 500
        cweight2 = 300
        cweight3 = 200
        cweight4 = 100
    
        cerror1 = (1*convpe1)
        cerror2 = (0.6*convpe1)
        cerror3 = (0.4*convpe1)
        cerror4 = (0.2*convpe1)

    } else if (convpw1 == 1000) {
        cweight1 = 1000
        cweight2 = 500
        cweight3 = 250
        cweight4 = 100
    
        cerror1 = (1*convpe1)
        cerror2 = (0.5*convpe1)
        cerror3 = (0.25*convpe1)
        cerror4 = (0.1*convpe1)

    } else if (convpw1 == 2000) {
        cweight1 = 2000
        cweight2 = 1000
        cweight3 = 500
        cweight4 = 250

        cerror1 = (1*convpe1)
        cerror2 = (0.5*convpe1)
        cerror3 = (0.25*convpe1)
        cerror4 = (0.125*convpe1)

    } else if (convpw1 == 5000) {
        cweight1 = 5000
        cweight2 = 3000
        cweight3 = 2000
        cweight4 = 1000

        cerror1 = (1*convpe1)
        cerror2 = (0.6*convpe1)
        cerror3 = (0.4*convpe1)
        cerror4 = (0.2*convpe1)

    }else if (convpw1 == 4000) {
        cweight1 = 4000
        cweight2 = 2000
        cweight3 = 1000
        cweight4 = 500

        cerror1 = (1*convpe1)
        cerror2 = (0.5*convpe1)
        cerror3 = (0.25*convpe1)
        cerror4 = (0.125*convpe1)

    } else if (convpw1 == 10000) {
        cweight1 = 10000
        cweight2 = 5000
        cweight3 = 2500
        cweight4 = 1000
    
        cerror1 = (1*convpe1)
        cerror2 = (0.5*convpe1)
        cerror3 = (0.25*convpe1)
        cerror4 = (0.1*convpe1)
        
    }else if (convpw1 == 14000) {
        cweight1 = 14000
        cweight2 = 7000
        cweight3 = 3500
        cweight4 = 1750

        cerror1 = (1*convpe1)
        cerror2 = (0.5*convpe1)
        cerror3 = (0.25*convpe1)
        cerror4 = (0.125*convpe1)

    }else if (convpw1 == 15000) {
        cweight1 = 15000
        cweight2 = 10000
        cweight3 = 5000
        cweight4 = 2500

        cerror1 = (1*convpe1)
        cerror2 = (10/15*convpe1)
        cerror3 = (5/15*convpe1)
        cerror4 = (25/150*convpe1)

    } else if (convpw1 == 20000) {
        cweight1 = 20000
        cweight2 = 10000
        cweight3 = 5000
        cweight4 = 2500

        cerror1 = (1*convpe1)
        cerror2 = (0.5*convpe1)
        cerror3 = (0.25*convpe1)
        cerror4 = (0.125*convpe1)

    }else if (convpw1 == 21000) {
        cweight1 = 21000
        cweight2 = 15000
        cweight3 = 10000
        cweight4 = 5000

        cerror1 = (1*convpe1)
        cerror2 = (15/21*convpe1)
        cerror3 = (10/21*convpe1)
        cerror4 = (5/21*convpe1)

    }else if (convpw1 == 21500) {
        cweight1 = 21500
        cweight2 = 15000
        cweight3 = 10000
        cweight4 = 5000

        cerror1 = (1*convpe1)
        cerror2 = ((150/215)*convpe1)
        cerror3 = ((100/215)*convpe1)
        cerror4 = ((50/215)*convpe1)

    } else if (convpw1 == 22000) {
        cweight1 = 22000
        cweight2 = 15000
        cweight3 = 10000
        cweight4 = 5000

        cerror1 = (1*convpe1)
        cerror2 = ((15/22)*convpe1)
        cerror3 = ((10/22)*convpe1)
        cerror4 = ((5/22)*convpe1)

    }else if (convpw1 == 23000) {
        cweight1 = 23000
        cweight2 = 15000
        cweight3 = 10000
        cweight4 = 5000

        cerror1 = (1*convpe1)
        cerror2 = (15/23*convpe1)
        cerror3 = (10/23*convpe1)
        cerror4 = (5/23*convpe1)

    }else if (convpw1 = "") {
        alert("The 'Test Load' field needs to be filled.");
    }else {
        alert("The 'Test Load' field has a measurement not handled by the system, please enter the data manually.");
    }
    
    //De acordo com a definição desse if será realizado o calculo do valor de base na função CALCULA.
    if (cmincap == 1 ) {
        
        valbase = 0.01

    } else if (cmincap == 2 ) {

        valbase = 0.02

    } else if (cmincap == 3 ) {

        valbase = 0.05

    } else if (cmincap == 4 ) {

        valbase = 0.1

    } else if (cmincap == 5 ) {

        valbase = 0.2

    } else if (cmincap == 6 ) {

        valbase = 0.5

    } else if (cmincap == 7 ) {

        valbase = 1

    } else if (cmincap == 8 ) {

        valbase = 2

    } else if (cmincap == 9 ) {

        valbase = 5

    } else if (cmincap == 10 ) {

        valbase = 10

    } else if (cmincap == 11 ) {

        valbase = 20

    }  else if (cmincap == 12 ) {

        valbase = 0.001

    }  else if (cmincap == 13 ) {

        valbase = 0.002

    }  else if (cmincap == 14 ) {

        valbase = 0.005

    }  else if (cmincap == 15 ) {

        valbase = 0.0001

    }  else if (cmincap == 16 ) {

        valbase = 0.0002

    }  else if (cmincap == 17 ) {

        valbase = 0.0005

    } 
    // 
// 1 = LB
// 2 = g
// 3 = oz
// 4 = kg
    //If que controla os tipos de certificados que serão atribuidos conforme o tipo de peso utilizado.
    if (cmeasuretype == 2){
        document.getElementById('cnistid').value = "180625002"
        document.getElementById('cstdcert').value = "11886"
        document.getElementById('cstdcertdate').value = "2018-06"
        document.getElementById('cstdcertdue').value = "2020-06"
        
        document.getElementById('cnistid2').value = "-"
        document.getElementById('cstdcert2').value = "-"
        document.getElementById('cstdcertdate2').value = ""
        document.getElementById('cstdcertdue2').value = ""
        
    } else if (cmeasuretype == 3){
        document.getElementById('cnistid').value = "180821002"
        document.getElementById('cstdcert').value = "12014"
        document.getElementById('cstdcertdate').value = "2018-08"
        document.getElementById('cstdcertdue').value = "2020-08"
        
        document.getElementById('cnistid2').value = "-"
        document.getElementById('cstdcert2').value = "-"
        document.getElementById('cstdcertdate2').value = ""
        document.getElementById('cstdcertdue2').value = ""
        
    }else if (cmeasuretype == 1 && ctestload < 50 ){
        document.getElementById('cnistid').value = "180821002"
        document.getElementById('cstdcert').value = "12014"
        document.getElementById('cstdcertdate').value = "2018-08"
        document.getElementById('cstdcertdue').value = "2020-08"
        
        document.getElementById('cnistid2').value = "-"
        document.getElementById('cstdcert2').value = "-"
        document.getElementById('cstdcertdate2').value = ""
        document.getElementById('cstdcertdue2').value = ""
        
    }else if (cmeasuretype == 1 && ctestload >= 50 && ctestload < 1000){
        document.getElementById('cnistid').value = "180821002"
        document.getElementById('cstdcert').value = "13195"
        document.getElementById('cstdcertdate').value = "2020-01"
        document.getElementById('cstdcertdue').value = "2022-01"
        
        if (ctestload <= 150){
            document.getElementById('cnistid2').value = "180821002"
            document.getElementById('cstdcert2').value = "12014"
            document.getElementById('cstdcertdate2').value = "2018-08"
            document.getElementById('cstdcertdue2').value = "2020-08"
        }else{
            document.getElementById('cnistid2').value = "-"
            document.getElementById('cstdcert2').value = "-"
            document.getElementById('cstdcertdate2').value = ""
            document.getElementById('cstdcertdue2').value = ""
        }
        
    }else if (cmeasuretype == 1 && ctestload >= 1000 ){
        document.getElementById('cnistid').value = "180625002"
        document.getElementById('cstdcert').value = "11885"
        document.getElementById('cstdcertdate').value = "2018-06"
        document.getElementById('cstdcertdue').value = "2020-06"
        
        document.getElementById('cnistid2').value = "-"
        document.getElementById('cstdcert2').value = "-"
        document.getElementById('cstdcertdate2').value = ""
        document.getElementById('cstdcertdue2').value = ""
    }


    ajustar(cerror1)
    sinais(ajustado, difselec, measureselec)
    verror1 = imprime 

    calcula(cerror2, valbase)//chama a função que faz o calculo do valor
    ajustar(res) //chama a função que converte o resultado em string e elimina os ZEROS antes do ponto
    sinais(ajustado, difselec, measureselec)//chama a função que converte e concatena sinais de + ou - no resultado
    verror2 = imprime //atribui o resultado a variável que será impressa em tela.
    
    calcula(cerror3, valbase)
    ajustar(res)
    sinais(ajustado, difselec, measureselec)
    verror3 = imprime
    
    calcula(cerror4, valbase)
    ajustar(res)
    sinais(ajustado, difselec, measureselec)
    verror4 = imprime


    //CORAÇÃO DO CÁLCULO - função que calcula o resultado de cada campo e retorna a variavel res para demais tratamento
    function calcula(numero, base){
        num = numero*1000000
        piso = base*1000000
        divisao = num / piso
        resto = num % piso
        controle_divisao = num / piso
        controle_resto = num % piso
        if (resto >= (piso/2)){
            resto = piso
        }else{
            resto = 0
        }
        res = ((Math.trunc(divisao)*piso) + resto)/1000000

    }
    
    //função que converte o resultado em string e elimina os ZEROS antes do ponto
    function ajustar(receber){
        bruto = receber
        convertstring = bruto.toString()
        divide = convertstring.split('.')
        compara = divide[0]
        compara_1 = divide[1]

            if (compara == 0 && typeof(compara_1) == "string" ){
                ajustado = "." + divide[1]

            }else if (compara == 0 && typeof(compara_1) == "undefined" ){
                ajustado = 0

            }else if (compara > 0 && typeof(compara_1) == "undefined" ){
                ajustado = compara

            }else if (compara > 0 && compara_1 > 0 ){
                ajustado = compara + "." + compara_1

            }
    }

    //função que concatena o sinal de + ou - resultado que será impresso
    function sinais(valorFinal, operador, medida){
        if (valorFinal > 0){
            imprime = operador + valorFinal + medida
        } else {
            imprime = valorFinal
        }
    }


    // valores atribuidos aos campos da pre inspeção referentes ao peso
    document.getElementById('cpw1').value = cweight1 + measureselec
    document.getElementById('cpw2').value = cweight2 + measureselec
    document.getElementById('cpw3').value = cweight3 + measureselec
    document.getElementById('cpw4').value = cweight4 + measureselec
    document.getElementById('cpw5').value = 0

    // valores atribuidos aos campos após os ajustes referentes ao peso
    document.getElementById('caw1').value = `${cweight1}` + `${measureselec}`
    document.getElementById('caw2').value = `${cweight2}` + `${measureselec}`
    document.getElementById('caw3').value = `${cweight3}` + `${measureselec}`
    document.getElementById('caw4').value = `${cweight4}` + `${measureselec}`
    document.getElementById('caw5').value = 0

    // valores atribuidos aos campos referentes as difereças aferidas
    document.getElementById('cpe1').value = verror1
    document.getElementById('cpe2').value = verror2
    document.getElementById('cpe3').value = verror3
    document.getElementById('cpe4').value = verror4
    document.getElementById('cpe5').value = 0

    // valores atribuidos aos campos após os ajustes referentes as difereças
    document.getElementById('cae1').value = 0
    document.getElementById('cae2').value = 0
    document.getElementById('cae3').value = 0
    document.getElementById('cae4').value = 0
    document.getElementById('cae5').value = 0
}

//funcao que atribui a data digitada no campo measurement date para o campo data calibration 
function datas(){
    vdata =  window.document.getElementById("data");
    document.getElementById('data1').value = vdata.value;
}


//funcao que oculta os campos relacionados as medidas e certificados quando flegado o campo Unable to calibrate
function verificafleg(){
    controle = window.document.getElementById("comment").value;
    if (controle == ""){
        document.getElementById('comment').value = "Unable to calibrate.";
  
        document.getElementById('ocultar').setAttribute("hidden", "hidden");
        document.getElementById('ocultar1').setAttribute("hidden", "hidden");
        document.getElementById('ocultar2').setAttribute("hidden", "hidden");
        document.getElementById('ocultar3').setAttribute("hidden", "hidden");
        document.getElementById('ocultar4').setAttribute("hidden", "hidden");
        document.getElementById('ocultar5').setAttribute("hidden", "hidden");
        document.getElementById('ocultar6').setAttribute("hidden", "hidden");
        document.getElementById('ocultar7').setAttribute("hidden", "hidden");
        document.getElementById('ocultar8').setAttribute("hidden", "hidden");
        document.getElementById('ocultar9').setAttribute("hidden", "hidden");
        document.getElementById('ocultar10').setAttribute("hidden", "hidden");
        document.getElementById('ocultar11').setAttribute("hidden", "hidden");
        document.getElementById('ocultar12').setAttribute("hidden", "hidden");
        document.getElementById('ocultar13').setAttribute("hidden", "hidden");
        document.getElementById('ocultar14').setAttribute("hidden", "hidden");
        document.getElementById('ocultar15').setAttribute("hidden", "hidden");
        document.getElementById('ocultar16').setAttribute("hidden", "hidden");
        document.getElementById('ocultar17').setAttribute("hidden", "hidden");
        document.getElementById('ocultar18').setAttribute("hidden", "hidden");
        document.getElementById('ocultar19').setAttribute("hidden", "hidden");

    } else if (controle = "Unable to calibrate.") {
        document.getElementById('comment').value = "";
        
        document.getElementById('ocultar').removeAttribute("hidden", "hidden");
        document.getElementById('ocultar1').removeAttribute("hidden", "hidden");
        document.getElementById('ocultar2').removeAttribute("hidden", "hidden");
        document.getElementById('ocultar3').removeAttribute("hidden", "hidden");
        document.getElementById('ocultar4').removeAttribute("hidden", "hidden");
        document.getElementById('ocultar5').removeAttribute("hidden", "hidden");
        document.getElementById('ocultar6').removeAttribute("hidden", "hidden");
        document.getElementById('ocultar7').removeAttribute("hidden", "hidden");
        document.getElementById('ocultar8').removeAttribute("hidden", "hidden");
        document.getElementById('ocultar9').removeAttribute("hidden", "hidden");
        document.getElementById('ocultar10').removeAttribute("hidden", "hidden");
        document.getElementById('ocultar11').removeAttribute("hidden", "hidden");
        document.getElementById('ocultar12').removeAttribute("hidden", "hidden");
        document.getElementById('ocultar13').removeAttribute("hidden", "hidden");
        document.getElementById('ocultar14').removeAttribute("hidden", "hidden");
        document.getElementById('ocultar15').removeAttribute("hidden", "hidden");
        document.getElementById('ocultar16').removeAttribute("hidden", "hidden");
        document.getElementById('ocultar17').removeAttribute("hidden", "hidden");
        document.getElementById('ocultar18').removeAttribute("hidden", "hidden");
        document.getElementById('ocultar19').removeAttribute("hidden", "hidden");
    }
    
    
}