// Configurações do template 
$(document).ready(function() {
	//setar cor do tema
	$('body').removeClass('theme-blush');
	$('body').addClass(localStorage.getItem('ThemeOption'));
	$('body').addClass(localStorage.getItem('ThemeOptionCor'));
	//checar radio de acordo com a cor do tema
	if (localStorage.getItem('ThemeOption') === 'theme-dark') {
		$('#darktheme').prop("checked", true);
		$('.page-loader-wrapper .loader img').attr('src', base_url + 'webroot/arquivos/images/loader1.gif');
	} else {
		$('#lighttheme').prop("checked", true);
		$('.page-loader-wrapper .loader img').attr('src', base_url + 'webroot/arquivos/images/loader2.gif');
	}
	//maximiza menu
	$('body').removeClass('ls-toggle-menu');
	//pegar altura do monitor
	var altura = screen.height;
	$('.content').css('min-height', altura)
});
$(".page-loader-wrapper").hide();
//cor de fundo do tema
$('#darktheme').click(function() {
	localStorage.setItem('ThemeOption', 'theme-dark');
});
$('#lighttheme').click(function() {
	localStorage.setItem('ThemeOption', '');
});
//cor dos textos do tema
$('.blue').click(function() {
	localStorage.setItem('ThemeOptionCor', '');
	localStorage.setItem('ThemeOptionCor', 'theme-purple');
});
$('.purple').click(function() {
	localStorage.setItem('ThemeOptionCor', '');
	localStorage.setItem('ThemeOptionCor', 'theme-blue');
});
$('.cyan').click(function() {
	localStorage.setItem('ThemeOptionCor', '');
	localStorage.setItem('ThemeOptionCor', 'theme-cyan');
});
$('.green').click(function() {
	localStorage.setItem('ThemeOptionCor', '');
	localStorage.setItem('ThemeOptionCor', 'theme-green');
});
$('.orange').click(function() {
	localStorage.setItem('ThemeOptionCor', '');
	localStorage.setItem('ThemeOptionCor', 'theme-orange');
});
$('.blush').click(function() {
	localStorage.setItem('ThemeOptionCor', '');
	localStorage.setItem('ThemeOptionCor', 'theme-blush');
});
//animações
new WOW().init();