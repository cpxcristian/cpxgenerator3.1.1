function getTableList(param) {
	var parametros = {
		"database": param,
		"module": $(".modulename").val()
	};
	
	$.ajax({
		data: parametros,
		url: 'BD/gettablelist_BD.php',
		crossDomain: false,
		type: 'POST',
		dataType: 'json',
		success: function(result) {
			$(".page-content").html(result);
		}
	});
}
/*
function selectAllTables() {
	var checkAll = true;
	$(".tableList tbody input[type=checkbox]").each(function() {
		if($(this).attr("checked") == false) {
			return;
		}
	});
	
	$(".tableList tbody input[type='checkbox']").attr("checked", checkAll);
}*/


function exportSelectedTables() {
	$.ajax({
		data: $("form[name='tableList']").serialize(),
		url: 'BD/exporttables_BD.php',
		crossDomain: false,
		type: 'POST',
		dataType: 'json',
		success: function(result) {
			if(result == true) {
				$(".page-content").html("Modulos generados correctamente");
			}
		}
	});
}
