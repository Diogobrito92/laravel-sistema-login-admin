<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">

        <!-- TOPO -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Usuários</h1>

            <span class="bg-gray-200 px-3 py-1 rounded">
                Total: {{ $users->total() }}
            </span>
        </div>

        <!-- ALERTAS -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-3">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-3">
                {{ session('error') }}
            </div>
        @endif

        <!-- BUSCA -->
        <form method="GET" action="{{ route('users.index') }}" class="mb-6 flex gap-2">
            <input type="text" name="search" value="{{ $search ?? '' }}"
                placeholder="Buscar usuário..."
                class="border p-2 rounded w-1/3">

            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Buscar
            </button>
        </form>

        <!-- TABELA -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3">ID</th>
                        <th class="p-3">Nome</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Role</th>
                        <th class="p-3">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                    <tr class="border-t hover:bg-gray-50 transition">
                        <td class="p-3">{{ $user->id }}</td>
                        <td class="p-3">{{ $user->name }}</td>
                        <td class="p-3">{{ $user->email }}</td>
                        <td class="p-3">
                            <span class="px-2 py-1 rounded text-white 
                                {{ $user->role == 'admin' ? 'bg-blue-500' : 'bg-gray-500' }}">
                                {{ $user->role }}
                            </span>
                        </td>

                        <td class="p-3 flex gap-2">

                            <!-- Editar -->
                            <a href="{{ route('users.edit', $user->id) }}"
                               class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                                Editar
                            </a>

                            <!-- Deletar -->
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded"
                                    onclick="return confirm('Tem certeza?')">
                                    Deletar
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- PAGINAÇÃO -->
        <div class="mt-4">
            {{ $users->appends(['search' => $search])->links() }}
        </div>

    </div>
</x-app-layout>