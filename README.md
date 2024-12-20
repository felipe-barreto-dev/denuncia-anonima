# Projeto de Denúncia Anônima

## 📜 **Descrição do Projeto**  
Este projeto é uma plataforma que permite a realização de **denúncias anônimas** de forma segura e confidencial. O sistema foi projetado para garantir a privacidade do denunciante, facilitando o envio de informações sensíveis sem a necessidade de identificação.

---

## 🚀 **Funcionalidades Principais**  
- Envio de denúncias anônimas.  
- Criptografia ponta a ponta para proteger os dados.  
- Interface amigável e fácil de usar.  
- Armazenamento seguro das informações.  
- Sistema de rastreamento para acompanhar o status das denúncias (sem expor a identidade).  

---

## 🛠️ **Tecnologias Utilizadas**  
- **Back-end**: PHP, Laravel  
- **Front-end**: Blade, HTML5, CSS3  
- **Banco de Dados**: MariaDB  

---

## 📦 **Como Instalar e Executar Localmente**  

### Pré-requisitos  
- PHP >= 8.0  
- Composer instalado  
- MariaDB configurado  

### Passos  
1. **Clone o repositório**  
   https://github.com/felipe-barreto-dev/denuncia-anonima 

2. **Acesse a pasta do projeto**  
cd projeto-denuncia-anonima


3. **Instale as dependências** 
composer install 

3. **Configure as variáveis de ambiente**
Copie o arquivo .env.example para .env e edite com suas configurações:

APP_NAME=DenunciaAnonima
APP_ENV=local
APP_KEY=base64:GerarChaveComOComando
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mariadb
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

Gere a chave da aplicação
php artisan key:generate

Execute as migrações do banco de dados
php artisan migrate

Inicie o servidor local
php artisan serve

Acesse a aplicação no navegador
Abra o navegador e acesse: http://localhost:8000

🔒 Segurança e Privacidade
Implementamos práticas avançadas para garantir a segurança do projeto:

🔐 Uso de criptografia para proteger os dados.
👤 Garantia de anonimato, sem armazenar IPs ou dados pessoais.
🛡️ Proteção contra vazamento de informações sensíveis.
📄 Licença
Este projeto está licenciado sob a licença MIT. Consulte o arquivo LICENSE para mais informações.

👥 Contribuidores
Agradecimentos aos contribuidores do projeto:

Nome do Desenvolvedor 1 - GitHub
Nome do Desenvolvedor 2 - GitHub

🤝 Como Contribuir
Se você deseja contribuir com o projeto, siga estes passos:

Faça um fork do repositório.

Crie uma branch para sua funcionalidade:
git checkout -b feature/nova-funcionalidade

Faça suas alterações e commits:
git commit -m "Adicionei nova funcionalidade"

Envie as alterações para o seu fork:
git push origin feature/nova-funcionalidade

Abra um Pull Request.
🧩 Roadmap e Melhorias Futuras
Aqui estão algumas ideias para melhorias futuras do projeto:

🚀 Implementação de inteligência artificial para análise das denúncias.
📎 Suporte para envio de arquivos anexos (imagens, documentos).
📧 Notificações automáticas por e-mail para administradores.

💬 Contato
Caso tenha dúvidas, sugestões ou feedback, entre em contato:

📧 seuemail@exemplo.com
🔗 LinkedIn
