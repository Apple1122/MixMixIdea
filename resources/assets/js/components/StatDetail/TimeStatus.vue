<script>
  import { Line } from 'vue-chartjs';
  let now = new Date();
  function newDate(minutes) {
    let time = now.getHours()+ ':' + minutes
    console.log(time.toString());
    return time.toString();
  }

  export default {
    extends: Line,
    mounted () {
      this.renderChart({
        labels:[
					newDate(10),
					newDate(20),
					newDate(30),
					newDate(40),
					newDate(50),
        ],
        datasets: [{
          label: '發言頻率',
          data: [10, 20, 15, 8, 25],
          fill: true,
          borderColor: "#ef5285",
          backgroundColor: "#fec8c9",
        }],
        options: {
          scales: {
            xAxes: [{
              type: 'time',
              time: {
                format: 'HH:mm',
                tooltipFormat: 'HH:mm'
              }
            }]
          }
        }
      })
    }
  }
</script>

<style scoped>

</style>