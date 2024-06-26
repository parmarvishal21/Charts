<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Highcharts</title>

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            #container {
                height: 400px;
            }

            .highcharts-figure,
            .highcharts-data-table table {
                min-width: 310px;
                max-width: 800px;
                margin: 1em auto;
            }

            .highcharts-data-table table {
                font-family: Verdana, sans-serif;
                border-collapse: collapse;
                border: 1px solid #ebebeb;
                margin: 10px auto;
                text-align: center;
                width: 100%;
                max-width: 500px;
            }

            .highcharts-data-table caption {
                padding: 1em 0;
                font-size: 1.2em;
                color: #555;
            }

            .highcharts-data-table th {
                font-weight: 600;
                padding: 0.5em;
            }

            .highcharts-data-table td,
            .highcharts-data-table th,
            .highcharts-data-table caption {
                padding: 0.5em;
            }

            .highcharts-data-table thead tr,
            .highcharts-data-table tr:nth-child(even) {
                background: #f8f8f8;
            }

            .highcharts-data-table tr:hover {
                background: #f1f7ff;
            }


        </style>
    </head>
    <body>
        
        <figure class="highcharts-figure">
            <div id="containerFifth"></div>
        </figure>


        <script>
            // Retrieved from https://www.ssb.no/jord-skog-jakt-og-fiskeri/jakt
            Highcharts.chart('containerFifth', {
                chart: {
                    type: 'areaspline'
                },
                title: {
                    text: 'Moose and deer hunting in Norway, 2000 - 2021',
                    align: 'left'
                },
                subtitle: {
                    text: 'Source: <a href="https://www.ssb.no/jord-skog-jakt-og-fiskeri/jakt" target="_blank">SSB</a>',
                    align: 'left'
                },
                legend: {
                    layout: 'vertical',
                    align: 'left',
                    verticalAlign: 'top',
                    x: 120,
                    y: 70,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor:
                        Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
                },
                xAxis: {
                    plotBands: [{ // Highlight the two last years
                        from: 2019,
                        to: 2020,
                        color: 'rgba(68, 170, 213, .2)'
                    }]
                },
                yAxis: {
                    title: {
                        text: 'Quantity'
                    }
                },
                tooltip: {
                    shared: true,
                    headerFormat: '<b>Hunting season starting autumn {point.x}</b><br>'
                },
                credits: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        pointStart: 2000
                    },
                    areaspline: {
                        fillOpacity: 0.5
                    }
                },
                series: [{
                    name: 'Moose',
                    data:
                        [
                            38000,
                            37300,
                            37892,
                            38564,
                            36770,
                            36026,
                            34978,
                            35657,
                            35620,
                            35971,
                            36409,
                            36435,
                            34643,
                            34956,
                            33199,
                            31136,
                            30835,
                            31611,
                            30666,
                            30319,
                            31766
                        ]
                }, {
                    name: 'Deer',
                    data:
                        [
                            22534,
                            23599,
                            24533,
                            25195,
                            25896,
                            27635,
                            29173,
                            32646,
                            35686,
                            37709,
                            39143,
                            36829,
                            35031,
                            36202,
                            35140,
                            33718,
                            37773,
                            42556,
                            43820,
                            46445,
                            50048
                        ]
                }]
            });
        </script>
    </body>
</html>
