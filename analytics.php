<?php
// Show errors (development only)
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/sidebar.php';
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>Analytics Dashboard</h1>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">

      <!-- Info boxes -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>1,205</h3>
              <p>Visitors</p>
            </div>
            <div class="icon">
              <i class="fas fa-user"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>3,420</h3>
              <p>Page Views</p>
            </div>
            <div class="icon">
              <i class="fas fa-eye"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>67</h3>
              <p>New Users</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-plus"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>12</h3>
              <p>Bounce Rate (%)</p>
            </div>
            <div class="icon">
              <i class="fas fa-sign-out-alt"></i>
            </div>
          </div>
        </div>
      </div>

      <!-- Line chart -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Visitors and Views by Date</h3>
        </div>
        <div class="card-body">
          <canvas id="trafficChart" style="height:300px;"></canvas>
        </div>
      </div>

    </div>
  </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('trafficChart').getContext('2d');
const trafficChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['May 17', 'May 18', 'May 19', 'May 20', 'May 21', 'May 22'],
        datasets: [
            {
                label: 'Visitors',
                data: [200, 400, 350, 500, 450, 600],
                backgroundColor: 'rgba(60,141,188,0.2)',
                borderColor: 'rgba(60,141,188,1)',
                borderWidth: 2
            },
            {
                label: 'Page Views',
                data: [400, 600, 500, 800, 750, 900],
                backgroundColor: 'rgba(210, 214, 222, 0.2)',
                borderColor: 'rgba(210, 214, 222, 1)',
                borderWidth: 2
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
