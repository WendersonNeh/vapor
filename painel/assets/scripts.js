function excluirJogo(idjogo) {
    let excluirJogo = confirm("Realmente deseja excluir esse jogo?")
    
    if (excluirJogo == true)  {
        window.open("jogos_excluir.php?id" + idjogo, "_SELF"  )
    }
}