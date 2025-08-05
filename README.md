# jwt-auth-api
Secure REST API authentication using JWT (JSON Web Tokens) with PHP and jQuery frontend
# Projeto de uma API com Autenticação JWT em PHP

![Status do Projeto](https://img.shields.io/badge/status-em%20desenvolvimento-yellow)
![PHP](https://img.shields.io/badge/PHP-8.2-blue?logo=php)
![jQuery](https://img.shields.io/badge/jQuery-3.7-blue?logo=jquery)
![MySQL](https://img.shields.io/badge/MySQL-8.0-orange?logo=mysql)

Um projeto de estudo focado na implementação de um fluxo de autenticação `stateless` (sem estado) para proteger uma API RESTful, utilizando JSON Web Tokens (JWT).

---


### 🎯 Sobre o Projeto

O objetivo deste projeto foi construir e entender na prática a arquitetura de segurança por trás de APIs modernas. A aplicação simula um cenário onde um frontend (cliente) precisa se autenticar para consumir um endpoint protegido em um backend (servidor).

---

### ⭐ Principais Funcionalidades

* **Geração de Token:** Um endpoint que simula um login e gera um token JWT assinado e com tempo de expiração.
* **Armazenamento no Frontend:** O token é armazenado no `localStorage` do navegador para ser reutilizado em requisições futuras.
* **Endpoint Protegido:** Um endpoint de API que só libera o acesso aos dados se um token válido for enviado no cabeçalho `Authorization`.
* **Validação Completa:** O backend valida a assinatura, a validade e as `claims` do token a cada requisição.

---

### 💻 Decisões de Arquitetura

Este protótipo foi construído sobre alguns princípios chave:

1.  **Autenticação Stateless:** O servidor não armazena o estado da sessão do usuário. Toda a informação necessária para a autenticação está contida no próprio JWT, tornando a API escalável e independente.

2.  **Comunicação Cliente-Servidor:**
    * **Frontend (JS/jQuery):** Responsável por obter o token no login, armazená-lo no `localStorage` e anexá-lo como um `Bearer Token` no cabeçalho `Authorization` de todas as chamadas AJAX subsequentes.
    * **Backend (PHP):** Responsável por proteger os endpoints. Ele intercepta cada requisição, extrai o token do cabeçalho e usa a biblioteca `firebase/php-jwt` para decodificar e validar a assinatura e a expiração antes de executar qualquer lógica de negócio.

---

### 🛠️ Stack de Tecnologia

* **Backend:** PHP 8.2
* **Gerenciador de Dependências:** Composer
* **Biblioteca JWT:** `firebase/php-jwt`
* **Frontend:** JavaScript com jQuery (para AJAX)
* **Banco de Dados:** MySQL
* **Servidor de Desenvolvimento:** Xampp

---

### 🚀 Como Rodar o Projeto Localmente

Siga os passos abaixo para testar a aplicação na sua máquina.

**Pré-requisitos:**
* PHP 8.0+
* Composer
* MySQL (ou um ambiente como o XAMPP)

**Instalação:**

1.  **Clone o repositório:**
    ```bash
    git clone https://github.com/joaopauloa3/jwt-auth-api.git
    ```
2.  **Navegue até a pasta do projeto:**
    ```bash
    cd jwt-auth-api
    ```
3.  **Instale as dependências do PHP:**
    ```bash
    composer install
    ```
4.  **Importe o Banco de Dados:**
    * Crie um banco de dados chamado `jwt_test_db`.
    * Importe o arquivo `database.sql` que está neste repositório.
5.  **Inicie o servidor:**
    ```bash
    php -S localhost:8000
    ```
6.  Acesse `http://localhost:8000` no seu navegador.

---

### (Fluxo da aplicação)

![Diagrama do fluxo do projeto](https://raw.githubusercontent.com/joaopauloa3/jwt-auth-api/refs/heads/main/image.png)

---

### 🔗 Sobre o Autor

* **João Paulo B. dos Santos**
* **LinkedIn:** [https://www.linkedin.com/in/jpbarboza/](https://www.linkedin.com/in/jpbarboza/)

