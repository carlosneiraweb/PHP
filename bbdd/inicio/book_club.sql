use mydatabase;

create table members (
	id		smallint unsigned not null auto_increment,
	username	varchar(30) binary not null unique,
	password	char(41) not null,
	firstname	varchar(30) not null,
	lastname	varchar(30) not null,
	joinDate	Date not null,
	gender		ENUM('m','f')not null,
	favoriteGenre	ENUM('crime', 'horror', 'thriller', 'romance', 'sciFi', 'adventure','nonFiction') not null,
	emailAddress	varchar(50) not null unique,
	otherInterests	TEXT not null,
	primary key(id)
	);

	insert into members values(1,'spark',password('123'),'John','Spark', '2007-11-13', 'm', 'crime', 'exemplo@hotmail.es', 'Football, fishing and gardering');
	insert into members values(2,'maria',password('124'),'Maria','Newton', '2007-02-06', 'f', 'thriller', 'mary@hotmail.es', 'Writing hunting and travel');
	insert into members values(3,'jojo',password('125'),'Jo','Scrivener', '2006-09-03', 'f', 'romance', 'jscrivener@hotmail.es', 'Genealogy, writing, painting');
	insert into members values(4,'marty',password('126'),'Marty','Pareene', '2007-01-07', 'm', 'horror', 'marty@hotmail.es', 'Guitar playing, rock music, clubbing');
	insert into members values(5,'nick',password('127'),'Nick','Blakely', '2007-08-19', 'm', 'sciFi', 'nick@hotmail.es', 'Watching movies, cooking, socializing');
	insert into members values(6,'bigbill',password('128'),'Bill','Swan', '2007-06-11', 'm', 'nonFiction', 'billswan@hotmail.es', 'Tennis, judo, music');
	insert into members values(7,'janefield',password('129'),'Jane','Field', '2006-03-03', 'f', 'crime', 'janefield@hotmail.es', 'Thail cookery, gardering, traveling');


	create table accessLog(
		memberId smallint unsigned not null auto_increment,
		pageUrl varchar(255) not null,
		numVisits mediumint not null,
		lastAccess timestamp not null,
		primary key(memberId, pageUrl)
		);

insert into accessLog(memberId, pageUrl, numVisits) values(1, 'diary.php', 2);
insert into accessLog(memberId, pageUrl, numVisits) values(3, 'books.php', 2);
insert into accessLog(memberId, pageUrl, numVisits) values(3, 'contact.php', 1);
insert into accessLog(memberId, pageUrl, numVisits) values(6, 'books.php', 4);