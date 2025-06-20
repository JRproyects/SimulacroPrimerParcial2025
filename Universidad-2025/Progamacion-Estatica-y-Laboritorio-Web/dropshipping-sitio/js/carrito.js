const productos = [
    { nombre: "Collar A", precio: 1500 },
    { nombre: "Remera B", precio: 2000 },
    { nombre: "Gorra C", precio: 1200 }
];
const productosDiv = document.getElementById("productos");
const carrito = [];
const carritoUl = document.getElementById("carrito");

productos.forEach((producto, index) => {
    const div = document.createElement("div");
    div.innerHTML = `<strong>${producto.nombre}</strong> - $${producto.precio} <button onclick="agregarAlCarrito(${index})">Agregar</button>`;
    productosDiv.appendChild(div);
});

function agregarAlCarrito(index) {
    carrito.push(productos[index]);
    mostrarCarrito();
}

function mostrarCarrito() {
    carritoUl.innerHTML = "";
    carrito.forEach(prod => {
        const li = document.createElement("li");
        li.textContent = `${prod.nombre} - $${prod.precio}`;
        carritoUl.appendChild(li);
    });
}