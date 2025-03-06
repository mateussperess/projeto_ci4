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

## 📧 Sistema de Emails

- Template de boas-vindas personalizado
- Notificações de status de anúncios
- Comunicação com corretores

## 👥 Níveis de Acesso

- Administrador
- Corretor
- Usuário comum

### 🏠 Gestão de Imóveis

- Cadastro e gerenciamento de imóveis
- Upload de fotos dos imóveis
- Sistema de busca e filtros (em andamento)
- Categorização de imóveis (casa, apartamento, terreno, etc.)

## 🔒 Sistema de Aprovação

- Análise de anúncios
- Status: Aprovado/Pendente/Rejeitado
- Notas do corretor
- Verificação de dados

### 🎨 Interface

- Design responsivo com TailwindCSS
- Navegação intuitiva
- Sistema de notificações
- Feedback visual de ações
- Validações em tempo real
- Seções: Sobre, Catálogo, Contato

## 💼 Seção Institucional

- Missão, Visão e Valores
- Equipe administrativa renderizada de forma dinâmica

## 🛠️ Tecnologias Utilizadas

- **Backend:** CodeIgniter 4, PHP 8+
- **Banco de Dados:** MySQL
- **Frontend:** TailwindCSS, JavaScript, HTML e CSS
- **Ícones:** Font Awesome, SVG

## 🚩 Rotas do Sistema

### Públicas

- `/` - Página inicial (home)
- `/login` - Página de login
- `/register` - Página de registro
- `/houses` - Listagem de casas
- `/apartments` - Listagem de apartamentos
- `/lands` - Listagem de terrenos

### Área do Usuário

- `/dashboard` - Painel principal
- `/dashboard/profile` - Perfil do usuário
- `/dashboard/edit_profile` - Edição de perfil
- `/dashboard/announce` - Anunciar imóvel
- `/dashboard/announcements` - Anúncios do usuário
- `/dashboard/houses` - Casas (visualização de app)
- `/dashboard/apartments` - Apartamentos (visualização de app)
- `/dashboard/lands` - Terrenos (visualização de app)

### Área do Corretor

- `/broker` - Painel do corretor
- `/broker/pending` - Anúncios pendentes
- `/broker/evaluated` - Anúncios avaliados
- `/broker/review/(:num)` - Revisão de anúncio pendente
- `/broker/profile` - Perfil do corretor

### Área Administrativa

- `/admin` - Painel administrativo
- `/admin/users` - Gestão de usuários
- `/admin/profile` - Perfil (temporariamente utiliza o perfil do usuário)
- `/admin/edit_profile` - Editar perfil (temporariamente utiliza o perfil do usuário)
- `/admin/users/create_user` - Criar novo usuário
- `/admin/users/edit_user` - Editar usuário

### Geral

- `/logout` - Desloga do sistema

## 📦 Estrutura do Projeto

```
projeto_ci4/
├── app/
│   ├── Config/
│   │   ├── Routes.php
│   │   └── Filters.php
│   ├── Controllers/
│   │   ├── Admin.php
│   │   ├── Auth.php
│   │   ├── Broker.php
│   │   ├── Dashboard.php
│   │   ├── Home.php
│   │   ├── PreAnnouncement.php
│   │   └── User.php
│   ├── Models/
│   │   ├── PreAnnouncementModel.php
│   │   ├── ProfilePhotoModel.php
│   │   ├── PropertyPhotosModel.php
│   │   └── UserModel.php
│   └── Views/
│       ├── admin/ (grupo de arquivos para os templates do admin)
│       ├── broker/ (grupo de arquivos para os templates do corretor)
│       ├── Dashboard/ (grupo de arquivos para os templates do usuário)
│       ├── emails/ (grupo de arquivos para os templates do email)
│       │   └── welcome.php
│       ├── templates/ (templates gerais)
│       │   ├── about.php
│       │   ├── apartments.php
│       │   ├── contact.php
│       │   ├── houses.php
│       │   └── lands.php
│       ├── login.php
│       ├── profile.php
│       └── register.php
└── public/
    ├── img/
    ├── js/
    ├── svg/
    ├── uploads/ (diretório para armazenar arquivos de upload)
    │   ├── profile_photos/
    │   └── property_photos/
    └── style/ (grupo dos arquivos de estilização)
```

## ⚙️ Instalação

1. **Instale o XAMPP**

   - Faça download em: https://www.apachefriends.org
   - Instale com Apache e MySQL selecionados

2. **Clone o Repositório**

   - Baixe o projeto como ZIP do GitHub ou clone o projeto com o Git.
   - Path da pasta do projeto: C:\xampp\htdocs\projeto_ci4

3. **Configure o ambiente**

   - Renomeie env para .env
   - No arquivo .env configure:
     ```
     database.default.hostname = localhost
     database.default.database = projeto_ci4
     database.default.username = root
     database.default.password =
     ```

4. **Configure o banco de dados**

   - Abra o XAMPP Control Panel
   - Inicie Apache e MySQL
   - Acesse: http://localhost/phpmyadmin
   - Crie um banco chamado "projeto_ci4"
   - Importe o arquivo "projeto_ci4.sql" do projeto

5. **Acesse o projeto**
   ```
   http://localhost/projeto_ci4
   ```

## 📋 Pré-requisitos

- XAMPP (inclui PHP 8.0+, MySQL e Apache)
- Navegador web atualizado
