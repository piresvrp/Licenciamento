const vmLogin = new Vue({
	el: '#login',
	data: {
		Login: {}
	},
	methods: {
		async loginController() {
			var output = {
				status: false,
				result: 'Erro ao acessar o sistema!'
			};
			await axios.post(base_url + 'Login/login', $.param(this.Login))
				.then((response) => {
					output = response.data;
				})
				.catch((e) => {
					console.log(e);
				});
			return output;
		},
		async efetuarLogin() {
			if (this.Login.Email.indexOf('@') < 0) {
				this.Login.Email += '@dnit.gov.br';
			}
			if (this.validarEmail(this.Login.Email)) {
				$(".page-loader-wrapper").show();
				var resp = await this.loginController();
				if (resp.status) {
					//redireciona
					window.location.href = base_url
					return;
				}
				Swal.fire({
					position: 'center',
					type: 'error',
					title: 'Erro!',
					text: resp.result,
					showConfirmButton: true,
				});
				$(".page-loader-wrapper").hide();
				this.btnSalvar = false;
				this.gerarNumeros();
				this.Login = {}
			} else {
				Swal.fire({
					position: 'center',
					type: 'error',
					title: 'Erro!',
					text: 'E-mail inválido!',
					showConfirmButton: true,
				});
			}
		},
		validarEmail(strEmail) {
			return /^[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9-]{2,24}$/.test(strEmail);
		}
	}
});
// Configurações iniciais do template 
$(document).ready(function() {
	//pegar altura do monitor
	var altura = screen.height;
	$('.content').css('min-height', altura);
	//setar cor do tema
	$('body').removeClass('theme-blush');
	$('body').addClass(localStorage.getItem('ThemeOption'));
	$('body').addClass(localStorage.getItem('ThemeOptionCor'));
	//muda e esconde loader
	$(".page-loader-wrapper").hide();
	if (localStorage.getItem('ThemeOption') === 'theme-dark') {
		$('.page-loader-wrapper .loader img').attr('src', base_url + 'webroot/arquivos/images/loader1.gif');
	} else {
		$('.page-loader-wrapper .loader img').attr('src', base_url + 'webroot/arquivos/images/loader2.gif');
	}
});