<!--
var grid = $("#tabGrid");

grid.jqGrid({
   	url:"local",
	datatype: "xml",
	mtype: "POST",
	sortable: true,
	height: 400,
	width: 960,
	shrinkToFit: false,
	forceFit: false,
	autowidth: false,
	colNames: ['Coluna 1','Coluna 2','Coluna 3','Coluna 4','Coluna 5','Coluna 6'],
	colModel: [
	           {name:'coluna1', index:'coluna1'},
	           {name:'coluna2', index:'coluna2'},
	           {name:'coluna3', index:'coluna3'},
	           {name:'coluna4', index:'coluna4'},
	           {name:'coluna5', index:'coluna5'},
	           {name:'coluna6', index:'coluna6'}
	   		  ],
	sortname: "coluna1",
	sortorder: "asc",
	loadui: "block",
	pager: '#gridPager',
	viewrecords: true,
	multiselect: false,
	rowNum: "20",
	rowList:[20,30,50,100],
	caption: "Modelo de Grid"
});

grid.jqGrid('navGrid','#gridPager',{add:false,edit:false,del:false});
grid.jqGrid('navButtonAdd','#gridPager',{
    caption: "",
    title: "Reordenar Colunas",
    onClickButton : function (){
        grid.jqGrid('columnChooser');
    }
});
//-->