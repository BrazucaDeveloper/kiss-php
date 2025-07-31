<div>
   <img src="../../kiss-php.webp" alt="ícone do framework" height="40" width="40">
   <span style="font-size: 1.4rem;"><strong>KISS-PHP</strong></span>
</div>

# 🚀 Guia de Início Rápido

### 📋 Pré-requisitos

- **PHP 8.4+** instalado
- **Composer** para gerenciamento de dependências
- **Servidor web** (Apache, Nginx ou servidor built-in do PHP)

### ⚡ Instalação Rápida

#### 1. Criar um novo projeto

```bash
git clone https://github.com/kiss-php/framework.git meu-projeto
cd meu-projeto
composer install
```

#### 2. Configurar o ambiente

```bash
# Copie o arquivo de configuração
cp .env.example .env

# Configure suas variáveis de ambiente
nano .env
```

```env
# .env
APP_ENV=development
```

#### 3. Iniciar o servidor

```bash
# Usando o servidor built-in do PHP
php -S localhost:8000 -t public

# Ou configure seu servidor web para apontar para a pasta 'public'
```

### 🎯 Primeiro Controller

Crie seu primeiro controller em `app/Controllers/HomeController.php`:

```php
<?php

namespace App\Controllers;

use KissPhp\Core\WebController;
use KissPhp\Http\Request;
use KissPhp\Attributes\Controller;
use KissPhp\Attributes\Get;
use KissPhp\Attributes\Post;

#[Controller('/')]
class HomeController extends WebController
{
    #[Get]
    public function index()
    {
         return <<<HTML
            <h1>🎉 Bem-vindo ao KISS-PHP!</h1>
            <p>Seu framework está funcionando perfeitamente!</p>
         HTML;
    }

    #[Get('/hello/:name?')]
    public function hello(Request $request)
    {
        $name = $request->getRouteParam('name') ?? 'Mundo';
        return "<h2>Olá, {$name}! 👋</h2>";
    }

    #[Post('/contact')]
    public function contact(Request $request)
    {
        $name = $request->getBody('name');
        $email = $request->getBody('email');
        
        if ($name && $email) {
            return "<p>Obrigado, {$name}! Recebemos seu contato via {$email}</p>";
        } else {
            return "<p>❌ Nome e email são obrigatórios!</p>";
        }
    }
}
```

### 🧪 Testando as Rotas

Agora você pode testar suas rotas:

- **GET** `http://localhost:8000/` → Página inicial
- **GET** `http://localhost:8000/hello/João` → Saudação personalizada
- **GET** `http://localhost:8000/hello` → Saudação padrão

Para testar o POST, crie um arquivo `public/test.html`:

```html
<!DOCTYPE html>
<html>
<head>
    <title>Teste KISS-PHP</title>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Teste de Formulário</h2>
    <form method="POST" action="/contact">
        <label>Nome: <input type="text" name="name" required></label><br><br>
        <label>Email: <input type="email" name="email" required></label><br><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
```

### 🛡️ Adicionando um Middleware

Crie um middleware simples em `app/Middlewares/LogMiddleware.php`:

```php
<?php

namespace App\Middlewares;

use KissPhp\Core\WebMiddleware;
use KissPhp\Http\Request;
use Closure;

class LogMiddleware extends WebMiddleware
{
    public function handle(Request $request, Closure $next): ?Request
    {
        // Log da requisição
        error_log("🚀 Acessando: " . $request->getMethod() . " " . $request->getUri());
        
        // Continue para o próximo middleware/controller
        return $next($request);
    }
}
```

Aplique o middleware ao seu controller:

```php
#[Controller('/', [LogMiddleware::class])]
class HomeController extends WebController
{
    // ... seus métodos
}
```

### 📊 Exemplo com Validação

Crie um validador em `app/Validators/EmailValidator.php`:

```php
<?php

namespace App\Validators;

use KissPhp\Validation\DataValidator;

class EmailValidator extends DataValidator
{
    public function __construct(private string $email) {}

    public function check(): array
    {
       return $this->newValidate()
          ->when(empty($this->email))
          ->notify('O campo email é obrigatório! 📧')
         
          ->when(strlen($this->email) < 5)
          ->notify('Email deve ter pelo menos 5 caracteres! ✉️')
         
          ->whenNot(filter_var($this->email, FILTER_VALIDATE_EMAIL))
          ->notify('Formato de email inválido! ❌')
         
          ->result();
    }
}
```

Crie um DTO em `app/DTOs/ContactDTO.php`:

```php
<?php

namespace App\DTOs;

use KissPhp\Attributes\Validate;
use App\Validators\EmailValidator;

class ContactDTO
{
    #[Validate(EmailValidator::class)]
    public readonly string $email;
    
    public readonly string $name;
    public readonly string $message;
}
```

Use no controller:

```php
#[Post('/contact-validated')]
public function contactValidated(#[Body] ContactDTO $contact): void
{
    return <<<HTML
         <h3>✅ Dados válidos!</h3>
         <p><strong>Nome:</strong> {$contact->name}</p>
         <p><strong>Email:</strong> {$contact->email}</p>
         <p><strong>Mensagem:</strong> {$contact->message}</p>"
    HTML;
}
```

### 🎨 Usando Views (com Twig)

Crie uma view em `app/Views/Pages/welcome.twig`:

```twig
<!DOCTYPE html>
<html>
<head>
    <title>{{ title }}</title>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .container { max-width: 600px; margin: 0 auto; }
        .highlight { color: #e91e63; }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ title }}</h1>
        <p>Olá, <span class="highlight">{{ name }}</span>! 🎉</p>
        <p>{{ message }}</p>
        
        <h3>Próximos Passos:</h3>
        <ul>
            <li>✅ Explore mais rotas</li>
            <li>🛡️ Adicione middlewares</li>
            <li>📊 Implemente validações</li>
            <li>🎨 Customize suas views</li>
        </ul>
    </div>
</body>
</html>
```

Atualize seu controller:

```php
#[Get('/welcome/:name?')]
public function welcome(Request $request)
{
    $name = $request->getRouteParam('name') ?? 'Desenvolvedor';
    
    return $this->render('welcome.twig', [
        'title' => 'Bem-vindo ao KISS-PHP! 🚀',
        'name' => $name,
        'message' => 'Você criou com sucesso sua primeira aplicação usando o framework KISS-PHP!'
    ]);
}
```

### 📁 Estrutura do Projeto

```
meu-projeto/
├── app/
│   ├── Controllers/      # Seus controllers
│   ├── Middlewares/      # Middlewares personalizados
│   ├── Validators/       # Validadores de dados
│   ├── DTOs/             # Data Transfer Objects
│   └── Views/            # Templates Twig
├── public/               # Pasta pública (DocumentRoot)
│   ├── index.php         # Ponto de entrada
│   └── assets/           # CSS, JS, imagens
├── .env                  # Variáveis de ambiente
└── composer.json         # Dependências
```

### 🎯 Próximos Passos

1. **📖 Explore a documentação completa**: [docs/pt/documentation.md](docs/pt/documentation.md)
3. **🤝 Contribua**: [CONTRIBUTING.md](CONTRIBUTING.md)
4. **🐛 Reporte problemas**: [Issues](../../issues)

---

<div align="center">
  <strong>Pronto para simplificar seu desenvolvimento PHP! 🚀</strong>
  
  Feito com 💜 no Brasil
</div>