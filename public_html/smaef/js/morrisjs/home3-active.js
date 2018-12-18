(function ($) {
 "use strict";
 Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2012',
            Python: 0,
            PHP: 0,
            Java: 0
        }, {
            period: '2013',
            Python: 100,
            PHP: 80,
            Java: 65
        }, {
            period: '2014',
            Python: 180,
            PHP: 150,
            Java: 120
        }, {
            period: '2015',
            Python: 100,
            PHP: 70,
            Java: 40
        }, {
            period: '2016',
            Python: 180,
            PHP: 150,
            Java: 120
        }, {
            period: '2017',
            Python: 100,
            PHP: 70,
            Java: 40
        },
         {
            period: '2018',
            Python: 180,
            PHP: 150,
            Java: 120
        }],
        xkey: 'Período',
        ykeys: ['Português', 'Matemática', 'Biologia'],
        labels: ['Português', 'Matemática', 'Biologia'],
        pointSize: 0,
        fillOpacity: 0.95,
        pointStrokeColors:['#FF9F1C', '#2EC4B6 ', '#011627'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth:0,
        hideHover: 'auto',
        lineColors: ['#FF9F1C', '#2EC4B6 ', '#011627'],
        resize: true
        
    });
	
Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2006',
            Sale: 100,
            Rent: 90,
            c: 60
        }, {
            y: '2007',
            Sale: 75,
            Rent: 65,
            c: 40
        }, {
            y: '2008',
            Sale: 50,
            Rent: 40,
            c: 30
        }, {
            y: '2009',
            Sale: 75,
            Rent: 65,
            c: 40
        }, {
            y: '2010',
            Sale: 50,
            Rent: 40,
            c: 30
        }, {
            y: '2011',
            Sale: 75,
            Rent: 65,
            c: 40
        },{
            y: '2012',
            Sale: 75,
            Rent: 65,
            c: 40
        },{
            y: '2013',
            Sale: 75,
            Rent: 65,
            c: 40
        },{
            y: '2014',
            Sale: 75,
            Rent: 65,
            c: 40
        },{
            y: '2015',
            Sale: 75,
            Rent: 65,
            c: 40
        },{
            y: '2016',
            Sale: 100,
            Rent: 90,
            c: 40
        }],
        xkey: 'y',
        ykeys: ['Vendas', 'Retenção', 'c'],
        labels: ['Computação', 'Contabilidade', 'Elétrica'],
        barColors:['#011627', '#2EC4B6', '#FF9F1C'],
        hideHover: 'auto',
         barSizeRatio:0.45,
        gridLineColor: '#eef0f2',
        resize: true
    });

	
	
})(jQuery); 