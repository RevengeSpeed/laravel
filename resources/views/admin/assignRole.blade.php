<!-- resources/views/admin/assignRole.blade.php -->

<!-- Mostrar mensajes de éxito o error -->
@if (session('success'))
    <div class="alert alert-success bg-green-500 text-white p-4 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger bg-red-500 text-white p-4 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

<!-- Formulario para asignar el rol de administrador -->
<form action="{{ route('admin.assignRole') }}" method="POST" class="bg-white p-6 rounded shadow-md">
    @csrf
    <div class="mb-4">
        <label for="user_id" class="block text-gray-700">ID del Usuario:</label>
        <input type="text" name="user_id" id="user_id" required class="border border-gray-300 p-2 rounded w-full">
    </div>
    
    <button type="submit" class="bg-blue-500 text-white p-2 rounded w-full">Asignar Rol de Administrador</button>
</form>
