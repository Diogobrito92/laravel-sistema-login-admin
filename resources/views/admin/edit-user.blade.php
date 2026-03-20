<h1>Editar Usuário</h1>

<form action="/admin/users/{{ $user->id }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nome:</label>
    <input type="text" value="{{ $user->name }}" disabled><br><br>

    <label>Email:</label>
    <input type="text" value="{{ $user->email }}" disabled><br><br>

    <label>Permissão:</label>
    <select name="role">
        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
    </select><br><br>

    <button type="submit">Salvar</button>
</form>