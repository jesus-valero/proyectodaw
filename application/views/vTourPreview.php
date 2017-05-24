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

	section .tur_name { font-weight: bold; font-size: 32px; margin-bottom: 10px;}
	section .tur_description { font-size: 22px; margin-bottom: 20px; }
	section .username { margin-bottom: 10px; font-weight: bold; font-size: 24px;}
	section .loc_place { margin-bottom: 10px; font-weight: bold; }
	section .active_date { margin-bottom: 10px; font-weight: bold; }
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
		<div class="tur_name">{tur_name}</div>
		<div class="tur_description">{tur_description}</div>
		<div>Creado por:</div>
		<div class="username">{username}</div>
		<div>Lugar de encuentro:</div>		
		<div class="loc_place">{loc_place}</div>
		<div>Fecha y hora de inicio:</div>
		<div class="active_date">{dt_ini}</div>
		<div>Fecha y hora de finalización:</div>
		<div class="active_date">{dt_end}</div>
	</section>
</div>	