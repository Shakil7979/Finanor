<template>
  <div class="emotion-chart-container">
    <canvas ref="chartCanvas"></canvas>
  </div>
</template>

<script>
import { Chart, BarController, BarElement, CategoryScale, LinearScale, Tooltip, Legend } from 'chart.js';
Chart.register(BarController, BarElement, CategoryScale, LinearScale, Tooltip, Legend);

export default {
  name: 'EmotionChart',
  data() {
    return {
      chart: null,
    };
  },
  async mounted() {
    try {
      const response = await fetch('/emotion-summary');
      const data = await response.json();

      const emotions = data.map(item => this.getEmotionLabel(item.emotion));
      const amounts = data.map(item => item.total_amount / 100); // Amount convert to decimal

      const ctx = this.$refs.chartCanvas.getContext('2d');

      this.chart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: emotions,
          datasets: [{
            label: 'Total Amount (৳)',
            data: amounts,
            backgroundColor: this.generateColors(emotions.length),
            borderColor: '#4B5563',
            borderWidth: 1,
            borderRadius: 10,
            barThickness: 30,
          }]
        },
        options: {
          responsive: true,
          plugins: {
            tooltip: {
              callbacks: {
                label: function(context) {
                  return '৳ ' + context.parsed.y.toFixed(2);
                }
              }
            },
            legend: {
              display: false // Legend hide kore chart clean rakhchi
            }
          },
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                callback: function(value) {
                  return '৳' + value;
                }
              }
            }
          }
        }
      });
    } catch (error) {
      console.error('Error loading emotion summary:', error);
    }
  },
  methods: {
    getEmotionLabel(emotion) {
      const emotionMap = {
        1: 'Very Sad',
        2: 'Sad',
        3: 'Neutral',
        4: 'Happy',
        5: 'Very Happy'
      };
      return emotionMap[emotion] || 'Unknown'; // Null or invalid hole "Unknown" show korbe
    },
    generateColors(count) {
      const colors = [
        '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#C9CBCF', '#2ECC71'
      ];
      return Array.from({ length: count }, (_, i) => colors[i % colors.length]);
    }
  }
};
</script>

<style scoped>
.emotion-chart-container {
  width: 100%;
  padding: 20px;
  background: #ffffff;
  border-radius: 12px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
}

canvas {
  max-width: 100%;
}
</style>
