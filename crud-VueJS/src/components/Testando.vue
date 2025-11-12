
<script setup>

    function listForm() {
        window.location.href= import.meta.env.VITE_SITE_VUEJS + '/listPeople';
    }

    function registerForm() {
        window.location.href= import.meta.env.VITE_SITE_VUEJS + '/registerPerson';
    }


</script>


<template>

  
  <div class="crud">

    <div class="col-6">
      <button type="submit" class="btn btn-primary" @click="listForm" >Acesse a listagem, edição e exclução de cadastros</button>
    </div>

    <div class="col-6">
      <button type="submit" class="btn btn-primary" @click="registerForm" >Acesse o formulário de Cadastrar pessoa</button>
    </div>

  

  </div>

</template>


<style scoped>

  .crud > div  {
    height: 50vh;       
    display: flex;
    justify-content: center;
    align-items: center;
    margin: auto;
    
  }

  


</style>
