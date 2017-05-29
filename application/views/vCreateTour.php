<?php
/**
 * Created by PhpStorm.
 * User: juandaniel
 * Date: 10/5/17
 * Time: 20:19
 */

?>

<script src="<?php echo base_url(); ?>js/CreateTour.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/CrearTourStyle.css"/>

<section>
    <div id="mapContent">
        <input id="pac-input" class="controls" type="text" placeholder="Buscar">
        <div id="map"></div>
    </div>
    <div id="formTour">
        <form action="<?php echo base_url(); ?>Tour/addNewLocalTour" method="post">
            <h4>Nombre del tour</h4>
            <input type="text" name="name">

            <h4>Descripción</h4>
            <textarea name="description" rows="6"></textarea>

            <div class="disponibilidad-ini">
                <fieldset>
                    <legend><h4>Disponibilidad desde</h4></legend>
                    <div class="left-ini">
                        <label for="sin-limite-ini">Hoy mismo</label>
                        <input type="radio" name="sin-limite-ini" id="sin-limite-ini" value="" checked>
                    </div>
                    <div class="right-ini">
                        <label for="pre-datepicker-ini" id="lblFechaIni">Seleccionar fecha</label>
                        <input type="text" id="datepicker-ini" hidden>
                        <input type="radio" name="sin-limite-ini" id="pre-datepicker-ini" value="">
                    </div>
                </fieldset>
            </div>
            <div class="disponibilidad-fin">
                <fieldset>
                    <legend><h4>Disponibilidad final</h4></legend>
                    <div class="left-end">
                        <label for="sin-limite-end">Sin límite</label>
                        <input type="radio" name="sin-limite-end" id="sin-limite-end" value="" checked>
                    </div>
                    <div class="right-end">
                        <label for="pre-datepicker-end" id="lblFechaEnd">Seleccionar fecha</label>
                        <input type="text" id="datepicker-end" hidden >
                        <input type="radio" name="sin-limite-end" id="pre-datepicker-end" value="NULL">
                    </div>
                </fieldset>
            </div>

            <div id="posicion-map">
                <fieldset>
                    <legend><h4>Previsualización</h4></legend>

                    <div id="mapCapture"></div>
                    <input type="text" name="lat" value="0" id="lat" hidden>
                    <input type="text" name="lng" value="0" id="lng" hidden>
                    <input type="text" name="address" value="0" id="address" hidden>

                </fieldset>
            </div>

            <ol id="selectable">
                <li class="ui-widget-content" value="1">Copas</li>
                <li class="ui-widget-content" value="4">Exploración</li>
                <li class="ui-widget-content" value="2">Espectáculo</li>
                <li class="ui-widget-content" value="5">Música</li>
                <li class="ui-widget-content" value="3">Deportes</li>
                <li class="ui-widget-content" value="6">Culto</li>
            </ol>


            <input type="text" value="0" name="category" id="category" hidden>
            <input type="text" value="0" name="loccity" id="loccity" hidden>
            <input type="submit" value="Crear!" class="crearTour">

        </form>
    </div>
</section>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmKsSKiRAAOVnWeio7wckW_hCFZ7rGvGY&libraries=places"></script>
