
(function (){
    "use strict"

    document.addEventListener('DOMContentLoaded', function(){

        $(function(){


            // menu fijo

            var windowHeight = $(window).height()
            var barraAltura = $(".barra").innerHeight()

            $(window).scroll(function (){
                var scroll = $(window).scrollTop()
                if(scroll > windowHeight){
                    $(".barra").addClass("fixed")
                    
                    $("body").css({"margin-top": barraAltura + "px"})
                }else{
                    $(".barra").removeClass("fixed")
                    $("body").css({"margin-top": "0px"})
                }
            })

            // menu hamburguesa responsive

            $(".menu-movil").on("click", function() {
                $(".navegacion-principal").slideToggle()
            })

            // programa de Conferencias
            $(".programa-evento .info-curso:first").show()
            $(".menu-programa a:first").addClass("activo")

            $(".menu-programa a").on("click", function(){
                $(".menu-programa a").removeClass("activo")
                $(this).addClass("activo")

                $(".ocultar").hide()   
                var enlace =$(this).attr("href")
                $(enlace).fadeIn(1000)

                return false
            })

             //ANIMACIONES PLUGIN - ANIMATE NUMBER
             $(".resumen-evento li:nth-child(1) p").animateNumber({number: 6},1200)
             $(".resumen-evento li:nth-child(2) p").animateNumber({number: 15},1200)
             $(".resumen-evento li:nth-child(3) p").animateNumber({number: 3},1400)
             $(".resumen-evento li:nth-child(4) p").animateNumber({number: 9},1500)

             // CUENTA REGRESIVA PLUGIN - FINAL COUNTDOWN

             $(".cuenta-regresiva").countdown("2020/12/10 09:00:00", function(event){
                $("#dias").html(event.strftime("%D"))
                $("#horas").html(event.strftime("%H"))
                $("#minutos").html(event.strftime("%M"))
                $("#segundos").html(event.strftime("%S"))
             })

            //  COLORBOX

            $(".invitado-info").colorbox({inline:true, width:"50%"})

        })

    })      //DOM CONTENT LOADED
})()

var regalo = document.getElementById("regalo")

// Campos usuarios

var nombre = document.getElementById("nombre")
var apellido = document.getElementById("apellido")
var email = document.getElementById("email")

// campos pases

var pase_dia = document.getElementById("pase_dia")
var pase_2dias = document.getElementById("pase_dosdias")
var pase_completo = document.getElementById("pase_completo")

//botones y divs

var calcular = document.getElementById("calcular")
var erroDiv = document.getElementById("error")
var botonRegistro = document.getElementById("btnRegistro")
var lista_productos = document.getElementById("lista_productos")
var suma = document.getElementById("suma-total")

// extras

var etiquetas = document.getElementById("etiquetas")
var camisas = document.getElementById("camisa_evento")

// EVENTOS
if(document.getElementById("calcular")){

calcular.addEventListener("click", calcularMontos)

pase_dia.addEventListener("blur", mostrarDias)
pase_2dias.addEventListener("blur", mostrarDias)
pase_completo.addEventListener("blur", mostrarDias)


nombre.addEventListener("blur",validarCampos)
apellido.addEventListener("blur",validarCampos)
email.addEventListener("blur",validarCampos)
    
function validarCampos(){
   
    if(this.value == ""){
        erroDiv.style.display = "block"
        erroDiv.innerHTML = "este campo es obligatorio"
        this.style.border = "1px solid red"
        erroDiv.style.color = "red"
    }else{
        erroDiv.style.display = "none"
        this.style.border = "1px solid #cccccc"
    }
}
 
function calcularMontos(event) {
    event.preventDefault()

    if (regalo.value === "") {
        alert("debes elegir algún regalo")
        regalo.focus()
    } else {
        var boletosDia = pase_dia.value
        boletos2Dias = pase_2dias.value
        boletoCompleto = pase_completo.value
        cantCamisas = camisas.value
        cantEtiquetas = etiquetas.value
        totalPagar = parseFloat(((boletosDia * 30.000) + (boletos2Dias * 45.000) + (boletoCompleto * 50.000) + (cantCamisas * 10.000) + (cantEtiquetas * 2.000)) - (cantCamisas * 0.07))



        var listadoProductos = []

        if (boletosDia >= 1) {
            listadoProductos.push(boletosDia + " pases por día")
        }
        if (boletos2Dias >= 1) {
            listadoProductos.push(boletos2Dias + " pases por 2 días")
        }
        if (boletoCompleto >= 1) {
            listadoProductos.push(boletoCompleto + " pases completo")
        }
        if (cantCamisas >= 1) {
            listadoProductos.push(cantCamisas + " camisas")
        }
        if (cantEtiquetas >= 1) {
            listadoProductos.push(cantEtiquetas + " Etiquetas")
        }
        lista_productos.style.display = "block"

        lista_productos.innerHTML = '';
        for (var i = 0; i < listadoProductos.length; i++) {
            lista_productos.innerHTML += listadoProductos[i] + '<br/>'
        }
        suma.innerHTML = "$" + totalPagar.toFixed(2)

    }
}

function mostrarDias(){
    var boletosDia = pase_dia.value
        boletos2Dias = pase_2dias.value
        boletoCompleto = pase_completo.value

        var diasElegidos = []

        if(boletosDia >= 1 ){
            diasElegidos.push("viernes")
        }
        if(boletos2Dias >= 1){
            diasElegidos.push("viernes", "sabado")
        }
        if(boletoCompleto >= 1){
            diasElegidos.push("viernes","sabado","domingo")
        }
        for(var i = 0; i < diasElegidos.length; i++){
            document.getElementById(diasElegidos[i]).style.display = "block"
        }
}

}
