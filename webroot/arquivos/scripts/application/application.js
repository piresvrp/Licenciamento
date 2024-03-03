const Loading = new Vue({
	data: {
		level: 0
	},
	methods: {
		show() {
			this.level++;
			$('.page-loader-wrapper').show();
		},
		hide() {
			this.level--;
			if (this.level == 0) {
				$('.page-loader-wrapper').hide();
			}
		}
	}
});

const vmGlobal = new Vue({
	methods: {
		async getController(action, params = null) {
			Loading.show();
			var output = {};
			await axios.post(base_url + action, $.param(params))
				.then((response) => {
					output = response.data;
				})
				.catch((e) => {
					console.log(e);
					Swal.fire({
						position: 'center',
						type: 'error',
						title: 'Erro!',
						text: 'Erro ao acessar o sistema.',
						showConfirmButton: true,
					});
				})
				.finally(() => {
					Loading.hide();
				});
			return output;
		},
		montaDatatable(id) {
			try {
				this.$nextTick(function () {
					$(id).DataTable({
						'destroy': true,
						'oLanguage': {
							'sEmptyTable': 'Nenhum Registro Encontrado.',
							'sInfo': 'Exibindo _START_ até _END_ de _TOTAL_ Registros Encontrados',
							'sInfoEmpty': '',
							'sInfoFiltered': '(Filtrados no Total de _MAX_ Registros)',
							'sInfoPostFix': '',
							'sInfoThousands': '.',
							'sLengthMenu': 'Mostrar _MENU_ registros / pagina',
							'sLoadingRecords': 'Carregando...',
							'sProcessing': 'Processando...',
							'sZeroRecords': 'Nenhum Registro Encontrado.',
							'sSearch': 'Busca: ',
							'oPaginate': {
								'sNext': '<i class="fas fa-chevron-right"></i>',
								'sPrevious': '<i class="fas fa-chevron-left"></i>',
								'sFirst': 'Primeiro',
								'sLast': 'Último'
							},
							'oAria': {
								'sSortAscending': ': Ordenar colunas de forma ascendente',
								'sSortDescending': ': Ordenar colunas de forma descendente'
							}
						},
					});
				});
			} catch (err) {
				console.error(err);
			}
		},
		//função global para formatar data eng -> pt or pt -> eng
		formatDate(date, input = 'YYYY-MM-DD', output = 'DD/MM/YYYY') {
			return moment(date, input).format(output);
		},
		//função global para formatar data Back-end
		strToDate(date) {
			return this.formatDate(date, 'DD/MM/YYYY', 'YYYY-MM-DD');
		},
		//função global para formatar data Front-end
		dateToStr(date) {
			return this.formatDate(date, 'YYYY-MM-DD', 'DD/MM/YYYY');
		},
		Vencido(date) {
			if (date) {
				var today = new Date();
				var prazo = moment(date).toDate();
				today.setHours(0, 0, 0, 0);
				prazo.setHours(0, 0, 0, 0);
				return (prazo.getTime() < today.getTime());
			}
			return false;
		},
		formatMoney(numero, cifra = 'R$') {
			var money = parseFloat(numero).toString().split('.');
			money[0] = money[0].split(/(?=(?:...)*$)/).join('.');
			money[1] = ((money.length == 1) ? '00' : money[1].padEnd(2, '0'));
			return cifra + money.join(',');
		},
		validarEmail(strEmail) {
			return /^[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9-]{2,24}$/.test(strEmail);
		},
		validarCPF(strCPF) {
			var Resto;
			var Soma = 0;
			for (var i = 0; i <= 9; i++)
				if (strCPF == i.toString().padEnd(11, i)) return false;
			for (i = 1; i <= 9; i++)
				Soma += (parseInt(strCPF.substring(i - 1, i)) * (11 - i));
			Resto = ((Soma * 10) % 11);
			if (Resto > 9) Resto = 0;
			if (Resto != parseInt(strCPF.substring(9, 10))) return false;
			Soma = 0;
			for (i = 1; i <= 10; i++)
				Soma += parseInt(strCPF.substring(i - 1, i)) * (12 - i);
			Resto = ((Soma * 10) % 11);
			if (Resto > 9) Resto = 0;
			return (Resto == parseInt(strCPF.substring(10, 11)));
		},
		showMessage(texto, tipo = 'success', titulo = 'Salvo') {
			Swal.fire({
				position: 'center',
				type: tipo,
				title: titulo,
				text: texto,
				showConfirmButton: true,
			});
		}
	}
});
