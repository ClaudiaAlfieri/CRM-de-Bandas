# Laravel Music Bands CRM

Este projeto foi desenvolvido como trabalho final da disciplina de **Programação para a WEB - servidor (server-side)** no curso de Front End do CESAE Digital.

## Sobre o Projeto

Este sistema é um CRM (Customer Relationship Management) adaptado para gerenciamento de bandas musicais e seus álbuns. Permite visualização, cadastro, edição e remoção de dados relacionados a bandas e álbuns musicais, com diferentes níveis de permissão baseados no tipo de usuário.

## Funcionalidades

- **Sistema de Autenticação**:
  - Registro de novos usuários
  - Login de usuários existentes
  - Dashboard personalizado para usuários autenticados

- **Gerenciamento de Bandas**:
  - Visualização de todas as bandas cadastradas
  - Detalhes de cada banda (nome, foto, número de álbuns)
  - Funcionalidades CRUD completas (Create, Read, Update, Delete)

- **Gerenciamento de Álbuns**:
  - Visualização de álbuns por banda
  - Detalhes de cada álbum (nome, imagem, data de lançamento)
  - Funcionalidades CRUD completas

- **Níveis de Acesso**:
  - **Administrador**: Pode inserir, editar e apagar bandas e álbuns
  - **Usuário Autenticado**: Pode editar informações
  - **Visitante**: Somente visualização de conteúdo

## Tecnologias Utilizadas

- **Laravel** - Framework PHP para desenvolvimento web
- **MySQL** - Sistema de gerenciamento de banco de dados
- **Blade** - Sistema de templates do Laravel
- **Bootstrap** - Framework front-end para design responsivo

## Requisitos de Sistema

- PHP 8.1 ou superior
- Composer
- MySQL ou outro banco de dados suportado pelo Laravel
- Node.js e NPM (para compilação de assets)

## Instalação

1. Clone o repositório:
   ```
   git clone https://github.com/seu-usuario/laravel-music-bands-crm.git
   cd laravel-music-bands-crm
   ```

2. Instale as dependências:
   ```
   composer install
   npm install
   npm run dev
   ```

3. Configure o ambiente:
   - Crie um arquivo `.env` baseado no `.env.example`
   - Configure suas credenciais de banco de dados no arquivo `.env`

4. Execute as migrações e seeders:
   ```
   php artisan migrate
   php artisan db:seed
   ```

5. Crie o link simbólico para o armazenamento:
   ```
   php artisan storage:link
   ```

6. Inicie o servidor:
   ```
   php artisan serve
   ```

## Estrutura do Banco de Dados

O sistema utiliza as seguintes tabelas principais:
- `users` - Armazena informações dos usuários
- `bands` - Armazena informações das bandas
- `albums` - Armazena informações dos álbuns

## Contribuição

Este projeto foi desenvolvido para fins educacionais. Contribuições são bem-vindas através de pull requests.
