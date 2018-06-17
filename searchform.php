<div class="search-container">
    <form id="search-form" class="search-form" role="search" method="get" action="<?php echo
    home_url( '/' ) ?>">
        <label for="s" id="search-label" class="screen-reader">Search</label>
        <section class="search-text-area">
            <input id="s" class="search-field" type="search" name="s" title="search" placeholder="CSS grid"
                   value="<?php echo get_search_query() ?>"
                   autocomplete="off" spellcheck="false" role="combobox">
        </section>
        <button type="button" id="btn-close-search" class="btn-close-search" value="X"
                onclick="visibilityToggle('search-section'); hide(); ">
                    <span class="close-x">
                        <?php echo FineDiv_get_svg( array( 'icon' => 'close-x' ) ) ?>
                    </span>
        </button>
    </form>
</div>
