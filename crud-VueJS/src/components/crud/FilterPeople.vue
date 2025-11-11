<script setup>

  const filterPeopleFormButton = document.querySelectorAll('.filterPeopleFormButton')[0];  

  async function submitFilterPersonForm() {

    let form = new FormData();

    form.append("name", document.querySelectorAll('.form_filterPeople [name="name"]')[0].value);
    form.append("email", document.querySelectorAll('.form_filterPeople [name="email"]')[0].value);
    form.append("cellphone", document.querySelectorAll('.form_filterPeople [name="cellphone"]')[0].value);
    form.append("cpf", document.querySelectorAll('.form_filterPeople [name="cpf"]')[0].value);
    form.append("address", document.querySelectorAll('.form_filterPeople [name="address"]')[0].value);

       

    await fetch("http://127.0.0.1:8000/site/filterPeople", {
      method: "POST",
      body: form,
    });

  } 
  

</script>


<template>

  <div class="form_filterPeople">

    <div>Cadastre-se</div>

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
      <button class="filterPeopleFormButton" @click="submitFilterPersonForm">Cadastrar</button>
    </div>

  </div>

</template>



