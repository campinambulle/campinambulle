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

Campinambulle.manageCheckboxStatus = function(self) {
  var checkboxClicked = $(self);
  var checkboxClickedStatus = $(self).attr('checked');
  $("input[name='"+checkboxClicked.attr('name')+"']").attr('checked', false);
  checkboxClicked.attr('checked', checkboxClickedStatus);
};

Campinambulle.highlightRowChecked = function(self) {
  var checkboxClicked = $(self);
  $("input[name='"+checkboxClicked.attr('name')+"']").parents(".row").removeClass("checked");
  if(checkboxClicked.attr('checked') == "checked") {
    checkboxClicked.parents(".row").addClass("checked");
  } else {
    checkboxClicked.parents(".row").removeClass("checked");
  }
};

Campinambulle.init = function() {
  Campinambulle.carousel();
  
  if($("#configurateur").length) {
    Campinambulle.computePrice();
    $("input").click(function(e) {
      Campinambulle.manageCheckboxStatus(this);
      Campinambulle.highlightRowChecked(this);
      Campinambulle.computePrice();
    });
  }
};
