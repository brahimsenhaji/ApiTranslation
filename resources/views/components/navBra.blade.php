<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a v-for="(page, index) in pages" :key="index" class="nav-link" :class="{'active': page.name === 'Home'}" :href.prevent="page.url">@{{ page.name }}</a>
            </div>
        </div>
    </div>
</nav>

<script>
    Vue.createApp({
        data() {
            return {
                pages: [
                    {
                        name: "Home",
                        url: "{{ route('home.page') }}",
                        content: { title: "home", text: "Hello this is the home page" }
                    },
                    {
                        name: "About",
                        url: "{{ route('about.page') }}",
                        content: { title: "about", text: "This is the about page" }
                    }
                ]
            }
        }
    }).mount('nav');
</script>
