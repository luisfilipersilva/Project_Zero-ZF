$(document).ready(function(){
// Menu
	$("#btnCarregarAjax").click(function(){
	    carregarAjax("index.php/index/indexdois", "Get", "#divMoldura");
	});
	$("#btnSlideShow").click(function(){
	    carregarAjax("index.php/slideshow/slideshow", "Get", "#divMoldura");
	});
	$("#btnUpload").click(function(){
	    carregarAjax("index.php/uploadfile/uploadfile", "Get", "#divMoldura");
	});
	$("#btnForm").click(function(){
	    carregarAjax("index.php/form/exemploform", "Get", "#divMoldura");
	});
	$("#btnGrid").click(function(){
	    carregarAjax("index.php/grid/grid", "Get", "#divMoldura");
	});
	$("#btnPHP_info").click(function(){
	    carregarAjax("index.php/index/phpinfo", "Get", "#divMoldura");
	});
	
/* 
    $('.js-enabled').memu({ 
    	icon: {
    		inset: true,		// create an inset where there is no icon
    		margin: {		// specify the margins of the icon (put them how it's right for you
    			top: 4,
    			right: 10
    		}
    	},
    	width: 150,			// the width of the (drop down) items
    	rootWidth: 75,			// the width of the (root) items
    	height: 25			// the height of the items
    });
 */
    
// Fim Menu

});