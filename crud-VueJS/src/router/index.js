import { createRouter, createWebHashHistory, createWebHistory } from 'vue-router';

import Testando from './../components/Testando.vue';
import RegisterPerson from './../components/crud/RegisterPerson.vue';
import FilterPeople from './../components/crud/FilterPeople.vue';
import EditPerson from './../components/crud/EditPerson.vue';

const routes = [

   
    {
        path: "/registerPerson",
        name: "RegisterPerson",
        component: RegisterPerson,
    },

    {
        path: "/filterPeople",
        name: "FilterPeople",
        component: FilterPeople,
    },

    {
        path: "/editPerson",
        name: "EditPerson",
        component: EditPerson,
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes  
});

export default router;