--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: cita_cnslt; Type: TABLE; Schema: public; Owner: grebo; Tablespace: 
--

CREATE TABLE cita_cnslt (
    id_cita integer NOT NULL,
    ci_pacnt_cita integer,
    fecha_cita date,
    motivo_cita text,
    acmp_cita text,
    estatus bit(1) NOT NULL,
    pago_cita integer
);


ALTER TABLE public.cita_cnslt OWNER TO grebo;

--
-- Name: cita_cnslt_id_cita_seq; Type: SEQUENCE; Schema: public; Owner: grebo
--

CREATE SEQUENCE cita_cnslt_id_cita_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cita_cnslt_id_cita_seq OWNER TO grebo;

--
-- Name: cita_cnslt_id_cita_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: grebo
--

ALTER SEQUENCE cita_cnslt_id_cita_seq OWNED BY cita_cnslt.id_cita;


--
-- Name: config_cita; Type: TABLE; Schema: public; Owner: grebo; Tablespace: 
--

CREATE TABLE config_cita (
    id_config integer NOT NULL,
    precio_cita integer,
    numero_cita integer,
    tipo integer NOT NULL,
    fecha_config date NOT NULL,
    status bit(1) NOT NULL,
    id_usr integer NOT NULL
);


ALTER TABLE public.config_cita OWNER TO grebo;

--
-- Name: config_cita_id_config_seq; Type: SEQUENCE; Schema: public; Owner: grebo
--

CREATE SEQUENCE config_cita_id_config_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.config_cita_id_config_seq OWNER TO grebo;

--
-- Name: config_cita_id_config_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: grebo
--

ALTER SEQUENCE config_cita_id_config_seq OWNED BY config_cita.id_config;


--
-- Name: hist-pacnt; Type: TABLE; Schema: public; Owner: grebo; Tablespace: 
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


ALTER TABLE public."hist-pacnt" OWNER TO grebo;

--
-- Name: COLUMN "hist-pacnt".antc_fm_hist; Type: COMMENT; Schema: public; Owner: grebo
--

COMMENT ON COLUMN "hist-pacnt".antc_fm_hist IS 'antecedentes familiares';


--
-- Name: COLUMN "hist-pacnt".hab_pscb_hist; Type: COMMENT; Schema: public; Owner: grebo
--

COMMENT ON COLUMN "hist-pacnt".hab_pscb_hist IS 'habitos psicobioogicos, fuma, bebe, drogas, etc';


--
-- Name: COLUMN "hist-pacnt".ex_fisc_hist; Type: COMMENT; Schema: public; Owner: grebo
--

COMMENT ON COLUMN "hist-pacnt".ex_fisc_hist IS 'fracturas, desgarres, problemas fisico motriz';


--
-- Name: COLUMN "hist-pacnt".mdicnt_alrgc_hist; Type: COMMENT; Schema: public; Owner: grebo
--

COMMENT ON COLUMN "hist-pacnt".mdicnt_alrgc_hist IS 'medicamento al que es alergico';


--
-- Name: COLUMN "hist-pacnt".ptlg_hist; Type: COMMENT; Schema: public; Owner: grebo
--

COMMENT ON COLUMN "hist-pacnt".ptlg_hist IS 'neumonia, hipertension, asma, obecidad, etc';


--
-- Name: hist-pacnt_id_his_seq; Type: SEQUENCE; Schema: public; Owner: grebo
--

CREATE SEQUENCE "hist-pacnt_id_his_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."hist-pacnt_id_his_seq" OWNER TO grebo;

--
-- Name: hist-pacnt_id_his_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: grebo
--

ALTER SEQUENCE "hist-pacnt_id_his_seq" OWNED BY "hist-pacnt".id_his;


--
-- Name: medic_cnslt; Type: TABLE; Schema: public; Owner: grebo; Tablespace: 
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


ALTER TABLE public.medic_cnslt OWNER TO grebo;

--
-- Name: medic_cnslt_id_medic_seq; Type: SEQUENCE; Schema: public; Owner: grebo
--

CREATE SEQUENCE medic_cnslt_id_medic_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.medic_cnslt_id_medic_seq OWNER TO grebo;

--
-- Name: medic_cnslt_id_medic_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: grebo
--

ALTER SEQUENCE medic_cnslt_id_medic_seq OWNED BY medic_cnslt.id_medic;


--
-- Name: pacnt_cnslt; Type: TABLE; Schema: public; Owner: grebo; Tablespace: 
--

CREATE TABLE pacnt_cnslt (
    id_pacnt integer NOT NULL,
    nom_pacnt character varying(30),
    apel_pacnt character varying(30),
    fn_pacnt date,
    mail_pacnt character varying(30),
    dir_pacnt text,
    tlf_pacnt numeric,
    ci_pacnt integer,
    sexo_pacnt character varying(15) NOT NULL
);


ALTER TABLE public.pacnt_cnslt OWNER TO grebo;

--
-- Name: COLUMN pacnt_cnslt.fn_pacnt; Type: COMMENT; Schema: public; Owner: grebo
--

COMMENT ON COLUMN pacnt_cnslt.fn_pacnt IS 'fecha de nacimiento del paciente del consultorio';


--
-- Name: pacnt_cnslt_id_pacnt_seq; Type: SEQUENCE; Schema: public; Owner: grebo
--

CREATE SEQUENCE pacnt_cnslt_id_pacnt_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pacnt_cnslt_id_pacnt_seq OWNER TO grebo;

--
-- Name: pacnt_cnslt_id_pacnt_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: grebo
--

ALTER SEQUENCE pacnt_cnslt_id_pacnt_seq OWNED BY pacnt_cnslt.id_pacnt;


--
-- Name: usr_system; Type: TABLE; Schema: public; Owner: grebo; Tablespace: 
--

CREATE TABLE usr_system (
    id_usr integer NOT NULL,
    ci_usr integer NOT NULL,
    login_usr character varying NOT NULL,
    pass_usr character varying NOT NULL,
    status_usr bit(1) NOT NULL,
    nombre_usr character varying(250) NOT NULL,
    apellido_usr character varying(250) NOT NULL,
    tipo_usr numeric(1,0) NOT NULL
);


ALTER TABLE public.usr_system OWNER TO grebo;

--
-- Name: user_system_id_usr_seq; Type: SEQUENCE; Schema: public; Owner: grebo
--

CREATE SEQUENCE user_system_id_usr_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_system_id_usr_seq OWNER TO grebo;

--
-- Name: user_system_id_usr_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: grebo
--

ALTER SEQUENCE user_system_id_usr_seq OWNED BY usr_system.id_usr;


--
-- Name: id_cita; Type: DEFAULT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY cita_cnslt ALTER COLUMN id_cita SET DEFAULT nextval('cita_cnslt_id_cita_seq'::regclass);


--
-- Name: id_config; Type: DEFAULT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY config_cita ALTER COLUMN id_config SET DEFAULT nextval('config_cita_id_config_seq'::regclass);


--
-- Name: id_his; Type: DEFAULT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY "hist-pacnt" ALTER COLUMN id_his SET DEFAULT nextval('"hist-pacnt_id_his_seq"'::regclass);


--
-- Name: id_medic; Type: DEFAULT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY medic_cnslt ALTER COLUMN id_medic SET DEFAULT nextval('medic_cnslt_id_medic_seq'::regclass);


--
-- Name: id_pacnt; Type: DEFAULT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY pacnt_cnslt ALTER COLUMN id_pacnt SET DEFAULT nextval('pacnt_cnslt_id_pacnt_seq'::regclass);


--
-- Name: id_usr; Type: DEFAULT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY usr_system ALTER COLUMN id_usr SET DEFAULT nextval('user_system_id_usr_seq'::regclass);


--
-- Data for Name: cita_cnslt; Type: TABLE DATA; Schema: public; Owner: grebo
--

COPY cita_cnslt (id_cita, ci_pacnt_cita, fecha_cita, motivo_cita, acmp_cita, estatus, pago_cita) FROM stdin;
1	19330646	2016-01-10	refriado y malestar general	Margarita Guerrero	0	\N
3	19330646	2016-03-27	dolor de cabeza	Luisa Romero	0	\N
2	19330646	2016-03-26	Revision Rutinaria	Pedro Pablo	0	\N
5	12345678	2016-03-17	creer ganar	arturo	0	\N
4	12345678	2016-03-12	problemas personales	angel	0	\N
6	12121212	2016-03-10	dolor	adin	0	\N
7	12345678	2016-04-05	xdgfd	ara	0	\N
12	12345678	2016-04-19	csdcsd	jcsdkcmi	0	\N
13	12345678	2016-04-20	dolor de cabeza	sbciusai	0	\N
15	123123	2016-04-29	dolor de cabeza	julio cesar	1	5000
20	19330646	2016-04-30	rewrwerewr	ewrwerwer	0	\N
18	19330647	2016-04-29	edwee	jesus	1	5000
14	12345678	2016-04-28	weewewefwefjwepojfojw	ewewewdfi	0	\N
10	12345678	2016-04-17	bsbcs	iv sdo	1	3000
21	123123	2016-04-30	ddsddsa	dsadasdasd	0	\N
22	123123	2016-04-30	gfdgfd	fdgdfgdf	0	\N
24	1312112	2016-05-01	sdsdasd	dasdasdas	1	3000
\.


--
-- Name: cita_cnslt_id_cita_seq; Type: SEQUENCE SET; Schema: public; Owner: grebo
--

SELECT pg_catalog.setval('cita_cnslt_id_cita_seq', 24, true);


--
-- Data for Name: config_cita; Type: TABLE DATA; Schema: public; Owner: grebo
--

COPY config_cita (id_config, precio_cita, numero_cita, tipo, fecha_config, status, id_usr) FROM stdin;
1	3000	3	1	2016-05-02	0	1
2	3434	\N	1	2016-05-02	0	1
3	3434	\N	1	2016-05-02	0	1
4	2000	\N	1	2016-05-02	0	1
5	4000	\N	1	2016-05-02	0	1
6	6000	\N	1	2016-05-02	0	1
7	56566	\N	1	2016-05-03	1	1
\.


--
-- Name: config_cita_id_config_seq; Type: SEQUENCE SET; Schema: public; Owner: grebo
--

SELECT pg_catalog.setval('config_cita_id_config_seq', 7, true);


--
-- Data for Name: hist-pacnt; Type: TABLE DATA; Schema: public; Owner: grebo
--

COPY "hist-pacnt" (id_his, ci_pacnt_hist, antc_hist, antc_fm_hist, hab_pscb_hist, ex_fisc_hist, mdicnt_alrgc_hist, ptlg_hist, "null") FROM stdin;
\.


--
-- Name: hist-pacnt_id_his_seq; Type: SEQUENCE SET; Schema: public; Owner: grebo
--

SELECT pg_catalog.setval('"hist-pacnt_id_his_seq"', 1, false);


--
-- Data for Name: medic_cnslt; Type: TABLE DATA; Schema: public; Owner: grebo
--

COPY medic_cnslt (id_medic, nom_medic, apel_medic, fn_medic, mail_medic, dir_medic, tlf_medic, ci_medic, espc_medic) FROM stdin;
1	jose	carmona	1942-03-12	drjs@gmail.com	carupano	34534543	21212121	TRAUMATOLOGO
\.


--
-- Name: medic_cnslt_id_medic_seq; Type: SEQUENCE SET; Schema: public; Owner: grebo
--

SELECT pg_catalog.setval('medic_cnslt_id_medic_seq', 3, true);


--
-- Data for Name: pacnt_cnslt; Type: TABLE DATA; Schema: public; Owner: grebo
--

COPY pacnt_cnslt (id_pacnt, nom_pacnt, apel_pacnt, fn_pacnt, mail_pacnt, dir_pacnt, tlf_pacnt, ci_pacnt, sexo_pacnt) FROM stdin;
2	norelys	ospedales	1989-09-18	nore@nore.com	tunapuy	4267889948	12345678	femenino
3	adrian	guerrero	1989-09-16	adri@hotmail.com	tunapuy	4267889945	19330647	masculino
8	rofr	kncke	2016-04-08	edicds@jdbcdjs.com	fefifnsie	2434343	123123	masculino
6	amarily	guerrero	1968-10-06	amarili@guerrero	rio caribe	124546	12121212	femenino
1	Arturo	Guerrero	1989-09-18	gnuxdar@gmail.com	Tunapuy	4267889948	19330646	masculino
9	nombre	apellido	2016-04-22	grgrgr@fsfsfsdf.cac	rththhhghslknushve vebujbeklvejk	41212365236	1312112	
\.


--
-- Name: pacnt_cnslt_id_pacnt_seq; Type: SEQUENCE SET; Schema: public; Owner: grebo
--

SELECT pg_catalog.setval('pacnt_cnslt_id_pacnt_seq', 10, true);


--
-- Name: user_system_id_usr_seq; Type: SEQUENCE SET; Schema: public; Owner: grebo
--

SELECT pg_catalog.setval('user_system_id_usr_seq', 8, true);


--
-- Data for Name: usr_system; Type: TABLE DATA; Schema: public; Owner: grebo
--

COPY usr_system (id_usr, ci_usr, login_usr, pass_usr, status_usr, nombre_usr, apellido_usr, tipo_usr) FROM stdin;
1	12345678	gnuxdar	123	1	gnuxdar	gnuxdar	1
\.


--
-- Name: cita_cnslt_pkey; Type: CONSTRAINT; Schema: public; Owner: grebo; Tablespace: 
--

ALTER TABLE ONLY cita_cnslt
    ADD CONSTRAINT cita_cnslt_pkey PRIMARY KEY (id_cita);


--
-- Name: config_cita_pkey; Type: CONSTRAINT; Schema: public; Owner: grebo; Tablespace: 
--

ALTER TABLE ONLY config_cita
    ADD CONSTRAINT config_cita_pkey PRIMARY KEY (id_config);


--
-- Name: hist-pacnt_pkey; Type: CONSTRAINT; Schema: public; Owner: grebo; Tablespace: 
--

ALTER TABLE ONLY "hist-pacnt"
    ADD CONSTRAINT "hist-pacnt_pkey" PRIMARY KEY (id_his);


--
-- Name: medic_cnslt_pkey; Type: CONSTRAINT; Schema: public; Owner: grebo; Tablespace: 
--

ALTER TABLE ONLY medic_cnslt
    ADD CONSTRAINT medic_cnslt_pkey PRIMARY KEY (id_medic);


--
-- Name: pacnt_cnslt_ci_pacnt_key; Type: CONSTRAINT; Schema: public; Owner: grebo; Tablespace: 
--

ALTER TABLE ONLY pacnt_cnslt
    ADD CONSTRAINT pacnt_cnslt_ci_pacnt_key UNIQUE (ci_pacnt);


--
-- Name: pacnt_cnslt_pkey; Type: CONSTRAINT; Schema: public; Owner: grebo; Tablespace: 
--

ALTER TABLE ONLY pacnt_cnslt
    ADD CONSTRAINT pacnt_cnslt_pkey PRIMARY KEY (id_pacnt);


--
-- Name: user_system_ci_usr_key; Type: CONSTRAINT; Schema: public; Owner: grebo; Tablespace: 
--

ALTER TABLE ONLY usr_system
    ADD CONSTRAINT user_system_ci_usr_key UNIQUE (ci_usr);


--
-- Name: user_system_login_usr_key; Type: CONSTRAINT; Schema: public; Owner: grebo; Tablespace: 
--

ALTER TABLE ONLY usr_system
    ADD CONSTRAINT user_system_login_usr_key UNIQUE (login_usr);


--
-- Name: user_system_pkey; Type: CONSTRAINT; Schema: public; Owner: grebo; Tablespace: 
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

