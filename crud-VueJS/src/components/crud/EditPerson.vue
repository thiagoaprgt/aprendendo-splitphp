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

    form.append("name", document.querySelectorAll('[name="name_updatePerson"]')[0].value);
    form.append("email", document.querySelectorAll('[name="email_updatePerson"]')[0].value);
    form.append("cellphone", document.querySelectorAll('[name="cellphone_updatePerson"]')[0].value );
    form.append("cpf", document.querySelectorAll('[name="cpf_updatePerson"]')[0].value);
    form.append("address", document.querySelectorAll('[name="address_updatePerson"]')[0].value);

       

    await fetch("http://127.0.0.1:8000/site/updatePerson", {
      method: "POST",
      body: form,
    });

  } 

</script>

<template>
  <div>

    <div>Editar pessoas</div>

    <div>Nome Completo</div>
    <input name="name_updatePerson" type="text">

    <div>Telefone (whatsapp):</div>
    <input type="number" name="cellphone_updatePerson">

    <div>Email:</div>
    <input type="email" name="email_updatePerson">

    <div>CPF</div>
    <input type="number" name="cpf_updatePerson">

    <div>Endereço</div>
    <input type="text" name="address_updatePerson">

    <div>
      <button>Atualizar o cadastro</button>
    </div>

  </div>
</template>

<style scoped>
h1 {
  font-weight: 500;
  font-size: 2.6rem;
  position: relative;
  top: -10px;
}

h3 {
  font-size: 1.2rem;
}

.greetings h1,
.greetings h3 {
  text-align: center;
}

@media (min-width: 1024px) {
  .greetings h1,
  .greetings h3 {
    text-align: left;
  }
}
</style>
