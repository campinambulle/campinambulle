Campinambulle.carousel = function() {
  $('.carousel').carousel();
  
  $('.collapse').collapse({
    hide: true,
    toggle: true
  });
};

Campinambulle.computePrice = function() {
  var configuration = $('input:checked');
  
  var totalPrice = 0;
  var mail = 'mailto:bonjour@campinambulle.com?body=';
  
  for (var i = 0; i < configuration.length; i++) {
    totalPrice += $(configuration[i]).data('price');
    mail += '- ' + $(configuration[i]).parent().text().trim() + ' ' + $(configuration[i]).parents('.row').find('.prix').text() + '%0d%0a';
  }
  
  mail += '%0d%0a' + 'Prix : ' + totalPrice + ' € TTC'
  
  $('.prix-total span').html(totalPrice);
  $('.contact a').attr('href', mail);
};

Campinambulle.init = function() {
  Campinambulle.carousel();
  
  Campinambulle.computePrice();
  $("input").click(function(){
    Campinambulle.computePrice();
  });
};
