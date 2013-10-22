<?php get_template_part('templates/head'); ?>

      <div id="content">

        <div id="inner-content" class="wrap clearfix">

          <div id="main" class="twelvecol first clearfix" role="main">

            <h1 class="single-section-name" class="first last twelvecol">Multimedia</h1>

              <section id="multimedia-mgallery" class="mgallery ninecol last clearfix">

                <article id="multimedia-mgallery-top" class="multimedia-article mgallery-top-article twelvecol first last clearfix">

                  <?php

                    $multimedia_top_article_query = new WP_Query( array(
                        'post_type'              => 'slideshow',
                        'posts_per_page'         => 1
                      )
                    );

                  ?>

                  <div id="multimedia-mgallery-top-content" class="mgallery-top-article-content twelvecol first last clearfix"

                    <!-- top video (most recent?) code goes here -->

                  </div>


                  <div id="multimedia-mgallery-top-meta" class="mgallery-top-article-meta twelvecol first last clearfix"



                  </div>



                </article> <!-- end article#multimedia-mgallery-top -->



                <div id="multimedia-mgallery-recent" class="mgallery-recent-articles twelvecol first last clearfix">
                  <ul id="multimedia-mgallery-grid-slider" class="mgallery-recent-slider twelvecol first last clearfix">
                    <li>
                      <ul class="mgallery-grid">

                        <li class="mgallery-article threecol multimedia-article">

                          <a href="#" class="multimedia-article-thumb mgallery-thumb"><img src="#" /></a>

                          <h2 class="h6"></h2>
                          <p class="mgallery-grid-byline"></p>

                        </li>
                        <li class="mgallery-article threecol multimedia-article">...</li>
                        <li class="mgallery-article threecol multimedia-article">...</li>
                        <li class="mgallery-article threecol multimedia-article">...</li>
                        <li class="mgallery-article threecol multimedia-article">...</li>
                        <li class="mgallery-article threecol multimedia-article">...</li>
                        <li class="mgallery-article threecol multimedia-article">...</li>
                        <li class="mgallery-article threecol multimedia-article">...</li>

                      </ul>
                    </li>
                  </ul>
                </div> <!-- end #multimedia-mgallery-recent -->

              </section> <!-- end section#multimedia-mgallery -->

              <div id="multimedia-sidebar" class="threecol first clearfix">

                <!-- nav to be added here at a later date. for now we leave this empty -->

              </div> <!-- end #multimedia-sidebar -->

          </div> <!-- end #main -->

          <?php // get_sidebar(); // sidebar 1 - disabled for multimedia. find a new place for unobtrusive ads.?>

        </div> <!-- end #inner-content -->

      </div> <!-- end #content -->


