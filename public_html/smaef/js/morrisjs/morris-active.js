// Dashboard 1 Morris-chart

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
        xkey: 'period',
        ykeys: ['Python', 'PHP', 'Java'],
    labels: ['Português', 'Matemática', 'Biologia'],
        pointSize: 0,
        fillOpacity: 0.99,
        pointStrokeColors:['#FF9F1C', '#2EC4B6 ', '#011627'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth:0,
        hideHover: 'auto',
        lineColors: ['#FF9F1C', '#2EC4B6 ', '#011627'],
        resize: true
        
    });
	
Morris.Area({
        element: 'extra-area-chart',
        data: [{
            period: '2010',
            CSE: 50,
            Accounting: 80,
            Electrical: 20
        }, {
            period: '2011',
            CSE: 130,
            Accounting: 100,
            Electrical: 80
        }, {
            period: '2012',
            CSE: 80,
            Accounting: 60,
            Electrical: 70
        }, {
            period: '2013',
            CSE: 70,
            Accounting: 200,
            Electrical: 140
        }, {
            period: '2014',
            CSE: 180,
            Accounting: 150,
            Electrical: 140
        }, {
            period: '2015',
            CSE: 105,
            Accounting: 100,
            Electrical: 80
        },
         {
            period: '2016',
            CSE: 250,
            Accounting: 150,
            Electrical: 200
        }],
        xkey: 'period',
        ykeys: ['CSE', 'Accounting', 'Electrical'],
        labels: ['Computação', 'Contabilidade', 'Elétrica'],
        pointSize: 3,
        fillOpacity: 0,
        pointStrokeColors:['#011627', '#2EC4B6', '#FF9F1C'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 1,
        hideHover: 'auto',
        lineColors: ['#011627', '#2EC4B6', '#FF9F1C'],
        resize: true
        
    });