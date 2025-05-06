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
Gere as tabelas no banco de dados:
```bash 
php artisan migrate
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
http://localhost/pii/public
```
## ✉️ Configuração de E-mail com Mailtrap

Este projeto utiliza o recurso de verificação de e-mail do Laravel. Para que isso funcione corretamente em ambiente de desenvolvimento, recomendamos o uso do [Mailtrap](https://mailtrap.io), uma ferramenta gratuita para captura de e-mails de teste.

### ✅ Passos para configurar o Mailtrap

1. **Crie uma conta gratuita no Mailtrap:**
   - Acesse: [https://mailtrap.io](https://mailtrap.io)
   - Crie uma conta e acesse o painel.

2. **Crie uma inbox:**
   - No painel do Mailtrap, clique em **Inboxes** > **Add Inbox**
   - Dê um nome (ex: `Laravel Octos`)

3. **Copie os dados SMTP:**
   - Clique na inbox criada
   - Vá até a aba **SMTP Settings**
   - Selecione a integração **Laravel 8+**
   - Copie os dados SMTP exibidos

4. **Configure o arquivo `.env` do projeto:**

```
   MAIL_MAILER=smtp
   MAIL_HOST=sandbox.smtp.mailtrap.io
   MAIL_PORT=2525
   MAIL_USERNAME=SEU_USERNAME_AQUI
   MAIL_PASSWORD=SUA_SENHA_AQUI
   MAIL_ENCRYPTION=null
   MAIL_FROM_ADDRESS=nao-responder@octos.com
   MAIL_FROM_NAME="Cadastro Octos"
```

### 🛠️ Dica de desenvolvimento
Durante o desenvolvimento, para recarregamento automático de estilos/scripts com Vite, execute:
```bash 
npm run dev
```


👤 Autor Rodrigo Marins

📄 Licença
Este projeto está licenciado sob a MIT License.
