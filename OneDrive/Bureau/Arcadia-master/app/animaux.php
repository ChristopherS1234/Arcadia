<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animaux | Arcadia</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="site-navbar navbar navbar-expand-lg position-fixed navbar-dark w-100">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Arcadia</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./resume.php">Qui somme nous ?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./service.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./habitat-1.php">Habitats</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="animaux.php">Animaux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact.php">Contact</a>
                    </li>
                </ul>

                <!-- Icône Connexion à droite -->
                <div class="d-flex ms-auto">
                    <a href="connection.php" class="nav-link text-white">
                        <i class="bi bi-person-circle fs-4"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <section class="banner-2 d-flex justify-content-center align-items-center pt-5">
        <div class="single-image">
            <img src="../image/animals2.png" alt="Image principale">
        </div>

        <div class="container my-5 py-5">
            <div class="row">

                <div class="col-md 6">
                    <h1 class="text">
                        Les Animaux du Zoo Arcadia
                    </h1>
                    <h5 class="text">
                        Voici une liste d'animaux que l'on peut retrouver au Zoo Arcadia, cliquez sur les boutton
                        ci-dessus pour accéder a leur information:
                        <h5>
                            <ul>
                                <p>
                                    <button class="btn btn-success" onclick="trackClick('animaux', 'bouton_lion')">
                                        <a class="nav-link active" href="../pages-animaux/lion.php">Le Lion</a>
                                    </button>
                                </p>
                                <p>
                                    <button class="btn btn-success" onclick="trackClick('animaux', 'bouton_girafe')">
                                        <a class="nav-link active" href="../pages-animaux/girafe.php">La Girafe</a>
                                    </button>
                                </p>
                                <p>
                                    <button class="btn btn-success" onclick="trackClick('animaux', 'bouton_cerf')">
                                        <a class="nav-link active" href="../pages-animaux/cerf.php">Le Cerf</a>
                                    </button>
                                </p>
                                <p>
                                    <button class="btn btn-success" onclick="trackClick('animaux', 'bouton_loup')">
                                        <a class="nav-link active" href="../pages-animaux/loup.php">Le Loup</a>
                                    </button>
                                </p>
                                <p>
                                    <button class="btn btn-success" onclick="trackClick('animaux', 'bouton_singe')">
                                        <a class="nav-link active" href="../pages-animaux/singe.php">Le Singe</a>
                                    </button>
                                </p>
                                <p>
                                    <button class="btn btn-success" onclick="trackClick('animaux', 'bouton_serpent')">
                                        <a class="nav-link active" href="../pages-animaux/serpent.php">Le Serpent</a>
                                    </button>
                                </p>
                                <p>
                                    <button class="btn btn-success" onclick="trackClick('animaux', 'bouton_polair')">
                                        <a class="nav-link active" href="../pages-animaux/polair.php">L'Ours Polair</a>
                                    </button>
                                </p>
                            </ul>
                        </h5>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    <section class="summary-2 d-flex justify-content-center align-items-center pt-5">
        <div class="container my-5">
            <div class="card shadow-lg rounded-4 p-4">
                <div class="card-body">
                    <h1 class="card-title text-center mb-3">Sondage</h1>
                    <h5 class="card-subtitle text-center mb-4 text-muted">
                        Quel est votre animal favoris?
                    </h5>
                    <form id="pollForm">
                        <label><input type="radio" name="animal" value="Lion"> Lion</label>
                        <label><input type="radio" name="animal" value="Girafe"> Girafe</label>
                        <label><input type="radio" name="animal" value="Cerf"> Cerf</label>
                        <label><input type="radio" name="animal" value="Loup"> Loup</label>
                        <label><input type="radio" name="animal" value="Serpent"> Serpent</label>
                        <label><input type="radio" name="animal" value="Singe"> Singe</label>
                        <label><input type="radio" name="animal" value="Polaire"> Polaire</label>
                        <div class="mb-3">
                        <button class="btn btn-success" type="submit">Voter</button>
                        </div>
                    </form>
                    <div id="results"></div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer" id="down">
        <div class="footer-container">
            <div class="footer-info">
                <h3>Zoo Arcadia</h3>
                <h4>Contactez nous:</h4>
                <h5>Numéro tél: 012233445566 <br>Email: arcadiazoo@gmail.fr</h5>
                <p>Situé près de la forêt de Brocéliande, en Bretagne.</p>
                <p>&copy; 2025 Zoo Arcadia. Tous droits réservés.</p>
            </div>
            <div class="footer-links">
                <a href="index.php">Accueil</a>
                <a href="#">À propos</a>
                <a href="#">Mentions légales</a>
                <a href="./connection.php">Lien vers la page d'administration du site</a>
            </div>
        </div>
    </footer>

    <script>
        function afficherResultats(data) {
            const container = document.getElementById("results");
            container.innerHTML = "<h3>Résultats du sondage :</h3>";

            const totalVotes = Object.values(data).reduce((a, b) => a + b, 0);

            for (const animal in data) {
                const votes = data[animal];
                const pourcentage = totalVotes > 0 ? ((votes / totalVotes) * 100).toFixed(1) : 0;

                container.innerHTML += `
                <p>${animal} : ${votes} vote(s) - ${pourcentage}%</p>
                <div class="result-bar">
                    <div class="result-fill" style="width: ${pourcentage}%">${pourcentage}%</div>
                </div>
            `;
            }
        }

        // Gérer l'envoi du vote
        document.getElementById('pollForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const selected = document.querySelector('input[name="animal"]:checked');
            if (!selected) {
                alert("Veuillez sélectionner un animal.");
                return;
            }

            fetch('vote.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        animal: selected.value
                    })
                })
                .then(res => res.json())
                .then(data => {
                    alert(data.message);
                    if (data.results) {
                        afficherResultats(data.results);
                    } else {
                        chargerResultats(); // Si l'utilisateur a déjà voté
                    }
                })
                .catch(err => {
                    console.error("Erreur :", err);
                });
        });

        // Charger les résultats dès le chargement de la page
        function chargerResultats() {
            fetch('results.php')
                .then(res => res.json())
                .then(data => afficherResultats(data))
                .catch(err => console.error("Erreur de chargement des résultats :", err));
        }

        window.onload = chargerResultats;
    </script>


    <script>
        function trackClick(pageName, elementName) {
            fetch('../admin-space/track_clicks.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'page_name=' + encodeURIComponent(pageName) + '&element_name=' + encodeURIComponent(elementName)
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>