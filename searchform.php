<form role="search" method="get" id="searchform"
    class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div>
      <label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?><i class="fas fa-search"></i></label>
      <input type="text" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php the_search_query(); ?>"id="s" />
      <input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
    </div>
</form>