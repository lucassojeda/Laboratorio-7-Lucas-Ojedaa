document.addEventListener("DOMContentLoaded", function() {

    const formularios = document.querySelectorAll("form");

    formularios.forEach(formulario => {
        formulario.addEventListener("submit", function(event) {
            let esValido = true;
            let mensajesError = [];

           
            formulario.querySelectorAll("input[type='text']").forEach(campo => {
                if (campo.value.trim() === "") {
                    esValido = false;
                    mensajesError.push(`${campo.name} no puede estar vacío.`);
                }
            });

        
            const campoPrecio = formulario.querySelector("input[name='precio']");
            if (campoPrecio && isNaN(campoPrecio.value)) {
                esValido = false;
                mensajesError.push("El precio debe ser un número.");
            }

      
            const campoID = formulario.querySelector("input[name='id_producto']");
            if (campoID && !/^\d+$/.test(campoID.value)) {
                esValido = false;
                mensajesError.push("El ID del producto debe ser un número.");
            }

            if (!esValido) {
                event.preventDefault();
                alert(mensajesError.join("\n"));
            }
        });
    });
});
