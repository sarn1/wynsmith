
<?php
if (have_posts()) :
  while (have_posts()) : the_post();
    $address1 = get_post_meta(get_the_ID(), 'wpcf-addresss-1', true);
    $address2 = get_post_meta(get_the_ID(), 'wpcf-address-2', true);
    $city = get_post_meta(get_the_ID(), 'wpcf-city', true);
    $state = get_post_meta(get_the_ID(), 'wpcf-state', true);
    $zip = get_post_meta(get_the_ID(), 'wpcf-zip', true);
    $hood = get_post_meta(get_the_ID(), 'wpcf-neighboorhood', true);
    $price = get_post_meta(get_the_ID(), 'wpcf-price', true);
    $bed = get_post_meta(get_the_ID(), 'wpcf-bedrooms', true);
    $bath = get_post_meta(get_the_ID(), 'wpcf-bathrooms', true);
    $sqft = get_post_meta(get_the_ID(), 'wpcf-square-feet', true);
    $is_sold = get_post_meta(get_the_ID(), 'wpcf-is-sold', true);
    $gallery_id = get_post_meta(get_the_ID(), 'wpcf-gallery-id', true);
    $gallery = (!empty($gallery_id)) ? '[ngg_images gallery_ids="'.$gallery_id.'" display_type="photocrati-nextgen_basic_thumbnails"]' : null;
    $type = get_post_meta(get_the_ID(), 'wpcf-listing-type', true);
?>

  <section>
    <div id="content_body" class="listing-details">
      <h2><a href="/<?php echo strtolower($listing_category);?>">Listings</a> / <a href="/<?php echo strtolower($listing_category);?>"><?php echo $listing_category;?></a></h2>
      <h1><?php echo $listing_category;?> Properties</h1>
      <h3><?php echo strtoupper($type.' '.$listing_category);?> LISTINGS</h1></h3>
      <div class="row">
        <div class="medium-<?php echo (!is_null($gallery)) ? 6 : 0 ?> columns">
      <article>
        <div class="hood"><?php echo $hood ?></div>
        <div class="address1"><?php echo $address1; if ($is_sold == 1) echo ' <span>(SOLD)</span>';?></div>
        <div class="address2"><?php echo $address2 ?></div>

        <? if (!empty($city) && !empty($state) && !empty($zip) ): //all must be set to show ?>
        <div class="city-state-zip"><?php echo $city.', '.$state.' '.$zip ?></div>
        <? endif; ?>

        <? if (!empty($price)): ?>
        <div class="col1 price">Price</div><div class="col2 price"><?php echo $price?></div><br />
        <? endif; ?>

        <? if (!empty($bed)): ?>
          <div class="col1">Bedrooms</div><div class="col2"><?php echo $bed?></div><br />
        <? endif; ?>

        <? if (!empty($bath)): ?>
          <div class="col1">Bathrooms</div><div class="col2"><?php echo $bath?></div><br />
        <? endif; ?>

        <? if (!empty($sqft)): ?>
          <div class="col1">Square Feet</div><div class="col2"><?php echo $sqft?></div><br />
        <? endif; ?>

        <div class="content"><?php the_content(); ?></div>

        <?php dynamic_sidebar('Listing_Page_Contact'); ?>
      </article>
        </div>
        <div class="medium-<?php echo (!is_null($gallery)) ? 6 : 0 ?> columns">
          <?php if (!is_null($gallery)) echo do_shortcode($gallery); ?>
        </div>
      </div>
    </div>
  </section>

  <?php endwhile;
endif; ?>
