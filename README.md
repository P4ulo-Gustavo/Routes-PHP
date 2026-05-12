# Routes-PHP

Projeto de estudo de roteamento e arquitetura MVC em PHP puro, sem frameworks. Implementa um mini-framework com roteador, controllers, sistema de templates e separação clara entre camadas.

---

## Estrutura do Projeto

```
Routes-PHP/
├── App/
│   ├── Controller/
│   │   ├── Http/
│   │   │   ├── Request.php       # Captura e normaliza os dados da requisição
│   │   │   ├── Response.php      # Monta e envia a resposta HTTP
│   │   │   └── Router.php        # Registra e despacha as rotas
│   │   └── View/
│   │       ├── HomeController.php
│   │       ├── LoginController.php
│   │       └── SiginController.php
│   ├── Utils/
│   │   └── View.php              # Sistema de templates com variáveis {{chave}}
│   ├── public/
│   │   ├── index.php             # Front controller — ponto de entrada único
│   │   └── .htaccess             # Redireciona todas as requisições para index.php
│   ├── resources/
│   │   ├── css/                  # Estilos por página
│   │   └── js/                  # Scripts por página
│   ├── router/
│   │   └── page.php              # Registro de todas as rotas da aplicação
│   └── view/
│       ├── header.html
│       ├── footer.html
│       ├── home.html
│       ├── login.html
│       └── sigin.html
├── vendor/                       # Dependências do Composer
└── composer.json
```

---


- PHP 8.0+
- Apache com `mod_rewrite` ativo
- Composer
