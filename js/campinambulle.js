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
  var amenagement = '';
  
  for (var i = 0; i < configuration.length; i++) {
    totalPrice += $(configuration[i]).data('price');
    amenagement += '- ' + $(configuration[i]).parent().text().trim() + ' ' + $(configuration[i]).parents('.row').find('.prix').text().trim() + "\n";
  }
  
  amenagement += "\n" + 'Prix : ' + totalPrice + ' € TTC';
  
  $('.prix-total span').html(totalPrice);
  $('#amenagement').val(amenagement);
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
    if(Campinambulle.checkRequiredField('#nom') && Campinambulle.checkRequiredField('#adresse') && Campinambulle.checkRequiredField('#codepostal') 
      && Campinambulle.checkRequiredField('#ville') && Campinambulle.checkRequiredField('#courriel') && Campinambulle.checkRequiredField('#amenagement')) {
      $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: $(this).serialize(),
        success: function() {
          $('#devis').html('<div id="confirmation" class="spaceT40 center">Votre formulaire a bien été envoyé. <br />Vous serez contacté dans les 48 h par l\'équipe de Campinambulle. <br /> <a href="../" class="btn spaceT40">Retour sur le site de Campinambulle</a></div>')
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

Campinambulle.focusImage = function() {
  $(".fancybox").fancybox({
    openEffect : 'elastic',
    closeEffect	: 'elastic',
    helpers : {
      title : {
        type : 'outside'
      }
    }
  });
};

Campinambulle.init = function() {
  Campinambulle.carousel();
  
  if($("#configurateur").length) {
    Campinambulle.focusImage();
    Campinambulle.computePrice();
    $("input").click(function(e) {
      Campinambulle.manageCheckboxStatus(this);
      Campinambulle.highlightRowChecked(this);
      Campinambulle.computePrice();
    });
    Campinambulle.submitContactForm();
  }
};
