create table games (
gameid serial primary key,
priority int not null,
title text not null,
price int not null,
publisherid int not null,
platformid int not null,
releasedate date not null,
dateadded date not null,
rating text not null);

create table publishers (
publisherid serial primary key,
name text not null,
url text not null
);

create table platforms (
platformid serial primary key,
title text not null
);

insert into games (priority,title,price,publisherid,platformid,releasedate,dateadded,rating)
	values (1,'Overwatch',40.00,1,1,'2016-5-24',now(),'T');