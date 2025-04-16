<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Black Sheep Barber Shop</title>
  <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Special Elite', cursive;
      background-color: #fff;
      color: #1a1a1a;
    }

    header {
      background-color: #000;
      height: 100vh;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding-left: 50px;
    }

    .logo {
      width: 200px;
      margin-bottom: 30px;
    }

    .menu {
      position: absolute;
      top: 40px;
      left: 40px;
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .menu a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      font-size: 1.2rem;
    }

    .btn {
      background-color: #d4af72;
      border: none;
      padding: 15px 30px;
      color: #fff;
      font-weight: bold;
      font-size: 1.1rem;
      margin-top: 20px;
      cursor: pointer;
    }

    section {
      padding: 80px 50px;
    }

    .section-title {
      font-size: 2.5rem;
      text-align: center;
      margin-bottom: 50px;
    }

    .salon-chooser {
      display: flex;
      justify-content: center;
      gap: 40px;
    }

    .salon-box {
      width: 300px;
      height: 400px;
      background-color: #222;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: white;
      font-size: 2rem;
      text-shadow: 2px 2px 4px black;
      position: relative;
    }

    .highlight {
      background-color: #d4af72;
      padding: 5px 10px;
      color: #fff;
      display: inline-block;
    }

    .about-section {
      background-color: #f4f4f4;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 80px 50px;
    }

    .about-text {
      flex: 1;
      margin-right: 50px;
    }

    .about-text h2 {
      font-size: 2rem;
      margin-bottom: 20px;
    }

    .newsletter-section {
      background-color: #d4af72;
      color: white;
      padding: 60px 50px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .newsletter-text {
      flex: 1;
      margin-right: 30px;
    }

    .newsletter-form {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .newsletter-form input[type="text"],
    .newsletter-form input[type="email"] {
      padding: 10px;
      border: none;
      font-size: 1rem;
    }

    .newsletter-form button {
      padding: 10px;
      background: #000;
      color: white;
      border: none;
      font-weight: bold;
      cursor: pointer;
    }

    .price-tabs {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-bottom: 30px;
    }

    .price-tabs button {
      padding: 10px 20px;
      background: #eee;
      border: none;
      cursor: pointer;
      font-weight: bold;
    }

    .price-tabs button.active {
      background: #d4af72;
      color: #fff;
    }

    .price-list {
      max-width: 800px;
      margin: auto;
      display: none;
    }

    .price-list.active {
      display: block;
    }

    .price-item {
      display: flex;
      justify-content: space-between;
      border-bottom: 1px solid #ccc;
      padding: 10px 0;
    }

    .featured-barber,
    .partners-section {
      background-color: #f9f9f9;
      text-align: center;
    }

    .featured-barber img,
    .partner-box img {
      max-width: 200px;
      margin-bottom: 15px;
    }

    .partner-list {
      display: flex;
      justify-content: center;
      gap: 40px;
      flex-wrap: wrap;
    }

    .partner-box {
      max-width: 300px;
      padding: 20px;
      background: #fff;
      border: 1px solid #ddd;
    }
    .salon-box {
  display: inline-block;
  padding: 2rem;
  border: 2px solid #000;
  border-radius: 1rem;
  cursor: pointer;
  text-decoration: none;
  color: inherit;
  text-align: center;
  font-weight: bold;
}

  </style>
  <script>
    function showPriceList(id) {
      document.querySelectorAll('.price-list').forEach(el => el.classList.remove('active'));
      document.querySelectorAll('.price-tabs button').forEach(btn => btn.classList.remove('active'));
      document.getElementById(id).classList.add('active');
      document.querySelector(`[data-target="${id}"]`).classList.add('active');
    }
  </script>
</head>
<body>
  <header>
    <img src="#" alt="Black Sheep logo" class="logo">
    <nav class="menu">
      <a href="#rolunk">Rólunk</a>
      <a href="#arlista">Árlista</a>
      <a href="#galeria">Galéria</a>
      <a href="#webshop">Webshop</a>
      <a href="#csapat">Borbélyaink</a>
      <a href="#kapcsolat">Kapcsolat</a>
    </nav>
    <button class="btn">IDŐPONTFOGLALÁS</button>
  </header>

  <section id="valasztszalon">
  <h2 class="section-title">Válassz szalont</h2>
  <div class="salon-chooser">
    <div class="salon-box" data-salon="karoly">KÁROLY<br><span style="font-size: 1rem;">körút 7.</span></div>
    <div class="salon-box" data-salon="erzsebet">ERZSÉBET<br><span style="font-size: 1rem;">körút 34.</span></div>
  </div>
</section>

<script>
  document.querySelectorAll('.salon-box').forEach(box => {
    box.addEventListener('click', () => {
      const salon = box.getAttribute('data-salon');
      window.location.href = `booking.php?salon=${salon}`;
    });
  });
</script>



  <section id="rolunk" class="about-section">
    <div class="about-text">
      <h2>Black Sheep Barber Shop</h2>
      <p><span class="highlight">Egy hely, ahol igazán férfinak érezheted magad.</span> Retro stílus és jó hangulat a belváros szívében. Szakértő borbélyaink oldschool környezetben vágják a legtrendibb frizurákat és szakállakat. Prémium kiszolgálás, hideg sör, barátságos légkör.</p>
    </div>
    <div class="about-image"><!-- Kép ide jön --></div>
  </section>

  <section class="newsletter-section">
    <div class="newsletter-text">
      <h2>Miért éri ez meg neked?</h2>
      <p>Elsőként értesülhetsz akcióinkról, újdonságainkról. Feliratkozóként Skip The Line előnyt kapsz, és exkluzív kedvezményekhez juthatsz.</p>
    </div>
    <form class="newsletter-form">
      <input type="text" placeholder="Név">
      <input type="email" placeholder="Email cím">
      <button type="submit">JELENTKEZEM!</button>
    </form>
  </section>

  <section id="arlista">
    <h2 class="section-title">Árlista</h2>
    <div class="price-tabs">
      <button class="active" data-target="normal" onclick="showPriceList('normal')">Normál</button>
      <button data-target="master" onclick="showPriceList('master')">Master</button>
      <button data-target="senior" onclick="showPriceList('senior')">Senior</button>
    </div>
    <div id="normal" class="price-list active">
      <div class="price-item"><span>Férfi hajvágás</span><span>6 000 Ft</span></div>
      <div class="price-item"><span>Szakáll igazítás</span><span>3 000 Ft</span></div>
      <div class="price-item"><span>Teljes csomag</span><span>8 500 Ft</span></div>
    </div>
    <div id="master" class="price-list">
      <div class="price-item"><span>Férfi hajvágás</span><span>7 500 Ft</span></div>
      <div class="price-item"><span>Szakáll igazítás</span><span>4 000 Ft</span></div>
      <div class="price-item"><span>Teljes csomag</span><span>10 000 Ft</span></div>
    </div>
    <div id="senior" class="price-list">
      <div class="price-item"><span>Férfi hajvágás</span><span>9 000 Ft</span></div>
      <div class="price-item"><span>Szakáll igazítás</span><span>5 000 Ft</span></div>
      <div class="price-item"><span>Teljes csomag</span><span>11 500 Ft</span></div>
    </div>
  </section>

  <section id="honapborbelya" class="featured-barber">
    <h2 class="section-title">A hónap borbélya</h2>
    <img src="#" alt="Borbély portréja">
    <h3>Richárd</h3>
    <p>Precíz, gyors és mindig mosolyog. A vendégeink kedvence, nem véletlenül ő a hónap borbélya!</p>
    <button class="btn">Bővebben</button>
  </section>

  <section id="partnerek" class="partners-section">
    <h2 class="section-title">Partnereink</h2>
    <div class="partner-list">
      <div class="partner-box">
        <img src="#" alt="Skin City logo">
        <h4>Skin City</h4>
        <p>Barber után arctisztítás vagy tetoválás? Náluk garantált a prémium minőség.</p>
        <button class="btn">Érdekel</button>
      </div>
      <div class="partner-box">
        <img src="#" alt="Raccoon Lab logo">
        <h4>Raccoon Lab</h4>
        <p>Marketing, web és dizájn – ők felelnek a Black Sheep online arculatáért.</p>
        <button class="btn">Bővebben</button>
      </div>
    </div>
  </section>

</body>
</html>

<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Black Sheep Barber Shop</title>
  <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Special Elite', cursive;
      background-color: #fff;
      color: #1a1a1a;
    }

    header {
      background-color: #000;
      height: 100vh;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding-left: 50px;
    }

    .logo {
      width: 200px;
      margin-bottom: 30px;
    }

    .menu {
      position: absolute;
      top: 40px;
      left: 40px;
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .menu a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      font-size: 1.2rem;
    }

    .btn {
      background-color: #d4af72;
      border: none;
      padding: 15px 30px;
      color: #fff;
      font-weight: bold;
      font-size: 1.1rem;
      margin-top: 20px;
      cursor: pointer;
    }

    section {
      padding: 80px 50px;
    }

    .section-title {
      font-size: 2.5rem;
      text-align: center;
      margin-bottom: 50px;
    }

    .salon-chooser {
      display: flex;
      justify-content: center;
      gap: 40px;
    }

    .salon-box {
      width: 300px;
      height: 400px;
      background-color: #222;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: white;
      font-size: 2rem;
      text-shadow: 2px 2px 4px black;
      position: relative;
    }

    .highlight {
      background-color: #d4af72;
      padding: 5px 10px;
      color: #fff;
      display: inline-block;
    }

    .about-section {
      background-color: #f4f4f4;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 80px 50px;
    }

    .about-text {
      flex: 1;
      margin-right: 50px;
    }

    .about-text h2 {
      font-size: 2rem;
      margin-bottom: 20px;
    }

    .newsletter-section {
      background-color: #d4af72;
      color: white;
      padding: 60px 50px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .newsletter-form input[type="text"],
    .newsletter-form input[type="email"] {
      padding: 10px;
      border: none;
      font-size: 1rem;
    }

    .newsletter-form button {
      padding: 10px;
      background: #000;
      color: white;
      border: none;
      font-weight: bold;
      cursor: pointer;
    }

    .price-tabs,
    .voucher-list,
    .team-grid,
    .partner-list {
      display: flex;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
    }

    .price-item,
    .voucher-box,
    .team-member,
    .partner-box {
      border: 1px solid #ccc;
      padding: 20px;
      background: #fff;
      text-align: center;
      max-width: 300px;
    }

    .voucher-box h3,
    .team-member h4 {
      margin-bottom: 10px;
    }

    .contact-section {
      background-color: #f4f4f4;
      padding: 60px 50px;
    }

    .contact-info {
      max-width: 600px;
      margin: auto;
      text-align: center;
    }

    .contact-info p {
      margin: 5px 0;
    }
  </style>
</head>
<body>
  <!-- ... eddigi szekciók ... -->

  <section id="utalvanyok">
    <h2 class="section-title">Ajándékutalványok</h2>
    <div class="voucher-list">
      <div class="voucher-box">
        <h3>Normál</h3>
        <p>Stílusos ajándék férfiaknak alap csomaggal</p>
        <button class="btn">Vásárlás</button>
      </div>
      <div class="voucher-box">
        <h3>Master</h3>
        <p>Tapasztalt borbélyainktól extra kiszolgálással</p>
        <button class="btn">Vásárlás</button>
      </div>
      <div class="voucher-box">
        <h3>Senior</h3>
        <p>Top szintű prémium élmény, ajándék extra</p>
        <button class="btn">Vásárlás</button>
      </div>
    </div>
  </section>

  <section id="csapat">
    <h2 class="section-title">Borbélyaink</h2>
    <div class="team-grid">
      <div class="team-member">
        <img src="#" alt="Kálmi" style="width:100%">
        <h4>Kálmi</h4>
        <p>Master Barber</p>
      </div>
      <div class="team-member">
        <img src="#" alt="Benze" style="width:100%">
        <h4>Benze</h4>
        <p>Senior Barber</p>
      </div>
      <div class="team-member">
        <img src="#" alt="Petya" style="width:100%">
        <h4>Petya</h4>
        <p>Barber</p>
      </div>
    </div>
  </section>

  <section id="kapcsolat" class="contact-section">
    <h2 class="section-title">Kapcsolat</h2>
    <div class="contact-info">
      <p><strong>Károly körút 7.</strong></p>
      <p><strong>Erzsébet körút 34.</strong></p>
      <p>Telefon: +36 30 123 4567</p>
      <p>Email: info@blacksheep.hu</p>
      <p>Nyitvatartás: H-P 10:00–20:00, Sz 9:00–18:00</p>
      <br>
      <iframe src="https://www.google.com/maps" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </section>

</body>
</html>
