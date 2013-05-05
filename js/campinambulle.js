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
  var commentaires = '';
  
  for (var i = 0; i < configuration.length; i++) {
    totalPrice += $(configuration[i]).data('price');
    commentaires += '- ' + $(configuration[i]).parent().text().trim() + ' ' + $(configuration[i]).parents('.row').find('.prix').text().trim() + "\n";
  }
  
  commentaires += "\n" + 'Prix : ' + totalPrice + ' € TTC' + "\n";
  
  $('.prix-total span').html(totalPrice);
  $('#commentaires').val(commentaires);
};

Campinambulle.manageCheckboxStatus = function(self) {
  var checkboxClicked = $(self);
  var checkboxClickedStatus = $(self).attr('checked');
  $("input[name='"+checkboxClicked.attr('name')+"']").attr('checked', false);
  checkboxClicked.attr('checked', checkboxClickedStatus);
};

Campinambulle.checkRequiredField = function(fieldId) {
  $(fieldId).parents('.control-group').removeClass('error');
  if($(fieldId).val() == '') {
    $(fieldId).parents('.control-group').addClass('error');
    return false;
  } else {
    return true;
  }
};

Campinambulle.submitContactForm = function() {
  $('#devis').submit(function() {
    if(Campinambulle.checkRequiredField('#nom') && Campinambulle.checkRequiredField('#prenom') 
      && Campinambulle.checkRequiredField('#courriel') && Campinambulle.checkRequiredField('#commentaires')) {
      $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: $(this).serialize(),
        success: function() {
          $('#devis').html('<div id="confirmation" class="spaceT40 center">Merci. Nous vous ferons parvenir votre confirmation de commande à nous retourner signée pour accord afin de concrétiser votre projet.</div>')
        }
      });
    }
    
    return false;
  });
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
    Campinambulle.submitContactForm();
  }
};
