<script setup>

  const FilterPeopleFormButton = document.querySelectorAll('.listPeopleFormButton')[0];  

  async function submitListPeopleForm() {

    let form = new FormData();

    form.append("name", document.querySelectorAll('.form_listPeople [name="name"]')[0].value);
    form.append("email", document.querySelectorAll('.form_listPeople [name="email"]')[0].value);
    form.append("cellphone", document.querySelectorAll('.form_listPeople [name="cellphone"]')[0].value);
    form.append("cpf", document.querySelectorAll('.form_listPeople [name="cpf"]')[0].value);
    form.append("address", document.querySelectorAll('.form_listPeople [name="address"]')[0].value);

       

    await fetch("http://127.0.0.1:8000/site/listPeople", {
      method: "POST",
      body: form,
    });

  } 


  async function listAllPeople() {

    let endpoint = "http://127.0.0.1:8000/site/listAllPeople";

    let list = await fetch(endpoint, {

      method: "GET"

    });

    console.log(list);

  }
  

</script>


<template>

  <div class="form_listPeople">

    <div>Filtrar lista de pessoas:</div>

    <div>Nome Completo</div>
    <input name="name" type="text">

    <div>Email:</div>
    <input type="email" name="email">

    <div>Telefone (whatsapp):</div>
    <input type="number" name="cellphone">

    <div>CPF</div>
    <input type="number" name="cpf">

    <div>Endereço</div>
    <input type="text" name="address">

    <div class="form_button">
      <button class="listPeopleFormButton" @click="submitListPeopleForm">Cadastrar</button>
    </div>

    <div class="form_button">
      <button class="listPeopleFormButton" @click="listAllPeople">Listar todas pessoas</button>
    </div>

  </div>

  <div class="listPeople">

    <ul>
      <li>

      </li>
    </ul>

  </div>

</template>



