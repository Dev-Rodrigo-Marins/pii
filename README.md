## 🚀 Como rodar o projeto

> Siga os passos abaixo para configurar e rodar o projeto localmente em um ambiente com XAMPP.

---

### ✅ Pré-requisitos

- [XAMPP](https://www.apachefriends.org/index.html) instalado e rodando
- PHP 8.x
- Composer
- Node.js & NPM

---

### 📁 1. Clone o repositório

Clone este repositório dentro da pasta `htdocs` do XAMPP:

```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
````
---
### 📦 2. Instale as dependências PHP
Acesse o diretório do projeto e execute:

```bash 
composer install
```

### 📦 3. Instale e compile os assets JavaScript

```bash
npm install
npm run build
```

### ⚙️ 4. Configure o ambiente
Renomeie o arquivo .env.example para .env:

```bash 
copy .env.example .env
```

Gere a chave da aplicação:
```bash 
php artisan key:generate
```
### 🔗 5. Crie o link simbólico para o diretório de storage
```bash 
php artisan storage:link
```

### 🌱 7. Popule o banco com dados iniciais
Execute o comando abaixo para criar dados fictícios, incluindo um usuário de teste:

```bash 
php artisan db:seed
```

Usuário padrão:

📧 E-mail: usuario@example.com

🔒 Senha: 123456

### 🌐 8. Acesse o projeto no navegador
Abra o navegador e acesse:
```bash 
http://localhost/seu-repositorio/public
```

### 🛠️ Dica de desenvolvimento
Durante o desenvolvimento, para recarregamento automático de estilos/scripts com Vite, execute:
```bash 
npm run dev
```

👤 Autor Rodrigo Marins

📄 Licença
Este projeto está licenciado sob a MIT License.
