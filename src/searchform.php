<form role="search" method="get" id="search-form" action="/" >
    <label>
        <span class="screen-reader-text">Search</span>
        <input type="search" class="search-field" placeholder="Enter search …" value="<?php if( is_search() ){ echo get_search_query(); } ?>" name="s">
    </label>
    <input type="submit" class="search-submit button" value="Go">
</form>