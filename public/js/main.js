$(function() {

  'use strict';

  $('.js-menu-toggle').click(function(e) {

  	var $this = $(this);

  	

  	if ( $('body').hasClass('show-sidebar') ) {
  		$('body').removeClass('show-sidebar');
  		$this.removeClass('active');
  	} else {
  		$('body').addClass('show-sidebar');	
  		$this.addClass('active');
  	}

  	e.preventDefault();

  });

  // click outisde offcanvas
	$(document).mouseup(function(e) {
    var container = $(".sidebar");
    if (!container.is(e.target) && container.has(e.target).length === 0) {
      if ( $('body').hasClass('show-sidebar') ) {
				$('body').removeClass('show-sidebar');
				$('body').find('.js-menu-toggle').removeClass('active');
			}
    }
	}); 

    

});

/*		ADEQUAR ALTURA BODY A SU CONTENIDO */
/*$(document).ready(function(){
    document.body.style.maxHeight = document.documentElement.scrollHeight+'px';
});*/

$(document).ready(function(){
	setTimeout(esconder, 2500);
});

/*		PONER CADA SUBCATEGORIA CON SU FONDO*/
var categorias = document.getElementsByClassName("mostrar_hijo");
for (let i = 0; i < categorias.length; i++) {

	switch (categorias[i].querySelector('p').innerHTML) {
		//DEPORTES
		case 'Baloncesto':
			categorias[i].style.backgroundImage  = "url('img/categorias/basquet.jpg')";
			break;
		case 'Fútbol':
			categorias[i].style.backgroundImage  = "url('img/categorias/futbol.jpg')";
			break;
		case 'Tenis':
			categorias[i].style.backgroundImage  = "url('img/categorias/tenis.jpg')";
			break;
		case 'Ping Pong':
			categorias[i].style.backgroundImage  = "url('img/categorias/pingpong.jpg')";
			break;
		case 'Pádel':
			categorias[i].style.backgroundImage  = "url('img/categorias/padel.jpg')";
			break;
		//MODA
		case 'Zapatos y Complementos':
			categorias[i].style.backgroundImage  = "url('img/categorias/zapatos.jpg')";
			break;
		case 'Sudaderas':
			categorias[i].style.backgroundImage  = "url('img/categorias/sudaderas.jpg')";
			break;
		//JOYERÍA
		case 'Oro':
			categorias[i].style.backgroundImage  = "url('img/categorias/oro.jpg')";
			break;
		case 'Plata':
			categorias[i].style.backgroundImage  = "url('img/categorias/plata.jpg')";
			break;
		//SIN FOTO
		default:
			categorias[i].querySelector('p').style.color = 'black';
	}

}


