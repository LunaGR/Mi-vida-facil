<style>
  ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  li {
    margin-bottom: 20px;
  }

  img {
    width: 400px;
    height: auto;
  }

  a {
    display: block;
    color: #333;
    text-decoration: none;
  }

  h3 {
    font-size: 18px;
    margin: 10px 0 0 0;
  }

  p {
    margin: 5px 0 0 0;
  }

</style>

<form method="post" action="">
  <label for="texto">Inserte la comida que quiera buscar:</label>
  <input type="text" name="texto" id="texto">
  <input type="submit" name="submit" value="Enviar">
</form>

<?php
if (isset($_POST['submit'])) {
    $texto = $_POST['texto'];

// Cargar la biblioteca de cliente de Google API
require_once 'google-api-php-client/vendor/autoload.php';

// Definir la clave de API de YouTube
$api_key = 'AIzaSyB1F5sEUtO5CW2FXZGJ7CVxK3ARIIBBvMc';

// Inicializar el cliente de Google API
$client = new Google_Client();
$client->setDeveloperKey($api_key);

// Inicializar el servicio de YouTube
$youtube = new Google_Service_YouTube($client);

// Definir la palabra clave de búsqueda
$keyword = $texto;

// Realizar la solicitud de búsqueda
$searchResponse = $youtube->search->listSearch('id,snippet', array(
    'q' => $keyword." cocina",
    'type' => 'video',
    'videoCategoryId' => '27',
    'relevanceLanguage' => 'es', // Agrega este parámetro para filtrar por español
    'maxResults' => 50,
));

// Procesar los resultados
$results = array();
foreach ($searchResponse['items'] as $searchResult) {
  $videoId = $searchResult['id']['videoId'];
  $title = $searchResult['snippet']['title'];
  $description = $searchResult['snippet']['description'];
  $thumbnail = $searchResult['snippet']['thumbnails']['default']['url'];
  $results[] = array(
    'id' => $videoId,
    'title' => $title,
    'description' => $description,
    'thumbnail' => $thumbnail,
  );
}

// Mostrar los resultados en una lista de videos
echo '<ul>';
foreach ($results as $result) {
  $videoUrl = 'https://www.youtube.com/watch?v=' . $result['id'];
  echo '<li>';
  echo '<a href="' . $videoUrl . '">';
  echo '<img src="' . $result['thumbnail'] . '" alt="' . $result['title'] . '">';
  echo '<h3>' . $result['title'] . '</h3>';
  echo '<p>' . $result['description'] . '</p>';
  echo '</a>';
  echo '</li>';
}
echo '</ul>';
}
?>
