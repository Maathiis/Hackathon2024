<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sécuri-Cité</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body class="font-sans bg-black">

<section class="bg-blue-900 py-16 text-white text-center rounded-b-3xl">
    <div class="container mx-auto">
        <img src="images/Logo.png" class="absolute top-0 left-0  w-64 h-auto">
        <h1 class="text-4xl font-bold mb-4">Sécuri-Cité</h1>
        <p class="text-lg mb-8">Accédez aux données sur les crimes et délits enregistrés depuis 1996</p>
    </div>
</section>

<!-- Features section -->
<section class="py-14 px-8">
    <div class="container mx-auto flex flex-col items-center">
        <h2 class="text-xl font-semibold mb-8 text-white text-center">Bienvenue sur notre plateforme dédiée à l'analyse des crimes et délits enregistrés par les services de police et de gendarmerie depuis 1996. Notre objectif est de fournir aux utilisateurs un outil simple et efficace afin d'explorer ces données de sécurité publique.</h2>
        <div class="py-4 grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Feature 1 -->
            <div class="feature bg-blue-900 rounded-lg shadow-lg p-8">
                <h3 class="text-3xl font-bold mb-8 text-center text-white">Les Données</h3>
                <p class="text-white">Les données utilisées proviennent de la source gouvernementale ouverte data.gouv.fr. Ces données fournissent des informations détaillées sur les crimes et délits enregistrés, couvrant une période étendue depuis 1996.</p>
            </div>
            <!-- Feature 2 -->
            <div class="feature bg-blue-900 rounded-lg shadow-lg p-8">
                <h3 class="text-3xl font-bold mb-8 text-center text-white">Critères de Recherche</h3>
                <p class="text-white">Notre plateforme offre plusieurs critères de recherche pour permettre aux utilisateurs d'explorer les données de manière ciblée : 
                    <br>- Total des Crimes et Délits par Département
                    <br>- Filtrage par Année et/ou Département
                    <br>- Filtrage par Motif de Crimes et Délits
                    <br>- Graphique d'Évolution des Crimes et Délits</p>
            </div>
        </div>
    </div>
</section>

<section class="py-8 bg-gradient-to-b from-black to-gray-900">
    <h2 class="text-3xl font-bold mb-8 text-center text-white">Département le plus sûr en 2022</h2>
    <div class="container mx-auto flex items-center justify-center">
        <h2 class="text-3xl font-bold text-white mr-8">Maine-Et-Loire</h2>
        <div class="h-64 border-l border-white mr-8"></div>
        <img src="images/49.png" alt="Maine-Et-Loire" class="w-64 h-auto">
    </div>
</section>

<section class="bg-blue-900 py-20 text-white text-center">
    <div class="container mx-auto">
        <p class="text-lg mb-4">Rejoignez-nous dès maintenant pour accéder aux données sur la sécurité de votre région !</p>
        <a href="{{ route('register') }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-lg px-8 py-3 mx-2 mb-2">S'inscrire</a>
        <a href="{{ route('login') }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-lg px-8 py-3 mx-2 mb-2">Se connecter</a>
    </div>
</section>

<footer class="bg-gray-900 text-gray-300 py-6 text-center">
    <div class="container mx-auto">
        <p>&copy; 2024 Sécuri-Cité. Tous droits réservés.</p>
    </div>
</footer>

</body>
</html>
