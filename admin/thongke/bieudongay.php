<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
const xValues = <?php echo json_encode($tksp_ngay['order_dates']); ?>;
const yQuantities = <?php echo json_encode($tksp_ngay['total_quantities']); ?>;
const yPrices = <?php echo json_encode($tksp_ngay['total_prices']); ?>;
const barColors = <?php echo json_encode($tksp_ngay['bar_colors']); ?>;

console.log("yQuantities:", yQuantities);

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [
      {
        label: "Số lượng",
        backgroundColor: barColors,
        data: yQuantities
      },
      {
        label: "Tổng giá trị",
        backgroundColor: barColors,
        data: yPrices
      }
    ]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    },
    legend: { display: true },
    title: {
      display: true,
      text: "Sản phẩm bán được và Tổng giá trị qua từng ngày"
    }
  }
});


</script>
