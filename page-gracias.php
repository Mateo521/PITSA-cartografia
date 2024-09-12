<?php

get_header();

?>

<p class="mb-3 text-lg text-gray-500 md:text-xl dark:text-gray-400 text-center">Gracias! el formulario se recibió correctamente, pronto serás redirigido...</p>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Ejecuta el código cuando el DOM esté completamente cargado
    setTimeout(function () {
        window.location.href = "/";
    }, 2000);
});

</script>
<?php

get_footer();

?>





