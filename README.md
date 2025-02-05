<table>
  <tr>
    <td><img src="public/img/blue_logo.png" alt="Logo Peres Imóveis" width="90"></td>
    <td><h1>Peres Imóveis</h1></td>
  </tr>
</table>

## 🚀 Funcionalidades

### 👤 Gestão de Usuários

- Cadastro e autenticação de usuários
- Perfis personalizados com foto
- Upload e gerenciamento de fotos de perfil
- Edição de dados pessoais
- Sistema de boas-vindas por email

### 🏠 Gestão de Imóveis

- Cadastro e gerenciamento de imóveis
- Upload de fotos dos imóveis
- Sistema de busca e filtros
- Categorização de imóveis

### 🎨 Interface

- Design responsivo com TailwindCSS
- Modo escuro/claro
- Navegação intuitiva
- Feedback visual de ações
- Seções: Sobre, Catálogo, Contato

## 🛠️ Tecnologias Utilizadas

- **Backend:** CodeIgniter 4, PHP 8+
- **Banco de Dados:** MySQL
- **Frontend:** TailwindCSS, JavaScript
- **Ícones:** Font Awesome, SVG

## 🚩 Rotas do Sistema

### Públicas

- `/` - Página inicial
- `/login` - Página de login
- `/register` - Página de registro

### Área do Usuário

- `/dashboard` - Painel principal
- `/dashboard/profile` - Perfil do usuário
- `/dashboard/edit_profile` - Edição de perfil
- `/dashboard/announce` - Anunciar imóvel

## 📦 Estrutura do Projeto

```
projeto_ci4/
├── app/
│   ├── Controllers/
│   │   ├── Admin.php
│   │   ├── Auth.php
│   │   ├── Broker.php
│   │   ├── Dashboard.php
│   │   ├── Home.php
│   │   └── User.php
│   ├── Models/
│   │   ├── PreAnnouncementModel.php
│   │   ├── ProfilePhotoModel.php
│   │   ├── PropertyPhotosModel.php
│   │   └── UserModel.php
│   └── Views/
│       ├── admin/
│       ├── broker/
│       ├── Dashboard/
│       ├── templates/
│       ├── login.php
│       ├── profile.php
│       └── register.php
└── public/
    ├── img/
    ├── js/
    ├── uploads/
    │   └── profile_photos/
    └── style/

```

## ⚙️ Instalação

1. **Clone o Repositório**
   `git clone [https://github.com/mateussperess/projeto_ci4]`

2. **Instale as dependências**
   `composer install`

3. **Prepare e configure o ambiente**
   `cp env .env`

4. **Configure a base de dados**

5. **Inicie o servidor**

6. **Base URL de acesso**
   `http://localhost/projeto_ci4/`

## 📋 Pré-requisitos

- PHP 8.0+
- MySQL 5.7+
- Composer
