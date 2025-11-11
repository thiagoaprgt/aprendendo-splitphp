<script setup>
defineProps({
  msg: {
    type: String,
    required: true,
  },
})
</script>

<template>
  <div>

    <div>Editar pessoas</div>

    <div>Nome Completo</div>
    <input name="name_registerPerson" type="text">

    <div>Telefone (whatsapp):</div>
    <input type="tel" name="telephone_registerPerson">

    <div>Email:</div>
    <input type="email" name="email_registerPerson">

    <div>CPF</div>
    <input type="number" name="cpf">

    <div>Endereço</div>
    <input type="text" name="address_registerPerson">

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
