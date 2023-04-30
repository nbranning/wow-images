import { createStore } from 'vuex'

const store = createStore({
    state: {
        nasaImages: {},
        page: 1
    },
    getters: {
        getNasaImages: (state) => state.nasaImages,
    },
    mutations: {
        setNasaImages(state, nasaImages) {
            state.nasaImages = nasaImages;
        },
        setPage(state) {
            state.page++;
        },
    },
    actions: {
        async fetchNasaImages({ commit, state }) {
            try {
                const data = await axios.get("/api/get_images/"+state.page);
                commit("setNasaImages", data.data);
            } catch (error) {
                alert(error);
                console.log(error);
            }
        },
    }
})

export default store
