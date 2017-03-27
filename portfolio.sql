drop database if exists portfolio;
create database portfolio character set utf8 collate utf8_croatian_ci;
use portfolio;


create table korisnik(
sifra 			int		not null primary key auto_increment,
ime 			varchar(50) 	not null,
prezime 		varchar(50) 	not null,
email 			varchar(150)  	not null,
lozinka 		varchar(50) 	not null,
naslov 			varchar(255) 	not null,
opis 			text,
image_src 		varchar(255)	not null
);


create table kategorije(
sifra 			int			not null primary key auto_increment,
naziv 			varchar(255) 		not null
);

create table rad(
sifra			int			not null primary key auto_increment,
datoteka 		varchar(255) 		not null,
datumkreiranja 	datetime 			not null,
datumupload 	datetime 			not null,
korisnik		int					not null,
kategorija 		int					not null
);

create table rad_oznaka(
rad				int					not null,
oznaka			int   				not null
);

create table oznaka(
sifra			int					not null primary key auto_increment,
naziv 			varchar(50)			not null
);


alter table rad		 	add FOREIGN KEY (korisnik) 		REFERENCES korisnik(sifra);
alter table rad		 	add FOREIGN KEY (kategorija) 	REFERENCES kategorije(sifra);
alter table rad_oznaka	add FOREIGN KEY (rad) 		REFERENCES rad(sifra);
alter table rad_oznaka 	add FOREIGN KEY (oznaka) 		REFERENCES oznaka(sifra);

insert into korisnik (sifra,ime,prezime,email,lozinka,naslov,opis,image_src) values
(null,'Imenić','Prezimenić','imaemail@gmail.com','12345','ImePrezime','ImaText','zec-1.jpg');
insert into kategorije (sifra,naziv) values
(null,'ImaNaziv');

insert into kategorije (sifra,naziv) values
(null,'Fotografija'),
(null,'Grafika');

insert into rad (sifra,datoteka,datumkreiranja,datumupload,korisnik,kategorija) values
(null,'foto.jpg','2016-11-15','2016-11-15',1,1),
(null,'grafika.jpg','2016-11-15','2016-11-15',1,1),
(null,'kip.jpg','2016-11-16','2016-11-16',1,1);

insert into oznaka (sifra,naziv) values
(null,'portret'),
(null, 'pejzaž');