<?php

error_reporting(0);

function get_Curl($url)
{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  $result = curl_exec($curl);
  curl_close($curl);

  return json_decode($result, true);
}


$result = get_Curl('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCJsT-mOSpe3aWKxp7DL_NIQ&key=AIzaSyDTBhgsl7oHeFhHB4jQDCOFzREFcv8aCd4');

$youtubeProfilePicture = $result['items'][0]['snippet']['thumbnails']['medium']['url'];

$youtubeProfileName = $result['items'][0]['snippet']['title'];

$youtubeSubscribe = $result['items'][0]['statistics']['subscriberCount'];

//video terakhir
$urlLatesVideo = 'https://www.googleapis.com/youtube/v3/activities?key=AIzaSyDTBhgsl7oHeFhHB4jQDCOFzREFcv8aCd4&channelId=UCJsT-mOSpe3aWKxp7DL_NIQ&maxResults=1&order=date&part=snippet';

$result = get_Curl($urlLatesVideo);

$latestVideoID = $result['items'][0]['id'];

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <!-- Bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  
  <!-- My CSS -->
  <link rel="stylesheet" href="css/style.css">

  <title>My Portfolio</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#home">Kenny Perulu</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#portfolio">Portfolio</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="jumbotron" id="home">
    <div class="container">
      <div class="text-center">
        <img src="img/profil.jpg" class="rounded-circle img-thumbnail">
        <h1 class="display-4">Kenny A.N Perulu</h1>
        <h3 class="lead">Programmer | Freelancer</h3>
      </div>
    </div>
  </div>


  <!-- About -->
  <section class="about" id="about">
    <div class="container">
      <div class="row mb-4">
        <div class="col text-center">
          <h2>About</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-5">
          <p>Hello, welcome! nice to meet you. web programming is a skill that I have learned since I was in college and although I still have a lot to learn, in recent times I have been working on several projects related to web-based applications for several small companies.</p>
        </div>
        <div class="col-md-5">
          <p>Actually, I will prefer to remote and surelly can work with a team. In programming, I'm still beginner and keep to learn a lot of technology for referrence my skill focus in future. I Hope can build something great in future and for that reason I will work hard to achive my goals.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="social bg-light" id="social">
    <div class="container">
      <div class="row pt-4 mb-4">
        <div class="col text-center">
          <h2>Social Media</h2>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-5">
          <div class="row">
            <div class="col-md-4">
              <img src="<?= $youtubeProfilePicture; ?>" width="200" class="rounded-circle img-thumbnail" alt="">
            </div>
            <div class="col-md-8">
              <h5><?= $youtubeProfileName;  ?></h5>
              <p><?= $youtubeSubscribe; ?> Subcribe</p>
              <div class="g-ytsubscribe" data-channelid="UCJsT-mOSpe3aWKxp7DL_NIQ" data-layout="default" data-count="default"></div>
            </div>
          </div>
          <div class="row mt-3 pb-3">
            <div class="col">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $latestVideoID; ?>?rel=0" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="row">
            <div class="col-md-4">
              <img src="img/profile1.png" width="200" class="rounded-circle img-thumbnail" alt="">
            </div>
            <div class="col-md-8">
              <h5>MyChanel</h5>
              <p>72 Subscriber.</p>
            </div>
          </div>
          <div class="row mt-3 pb-3">
            <div class="col">
              <ul class="list-group">
                <li class="list-group-item"> <a href="https://web.facebook.com/Kenny.perulu/" class="text-decoration-none" target="_blank"><i class="bi bi-facebook"></i> Facebook</a></li>
                <li class="list-group-item"><a href="https://twitter.com/K3nny_p3rulu" class="text-decoration-none" target="_blank"> <i class="bi bi-twitter"></i> Twitter</a></li>
                <li class="list-group-item"><a href="#" class="text-decoration-none" target="_blank"><i class="bi bi-instagram"></i> Instagram</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Portfolio -->
  <section class="portfolio" id="portfolio">
    <div class="container">
      <div class="row pt-4 mb-4">
        <div class="col text-center">
          <h2>Portfolio</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md mb-4">
          <div class="card">
            <img class="card-img-top" src="img/thumbs/express.png" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">I create web apps with express js and using for manage students data, my app using mysql as DBMS in backend. For detail you can see in my github <a href="https://github.com/KennyWks/expressjs-web-app" target="_blank">repo</a></p>
            </div>
          </div>
        </div>

        <div class="col-md mb-4">
          <div class="card">
            <img class="card-img-top" src="img/thumbs/express.png" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">I create REST-API with expres js for my online shop. my app using mysql as DBMS in backend. For detail you can see in my github <a href="https://github.com/KennyWks/nodejs-balobe" target="_blank">repo</a></p>
            </div>
          </div>
        </div>

        <div class="col-md mb-4">
          <div class="card">
            <img class="card-img-top" src="img/thumbs/react-native.png" alt="Card image cap">
            <div class="card-body">
              <p class="card-text"><a href="https://github.com/KennyWks/android-app-for-thonbers" target="_blank">This repo</a> is my first cross-platfrom application as freelancer and project still under development. may you take look this project to consider my portfolio.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md mb-4">
          <div class="card">
            <img class="card-img-top" src="img/thumbs/reactjs.png" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">I create single page applications (SPA) with reactjs for my online shop call balobe's. For detail you can see in my github <a href="https://github.com/KennyWks/react-balobe" target="_blank">repo</a></p>
            </div>
          </div>
        </div>

        <div class="col-md mb-4">
          <div class="card">
            <img class="card-img-top" src="img/thumbs/php.png" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">I create web applications for forecast students major with genetic algorithm, my app using mysql as DBMS in backend. For detail you can see in my github <a href="https://github.com/KennyWks/forecast-of-student-majors-using-genetic-algorithms-with-PHP" target="_blank">repo</a>
              </p>
            </div>
          </div>
        </div>

        <div class="col-md mb-4">
          <div class="card">
            <img class="card-img-top" src="img/thumbs/bootstrap.jpg" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">I create web applications for movie search, my web using bootstrap css framework version 4 to help in front-end and movie's data by OMDB API. For detail you can see in my github <a href="https://github.com/KennyWks/movie-search-api-omdb" target="_blank">repo</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Contact -->
  <section class="contact bg-light" id="contact">
    <div class="container">
      <div class="row pt-4 mb-4">
        <div class="col text-center">
          <h2>Contact</h2>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-4">
          <div class="card bg-primary text-white mb-4 text-center">
            <div class="card-body">
              <h5 class="card-title">Contact & Location</h5>
              <p class="card-text">My portfolio is interested you? please tell me.</p>
            </div>
          </div>

          <ul class="list-group mb-4">
            <li class="list-group-item"><i class="bi bi-envelope"></i> kenny.perulu@gmail.com</li>
            <li class="list-group-item"><i class="bi bi-telephone"></i> +6281247569523</li>
            <li class="list-group-item"><a href="https://github.com/KennyWks" class="text-dark text-decoration-none" target="_blanks"><i class="bi bi-github"></i> KennyWks</a></li>
            <li class="list-group-item"><i class="bi bi-pin-map-fill"></i> Jalan Timor Raya Km 11, Kelurahan Lasiana. Kota Kupang Nusa Tenggara Timur, Indonesia</li>
          </ul>
        </div>

        <div class="col-lg-6">

          <form>
            <div class="form-group">
              <label for="nama">Name</label>
              <input type="text" class="form-control" id="nama">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="text" class="form-control" id="phone">
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" rows="3"></textarea>
            </div>
            <div class="form-group">
              <button type="button" class="btn btn-primary">Send Message</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </section>


  <!-- footer -->
  <footer class="bg-dark text-white mt-5">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <p>Copyright &copy; <?= date('Y'); ?>.</p>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

  <script src="https://apis.google.com/js/platform.js"></script>
</body>

</html>