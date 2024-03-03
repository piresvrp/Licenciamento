new Vue({
	el: '#questionario',
	data: {
		Respostas: [],
	},
	async mounted() {
		await this.getRespostas();
	},
	methods: {
		async getRespostas() {
			$("#respostas").DataTable().destroy();
			this.Respostas = await vmGlobal.getController('Questionario/Respostas/lista');
			vmGlobal.montaDatatable('#respostas');
		},
	}
});