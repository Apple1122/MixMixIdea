<script>
  import { Bar } from 'vue-chartjs'
  export default {
    extends: Bar,
    mounted () {
      // Overwriting base render method with actual data.
      this.renderChart({
        labels: ['第一組','第二組','第三組','第四組'],
        datasets: [{
          label: '留言次數',
          data: [30, 10, 20, 55],
          backgroundColor: ["#FFCE56","#FF6384","#47b8e0","#A593E0"],
        }],
        options: {
          legend: {
            fontSize: 30
          },
          responsive: true
        }
      })
    }
  }
</script>

<style scoped>

</style>