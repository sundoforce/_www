// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Area Chart Example
var area_day = $.trim($('.area_graph_day').text());
var area_revenue = $.trim($('.area_graph_revenue').text());

if(area_day && area_revenue){
	var ctx = document.getElementById("myAreaChart");
	var myLineChart = new Chart(ctx, {
	  type: 'line',
	  data: {
	    labels: JSON.parse(area_day),
	    datasets: [{
	      label: "Earnings",
	      lineTension: 0.3,
	      backgroundColor: "rgba(78, 115, 223, 0.05)",
	      borderColor: "rgba(78, 115, 223, 1)",
	      pointRadius: 3,
	      pointBackgroundColor: "rgba(78, 115, 223, 1)",
	      pointBorderColor: "rgba(78, 115, 223, 1)",
	      pointHoverRadius: 3,
	      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
	      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
	      pointHitRadius: 10,
	      pointBorderWidth: 2,
	      data: JSON.parse(area_revenue),
	    }],
	  },
	  options: {
	    maintainAspectRatio: false,
	    layout: {
	      padding: {
	        left: 10,
	        right: 25,
	        top: 25,
	        bottom: 0
	      }
	    },
	    scales: {
	      xAxes: [{
	        time: {
	          unit: 'date'
	        },
	        gridLines: {
	          display: false,
	          drawBorder: false
	        },
	        ticks: {
	          maxTicksLimit: 7
	        }
	      }],
	      yAxes: [{
	        ticks: {
	          min : 0,
	          maxTicksLimit: 5,
	          padding: 10,
	          // Include a dollar sign in the ticks
	          callback: function(value, index, values) {
	            return '$' + number_format(value);
	          }
	        },
	        gridLines: {
	          color: "rgb(234, 236, 244)",
	          zeroLineColor: "rgb(234, 236, 244)",
	          drawBorder: false,
	          borderDash: [2],
	          zeroLineBorderDash: [2]
	        }
	      }],
	    },
	    legend: {
	      display: false
	    },
	    tooltips: {
	      backgroundColor: "rgb(255,255,255)",
	      bodyFontColor: "#858796",
	      titleMarginBottom: 10,
	      titleFontColor: '#6e707e',
	      titleFontSize: 14,
	      borderColor: '#dddfeb',
	      borderWidth: 1,
	      xPadding: 15,
	      yPadding: 15,
	      displayColors: false,
	      intersect: false,
	      mode: 'index',
	      caretPadding: 10,
	      callbacks: {
	        label: function(tooltipItem, chart) {
	          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
	          return datasetLabel + ': $ ' + tooltipItem.yLabel;
	        }
	      }
	    }
	  }
	});
}

// Pie Chart Example
function gender_piechart() {
	var gender_female = $('.female').text();
	var gender_male = $('.male').text();
	if(gender_male && gender_female) {
		var ctx = document.getElementById("myPieChart");
		var myPieChart = new Chart(ctx, {
		  type: 'doughnut',
		  data: {
		    labels: ["Female", "Male"],
		    datasets: [{
		      data: [gender_female, gender_male],
		      backgroundColor: ['#EA526F', '#4e73df'],
		      hoverBackgroundColor: ['#ef4263', '#2e59d9'],
		      hoverBorderColor: "rgba(234, 236, 244, 1)",
		    }],
		  },
		  options: {
		    maintainAspectRatio: false,
		    tooltips: {
		      backgroundColor: "rgb(255,255,255)",
		      bodyFontColor: "#858796",
		      borderColor: '#dddfeb',
		      borderWidth: 1,
		      xPadding: 15,
		      yPadding: 15,
		      displayColors: false,
		      caretPadding: 10,
		      callbacks: {
				label: function(tooltipItem, chart) {
			      if(tooltipItem.index == "0"){
			      	var chartindex = "1";
			      } else {
			      	var chartindex = "0";
			      }
			      return chart.labels[chartindex] + ' : ' + chart.datasets[0]['data'][tooltipItem.index] + '%';
				}
		      }
		    },
		    legend: {
		      display: false
		    },
		    cutoutPercentage: 80,
		  },
		});
	}
}

// Bar Chart Example
var maledata = $.trim($('.maledata').text());
if(maledata)
{
	var ctx = document.getElementById("myBarChart");
	var myBarChart = new Chart(ctx, {
	  type: 'bar',
	  data: {
	    labels: ["18-24", "25-34", "35-44", "45-54", "55-64", "65+"],
	    datasets: [{
	      label: "Percent",
	      backgroundColor: "#4e73df",
	      hoverBackgroundColor: "#2e59d9",
	      borderColor: "#4e73df",
	      data: JSON.parse(maledata),
	    }],
	  },
	  options: {
	    maintainAspectRatio: false,
	    layout: {
	      padding: {
	        left: 10,
	        right: 25,
	        top: 25,
	        bottom: 0
	      }
	    },
	    scales: {
	      yAxes: [{
	        ticks: {
	          min: 0,
	          // Include a dollar sign in the ticks
	          callback: function(value, index, values) {
	            return number_format(value) + '%';
	          }
	        },
	        gridLines: {
	          color: "rgb(234, 236, 244)",
	          zeroLineColor: "rgb(234, 236, 244)",
	          drawBorder: false,
	          borderDash: [2],
	          zeroLineBorderDash: [2]
	        }
	      }],
	    },
	    legend: {
	      display: false
	    },
	    tooltips: {
	      titleMarginBottom: 10,
	      titleFontColor: '#6e707e',
	      titleFontSize: 16,
	      backgroundColor: "rgb(255,255,255)",
	      bodyFontColor: "#858796",
	      borderColor: '#dddfeb',
	      borderWidth: 1,
	      xPadding: 15,
	      yPadding: 15,
	      displayColors: false,
	      caretPadding: 10,
	      callbacks: {
	        label: function(tooltipItem, chart) {
	          return number_format(tooltipItem.yLabel) + '%';
	        }
	      }
	    },
	  }
	});
}

// Bar Chart Example
var femaledata = $.trim($('.femaledata').text());
if(femaledata)
{
	var ctx = document.getElementById("myBarChart2");
	var myBarChart = new Chart(ctx, {
	  type: 'bar',
	  data: {
	    labels: ["18-24", "25-34", "35-44", "45-54", "55-64", "65+"],
	    datasets: [{
	      label: "Percent",
	      backgroundColor: "#EA526F",
	      hoverBackgroundColor: "#ef4263",
	      borderColor: "#EA526F",
	      data: JSON.parse(femaledata),
	    }],
	  },
	  options: {
	    maintainAspectRatio: false,
	    layout: {
	      padding: {
	        left: 10,
	        right: 25,
	        top: 25,
	        bottom: 0
	      }
	    },
	    scales: {
	      yAxes: [{
	        ticks: {
	          min: 0,
	          // Include a dollar sign in the ticks
	          callback: function(value, index, values) {
	            return number_format(value) + '%';
	          }
	        },
	        gridLines: {
	          color: "rgb(234, 236, 244)",
	          zeroLineColor: "rgb(234, 236, 244)",
	          drawBorder: false,
	          borderDash: [2],
	          zeroLineBorderDash: [2]
	        }
	      }],
	    },
	    legend: {
	      display: false
	    },
	    tooltips: {
	      titleMarginBottom: 10,
	      titleFontColor: '#6e707e',
	      titleFontSize: 16,
	      backgroundColor: "rgb(255,255,255)",
	      bodyFontColor: "#858796",
	      borderColor: '#dddfeb',
	      borderWidth: 1,
	      xPadding: 15,
	      yPadding: 15,
	      displayColors: false,
	      caretPadding: 10,
	      callbacks: {
	        label: function(tooltipItem, chart) {
	          return number_format(tooltipItem.yLabel) + '%';
	        }
	      }
	    },
	  }
	});
}


// Bar Chart Example
var totaldata = $.trim($('.totaldata').text());
if(totaldata)
{
	var ctx = document.getElementById("myBarChart3");
	var myBarChart = new Chart(ctx, {
	  type: 'bar',
	  data: {
	    labels: ["18-24", "25-34", "35-44", "45-54", "55-64", "65+"],
	    datasets: [{
	      label: "Percent",
	      backgroundColor: "#1cc88a",
	      hoverBackgroundColor: "#17a673",
	      borderColor: "#4e73df",
	      data: JSON.parse(totaldata),
	    }],
	  },
	  options: {
	    maintainAspectRatio: false,
	    layout: {
	      padding: {
	        left: 10,
	        right: 25,
	        top: 25,
	        bottom: 0
	      }
	    },
	    scales: {
	      yAxes: [{
	        ticks: {
	          min: 0,
	          // Include a dollar sign in the ticks
	          callback: function(value, index, values) {
	            return number_format(value) + '%';
	          }
	        },
	        gridLines: {
	          color: "rgb(234, 236, 244)",
	          zeroLineColor: "rgb(234, 236, 244)",
	          drawBorder: false,
	          borderDash: [2],
	          zeroLineBorderDash: [2]
	        }
	      }],
	    },
	    legend: {
	      display: false
	    },
	    tooltips: {
	      titleMarginBottom: 10,
	      titleFontColor: '#6e707e',
	      titleFontSize: 16,
	      backgroundColor: "rgb(255,255,255)",
	      bodyFontColor: "#858796",
	      borderColor: '#dddfeb',
	      borderWidth: 1,
	      xPadding: 15,
	      yPadding: 15,
	      displayColors: false,
	      caretPadding: 10,
	      callbacks: {
	        label: function(tooltipItem, chart) {
	          return number_format(tooltipItem.yLabel) + '%';
	        }
	      }
	    },
	  }
	});
}

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Table Data range 
$('#dateSubmit').on('click', function() {
	
	$('.text-daterange .start_log').text($.trim($('.input-daterange .start_date').val()));
	$('.text-daterange .end_log').text($.trim($('.input-daterange .end_date').val()));
	
	var that = $(this);
	var start_date = $('.text-daterange .start_log').text();
	var end_date = $('.text-daterange .end_log').text();
	var page_cnt = $('.text-daterange .page_cnt').text();
	
	that.html('<i class="fas fa-redo fa-spin text-primary"></i>');
	
   $.ajax({
        type: "POST",
        url: g5_admin_url+"/analytics/ajax.ga.php",
        data: {
			"start_date": start_date,
			"end_date": end_date,
			"page_cnt": page_cnt,
			"sort" : "table"
		},
        dataType: "json",
        success: function(data) {
        	that.html('Submit');
        	$('#dataTable').DataTable().clear().destroy();
        	$('#dataTable tbody').empty().html(data);
        	$('#dataTable').DataTable({
				"order": []
		    });
        },
		error:function(request, status, error){
			that.html('Submit');
		    alert("Error. Retry Please");
		}
    });

});

// Table Gender Button
$(document).on("click",".btnGender",function(){
	var start_date = $.trim($('.text-daterange .start_log').text());
	var end_date = $.trim($('.text-daterange .end_log').text());
	$(this).html('<i class="fas fa-redo fa-spin text-primary"></i>');
    $.ajax({
        type: "POST",
        url: g5_admin_url+"/analytics/ajax.ga.php",
        data: {
			"start_date": start_date,
			"end_date": end_date,
			"sort" : "gender"
		},
        dataType: "json",
        success: function(data) {
        	$('.dataTable .btnGender').addClass('text-gray-300').text('No Data');
			$(data).each(function(index) {
				$('.dataTable tbody tr td a[href*="' + this['path'] + '"]').parent().parent().find('.btnGender').removeClass('text-gray-300').addClass('text-primary');
				$('.dataTable tbody tr td a[href*="' + this['path'] + '"]').parent().parent().find('.btnGender').text(this['male'] + '% : ' + this['female'] + '%');
			});
        },
        error:function(request, status, error){
		    alert("잠시 후 재시도 해주세요.");
		}
    });

});

// Table Age Button
$(document).on("click",".btnAge",function(){
	var start_date = $.trim($('.input-daterange .start_date').val());
	var end_date = $.trim($('.input-daterange .end_date').val());
	$(this).html('<i class="fas fa-redo fa-spin text-primary"></i>');
	
    $.ajax({
        type: "POST",
        url: g5_admin_url+"/analytics/ajax.ga.php",
        data: {
			"start_date": start_date,
			"end_date": end_date,
			"sort" : "age"
		},
        dataType: "json",
        success: function(data) {
        	$('.dataTable .btnAge').addClass('text-gray-300').text('No Data');
			$(data).each(function(index) {
				$('.dataTable tbody tr td a[href*="' + this['path'] + '"]').parent().parent().find('.btnAge').removeClass('text-gray-300').addClass('text-primary text-xs');
				$('.dataTable tbody tr td a[href*="' + this['path'] + '"]').parent().parent().find('.btnAge').html(this['html']);
			});
        }
    });

});

// Table Gender Button
$(document).on("click",".gender_today, .gender_yesterday, .gender_week",function(){

	if($(this).text() == "Today"){
		start_date = "today";
		end_date = "today";
	} else if($(this).text() == "Yesterday"){
		start_date = "1daysAgo";
		end_date = "1daysAgo";
	} else if($(this).text() == "Week"){
		start_date = "6daysAgo";
		end_date = "today";
	}
	$('#myPieChart').remove();
	$('.chart-pie').html('<i class="fas fa-redo fa-spin text-primary text-big-rotate"></i>');
   
    $.ajax({
        type: "POST",
        url: g5_admin_url+"/analytics/ajax.ga.php",
        data: {
			"start_date": start_date,
			"end_date": end_date,
			"sort" : "gender_range"
		},
        dataType: "json",
        success: function(data) {
        	$('.chart-pie').html('<canvas id="myPieChart"></canvas>');
        	$('.gender_data').html(data);
			gender_piechart();	        	
        }
    });
    
});	

// DatePicker
$('.input-daterange').datepicker({
	todayHighlight: true,
	autoclose: true,
    format: "yyyy-mm-dd",
    language : "ko",
    container : $('.datepicker-container'),
    orientation: 'top' 
});
	
$(document).ready(function() {
	

	gender_piechart();
	$('#dataTable').DataTable({
			"order": []
	});
});