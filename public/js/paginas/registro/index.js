$(function () {
    let controller = new AbortController();
    $("#submit").click(function() {
        let form = $("#formRegistro");
        if (form[0].checkValidity() === false) {
          event.preventDefault()
          event.stopPropagation()
        } else {
            $.ajax({
                type : 'POST',
                url  : servidor + 'login/registrar',
                dataType: 'json',
                data : form.serialize(),
            beforeSend: function() {
                // setting a timeout
                $("#loading").addClass('loading');
            },
            success :  function(data){
                if (data.estatus == "warning") {
                    $('#reg_correo').focus();
                }
                swal({
                    icon: data.estatus,
                    title: data.titulo,
                    text: data.respuesta,
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    allowOutsideClick: false,
                    buttons: false,
                    timer: 2000
                });
            },
            error: function (data) {
                    // console.log(data);
            },
            complete: function() {
                $("#loading").removeClass('loading');
            }
            });
        }
        form.addClass('was-validated');
    });
    async function estados(){
        const signal = controller.signal;
        try {
            $("#reg_estado").empty();
            let peticion = await fetch(servidor + `catalogos/catalogoEstados`, { signal });
            let response = await peticion.json();
            let option_select = document.createElement("option")
            option_select.value = '';
            option_select.text = 'Seleccionar estado...'
            $("#reg_estado").append(option_select)
            for (let item of response) {
                let option = document.createElement("option")
                option.value = item.id_edo;
                option.text = item.nombre_estado
                $("#reg_estado").append(option)
            }
            console.log('cargando estados ...');
        } catch (err) {
            if (err.name == 'AbortError') { } else { throw err; }
        }
    }
    $("#reg_estado").on('change', function () {
        municipios($("#reg_estado").val());
    });
    async function municipios(estado){
        const signal = controller.signal;
        try {
            $("#reg_alcaldia").empty();
            let peticion = await fetch(servidor + `catalogos/catalogoMunicipios/${(estado=="")?null:estado}`, { signal });
            let response = await peticion.json();
            let option_select = document.createElement("option")
            option_select.value = '';
            option_select.text = 'Seleccionar municipio...'
            $("#reg_alcaldia").append(option_select)
            for (let item of response) {
                let option = document.createElement("option")
                option.value = item.id_delegacion;
                option.text = item.nombre_delegacion
                $("#reg_alcaldia").append(option)
            }
            console.log('cargando municipios/delegaciones/alcaldias ...');
        } catch (err) {
            if (err.name == 'AbortError') { } else { throw err; }
        }
    }
    $("#reg_alcaldia").on('change', function () {
        colonias($("#reg_alcaldia").val())
    });
    async function colonias(municipio){
        const signal = controller.signal;
        try {
            $("#reg_colonia").empty();
            let peticion = await fetch(servidor + `catalogos/catalogoColonias/${(municipio=="")?null:municipio}`, { signal });
            let response = await peticion.json();
            let option_select = document.createElement("option")
            option_select.value = '';
            option_select.text = 'Seleccionar colonia...'
            $("#reg_colonia").append(option_select)
            for (let item of response) {
                let option = document.createElement("option")
                option.value = item.id_colonia;
                option.text = item.nombre_colonia+" - 0"+item.codigo_postal_colonia
                $("#reg_colonia").append(option)
            }
            console.log('cargando colonias ...');
        } catch (err) {
            if (err.name == 'AbortError') { } else { throw err; }
        }
    }
    async function categorias(){
        const signal = controller.signal;
        try {
            $("#reg_categoria").empty();
            let peticion = await fetch(servidor + `catalogos/catalogoCategorias`, { signal });
            let response = await peticion.json();
            let option_select = document.createElement("option")
            option_select.value = '';
            option_select.text = 'Seleccionar categoria...'
            $("#reg_categoria").append(option_select)
            for (let item of response) {
                let option = document.createElement("option")
                option.value = item.id_categoria;
                option.text = item.nombre_categoria
                $("#reg_categoria").append(option)
            }
            console.log('cargando categorias ...');
        } catch (err) {
            if (err.name == 'AbortError') { } else { throw err; }
        }
    }
    async function prefijos(){
        const signal = controller.signal;
        try {
            $("#reg_prefijo").empty();
            let peticion = await fetch(servidor + `catalogos/catalogoPrefijos`, { signal });
            let response = await peticion.json();
            let option_select = document.createElement("option")
            option_select.value = '';
            option_select.text = 'Seleccionar prefijo...'
            $("#reg_prefijo").append(option_select)
            for (let item of response) {
                let option = document.createElement("option")
                option.value = item.id_prefijo;
                option.text = item.clave_prefijo
                $("#reg_prefijo").append(option)
            }
            console.log('cargando prefijos ...');
        } catch (err) {
            if (err.name == 'AbortError') { } else { throw err; }
        }
    }
    async function ladas(){
        const signal = controller.signal;
        try {
            $("#reg_lada").empty();
            let peticion = await fetch(servidor + `catalogos/catalogoLadas`, { signal });
            let response = await peticion.json();
            let option_select = document.createElement("option")
            option_select.value = '';
            option_select.text = 'Seleccionar lada...'
            $("#reg_lada").append(option_select)
            for (let item of response) {
                let option = document.createElement("option")
                option.value = item.id_lada;
                option.text = item.numero_lada+' - '+item.nombre_lada
                $("#reg_lada").append(option)
            }
            console.log('cargando ladas ...');
        } catch (err) {
            if (err.name == 'AbortError') { } else { throw err; }
        }
    }
    function mayusculas(e) {
        e.value = e.value.toUpperCase();
    }
    $(".mayusculas").on('keyup', function () {
        mayusculas(this);
    });
    /* Peticiones a catalogos */
    estados();
    categorias();
    prefijos();
    ladas();


    $('.select2').select2({
        language: 'es',
        theme: "bootstrap4"
    })
});