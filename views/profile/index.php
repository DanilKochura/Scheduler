<div id="wrapper">
    <?php include ROOT.'views/inc/sidebar.php';
		?>
    <main class="w-100">
        <div class="container p-3 py-4">
            <h2>Статистика</h2>
            <?php $stat = $user->getChartsstatistics();?>
<!--            <canvas id="byObject" class="chartjs" data-custom="customChartJs"></canvas>-->
            <!--<script>

                var customChartJs = {
                    type: 'line',
                    data: {
                        labels: <?php /*='["'.implode('","',$stat[4]).'"]'*/?>,
                        datasets: [
                            {
                                label: 'Завершено',
                                data: <?php /*='["'.implode('","',$stat[2]).'"]'*/?>,

                                pointHoverRadius: 4,
                                pointHoverBorderWidth: 12,
                                pointBackgroundColor:			 '#004d00',
                                pointBorderColor:					 'rgba(133, 145, 255, 0)',
                                pointHoverBackgroundColor:	'rgba(133, 145, 255, 0)',
                                pointHoverBorderColor:			'rgba(133, 145, 255, 0)',
                                borderWidth: 0,

                                borderColor:								'rgba(133, 145, 255, 0)',
                            },
                            {
                                label: 'Добавлено',
                                data: <?php /*='["'.implode('","',$stat[0]).'"]'*/?>,

                                pointHoverRadius: 4,
                                pointHoverBorderWidth: 12,
                                pointBackgroundColor:			 'rgba(133, 133, 145, 0)',
                                pointBorderColor:					 'rgba(133, 145, 255, 0)',
                                pointHoverBackgroundColor:	'rgba(133, 145, 255, 0)',
                                pointHoverBorderColor:			'rgba(133, 145, 255, 0)',
                                borderWidth: 0,


                                borderColor:								'rgb(133, 145, 255, 0)',

                                // categoryPercentage: 0.35,
                                // barPercentage: 0.70,
                                // categoryPercentage: 0.6, // bar width adjust
                                // barPercentage: 1,				// bar width adjust

                            },
                            {
                                label: 'Взято в работу',
                                data: <?php /*='["'.implode('","',$stat[1]).'"]'*/?>,

                                pointHoverRadius: 4,
                                pointHoverBorderWidth: 12,
                                pointBackgroundColor:			 'rgba(133, 133, 145, 0)',
                                pointBorderColor:					 'rgba(133, 145, 255, 0)',
                                pointHoverBackgroundColor:	'rgba(133, 145, 255, 0)',
                                pointHoverBorderColor:			'rgba(133, 145, 255, 0)',
                                borderWidth: 0,

                                borderColor:								'rgb(133, 145, 255, 0)',
                            },

                        ]
                    },

                    options: {
                        responsive: true,



                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: false,
                                    labelString: 'Month'
                                },
                                ticks: {
                                    display: true,
                                    beginAtZero: true,
                                    fontColor: '#999999',
                                    fontSize: 13,
                                    padding: 10
                                },
                                display: true,
                                gridLines: false,
                            }],

                            yAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: false,
                                    labelString: 'Value'
                                },

                                gridLines: {
                                    color:							'#dddddd',
                                    borderDash:				 [2, 3],
                                    zeroLineBorderDash: [2, 3],
                                    zeroLineWidth: 1,
                                },

                                ticks: {
                                    max:						<?php /*=$stat[3]+1*/?>,
                                    stepSize:			 1,
                                    display:				true,
                                    beginAtZero:		true,
                                    fontColor:			'#999999',
                                    fontSize:			 13,
                                    padding:				10
                                }
                            }]
                        },

                        title: {
                            display: false,
                            text: 'Legend Position: top'
                        },


                        tooltips: {
                            enabled: true,
                            intersect: false,
                            mode: 'nearest',
                            bodySpacing: 5,
                            yPadding: 10,
                            xPadding: 15,
                            caretPadding: 0,
                            displayColors: false,
                            backgroundColor: '#121212',
                            titleFontColor: '#ffffff',
                            cornerRadius: 4,
                            footerSpacing: 0,
                            titleSpacing: 0
                        },

                        layout: {
                            padding: {
                                left:	 0,
                                right:	0,
                                top:		0,
                                bottom: 0
                            }
                        }
                    }
                };
            </script>-->
					<div>
						<canvas id="myChart"></canvas>
					</div>

					<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!---->
					<script>
// <!---->
						const DATA_COUNT = 7;
						const NUMBER_CFG = {count: DATA_COUNT, min: -100, max: 100};
<!---->
					const labels = <?php echo '["'.implode('","',$stat[4]).'"]'?>;
						const data = {
							labels: labels,
							datasets: [
								{
									label: 'Выполнено',
									data: <?='["'.implode('","',$stat[2]).'"]'?>,
									borderColor: 'green',
									cubicInterpolationMode: 'monotone',
									tension: 1
								},
								{
									label: 'Взято в работу',
									data: <?='["'.implode('","',$stat[1]).'"]'?>,
									borderColor: 'grey',
									cubicInterpolationMode: 'monotone',
									tension: 1
								},
								{
									label: 'Добавлено',
									data: <?='["'.implode('","',$stat[0]).'"]'?>,
									borderColor: 'blue',
									cubicInterpolationMode: 'monotone',
									tension: 1
								}
							]
						};
						const config = {
							type: 'line',
							data: data,
							options: {
								responsive: true,



								scales: {
									xAxes: [{
										display: true,
										scaleLabel: {
											display: false,
											labelString: 'Month'
										},
										ticks: {
											display: true,
											beginAtZero: true,
											fontColor: '#999999',
											fontSize: 13,
											padding: 10
										},
										display: true,
										gridLines: false,
									}],

									yAxes: [{
										display: true,
										scaleLabel: {
											display: false,
											labelString: 'Value'
										},

										gridLines: {
											color:							'#dddddd',
											borderDash:				 [2, 3],
											zeroLineBorderDash: [2, 3],
											zeroLineWidth: 1,
										},

										ticks: {
											max:						<?=$stat[3]+1?>,
											stepSize:			 1,
											display:				true,
											beginAtZero:		true,
											fontColor:			'#999999',
											fontSize:			 13,
											padding:				10
										}
									}]
								},

								title: {
									display: false,
									text: 'Legend Position: top'
								},


								tooltips: {
									enabled: true,
									intersect: false,
									mode: 'nearest',
									bodySpacing: 5,
									yPadding: 10,
									xPadding: 15,
									caretPadding: 0,
									displayColors: false,
									backgroundColor: '#121212',
									titleFontColor: '#ffffff',
									cornerRadius: 4,
									footerSpacing: 0,
									titleSpacing: 0
								},

								layout: {
									padding: {
										left:	 0,
										right:	0,
										top:		0,
										bottom: 0
									}
								}
							}
						};
						const ctx = document.getElementById('myChart');
						new Chart(ctx, config);
					</script>
        </div>
    </main>
</div>