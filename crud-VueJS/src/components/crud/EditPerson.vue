<script setup>

  function getIdonUrl() {

    let urlComplete = window.location.href;
    let urlWithoutQueryString = window.location.protocol + "//"+ window.location.host + window.location.pathname;

    let id = urlComplete.slice(parseInt(urlWithoutQueryString.length) + 4);
    return parseInt(id);

  }

  async function getPerson() {  

    let id = getIdonUrl();
    
    let form = new FormData();
    form.append("id", id);

    let request = await fetch("http://127.0.0.1:8000/site/findPersonById", {
      method: "POST",
      body: form,
    });

    let json = await request.json();

    let person = json[0];

    // console.log(person);

    document.querySelectorAll('[name="name_updatePerson"]')[0].value = person.name;
    document.querySelectorAll('[name="email_updatePerson"]')[0].value = person.email;
    document.querySelectorAll('[name="cellphone_updatePerson"]')[0].value = person.cellphone;
    document.querySelectorAll('[name="cpf_updatePerson"]')[0].value = person.cpf;
    document.querySelectorAll('[name="address_updatePerson"]')[0].value = person.address;
  
  }

  getPerson();

  async function submitUpdatePersonForm() {

    let form = new FormData();

    form.append("id", getIdonUrl());
    form.append("name", document.querySelectorAll('[name="name_updatePerson"]')[0].value);
    form.append("email", document.querySelectorAll('[name="email_updatePerson"]')[0].value);
    form.append("cellphone", document.querySelectorAll('[name="cellphone_updatePerson"]')[0].value );
    form.append("cpf", document.querySelectorAll('[name="cpf_updatePerson"]')[0].value);
    form.append("address", document.querySelectorAll('[name="address_updatePerson"]')[0].value);

       

    await fetch("http://127.0.0.1:8000/site/updatePerson", {
      method: "POST",
      body: form,
    });

    window.location.href= 'http://localhost:5173/listPeople';

  } 

</script>

<template>
  
  
  <div class="editPerson">

    <div class="row g-3">

    <div class="col-md-6">
      <label for="inputEmail4" class="form-label form_registerPerson">Nome</label>
      <input type="text" class="form-control" id="name" name="name_updatePerson">
    </div>

    <div class="col-md-6">
      <label for="inputEmail4" class="form-label form_registerPerson">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="email_updatePerson">
    </div>

    <div class="col-md-6">
      <label for="inputAddress" class="form-label">Telefone</label>
      <input type="number" class="form-control  form_registerPerson" id="inputCellphone" placeholder="1234" name="cellphone_updatePerson">
    </div>

    <div class="col-md-6">
      <label for="inputAddress" class="form-label">CPF</label>
      <input type="number" class="form-control form_registerPerson" id="inputAddress" placeholder="12345678912" name="cpf_updatePerson">
    </div>
    
    <div class="col-12">
      <label for="inputAddress" class="form-label">Endereço</label>
      <input type="text" class="form-control  form_registerPerson" id="inputAddress" placeholder="1234 Main St" name="address_updatePerson">
    </div>


    <div class="col-12">
      <button type="submit" class="btn btn-primary" @click="submitUpdatePersonForm" >Atualizar cadastro</button>
    </div>

  </div>

  </div>
  
</template>

<style scoped>

  .editPerson  {
    height: 100vh;   
    display: flex;
    justify-content: center;
    align-items: center;
    
  }

  .editPerson > div{
    background-color: rgba(53, 53, 53, 0.105);
  }

</style>
