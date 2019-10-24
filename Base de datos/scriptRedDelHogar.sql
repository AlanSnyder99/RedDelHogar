

USE reddelhogardb;

CREATE TABLE Roles
(
idRoles int NOT NULL AUTO_INCREMENT,
tipo varchar(20),
primary key (idRoles)
);


CREATE TABLE Localidades
(
idLocalidades int NOT NULL AUTO_INCREMENT,
localidad varchar(50),
primary key (idLocalidades)
);

CREATE TABLE Zonas
(
idZonas int NOT NULL AUTO_INCREMENT,
zona varchar(50),
primary key (idZonas)
);

CREATE TABLE Provincias
(
idProvincias int NOT NULL AUTO_INCREMENT,
provincia varchar(50),
primary key (idProvincias)
);

CREATE TABLE Integrantes
(
idIntegrantes int NOT NULL AUTO_INCREMENT,
nombre varchar(20),
domicilio varchar(50),
cp varchar(50),
idLocalidades int,
idProvincias int,
telefono int,
cuit varchar(50),
alta TIMESTAMP,
primary key (idIntegrantes),
foreign key (idLocalidades) references Localidades (idLocalidades),
foreign key (idProvincias) references Provincias (idProvincias)
);

CREATE TABLE Usuarios
(
idUsuarios int NOT NULL AUTO_INCREMENT,
idIntegrantes int,
nombre varchar(15),
razon varchar(20),
domicilio varchar(30),
cp varchar(50),
email varchar(50),
usuario varchar(15),
contrasena varchar(20),
rol int NOT NULL,
telefono int,
idLocalidades int,
idProvincias int,
primary key (idUsuarios),
foreign key (rol) references Roles (idRoles),
foreign key (idIntegrantes) references Integrantes (idIntegrantes),
foreign key (idLocalidades) references Localidades (idLocalidades),
foreign key (idProvincias) references Provincias (idProvincias)
);

CREATE TABLE Temas 
(
idTemas int NOT NULL AUTO_INCREMENT,
tema varchar(20),
primary key (idTemas)
);

CREATE TABLE Sucursales
(
idSucursales int NOT NULL AUTO_INCREMENT,
idIntegrantes int NOT NULL,
idLocalidades int NOT NULL,
idZonas int NOT NULL,
idProvincias int NOT NULL,
domicilio varchar(50) COLLATE utf8_unicode_ci,
descripcion varchar(100) COLLATE utf8_unicode_ci,
telefono varchar(50),
latitude varchar(20) COLLATE utf8_unicode_ci NOT NULL,
longitude varchar(20) COLLATE utf8_unicode_ci NOT NULL,
primary key (idSucursales),
foreign key (idLocalidades) references localidades (idLocalidades),
foreign key (idIntegrantes) references integrantes (idIntegrantes),
foreign key (idZonas) references zonas (idZonas),
foreign key (idProvincias) references provincias (idProvincias)
);

CREATE TABLE Novedades
(
idNovedades int NOT NULL AUTO_INCREMENT,
titulo varchar(40),
subtitulo varchar(40),
descripcion varchar(100),
desarrollo varchar(32765),
fecha varchar(40),
fechaCalendario datetime,
idTema int,
bannerImg varchar(100),
primary key (idNovedades),
foreign key (idTema) references temas (idTemas)
);

CREATE TABLE SliderPrincipal
(
idSliderPrincipal int NOT NULL AUTO_INCREMENT,
img varchar(100),
primary key (idSliderPrincipal)
);

INSERT INTO Roles (tipo) VALUES
 ('administradorTotal'),
('administradorSemi'),
('administradorParcial');

INSERT INTO Temas (tema) VALUES
 ('Marketing'),
('Admin');

INSERT INTO Localidades (localidad) VALUES 
('Moron'),
('Loma Hermosa'),
('San Francisco Solano'),
('Burzaco'),('Berazategui'),
('Pablo Podestá'),
('Chascomus'),
('Santa Teresita'),
('Jose C. Paz'),
('Malvinas'),
('Pte. Derqui'),
('Del Viso'),
('Rafael Calzada'),
('Merlo'),
('Gonzalez Catan'),
('Avellaneda'),
('Resistencia'),
('Fontana'),
('Saenz Peña'),
('Corrientes'),
('Goya'),
('Florencio Varela'),
('Quilmes'),
('Miramar'),
('Monte Chingolo'),
('Lanus'),
('Longchamps'),
('Glew'),
('Hudson'),
('Wilde'),
('Banfield'),
('Libertad'),
('La Plata'),
('Villa Madero'),
('Benito Juarez'),
('Lomas de Zamora'),
('9 de Abril'),
('Gernica'),
('Ezpeleta'),
('San Miguel'),
('Monte Grande'),
('Ing. Budge'),
('Villa Fiorito'),
('Ituzaingo'),
('Maquinista Savio'),
('General Rodriguez'),
('Berisso'),
('Llavallol'),
('El Jaguel'),
('Comandante Nicanor Otamendi'),
('Claypole'),
('Gerli'),
('San Carlos de Bariloche'),
('Bernal Oeste'),
('Villa Tesei'),
('Virrey del Pino'),
('Justo Daract'),
('Buena Esperanza'),
('Moreno'),
('Isidro Casanova'),
('Monte Castro'),
('Cordoba'),
('Neuquén'),
('Gregorio de Laferrere'),
('San José');

INSERT INTO Zonas (zona) VALUES 
('GBA Norte'),
('GBA Sur'),
('GBA Oeste'),
('Interior'),
('CABA');

INSERT INTO Provincias (provincia) VALUES 
('Buenos Aires'),
('Chaco'),
('Rio Negro'),
('Corrientes'),
('San Luis'),
('CABA'),
('Cordoba'),
('Neuquén');


INSERT INTO Integrantes (nombre,domicilio,cp,idLocalidades,idProvincias,telefono,cuit,alta) VALUES 
('RED DEL HOGAR','Paunero 715. Esquina Berra.','- 1708 -',1,1,44834005,'30-70534513-5',26-07-2019);


INSERT INTO Sucursales (idIntegrantes,idLocalidades,idZonas,idProvincias,domicilio,descripcion,telefono,longitude,latitude) VALUES
/*(1,1,5,1,'Corrientes 2963','','1','-58.40814374981473','-34.60483487624681'),*/
(1,1,3,1,'Paunero 715','SEDE ','1','-58.62795378500959','-34.63465676664228'),
(1,1,3,1,'Aguero 748','Sucursal 2 ','46963365','-58.6195308','-34.6650272'),
(1,2,1,1,'1° de Mayo 1065','Casa Central','47692123','-58.6099974','-34.5613387'),
(1,3,2,1,'Calle 828 2501 esquina 897','Casa Central','1','-58.32294988500498','-34.771227573886875'),
(1,3,2,1,'Calle 850 & Avenida Juan Domingo Perón','Casa Central','42131880','-58.316748785004414','-34.786816974715514'),
(1,3,2,1,'Calle 844 Nº1055','Casa Central','42502751','-58.29572495882468','-34.77063114462264'),
(1,3,2,1,'Calle 844 1055','Casa Central','42502751','-58.29587723388856','-34.77071495477671'),
(1,4,2,1,'Av. Espera 3105 esq. Alma Fuerte','Sucursal 3','42387479','-58.38832097677833','-34.82607471803259'),
(1,4,2,1,'Eugenio de Burzaco 484','Sucursal 1','42990790 ','-58.397789490490716','-34.82655012146395'),
(1,4,2,1,'J.V. González 2675 ','Casa Central','42998978 ','-58.368290185003595','-34.81277967609622'),
(1,5,2,1,'Av. Calchaqui 568 ','Casa Central','42757564','-58.26291689390085','-34.7792390324263'),
(1,5,2,1,'Av. 14 4133 ','Sucursal 4','1' ,'-58.2161693097601','-34.76536210070135'),
(1,5,2,1,'Camino Gral. Belgrano 2916','Casa Central','1' ,'-58.23737091296472','-34.79543177135264'),
(1,5,2,1,'Av. Rigolleau esq. 116','Sucursal ','1' ,'-58.24337713425881','-34.77890416413507'),
(1,6,1,1,'1° de Mayo 2115 ','Casa Central','47695096','-58.615833','-34.570626'),
(1,6,3,1,'Presidente Perón 9631','Sucursal','48414878','-58.61333602952962','-34.57078907709069'),
(1,7,4,1,'Libres del sur 201','Casa Central','02241431033','-58.0143455','-35.573704'),
(1,7,2,1,'Casalins 667 ','Casa Central','02241423692','-58.01464178497766','-35.56446201646837'),
(1,8,4,1,'Calle 3 569 ','Casa Central','02246420228','-56.693316584943716','-36.5359631697786'),
(1,9,1,1,'Cabo Benitez 4335','Casa Central','02320426003','-58.752029185013136','-34.53068226114389'),
(1,10,1,1,'Sesquicentenario 802','Sucursal','1','-58.72455553501395','-34.506571059870964'),
(1,11,1,1,'Av. de Mayo 462 ','Casa Central','02322487570','-58.845144185014405','-34.49029945901233'),
(1,11,1,1,'Av. Araoz Alfaro 1530','Sucursal 1','02304485857','-58.83972988501448','-34.488680758927025'),
(1,12,1,1,'French 1231','Sucursal 2','02320301333','-58.79776900379007','-34.45100100104739'),
(1,13,2,1,'Colón 3071','Casa Central','02320301333','-58.35925246417477','-34.79631507282804'),
(1,14,3,1,'Ricardo Balbin 6398 (Ruta 200 Km 36500)','Casa Central','02204984040','-58.77240818500754','-34.69460686981937'),
(1,14,3,1,'Av. Domingo Sica 3375','Sucursal','02204984040','-58.71861827241459','-34.71431996953471'),
(1,14,3,1,'Av. Calle Real 1317','Casa Central','02204838596','-58.708097685008106','-34.6803019690608'),
(1,15,3,1,'Puerto Argentino 3998','Casa Central','02202422009','-58.65114068500519','-34.76771127370011'),
(1,16,2,1,'De la Serna 1664','Casa Central','42040067','-58.369174185007715','-34.68972586956053'),
(1,17,4,2,'Arturo Illia  301','Casa Central','0362 441 5444','-58.98556732535341','-27.45497832864082'),
(1,17,4,2,'Av.25 de Mayo 640','Sucursal 1','','-58.99408858523375','-27.445832222258517'),
(1,18,4,2,'Av. Alvear 4520','Sucursal 2','03624 460 040','-59.03734058523455','-27.420316921168638'),
(1,19,4,2,'Belgrano 645','Sucursal','0364 442 8959','-60.43900576550114','-26.78716208442384'),
(1,20,4,4,'Junin 1547','Sucursal 3','03794 425 154','-58.83348468523313','-27.46796422320467'),
(1,21,4,4,'Mariano I, Loza 430 ','Sucursal 4','','-59.26346414157749','-29.14372857712569'),
(1,22,2,1,'El Aljibe 702 ','Casa Central','','-58.30264767185421','-34.80650642375772'),
(1,22,2,1,'Hudson 889','Casa Central','','-58.25298906404633','-34.81726095177012'),
(1,22,2,1,'Av. Lujan 1358','Casa Central','','-58.2273663457946','-34.82774435641358'),
(1,23,2,1,'Av. Calchaqui 2403','Casa Central','4250 0846','-58.28871238476647','-34.74924438042212'),
(1,23,2,1,'Av. 12 de Octubre 3843','Casa Central','4250 0846','-58.29674607538425','-34.74597395634312'),
(1,24,4,1,'Calle 23 1955','Casa Central','','-57.84555615971309','-38.26610526479399'),
(1,25,2,1,'Eva Perón 3881','Casa Central','4220 0681','-58.35773916477489','-34.72526385596666'),
(1,25,2,1,'Eva Perón 4231','Sucursal 2','4220 1692','-58.3546942811132','-34.72761455687665'),
(1,26,2,1,'Eva Perón 4385 ','Sucursal 3','4220 9729','-58.35336488277095','-34.72862992000037'),
(1,26,2,1,'Eva Perón 3371','Sucursal 1','4246 7480','-58.36484568500665','-34.72155957124934');


INSERT INTO Novedades (titulo,subtitulo,descripcion,desarrollo,fecha,fechaCalendario,idTema,bannerImg) VALUES 
('Prueba9','Pr4e3a2','Prueba2','PAFMIQMQFQMF',
'Mayo 03, 2019','2019-07-04', 1,'portada_tapitas_2');



INSERT INTO Usuarios (idIntegrantes,nombre,razon,domicilio,cp,email,usuario,contrasena,rol,telefono,idLocalidades,idProvincias) 
VALUES (1,'Alan Snyders','---','Las tunas 4864','123','alan.boca12@gmail.com','alan2','1234',2,1158942975,1,1)
