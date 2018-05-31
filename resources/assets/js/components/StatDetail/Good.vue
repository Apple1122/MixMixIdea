<script>
  import { Bar } from 'vue-chartjs'
  export default {
    extends: Bar,
    mounted () {
      // Overwriting base render method with actual data.
      this.renderChart({
        labels: ['Andy','Tony','YuWei','hi'],
        datasets: [{
          label: '案讚次數',
          data: [40, 31, 20, 18],
          backgroundColor: ["#a5dff9","#ef5285","#60c5ba","#feee7d"],
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