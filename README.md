🛣️ Routes-PHP

Mini-framework de roteamento em PHP puro — sem dependência de frameworks externos. Projeto de estudo focado em arquitetura MVC, front controller pattern e sistema de templates.


📋 Sobre o Projeto
O Routes-PHP é um projeto prático de aprendizagem que implementa do zero um sistema de roteamento em PHP puro, seguindo o padrão MVC (Model-View-Controller). O objetivo foi entender como frameworks modernos como Laravel funcionam internamente — construindo as peças fundamentais: roteador, controllers, sistema de templates e separação de responsabilidades entre camadas.

🗂️ Estrutura do Projeto
Routes-PHP/
├── App/
│   ├── Controller/
│   │   ├── Http/
│   │   │   ├── Request.php        # Captura e normaliza os dados da requisição HTTP
│   │   │   ├── Response.php       # Monta e envia a resposta HTTP
│   │   │   └── Router.php         # Registra e despacha as rotas
│   │   └── View/
│   │       ├── HomeController.php
│   │       ├── LoginController.php
│   │       └── SiginController.php
│   ├── Utils/
│   │   └── View.php               # Motor de templates com sintaxe {{chave}}
│   ├── public/
│   │   ├── index.php              # Front Controller — único ponto de entrada
│   │   └── .htaccess              # Redireciona todas as requisições para index.php
│   ├── resources/
│   │   ├── css/                   # Estilos por página
│   │   └── js/                    # Scripts por página
│   ├── router/
│   │   └── page.php               # Definição centralizada de todas as rotas
│   └── view/
│       ├── header.html
│       ├── footer.html
│       ├── home.html
│       ├── login.html
│       └── sigin.html
├── vendor/                        # Dependências gerenciadas pelo Composer
├── composer.json
└── .gitignore

⚙️ Como Funciona
Front Controller Pattern
Toda requisição HTTP é redirecionada pelo .htaccess para o arquivo public/index.php. Esse arquivo atua como front controller — o único ponto de entrada da aplicação.
Requisição HTTP
     ↓
  .htaccess   →   public/index.php   →   Router.php   →   Controller   →   View
Sistema de Roteamento
O Router.php registra rotas associando um método HTTP + URI a um controller e método específico. Quando uma requisição chega, o roteador compara a URI atual com as rotas registradas e chama o controller correspondente.
php// Exemplo de registro de rota (em router/page.php)
$router->get('/', [HomeController::class, 'index']);
$router->get('/login', [LoginController::class, 'index']);
$router->post('/login', [LoginController::class, 'store']);
Motor de Templates
A classe View.php carrega arquivos .html da pasta view/ e substitui variáveis no formato {{chave}} pelos valores passados pelo controller — um sistema de template simples, sem dependência de bibliotecas externas.
php// Uso no controller
View::render('home', [
    'title' => 'Página Inicial',
    'user'  => 'Gustavo'
]);
html<!-- No arquivo home.html -->
<h1>Olá, {{user}}!</h1>

🚀 Como Rodar Localmente
Pré-requisitos

PHP 8.0 ou superior
Apache com mod_rewrite habilitado
Composer

Passo a passo
1. Clone o repositório
bashgit clone https://github.com/P4ulo-Gustavo/Routes-PHP.git
cd Routes-PHP
2. Instale as dependências
bashcomposer install
3. Configure o Apache
O document root deve apontar para a pasta public/, não para a raiz do projeto. Isso garante que nenhum arquivo interno seja acessível diretamente pelo browser.
No seu Virtual Host Apache:
apache<VirtualHost *:80>
    ServerName routes-php.local
    DocumentRoot /var/www/html/Routes-PHP/App/public

    <Directory /var/www/html/Routes-PHP/App/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
4. Certifique-se de que o mod_rewrite está ativo
bashsudo a2enmod rewrite
sudo systemctl restart apache2
5. Verifique o .htaccess
O arquivo public/.htaccess deve conter as regras de reescrita que redirecionam todas as requisições para o index.php:
apacheOptions -MultiViews
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ index.php [QSA,L]

⚠️ Atenção: A diretiva AllowOverride All no Virtual Host é obrigatória para que o .htaccess funcione. Sem ela, as regras de reescrita são ignoradas.

6. Acesse no browser
http://localhost/
http://localhost/login
http://localhost/sigin

🛠️ Configuração no Ubuntu com Apache
Se estiver rodando em Ubuntu (incluindo via recovery mode ou instalação fresca):
bash# Instalar Apache e PHP
sudo apt update
sudo apt install apache2 php libapache2-mod-php php-cli -y

# Habilitar mod_rewrite
sudo a2enmod rewrite

# Reiniciar Apache
sudo systemctl restart apache2
Certifique-se de que o arquivo /etc/apache2/apache2.conf (ou seu Virtual Host) contém:
apache<Directory /var/www/>
    AllowOverride All
</Directory>

📦 Dependências
Gerenciadas via Composer (composer.json). Após clonar, execute:
bashcomposer install
A pasta vendor/ está no .gitignore e não é versionada.

💡 Conceitos Praticados
ConceitoDescriçãoMVCSeparação entre lógica (Controller), dados (Model) e apresentação (View)Front ControllerPonto de entrada único para todas as requisiçõesRoteamentoMapeamento de URIs para controllers e métodosAutoload PSR-4Carregamento automático de classes via ComposerMotor de TemplatesSubstituição de variáveis em arquivos HTMLmod_rewriteReescrita de URLs no Apache para URLs amigáveisHTTP MethodsDistinção entre requisições GET e POST

🔮 Próximos Passos (Ideias de Evolução)

 Adicionar suporte a parâmetros dinâmicos nas rotas (ex: /user/{id})
 Implementar camada de Model com acesso ao banco de dados (PDO)
 Criar sistema de middlewares para autenticação
 Adicionar suporte a rotas com método PUT e DELETE
 Implementar injeção de dependência simples
 Adicionar tratamento de erros HTTP (404, 500)


👤 Autor
Paulo Gustavo
Estudante de Desenvolvimento Web | PHP · Laravel · JavaScript · SQL
GitHub



- PHP 8.0+
- Apache com `mod_rewrite` ativo
- Composer
