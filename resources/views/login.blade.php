<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login MedicarFlow</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-r from-blue-500 to-indigo-600 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-xl rounded-2xl w-[380px] p-8">

    <!-- Tabs -->
    <div class="flex justify-around mb-6">
        <button onclick="showTab('login')" id="btnLogin"
            class="font-semibold border-b-2 border-blue-500 pb-2">
            Inicio
        </button>
        <button onclick="showTab('register')" id="btnRegister"
            class="text-gray-500 pb-2">
            Registro
        </button>
    </div>

    <!-- LOGIN -->
    <div id="loginTab">

        @if(session('error'))
            <p class="text-red-500 text-sm mb-3">{{ session('error') }}</p>
        @endif

        <form method="POST" action="/login">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium">Usuario</label>
                <input type="text" name="username"
                    class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Contraseña</label>
                <input type="password" name="password"
                    class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <div class="flex items-center mb-4">
                <input type="checkbox" class="mr-2">
                <span class="text-sm">Mantener sesión iniciada</span>
            </div>

            <button class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                Inicio de sesión
            </button>

        </form>

        <div class="text-center mt-4">
            <a href="#" class="text-sm text-blue-500">Olvido su contraseña</a>
        </div>
    </div>

    <!-- REGISTER -->
    <div id="registerTab" class="hidden">

        <form>

            <div class="mb-3">
                <input type="text" placeholder="Username"
                    class="w-full p-2 border rounded-lg">
            </div>

            <div class="mb-3">
                <input type="password" placeholder="Password"
                    class="w-full p-2 border rounded-lg">
            </div>

            <div class="mb-3">
                <input type="password" placeholder="Repeat Password"
                    class="w-full p-2 border rounded-lg">
            </div>

            <div class="mb-3">
                <input type="email" placeholder="Email"
                    class="w-full p-2 border rounded-lg">
            </div>

            <button class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600">
                Registrarse
            </button>

        </form>

    </div>

</div>

<script>
function showTab(tab) {
    const login = document.getElementById('loginTab');
    const register = document.getElementById('registerTab');

    const btnLogin = document.getElementById('btnLogin');
    const btnRegister = document.getElementById('btnRegister');

    if (tab === 'login') {
        login.classList.remove('hidden');
        register.classList.add('hidden');

        btnLogin.classList.add('border-blue-500');
        btnRegister.classList.remove('border-blue-500');
    } else {
        login.classList.add('hidden');
        register.classList.remove('hidden');

        btnRegister.classList.add('border-blue-500');
        btnLogin.classList.remove('border-blue-500');
    }
}
</script>

</body>
</html>