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
![sistema-empresarial](https://github.com/user-attachments/assets/4aa75b1c-dec1-45b4-9ac4-1318ae8cbce3)
![Captura de tela 2024-11-15 185013](https://github.com/user-attachments/assets/a0a03182-07ba-40fc-a016-5803f0e0c575)
![Captura de tela 2024-11-15 185051](https://github.com/user-attachments/assets/6d63d3f1-1e55-4209-9b23-420902660e0e)
![Captura de tela 2024-11-15 185104](https://github.com/user-attachments/assets/40d16b75-6012-473e-99c9-2320cbcc8532)
![Captura de tela 2024-11-15 185142](https://github.com/user-attachments/assets/db77ff62-cf74-4e8e-b378-db1c5b76fb14)
![Captura de tela 2024-11-15 185209](https://github.com/user-attachments/assets/3bc82374-830a-48b4-9df1-3c3f5ec9ec6e)
![Captura de tela 2024-11-15 184858](https://github.com/user-attachments/assets/494b6b9a-772f-4efb-9474-b6704750f845)
![Captura de tela 2024-11-15 184913](https://github.com/user-attachments/assets/c9508235-f49c-4fea-b2a9-d9dbe27fdfc7)


-------------------------
LOGIN E SENHA
-------------------------
user - senha123
-------------------------
ismaell - 123456
-------------------------
admin - admin
-------------------------
#   S i s t e m a - E m p r e s a r i a l  
 # Sistema-Empresarial
# Sistema-Empresarial
