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
        
        <script src="https://code.highcharts.com/highcharts-more.js"></script>
        <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
        
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            #containerSecound,
            .highcharts-data-table table {
                min-width: 350px;
                max-width: 800px;
                margin: 1em auto;
            }

            #containerSecound {
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
        
            <figure class="highcharts-figure">
                <div id="containerSecound"></div>
            </figure>
        

        <script>
            
            /**
                 * In the chart render event, add icons on top of the circular shapes
                 */
                function renderIcons() {

                this.series.forEach(series => {
                    if (!series.icon) {
                        series.icon = this.renderer
                            .text(
                                `<i class="fa fa-${series.options.custom.icon}"></i>`,
                                0,
                                0,
                                true
                            )
                            .attr({
                                zIndex: 10
                            })
                            .css({
                                color: series.options.custom.iconColor,
                                fontSize: '1.5em'
                            })
                            .add(this.series[2].group);
                    }
                    series.icon.attr({
                        x: this.chartWidth / 2 - 15,
                        y: this.plotHeight / 2 -
                            series.points[0].shapeArgs.innerR -
                            (
                                series.points[0].shapeArgs.r -
                                series.points[0].shapeArgs.innerR
                            ) / 2 +
                            8
                    });
                });
                }

                const trackColors = Highcharts.getOptions().colors.map(color =>
                new Highcharts.Color(color).setOpacity(0.3).get()
                );

            Highcharts.chart('containerSecound', {

                chart: {
                    type: 'solidgauge',
                    height: '60%',
                    events: {
                        render: renderIcons
                    }
                },

                title: {
                    text: 'Multiple KPI gauge',
                    style: {
                        fontSize: '24px'
                    }
                },

                tooltip: {
                    borderWidth: 0,
                    backgroundColor: 'none',
                    shadow: false,
                    style: {
                        fontSize: '16px'
                    },
                    valueSuffix: '%',
                    pointFormat: '{series.name}<br>' +
                        '<span style="font-size: 2em; color: {point.color}; ' +
                        'font-weight: bold">{point.y}</span>',
                    positioner: function (labelWidth) {
                        return {
                            x: (this.chart.chartWidth - labelWidth) / 2,
                            y: (this.chart.plotHeight / 2) + 15
                        };
                    }
                },

                pane: {
                    startAngle: 0,
                    endAngle: 360,
                    background: [{ // Track for Feedback
                        outerRadius: '62%',
                        innerRadius: '38%',
                        backgroundColor: trackColors[2],
                        borderWidth: 0
                    }]
                },

                yAxis: {
                    min: 0,
                    max: 100,
                    lineWidth: 0,
                    tickPositions: []
                },

                plotOptions: {
                    solidgauge: {
                        dataLabels: {
                            enabled: false
                        },
                        linecap: 'round',
                        stickyTracking: false,
                        rounded: true
                    }
                },

                series: [{
                    name: 'COMMON',
                    data: [{
                        color: Highcharts.getOptions().colors[0],
                        radius: '62%',
                        innerRadius: '38%',
                        y: 50
                    }],
                    custom: {
                        icon: 'commenting-o',
                        iconColor: '#303030'
                    }
                }]
            });



        </script>
    </body>
</html>
