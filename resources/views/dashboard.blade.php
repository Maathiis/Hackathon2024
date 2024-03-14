<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carte interactive</title>
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-black h-screen flex flex-col">

    <!-- Conteneur pour les éléments actuels -->
    <div class="flex-grow flex flex-col overflow-auto">
        <!-- Conteneur pour la carte et les informations du département -->
        <div class="flex-grow flex">
            <!-- Conteneur pour la carte -->
            <div id="map" class="bg-black w-3/4 h-full"></div>

            <!-- Conteneur pour les informations du département -->
            <div class="w-2/4 h-full flex flex-col items-start justify-center text-white space-y-4">
                <div class="flex justify-between w-full">
                    <h2 id="departmentName" class="text-3xl font-bold"></h2>
                    <div class="bg-gray-700 rounded-lg p-2 hidden" id="departmentNumberContainer" style="margin-right: 10%;">
                        <h3 id="departmentNumber" class="text-lg font-bold"></h3>
                    </div>
                </div>
                <div class="mt-2">
                    <img id="departmentImage" class="hidden" src="" alt="Department Image">
                </div>
            </div>
        </div>

        <!-- Ligne de texte -->
        <div class="text-white mt-4 mx-auto">
            <h2>Sur le territoire Français de août 2021 à août 2022, c'est 4 225 596 crimes et délits qui ont été commis !</h2>
        </div>

        <!-- Contenu à afficher lorsqu'un département est sélectionné -->
        <div id="departmentContent" class="hidden">
            <div class="text-white mt-4 mx-auto">
                <p>C'est pour l'instant $nbrtotal crimes et délits qui ont été commis en $nomDepartement ! Janvier à Août 2022 </p>
            </div>

            <div class="text-white mt-4 mx-auto">
                <p>En $année c'est $nbrtotalAn crimes et délits qui ont été commis en $nomDepartement ! </p>
            </div>

            <button class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700">Voir les détails</button>

            <!-- Affiche un tableau qui montre les familles par année 10 dernières année possibilité de mettre qu'une seule année pagination et comparatif-->

            <div class="text-white mt-4 mx-auto">
                <p>Graphique dynamique & graphique pas dynamique</p>
            </div>
        </div>
    </div>

    <script>
        // Définir les dimensions de la carte
        var width = 800;
        var height = 600;

        // Créer une projection géographique pour la France
        var projection = d3.geoConicConformal()
            .center([2.454071, 46.279229])
            .scale(3200)
            .translate([width / 2, height / 2]);

        // Créer un chemin géographique basé sur la projection
        var path = d3.geoPath().projection(projection);

        // Créer le conteneur SVG pour la carte
        var svg = d3.select("#map").append("svg")
            .attr("width", width)
            .attr("height", height);

        // Charger les données géographiques de la France métropolitaine
        d3.json("https://raw.githubusercontent.com/gregoiredavid/france-geojson/master/departements.geojson").then(function(geojson) {
            // Dessiner les départements métropolitains
            svg.selectAll("path")
                .data(geojson.features)
                .enter().append("path")
                .attr("d", path)
                .style("fill", "lightblue")
                .style("stroke", "white")
                .style("stroke-width", 1)
                // Ajouter des événements de survol et de style de survol
                .on("mouseover", function(d) {
                    var departementCode = d.target.__data__.properties.code;
                    var departmentName = d.target.__data__.properties.nom;
                    var departmentNumber = d.target.__data__.properties.code;
                    var departmentImageUrl = "images/" + d.target.__data__.properties.code + ".png";

                    d3.select("#departmentName").text(departmentName).classed("hidden", false);
                    d3.select("#departmentNumber").text(departmentNumber).classed("hidden", false); // Affichage du numéro du département
                    d3.select("#departmentNumberContainer").classed("hidden", false); // Affichage du conteneur du numéro du département
                    d3.select("#departmentImage").attr("src", departmentImageUrl).classed("hidden", false);
                    d3.select("#departmentContent").classed("hidden", false); // Afficher le contenu du département
                    d3.select(this).style("fill", "red");

                    // Descendre la page automatiquement lorsqu'un département est survolé
                    $("html, body").animate({
                        scrollTop: $(document).height()
                    }, 1000);
                })
                .on("mouseout", function() {
                    d3.select("#departmentName").text("").classed("hidden", true);
                    d3.select("#departmentNumber").text("").classed("hidden", true); // Masquage du numéro du département
                    d3.select("#departmentNumberContainer").classed("hidden", true); // Masquage du conteneur du numéro du département
                    d3.select("#departmentImage").attr("src", "").classed("hidden", true);
                    d3.select("#departmentContent").classed("hidden", true); // Masquer le contenu du département
                    d3.select(this).style("fill", "lightblue");
                });
        });

    </script>
</body>

</html>

