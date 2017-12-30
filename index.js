/**
* Module Dependencies
*/
//var $= require('jquery'); //correr Jquery con browserify


$(document).ready(function() {


    var info=$('.get-started').find('#information')
    info.append("<p>Con ToPayWeb podras calcular el precio de tu web</p>")
    
     $('.get-started').find('p').fadeIn(1000);
     saludar();
}
)


function saludarPersonalizada(){
    alertify.prompt('ToPayWeb'
    ,'ToPayWeb Quiere saber tu nombre',' '
    ,function (evt,value) {
    localStorage['name']=value;
     alertify.success("Bienvenido a ToPayWeb " + " " + localStorage['name'])
     alertify.success("Para poder acceder al servicio tienes que registrate")
   },function() {
        alertify.success("Bienvenido a ToPayWeb")
   })

}

function saludar() {
  alertify.success('Bienvenido a ToPayWeb');
}








