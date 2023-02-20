function mostrarSenha(event) {
  event.preventDefault();
  var inputSenha = document.getElementById("password");
  var icon = document.getElementById("icon");
  if(inputSenha.type == "password"){
      inputSenha.type = "text";
      icon.className = "fa-regular fa-eye-slash"
  }
  else{
      inputSenha.type = "password";
      icon.className = "fa-regular fa-eye"
  }
}

let inputImg = document.querySelector("#inputLink");

inputImg.addEventListener("focusout", function(){ 
  var link = inputImg.value;
  var img = document.querySelector(".produto_img");
  img.src = link;
  if(img.src == "" || !link.includes("http") || !link.includes("https")){
    img.src = "../_images/sem_imagem.png"
  }
});



function apagarUsuario(event, id) {
  event.preventDefault();

  Swal.fire({
    title: 'Realmente deseja excluir?',
    text: "Você não será capaz de reverter isso!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Excluir'
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Excluído!',
        'O usuário foi  excluído.',
        'success'
      ).then(okay => {
        if (okay) {
            window.location.href = "../tabelas/apagar.php?idUser= " + id;
        }
      }
      
  )}}) 


}


function apagarProduto(event, id) {
  event.preventDefault();

  Swal.fire({
    title: 'Realmente deseja excluir?',
    text: "Você não será capaz de reverter isso!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Excluir'
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Excluído!',
        'O produto foi  excluído.',
        'success'
      ).then(okay => {
        if (okay) {
            window.location.href = "../tabelas/apagar.php?id= " + id;
        }
      }
      
  )}}) 


}


function voltarTabela(event) {
  event.preventDefault();

  Swal.fire({
    title: 'Cancelar a edição do produto?',
    text: "Você não será capaz de reverter isso!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Cancelar',
    cancelButtonText: 'Continuar'

  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Edição Cancelada!',
        ' ',
        'success'
      ).then(okay => {
        if (okay) {
          window.location.href = "listar_produtos.php";
        }
      }
      
      )}}) 
    }


    
function voltarTabelaUser(event) {
  event.preventDefault();

  Swal.fire({
    title: 'Cancelar a edição do usuário?',
    text: "Você não será capaz de reverter isso!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Cancelar',
    cancelButtonText: 'Continuar'

  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Edição Cancelada!',
        ' ',
        'success'
      ).then(okay => {
        if (okay) {
          window.location.href = "listar_usuarios.php";
        }
      }
      
      )}})}



      function apagarVenda(event, id, qtd, cod) {
        event.preventDefault();

        Swal.fire({
          title: 'Realmente deseja excluir?',
          text: "Você não será capaz de reverter isso!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Excluir'
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire(
              'Excluído!',
              'A Venda foi  excluída.',
              'success'
            ).then(okay => {
              if (okay) {
                  window.location.href = "../tabelas/apagar.php?idVenda=" + id + "&qtd=" + qtd + "&cod=" + cod;
              }
            }
            
        )}}) 
      
      
      }