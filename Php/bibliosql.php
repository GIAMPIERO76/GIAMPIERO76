CREATE TABLE public."Autore"
(
    "CF" character varying(16) COLLATE pg_catalog."default" NOT NULL,
    "Nome" character varying(20) COLLATE pg_catalog."default" NOT NULL,
    "Cognome" character varying(20) COLLATE pg_catalog."default" NOT NULL,
    "DataN" date NOT NULL,
    "LuogoN" character varying(25) COLLATE pg_catalog."default" NOT NULL,
    "Biografia" character varying(250) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT "Autore_pkey" PRIMARY KEY ("CF")
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public."Autore"
    OWNER to postgres;

CREATE TABLE public."CasaEditrice"
(
    "Denominazione" character varying(25) COLLATE pg_catalog."default" NOT NULL,
    "Città" character varying(25) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT "CasaEditrice_pkey" PRIMARY KEY ("Denominazione")
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public."CasaEditrice"
    OWNER to postgres;

CREATE TABLE public."Dipendente"
(
    "Username" character varying(20) COLLATE pg_catalog."default" NOT NULL,
    "Password" character varying(20) COLLATE pg_catalog."default" NOT NULL,
    "Nome" character varying(20) COLLATE pg_catalog."default" NOT NULL,
    "Cognome" character varying(20) COLLATE pg_catalog."default" NOT NULL,
    "Email" character varying(80) COLLATE pg_catalog."default" NOT NULL,
    "Sesso" character varying(1) COLLATE pg_catalog."default" NOT NULL,
    "DataN" date NOT NULL,
    "LuogoN" character varying(20) COLLATE pg_catalog."default" NOT NULL,
    "Indirizzo" character varying(50) COLLATE pg_catalog."default" NOT NULL,
    "NumTelefono" character varying(10) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT "Dipendente_pkey" PRIMARY KEY ("Username")
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public."Dipendente"
    OWNER to postgres;

CREATE TABLE public."Effettua"
(
    "Username" character varying(20) COLLATE pg_catalog."default" NOT NULL,
    "DataInizio" date NOT NULL,
    CONSTRAINT "Effettua_pkey" PRIMARY KEY ("Username", "DataInizio"),
    CONSTRAINT "Effettua_DataInizio" FOREIGN KEY ("DataInizio")
        REFERENCES public."Prestito" ("DataInizio") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT "Effettua_Username" FOREIGN KEY ("Username")
        REFERENCES public."Utente" ("Username") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public."Effettua"
    OWNER to postgres;

CREATE TABLE public."Giudizio"
(
    "Commento" character varying(250) COLLATE pg_catalog."default" NOT NULL,
    "Voto" integer NOT NULL,
    "DataInizio" date NOT NULL,
    CONSTRAINT "Giudizio_pkey" PRIMARY KEY ("Commento", "Voto"),
    CONSTRAINT "Giudizio_DataInizio" FOREIGN KEY ("DataInizio")
        REFERENCES public."Prestito" ("DataInizio") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public."Giudizio"
    OWNER to postgres;

CREATE TABLE public."Libro"
(
    "ISBN" character varying(50) COLLATE pg_catalog."default" NOT NULL,
    "Titolo" character varying(25) COLLATE pg_catalog."default" NOT NULL,
    "Anno" character varying(4) COLLATE pg_catalog."default" NOT NULL,
    "Lingua" character varying(20) COLLATE pg_catalog."default" NOT NULL,
    "Sezione" character varying(3) COLLATE pg_catalog."default" NOT NULL,
    "Scaffale" character varying(3) COLLATE pg_catalog."default" NOT NULL,
    "NumeroReg" character varying(3) COLLATE pg_catalog."default" NOT NULL,
    "NumeroCopie" integer NOT NULL,
    "NumeroCopiePrest" integer NOT NULL,
    "Denominazione" character varying(25) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT "Libro_pkey" PRIMARY KEY ("ISBN"),
    CONSTRAINT "Libro_Denominazione" FOREIGN KEY ("Denominazione")
        REFERENCES public."CasaEditrice" ("Denominazione") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public."Libro"
    OWNER to postgres;

CREATE TABLE public."Prestito"
(
    "DataInizio" date NOT NULL,
    "DataFine" date,
    "ISBN" character varying(50) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT "Prestito_pkey" PRIMARY KEY ("DataInizio"),
    CONSTRAINT "Prestito_ISBN" FOREIGN KEY ("ISBN")
        REFERENCES public."Libro" ("ISBN") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public."Prestito"
    OWNER to postgres;

CREATE TABLE public."Scrittoda"
(
    "ISBN" character varying(50) COLLATE pg_catalog."default" NOT NULL,
    "CF" character varying(16) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT "Scrittoda_pkey" PRIMARY KEY ("ISBN", "CF"),
    CONSTRAINT "Scrittoda_CF" FOREIGN KEY ("CF")
        REFERENCES public."Autore" ("CF") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT "Scrittoda_ISBN" FOREIGN KEY ("ISBN")
        REFERENCES public."Libro" ("ISBN") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public."Scrittoda"
    OWNER to postgres;

CREATE TABLE public."Utente"
(
    "Username" character varying(20) COLLATE pg_catalog."default" NOT NULL,
    "Password" character varying(20) COLLATE pg_catalog."default" NOT NULL,
    "Nome" character varying(20) COLLATE pg_catalog."default" NOT NULL,
    "Cognome" character varying(20) COLLATE pg_catalog."default" NOT NULL,
    "Email" character varying(80) COLLATE pg_catalog."default" NOT NULL,
    "Sesso" character varying(1) COLLATE pg_catalog."default" NOT NULL,
    "DataN" date NOT NULL,
    "LuogoN" character varying(20) COLLATE pg_catalog."default" NOT NULL,
    "Indirizzo" character varying(50) COLLATE pg_catalog."default" NOT NULL,
    "NumTelefono" character varying(10) COLLATE pg_catalog."default" NOT NULL,
    "NumTessera" character varying(5) COLLATE pg_catalog."default" NOT NULL,
    "DataReg" date NOT NULL,
    "NumeroMaxPrestiti" integer NOT NULL,
    CONSTRAINT "Utente_pkey" PRIMARY KEY ("Username")
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public."Utente"
    OWNER to postgres;

CREATE TABLE public."Visualizza"
(
    "Username" character varying(20) COLLATE pg_catalog."default" NOT NULL,
    "DataInizio" date NOT NULL,
    CONSTRAINT "Visualizza_pkey" PRIMARY KEY ("Username", "DataInizio"),
    CONSTRAINT "Visualizza_Username" FOREIGN KEY ("Username")
        REFERENCES public."Dipendente" ("Username") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT "Visualizza_dataInizio" FOREIGN KEY ("DataInizio")
        REFERENCES public."Prestito" ("DataInizio") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public."Visualizza"
    OWNER to postgres;