$(document).ready(function(){
	
	$("#slcPais").change(function(){
		if(this.value != ''){
            $("select#slcUF").desativar().children().not(':first').remove();
            $.get('index.php/form/populaestado', {slcPais:this.value}, function(data){
            	var tmp = '';
            	for (var opcao in data) {
            		tmp += '<option value="' + opcao + '">' + data[opcao] + '</option>';
            	}
            	$("select#slcUF").append(tmp).ativar();
            });
		}
	});
	
//	$("#slcUF").change(function(){
//		
//	});
	
	
//	$( "input#txtLocalidade" ).autocomplete({
//		source: "index.php/form/carregalocalidade?uf=19&limit=20",
//		minLength: 2,
//		select: function( event, ui ) {
//			log( ui.item ?
//				"Selected: " + ui.item.value + " aka " + ui.item.id :
//				"Nothing selected, input was " + this.value );
//		}
//	});
//	success: function( data ) {
//		response( $.map( data.geonames, function( item ) {
//			return {
//				label: item.name + (item.adminName1 ? ", " + item.adminName1 : "") + ", " + item.countryName,
//				value: item.name
//			}
//		}));
//	}
	
	//var cache = {},	lastXhr;
	
	$( 'input#txtLocalidade' ).autocomplete({
		minLength: 2,
		source: function( request, response ) {
			
			request.uf = 19;
			request.limit = 20;
			
			$.getJSON( "index.php/form/carregalocalidade", request, function( data, status, xhr ) {
				response( $.map( data.localidades , function( item ) {
							return {
								label: item.value,
								value: item.id
							}
				}));
			});
		}
	});
	
		
});