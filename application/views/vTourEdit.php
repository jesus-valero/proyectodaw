<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/ProfileToursStyle.css"/> -->
<style type="text/css">
	#profileContent {
		display: flex;
		justify-content: center;
		align-items: flex-start;
		background: silver;
		height: 90vh;
	}

	aside {
		display: flex;
		flex-direction: column;
		height: 60vh;
		width: 20vw;
		background: #333333;
		margin-top: 2vh;
		align-items: center;
	}

	aside img {
		border: 2vh solid grey;
		background: silver;
		border-radius: 50%;
		height: 20vh;
		margin-top: 2vh;
		margin-bottom: 3vh;
	}

	aside a {
		width: 100%;
		background: silver;
		font-size: 2vh;
		text-align: center;
		padding-top: 1vh;
		padding-bottom: 1vh;
		text-decoration: none;
		color: #333333;
	}

	aside > a:hover {
		background: tomato;
	}

	h1 {
		margin: 0;
	}

	aside :nth-child(5), aside :nth-child(6) {
		margin-top: .5vh;
	}

	section {
		display: block;
		flex-wrap: wrap;
		align-items: flex-start;
		text-align: center;
		margin-top: 2vh;
		width: 50vw;
		background: gray;
		margin-left: 2vh;
		overflow-y: scroll;
		padding: 2vh;
		font-size: 18px;
	}

	section .label { float: left; }
	section .data { float: right; clear: right; }
	/*section .tur_name { font-weight: bold; margin-bottom: 10px;}
	section .tur_description { margin-bottom: 20px; }
	section .username { margin-bottom: 10px; font-weight: bold;}
	section .loc_place { margin-bottom: 10px; font-weight: bold; }
	section .active_date { margin-bottom: 10px; font-weight: bold; }*/
	/*Activar*/
	footer {
		display: none;
	}
</style>

<div id="profileContent">
	<aside>
		<img src="www.lorempixel.com/200/200">
		<h1>Juan Daniel Quispe</h1>
		<p id="address">Addesss</p>
		<a href="<?php echo base_url()."Profile/travels" ?>">Mis viajes</a>
		<a href="<?php echo base_url()."Profile/tours" ?>">Mis tours</a>
		<a href="">Editar</a>
	</aside>
	<section>
		<form action="<?php echo base_url(); ?>Tour/newDataTour" method="post">
			<div class="label">Nombre del tour:</div>
			<input class="data tur_name" type="text" name="tur_name" value="{tur_name}"><br>
			<div class="label">Descripción:</div>
			<input class="data tur_description" type="text" name="tur_description" value="{tur_description}"><br>
			<div class="label">Lugar de encuentro:</div>
			<div class="data loc_place">{loc_place}</div><br>
			<div class="label">Fecha y hora de inicio actual:</div>
			<div class="data active_date">{dt_ini}</div><br>
			<div class="label">Nueva fecha y hora de inicio:</div>
			<input class="data active_date" type="datetime-local" name="dt_ini" value="{dt_ini}"><br>
			<div class="label">Fecha y hora de finalización actual:</div>
			<div class="data active_date">{dt_end}</div><br>
			<div class="label">Nueva fecha y hora de finalización:</div>
			<input class="data active_date" type="datetime-local" name="dt_end" value="{dt_end}"><br>
			<input type="hidden" name="pk" value="{pk}">
			<input class="data" type="submit" name="">
		</form>
		
	</section>
</div>	