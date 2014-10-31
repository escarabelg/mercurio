drop database ci_mercurio;

create database ci_mercurio;

use ci_mercurio;

CREATE TABLE usuarios(
    usuariosId integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
    usuariosNome varchar(200) NOT NULL,
    usuariosCpf varchar(14) NOT NULL,
    usuariosRg varchar(20) NOT NULL,
    usuariosCep varchar(10) NOT NULL,
    usuariosDataDeNascimento date NOT NULL,
    usuariosDataDeCadastro date NOT NULL, 
    usuariosTitulacoes varchar(200),
    usuariosEndereco varchar(80) NOT NULL,
    usuariosBairro varchar(80) NOT NULL,
    usuariosNumero varchar(10) NOT NULL,
    usuariosEstado varchar(20) NOT NULL,
    usuariosImagem blob,
    usuariosCidade varchar(20) NOT NULL,
    usuariosEmail varchar(80) NOT NULL,
    usuariosSenha varchar(20) NOT NULL,
    usuariosSexo varchar(1) NOT NULL,
    usuariosPermissao integer(1) DEFAULT 0
)ENGINE=InnoDB;

CREATE TABLE eventos(
    eventosId integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
    eventosCriadorId integer NOT NULL,
    eventosNome varchar(80) NOT NULL,
    eventosDescricao text NOT NULL,
    eventosImagem blob,
    eventosEmail varchar(50) NOT NULL,
    eventosDataInicio date NOT NULL,
    eventosDataTermino date NOT NULL,
    eventosDataCadastro date NOT NULL,
    eventosLocal varchar(80) NOT NULL,
    eventosCep varchar(10) NOT NULL,
    eventosEndereco varchar(80) NOT NULL,
    eventosBairro varchar(80) NOT NULL,
    eventosNumero varchar(10) NOT NULL,
    eventosEstado varchar(20) NOT NULL,
    eventosValor numeric(4,2) NOT NULL,    
    eventosVisibilidade char(1) NOT NULL,
    eventosCidade varchar(20) NOT NULL,
    eventosTotalInscritos numeric(4),
    eventosTotalPendentes numeric(4),
    eventosTotalConfirmados numeric(4),
    eventosValorTotalInscrições numeric(4,2),
    eventosValorTotalConfirmado numeric(4,2),
    eventosValorTotalNaoConfirmados numeric(4,2),
    CONSTRAINT eventos_CriadorId FOREIGN KEY(eventosCriadorId) REFERENCES usuarios(usuariosId)
)ENGINE=InnoDB;

CREATE TABLE atividadesTipos (
    atividadesTiposId integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
    atividadesTiposNome varchar(200) NOT NULL 
)ENGINE=InnoDB;

CREATE TABLE atividades (
    atividadesId integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
    atividadesEventosId integer NOT NULL,
    atividadesPalestrantesId integer NOT NULL,
    atividadesTipoId INTEGER NOT NULL,
    atividadesNome varchar(80) NOT NULL,
    atividadesDescricao varchar(250) NOT NULL,
    atividadesLocal varchar(200) NOT NULL,
    atividadesDataInicio date NOT NULL,
    atividadesDataTermino date NOT NULL,
    atividadesCargaHoraria numeric(3) NOT NULL,
    atividadesVagas numeric(4),
    atividadesVisibilidade char(1) NOT NULL,
    atividadesValor numeric(4,2) NOT NULL,
    CONSTRAINT Atividades_EventosId FOREIGN KEY(atividadesEventosId) REFERENCES eventos(eventosId),
    CONSTRAINT Atividades_AtividadesTiposId FOREIGN KEY(atividadesTipoId) REFERENCES atividadesTipos(atividadesTiposId),
    CONSTRAINT Atividades_PalestrantesId FOREIGN KEY(atividadesPalestrantesId) REFERENCES usuarios(usuariosId)
)ENGINE=InnoDB;

CREATE TABLE atividadePresenca(
    atividadePresencaId integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
    atividadePresencaAtividadeId integer NOT NULL,
    atividadePresencaUsuariosId integer NOT NULL,
    atividadePresencaData datetime NOT NULL,
    atividadePresencaIs char(1) NOT NULL,
    CONSTRAINT Atividade_Presenca FOREIGN KEY(atividadePresencaAtividadeId) REFERENCES atividades(atividadesId),
    CONSTRAINT Atividade_Usuario FOREIGN KEY(atividadePresencaUsuariosId) REFERENCES usuarios(usuariosId)
)ENGINE=InnoDB;

CREATE TABLE arquivos (
    arquivosId integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
    arquivosCriadorId integer NOT NULL,
    arquivosEventosId integer NOT NULL,
    arquivosOrientadorId integer NOT NULL,
    arquivosFile varchar(500) NOT NULL,
    arquivosStatus varchar(1) NOT NULL DEFAULT 'P',
    arquivosDescricao text,
    arquivosTitulo varchar(250) NOT NULL,
    arquivosRestanteDoGrupo text,
    CONSTRAINT arquivos_CriadorId FOREIGN KEY(arquivosCriadorId) REFERENCES usuarios(usuariosId),
    CONSTRAINT arquivos_EventosId FOREIGN KEY(arquivosEventosId) REFERENCES eventos(eventosId),
    CONSTRAINT arquivos_OrientadorId FOREIGN KEY(arquivosOrientadorId) REFERENCES usuarios(usuariosId)
)ENGINE=InnoDB;

CREATE TABLE inscricoes (
  inscricoesId integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  inscricoesAtividadesId integer NOT NULL,
  inscricoesUsuariosId integer NOT NULL,
  inscricoesStatus char(1),
  CONSTRAINT inscricoes_AtividadesId FOREIGN KEY(inscricoesAtividadesId) REFERENCES atividades(atividadesId),
  CONSTRAINT inscricoes_UsuariosId FOREIGN KEY(inscricoesUsuariosId) REFERENCES usuarios(usuariosId)
)ENGINE=InnoDB;

INSERT INTO atividadesTipos VALUES (null,'Palestra');
INSERT INTO atividadesTipos VALUES (null,'Minicurso');
INSERT INTO atividadesTipos VALUES (null,'Abertura');
INSERT INTO atividadesTipos VALUES (null,'Mesa Redonda');
INSERT INTO atividadesTipos VALUES (null,'Intervalo');
INSERT INTO atividadesTipos VALUES (null,'Workshop');
INSERT INTO atividadesTipos VALUES (null,'Apresentação de Artigos');
INSERT INTO atividadesTipos VALUES (null,'Sessão Técnica');
INSERT INTO atividadesTipos VALUES (null,'Oficina');
INSERT INTO atividadesTipos VALUES (null,'Exposição');
INSERT INTO atividadesTipos VALUES (null,'Encerramento');
INSERT INTO atividadesTipos VALUES (null,'Estudo de Caso');
INSERT INTO atividadesTipos VALUES (null,'Café da Manhã');
INSERT INTO atividadesTipos VALUES (null,'Almoço');
INSERT INTO atividadesTipos VALUES (null,'Jantar');

INSERT INTO `usuarios` (`usuariosId`, `usuariosNome`, `usuariosCpf`, `usuariosRg`, `usuariosCep`, `usuariosDataDeNascimento`, `usuariosDataDeCadastro`, `usuariosTitulacoes`, `usuariosEndereco`, `usuariosBairro`, `usuariosNumero`, `usuariosEstado`, `usuariosImagem`, `usuariosCidade`, `usuariosEmail`, `usuariosSenha`, `usuariosSexo`, `usuariosPermissao`) VALUES
(NULL, 'Fulano Batista dos Santos', '13.456.789-33', '10455078', '76873-000', '1990-10-10', '1980-05-03', NULL, '1', '1', '1', '1', NULL, '1', 'admin@mercurio.com', 'mercuriobeta123', 'M', 1);