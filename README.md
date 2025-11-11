## Cookies e Sessions no PHP

Este projeto demonstra de forma prática o funcionamento de **Cookies** e **Sessions** no PHP, explicando como manter informações entre diferentes páginas, mesmo com o protocolo HTTP sendo *stateless* (sem estado).

---

## 🧠 Conceito

O protocolo **HTTP** não mantém informações entre as requisições.  
Cada acesso a uma página é tratado como um evento isolado.  
Para resolver isso, usamos **Cookies** e **Sessions**.

| Mecanismo | Onde armazena | Uso ideal |
|------------|----------------|-----------|
| **Cookie** | Navegador do usuário | Preferências, lembretes, dados simples |
| **Session** | Servidor web | Dados sensíveis, autenticação |

---

## 🍪 Cookies

### Criar um cookie
```php
setcookie("usuario", "João", time() + 3600); // Expira em 1 hora
Ler um cookie
php
Copiar código
echo $_COOKIE["usuario"];
Deletar um cookie
php
Copiar código
setcookie("usuario", "", time() - 3600);
````
## ⚠️ Importante:
Cookies devem ser definidos antes de qualquer saída HTML (antes de echo, <html> etc.)

## 💾 Sessions
Iniciar uma sessão
php
Copiar código
session_start();
Criar uma variável de sessão
php
Copiar código
$_SESSION["email"] = "joao@email.com";
Ler uma variável de sessão
php
Copiar código
echo $_SESSION["email"];
Destruir uma sessão
php
Copiar código
session_unset();    // Limpa variáveis
session_destroy();  // Destrói a sessão
## ⚖️ Diferenças entre Cookies e Sessions
Característica	Cookies	Sessions
Armazenamento	Navegador	Servidor
Segurança	Menor (acessível ao usuário)	Maior
Tamanho máximo	~4KB	Ilimitado
Tempo de vida	Definido manualmente	Até fechar o navegador ou timeout

## 🔐 Exemplo: Sistema de Login
````
Estrutura de pastas
pgsql
Copiar código
/login-exemplo/
│
├── index.php        ← Formulário de login
├── validar.php      ← Processa o login
├── dashboard.php    ← Página protegida
└── sair.php         ← Finaliza a sessão
```` 
# Login (index.php)
Exibe formulário

Usa cookie para lembrar o nome de usuário

Exibe mensagem de erro (armazenada na sessão)

Validação (validar.php)
Verifica se usuario e senha estão corretos

Cria a sessão de login

Define ou remove cookie de “lembrar-me”

Dashboard (dashboard.php)
Protege o acesso com session_start()

Exibe o usuário logado

Mostra o cookie se o login foi lembrado

Sair (sair.php)
Encerra sessão e redireciona para o login

