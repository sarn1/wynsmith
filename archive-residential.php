<?php get_header(); ?>
<section>
<div id="content_body">
    <h1>Residential Properties</h1>
    <div class="row">
        <div class="medium-6 columns">
            <article>
            <h2>CHICAGO RESIDENTIAL LISTINGS</h2>
                <?php
                $listings =  get_listings('residential','chicago');
                print_r($listings);
                ?>

            </article>
        </div>
        <div class="medium-6 columns">
            <article>
            <h2>SUBURBAN RESIDENTIAL LISTINGS</h2>
                <?php
                $listings =  get_listings('residential','suburban');
                print_r($listings);
                ?>
            </article>
        </div>
    </div>
</div>
</section>
<?php get_footer(); ?>