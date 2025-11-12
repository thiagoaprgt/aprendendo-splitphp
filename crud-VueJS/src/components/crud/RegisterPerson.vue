<script setup>

  const registerPersonFormButton = document.querySelectorAll('.registerPersonFormButton')[0];  

  async function submitRegisterPersonForm() {

    let form = new FormData();

    form.append("name", document.querySelectorAll('.form_registerPerson [name="name"]')[0].value);
    form.append("email", document.querySelectorAll('.form_registerPerson [name="email"]')[0].value);
    form.append("cellphone", document.querySelectorAll('.form_registerPerson [name="cellphone"]')[0].value);
    form.append("cpf", document.querySelectorAll('.form_registerPerson [name="cpf"]')[0].value);
    form.append("address", document.querySelectorAll('.form_registerPerson [name="address"]')[0].value);

       

    await fetch("http://127.0.0.1:8000/site/registerNewPerson", {
      method: "POST",
      body: form,
    });

  } 
  

</script>


<template>

  
  <div class="registerPerson">

    <form class="row g-3">

    <div class="col-md-6">
      <label for="inputEmail4" class="form-label form_registerPerson">Nome</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>

    <div class="col-md-6">
      <label for="inputEmail4" class="form-label form_registerPerson">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="email">
    </div>

    <div class="col-md-6">
      <label for="inputAddress" class="form-label">Telefone</label>
      <input type="number" class="form-control  form_registerPerson" id="inputCellphone" placeholder="1234" name="cellphone">
    </div>

    <div class="col-md-6">
      <label for="inputAddress" class="form-label">CPF</label>
      <input type="number" class="form-control form_registerPerson" id="inputAddress" placeholder="12345678912" name="cpf">
    </div>
    
    <div class="col-12">
      <label for="inputAddress" class="form-label">Endereço</label>
      <input type="text" class="form-control  form_registerPerson" id="inputAddress" placeholder="1234 Main St" name="address">
    </div>


    <div class="col-12">
      <button type="submit" class="btn btn-primary" @click="submitRegisterPersonForm" >Cadastrar pessoa</button>
    </div>

    </form>

  </div>

</template>


<style scoped>

  .registerPerson  {
    height: 100vh;   
    display: flex;
    justify-content: center;
    align-items: center;
    
  }

  form{
    background-color: rgba(53, 53, 53, 0.105);
  }


</style>



