# Mercurio v1.1.1

O Mercurio é um sistema onde é possivel gerenciar seu evento por completo, uma pequena esquematização de como é a base do sistema.

**Evento**
    |         |---------------> **Submissão de Artigos**  
    |         |
    |         |
    |--> **Atividade** <------> **Tipo de Atividade**
              |
              |
              |----------------> **Inscrições** -----> **Lista de Presença**
                                      |
                                      v
                                 **Usuários**
              
    

## Como usar
O sistema foi projetado no Framework CodeIgniter, sendo assim, é simples sua utilização. Após o download do projeto, vá em **~/application/config**, e edite 2 arquivos de configuração:

1* config.php
  Na linha 17: 
    $config['base_url'] = 'seu-caminho-do-servidor'; e mude de acordo com o caminho do seu servidor

2* database.php
  Apartir da linha 51:
    $db['default']['hostname'] = 'seu-servidor-bd'; // ex:localhost
    $db['default']['username'] = 'login-banco-de-dados'; //ex: root
    $db['default']['password'] = 'senha-banco-de-dados'; //ex: 1234
    $db['default']['database'] = 'nome-da-base-de-dados'; //ex: mercurio
    
Após mudar estas configurações é necessário criar a base de dados no seu banco. O .sql está em **~/sql**, apenas a importe e estará quase pronto para utilização.

Por fim, é necessário uma última configuração no seu servidor que é habilitar o módulo de reescrita de url's no seu servidor. Após ter feito estas pequenas configurações, já é possivel utilizar o sistema por completo.



```
**Nome:** nome da obra
**Localização:** Endereço, ou ao menos a cidade da obra
**Prazo estimado:** Quando era esperado que terminasse
**Início estimado:** Quando era esperado que começasse a obra
**Data de finalização:** caso ainda não esteja finalizado(apenas estimativa), coloque entre parenteses
**Data de início:** caso nao tenha iniciado quando previsto
**Valores:** caso saiba dos valores, coloque aqui o valor usado de recursos públicos, privados, esperado e/ou real

**Descriçao:** Acrescente aqui uma descriçao, seguindo as normas citadas no item "normas"

**Links:** Coloque uma lista de notícias, e links úteis, para dar credibilidade às suas afirmações e apontar a responsabilidade pelas informações citadas

**Extras:** Aqui, pode-se usar links para o vídeos, páginas de enquetes, imagens, etc.
```

#### Ferramentas Utilizadas

Ferramentas podem ser enquetes, abaixo assinados, notícias ou infográficos úteis, etc.
O objetivo é facilitar o acesso às informações a todos os cidadãos.

```
**Nome:** O nome da ferramenta
**Descrição:** Uma descrição da ferramenta
**Links:** Coloque aqui o link para a ferramenta.
```

## Normas e termos

- Este é um projeto no Github, portanto, não é responsabilidade do Github, as informações contidas aqui.
- Trata-se de um projeto open source, livre, aberto ao público.
- Issues são públicas, ou seja, podem ser lidas, alteradas e criadas por qualquer pessoa, seguindo as funcionalidades oferecidas pelo Github.
- Este projeto é vivo, portanto, não há uma data para início ou finalização do mesmo, e novas issues poderão ser criadas a qualquer momento.
- Issues no Github não são anônimas.
- Issues no Github **não podem ser deletadas**, portanto, leia bem o que escrever, antes de publica-las.
- O Autor do projeto, ou os responsáveis por possíveis forks do mesmo, não são responsáveis de forma alguma pelo que é escrito, citado ou referenciado em issues ou comentários.
- O Autor do projeto, ou os responsáveis por possíveis forks do mesmo, poderão alterar issues que venham a ser consideradas prejudiciais ao intúito ou objetivos do projeto.
- O acesso irrestrito ao projeto e issues garante a todos, o direito de expressão e acesso a informações.
- Cada issue ou comentário é de total responsabilidade do seu autor.
- A LEI BRASILEIRA permite a veiculação de tais informações públicas.
- Issues e comentários **DEVEM** obedecer as seguintes normas:
    - Não use palavras de baixo calão.
    - Não ofenda pessoas diretamente.
    - Se citar nomes, cuidado para não iniciar calúnias ou qualquer outra forma de crime.
    - Cuidado ao expressar opiniões pessoais, o ideal, é não faze-lo aqui, mas sim, em uma página ou blog pessoal, e acrescentar o link à sua issue ou comentário.






