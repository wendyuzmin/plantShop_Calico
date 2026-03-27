<h1>Bienvenido al Vivero 🌱</h1>

<div id="info"></div>

<script>

async function usuario(){

let token = localStorage.getItem('token');

let res = await fetch('/api/user',{
headers:{
'Authorization':'Bearer '+token
}
});

let user = await res.json();

document.getElementById('info').innerHTML =
"Usuario: " + user.name + " | Rol: " + user.role;

}

usuario();

</script>