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

    <div>Cadastre-se</div>

    <div>Nome Completo</div>
    <input name="name_registerPerson" type="text">

    <div>CPF</div>
    <input type="number" name="address_registerPerson">

    <div>Telefone (whatsapp):</div>
    <input type="tel" name="telephone_registerPerson">

    <div>Email:</div>
    <input type="email" name="email_registerPerson">

    <div>Endereço</div>
    <input type="text" name="address_registerPerson">

  </div>
</template>

