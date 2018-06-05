window.onload = init; //quando a janela estiver pronta vai executar init

var frm;

function init(e) {
	//window.alert("TERMINEI DE CARREGAR!");

	frm = document.getElementById('frmCadastro'); //procurar no html esta função

	

	frm.addEventListener('submit', submitForm); //add um ouvinte executa a função
}

function submitForm(evento) {
	var nomeInput = document.getElementById('nome'); //objeto
	var cpfInput = document.getElementById('cpf'); //objeto

	//validar os campos
	var nome = nomeInput.value;
	var cpf = cpfInput.value;

	var msg = [];

	if (nome.length < 5) {
		msg.push("Informe o seu nome completo!");
		nomeInput.style.borderColor = "red";
	}

	if(!TestaCPF(cpf)) {
		msg.push("Cpf está inválido!");
		cpfInput.style.borderColor = "red";
	}

	if(msg.length > 0 ){
	evento.preventDefault();

	window.alert(msg.join("\n"));

}
/*var validaCpf = TestaCPF(cpf);

	console.log(validaCpf);

	console.log(nome, cpf);*/


	console.log(evento);
}
