<?php

require_once(__DIR__.'/Process/Connexion.php');
include __DIR__. '/Process/Autoload.php';
include __DIR__. '/View/Header.php';

?>


<main class="about-section">
  <div id="about" class="about">
     
    <h1>A Propos de nous</h1>
    <img class="gif" src="./IMG/voyage.gif">
    <p>Grâce à son expérience engrangée durant plusieurs années sur le terrain, l’équipe Riad&FredVisor vous fait bénéficier de son excellente connaissance du territoire.</p>
    <p>L’agence Riad&FredVisor organise des voyages, escapades, circuits, séjours à la carte et sur mesure,</p>
    <p>de toute durée, avec ou sans activités, pour individuels, familles et groupes.</p>
  </div>


</main>

<!-- ***************************** POC BANNER CARDS *********************************** -->


<section class="pt-5 pb-5">
  <h1>Nos promotions !</h1>
  <div class="container">
    <div id="sales" class="row">
      <div class="col-6">
      </div>
      <div class="col-6 text-right">
        <a class="btn btn-light mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
          <i class="fas fa-chevron-left"></i>
        </a>
        <a class="btn btn-light mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
          <i class="fas fa-chevron-right"></i>
        </a>
      </div>
      <div class="col-12">
        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">

                <div class="col-md-4 mb-3">
                  <div class="card">
                    <img class="img-fluid" alt="100%x280" src="./IMG/morocco.jpg">
                    <div class="card-body">
                      <h3 class="card-title">Maroc / Afrique du Nord</h3>
                      <h4>7 jours</h4>
                      <p class="card-text"></p>
                      <img style="height: 4rem; width: 4rem" src="./IMG/sales.png">

                    </div>

                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <img class="img-fluid" alt="100%x280" src="./IMG/fuji.jpg">
                    <div class="card-body">
                      <h3 class="card-title">Fuji / Japon</h3>
                      <h4>20 jours</h4>
                      <p class="card-text"></p>
                      <img style="height: 4rem; width: 4rem" src="./IMG/sale.png">
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <img class="img-fluid" alt="" src="./IMG/istan.jpg">
                    <div class="card-body">
                      <h3 class="card-title">Istanbul / Turquie</h3>
                      <h4>12 jours</h4>
                      <p class="card-text"></p>
                      <img style="height: 4rem; width: 4rem" src="./IMG/sales.png">
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="carousel-item">
              <div class="row">

                <div class="col-md-4 mb-3">
                  <div class="card">
                    <img class="img-fluid" alt="100%x280" src="./IMG/canyon.jpg">
                    <div class="card-body">
                      <h3 class="card-title">Grand Canyon / Etats-Unis</h3>
                      <h4>28 Jours</h4>
                      <p class="card-text"></p>
                      <img style="height: 4rem; width: 4rem" src="./IMG/sale.png">
                    </div>

                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <img class="img-fluid" alt="100%x280" src="./IMG/agra.jpg">
                    <div class="card-body">
                      <h3 class="card-title">Agra / Inde</h3>
                      <h4>24 Jours</h4>
                      <p class="card-text"></p>
                      <img style="height: 4rem; width: 4rem" src="./IMG/sale.png">
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <img class="img-fluid" alt="100%x280" src="./IMG/sydney.jpg">
                    <div class="card-body">
                      <h3 class="card-title">Sydney / Australie</h3>
                      <h4>24 Jours</h4>
                      <p class="card-text"></p>
                      <img style="height: 4rem; width: 4rem" src="./IMG/sales.png">
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ***************************** CARDS BOOK *********************************** -->

<h1>Reserver maintenant !</h1>

<ul id="book">

  <?php

  $destination = new DestinationManager($pdo);
  $allDestinations = $destination->getListGroupByName();

  foreach ($allDestinations as $rowDestination) {
  ?>
    <li class="booking-card" style="background-image:url(<?= $rowDestination->getImages() ?>)">
      <div class="book-container">
        <div class="content">
          <a href='/ComparOperator/View/ListTo.php?destination=<?= $rowDestination->getLocation() ?>'><button class="btn">Afficher</button></a>
        </div>
      </div>
      <div class="informations-container">
        <h2 class="title"><?= $rowDestination->getLocation() ?></h2>
        <p class="sub-title"><?= $rowDestination->getDescription() ?></p>
        <div class="more-information">
          <div class="info-and-date-container">
            <div class="box info">
              <svg height="512" viewBox="0 0 512 512" style="width:60px;height:60px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <linearGradient id="a" gradientUnits="userSpaceOnUse" x1="13.354" x2="468.463" y1="498.646" y2="43.537" data-name="New Gradient Swatch 1">
                  <stop offset="0" stop-color="#003f8a" />
                  <stop offset=".518" stop-color="#00d7df" />
                  <stop offset="1" stop-color="#006df0" />
                </linearGradient>
                <linearGradient id="c" x1="13.354" x2="468.463" xlink:href="#a" y1="498.646" y2="43.537" />
                <linearGradient id="e" x1="-70.646" x2="384.463" xlink:href="#a" y1="414.646" y2="-40.463" />
                <linearGradient id="f" x1="97.354" x2="552.463" xlink:href="#a" y1="582.646" y2="127.537" />
                <g>
                  <path d="m496 96h-480a8 8 0 0 0 -8 8v304a8 8 0 0 0 8 8h480a8 8 0 0 0 8-8v-304a8 8 0 0 0 -8-8zm-8 304h-464v-288h464z" fill="url(#a)" />
                  <path d="m472 168a40.04 40.04 0 0 1 -40-40 8 8 0 0 0 -8-8h-336a8 8 0 0 0 -8 8 40.04 40.04 0 0 1 -40 40 8 8 0 0 0 -8 8v160a8 8 0 0 0 8 8 40.04 40.04 0 0 1 40 40 8 8 0 0 0 8 8h336a8 8 0 0 0 8-8 40.04 40.04 0 0 1 40-40 8 8 0 0 0 8-8v-160a8 8 0 0 0 -8-8zm-8 160.58a56.11 56.11 0 0 0 -47.42 47.42h-321.16a56.11 56.11 0 0 0 -47.42-47.42v-145.16a56.11 56.11 0 0 0 47.42-47.42h321.16a56.11 56.11 0 0 0 47.42 47.42z" fill="url(#a)" />
                  <path d="m256 344a88 88 0 1 0 -88-88 88.1 88.1 0 0 0 88 88zm0-160a72 72 0 1 1 -72 72 72.081 72.081 0 0 1 72-72z" fill="url(#c)" />
                  <path d="m240 272a8 8 0 0 0 0 16h8a8 8 0 0 0 16 0h8a8 8 0 0 0 8-8v-24a8 8 0 0 0 -8-8h-24v-8h24a8 8 0 0 0 0-16h-8a8 8 0 0 0 -16 0h-8a8 8 0 0 0 -8 8v24a8 8 0 0 0 8 8h24v8z" fill="url(#c)" />
                  <path d="m88 280a24 24 0 1 0 -24-24 24.027 24.027 0 0 0 24 24zm0-32a8 8 0 1 1 -8 8 8.009 8.009 0 0 1 8-8z" fill="url(#e)" />
                  <path d="m424 280a24 24 0 1 0 -24-24 24.027 24.027 0 0 0 24 24zm0-32a8 8 0 1 1 -8 8 8.009 8.009 0 0 1 8-8z" fill="url(#f)" />
                </g>
              </svg>
              <p>Pour une sommes de <h5 class="type"><?=$rowDestination->getPrice().' $'?></h5></p>
            </div>
            <div class="box date">
              <svg height="512" viewBox="0 0 512 512" style="width:60px;height:60px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <linearGradient id="linear-gradient" gradientUnits="userSpaceOnUse" x1="113.277" x2="498.723" y1="448.856" y2="63.409">
                  <stop offset="0" stop-color="#41dfd0" />
                  <stop offset="1" stop-color="#ee83ef" />
                </linearGradient>
                <g id="gradient">
                  <path d="m314.082 208h-2.082v-48a8 8 0 0 0 -8-8v-24a8 8 0 0 0 -8-8v-56a8 8 0 0 0 -8-8h-64a8 8 0 0 0 -8 8v56a8 8 0 0 0 -8 8v24a8 8 0 0 0 -8 8v48h-2.082a53.979 53.979 0 0 0 -53.918 53.918v206.082a28.032 28.032 0 0 0 28 28h168a28.032 28.032 0 0 0 28-28v-206.082a53.98 53.98 0 0 0 -53.918-53.918zm-18.082-40v40h-16v-40zm-64-96h48v16h-8a8 8 0 0 0 0 16h8v16h-48zm-8 64h64v16h-64zm40 32v40h-16v-40zm-48 0h16v40h-16zm136 300a12.013 12.013 0 0 1 -12 12h-168a12.013 12.013 0 0 1 -12-12v-180h192zm0-196h-192v-10.082a37.961 37.961 0 0 1 37.918-37.918h116.164a37.961 37.961 0 0 1 37.918 37.918zm-128 128h8v8a8 8 0 0 0 8 8h32a8 8 0 0 0 8-8v-8h8a8 8 0 0 0 8-8v-32a8 8 0 0 0 -8-8h-8v-8a8 8 0 0 0 -8-8h-32a8 8 0 0 0 -8 8v8h-8a8 8 0 0 0 -8 8v32a8 8 0 0 0 8 8zm8-32h8a8 8 0 0 0 8-8v-8h16v8a8 8 0 0 0 8 8h8v16h-8a8 8 0 0 0 -8 8v8h-16v-8a8 8 0 0 0 -8-8h-8zm24 80a72 72 0 1 0 -72-72 72.081 72.081 0 0 0 72 72zm0-128a56 56 0 1 1 -56 56 56.064 56.064 0 0 1 56-56zm138.451-256.375a8 8 0 0 1 2.408-11.054c6.386-4.1 12.727-8.448 18.849-12.924a8 8 0 0 1 9.442 12.917c-6.38 4.664-12.99 9.2-19.645 13.47a8 8 0 0 1 -11.054-2.409zm-41.176 21.953a8 8 0 0 1 3.725-10.684c6.831-3.3 13.65-6.854 20.267-10.56a8 8 0 1 1 7.818 13.96c-6.9 3.862-14 7.565-21.124 11.006a7.994 7.994 0 0 1 -10.684-3.722zm79.415-48.71a8 8 0 0 1 1.061-11.268q2.487-2.058 4.939-4.161l4.1-3.517a8 8 0 1 1 10.412 12.148l-4.1 3.517q-2.557 2.191-5.149 4.338a8 8 0 0 1 -11.264-1.061zm-5.8 113.747a8 8 0 0 1 -11.179 1.738c-6.122-4.476-12.463-8.824-18.849-12.924a8 8 0 0 1 8.646-13.463c6.655 4.274 13.265 8.806 19.645 13.47a8 8 0 0 1 1.734 11.179zm-38.736-26.015a7.995 7.995 0 0 1 -10.889 3.071c-6.617-3.706-13.436-7.259-20.267-10.56a8 8 0 1 1 6.961-14.406c7.121 3.441 14.228 7.144 21.124 11.006a8 8 0 0 1 3.071 10.889zm65.92 48.611a8 8 0 0 1 -11.28.868l-4.1-3.517q-2.452-2.1-4.939-4.161a8 8 0 0 1 10.2-12.325q2.592 2.145 5.149 4.338l4.1 3.517a8 8 0 0 1 .87 11.275zm-50.874-77.211a8 8 0 0 1 -8 8h-19.2a8 8 0 0 1 0-16h19.2a8 8 0 0 1 8 8zm30.4-8a8 8 0 0 1 0 16h-19.2a8 8 0 0 1 0-16zm46.4 8a8 8 0 0 1 -8 8h-16a8 8 0 0 1 0-16h16a8 8 0 0 1 8 8zm-256 152a8 8 0 0 1 -8 8h-8a8 8 0 0 1 0-16h8a8 8 0 0 1 8 8zm56 0a8 8 0 0 1 -8 8h-24a8 8 0 0 1 0-16h24a8 8 0 0 1 8 8zm40.509-149.191a8 8 0 0 1 4.682-10.3c3.64-1.364 7.321-2.81 10.939-4.3a8 8 0 0 1 9.727 11.791 8 8 0 0 1 -9.727 11.787c-3.618-1.486-7.3-2.932-10.939-4.3-.111-.042-.2-.095-.3-.141a7.956 7.956 0 0 1 -4.382-4.537z" fill="url(#linear-gradient)" />
                </g>
              </svg>
              <p>Les mesures d'hygiène et de sécurité sont renforcées</p>
            </div>
          </div>
        </div>
      </div>
    </li>

  <?php
  }
  ?>

</ul>





<!-- ***************************** BACK TO TOP BTN *********************************** -->
<a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>

<?php
include './View/Footer.php';
?>