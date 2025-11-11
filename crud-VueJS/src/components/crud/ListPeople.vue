<script setup>


  // const FilterPeopleFormButton = document.querySelectorAll('.listPeopleFormButton')[0];  

  // async function submitListPeopleForm() {

  //   let form = new FormData();

  //   form.append("name", document.querySelectorAll('.form_listPeople [name="name"]')[0].value);
  //   form.append("email", document.querySelectorAll('.form_listPeople [name="email"]')[0].value);
  //   form.append("cellphone", document.querySelectorAll('.form_listPeople [name="cellphone"]')[0].value);
  //   form.append("cpf", document.querySelectorAll('.form_listPeople [name="cpf"]')[0].value);
  //   form.append("address", document.querySelectorAll('.form_listPeople [name="address"]')[0].value);

       

  //   await fetch("http://127.0.0.1:8000/site/listPeople", {
  //     method: "POST",
  //     body: form,
  //   });

  // } 


  async function clearListPeople() {


    let tableBody= document.querySelectorAll('.listPeople tbody tr');
    
    for (let index = 0; index < tableBody.length; index++) {     

      tableBody[index].remove();
      
    }
  }


  async function listAllPeople() {

    let endpoint = "http://127.0.0.1:8000/site/listAllPeople";

    let list = await fetch(endpoint, {

      method: "GET"

    });

    let listPeople = await list.json(); 
    
    console.log(listPeople);

    await clearListPeople();

    // return listPeople;
   

    let tableBody= document.querySelectorAll('.listPeople tbody')[0];
    

    for (let index = 0; index < listPeople.length; index++) {
      
      let tr = document.createElement("tr");

      let id = document.createElement("td");
      id.innerText = listPeople[index].id; 

      let name = document.createElement("td");
      name.innerText = listPeople[index].name;

      let email = document.createElement("td");
      email.innerText = listPeople[index].email;

      let cellphone = document.createElement("td");
      cellphone.innerText = listPeople[index].cellphone;

      let cpf = document.createElement("td");
      cpf.innerText = listPeople[index].cpf;

      let address = document.createElement("td");
      address.innerText = listPeople[index].address;
      

      let edit = document.createElement("a");
      let clickAttributeEdit = document.createAttribute('onclick');
      clickAttributeEdit.value = "editPerson(this)";
      edit.setAttributeNode(clickAttributeEdit);    
      edit.innerHTML = "&#128221";

      let remove = document.createElement("td");
      let clickAttributeRemove = document.createAttribute('onclick');
      clickAttributeRemove.value = "deletePerson(this)";
      remove.setAttributeNode(clickAttributeRemove);
      remove.innerHTML = "❌";

      let personIdAttribute = document.createAttribute('person_id');
      personIdAttribute.value = listPeople[index].id;

      edit.setAttributeNode(personIdAttribute);
      remove.setAttributeNode(personIdAttribute.cloneNode(true));
      
      tr.appendChild(id);
      tr.appendChild(name);
      tr.appendChild(email);
      tr.appendChild(cellphone);
      tr.appendChild(cpf);
      tr.appendChild(address);
      tr.appendChild(edit);
      tr.appendChild(remove);

      tableBody.appendChild(tr);
      

      
    }    

  }

  
  async function editPerson(element) {

    let form = new FormData();
    form.append("id", element.getAttribute('person_id'))

    let endpoint = "http://127.0.0.1:8000/site/updatePerson";

    let list = await fetch(endpoint, {

      method: "POST",
      body: form,

    });

  }
  

  function createTagScriptAfterMountedVueJs() {

    
    let script = document.createElement("script")
    script.innerHTML= `

      async function deletePerson(element) {

        console.log(element.getAttribute('person_id'));    

        let personId= parseInt(element.getAttribute('person_id'));

        let form = new FormData();
        form.append("id", personId)

        let endpoint = "http://127.0.0.1:8000/site/deletePerson";

        let list = await fetch(endpoint, {

          method: "POST",
          body: form,

        });

        
        let buttonListAllPeople = document.querySelectorAll('button.allPeople')[0];
        buttonListAllPeople.click()
         

      }

      async function editPerson(element) {

        window.location.href= 'http://localhost:5173/editPerson'

        console.log(element);

      }

    `;

    let body = document.querySelectorAll('body')[0].lastElementChild;
    body.insertAdjacentElement("afterend", script);

  }

  createTagScriptAfterMountedVueJs();

 
  

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
      <button class="listPeopleFormButton" @click="submitListPeopleForm">Filtrar</button>
    </div>

    <div class="form_button">
      <button class="listPeopleFormButton allPeople" @click="listAllPeople">Listar todas as pessoas</button>
    </div>

    <div class="form_button">
      <button class="listPeopleFormButton" @click="clearListPeople">Limpar a lista</button>
    </div>

  </div>

  <div class="listPeople">

    <table>

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
      


      </tbody>


    </table>

  </div>
 

</template>




