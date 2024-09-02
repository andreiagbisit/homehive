// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Outfit', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("pieChartUser");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Maintenance", "Amenities & Services", "Security"],
    datasets: [{
      data: [3000, 3000, 3000],
      backgroundColor: ['#e74a3b', '#1cc88a', '#4e73df'],
      hoverBackgroundColor: ['#e61400', '#17a673', '#2e59d9'],
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
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
