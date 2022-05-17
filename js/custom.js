var $ = jQuery.noConflict();

document.addEventListener('wpcf7submit',function(event){
  var status=event.detail.status;
  //console.log(status);
  var button=$('.wpcf7-submit[disabled]');
  var old_value=button.attr('data-value');
  button.prop('disabled',false);
  button.val(old_value);
},false);

$('form.wpcf7-form').on('submit',function(){
  var form=$(this);
  var formid=form.attr('id');
  var button=form.find('input[type=submit]');
  var buttonid=button.attr('id');
  var current_val=button.val();
  $('input#'+buttonid).attr('data-value',current_val);
  $('input#'+buttonid).prop("disabled",true);
  $('input#'+buttonid).val("Enviando...");
});

function filtrar() {
  // Obtener el ID del boton clickeado
  let claseboton = event.srcElement.id
  let botones = document.getElementsByClassName('boton-filtro');
  for (let d = 0; d < botones.length; d++) {
    botones[d].classList.remove("filtrado")
  }

  // Ocultar todos los eventos
  let elements = document.getElementsByClassName('item-evento');
  for (let i = 0; i < elements.length; i++) {
      elements[i].classList.add("hidden")
  }

  // Mostrar todos los eventos de la clase del boton clickeado
  document.getElementById(claseboton).classList.add("filtrado")
  let elementsclass = document.getElementsByClassName(claseboton);    
  for (let c = 0; c < elementsclass.length; c++) {
    elementsclass[c].classList.remove("hidden")
    elementsclass[c].classList.add("show")
  }
}

function showall() {
  let botones = document.getElementsByClassName('boton-filtro');
  for (let d = 0; d < botones.length; d++) {
    botones[d].classList.remove("filtrado")
  }  

  let claseboton = event.srcElement.id
  document.getElementById(claseboton).classList.add("filtrado")  

  botonvermas = document.getElementById("ver-mas-eventos")
  if (botonvermas) {
    botonvermas.classList.add('hidden')
  }
  
  let elements = document.getElementsByClassName('item-evento');
  for (let i = 0; i < elements.length; i++) {
      elements[i].classList.remove("hidden")
      elements[i].classList.add("show")
  }
}

function verMasEvento() {
  botonvermas = document.getElementById("ver-mas-eventos")
  if (botonvermas) {
    botonvermas.classList.add('hidden')
  }
  
  let elements = document.getElementsByClassName("item-evento")
  for (let i = 0; i < elements.length; i++) {
      elements[i].classList.remove("hidden")
      elements[i].classList.add("show")
  }    

}   

$('#slider-ponentes').slick({
  dots:true,
  slidesToShow: 1,
  slidesToScroll: 1,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 2500,
  arrows: true,
  fade: true,
  responsive: [
      {
          breakpoint: 991,
          settings: { 
            arrows: false,                    
          }
      },          
  ] 
});

$('.slider-relacionados').slick({
  dots:false,
  slidesToShow: 4,
  slidesToScroll: 4,
  infinite: true,
  autoplay: false,
  autoplaySpeed: 5000,
  arrows: false,
  dots: true, 
  responsive: [
      {
          breakpoint: 1360,
          settings: {                           
            slidesToShow: 3,
            slidesToScroll: 3                  
          }
      },
      {
          breakpoint: 960,
          settings: {                           
            slidesToShow: 2,
            slidesToScroll: 2                   
          }
      },        
      {
          breakpoint: 468,
          settings: {                                         
            slidesToShow: 1,
            slidesToScroll: 1                   
          }
      }            
  ]   
});

$('.slider-filtros').slick({
  dots:false,
  slidesToShow: 4,
  slidesToScroll: 1,
  infinite: false,
  autoplay: false,
  autoplaySpeed: 5000,
  arrows: true,
  dots: false, 
  responsive: [
      {
          breakpoint: 1360,
          settings: {                           
            slidesToShow: 3,
            slidesToScroll: 1                   
          }
      },
      {
          breakpoint: 960,
          settings: {                           
            slidesToShow: 2,
            slidesToScroll: 1                   
          }
      },        
      {
          breakpoint: 468,
          settings: {                                         
            slidesToShow: 1,
            slidesToScroll: 1                   
          }
      }            
  ]   
});

/*DESLIZAR AL HREF DEL BOTON*/
$('a.go-to').click(function() {
  if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
    var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
    if (target.length) {
      $('html,body').animate({
        scrollTop: target.offset().top
      }, 150);
      return false;
    }
  }
});   

/*
$(window).scroll(function(){
    if($(window).scrollTop() > 180){
      $('#cabecera-site').addClass('menu-fijo')
    } else {
      $('#cabecera-site').removeClass('menu-fijo')
    }
}) */

  function userNew() {
    document.getElementById('NOMBRES_PROSPECTO').value = ""
    document.getElementById('APATERNO_PROSPECTO').value = ""
    document.getElementById('AMATERNO_PROSPECTO').value = ""
    document.getElementById('DNI_PROSPECTO').value = ""
    document.getElementById('CELULAR_PROSPECTO').value = ""
    document.getElementById('CORREO_PROSPECTO').value = ""
    document.getElementById('ANIO_ESTUDIOS').value = ""  
    document.getElementById('CODIGO_CARRERA').value = ""      

    document.getElementById('user-old').classList.remove('active')
    document.getElementById('user-new').classList.add('active')    

    document.getElementById('content-campo-NOMBRES_PROSPECTO').classList.remove("hidden")
    document.getElementById('content-campo-APATERNO_PROSPECTO').classList.remove("hidden")
    document.getElementById('content-campo-AMATERNO_PROSPECTO').classList.remove("hidden")
    document.getElementById('content-campo-CELULAR_PROSPECTO').classList.remove("hidden")
    document.getElementById('content-campo-ANIO_ESTUDIOS').classList.remove("hidden")
    document.getElementById('content-campo-CODIGO_CARRERA').classList.remove("hidden")    
    document.getElementById('flex-campos').classList.remove("flex-column-reverse")    
  }

  function userOld() {

    document.getElementById('NOMBRES_PROSPECTO').value = localStorage.getItem('NOMBRES_PROSPECTO')
    document.getElementById('APATERNO_PROSPECTO').value = localStorage.getItem('APATERNO_PROSPECTO')
    document.getElementById('AMATERNO_PROSPECTO').value = localStorage.getItem('AMATERNO_PROSPECTO')
    document.getElementById('DNI_PROSPECTO').value = localStorage.getItem('DNI_PROSPECTO')
    document.getElementById('CELULAR_PROSPECTO').value = localStorage.getItem('CELULAR_PROSPECTO')
    document.getElementById('CORREO_PROSPECTO').value = localStorage.getItem('CORREO_PROSPECTO')
    document.getElementById('ANIO_ESTUDIOS').value = localStorage.getItem('ANIO_ESTUDIOS')  
    document.getElementById('CODIGO_CARRERA').value = localStorage.getItem('CODIGO_CARRERA')      

    document.getElementById('content-campo-NOMBRES_PROSPECTO').classList.add("hidden")
    document.getElementById('content-campo-APATERNO_PROSPECTO').classList.add("hidden")
    document.getElementById('content-campo-AMATERNO_PROSPECTO').classList.add("hidden")
    document.getElementById('content-campo-CELULAR_PROSPECTO').classList.add("hidden")
    document.getElementById('content-campo-ANIO_ESTUDIOS').classList.add("hidden")
    document.getElementById('content-campo-CODIGO_CARRERA').classList.add("hidden")
    document.getElementById('flex-campos').classList.add("flex-column-reverse")

    document.getElementById('user-old').classList.add('active')
    document.getElementById('user-new').classList.remove('active')
  }
      
  document.addEventListener( 'wpcf7mailsent', function( event ) {
    var inputs = event.detail.inputs;

    // CARGAR DATA ENVIADA DEL FORM A LOCALSTORAGE
    for ( var i = 0; i < inputs.length; i++ ) {
      if ( 'NOMBRES_PROSPECTO' == inputs[i].name ) {
        localStorage.setItem('NOMBRES_PROSPECTO', inputs[i].value)
        //break;
      }
      if ( 'APATERNO_PROSPECTO' == inputs[i].name ) {
        localStorage.setItem('APATERNO_PROSPECTO', inputs[i].value)
      }     
      if ( 'AMATERNO_PROSPECTO' == inputs[i].name ) {
        localStorage.setItem('AMATERNO_PROSPECTO', inputs[i].value)
      }       
      if ( 'DNI_PROSPECTO' == inputs[i].name ) {
        localStorage.setItem('DNI_PROSPECTO', inputs[i].value)
      }  
      if ( 'CELULAR_PROSPECTO' == inputs[i].name ) {
        localStorage.setItem('CELULAR_PROSPECTO', inputs[i].value)
      }  
      if ( 'CORREO_PROSPECTO' == inputs[i].name ) {
        localStorage.setItem('CORREO_PROSPECTO', inputs[i].value)
      }             
      if ( 'ANIO_ESTUDIOS' == inputs[i].name ) {
        localStorage.setItem('ANIO_ESTUDIOS', inputs[i].value)
      }  
      if ( 'CODIGO_CARRERA' == inputs[i].name ) {
        localStorage.setItem('CODIGO_CARRERA', inputs[i].value)
      }        
      if ( 'SLUG_CATEGORIA' == inputs[i].name ) {
        localStorage.setItem('SLUG_CATEGORIA', inputs[i].value)
      } 
      if ( 'POSTSINGLE' == inputs[i].name ) {
        localStorage.setItem('POSTSINGLE', inputs[i].value)
      }             
    }

    // REDIRECCIONAR A PAGINA DE GRACIAS
    location = urlredirect
    
  }, false );

  if (selectEventos !== '') {
    const selectElement = document.querySelector('#CARRERA_INTERES');
    // LLENAR CAMPOS SEGUN SELECCIONEMOS EN EL COMBO EVENTOS
    selectElement.onchange = (e) => {
      const [option] = e.target.selectedOptions
      opcion = option.dataset.indice // obtenemos el indice del option para obtener los valores

      // CAMPOS PARA POSTS RELACIONADOS EN PAGINA DE GRACIAS
      document.querySelector('#SLUG_CATEGORIA').value = listEventos[opcion]['cat_slug']
      document.querySelector('#POSTSINGLE').value = listEventos[opcion]['idPost']

      // CAMPO CONTADOR DE LEADS
      document.querySelector('#TEXTO').value = listEventos[opcion]['contador'] + 1
      
    // CAMPOS PARA CALENDAR GOOGLE
      document.querySelector('#NOMBRE_EVENTO').value = listEventos[opcion]['titulo']
      document.querySelector('#FECHA_EVENTO').value = listEventos[opcion]['new_start_date']
      document.querySelector('#FECHA_EVENTO_FINAL').value = listEventos[opcion]['new_end_date']
      document.querySelector('#HORA_EVENTO').value = listEventos[opcion]['new_start_time']
      document.querySelector('#HORA_EVENTO_FINAL').value = listEventos[opcion]['new_end_time']   

      document.querySelector('#TEXTO_GRACIAS_EVENTO').value = listEventos[opcion]['texto_gracias_evento']
      // FECHA Y HORA MAIL SUCIRPCION A EVENTO
      document.querySelector('#SET_FECHA_EVENTO').value = listEventos[opcion]['start_date']
      document.querySelector('#SET_HORA_EVENTO').value = listEventos[opcion]['start_time']

      // CAMPOS CRM
      document.querySelector('#campo_zoom').value = listEventos[opcion]['zoom']
      document.querySelector('#campo_1').value = listEventos[opcion]['campo_1']
      document.querySelector('#campo_2').value = listEventos[opcion]['campo_2']
      document.querySelector('#campo_3').value = listEventos[opcion]['campo_3']
      document.querySelector('#campo_4').value = listEventos[opcion]['campo_4']      
    }     
  }