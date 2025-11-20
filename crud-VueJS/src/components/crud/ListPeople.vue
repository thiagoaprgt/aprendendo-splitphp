<script setup>
import { onMounted, onUpdated, reactive } from 'vue';
import { ref } from 'vue';

  const people = ref([]);  // O ref([]) é usado para passar o paramêtros de maneira assíncrona que vem da API

  const name = ref('');
  const email = ref('');
  const cellphone = ref('');
  const cpf = ref('');
  const address = ref('');
 

  async function submitListPeopleForm() {

    let form = new FormData();

    form.append("name", name.value);
    form.append("email", email.value);
    form.append("cellphone", cellphone.value);
    form.append("cpf", cpf.value);
    form.append("address", address.value);

       console.log()

    let request = await fetch(import.meta.env.VITE_API + "/site/listPeopleWithFilter", {
      method: "POST",
      body: form,
    });

    let listPeople = await request.json();

    await clearListPeople();

    for (let index = 0; index < listPeople.length; index++) {
      
      people.value.push(listPeople[index]);
      
    }    



    return people;


  }  


  async function clearListPeople() {


    let tableBody= document.querySelectorAll('.listPeople tbody tr');
    
    for (let index = 0; index < tableBody.length; index++) {     

      tableBody[index].remove();
      
    }
  }


  async function deletePerson(id) {      

    let form = new FormData();
    form.append("id", id)

    let endpoint = import.meta.env.VITE_API + "/site/deletePerson";

    let list = await fetch(endpoint, {

      method: "POST",
      body: form,

    });

    await clearListPeople();
    
    let buttonListAllPeople = document.querySelectorAll('button.filterPeople')[0];
    buttonListAllPeople.click();
        

  }


  async function editPerson(id) {

    window.location.href = import.meta.env.VITE_SITE_VUEJS + '/editPerson?id=' + id

    

  }

  
  

</script>


<template>

  <div class="filterPeople">

    <div class="row g-3">

      <div class="col-md-6">
        <label for="inputEmail4" class="form-label form_registerPerson">Nome</label>
        <input type="text" v-model="name" class="form-control" id="name" name="name" placeholder="A pesquisa pode ser feita com uma parte do nome">
      </div>

      <div class="col-md-6">
        <label for="inputEmail4" class="form-label form_registerPerson">Email</label>
        <input type="email" v-model="email" class="form-control" id="inputEmail4" name="email" placeholder="A pesquisa pode ser feita com uma parte do email">
      </div>

      <div class="col-md-4">
        <label for="inputAddress" class="form-label">Telefone</label>
        <input v-model="cellphone" type="number" class="form-control  form_registerPerson" id="inputCellphone" placeholder="Tem que colocar o número correto" name="cellphone">
      </div>

      <div class="col-md-4">
        <label for="inputAddress" class="form-label">CPF</label>
        <input v-model="cpf" type="number" class="form-control form_registerPerson" id="inputAddress" placeholder="Tem que colocar o número correto" name="cpf">
      </div>
      
      <div class="col-4">
        <label for="inputAddress" class="form-label">Endereço</label>
        <input v-model="address" type="text" class="form-control  form_registerPerson" id="inputAddress" placeholder="A pesquisa pode ser feita com uma parte do endereço" name="address">
      </div>

      <div class="col-4">
        <button type="submit" class="btn btn-primary filterPeople" @click="submitListPeopleForm" >Filtrar pessoas</button>
      </div>     

      <div class="col-4">
        <button type="submit" class="btn btn-primary" @click="clearListPeople" >Limpar a lista</button>
      </div>

    </div>

  </div>

  <div class="listPeople">

    <table  class="table table-striped table-hover">

      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Telefone</th>
          <th>CPF</th>
          <th>Endereço</th>
          <th>Editar</th>
          <th>Excluir</th>
        </tr>
      </thead>
        

      <tbody>
      
        <tr v-for="person in people" :key="person.id">
            
            <td>{{ person.id }}</td>
            <td>{{ person.name }}</td>
            <td>{{ person.email }}</td>
            <td>{{ person.cellphone }}</td>
            <td> {{ person.cpf }} </td>
            <td> {{ person.address }} </td>
            <td  @click.self="editPerson(person.id)" v-bind:key="person.id"> &#128221 </td>
            <td   @click="deletePerson(person.id)" > ❌ </td>

          </tr>


      </tbody>


    </table>

  </div>
 

</template>


<style scoped>

  .filterPeople, .listPeople  {     
    
    display: flex;
    justify-content: center;
    align-items: center;
    margin: auto;
    
    
    
  }

  .filterPeople > div{
    background-color: rgba(53, 53, 53, 0.105);
  }

  

  

</style>




