$(document).ready(function(){
	$("#pesquisa").keyup(function(){
		var pesquisa = $(this).val();
		if (pesquisa != '') {
			var dados = {
				palavra: pesquisa
			}
			$.post('confirma.php', dados, function(retorna){
				$(".resultado").html(retorna);
			});
		}else{
			$(".resultado").empty().html(dados);
		}
	});
});