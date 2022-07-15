<?php 
  get_header();
  pageBanner(array(
    'title' => 'Search results',
    'subtitle' => 'You searched for: '.get_search_query().'',
  ));
  ?>

    <div class="container container--narrow page-section">
      <?php
        while(have_posts()){
          the_post(); 
          get_template_part('template-parts/content', get_post_type());
          ?>
          
          <?php
        }
      ?>
      <!-- pagination links -->
      <?php 
      echo paginate_links();
      ?> 

    </div>
     
   
  <?php
  get_footer();
?>

