$(document).ready(function (){


$(document).on('submit', '#form1', function(event){

      event.preventDefault();
      var dados = $(this).serialize();

      $.ajax({

      url: 'deletarCarrinho.php',
      type: 'POST',
      dataType: 'html',
      data: dados,
      success: function(data){
        $('#resultado').empty().html(data);
      }


    });

    });

});

$(document).ready(function(){
$("#sendbox").on("submit", function(e){

  e.preventDefault();

  var formId = $(this).serialize();

  $.ajax({
    url: "pagamento.php",
    type: "POST",
    data: formId,
    success: function(data){
      alert("aee");
    },
    error: function(){
      alert("error");
    }

  });

  });
});

