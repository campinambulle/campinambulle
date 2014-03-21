function FloatToEuroMoney( number ) {
  var number = number.toString(), 
    euros = number.split('.')[0], 
    cents = (number.split('.')[1] || '') + '00';
    
    euros = euros.split('').reverse().join('')
        .replace(/(\d{3}(?!$))/g, '$1 ')
        .split('').reverse().join('');

    return euros + ',' + cents.slice(0, 2);
}

Campinambulle.diplayTotalBottomBar = function() {
  if( $('.checked').length ){
    $('#footer-total').show();
  } else {
    $('#footer-total').hide();
  }
}


Campinambulle.carousel = function() {
  $('.carousel').carousel();
  
  $('.collapse').collapse({
    hide: true,
    toggle: true
  });
  $(document).on(
    'click',
    '.accordion-close',
    function(event) {
        event.preventDefault();
        var parent = $(this).parent().parent(),
            body = parent.find('.accordion-body');
        parent.collapse('toggle');
        parent.on('hidden', function(event) {
            event.stopPropagation();
        });
    }
  );
};

Campinambulle.computePrice = function() {
  var configuration = $('input:checked');
  
  var totalPrice = 0,
      amenagement = '';
  
  for (var i = 0; i < configuration.length; i++) {
    var quantity = $(configuration[i]).next().val(),
        unit_price_item = $(configuration[i]).data('price'),
        total_item = (quantity * unit_price_item );

    totalPrice += total_item;
    amenagement += ' - ' + quantity + ' x ' + FloatToEuroMoney(unit_price_item)  + " € TTC - " + $(configuration[i]).data('title') + ' = ' + FloatToEuroMoney(total_item) + " € TTC \n";
  }
  
  totalPrice = FloatToEuroMoney(totalPrice);

  amenagement += "\n" + 'Prix total: ' + totalPrice + ' € TTC';
  
  $('.prix-total span').html(totalPrice);
  $('#amenagement').val(amenagement);
};

Campinambulle.manageCheckboxStatus = function(self) {
  console.log('manageCheckboxStatus');

  var checkboxClicked = $(self);
  var checkboxClickedStatus = $(self).attr('checked');
  $("input[name='"+checkboxClicked.attr('name')+"']").attr('checked', false);
  checkboxClicked.attr('checked', checkboxClickedStatus);
};

Campinambulle.manageInputQuanty = function(self) {
  var $inputQuantity = $(self),
      $checkboxClicked = $inputQuantity.prev();

  $checkboxClicked.attr('checked', 'checked');
  Campinambulle.highlightRowChecked( $checkboxClicked );
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
    if(Campinambulle.checkRequiredField('#nom') && Campinambulle.checkRequiredField('#ville') && Campinambulle.checkRequiredField('#courriel') && Campinambulle.checkRequiredField('#amenagement')) {
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
  console.log('highlightRowChecked');

  var checkboxClicked = $(self);
  $("input[name='"+checkboxClicked.attr('name')+"']").parents(".product_row").removeClass("checked");

  if(checkboxClicked.attr('checked') == "checked") {
    checkboxClicked.parents(".product_row").addClass("checked");
  } else {
    checkboxClicked.parents(".product_row").removeClass("checked");
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

    $("input[type=checkbox]").click(function(e) {
      Campinambulle.manageCheckboxStatus(this);
      Campinambulle.highlightRowChecked(this);
      Campinambulle.computePrice();
      Campinambulle.diplayTotalBottomBar();
    });
    $("input[type=number]").change(function(e) {
      Campinambulle.manageInputQuanty(this);
      Campinambulle.computePrice();
      Campinambulle.diplayTotalBottomBar();
    });

    Campinambulle.submitContactForm();
  }
};


$("[data-campi-id]").on("click", function(e){
  var hash = $(e.currentTarget).data('campi-id');
  console.log(hash);
  window.location.href = '/configurateur' + hash;
})

function footerScrollSize() {
  var result = $('#configurateur').outerHeight() - $('#configurateur').scrollTop();

  console.log( result );
  return result;
}

$(window).scroll(function(){
   if( footerScrollSize() < 1150 ) {
     $('#footer-total').hide(); 
   } else {
     Campinambulle.diplayTotalBottomBar();
   }
})
