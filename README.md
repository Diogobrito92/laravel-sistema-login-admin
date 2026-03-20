# 🚀 Sistema de Login com Admin (Laravel)

Projeto desenvolvido com Laravel com foco em autenticação, controle de acesso e painel administrativo.

## 🔥 Funcionalidades

- Login e cadastro de usuários
- Controle de permissões (admin/user)
- CRUD de usuários
- Proteção de rotas
- Paginação e busca
- Interface com Tailwind

## 🛠️ Tecnologias

- PHP (Laravel)
- MySQL
- Tailwind CSS

## 📸 Imagens

Página Inicial
[Página Inicial - Login](image.png)
[Página Inicial - Cadastro](image-1.png)
[Verificação de campo vazio no login](image-6.png)
[Página de Usuário](image-2.png)
[Página de editar perfil](image-3.png)
[Página de editar perfil](image-4.png)
[Página de confirmação de exclusão de conta](image-5.png)
[Página do Admin](image-7.png)

## 🚀 Como rodar

```bash
git clone ...
cd projeto
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve