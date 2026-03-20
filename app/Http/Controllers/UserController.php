<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Listar usuários (com paginação)
    public function index(Request $request)
{
    $search = $request->input('search');

    $users = User::when($search, function ($query, $search) {
        return $query->where('name', 'like', "%{$search}%")
                     ->orWhere('email', 'like', "%{$search}%");
    })
    ->orderBy('id', 'desc')
    ->paginate(10);

    return view('admin.users', compact('users', 'search'));
}

    // Deletar usuário
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Não pode deletar a si mesmo
        if (auth()->id() == $id) {
            return redirect('/admin/users')
                ->with('error', 'Você não pode deletar seu próprio usuário!');
        }

        // Não permitir deletar outro admin (segurança extra)
        if ($user->role === 'admin') {
            return redirect('/admin/users')
                ->with('error', 'Não é permitido deletar outro admin!');
        }

        $user->delete();

        return redirect('/admin/users')
            ->with('success', 'Usuário deletado com sucesso!');
    }

    // Tela de edição
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.edit-user', compact('user'));
    }

    // Atualizar usuário
    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:user,admin'
        ]);

        $user = User::findOrFail($id);

        // Não permitir alterar a si mesmo
        if (auth()->id() == $id) {
            return redirect('/admin/users')
                ->with('error', 'Você não pode alterar seu próprio nível!');
        }

        $user->role = $request->role;
        $user->save();

        return redirect('/admin/users')
            ->with('success', 'Usuário atualizado com sucesso!');
    }
}