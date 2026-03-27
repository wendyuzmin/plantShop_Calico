<h1>Catálogo de Plantas 🌿</h1>

<div id="plantas"></div>

<script>
async function cargar(){

let token = localStorage.getItem('token');

let res = await fetch('/api/plantas',{
headers:{
'Authorization':'Bearer '+token
}
});

let plantas = await res.json();

let html = "";

plantas.forEach(p=>{
html += `
<div style="border:1px solid black;margin:10px;padding:10px">
<h3>${p.nombre}</h3>
<p>${p.descripcion}</p>
<p>Precio: $${p.precio}</p>
<p>Stock: ${p.stock}</p>
</div>
`;
});

document.getElementById('plantas').innerHTML = html;
}

cargar();
</script>