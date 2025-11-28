
const txtTitulo = document.querySelector("#txtTitulo");
const divErro = document.getElementById("divMsgErro");


if (txtTitulo) {
    txtTitulo.addEventListener("input", function () {
        const titulo = txtTitulo.value.trim();
        if (!titulo) {
            mostrarFeedbackTitulo("");
            return;
        }

        var url = "JogoController.php?action=validarTituloAjax&titulo=" + encodeURIComponent(titulo);

        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", url);
        xhttp.onload = function () {
            var json = xhttp.responseText;
            try {
                var resp = JSON.parse(json);
                if (resp.existe) {
                    mostrarFeedbackTitulo("⚠️ Já existe jogo com este título", "red");
                } else {
                    mostrarFeedbackTitulo("✔️ Título disponível", "green");
                }
            } catch (e) {
                mostrarFeedbackTitulo("Erro na validação", "orange");
            }
        };
        xhttp.send();
    });
}

function mostrarFeedbackTitulo(msg, cor) {
    let feedback = document.getElementById("feedbackTitulo");
    if (!feedback) {
        feedback = document.createElement("div");
        feedback.id = "feedbackTitulo";
        feedback.classList.add("form-text");
        txtTitulo.parentNode.appendChild(feedback);
    }
    feedback.textContent = msg;
    feedback.style.color = cor || "inherit";
}


const botoesExcluir = document.querySelectorAll(".excluir-btn");

botoesExcluir.forEach(btn => {
    btn.addEventListener("click", function () {
        if (!confirm("Confirma a exclusão?")) return;

        const id = btn.dataset.id;

        var dados = new FormData();
        dados.append("id", id);

        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "JogoController.php?action=excluirAjax");
        xhttp.onload = function () {
            var json = xhttp.responseText;
            try {
                var resp = JSON.parse(json);
                if (resp.ok) {
                    // Remove a linha da tabela
                    btn.closest("tr").remove();
                } else {
                    alert("Erro ao excluir: " + (resp.erros ? resp.erros.join(", ") : "desconhecido"));
                }
            } catch (e) {
                alert("Erro inesperado na resposta do servidor");
            }
        };
        xhttp.send(dados);
    });
});
