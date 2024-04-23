<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Highcharts</title>

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            #containerFirst,
            .highcharts-data-table table {
                min-width: 350px;
                max-width: 800px;
                margin: 1em auto;
            }

            #containerFirst {
                height: 450px;
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
        <div style="height:300px">
            <figure class="highcharts-figure">
                <div id="containerFirst"></div>
            </figure>
        </div>
       

        <script>
            Highcharts.chart('containerFirst', {
                chart: {
                    type: 'area'
                },
                title: {
                    text: 'Greenhouse gases from Norwegian economic activity',
                    align: 'left'
                },
                subtitle: {
                    text: 'Source: ' +
                        '<a href="https://www.ssb.no/en/statbank/table/09288/"' +
                        'target="_blank">SSB</a>',
                    align: 'left'
                },
                yAxis: {
                    title: {
                        useHTML: true,
                        text: 'Million tonnes CO<sub>2</sub>-equivalents'
                    }
                },
                tooltip: {
                    shared: true,
                    headerFormat: '<span style="font-size:12px"><b>{point.key}</b></span><br>'
                },
                plotOptions: {
                    series: {
                        pointStart: 2019
                    },
                    area: {
                        stacking: 'normal',
                        lineColor: '#666666',
                        lineWidth: 1,
                        marker: {
                            lineWidth: 1,
                            lineColor: '#666666'
                        }
                    }
                },
                series: [
                {
                    name: 'Ocean transport',
                    data: [3234, 2729, 11533, 17798,13234, 12729, 11533, 17798]
                }, {
                    name: 'Construction',
                    data: [22019, 12189, 15150, 22217,12019, 42189, 12150, 12217]
                }]
            });
        </script>
    </body>
</html>
