<script setup>

  async function submitUpdatePersonForm() {

    let form = new FormData();

    form.append("name", document.querySelectorAll('.form_updatePerson [name="name"]')[0].value);
    form.append("email", document.querySelectorAll('.form_updatePerson [name="email"]')[0].value);
    form.append("cellphone", document.querySelectorAll('.form_updatePerson [name="cellphone"]')[0].value);
    form.append("cpf", document.querySelectorAll('.form_updatePerson [name="cpf"]')[0].value);
    form.append("address", document.querySelectorAll('.form_updatePerson [name="address"]')[0].value);

       

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
    <input type="tel" name="telephone_updatePerson">

    <div>Email:</div>
    <input type="email" name="email_updatePerson">

    <div>CPF</div>
    <input type="number" name="cpf">

    <div>Endereço</div>
    <input type="text" name="address_updatePerson">

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
