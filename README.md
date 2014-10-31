# Mercurio v1.1.1
O Mercurio foi desenvolvido com o intuito de simplificar o gerenciamento de eventos, onde em poucos passos é possivel gerenciar todas as suas atividades, submissões, lista de presenças e inscrições. Com uma interface limpa e responsiva para não haver dificuldades na hora da utilização do sistema. 

### Esquema do projeto
======================
```
  Evento
    |         |---------------> Submissão de Artigos 
    |         |
    |         |
    |--> Atividade <------> Tipo de Atividade
              |
              |
              |-----------------> Inscrições -----> Lista de Presença
                                      ^
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
==========================
- **FrameWork:** [CodeIgniter](https://ellislab.com/codeigniter)
- **CSS:** [Bootstrap](https://getbootstrap.com) - [Yeti](http://bootswatch.com/yeti) - [SB Admin 2](http://startbootstrap.com/template-overviews/sb-admin-2)
- **JavaScript:** [Jquery](http://jquery.com) - [Masked Input Plugin](http://digitalbush.com/projects/masked-input-plugin)
- **Icones:** [Font Awesome](http://fortawesome.github.io/Font-Awesome)


### Contato
============
**Guilherme Escarabel**
- **Email:** guilherme.escarabel@icloud.com
- **Twitter:** [@escarabelsilva](http://twitter.com/escarabelsilva)
- **Facebook:** http://www.facebook.com/guilherme.escarabel

