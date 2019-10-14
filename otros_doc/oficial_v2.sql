/*==============================================================*/
/* DBMS name:      PostgreSQL 8                                 */
/* Created on:     23/02/2016 16:12:01                          */
/*==============================================================*/



/*==============================================================*/
/* Table: CARRERA                                               */
/*==============================================================*/
create table CARRERA (
   COD_CARR             INT4                 not null,
   COD_FACU             INT4                 not null,
   NOMB_CARR            CHAR(100)            null,
   TIPO_CARR            CHAR(100)            null,
   VERSION_CARR         INT4                 null,
   REGION_CARR          CHAR(100)            null,
   constraint PK_CARRERA primary key (COD_CARR)
);

/*==============================================================*/
/* Index: CARRERA_PK                                            */
/*==============================================================*/
create unique index CARRERA_PK on CARRERA (
COD_CARR
);

/*==============================================================*/
/* Index: RELATIONSHIP_4_FK                                     */
/*==============================================================*/
create  index RELATIONSHIP_4_FK on CARRERA (
COD_FACU
);

/*==============================================================*/
/* Table: DESIGNADO                                             */
/*==============================================================*/
create table DESIGNADO (
   COD_DOC              VARCHAR(10)          not null,
   COD_MATERIA          VARCHAR(20)          not null,
   COD_CARR             INT4                 not null,
   constraint PK_DESIGNADO primary key (COD_DOC, COD_MATERIA, COD_CARR)
);

/*==============================================================*/
/* Index: POR_UN_FK                                             */
/*==============================================================*/
create  index POR_UN_FK on DESIGNADO (
COD_DOC
);

/*==============================================================*/
/* Index: DICTA_MATERIA_FK                                      */
/*==============================================================*/
create  index DICTA_MATERIA_FK on DESIGNADO (
COD_MATERIA
);

/*==============================================================*/
/* Index: PERTENECE_FK                                          */
/*==============================================================*/
create  index PERTENECE_FK on DESIGNADO (
COD_CARR
);

/*==============================================================*/
/* Table: DOCENTE                                               */
/*==============================================================*/
create table DOCENTE (
   COD_DOC              VARCHAR(10)          not null,
   CI_DOC               INT4                 null,
   NOMB_DOC             CHAR(100)            null,
   APELLIDO_PAT         CHAR(100)            null,
   APELLIDO_MAT         CHAR(100)            null,
   DIRECCION_DOC        VARCHAR(50)          null,
   TEL_DOC              INT4                 null,
   CEL_DOC              INT4                 null,
   EMAIL_DOC            CHAR(300)            null,
   constraint PK_DOCENTE primary key (COD_DOC)
);

/*==============================================================*/
/* Index: DOCENTE_PK                                            */
/*==============================================================*/
create unique index DOCENTE_PK on DOCENTE (
COD_DOC
);

/*==============================================================*/
/* Table: FACULTAD                                              */
/*==============================================================*/
create table FACULTAD (
   COD_FACU             INT4                 not null,
   NOMB_FACU            CHAR(300)            null,
   constraint PK_FACULTAD primary key (COD_FACU)
);

/*==============================================================*/
/* Index: FACULTAD_PK                                           */
/*==============================================================*/
create unique index FACULTAD_PK on FACULTAD (
COD_FACU
);

/*==============================================================*/
/* Table: MATERIA                                               */
/*==============================================================*/
create table MATERIA (
   COD_MATERIA          VARCHAR(20)          not null,
   NOMB_MATERIA         VARCHAR(100)         null,
   NIVEL                VARCHAR(30)          null,
   ELECTIVA             CHAR(2)              null,
   SIGLA                VARCHAR(20)          null,
   constraint PK_MATERIA primary key (COD_MATERIA)
);

/*==============================================================*/
/* Index: MATERIA_PK                                            */
/*==============================================================*/
create unique index MATERIA_PK on MATERIA (
COD_MATERIA
);

/*==============================================================*/
/* Table: PRE_REQUISITO                                         */
/*==============================================================*/
create table PRE_REQUISITO (
   COD_MATERIA          VARCHAR(20)          not null,
   MAT_COD_MATERIA      VARCHAR(20)          not null,
   constraint PK_PRE_REQUISITO primary key (COD_MATERIA, MAT_COD_MATERIA)
);

/*==============================================================*/
/* Index: PRE_REQUISITO_PK                                      */
/*==============================================================*/
create unique index PRE_REQUISITO_PK on PRE_REQUISITO (
COD_MATERIA,
MAT_COD_MATERIA
);

/*==============================================================*/
/* Index: ES_MATERIA_FK                                         */
/*==============================================================*/
create  index ES_MATERIA_FK on PRE_REQUISITO (
COD_MATERIA
);

/*==============================================================*/
/* Index: ES_PRE_REQUISTO_FK                                    */
/*==============================================================*/
create  index ES_PRE_REQUISTO_FK on PRE_REQUISITO (
MAT_COD_MATERIA
);

alter table CARRERA
   add constraint FK_CARRERA_RELATIONS_FACULTAD foreign key (COD_FACU)
      references FACULTAD (COD_FACU)
      on delete restrict on update restrict;

alter table DESIGNADO
   add constraint FK_DESIGNAD_DICTA_MAT_MATERIA foreign key (COD_MATERIA)
      references MATERIA (COD_MATERIA)
      on delete restrict on update restrict;

alter table DESIGNADO
   add constraint FK_DESIGNAD_PERTENECE_CARRERA foreign key (COD_CARR)
      references CARRERA (COD_CARR)
      on delete restrict on update restrict;

alter table DESIGNADO
   add constraint FK_DESIGNAD_POR_UN_DOCENTE foreign key (COD_DOC)
      references DOCENTE (COD_DOC)
      on delete restrict on update restrict;

alter table PRE_REQUISITO
   add constraint FK_PRE_REQU_ES_MATERI_MATERIA foreign key (COD_MATERIA)
      references MATERIA (COD_MATERIA)
      on delete restrict on update restrict;

alter table PRE_REQUISITO
   add constraint FK_PRE_REQU_ES_PRE_RE_MATERIA foreign key (MAT_COD_MATERIA)
      references MATERIA (COD_MATERIA)
      on delete restrict on update restrict;

