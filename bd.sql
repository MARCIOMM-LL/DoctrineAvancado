CREATE TABLE ator
(
  id_ator         SERIAL      PRIMARY KEY,
  primeiro_nome   VARCHAR(45) NOT NULL,
  ultimo_nome     VARCHAR(45) NOT NULL,
  data_atualizado TIMESTAMP   NOT NULL DEFAULT 'NOW()'
);
CREATE INDEX idx_ultimo_nome ON ator USING btree (ultimo_nome);

CREATE TABLE idioma
(
  id_idioma       SMALLSERIAL PRIMARY KEY,
  nome            CHAR(20)  NOT NULL,
  data_atualizado TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TYPE CLASSIFICACAO AS ENUM ('G', 'PG', 'PG-13', 'R', 'NC-17');

CREATE TABLE filme
(
  id_filme           SERIAL PRIMARY KEY,
  titulo             VARCHAR(255)	NOT NULL,
  sinopse            TEXT			DEFAULT NULL,
  ano_lancamento     VARCHAR(4)		NOT NULL,
  id_idioma_audio    SMALLINT		NOT NULL,
  id_idioma_original SMALLINT		NOT NULL,
  classificacao      CLASSIFICACAO	DEFAULT 'G',
  data_atualizado    TIMESTAMP		NOT NULL DEFAULT NOW(),
  CONSTRAINT fk_id_idioma_audio_filme FOREIGN KEY (id_idioma_audio) REFERENCES idioma (id_idioma),
  CONSTRAINT fk_id_idioma_original_filme FOREIGN KEY (id_idioma_original) REFERENCES idioma (id_idioma)
);

CREATE TABLE ator_filme
(
  id_ator  INT NOT NULL,
  id_filme INT NOT NULL,
  PRIMARY KEY (id_ator, id_filme),
  CONSTRAINT fk_ator FOREIGN KEY (id_ator) REFERENCES ator (id_ator),
  CONSTRAINT fk_filme FOREIGN KEY (id_filme) REFERENCES filme (id_filme)
);
