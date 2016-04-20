--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: consultorio; Type: COMMENT; Schema: -; Owner: gnuxdar
--

COMMENT ON DATABASE consultorio IS 'consultorio medico. sistema de citas';


--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: cita_cnslt; Type: TABLE; Schema: public; Owner: gnuxdar; Tablespace: 
--

CREATE TABLE cita_cnslt (
    id_cita integer NOT NULL,
    ci_pacnt_cita integer,
    fecha_cita date,
    motivo_cita text,
    acmp_cita text
);


ALTER TABLE public.cita_cnslt OWNER TO gnuxdar;

--
-- Name: cita_cnslt_id_cita_seq; Type: SEQUENCE; Schema: public; Owner: gnuxdar
--

CREATE SEQUENCE cita_cnslt_id_cita_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cita_cnslt_id_cita_seq OWNER TO gnuxdar;

--
-- Name: cita_cnslt_id_cita_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gnuxdar
--

ALTER SEQUENCE cita_cnslt_id_cita_seq OWNED BY cita_cnslt.id_cita;


--
-- Name: hist-pacnt; Type: TABLE; Schema: public; Owner: gnuxdar; Tablespace: 
--

CREATE TABLE "hist-pacnt" (
    id_his integer NOT NULL,
    ci_pacnt_hist integer NOT NULL,
    antc_hist text,
    antc_fm_hist text,
    hab_pscb_hist text,
    ex_fisc_hist text,
    mdicnt_alrgc_hist character varying,
    ptlg_hist text,
    "null" character varying
);


ALTER TABLE public."hist-pacnt" OWNER TO gnuxdar;

--
-- Name: COLUMN "hist-pacnt".antc_fm_hist; Type: COMMENT; Schema: public; Owner: gnuxdar
--

COMMENT ON COLUMN "hist-pacnt".antc_fm_hist IS 'antecedentes familiares';


--
-- Name: COLUMN "hist-pacnt".hab_pscb_hist; Type: COMMENT; Schema: public; Owner: gnuxdar
--

COMMENT ON COLUMN "hist-pacnt".hab_pscb_hist IS 'habitos psicobioogicos, fuma, bebe, drogas, etc';


--
-- Name: COLUMN "hist-pacnt".ex_fisc_hist; Type: COMMENT; Schema: public; Owner: gnuxdar
--

COMMENT ON COLUMN "hist-pacnt".ex_fisc_hist IS 'fracturas, desgarres, problemas fisico motriz';


--
-- Name: COLUMN "hist-pacnt".mdicnt_alrgc_hist; Type: COMMENT; Schema: public; Owner: gnuxdar
--

COMMENT ON COLUMN "hist-pacnt".mdicnt_alrgc_hist IS 'medicamento al que es alergico';


--
-- Name: COLUMN "hist-pacnt".ptlg_hist; Type: COMMENT; Schema: public; Owner: gnuxdar
--

COMMENT ON COLUMN "hist-pacnt".ptlg_hist IS 'neumonia, hipertension, asma, obecidad, etc';


--
-- Name: hist-pacnt_id_his_seq; Type: SEQUENCE; Schema: public; Owner: gnuxdar
--

CREATE SEQUENCE "hist-pacnt_id_his_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."hist-pacnt_id_his_seq" OWNER TO gnuxdar;

--
-- Name: hist-pacnt_id_his_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gnuxdar
--

ALTER SEQUENCE "hist-pacnt_id_his_seq" OWNED BY "hist-pacnt".id_his;


--
-- Name: medic_cnslt; Type: TABLE; Schema: public; Owner: gnuxdar; Tablespace: 
--

CREATE TABLE medic_cnslt (
    id_medic integer NOT NULL,
    nom_medic character varying(30) NOT NULL,
    apel_medic character varying(30) NOT NULL,
    fn_medic date NOT NULL,
    mail_medic character varying(30),
    dir_medic text,
    tlf_medic integer,
    ci_medic integer NOT NULL,
    espc_medic character varying(30) NOT NULL
);


ALTER TABLE public.medic_cnslt OWNER TO gnuxdar;

--
-- Name: medic_cnslt_id_medic_seq; Type: SEQUENCE; Schema: public; Owner: gnuxdar
--

CREATE SEQUENCE medic_cnslt_id_medic_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.medic_cnslt_id_medic_seq OWNER TO gnuxdar;

--
-- Name: medic_cnslt_id_medic_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gnuxdar
--

ALTER SEQUENCE medic_cnslt_id_medic_seq OWNED BY medic_cnslt.id_medic;


--
-- Name: pacnt_cnslt; Type: TABLE; Schema: public; Owner: gnuxdar; Tablespace: 
--

CREATE TABLE pacnt_cnslt (
    id_pacnt integer NOT NULL,
    nom_pacnt character varying(30),
    apel_pacnt character varying(30),
    fn_pacnt date,
    mail_pacnt character varying(30),
    dir_pacnt text,
    tlf_pacnt numeric,
    ci_pacnt integer
);


ALTER TABLE public.pacnt_cnslt OWNER TO gnuxdar;

--
-- Name: COLUMN pacnt_cnslt.fn_pacnt; Type: COMMENT; Schema: public; Owner: gnuxdar
--

COMMENT ON COLUMN pacnt_cnslt.fn_pacnt IS 'fecha de nacimiento del paciente del consultorio';


--
-- Name: pacnt_cnslt_id_pacnt_seq; Type: SEQUENCE; Schema: public; Owner: gnuxdar
--

CREATE SEQUENCE pacnt_cnslt_id_pacnt_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pacnt_cnslt_id_pacnt_seq OWNER TO gnuxdar;

--
-- Name: pacnt_cnslt_id_pacnt_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gnuxdar
--

ALTER SEQUENCE pacnt_cnslt_id_pacnt_seq OWNED BY pacnt_cnslt.id_pacnt;


--
-- Name: usr_system; Type: TABLE; Schema: public; Owner: gnuxdar; Tablespace: 
--

CREATE TABLE usr_system (
    id_usr integer NOT NULL,
    ci_usr integer NOT NULL,
    login_usr character varying NOT NULL,
    pass_usr character varying NOT NULL,
    status_usr boolean NOT NULL
);


ALTER TABLE public.usr_system OWNER TO gnuxdar;

--
-- Name: user_system_id_usr_seq; Type: SEQUENCE; Schema: public; Owner: gnuxdar
--

CREATE SEQUENCE user_system_id_usr_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_system_id_usr_seq OWNER TO gnuxdar;

--
-- Name: user_system_id_usr_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gnuxdar
--

ALTER SEQUENCE user_system_id_usr_seq OWNED BY usr_system.id_usr;


--
-- Name: id_cita; Type: DEFAULT; Schema: public; Owner: gnuxdar
--

ALTER TABLE ONLY cita_cnslt ALTER COLUMN id_cita SET DEFAULT nextval('cita_cnslt_id_cita_seq'::regclass);


--
-- Name: id_his; Type: DEFAULT; Schema: public; Owner: gnuxdar
--

ALTER TABLE ONLY "hist-pacnt" ALTER COLUMN id_his SET DEFAULT nextval('"hist-pacnt_id_his_seq"'::regclass);


--
-- Name: id_medic; Type: DEFAULT; Schema: public; Owner: gnuxdar
--

ALTER TABLE ONLY medic_cnslt ALTER COLUMN id_medic SET DEFAULT nextval('medic_cnslt_id_medic_seq'::regclass);


--
-- Name: id_pacnt; Type: DEFAULT; Schema: public; Owner: gnuxdar
--

ALTER TABLE ONLY pacnt_cnslt ALTER COLUMN id_pacnt SET DEFAULT nextval('pacnt_cnslt_id_pacnt_seq'::regclass);


--
-- Name: id_usr; Type: DEFAULT; Schema: public; Owner: gnuxdar
--

ALTER TABLE ONLY usr_system ALTER COLUMN id_usr SET DEFAULT nextval('user_system_id_usr_seq'::regclass);


--
-- Data for Name: cita_cnslt; Type: TABLE DATA; Schema: public; Owner: gnuxdar
--

INSERT INTO cita_cnslt VALUES (1, 19330646, '2016-01-10', 'refriado y malestar general', 'Margarita Guerrero');
INSERT INTO cita_cnslt VALUES (3, 19330646, '2016-03-27', 'dolor de cabeza', 'Luisa Romero');
INSERT INTO cita_cnslt VALUES (2, 19330646, '2016-03-26', 'Revision Rutinaria', 'Pedro Pablo');
INSERT INTO cita_cnslt VALUES (5, 12345678, '2016-03-17', 'creer ganar', 'arturo');
INSERT INTO cita_cnslt VALUES (4, 12345678, '2016-03-12', 'problemas personales', 'angel');
INSERT INTO cita_cnslt VALUES (6, 12121212, '2016-03-10', 'dolor', 'adin');
INSERT INTO cita_cnslt VALUES (7, 12345678, '2016-04-05', 'xdgfd', 'ara');


--
-- Name: cita_cnslt_id_cita_seq; Type: SEQUENCE SET; Schema: public; Owner: gnuxdar
--

SELECT pg_catalog.setval('cita_cnslt_id_cita_seq', 7, true);


--
-- Data for Name: hist-pacnt; Type: TABLE DATA; Schema: public; Owner: gnuxdar
--



--
-- Name: hist-pacnt_id_his_seq; Type: SEQUENCE SET; Schema: public; Owner: gnuxdar
--

SELECT pg_catalog.setval('"hist-pacnt_id_his_seq"', 1, false);


--
-- Data for Name: medic_cnslt; Type: TABLE DATA; Schema: public; Owner: gnuxdar
--

INSERT INTO medic_cnslt VALUES (1, 'jose', 'carmona', '1942-03-12', 'drjs@gmail.com', 'carupano', 34534543, 21212121, 'dr general');


--
-- Name: medic_cnslt_id_medic_seq; Type: SEQUENCE SET; Schema: public; Owner: gnuxdar
--

SELECT pg_catalog.setval('medic_cnslt_id_medic_seq', 1, true);


--
-- Data for Name: pacnt_cnslt; Type: TABLE DATA; Schema: public; Owner: gnuxdar
--

INSERT INTO pacnt_cnslt VALUES (1, 'Arturo', 'Guerrero', '1989-09-18', 'gnuxdar@gmail.com', 'Tunapuy', 4267889948, 19330646);
INSERT INTO pacnt_cnslt VALUES (2, 'norelys', 'ospedales', '1989-09-18', 'nore@nore.com', 'tunapuy', 4267889948, 12345678);
INSERT INTO pacnt_cnslt VALUES (6, 'amarily', 'guerrero', '1968-10-06', 'amarili@guerrero', 'rio caribe', 124546, 12121212);
INSERT INTO pacnt_cnslt VALUES (3, 'adrian', 'guerrero', '1989-09-16', 'adri@hotmail.com', 'tunapuy', 4267889945, 19330647);


--
-- Name: pacnt_cnslt_id_pacnt_seq; Type: SEQUENCE SET; Schema: public; Owner: gnuxdar
--

SELECT pg_catalog.setval('pacnt_cnslt_id_pacnt_seq', 6, true);


--
-- Name: user_system_id_usr_seq; Type: SEQUENCE SET; Schema: public; Owner: gnuxdar
--

SELECT pg_catalog.setval('user_system_id_usr_seq', 1, true);


--
-- Data for Name: usr_system; Type: TABLE DATA; Schema: public; Owner: gnuxdar
--

INSERT INTO usr_system VALUES (1, 12345678, 'gnuxdar', '123', true);


--
-- Name: cita_cnslt_pkey; Type: CONSTRAINT; Schema: public; Owner: gnuxdar; Tablespace: 
--

ALTER TABLE ONLY cita_cnslt
    ADD CONSTRAINT cita_cnslt_pkey PRIMARY KEY (id_cita);


--
-- Name: hist-pacnt_pkey; Type: CONSTRAINT; Schema: public; Owner: gnuxdar; Tablespace: 
--

ALTER TABLE ONLY "hist-pacnt"
    ADD CONSTRAINT "hist-pacnt_pkey" PRIMARY KEY (id_his);


--
-- Name: medic_cnslt_pkey; Type: CONSTRAINT; Schema: public; Owner: gnuxdar; Tablespace: 
--

ALTER TABLE ONLY medic_cnslt
    ADD CONSTRAINT medic_cnslt_pkey PRIMARY KEY (id_medic);


--
-- Name: pacnt_cnslt_ci_pacnt_key; Type: CONSTRAINT; Schema: public; Owner: gnuxdar; Tablespace: 
--

ALTER TABLE ONLY pacnt_cnslt
    ADD CONSTRAINT pacnt_cnslt_ci_pacnt_key UNIQUE (ci_pacnt);


--
-- Name: pacnt_cnslt_pkey; Type: CONSTRAINT; Schema: public; Owner: gnuxdar; Tablespace: 
--

ALTER TABLE ONLY pacnt_cnslt
    ADD CONSTRAINT pacnt_cnslt_pkey PRIMARY KEY (id_pacnt);


--
-- Name: user_system_ci_usr_key; Type: CONSTRAINT; Schema: public; Owner: gnuxdar; Tablespace: 
--

ALTER TABLE ONLY usr_system
    ADD CONSTRAINT user_system_ci_usr_key UNIQUE (ci_usr);


--
-- Name: user_system_login_usr_key; Type: CONSTRAINT; Schema: public; Owner: gnuxdar; Tablespace: 
--

ALTER TABLE ONLY usr_system
    ADD CONSTRAINT user_system_login_usr_key UNIQUE (login_usr);


--
-- Name: user_system_pkey; Type: CONSTRAINT; Schema: public; Owner: gnuxdar; Tablespace: 
--

ALTER TABLE ONLY usr_system
    ADD CONSTRAINT user_system_pkey PRIMARY KEY (id_usr);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

