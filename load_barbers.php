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
        card.className = 'card bg-dark text-white mb-3';
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

// Alap betöltések
const urlParams = new URLSearchParams(window.location.search);
const selectedSalon = urlParams.get('salon') || 'karoly';
loadServices();
loadBarbers(selectedSalon);
</script>