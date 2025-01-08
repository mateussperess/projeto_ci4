<table>
  <tr>
    <td><img src="public/img/blue_logo.png" alt="Logo Peres Imóveis" width="90"></td>
    <td><h1>Peres Imóveis</h1></td>
  </tr>
</table>

## 📋 Sobre o Projeto

Sistema web desenvolvido em CodeIgniter 4 para gestão imobiliária, com foco em uma experiência moderna e intuitiva.

## 🚀 Funcionalidades

Criação de cadastro de usuários, login, gerenciamento de dados conta;

### 👤 Gestão de Usuários

- Cadastro e autenticação
- Perfis personalizados
- Upload de fotos
- Edição de dados pessoais

### 🎨 Interface

- Design responsivo com TailwindCSS
- Modo escuro/claro
- Navegação intuitiva
- Feedback visual de ações

## 🛠️ Tecnologias

- **Backend:** CodeIgniter 4, PHP 8+
- **Database:** MySQL
- **Frontend:** TailwindCSS, JavaScript
- **Ícones:** Font Awesome

## 📦 Estrutura do Projeto

```
  projeto_ci4/
├── app/
│   ├── Controllers/
│   │   ├── Home.php
│   │   ├── Auth.php
│   │   └── User.php
│   ├── Models/
│   │   ├── UserModel.php
│   │   └── ProfilePhotoModel.php
│   └── Views/
│       ├── index.php
│       ├── login.php
│       ├── register.php
│       ├── profile.php
│       ├── edit_profile.php
│       └── templates/
│           ├── header.php
│           └── footer.php
├── public/
│   ├── img/
│   │   ├── blue_logo.png
│   │   ├── black_logo.png
│   │   └── go_top.png
│   ├── style/
│   │   ├── style.css
│   │   └── style_register.css
│   └── uploads/
│       └── profile_photos/
└── ...
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
   `http://localhost/projeto_ci4/public/`

## 📋 Pré-requisitos

- PHP 8.0+
- MySQL 5.7+
- Composer
