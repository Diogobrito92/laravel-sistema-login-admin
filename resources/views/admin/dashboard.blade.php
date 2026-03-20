<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">

        <h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>

        <div class="grid grid-cols-3 gap-6">

            <!-- Total usuários -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-gray-500">Total de Usuários</h2>
                <p class="text-3xl font-bold mt-2">{{ $totalUsers }}</p>
            </div>

            <!-- Admins -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-gray-500">Admins</h2>
                <p class="text-3xl font-bold mt-2 text-blue-500">
                    {{ $totalAdmins }}
                </p>
            </div>

            <!-- Clientes -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-gray-500">Usuários Comuns</h2>
                <p class="text-3xl font-bold mt-2 text-green-500">
                    {{ $totalClients }}
                </p>
            </div>

        </div>

    </div>
</x-app-layout>