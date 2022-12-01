// tirar msg de sucesso ou erro em loguin/painel

function removeErrorMenssage() {
    const errorMessage = document.getElementById("error_msg")
    
    if(errorMessage != null){
        errorMessage.remove()
    }
    
}

function removeSuccessMenssage() {
    const removeSuccessMenssage = document.getElementById("success_msg")

    if(removeSuccessMenssage != null) {
        removeSuccessMenssage.remove()
    }

}



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
    let excluirMensagem = confirm("Realmente deseja excluir essa mensagem?")
    
    if (excluirMensagem == true)  {
        window.open("mensagem_excluir.php?id=" + idmensagem, "_SELF")
    }
}


// fim da exclusao da msg 


