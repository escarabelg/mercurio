# Mercurio v1.1.1
=================
O Mercurio é um sistema onde é possivel gerenciar seu evento por completo.

### Esquema do projeto
```
  Evento
    |         |---------------> Submissão de Artigos 
    |         |
    |         |
    |--> Atividade <------> Tipo de Atividade
              |
              |
              |-----------------> Inscrições -----> Lista de Presença
                                      |
                                      v
                                 Usuários
```

### Instalação
==============
O sistema foi projetado no Framework CodeIgniter, sendo assim, é simples sua utilização. Após o download do projeto, vá em **~/application/config**, e edite 2 arquivos de configuração:
```
1* config.php
  Na linha 17: 
    $config['base_url'] = 'seu-caminho-do-servidor';
```
```
2* database.php
  Apartir da linha 51:
    $db['default']['hostname'] = 'seu-servidor-bd'; 
    $db['default']['username'] = 'login-banco-de-dados'; 
    $db['default']['password'] = 'senha-banco-de-dados'; 
    $db['default']['database'] = 'nome-da-base-de-dados';
```
Após mudar estas configurações é necessário criar a base de dados no seu banco. O .sql está em **~/sql**, apenas a importe e estará quase pronto para utilização.

Por fim, é necessário uma última configuração no seu servidor que é habilitar o módulo de reescrita de url's no seu servidor. Após ter feito estas pequenas configurações, já é possivel utilizar o sistema por completo.


### Ferramentas Utilizadas

Ferramentas podem ser enquetes, abaixo assinados, notícias ou infográficos úteis, etc.
O objetivo é facilitar o acesso às informações a todos os cidadãos.

### Contact

**Natanael Simões**

- **Email:** guilherme.escarabel@icloud.com
- **Twitter:** [@escarabelsilva](http://twitter.com/escarabelsilva)
- **Facebook:** http://www.facebook.com/guilherme.escarabel

