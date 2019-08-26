import Vue from "vue";
import VueRouter from "vue-router";

/* import ChangePassword from '../components/ChangePassword.vue' */
import HomeComponent from "../components/HomeComponent.vue";
import ExploreComponent from "../components/ExploreComponent.vue";
import LoginComponent from "../components/LoginComponent.vue";
import RegisterComponent from "../components/RegisterComponent.vue";

Vue.use(VueRouter);

const routes = [
    { path: "/", component: HomeComponent, name: "Home" },
    { path: "/explore", component: ExploreComponent, name: "Explore" },
    { path: "/login", component: LoginComponent, name: "Login" },
    { path: "/register", component: RegisterComponent, name: "Register" }
    /* { path: '/change-password', component: ChangePassword, name: 'auth.change_password' },
    { path: '/roles', component: RolesIndex, name: 'roles.index' },
    { path: '/roles/create', component: RolesCreate, name: 'roles.create' },
    { path: '/roles/:id', component: RolesShow, name: 'roles.show' },
    { path: '/roles/:id/edit', component: RolesEdit, name: 'roles.edit' },
    { path: '/users', component: UsersIndex, name: 'users.index' },
    { path: '/users/create', component: UsersCreate, name: 'users.create' },
    { path: '/users/:id', component: UsersShow, name: 'users.show' },
    { path: '/users/:id/edit', component: UsersEdit, name: 'users.edit' },
    { path: '/companies', component: CompaniesIndex, name: 'companies.index' },
    { path: '/companies/create', component: CompaniesCreate, name: 'companies.create' },
    { path: '/companies/:id', component: CompaniesShow, name: 'companies.show' },
    { path: '/companies/:id/edit', component: CompaniesEdit, name: 'companies.edit' },
    { path: '/employees', component: EmployeesIndex, name: 'employees.index' },
    { path: '/employees/create', component: EmployeesCreate, name: 'employees.create' },
    { path: '/employees/:id', component: EmployeesShow, name: 'employees.show' },
    { path: '/employees/:id/edit', component: EmployeesEdit, name: 'employees.edit' }, */
];

export default new VueRouter({
    mode: "history",
    /* base: '/admin', */
    routes
});
