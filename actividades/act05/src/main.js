
function getDatos()
{
    var nombre = prompt("Nombre: ", "");

    var edad = prompt("Edad: ", 0);

    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3> Nombre: '+nombre+'</h3>';

    var div2 = document.getElementById('edad');
    div2.innerHTML = '<h3> Edad: '+edad+'</h3>';
}

//Funcion 1
function holaMundo() {
    var holaMundo = document.getElementById('hola-mundo');
    holaMundo.innerHTML = '<p>Hola Mundo</p>';
}

//Funcion 2
function variables(){
    var nombre = 'Juan';
    var edad = 10;
    var altura = 1.92;
    var casado = false;

    var resultado = nombre + '<br>' + 
                   edad + '<br>' + 
                   altura + '<br>' + 
                   casado;
    
    var variables = document.getElementById('variables');
    variables.innerHTML = resultado;
}

//Funcion 3
function entradaDatos(){
    var nombre;
    var edad;
    nombre = prompt('Ingresa tu nombre:', '');
    edad = prompt('Ingresa tu edad:', '');
    
    var datos = 'Hola ' + nombre + ' así que tienes ' + edad + ' años';
    document.getElementById('datos').innerHTML = datos;
}

//Funcion 4
function sumaProducto(){
    var valor1;
    var valor2;
    valor1 = prompt('Introducir primer número:', '');
    valor2 = prompt('Introducir segundo número:', '');
    var suma = parseInt(valor1)+parseInt(valor2);
    var producto = parseInt(valor1)*parseInt(valor2);

    var resultado = 'La suma es '+suma + '<br>' + 'El producto es '+producto;

    document.getElementById('resultado').innerHTML = resultado;
}

//Funcion 5
function calificacion(){
    var nombre;
    var nota;
    nombre = prompt('Ingresa tu nombre:','');
    nota = prompt('Ingresa tu nota:', '');

    if(nota >=4){
        var aprobado = nombre + 'esta aprobado con un '+nota;
        document.getElementById('aprobado').innerHTML = aprobado;
    }
    else{
        var aprobado = nombre + ' no esta aprobado ';
        document.getElementById('aprobado').innerHTML = aprobado;
    }
}

//Funcion 6
function numMayor(){
    var num1, num2;
    num1 = prompt('Ingresa el primer número:', '');
    num2 = prompt('Ingresa el segundo número:', '');

    num1 = parseInt(num1);
    num2 = parseInt(num2)

    if (num1 > num2){
        var numeroMayor = 'El mayor es ' + num1;
        document.getElementById('numero-mayor').innerHTML = numeroMayor;
    }
    else{
        var numeroMayor = 'El mayor es ' + num2;
        document.getElementById('numero-mayor').innerHTML = numeroMayor;
    }

}

//Funcion 7
function calificacionTresCondiciones(){
    var nota1, nota2, nota3;

    nota1 = prompt('Ingresa 1ra. nota:', '');
    nota2 = prompt('Ingresa 2da. nota:', '');
    nota3 = prompt('Ingresa 3ra. nota:', '');

    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);

    var pro;
    pro = (nota1+nota2+nota3)/3;

    var  resultado;

    if (pro>=7){
        resultado = 'Aprobado';
    }
    else{
        if (pro>=4){
            resultado = 'Regular';
        }
        else{
            resultado = 'Reprobado';
        }
    }

    document.getElementById('calificacion-tres-condiciones').innerHTML = resultado;

}

//Funcion 8
function numRango(){
    var valor;

    valor = prompt('Ingresar un valor comprendido entre 1 y 5:', '');

    valor = parseInt(valor);

    var resultado;
    switch(valor){
        case 1 : resultado = 'uno';
                break;
        case 2 : resultado = 'dos';
                break;
        case 3 : resultado = 'tres';
                break;
        case 4 : resultado = 'cuatro';
                break;
        case 5 : resultado = 'cinco';
                break;
        default: resultado = 'Debe ingresar un valor comprendido entre 1 y 5';
    }
        document.getElementById('numero-rango').innerHTML = resultado;
}

//Funcion 9
function pintarVentana(){
    var col;

    col = prompt('Ingresa el color con que quieras pintar el fondo de ventana (rojo, verde, azul)', '');

    switch(col){
        case 'rojo': document.body.style.backgroundColor = '#b57575ff';
                    break;
        case 'verde': document.body.style.backgroundColor = '#7dcd7dff';
                    break;
        case 'azul': document.body.style.backgroundColor = '#2121d7ff';
                    break;
        default:    
        document.getElementById('pintar-ventana').innerHTML = 'Color no válido';

    }
}

//Funcion 10
function imprimirNum(){
    var x;
    x = 1;

    var resultado = '';
    while (x<=100){
        resultado += x + '<br>';        
        x=x+1;
    }
    document.getElementById('imprimir-num').innerHTML = resultado;
}

//Funcion 11
function sumaCincoNum(){
    var x=1;
    var suma =0;
    var valor;

    while(x<=5){
        valor = prompt('Ingresa el valor:', '');
        valor = parseInt(valor);
        suma = suma+valor;
        x = x+1;
    }
    document.getElementById('suma').innerHTML = 'La suma de los valores: '+suma+'<br>';
}

//Funcion 12
function numeroDigitos(){
    var valor;
    
    do {
        valor = prompt('Ingresa un valor entre 0 y 999:', '');
        valor = parseInt(valor);
        
        var resultado = 'El valor ' + valor + ' tiene ';
        
        if (valor < 10) {
            resultado += '1 dígito';
        } else if (valor < 100) {
            resultado += '2 dígitos';
        } else {
            resultado += '3 dígitos';
        }
        
        var nuevoElemento = document.createElement('div');
        nuevoElemento.innerHTML = resultado;
        document.getElementById('contar-digitos').appendChild(nuevoElemento);
        
    } while(valor != 0);

}

//Funcion 13
function contadorFor(){
    var f;
    var resultado = ' ';
    
    for(f=1;f<=10;f++)
    {
        resultado += f + ' ';
    }

    document.getElementById('contador-for').innerHTML= resultado;
}

//Funcion 14
function imprimirMensaje(){
    var resultado = "Cuidado<br>Ingresa tu documento correctamente<br>";
    resultado += "Cuidado<br>Ingresa tu documento correctamente<br>";
    resultado += "Cuidado<br>Ingresa tu documento correctamente<br>";
    
    document.getElementById('imprimir-mensaje').innerHTML = resultado;
}

//Funcion 15
function imprimirMensajeFuncion(){
    var resultado = '';
    
    function mostrarMensaje(){
        resultado += 'Cuidado<br>Ingresa tu documento correctamente<br>';
    }
    
    mostrarMensaje();
    mostrarMensaje();
    mostrarMensaje();
    
    document.getElementById('imprimir-mensaje-funcion').innerHTML = resultado;
}

//Funcion 16
function mostrarNumRango(){
    function mostrarRango(x1,x2){
        var resultado = '';
        var inicio;
    
        for(inicio = x1; inicio <= x2; inicio++) {
            resultado += inicio + ' ';
        }
        
        document.getElementById('rango-numeros').innerHTML = resultado;
    }

    var valor1 = prompt('Ingresa el valor inferior:', '');
    valor1 = parseInt(valor1);
    
    var valor2 = prompt('Ingresa el valor superior:', '');
    valor2 = parseInt(valor2);
    
    mostrarRango(valor1, valor2);
}

//Funcion 17
function mostrarNombreNum(){
    function converirCastellano(x){
        if(x==1){
            return 'uno';
        }
        else{
            if(x==2){
                return 'dos';
            }
            else{
                if(x==3){
                    return'tres';
                }
                else{
                    if(x==4){
                        return'cuatro';
                    }
                    else{
                        if(x==5){
                            return 'cinco';
                        }else{
                            return 'valor incorrecto';
                        }
                    }
                }
            }
        }
    }

    var valor = prompt('Ingresa un valor entre 1 y 5', '');
    valor = parseInt(valor);

    var r = converirCastellano(valor);
    document.getElementById('nombre-numero').innerHTML = r;
}

//Funcion 18
function mostrarNombreNumSwitch(){
    function converirCastellano2(x){
        switch (x){
            case 1: return 'uno';
            case 2: return 'dos';
            case 3: return 'tres';
            case 4: return 'cuatro';
            case 5: return 'cinco';
            default: return 'valor incorrecto';
        }
    }

    var valor = prompt('Ingresa un valor entre 1 y 5', '');
    valor = parseInt(valor);

    var r = converirCastellano2(valor);
    document.getElementById('nombre-numero2').innerHTML = r;
}