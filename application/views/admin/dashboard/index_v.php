
<div class="h-full flex flex-auto flex-col justify-between">
<!-- Content start -->
<main class="h-full">
	<div class="page-container relative h-full flex flex-auto flex-col px-4 sm:px-6 md:px-8 py-4 sm:py-6">
		<div class="flex flex-col gap-4 h-full">
			<div class="lg:flex items-center justify-between mb-4 gap-3">
				<div class="mb-4 lg:mb-0">
					<h3>최근 10일간 대리팡 일일 방문자수</h3>
				</div>
			</div>
			<div class="card card-border">
				<div class="card-body">
					<div id="chart_1" class="main-chart mb-10"></div>
					<div class="table-box">
						<table>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>
			</div>

			

		</div>  
	</div>
</main>


<script>

	//chart_1
	var option = {
		legend: {
			position: "top",
		},
		series: [
			{
				name: "일일 방문자수",
				data: [<?php echo implode(",", $date_val_arr); ?>],
				color: '#10B981'
			},
		],
          chart: {
          type: 'bar',
		  width: '100%',
          height: 350
        },
		responsive: [{
			breakpoint: 768,
			options: {
				chart: {
					width: '100%',
					height: 250,
				},
			},
		}],
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded',
			dataLabels: {
              position: 'top'
            },
          },
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: [<?php echo implode(",", $date_arr); ?>],
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "" + val + " 명"
            }
          }
        },
		dataLabels: {
          enabled: false,
          
        },
        };

        var chart_1 = new ApexCharts(document.querySelector("#chart_1"), option);
        chart_1.render();

	
</script>