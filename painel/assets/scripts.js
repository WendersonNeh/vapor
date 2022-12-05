// tirar msg de sucesso ou erro em loguin/painel

// modelo velho

// function removeErrorMenssage() {
//     const errorMessage = document.getElementById("error_msg")
    
//     if(errorMessage != null){
//         errorMessage.remove()
//     }
    
// }

// function removeSuccessMenssage() {
//     const removeSuccessMenssage = document.getElementById("success_msg")

//     if(removeSuccessMenssage != null) {
//         removeSuccessMenssage.remove()
//     }

// }

// novo modelo de remove msg 

function removeElementoPorId(idElemento){
    let elemento = document.getElementById(idElemento)

    if(elemento != null){
        elemento.remove()
    }

}


// fim da remoção de msg automatica


// Excluir com msg de java  

function excluirJogo(idjogo) {
    let excluirJogo = confirm("Realmente deseja excluir esse jogo?")
    
    if (excluirJogo == true)  {
        window.open("jogos_excluir.php?id=" + idjogo, "_SELF")
    }
}

function excluirIdioma(ididioma) {
    let excluirIdioma = confirm("Realmente deseja excluir esse idioma?")
    
    if (excluirIdioma == true)  {
        window.open("idioma_excluir.php?id=" + ididioma, "_SELF")
    }
}

function excluirPlataforma(idplataforma) {
    let excluirPlataforma = confirm("Realmente deseja excluir essa plataforma?")
    
    if (excluirPlataforma == true)  {
        window.open("plataforma_excluir.php?id=" + idplataforma, "_SELF")
    }
}

function excluirCategoria(idcategoria) {
    let excluirCategoria = confirm("Realmente deseja excluir essa categoria?")
    
    if (excluirCategoria == true)  {
        window.open("categoria_excluir.php?id=" + idcategoria, "_SELF")
    }
}

function excluirMensagem(idmensagem) {
    let excluirMensagem = confirm("Realmente deseja arquivar essa mensagem?")
    
    if (excluirMensagem == true)  {
        window.open("mensagem_excluir.php?id=" + idmensagem, "_SELF")
    }
}


// fim da exclusao da msg 


// FUNÇÃO PARA MOSTRAR O RELOGIO

function obterDataHoraAtual() {
    const data = new Date()
    let horas = data.getHours()
    let minutos = data.getMinutes()
    let segundos = data.getSeconds()
    let dia = data.getDate() 
    let mes = data.getMonth()+1
    let ano = data.getFullYear()
    
    if(horas <= 9) {
      horas = "0" + horas
    }
  
    if(minutos <= 9) {
      minutos = "0" + minutos
    }
  
    if(segundos <= 9) {
      segundos = "0" + segundos
    }
  
  
    let dataAtual = dia + "/" + mes + "/" + ano + " - " + horas + ":" + minutos + ":" + segundos; 
  
  
    return dataAtual
  }

  function updateClock() {

    const clock = document.getElementById('relogio')
    clock.innerHTML = obterDataHoraAtual()

    setInterval(function () {
      clock.innerHTML = obterDataHoraAtual()
      1000
    })

  }


  //   fim hora