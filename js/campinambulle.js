Campinambulle.carousel = function() {
  $('.carousel').carousel();
  
  $('.collapse').collapse({
    hide: true,
    toggle: true
  });
};

Campinambulle.computePrice = function() {
  var totalPrice = 0;
  var configuration = $('input:checked');
  
  for (var i = 0; i < configuration.length; i++) {
    totalPrice += $(configuration[i]).data('price');
  }
  
  $('.prix-total span').html(totalPrice);
};

Campinambulle.init = function() {
  Campinambulle.carousel();
  
  Campinambulle.computePrice();
  $("input").click(function(){
    Campinambulle.computePrice();
  });
};
