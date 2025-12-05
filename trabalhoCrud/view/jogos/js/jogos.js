
const selGenero = document.querySelector("#selGenero");
const selConsole = document.querySelector("#selConsole");
const divErro = document.getElementById("divMsgErro");


function salvarJogo(){
    const titulo = document.querySelector("#txtTitulo").value;
    const data = document.querySelector("#dataLancamento").value;
    const genero = selGenero.value;
    const console2 = selConsole.value;
    const diretor = document.querySelector("#txtDiretor").value;
    const img = document.querySelector("#txtImg").value;

    const dados = new FormData();
    dados.append("titulo",titulo);
    dados.append("idGenero", genero);
    dados.append("data",data)
    dados.append("idConsole", console2);
    dados.append("diretor", diretor);
    dados.append("img",img);

    //alert(titulo + " - " + genero + " - "+ data + " - " + console2 + " - " + diretor + " - " + img);
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST","/trabalhoCrud/api/jogos_salvar.php");
    xhttp.onload = function(){
        //console.log(xhttp.responseText);
      
        const erros = xhttp.responseText;
        if(erros){
           
            divErro.innerHTML = erros;
            divErro.style.display = "block";
        }else{
            
            window.location = "listar.php";
            
        }
    }
    xhttp.send(dados);
}


function excluirJogo(id){

        
        if(confirm("Confirma a exclusão?")){

             const dados = new FormData();
            dados.append("id",id);
            const xhttp = new XMLHttpRequest();
            xhttp.open("POST","/trabalhoCrud/api/jogos_excluir.php");
            xhttp.onload = function(){
        
        const erros = xhttp.responseText;
        if(erros){
            
                divErro.innerHTML = erros;
                divErro.style.display = "block";
            }else {
                
                location.reload();
            }
    }   

    xhttp.send(dados);
        }
        

}

function verificaTitulo(){

    const titulo = document.querySelector("#txtTitulo").value.trim();
    if(titulo){
        const xhttp = new XMLHttpRequest();
        const dados = new FormData();
        dados.append("titulo", titulo);

        xhttp.open("POST","/trabalhoCrud/api/jogos_verifica_titulo.php");

        xhttp.onload = function(){
            const erros = xhttp.responseText.trim();

            if (erros !== "") {
                divErro.innerHTML = erros;
                divErro.style.display = "block";
            } else {
                divErro.style.display = "none";
                divErro.innerHTML = "";
            }
        };

        xhttp.send(dados);
    }
}