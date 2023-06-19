var calculatedTotal = 0;
var totalInput = document.getElementById("total");

var productsArray = [];

function generarTablaProductos() {
  var tablaProductosVenta = document.getElementById("tablaProductosVenta");
  var tbody = tablaProductosVenta.getElementsByTagName("tbody")[0];
  tbody.innerHTML = ""; // Limpiar contenido anterior

  for (var i = 0; i < productsArray.length; i++) {
    var producto = productsArray[i];

    var row = document.createElement("tr");
    var idCell = document.createElement("td");
    var nombreCell = document.createElement("td");
    var cantidadCell = document.createElement("td");
    var botonCell = document.createElement("td");
    var boton = document.createElement("button");

    idCell.textContent = producto.id;
    nombreCell.textContent = producto.nombre;
    cantidadCell.textContent = producto.cantidad;

    boton.textContent = "Eliminar";
    boton.addEventListener("click", function() {
      eliminarProducto(producto.id);
    });

    row.appendChild(idCell);
    row.appendChild(nombreCell);
    row.appendChild(cantidadCell);
    botonCell.appendChild(boton);
    row.appendChild(botonCell);
    tbody.appendChild(row);
  }
}

function eliminarProducto(id) {
  var productIndex = productsArray.findIndex(product => product.id === id);

  if (productIndex !== -1) {
    // Restar 1 a la cantidad
    productsArray[productIndex].cantidad--;

    // Si la cantidad es 0, eliminar el objeto del producto
    if (productsArray[productIndex].cantidad === 0) {
      productsArray.splice(productIndex, 1);
    }
  }

  generarTablaProductos(); // Actualizar la tabla después de eliminar el producto
}

function addProduct(id, costo, nombre){
  
  var idProd= id;
  var costoProd = costo;
  var nombreProd = nombre;

  var productIndex = productsArray.findIndex(product => product.id === idProd);

  if (productIndex !== -1) {
    // El producto ya existe en el array, aumentar la cantidad
    productsArray[productIndex].cantidad++;
    calculatedTotal = calculatedTotal + costoProd;

  } else {
    // El producto no existe en el array, agregar un nuevo objeto
    var newProduct = {
      nombre: nombreProd,
      id: idProd,
      cantidad: 1
    };
    productsArray.push(newProduct);

    calculatedTotal = calculatedTotal + costoProd;
  }

  console.log("Se anade producto: "+ nombreProd + " id: "+ idProd + " con costo $" + costoProd);
  console.log(productsArray)
  console.log("Total: $" + calculatedTotal);
  generarTablaProductos();
  totalInput.value = calculatedTotal;
}