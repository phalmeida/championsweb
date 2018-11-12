<?php if ( ! defined('ABSPATH')) exit; ?>





<!DOCTYPE html>

<html lang="pt-br">



<head>

    <title>Games Vila</title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">



    <!-- Bootstrap Core CSS -->

    <link href="<?php echo HOME_URI;?>/views/_css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->

    <link href="<?php echo HOME_URI;?>/views/_css/sistsalon.css" rel="stylesheet">



    <!-- Custom Fonts -->

    <link href="<?php echo HOME_URI;?>/views/_fontes/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">





    <style type="text/css">

        .div_ajax {

            width: 600px;

            height: 600px;

        }

        .loader {

            display: none;

            float: left;

        }



		.table-striped-column > tbody > tr td:nth-of-type(odd) {

		  background-color: #f9f9f9;

		}

		

    </style>



    <!-- JavaScript -->  

    <script type="text/javascript" src="<?php echo HOME_URI;?>/views/_js/jquery.min.js"></script>    

    <script type="text/javascript" src="<?php echo HOME_URI;?>/views/_js/bootstrap.min.js"></script>



    <style>

        body {

            margin: 40px 10px;

            padding: 0;

            font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;

            font-size: 14px;

        }

        .fc th {

            padding: 10px 0px;

            vertical-align: middle;

            background:#F2F2F2;

        }

        .fc-day-grid-event>.fc-content {

            padding: 4px;

        }

        #calendar {

            max-width: 900px;

            margin: 0 auto;

        }

        .error {

            color: #ac2925;

            margin-bottom: 15px;

        }

        .event-tooltip {

            width:150px;

            background: rgba(0, 0, 0, 0.85);

            color:#FFF;

            padding:10px;

            position:absolute;

            z-index:10001;

            -webkit-border-radius: 4px;

            -moz-border-radius: 4px;

            border-radius: 4px;

            cursor: pointer;

            font-size: 11px;

        }

    </style>


  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-51555133-2', 'auto');
    ga('send', 'pageview');

  </script> 


</head>



<body>

