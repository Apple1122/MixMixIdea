<script>
  import { Doughnut } from 'vue-chartjs'
  export default {
    extends: Doughnut,
    mounted () {
      // Overwriting base render method with actual data.
      this.renderChart({
        labels: ['出席','缺席'],
        datasets: [{
          data: [30, 10],
          backgroundColor: ["#FFCE56","#FF6384"],
        }],
        options: {
          legend: {
            fontSize: 30
          }
        }
      })
    }
  }
</script>

<style scoped>

</style>