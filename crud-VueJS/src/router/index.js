import { createRouter, createWebHashHistory, createWebHistory } from 'vue-router';

import Testando from './../components/Testando.vue';
import RegisterPerson from './../components/crud/RegisterPerson.vue';
import ListPeople from './../components/crud/ListPeople.vue';
import EditPerson from './../components/crud/EditPerson.vue';

const routes = [

   
    {
        path: "/registerPerson",
        name: "RegisterPerson",
        component: RegisterPerson,
    },

    {
        path: "/listPeople",
        name: "ListPeople",
        component: ListPeople,
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