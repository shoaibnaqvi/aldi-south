const Movies = {
    template: `
        <div class="movies-list-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-2 pull-left">
                    <span>Per Page: </span>
                    <select v-model="pagination.per_page" v-on:change="setPerPage()">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="col-lg-4 my-3 pull-left">
                    <input type="text" v-model="searchParam" placeholder="Search movie...">
                    <input type="button" value="Search" v-on:click="searchMovie()"/>
                </div>
                <div class="col-lg-4 my-3 pull-right">
                    <div class="pull-right">
                        <div class="btn-group">
                            <button class="btn btn-info" id="list" v-on:click="styleList()">
                                List View
                            </button>
                            <button class="btn btn-danger" id="grid" v-on:click="styleGrid()">
                                Grid View
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="products" class="row view-group">
                <div class="item col-xs-4 col-lg-4"
                     v-bind:class="{ 'grid-group-item': style_grid, 'list-group-item': !style_grid,  }"
                     v-for="(movie, index) in movies">
                    <div class="thumbnail card">
                        <div class="img-event">
                            <img class="group list-group-image img-fluid" src="http://placehold.it/350x250/000/fff"
                                 alt=""/>
                        </div>
                        <div class="caption card-body">
                            <h4 class="group card-title inner list-group-item-heading">{{ movie.attributes.name }}</h4>
                            <p class="group inner list-group-item-text">
                                {{ movie.attributes.description.substring(0, 30) + "..." }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>`,
    components: {},
    created: function () {
        var _this = this;
        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() == $(document).height()) {
                _this.pagination.current_page += 1;
                if (_this.pagination.current_page <= _this.pagination.last_page) {
                    _this.getMovies();
                }
            }
        });
    },
    data: function () {
        return initialState();
    },
    methods: {
        getMovies: function () {
            var _this = this;

            $.blockUI({
                css: {
                    border: 'none',
                    padding: '15px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .5,
                    color: '#fff'
                },
                message: 'Loading articles. Please wait...'
            });

            var moviesUrl = '/api/v1/movies?page[number]=' + this.pagination.current_page + '&page[size]=' + this.pagination.per_page;

            if (null !== _this.searchParam && '' !==  _this.searchParam) {
                moviesUrl += '&filter[q]=' + _this.searchParam;
            }

            axios.get(moviesUrl).then(function (movies) {
                _this.movies = jQuery.merge(movies.data.data, _this.movies);
                _this.pagination = movies.data.meta.pagination;
                $.unblockUI();
            });

        },
        styleGrid: function () {
            this.style_grid = true;
        },
        styleList: function () {
            this.style_grid = false;
        },
        searchMovie: function () {
            this.pagination.current_page = 1;
            this.movies = [];
            this.getMovies();
        },
        setPerPage: function () {
            this.pagination.current_page = 1;
            this.movies = []
            this.getMovies();
        },
        resetWindow: function () {
            Object.assign(this.$data, initialState());
        }
    },
    mounted: function () {
        this.resetWindow();
        this.getMovies();
    }
};


function initialState() {
    return {
        style_grid: true,
        isActive: true,
        movies: [],
        pagination: {
            'current_page': 1,
            'per_page': 25,
            'last_page': 1
        },
        searchParam: null,
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    };
}

export default Movies;
