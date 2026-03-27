<h2>Login Vivero Calico</h2>

<form id="loginForm">
  <input id="email" placeholder="Correo">
  <br><br>
  <input id="password" type="password" placeholder="Contraseña">
  <br><br>
  <button type="submit">Entrar</button>
</form>

<script>
document.getElementById('loginForm').addEventListener('submit', async function(e){
    e.preventDefault(); // evita que recargue la página

    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    try {
        let res = await fetch('/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ email, password })
        });

        let data = await res.json();

        if(res.status !== 200){
            alert(data.message || "Error en login");
            return;
        }

        // guardar token
        localStorage.setItem('token', data.token);

        // REDIRECCION SEGÚN ROL
        if(data.rol === 'admin'){
            window.location.href = '/admin';
        } else {
            window.location.href = '/cliente';
        }

    } catch(err){
        console.error(err);
        alert('Error al conectar con el servidor');
    }
});
</script>