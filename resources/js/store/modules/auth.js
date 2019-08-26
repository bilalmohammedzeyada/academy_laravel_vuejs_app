import axios from "axios";

const state = {
    user: null,
    is_authenticated: false,
    access_token: null
};

const getters = {
    getCurrUser: state => state.user,
    isAuthenticated: state => state.user != null && state.user.id != null,
    getAccessToken: state => state.access_token
};

const actions = {
    async registerNewUser(
        { commit },
        { username, email, password, first_name, last_name }
    ) {
        const newUser = {
            username,
            email,
            password,
            first_name,
            last_name
        };

        const response = await axios
            .post("/api/register", newUser)
            .catch(err => console.log(err));
        if (response == null || response.data == null) {
            console.log(err);
            return null;
        }
        const user = response.data.user;
        const access_token = response.data.access_token;
        commit(user, "setUser");
        commit(access_token, "setAccessToken");
    }
};

const mutations = {
    setUser: (state, newUser) => (state.user = newUser),
    setAccessToken: (state, newAccess_token) =>
        (state.access_token = newAccess_token)
};

export default {
    /*  namespaced: true,
    state: initialState, */
    state,
    getters,
    actions,
    mutations
};
