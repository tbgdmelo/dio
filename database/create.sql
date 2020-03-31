CREATE TABLE modelo_maquina(
    id_modelo INT AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL UNIQUE,
    PRIMARY KEY (id_modelo)
);

CREATE TABLE tipo_lubrificacao(
    id_lubrificacao INT AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL UNIQUE,
    PRIMARY KEY (id_lubrificacao)
);

CREATE TABLE fabricante_oleo(
    id_faboleo INT AUTO_INCREMENT,
    nome VARCHAR (100) NOT NULL UNIQUE,
    PRIMARY KEY (id_faboleo)
);

CREATE TABLE oleo(
    id_oleo INT AUTO_INCREMENT,
    nome VARCHAR (100) NOT NULL UNIQUE,
    fabricante INT,
    PRIMARY KEY (id_oleo),
    FOREIGN KEY (fabricante) REFERENCES fabricante_oleo (id_faboleo)
);

CREATE TABLE fabricante_filtro(
    id_fabfiltro INT AUTO_INCREMENT,
    nome VARCHAR (100) NOT NULL UNIQUE,
    PRIMARY KEY (id_fabfiltro)
);

CREATE TABLE filtro(
    id_filtro INT AUTO_INCREMENT,
    nome VARCHAR (100) NOT NULL UNIQUE,
    fabricante INT,
    PRIMARY KEY (id_filtro),
    FOREIGN KEY (fabricante) REFERENCES fabricante_oleo (id_faboleo)
);

CREATE TABLE maquina(
    snum VARCHAR (50) NOT NULL,
    nome VARCHAR (100) NOT NULL,
    tempotrabalho INT NOT NULL,
    tempofiltro INT NOT NULL,
    tempooleo INT NOT NULL,
    modelo INT NOT NULL,
    lubrificacao INT NOT NULL,
    oleo INT,
    filtro INT,
    PRIMARY KEY (snum),
    FOREIGN KEY (modelo) REFERENCES modelo_maquina (id_modelo),
    FOREIGN KEY (lubrificacao) REFERENCES tipo_lubrificacao(id_lubrificacao),
    FOREIGN KEY (oleo) REFERENCES oleo (id_oleo),
    FOREIGN KEY (filtro) REFERENCES filtro (id_filtro)
);

CREATE TABLE tipo_peca(
    id_tipo INT AUTO_INCREMENT,
    nome VARCHAR (100) NOT NULL UNIQUE,
    PRIMARY KEY (id_tipo)
);

CREATE TABLE peca(
    id_peca INT AUTO_INCREMENT,
    nome VARCHAR (100) NOT NULL UNIQUE,
    valor VARCHAR (14) NOT NULL,
    tipo INT NOT NULL,
    hrs_prod INT NOT NULL,
    PRIMARY KEY (id_peca),
    FOREIGN KEY (tipo) REFERENCES tipo_peca (id_tipo)
);

CREATE TABLE turno(
    id_turno INT AUTO_INCREMENT,
    nome VARCHAR (15) NOT NULL UNIQUE,
    PRIMARY KEY (id_turno)
);

CREATE TABLE plano_manutencao(
    id_plano INT AUTO_INCREMENT,
    custo VARCHAR (11) NOT NULL,
    data_realizado DATE,
    turno INT NOT NULL,
    motivo VARCHAR (500),
    serial_maquina VARCHAR(50),
    PRIMARY KEY (id_plano),
    FOREIGN KEY (turno) REFERENCES turno (id_turno),
    FOREIGN KEY (serial_maquina) REFERENCES maquina (snum)
);

CREATE TABLE peca_maquina(
    serial_maquina VARCHAR(50),
    id_peca INT,
    PRIMARY KEY (serial_maquina, id_peca),
    FOREIGN KEY (serial_maquina) REFERENCES maquina (snum),
    FOREIGN KEY (id_peca) REFERENCES peca (id_peca)
);

CREATE TABLE peca_plano(
    id_plano INT,
    id_peca INT,
    PRIMARY KEY (id_plano, id_peca),
    FOREIGN KEY (id_plano) REFERENCES plano_manutencao (id_plano),
    FOREIGN KEY (id_peca) REFERENCES peca (id_peca)
);



SET character_set_client = utf8;
SET character_set_connection = utf8;
SET character_set_results = utf8;
SET collation_connection = utf8_general_ci;