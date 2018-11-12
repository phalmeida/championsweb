var tempo = new Number();
// Tempo em segundos
tempo = 600; //10 min

function startCountdown(){

	// Se o tempo n�o for zerado
	if((tempo - 1) >= 0){

		// Pega a parte inteira dos minutos
		var min = parseInt(tempo/60);
		// Calcula os segundos restantes
		var seg = tempo%60;

		// Formata o n�mero menor que dez, ex: 08, 07, ...
		if(min < 10){
			min = "0"+min;
			min = min.substr(0, 2);
		}
		if(seg <=9){
			seg = "0"+seg;
		}

		// Cria a vari�vel para formatar no estilo hora/cron�metro
		horaImprimivel = min + ':' + seg;
		//JQuery pra setar o valor
		$("#sessao").html(horaImprimivel);

		// Define que a fun��o ser� executada novamente em 1000ms = 1 segundo
		setTimeout('startCountdown()',1000);

		// diminui o tempo
		tempo--;

	// Quando o contador chegar a zero faz esta a��o
	} else {
		window.open('/sistsalon/sair/', '_self');
	}

}

// Chama a fun��o ao carregar a tela
startCountdown();