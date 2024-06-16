<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frostklippeninseln</title>
    <style>
        /* Resetting default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            background-color: lightblue;
        }

        /* Header styles */
        header {
            background-color: lightblue;
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 50px;
            margin-left: 20px;
            margin-top: 20px;
            position: fixed;
            z-index: 4;
        }

        nav ul {
            list-style-type: none;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #333;
        }

        /* Hero section styles */
        .hero {
            text-align: center;
            padding: 60px 0;
            background-image: url(../public/mountainart.jpg);
        }

        .hero-text {
            margin-top: 0;
        }

        /* Main content section styles */
        main {
            padding: 20px;
            min-height: 100vh;
        }

        /* Footer styles */
        footer {
            background-color: lightblue;
            padding: 20px;
            text-align: center;
            display: flex;
            justify-content: space-around;
            position: sticky;
            bottom: -10em;
            width: 100%;
            transition: bottom 0.5s;
        }

        footer:hover {
            bottom: 0;
        }

        footer .quick-links ul {
            list-style-type: none;
        }

        footer .quick-links ul li {
            margin-bottom: 10px;
        }

        footer .quick-links ul li a {
            color: #333;
        }

        .statename {
            font-size: 25px;
            color: #025E73;
        }

        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 3;
            top: 0;
            left: 0;
            background-color: black;
            background-image: url(../public/mountainart.jpg);
            overflow-x: hidden;
            padding-top: 100px;
            transition: 0.5s;
        }

        /* The sidebar links */
        .sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #87e7ff;
            display: block;
            transition: 0.3s;
        }

        /* When you mouse over the navigation links, change their color */
        .sidebar a:hover {
            color: #f1f1f1;
        }

        /* Position and style the close button (top right corner) */
        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        /* The button used to open the sidebar */
        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #111;
            color: white;
            padding: 10px 15px;
            border: none;
        }

        .openbtn:hover {
            background-color: #444;
        }

        #overlay {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0,0,0,0.5);
            z-index: 2;
            cursor: pointer;
            transition: opacity 0.5s ease;
        }

        /* Style page content */
        #main {
            transition: margin-left .5s;
            padding: 20px;
        }

        .big-text {
            font-size: 50px;
            color: lightblue;
        }

        .navinfo {
            color: #d4c0be;
            font-size: medium;
        }

        * {
            box-sizing: border-box;
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Next & previous buttons */
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            margin-top: -22px;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        .container {
            display: flex;
            justify-content: space-around;
            padding: 50px 0;
        }

        .box {
            width: 250px;
            padding: 20px;
            background-color: lightblue;
            border-radius: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .box:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .box h2 {
            margin-top: 0;
        }

        .box p {
            margin-bottom: 20px;
        }

        .box .btn {
            display: none;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .box:hover .btn {
            display: block;
        }

        /* Pop-up styles */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            width: 40%;
            height: 100%;
            transform: translate(-50%, -50%);
            background-color: lightblue;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 5;
            overflow-y: auto;
        }

        .popup .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 20px;
            font-weight: bold;
        }

        .blur {
            filter: blur(5px);
        }
        .btn a {
    margin: 20px auto 0;
    top: 0;
    left: 0;
    width: auto;
    height: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    background: green; /* Changed background to green */
    border-radius: 30px;
    padding: 10px;
    letter-spacing: 1px;
    text-decoration: none;
    overflow: hidden;
    color: #fff;
    font-weight: 400; /* Corrected font weight */
    transition: 0.5s;
}

.btn:hover a {
    background: #25EC13; /* Changed background on hover */
}

    </style>
</head>
<body>
    <header>
        <div class="logo" onmouseenter="openSidebar()">
            <a href="index.html"><img src="../public/Frostklingeninseln.png" alt="Monarchy Logo"></a>
        </div>
    </header>
    <section class="hero">
        <div class="hero-text">
            <h1 class="statename">Anforderungen zur Einbürgerung</h1>
        </div>
    </section>

           <!-- Main content sections -->
           <div id="Sidebar" class="sidebar" onmouseleave="closeSidebar()">
            <p class="navinfo">Anmelden und Registrieren</p>
            <a href="login.php">Login</a>
            <a href="einbuergerung.php">Einbürgerung</a>
            <p class="navinfo">Leben auf den Frostklippeninseln</p>
            <a href="lebensbedingungen.html">Lebensbedingungen</a>
            <a href="sprache.html">Sprache</a>
            <a href="regionen.html">Regionen</a>
            <p class="navinfo">Allgemein</p>
            <a href="#">Hilfe</a>
            <a href="#">Fehler Melden</a>
        </div>
        <div id="overlay"></div> 
        <div id="overlay" onclick="closePopup()"></div> 
        <div class="container">
            <div class="box" onmouseenter="openPopup(1)">
                <h2>Staatsbürgerschaft Klasse 1</h2>
                <p>Fahre für mehr Informationen über dieses Feld</p>
                
            </div>
            <div class="box" onmouseenter="openPopup(2)">
                <h2>Staatsbürgerschaft Klasse 2</h2>
                <p>Fahre für mehr Informationen über dieses Feld</p>
            </div>
            <div class="box" onmouseenter="openPopup(3)">
                <h2>Staatsbürgerschaft Klasse 3</h2>
                <p>Diese Klasse ist noch in der Entwicklung und wird zu einem späteren Zeitpunkt bereitgestellt</p>
            </div>
        </div>
    </main>

    <footer>
        <div class="quick-links">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Use</a></li>
            </ul>
        </div>
        <div class="contact-info">
            <h3>Kontakt</h3>
            <p>Email: FKI@gmail.com</p>
            <p>Nummer: +49 176 47674780</p>
            <p>Addresse: Frostklippeninseln</p>
        </div>
    </footer>

    <div id="popup1" class="popup">
        <span class="close" onclick="closePopup()">&times;</span>
        <h2>Staatsbürgerschaft Klasse 1 (Adel)</h2>
        <p>Die Adelsbürgerschaft ist die höchste und angesehenste Klasse von Staatsbürgerschaft in unserer Monarchie. Sie ist ausschließlich Mitgliedern des Adels und deren direkten Nachkommen vorbehalten. Diese privilegierte Position in der Gesellschaft bringt eine Vielzahl von Rechten, Privilegien und Verantwortlichkeiten mit sich. Die Adelsbürgerschaft symbolisiert nicht nur die historische Bedeutung und Tradition des Adels, sondern auch die Verpflichtung zur Führung und Stabilität des Staates.</p>

<h2>Anforderungen zur Erlangung der Adelsbürgerschaft</h2>

<ol>
  <li><strong>Abstammung von adligen Familien:</strong> Um für die Adelsbürgerschaft in Betracht gezogen zu werden, muss ein Anwärter eine nachweisbare Abstammung von adligen Familien vorweisen können, die historisch eine bedeutende Rolle im Staat eingenommen haben. Genealogische Aufzeichnungen und Dokumente können dazu verwendet werden, die Echtheit der Abstammung zu überprüfen.</li>

  <li><strong>Soziale und kulturelle Standards:</strong> Neben der Abstammung werden Anwärter erwartet, bestimmte soziale und kulturelle Standards zu erfüllen, um die Werte und Traditionen des Adels zu verkörpern. Dazu gehört die Teilnahme an adligen Veranstaltungen und gesellschaftlichen Aktivitäten, die Förderung von Kunst und Kultur sowie die Bereitschaft, sich für das Gemeinwohl einzusetzen.</li>

  <li><strong>Verpflichtung zur Führung und Verantwortung:</strong> Die Erlangung der Adelsbürgerschaft verpflichtet den Anwärter dazu, eine führende Rolle in der Gesellschaft einzunehmen und Verantwortung für das Wohl des Staates zu übernehmen. Dies kann die Teilnahme an Regierungsangelegenheiten, die Unterstützung von wohltätigen Projekten und die Förderung von Bildung und Kultur umfassen.</li>

  <li><strong>Anerkennung durch den Monarchen:</strong> Letztendlich liegt die Entscheidung über die Verleihung der Adelsbürgerschaft beim Monarchen. Der Monarch kann aufgrund von Verdiensten, Diensten für den Staat und persönlicher Eignung die Adelsbürgerschaft verleihen oder verweigern.</li>
</ol>

<p>Die Adelsbürgerschaft ist somit nicht nur ein symbolischer Status, sondern eine ernsthafte Verpflichtung zur Führung und Stabilität des Staates. Diejenigen, die die Adelsbürgerschaft erreichen, sollten sich dieser Verantwortung bewusst sein und bereit sein, sie mit Würde und Ehre zu tragen.</p>
    </div>
    <div id="popup2" class="popup">
        <span class="close" onclick="closePopup()">&times;</span>
        <h2>Staatsbürgerschaft Klasse 2</h2>

        <p>Die bürgerliche Bürgerschaft bietet die Möglichkeit für Bürgerliche, aktiv am Staatsleben teilzunehmen und ihre Rechte und Pflichten als Mitglieder der Gesellschaft wahrzunehmen. Sie ist ein Ausdruck von Gleichheit und Teilhabe in unserer Monarchie. Die Erfüllung dieser Anforderungen sollte daher sorgfältig geprüft werden, um sicherzustellen, dass potenzielle Bürger einen positiven Beitrag zur Gesellschaft der Frostklippeninseln leisten können.</p>

<h2>Anforderungen zur Erlangung der bürgerlichen Bürgerschaft</h2>

<ol>
  <li><strong>Geburt auf den Frostklippeninseln:</strong>
     Personen, die auf den Frostklippeninseln geboren sind, erhalten automatisch das Recht auf die bürgerliche Bürgerschaft, unabhängig von der Staatsbürgerschaft ihrer Eltern. Diese Regelung unterstreicht die Bedeutung der Geburtsstätte als Grundlage für die Zugehörigkeit zur Gesellschaft der Frostklippeninseln und gewährleistet eine inklusive und gerechte Staatsbürgerschaftspolitik.</li>

  <li><strong>Test zur Verfassungskunde:</strong>
     Personen, die nicht auf den Frostklippeninseln geboren sind, müssen einen Test zur Verfassungskunde bestehen, um ihre Kenntnisse über die Verfassung und die grundlegenden Werte der Monarchie zu demonstrieren. Dieser Test soll sicherstellen, dass Antragsteller ein grundlegendes Verständnis für die Funktionsweise des Staates und seine rechtlichen Rahmenbedingungen haben.</li>

  <li><strong>Erfüllung mindestens zwei der folgenden drei Faktoren:</strong>
     <ol type="a">
        <li><strong>Finanzielle Investition:</strong>
           Der Antragsteller muss nachweisen, dass er mindestens 10.000000$ auf einem Konto bei einer Bank mit Hauptsitz auf den Frostklippeninseln besitzt. Diese Anforderung dient dazu, sicherzustellen, dass potenzielle Bürger eine wirtschaftliche Verbindung zu den Frostklippeninseln haben und zur wirtschaftlichen Entwicklung der Nation beitragen können.</li>

        <li><strong>Heirat eines Bürgers dieser Klasse:</strong>
           Eine alternative Möglichkeit, die bürgerliche Bürgerschaft zu erlangen, ist die Heirat mit einem Bürger dieser Klasse. Dieser Ansatz fördert soziale Bindungen und Integration innerhalb der Gemeinschaft der Frostklippeninseln und ermöglicht es auch ausländischen Ehepartnern, an den Rechten und Pflichten der Bürgerschaft teilzuhaben.</li>

        <li><strong>Hauptwohnsitz auf den Frostklippeninseln:</strong>
           Der Antragsteller muss nachweisen, dass er seinen Hauptwohnsitz auf den Frostklippeninseln hat. Dieser Wohnsitznachweis zeigt das Engagement des Antragstellers für die Gemeinschaft und ermöglicht es ihm, aktiv am gesellschaftlichen Leben teilzunehmen und an der Weiterentwicklung der Frostklippeninseln mitzuwirken.</li>
     </ol>
  </li>
</ol>
<div class="btn"><a href="registrierung.php" >Test beginnen</a>
    </div>

    <script>
        function openSidebar() {
            var sidebar = document.getElementById("Sidebar");
            var main = document.getElementById("main");
            var overlay = document.getElementById("overlay");

            sidebar.style.width = "300px";
            main.style.marginLeft = "300px";
            overlay.style.display = "block";
            overlay.style.backgroundColor = "rgba(0,0,0,0.7)";
        }

        function closeSidebar() {
            var sidebar = document.getElementById("Sidebar");
            var main = document.getElementById("main");
            var overlay = document.getElementById("overlay");
            overlay.style.display = "none";

            sidebar.style.width = "0";
            main.style.marginLeft = "0";
            overlay.style.backgroundColor = "rgba(0,0,0,0)";
        }

        function openPopup(num) {
            document.getElementById("popup" + num).style.display = "block";
            document.getElementById("main-content").classList.add("blur");
            document.getElementById("overlay").style.display = "block";
            console.log("popup" + num + "opened")
        }

        function closePopup() {
            var popups = document.getElementsByClassName("popup");
            for (var i = 0; i < popups.length; i++) {
                popups[i].style.display = "none";
                console.log("popup" + i + "closed")
            }
            document.getElementById("main-content").classList.remove("blur");
            document.getElementById("overlay").style.display = "none";
        }
    </script>
</body>
</html>
