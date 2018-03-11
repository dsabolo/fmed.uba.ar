jQuery(document).ready(function(){

  /**
   * Menu Ppal Iconos
   */

  /*jQuery('#main-navigation ul.menu li:nth-child(1) a.sf-depth-1').html('<i class="glyphicon glyphicon-home"></i>'+jQuery('#main-navigation ul.menu li:nth-child(1) a').html());
  jQuery('#main-navigation ul.menu li:nth-child(2) a.sf-depth-1').html('<i class="glyphicon glyphicon-book"></i>'+jQuery('#main-navigation ul.menu li:nth-child(2) a').html());
  jQuery('#main-navigation ul.menu li:nth-child(3) a.sf-depth-1').html('<i class="glyphicon glyphicon-user"></i>'+jQuery('#main-navigation ul.menu li:nth-child(3) a').html());
  jQuery('#main-navigation ul.menu li:nth-child(4) a.sf-depth-1').html('<i class="glyphicon glyphicon-education"></i>'+jQuery('#main-navigation ul.menu li:nth-child(4) a').html());
  jQuery('#main-navigation ul.menu li:nth-child(5) a.sf-depth-1').html('<i class="glyphicon glyphicon-lock"></i>'+jQuery('#main-navigation ul.menu li:nth-child(5) a').html());
  jQuery('#main-navigation ul.menu li:nth-child(6) a.sf-depth-1').html('<i class="glyphicon glyphicon-chevron-right"></i>'+jQuery('#main-navigation ul.menu li:nth-child(6) a').html());
  jQuery('#main-navigation ul.menu li:nth-child(7) a.sf-depth-1').html('<i class="glyphicon glyphicon-earphone"></i>'+jQuery('#main-navigation ul.menu li:nth-child(7) a').html());
*/



  /**
   * Gestion de colores en el sitio
   */

  var titleSection = jQuery('#customTitle');
  titleSection.html('<span>'+titleSection.html()+'</span>');

  //Imagenes de fondo para los títulos
  console.log(titleSection.attr('data-bg'));
  if(titleSection.attr('data-bg')){
    titleSection.css('background','url('+titleSection.attr('data-bg')+')');

  }

  //Colores para la sección
  if(titleSection.attr('data-color')){
    titleSection.css('background-color',titleSection.attr('data-color'));
    jQuery('#header').css('border-bottom-color',titleSection.attr('data-color'));
    jQuery('#main-content a').css('color',titleSection.attr('data-color'));
    jQuery('#main-content *').css('border-color',titleSection.attr('data-color'));
    jQuery('#toTop').css('color',titleSection.attr('data-color'));
    jQuery('#customTitle span').css('background',titleSection.attr('data-color'));
    jQuery('#sidebar-second h2.title').css('background',titleSection.attr('data-color'));

  }

});
