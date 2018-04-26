<template>
    <main-layout @search="search">
        <v-poster-list :posters="movies"></v-poster-list>
    </main-layout>
</template>

<script>
import MainLayout from '../layouts/Main.vue';
import VPosterList from '../components/VPosterList.vue';

export default {
    components: {
        MainLayout,
        VPosterList
    },
    data() {
        const cancelToken = window.axios.cancelToken;
        const axiosCancel = cancelToken.source();
        return {
            movies: [],
            axiosCancel: axiosCancel
        };
    },
    mounted() {
        window.axios.get('api').then(response => {
            this.movies = response.data.data;
        });
    },
    methods: {
        getSource() {
            switch (window.location.pathname) {
                case '/':
                    return 'api';

                case '/top-rated':
                    return 'api/top-rated';

                case '/search':
                    return 'api/search';
            }
        },
        search(searchQuery) {
            // axios.get('/user/12345', {
            //   cancelToken: source.token
            // }).catch(function(thrown) {
            //   if (axios.isCancel(thrown)) {
            //     console.log('Request canceled', thrown.message);
            //   } else {
            //     // handle error
            //   }
            // });

            axiosCancel.cancel('Operation canceled by the user.');

            window.axios.get('api/search', {
                params: {q: searchQuery},
                cancelToken: this.axiosCancel,
            }).then(response => {
                this.movies = response.data.data;
            });
        }
    },
};

</script>
