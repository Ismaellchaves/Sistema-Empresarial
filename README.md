![bem-vindo](https://github.com/user-attachments/assets/f465f274-6720-4452-a2f1-d31881dbbcbe)



Documentação do Sistema Empresarial

Tecnologias Utilizadas:
- Linguagem de Programação: PHP
- Framework de Interface: Bootstrap (para o design responsivo)
- Banco de Dados: MySQL (ou outro banco relacional)
- Operações CRUD: Criação, Leitura, Atualização e Exclusão de registros

---

Visão Geral do Projeto

Este sistema empresarial permite o cadastro, controle de horário e exibição de informações dos funcionários de uma empresa.

Fluxo do Sistema

Início
   - O sistema é iniciado pela tela de login, onde o usuário insere as credenciais para acessar o sistema.

Login
   - Campos:
      - Usuário
      - Senha
   - Objetivo: Permitir que apenas usuários autenticados acessem o sistema.

Captura dos Dados do Funcionário
   - Esta seção permite cadastrar novos funcionários no sistema.
   - Campos:
      - Nome
      - Data de Nascimento
      - Função
   - Ação: Os dados inseridos são enviados para o banco de dados, criando um novo registro na tabela `funcionario`.

Registro de Horários do Funcionário
   - Permite ao usuário selecionar um funcionário específico e registrar suas horas de entrada e saída.
   - Campos:
      - Escolha do Funcionário (por ID ou nome)
      - Data
      - Entrada 1
      - Saída 1
      - Entrada 2
      - Saída 2
   - Ação: Os dados inseridos são armazenados na tabela `registar_horas` no banco de dados.

Armazenamento no Banco de Dados
   - Os dados do funcionário são armazenados em duas tabelas principais:
      - Tabela Funcionario: Armazena os dados pessoais do funcionário.
      - Tabela Registrar_Horas: Armazena os registros de horários de entrada e saída.
      
Exibição da Tabela de Funcionários
   - Exibe uma lista de todos os funcionários cadastrados, com opções para:
      - Editar: Permite a atualização dos dados do funcionário.
      - Excluir: Remove o funcionário do banco de dados.

Exibição do Gráfico de Horas Trabalhadas
   - Exibe um gráfico de todos os funcionários cadastrados, com caros para:
      - verde: funcionarios que trabalharam mais de 8h.
      - amarelo: funcionarios que trabalharam mais de 6h.
      - vermeçho: funcionarios que trabalharam menos de 6h.


Fim
   - O sistema retorna à tela inicial ou de login, onde pode ser encerrado ou reutilizado.

Detalhes Técnicos

- Front-end: Interface desenvolvida com Bootstrap para facilitar a navegação, responsividade e estética do sistema.
- perações CRUD:
  - Create: Cadastro de novos funcionários e registro de horários.
  - Read: Listagem e visualização de funcionários cadastrados.
  - Update: Edição dos dados pessoais do funcionário e atualizações nos horários.
  - Delete: Remoção de funcionários cadastrados.
- Banco de Dados:
  - Tabela `funcionario`: Armazena as informações pessoais dos funcionários (nome, data de nascimento, função).
  - Tabela `registar_horas`: Armazena os horários de entrada e saída dos funcionários.

Considerações Finais

O sistema foi projetado para ser simples e eficaz no gerenciamento de dados de funcionários e horários.

                                       
                                     ---IMAGENS DO PROJETO--- 
![Captura de tela 2024-11-15 185013](https://github.com/user-attachments/assets/f457d729-4bc1-4e70-b7d1-3836a263498f)
![Captura de tela 2024-11-15 185051](https://github.com/user-attachments/assets/e9673a2e-993b-4d61-a109-2c9e33cc2e5e)
![Captura de tela 2024-11-15 185104](https://github.com/user-attachments/assets/57905e47-6368-410e-b03e-5f4417daec48)
![Captura de tela 2024-11-15 185142](https://github.com/user-attachments/assets/275fb618-9e36-4d58-9b23-17bad7e21a2c)
![Captura de tela 2024-11-15 185209](https://github.com/user-attachments/assets/ed38d42e-c0ff-4079-b509-bca891769cf3)
![Captura de tela 2024-11-15 184858](https://github.com/user-attachments/assets/8236d8cd-e475-4e29-9e03-1fa7921d3aa7)
![Captura de tela 2024-11-15 184913](https://github.com/user-attachments/assets/703c86a2-d2a1-4cdd-96a5-d9b0d445a90f)



-------------------------
LOGIN E SENHA
-------------------------
user - senha123
-------------------------
ismaell - 123456
-------------------------
admin - admin
-------------------------
