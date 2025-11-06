// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
}

$(document).ready(function() {
    let edit = false;
    fetchProducts();
    console.log("jQuery is ready");

    //Funcion buscar con Jquery
    $('#search').keyup(function (e) {
        if ($('#search').val()) {
            let search = $('#search').val();
        console.log(search);
        $.ajax(
            {
                url: 'backend/product-search.php',
                type: 'POST',
                data: {search},
                success: function(response) {
                    let products = JSON.parse(response);
                    let template = "";
                    products.forEach(product => {
                        console.log(product);
                        template += `<li>${product.nombre}</li>`;
                    });
                    if (products.length > 0) {
                        $("#product-result").removeClass("d-none");
                    }
                    $('#container').html(template);

                    //Se listan los productos que coinciden con la busqueda con todos sus datos
                    $("#products").html("");
                    products.forEach(product => {
                        $("#products").append(`
                            <tr productId="${product.id}">
                                <td>${product.id}</td>
                                <td>
                                    <a href="#" class="product-item">${product.nombre}</a>
                                </td>
                                <td>${product.marca}</td>
                                <td>${product.modelo}</td>
                                <td>${product.precio}</td>
                                <td>${product.detalles}</td>
                                <td>${product.unidades}</td>
                                <td>
                                    <img src="${product.imagen}" class="img-fluid" alt="Imagen del producto">
                                </td>
                                <td>
                                    <button class="product-delete btn btn-danger">Eliminar</button>
                                </td>
                            </tr>
                        `);
                    });                
                }

            }
        )
        }

    });

    //Enviar Productos con jquery
    $("#product-form").submit(function (e) {
        e.preventDefault();
        let productoJsonString = $('#description').val();
        // SE CONVIERTE EL JSON DE STRING A OBJETO
        let finalJSON = JSON.parse(productoJsonString);

        id = $('#productId').val();
        nombre = $('#name').val();
        marca = finalJSON['marca'];
        modelo = finalJSON['modelo'];
        precio = finalJSON['precio'];
        detalles = finalJSON['detalles'];
        unidades = finalJSON['unidades'];
        imagen = finalJSON['imagen'];

        const data = {
            id: id,
            nombre: nombre,
            marca: marca,
            modelo: modelo,
            precio: precio,
            detalles: detalles,
            unidades: unidades,
            imagen: imagen,
        };

        //se convierte a string para poder enviarlo
        dataJsonString = JSON.stringify(data);        
        //Validaciones de datos:

        // Validar nombre (requerido y 100 caracteres o menos)
        if (data.nombre.trim() === "" || data.nombre.length > 100) {
            alert("El nombre es obligatorio y debe tener 100 caracteres o menos.");
            return false;
        }

        // Validar marca (requerida y seleccionada)
        if (data.marca.trim() === "") {
            alert("Debes seleccionar una marca.");
            return false;
        }

        // Validar modelo (requerido, alfanumérico y 25 caracteres o menos)
        const modeloRegex = /^[a-zA-Z0-9]+$/;
        if (data.modelo.trim() === "" || !modeloRegex.test(data.modelo) || data.modelo.length > 25) {
            alert("El modelo es obligatorio, debe ser alfanumérico y tener 25 caracteres o menos.");
            return false;
        }

        // Validar precio (requerido y mayor a 99.99)
        if (isNaN(data.precio) || parseFloat(data.precio) <= 99.99) {
            alert("El precio es obligatorio y debe ser mayor a 99.99.");
            return false;
        }

        // Validar unidades (requerido y mayor o igual a 0)
        if (isNaN(data.unidades) || parseInt(data.unidades) < 0) {
            alert("Las unidades son obligatorias y deben ser un número mayor o igual a 0.");
            return false;
        }

        // Validar detalles (opcional, pero si se usa, máximo 250 caracteres)
        if (data.detalles.length > 250) {
            alert("Los detalles deben tener 250 caracteres o menos.");
            return false;
        }

        console.log(data);
        console.log(dataJsonString);
        let url = 
            edit === false ? "backend/product-add.php" : "backend/product-edit.php";
        $.post(url, dataJsonString, function (response) {
            console.log(response);
            let message= JSON.parse(response);
            let template = "";
            template = `<p>${message.message}</p>`;
            $("#product-form").trigger("reset");
            init();
            alert(response);
            fetchProducts();

            if (message.message.length > 0) {
                $("#product-result").removeClass("d-none");
              }
      
              $("#container").html(template);
        

        });
        e.preventDefault();
    });

    //Mostrar productos con jquery
    function fetchProducts() {
        $.ajax({
            url: 'backend/product-list.php',
            type: 'GET',
            success: function (response) {
                let products = JSON.parse(response);
                let template = "";
                products.forEach(product => {
                    template += `
                    <tr productId="${product.id}">
                        <td>${product.id}</td>
                        <td>
                            <a href="#" class="product-item">${product.nombre}</a>
                        </td>
                        <td>${product.marca}</td>
                        <td>${product.modelo}</td>
                        <td>${product.precio}</td>
                        <td>${product.detalles}</td>
                        <td>${product.unidades}</td>
                        <td>
                            <img src="${product.imagen}" class="img-fluid" alt="Imagen del producto">
                        </td>
                        <td>
                            <button class="product-delete btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                    `;
                });
                $('#products').html(template);
            }
        });
    }

    //Eliminar productos con jquery
    $(document).on("click", ".product-delete", function () {
        if (confirm("¿Estás seguro de querer eliminar este producto?")) {
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr("productId");
            $.post("backend/product-delete.php", {id}, function (response) {
                fetchProducts();
                alert(response);
            });
        }
    });

    //Editar productos con jquery
    $(document).on("click", ".product-item", function () {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr("productId");
        $.post("backend/product-single.php", {id}, function (response) {
            const product = JSON.parse(response);
            console.log(product);
            $('#productId').val(product.id);
            $('#name').val(product.nombre);
            baseJSON = {
                "precio": product.precio,
                "unidades": product.unidades,
                "modelo": product.modelo,
                "marca": product.marca,
                "detalles": product.detalles,
                "imagen": product.imagen
            };
            let JsonString = JSON.stringify(baseJSON, null, 2);
            $('#description').val(JsonString);
            edit = true;
        });
    });
});