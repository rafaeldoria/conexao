<div class="signup-search-area d-flex align-items-center justify-content-end">
    <div class="search_button">
        <a class="searchBtn" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
    </div>
    <!-- Search Form -->
    <div class="search-hidden-form">
        <form action="{{route('searchArticles')}}" method="post">
            @csrf
            <input type="search" name="search" id="search-anything" placeholder="Pesquisar...">
            <input type="submit" value="" class="d-none">
            <span class="searchBtn"><i class="fa fa-times" aria-hidden="true"></i></span>
        </form>
    </div>
</div>