<?php
get_header();





?>

<div class="flex justify-center">
    <div class="max-w-screen-xl  bg-white p-4 rounded-lg my-4">


        <h2 class="text-4xl font-extrabold dark:text-white">CARTOGRAFÍA SOCIOAMBIENTAL- PITSA-UNSL</h2>
        <p class="my-4 text-lg text-gray-500">Formulario de carga de conflictos y problemáticas socioambientales</p>
        <p class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">En el presente formulario, usted podrá
            informar sobre algún caso de problemática o conflicto socioambiental que esté sucediendo dentro de la
            provincia de San Luis. Los datos serán recibidos por el equipo de desarrollo de la Cartografía
            Socioambiental del PITSA-UNSL, y serán subidos al mapa luego de un proceso de validación. Cabe aclarar que
            la carga de cualquier tipo de evento o situación de conflicto/problemática socioambiental no implica,
            necesariamente, completar todos los campos que figuran en el formulario.</p>







        <form class="py-2" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post"
            enctype="multipart/form-data">
            <div class="id-1 py-4">
                <h1 class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900  dark:text-white">A
                    continuación, comparta alguna información de contacto
                </h1>
                <p class="text-lg pb-2 font-normal text-gray-500 lg:text-xl dark:text-gray-400">Se sugiere: nombre y
                    apellido, mail y/o telefono, organización a la que pertecece (si lo desea), dirección.
                </p>



                <div class="flex">
                    <span
                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                    </span>
                    <!-- CONTACTO -->
                    <input type="text" id="website-admin" name="contacto"
                        class="pb-2 rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-emerald-500 focus:border-emerald-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                        placeholder="...">
                </div>
            </div>




            <div class="id-2 py-4">

                <h1 class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900  dark:text-white">2-
                    Mencione qué es lo que considera que se ve afectado.
                </h1>
                <p class="text-base pb-2 font-normal italic text-gray-500 dark:text-gray-400">EJ: Bienes o recursos
                    afectados (ríos, arroyos, bosque nativo, fauna), comunidades, salud, etc.</p>
                <!-- AFECTADO -->
                <input type="text" name="afectado"
                    class="rounded-lg  bg-gray-50 border border-gray-300 text-gray-900 focus:ring-emerald-500 focus:border-emerald-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                    placeholder="...">


            </div>




            <div class="id-3 py-4">

                <h1 class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900  dark:text-white">3-
                    ¿Conoce la fecha en que comenzó el evento que está informando?

                </h1>
                <p class="text-base pb-2 font-normal italic text-gray-500 dark:text-gray-400">Lo más aproximado posible
                </p>

                <!-- FECHA DE COMIENZO -->
                <fieldset>
                    <legend class="sr-only">Fechas</legend>

                    <div class="flex items-center mb-4">
                        <input id="country-option-1" type="radio" name="fecha-de-comienzo" value="No sé"
                            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-emerald-300 dark:focus:ring-emerald-600 dark:focus:bg-emerald-600 dark:bg-gray-700 dark:border-gray-600"
                            checked>
                        <label for="country-option-1"
                            class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
                            No sé
                        </label>
                    </div>

                    <div class="flex items-center mb-4">
                        <input id="country-option-2" type="radio" name="fecha-de-comienzo" value="Hace una semana"
                            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-emerald-300 dark:focus:ring-emerald-600 dark:focus:bg-emerald-600 dark:bg-gray-700 dark:border-gray-600">
                        <label for="country-option-2"
                            class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Hace una semana
                        </label>
                    </div>

                    <div class="flex items-center mb-4">
                        <input id="country-option-3" type="radio" name="fecha-de-comienzo" value="Hace un mes"
                            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-emerald-300 dark:focus:ring-emerald-600 dark:bg-gray-700 dark:border-gray-600">
                        <label for="country-option-3"
                            class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Hace un mes
                        </label>
                    </div>

                    <div class="flex items-center mb-4">
                        <input id="country-option-4" type="radio" name="fecha-de-comienzo" value="Hace 6 meses"
                            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-emerald-300 dark:focus-ring-emerald-600 dark:bg-gray-700 dark:border-gray-600">
                        <label for="country-option-4"
                            class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Hace 6 meses
                        </label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="country-option-4" type="radio" name="fecha-de-comienzo" value="Hace un año"
                            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-emerald-300 dark:focus-ring-emerald-600 dark:bg-gray-700 dark:border-gray-600">
                        <label for="country-option-4"
                            class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Hace un año
                        </label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="country-option-4" type="radio" name="fecha-de-comienzo" value="Hace más de un año"
                            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-emerald-300 dark:focus-ring-emerald-600 dark:bg-gray-700 dark:border-gray-600">
                        <label for="country-option-4"
                            class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Hace más de un año
                        </label>
                    </div>
                </fieldset>


            </div>


            <div class="id-4 py-4">

                <h1 class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900  dark:text-white">3.1-
                    Si conoce la fecha con mayor exactitud, indíquela a continuación.
                </h1>
                <p class="text-base pb-2 font-normal italic text-gray-500 dark:text-gray-400">Si no la conoce, omita
                    esta pregunta.</p>

                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <!-- FECHA PUNTUAL -->
                    <input datepicker id="default-datepicker" type="text" name="fecha-puntual"
                        datepicker-format="dd/mm/yyyy"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                        placeholder="Seleccionar fecha">
                </div>


            </div>


            <div class="id-5 py-4">

                <h1 class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900  dark:text-white">4-
                    ¿Existen personas afectadas?
                </h1>

                <!-- PERSONAS AFECTADAS -->

                <fieldset>
                    <legend class="sr-only">Marcar opcion</legend>
                    <div class="flex gap-5">
                        <div class="flex items-center mb-4">
                            <input id="country-option-5" type="radio" name="personas-afectadas" value="Si"
                                class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-emerald-300 dark:focus:ring-emerald-600 dark:focus:bg-emerald-600 dark:bg-gray-700 dark:border-gray-600"
                                checked>
                            <label for="country-option-5"
                                class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
                                Si
                            </label>
                        </div>

                        <div class="flex items-center mb-4">
                            <input id="country-option-6" type="radio" name="personas-afectadas" value="No"
                                class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-emerald-300 dark:focus:ring-emerald-600 dark:focus:bg-emerald-600 dark:bg-gray-700 dark:border-gray-600">
                            <label for="country-option-6"
                                class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                No
                            </label>
                        </div>

                        <div class="flex items-center mb-4">
                            <input id="country-option-7" type="radio" name="personas-afectadas" value="No sé"
                                class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-emerald-300 dark:focus:ring-emerald-600 dark:bg-gray-700 dark:border-gray-600">
                            <label for="country-option-7"
                                class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                No sé
                            </label>
                        </div>
                    </div>
                </fieldset>




            </div>



            <!-- MAPA -->
            <div class="id-6 py-4">

                <h1 class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900  dark:text-white">5-
                    ¿Conoce la ubicación del evento?
                </h1>
                <p class="text-base pb-2 font-normal italic text-gray-500 dark:text-gray-400">Marque con un punto la
                    zona de la Evento. Use el Icono del planeta para usar la imagen satelital como ayuda.</p>



                <div id="map" style="height: 400px; z-index:0;"></div>
                <input type="hidden" id="lat" name="latitude">
                <input type="hidden" id="lng" name="longitude">



            </div>

            <!-- LINKgoogle -->
            <div class="id-7 py-4">

                <h1 class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900  dark:text-white">5.1
                    Podría indicar la ubicación a traves de un link a google maps
                </h1>
                <input type="text" name="linkgoogle"
                    class="rounded-lg  bg-gray-50 border border-gray-300 text-gray-900 focus:ring-emerald-500 focus:border-emerald-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                    placeholder="...">
            </div>




            <div class="id-8 py-4">

                <h1 class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900  dark:text-white">6-
                    ¿Conoce la extensión o la superficie afectada?

                </h1>

                <!-- SUPERFICIE AFECTADA -->

                <fieldset>
                    <legend class="sr-only">Marcar opcion</legend>
                    <div class="flex gap-5">
                        <div class="flex items-center mb-4">
                            <input id="country-option-5" type="radio" name="s-afectada" value="Si"
                                class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-emerald-300 dark:focus:ring-emerald-600 dark:focus:bg-emerald-600 dark:bg-gray-700 dark:border-gray-600"
                                checked>
                            <label for="country-option-5"
                                class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
                                Si
                            </label>
                        </div>

                        <div class="flex items-center mb-4">
                            <input id="country-option-6" type="radio" name="s-afectada" value="No"
                                class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-emerald-300 dark:focus:ring-emerald-600 dark:focus:bg-emerald-600 dark:bg-gray-700 dark:border-gray-600">
                            <label for="country-option-6"
                                class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                No
                            </label>
                        </div>
                    </div>
                </fieldset>




            </div>



            <div class="id-8 py-4">

                <div class="mb-4">
                    <h2 class="text-lg font-bold text-gray-900">7- Estado del evento:</h2>
                    <p class="text-sm text-gray-500">
                        ¿Podría definir el estado actual del evento (si continúa o si está resuelto) y qué
                        características de aparición posee?
                    </p>
                </div>

                <!-- ESTADO DEL EVENTO hecho puntual -->
                <div class="space-y-4">
                    <!-- Primera fila -->
                    <div class="grid grid-cols-3 items-center">
                        <label class="text-gray-900">Es/fue un hecho puntual</label>

                        <div class="flex justify-center">
                            <input id="opcion1-continua" type="radio" name="hecho" value="continua-puntual"
                                class="w-4 h-4 text-emerald-600 bg-gray-100 border-gray-300 focus:ring-emerald-500 focus:ring-2 dark:focus:ring-emerald-600">
                            <label for="opcion1-continua"
                                class="ml-2 text-sm font-medium text-gray-900">Continúa</label>
                        </div>

                        <div class="flex justify-center">
                            <input id="opcion1-resuelto" type="radio" name="hecho" value="resuelto-puntual"
                                class="w-4 h-4 text-emerald-600 bg-gray-100 border-gray-300 focus:ring-emerald-500 focus:ring-2 dark:focus:ring-emerald-600">
                            <label for="opcion1-resuelto"
                                class="ml-2 text-sm font-medium text-gray-900">Resuelto</label>
                        </div>
                    </div>

                    <!-- ESTADO DEL EVENTO sucede a veces -->
                    <div class="grid grid-cols-3 items-center">
                        <label class="text-gray-900">Sucede a veces</label>

                        <div class="flex justify-center">
                            <input id="opcion2-continua" type="radio" name="sucede" value="continua-aveces"
                                class="w-4 h-4 text-emerald-600 bg-gray-100 border-gray-300 focus:ring-emerald-500 focus:ring-2 dark:focus:ring-emerald-600">
                            <label for="opcion2-continua"
                                class="ml-2 text-sm font-medium text-gray-900">Continúa</label>
                        </div>

                        <div class="flex justify-center">
                            <input id="opcion2-resuelto" type="radio" name="sucede" value="resuelto-aveces"
                                class="w-4 h-4 text-emerald-600 bg-gray-100 border-gray-300 focus:ring-emerald-500 focus:ring-2 dark:focus:ring-emerald-600">
                            <label for="opcion2-resuelto"
                                class="ml-2 text-sm font-medium text-gray-900">Resuelto</label>
                        </div>
                    </div>

                    <!-- ESTADO DEL EVENTO Se repite -->
                    <div class="grid grid-cols-3 items-center">
                        <label class="text-gray-900">Se repite</label>

                        <div class="flex justify-center">
                            <input id="opcion3-continua" type="radio" name="repite" value="continua-repite"
                                class="w-4 h-4 text-emerald-600 bg-gray-100 border-gray-300 focus:ring-emerald-500 focus:ring-2 dark:focus:ring-emerald-600">
                            <label for="opcion3-continua"
                                class="ml-2 text-sm font-medium text-gray-900">Continúa</label>
                        </div>

                        <div class="flex justify-center">
                            <input id="opcion3-resuelto" type="radio" name="repite" value="resuelto-repite"
                                class="w-4 h-4 text-emerald-600 bg-gray-100 border-gray-300 focus:ring-emerald-500 focus:ring-2 dark:focus:ring-emerald-600">
                            <label for="opcion3-resuelto"
                                class="ml-2 text-sm font-medium text-gray-900">Resuelto</label>
                        </div>
                    </div>
                </div>

            </div>


            <!-- FRECUENCIA -->
            <div class="id-9 py-4">

                <h1 class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900  dark:text-white">8- En
                    caso de que se repita, diga con qué frecuencia ocurre.
                </h1>
                <input type="text" name="frecuencia"
                    class="rounded-lg  bg-gray-50 border border-gray-300 text-gray-900 focus:ring-emerald-500 focus:border-emerald-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                    placeholder="...">
            </div>





            <div class="id-10 py-4">

                <h1 class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900  dark:text-white">9-
                    ¿Existen actualmente demandas/denuncias/movilizaciones?

                </h1>
                <p class="text-base pb-2 font-normal italic text-gray-500 dark:text-gray-400">Noticias, reportes, notas
                    en diarios, posteo en redes</p>

                <!-- DENUNCIAS -->
                <fieldset>
                    <legend class="sr-only">Marcar opcion</legend>
                    <div class="flex gap-5">
                        <div class="flex items-center mb-4">
                            <input id="country-option-5" type="radio" name="denuncias" value="Si"
                                class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-emerald-300 dark:focus:ring-emerald-600 dark:focus:bg-emerald-600 dark:bg-gray-700 dark:border-gray-600"
                                checked>
                            <label for="country-option-5"
                                class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
                                Si
                            </label>
                        </div>

                        <div class="flex items-center mb-4">
                            <input id="country-option-6" type="radio" name="denuncias" value="No"
                                class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-emerald-300 dark:focus:ring-emerald-600 dark:focus:bg-emerald-600 dark:bg-gray-700 dark:border-gray-600">
                            <label for="country-option-6"
                                class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                No
                            </label>
                        </div>

                        <div class="flex items-center mb-4">
                            <input id="country-option-6" type="radio" name="denuncias" value="No sé"
                                class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-emerald-300 dark:focus:ring-emerald-600 dark:focus:bg-emerald-600 dark:bg-gray-700 dark:border-gray-600">
                            <label for="country-option-6"
                                class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                No sé
                            </label>
                        </div>
                    </div>
                </fieldset>




            </div>


            <!-- DENUNCIAS INFORMACION -->
            <div class="id-11 py-4">

                <h1 class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900  dark:text-white">9.1-
                    Si la respuesta es SÍ, ¿podría aportar mayor información?
                </h1>
                <p class="text-base pb-2 font-normal italic text-gray-500 dark:text-gray-400">Se pueden agregar links a
                    Noticias, reportes, notas en diarios, posteo en redes o mención a estos
                </p>


                <input type="text" name="denuncia-informacion"
                    class="rounded-lg  bg-gray-50 border border-gray-300 text-gray-900 focus:ring-emerald-500 focus:border-emerald-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                    placeholder="...">
            </div>




            <!-- EVIDENCIA -->
            <div class="id-11 py-4">

                <h1 class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900  dark:text-white">
                    ¿Tiene evidencia (foto/video) que pueda compartir?
                </h1>
                <p class="text-base pb-2 font-normal italic text-gray-500 dark:text-gray-400">En el caso de estar
                    operando desde una computadora, una vez que se accede a la carpeta de origen del archivo, se deberá
                    elegir la opción "Archivos personalizados" para visualizar todos los tipos de archivos y cargar el
                    indicado. Hasta 5mb por archivo
                </p>



                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Subir
                    múltiples archivos</label>
                <input name="evidencia[]"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="multiple_files" type="file" multiple>


            </div>









            <input type="hidden" name="action" value="guardar_respuesta_formulario" />
            <input type="submit" value="Enviar">
        </form>














    </div>

</div>



<script>

    document.addEventListener('DOMContentLoaded', function () {
        var map = L.map('map').setView([-33.29501, -66], 6.5); // Coordenadas y zoom inicial

        // Cargar el mapa
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        var marker;

        map.on('click', function (e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            if (marker) {
                map.removeLayer(marker);
            }

            marker = L.marker([lat, lng]).addTo(map);

            document.getElementById('lat').value = lat;
            document.getElementById('lng').value = lng;
        });
    });

</script>
<?php
get_footer();
?>