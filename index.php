<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fodrászat - Kezdőlap</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        header {
            background-color: black;
            color: white;
            padding: 15px 0;
            text-align: center;
        }
        nav ul {
            list-style: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin: 0 15px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
        }
        .hero {
            text-align: center;
            padding: 100px 20px;
            background-color: #FFD700;
            color: black;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: black;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .services, .booking {
            text-align: center;
            padding: 50px 20px;
            background-color: white;
        }
        .service-item, .booking-form {
            margin: 20px 0;
        }
        input, select, button {
            display: block;
            margin: 10px auto;
            padding: 10px;
            width: 80%;
            max-width: 400px;
        }
        footer {
            text-align: center;
            padding: 20px;
            background-color: black;
            color: white;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Fodrászat</h1>
            <nav>
                <ul>
                    <li><a href="#home">Kezdőlap</a></li>
                    <li><a href="#services">Szolgáltatások</a></li>
                    <li><a href="#booking">Időpontfoglalás</a></li>
                    <li><a href="#team">Csapat</a></li>
                    <li><a href="#contact">Kapcsolat</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <section id="home">
        <div class="hero">
            <h2>Üdvözlünk a Fodrászatunkban</h2>
            <p>Professzionális szolgáltatások modern környezetben.</p>
            <a href="#booking" class="btn">Foglalj időpontot</a>
        </div>
    </section>
    
    <section id="services" class="services">
        <h2>Szolgáltatásaink</h2>
        <div class="service-item">
            <h3>Hajvágás</h3>
            <p>Precíz és divatos hajvágás minden korosztálynak.</p>
        </div>
        <div class="service-item">
            <h3>Hajfestés</h3>
            <p>Professzionális hajfestés prémium minőségű termékekkel.</p>
        </div>
        <div class="service-item">
            <h3>Férfi borotválás</h3>
            <p>Klasszikus és modern borotválási technikák.</p>
        </div>
    </section>
    
    <section id="booking" class="booking">
        <h2>Időpontfoglalás</h2>
        <form action="booking_handler.php" method="post" class="booking-form">
            <label for="name">Név:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="service">Szolgáltatás:</label>
            <select id="service" name="service" required>
                <option value="hajvagas">Hajvágás</option>
                <option value="hajfestes">Hajfestés</option>
                <option value="borotvalas">Férfi borotválás</option>
            </select>
            
            <label for="date">Dátum:</label>
            <input type="date" id="date" name="date" required>
            
            <label for="time">Időpont:</label>
            <input type="time" id="time" name="time" required>
            
            <button type="submit">Foglalás</button>
        </form>
    </section>
    
    <footer>
        <p>&copy; 2025 Fodrászat. Minden jog fenntartva.</p>
    </footer>
</body>
</html>
