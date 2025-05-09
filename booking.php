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
    <div id="services-container" class="row"></div>
    <div class="text-center mt-4">
      <button class="btn bg-sand" onclick="goToStep('step-barber')">Tovább</button>
    </div>
  </div>

  <div class="step" id="step-barber">
    <h3 class="mb-3">Válassz borbélyt</h3>
    <div id="barbers-container" class="row"></div>
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
  const DateTime = window.luxon.DateTime;
  const container = document.getElementById('date-options');
  container.innerHTML = '';
  const now = DateTime.now();
  for (let i = 0; i < 5; i++) {
    const date = now.plus({ days: i });
    for (let h = 10; h <= 20; h += 2) {
      const time = date.set({ hour: h, minute: 0 });
      const btn = document.createElement('button');
      btn.className = 'btn btn-outline-light m-2';
      btn.textContent = time.toFormat('yyyy-MM-dd HH:mm');
      btn.onclick = () => {
        document.getElementById('formTime').value = time.toISO();
        document.querySelectorAll('#date-options button').forEach(b => b.classList.remove('bg-sand'));
        btn.classList.add('bg-sand');
      };
      container.appendChild(btn);
    }
  }
}

generateTimes();

function loadServices() {
  fetch('load_services.php')
    .then(res => res.json())
    .then(data => {
      const container = document.getElementById('services-container');
      container.innerHTML = '';
      data.forEach(service => {
        const card = document.createElement('div');
        card.className = 'card bg-dark text-white mb-3';
        card.style.cursor = 'pointer';
        card.innerHTML = `
          <div class="card-body">
            <h5 class="card-title">${service.name}</h5>
            <p class="card-text">${service.description || ''}</p>
            <p class="card-text">Ár: ${service.price} Ft • Időtartam: ${service.duration} perc</p>
          </div>
        `;
        card.onclick = () => {
          document.getElementById('formService').value = service.name;
          document.querySelectorAll('#services-container .card').forEach(c => c.classList.remove('border-warning'));
          card.classList.add('border-warning');
        };
        container.appendChild(card);
      });
    })
    .catch(err => {
      console.error('Hiba a szolgáltatások betöltésekor:', err);
    });
}

function loadBarbers(salon) {
  fetch(`load_barbers.php?salon=${salon}`)
    .then(res => res.json())
    .then(data => {
      const container = document.getElementById('barbers-container');
      container.innerHTML = '';
      data.forEach(barber => {
        const card = document.createElement('div');
        card.className = 'card bg-dark text-white mb-3 col-md-3';
        card.style.cursor = 'pointer';
        card.innerHTML = `
          <img src="img/${barber.image}" class="card-img-top" alt="${barber.name}">
          <div class="card-body">
            <h5 class="card-title">${barber.name}</h5>
            <p class="card-text">Értékelés: ${barber.rating} ⭐</p>
          </div>
        `;
        card.onclick = () => {
          document.getElementById('formBarber').value = barber.name;
          document.querySelectorAll('#barbers-container .card').forEach(c => c.classList.remove('border-warning'));
          card.classList.add('border-warning');
        };
        container.appendChild(card);
      });
    })
    .catch(err => {
      console.error('Hiba a borbélyok betöltésekor:', err);
    });
}

const selectedSalon = "<?php echo $salon; ?>";
loadServices();
loadBarbers(selectedSalon);
</script>
</body>
</html>