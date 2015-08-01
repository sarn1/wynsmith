<section>
  <div id="content_body">
    <h1><?php echo $listing_category; ?> Properties</h1>

    <div class="row">
      <div class="medium-6 columns">
        <?php print_listings($listing_category,'chicago') ?>
      </div>
      <div class="medium-6 columns">
        <article>
          <?php print_listings($listing_category,'suburban') ?>
        </article>
      </div>
    </div>
  </div>
</section>