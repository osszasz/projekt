<?php
session_start();
$salon = $_GET['salon'] ?? 'karoly';
?>
<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foglalás - <?php echo ucfirst($salon); ?> szalon</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/luxon@3.4.3/build/global/luxon.min.js"></script>
  <style>
    body { background-color: #111; color: white; font-family: 'Segoe UI', sans-serif; }
    .step { display: none; }
    .step.active { display: block; }
    .bg-sand { background-color: #c79d5e; color: #111; }
  </style>
</head>
<body>
<div class="container py-5">
  <h2 class="text-center mb-4">Foglalás - <?php echo ucfirst($salon); ?> szalon</h2>
  <div class="step active" id="step-datetime">
    <h3 class="mb-3">Válassz időpontot</h3>
    <div id="date-options" class="text-center"></div>
    <div class="text-center mt-4">
      <button class="btn bg-sand" onclick="goToStep('step-service')">Tovább</button>
    </div>
  </div>

  <div class="step" id="step-service">
    <h3 class="mb-3">Válassz szolgáltatást</h3>
    <select class="form-select" id="serviceSelect">
      <option value="Hajvágás">Hajvágás</option>
      <option value="Szakáll igazítás">Szakáll igazítás</option>
      <option value="Barber kezelés">Barber kezelés</option>
    </select>
    <div class="text-center mt-4">
      <button class="btn bg-sand" onclick="goToStep('step-barber')">Tovább</button>
    </div>
  </div>

  <div class="step" id="step-barber">
    <h3 class="mb-3">Válassz borbélyt</h3>
    <select class="form-select" id="barberSelect">
      <option value="Norbi">Norbi</option>
      <option value="Bálint">Bálint</option>
      <option value="Arnold">Arnold</option>
    </select>
    <div class="text-center mt-4">
      <button class="btn bg-sand" onclick="goToStep('step-confirm')">Tovább</button>
    </div>
  </div>

  <div class="step" id="step-confirm">
    <h3 class="mb-3">Add meg adataidat</h3>
    <form method="POST" action="submit_booking.php">
      <input type="hidden" name="salon" value="<?php echo $salon; ?>">
      <input type="hidden" name="time" id="formTime">
      <input type="hidden" name="service" id="formService">
      <input type="hidden" name="barber" id="formBarber">
      <div class="mb-3">
        <label for="name" class="form-label">Név</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="text-center">
        <button type="submit" class="btn bg-sand">Időpontfoglalás</button>
      </div>
    </form>
  </div>
</div>

<script>
  function goToStep(stepId) {
    document.querySelectorAll('.step').forEach(step => step.classList.remove('active'));
    document.getElementById(stepId).classList.add('active');
  }

  function generateTimes() {
    const DateTime = luxon.DateTime;
    const container = document.getElementById('date-options');
    container.innerHTML = '';
    const now = DateTime.now();
    for (let i = 0; i < 5; i++) {
      const dt = now.plus({ days: i }).set({ hour: 10 });
      for (let h = 10; h <= 18; h += 2) {
        const time = dt.set({ hour: h });
        const button = document.createElement('button');
        button.className = 'btn btn-outline-light m-2';
        button.textContent = time.toFormat('yyyy-MM-dd HH:mm');
        button.onclick = () => {
          document.getElementById('formTime').value = time.toISO();
          [...container.querySelectorAll('button')].forEach(btn => btn.classList.remove('bg-sand'));
          button.classList.add('bg-sand');
        };
        container.appendChild(button);
      }
    }
  }

  generateTimes();

  document.getElementById('serviceSelect').addEventListener('change', e => {
    document.getElementById('formService').value = e.target.value;
  });

  document.getElementById('barberSelect').addEventListener('change', e => {
    document.getElementById('formBarber').value = e.target.value;
  });
</script>
</body>
</html>