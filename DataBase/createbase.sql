
/*�������� ���������*/

/*1. ����� ������� ������ ��� �� ��������������� ������������*/
go
create procedure bilet1 as
SELECT [� ������], [� �����], [������� �������/��������], 
cast([���� �������/��������] as varchar(100)) as [���� �������/��������], 
cast([���� �����������] as varchar(100)) as [���� �����������], �����, [� ������], 
[� �����], [��� ������]
FROM �����
exec bilet1;
DROP PROCEDURE bilet1;

exec bilet1;
exec marshrut1;
exec raspisanie1;
exec mesta1;

/*2. ����� ������� ������ ��� ��������������� ������������*/
go
create procedure bilet3 as
SELECT [� ������], [� �����], [������� �������/��������], 
cast([���� �������/��������] as varchar(100)) as [���� �������/��������], 
cast([���� �����������] as varchar(100)) as [���� �����������],[��� ���������],[����� ��������],[��� �������], �����, [� ������], 
[� �����], [��� ������]
FROM �����
exec bilet3;
DROP PROCEDURE bilet3;

/*3. ����� ������� �����*/
go
create procedure mesta1 as
SELECT [� �����],[� ������],[��� ������],cast([���� �����������] as varchar(100)) as [���� �����������],[� �����], �������
FROM �����
exec mesta1;
DROP PROCEDURE mesta1;

/*4. ����� ������� �������*/
go
create procedure marshrut1 as
SELECT [� �����],[������� ���� ������� ��������],[� ������� �����],[��� ���. ������], [���������� �������],cast([����� �����������] as varchar(100)) as [����� �����������]
FROM �������
exec marshrut1;
DROP PROCEDURE marshrut1;

/*5. ����� ������� ����������*/
go
create procedure raspisanie1 as
SELECT [� �����],[���� ������ �����������],cast([����� �����������] as varchar(8)) as [����� �����������],[���� ������ ��������],cast([����� ��������] as varchar(8)) as [����� ��������],cast([����� � ����] as varchar(8)) as [����� � ����]
FROM ����������
exec raspisanie1;
DROP PROCEDURE raspisanie1;

/*6. ����� ������ ����� �� ������� ����������*/
go
create procedure raspisanie2 as
SELECT [� �����]
FROM ����������
exec raspisanie2;
DROP PROCEDURE raspisanie2;

/*7. ����� ������� ����������� �� ������� ����������*/
go
create procedure raspisanie3 as
SELECT cast([����� �����������] as varchar(8)) as [����� �����������]
FROM ����������
exec raspisanie3;
DROP PROCEDURE raspisanie3;

/*8. ����� ������� ����������� �� ������� ����������*/
go
create procedure kassirs1 as
SELECT [��� �������],[��� �������]
FROM ������
exec kassirs1;
DROP PROCEDURE kassirs1;

/*9. ����� ��� ������� �� ������� �������*/
go
create procedure kassirs2 as
SELECT [��� �������]
FROM ������
exec kassirs2;
DROP PROCEDURE kassirs2;

/*10. ����� ������� ����������_������*/
go
create procedure punkt1 as
SELECT [��� ���. ������],������������
FROM ����������_������
exec punkt1;
DROP PROCEDURE punkt1;

/*11. ����� ������� �����_�����������*/
go
create procedure punktotpr1 as
SELECT [� ������],[��� ����������� ������]
FROM �����_�����������
exec punktotpr1;
DROP PROCEDURE punktotpr1;

/*12. ����� ��� ����������� ������ �� ������� ���������� ������*/
go
create procedure punktotpr2 as
SELECT [��� ���. ������]
FROM ����������_������
exec punktotpr2;
DROP PROCEDURE punktotpr2;

/*13. ����� ������� �����_��������*/
go
create procedure punktotpr3 as
SELECT [� ������],[��� ����������� ������]
FROM �����_��������
exec punktotpr3;
DROP PROCEDURE punktotpr3;

/*14. ����� ������� [������� ���� ������� ��������]*/
go
create procedure priznak1 as
SELECT [��� ��������],������������
FROM [������� ���� ������� ��������]
exec priznak1;
DROP PROCEDURE priznak1;

/*15. ����� [��� ��������] �� ������� [������� ���� ������� ��������]*/
go
create procedure priznak2 as
SELECT [��� ��������]
FROM [������� ���� ������� ��������]
exec priznak2;
DROP PROCEDURE priznak2;

/*16. ����� [� ������] �� ������� �����*/
go
create procedure bilet2 as
SELECT [� ������]
FROM �����
exec bilet2;
DROP PROCEDURE bilet2;

/*17. ����� ������� [��� ������]*/
go
create procedure vagon1 as
SELECT [��� ���� ������],������������,[���������� ���� � ������]
FROM [��� ������]
exec vagon1;
DROP PROCEDURE vagon1;

/*18. ����� [��� ���� ������] �� ������� [��� ������]*/
go
create procedure vagon2 as
SELECT [��� ���� ������]
FROM [��� ������]
exec vagon2;
DROP PROCEDURE vagon2;

create table users (
id integer primary key identity(1,1), 
email varchar(200) not null,
password varchar(200) not null,
);

/*�������*/

/*1. ��� ��������� [��� ���. ������] � ������� ����������_������ 
����� �������� ������� [��� ���. ������] � �������� �������,�����_�����������,�����_��������*/
DROP TRIGGER Update_nasel_punkt;

CREATE TRIGGER Update_nasel_punkt
ON ����������_������
FOR UPDATE
AS
DECLARE   @orig_nasel_punkt int, @new_nasel_punkt int
SELECT    @orig_nasel_punkt = [��� ���. ������] from deleted
SELECT    @new_nasel_punkt = [��� ���. ������] from inserted
SELECT *
FROM     inserted
UPDATE    �������
SET      [��� ���. ������] = @new_nasel_punkt
FROM     inserted
WHERE    �������.[��� ���. ������] = @orig_nasel_punkt
UPDATE    �����_�����������
SET      [��� ����������� ������] = @new_nasel_punkt
FROM     inserted
WHERE    �����_�����������.[��� ����������� ������] = @orig_nasel_punkt
UPDATE   �����_��������
SET      [��� ����������� ������] = @new_nasel_punkt
FROM     inserted
WHERE    �����_��������.[��� ����������� ������] = @orig_nasel_punkt


/*2. ��� ��������� [��� ��������] � ������� [������� ���� ������� ��������] 
����� �������� ������� [������� ���� ������� ��������] � ������� �������*/
DROP TRIGGER Update_kod_priznak;

CREATE TRIGGER Update_kod_priznak
ON [������� ���� ������� ��������]
FOR UPDATE
AS
DECLARE   @orig_kod_priznak int, @new_kod_priznak int
SELECT    @orig_kod_priznak = [��� ��������] from deleted
SELECT    @new_kod_priznak = [��� ��������] from inserted
SELECT *
FROM     inserted
UPDATE    �������
SET      [������� ���� ������� ��������] = @new_kod_priznak
FROM     inserted
WHERE    �������.[������� ���� ������� ��������] = @orig_kod_priznak

/*3. ��� ��������� [� �����] � ������� ���������� 
����� �������� ������� [� �����] � ������� �������,�����,�����*/
DROP TRIGGER Update_reis;

CREATE TRIGGER Update_reis
ON ����������
FOR UPDATE
AS
DECLARE   @orig_reis int, @new_reis int
SELECT    @orig_reis = [� �����] from deleted
SELECT    @new_reis = [� �����] from inserted
SELECT *
FROM     inserted
UPDATE    �������
SET      [� �����] = @new_reis
FROM     inserted
WHERE    �������.[� �����] = @orig_reis
UPDATE    �����
SET      [� �����] = @new_reis
FROM     inserted
WHERE    �����.[� �����] = @orig_reis
UPDATE    �����
SET      [� �����] = @new_reis
FROM     inserted
WHERE    �����.[� �����] = @orig_reis

/*4. ��� ��������� [� ������] � ������� ����� 
����� �������� ������� [� ������] � ������� �����_��������,�����_�����������*/
DROP TRIGGER Update_bilet;

CREATE TRIGGER Update_bilet
ON �����
FOR UPDATE
AS
DECLARE   @orig_bilet int, @new_bilet int
SELECT    @orig_bilet = [� ������] from deleted
SELECT    @new_bilet = [� ������] from inserted
SELECT *
FROM     inserted
UPDATE   �����_��������
SET      [� ������] = @new_bilet
FROM     inserted
WHERE    �����_��������.[� ������] = @orig_bilet
UPDATE   �����_�����������
SET      [� ������] = @new_bilet
FROM     inserted
WHERE    �����_�����������.[� ������] = @orig_bilet

/*5. ��� ��������� [��� �������] � ������� ������ 
����� �������� ������� [��� �������] � ������� �����*/
DROP TRIGGER Update_kassir;

CREATE TRIGGER Update_kassir
ON ������
FOR UPDATE
AS
DECLARE   @orig_kassir int, @new_kassir int
SELECT    @orig_kassir = [��� �������] from deleted
SELECT    @new_kassir = [��� �������] from inserted
SELECT *
FROM     inserted
UPDATE   �����
SET      [��� �������] = @new_kassir
FROM     inserted
WHERE    �����.[��� �������] = @orig_kassir

/*6. ��� ��������� [��� ���� ������] � ������� [��� ������] 
����� �������� ������� [��� ������] � ������� �����,�����*/
DROP TRIGGER Update_tip_vagon;

CREATE TRIGGER Update_tip_vagon
ON [��� ������]
FOR UPDATE
AS
DECLARE   @orig_tip_vagon int, @new_tip_vagon int
SELECT    @orig_tip_vagon = [��� ���� ������] from deleted
SELECT    @new_tip_vagon = [��� ���� ������] from inserted
SELECT *
FROM     inserted
UPDATE   �����
SET      [��� ������] = @new_tip_vagon
FROM     inserted
WHERE    �����.[��� ������] = @orig_tip_vagon
UPDATE   �����
SET      [��� ������] = @new_tip_vagon
FROM     inserted
WHERE    �����.[��� ������] = @orig_tip_vagon

/*7. ��� ��������� [����� �����������] � ������� ���������� 
����� �������� ������� [����� �����������] � ������� �������*/
DROP TRIGGER Update_vrema_otpr;

CREATE TRIGGER Update_vrema_otpr
ON ����������
FOR UPDATE
AS
DECLARE   @orig_vrema_otpr int, @new_vrema_otpr int
SELECT    @orig_vrema_otpr = [����� �����������] from deleted
SELECT    @new_vrema_otpr = [����� �����������] from inserted
SELECT *
FROM     inserted
UPDATE   �������
SET      [����� �����������] = @new_vrema_otpr
FROM     inserted
WHERE    �������.[����� �����������] = @orig_vrema_otpr




create index punkt_pribit on [�����_��������]([��� ����������� ������]);
create index punkt_otpravl on [�����_�����������]([��� ����������� ������]);
create index mesta on �����([� �����], [��� ������]);
create index bilet on �����([� �����], [��� �������], [��� ������]);
create index marshrut on �������([� �����], [������� ���� ������� ��������], [��� ���. ������]);

DROP DATABASE IF EXISTS [�������� �����];
Create database [�������� �����];

drop type if EXISTS onetype;
CREATE TYPE onetype
FROM varchar(40) NOT NULL;

create table [������� ���� ������� ��������] (
[��� ��������] varchar(12) primary key, 
������������ onetype not null check ((������������ = '���������') OR (������������ = '�������������') OR (������������ = '��������'))
);

create table [����������_������] (
[��� ���. ������] integer primary key identity(1,1),
������������ onetype not null
);

create table [�����_��������] (
[� ������] smallint primary key, 
[��� ����������� ������] integer not null foreign key references [����������_������]([��� ���. ������]) ON UPDATE CASCADE ON DELETE CASCADE
);

create table [�����_�����������] (
[� ������] smallint primary key, 
[��� ����������� ������] integer not null foreign key references [����������_������]([��� ���. ������]) ON UPDATE CASCADE ON DELETE CASCADE
); 

create table [��� ������] (
[��� ���� ������] smallint primary key,
������������ onetype not null,
[���������� ���� � ������] smallint not null check ([���������� ���� � ������] >= 0)
);

create table ���������� (
[� �����] smallint primary key,
[���� ������ �����������] varchar(10) not null,
[����� �����������] time not null,
[���� ������ ��������] varchar(10) not null,
[����� ��������] time not null,
[����� � ����] time not null
); 

create table ����� (
[� �����] smallint not null foreign key references ����������([� �����]) ON UPDATE CASCADE ON DELETE NO ACTION, 
[� ������] smallint not null check ([� ������] > 0), 
[��� ������] smallint not null foreign key references [��� ������]([��� ���� ������]) ON UPDATE CASCADE ON DELETE NO ACTION, 
[���� �����������] date not null, 
[� �����] smallint check ([� �����] > 0), 
������� onetype not null check ((������� = '��������') OR (������� = '�������'))
); 

create table ������ (
[��� �������] integer primary key identity(1,1), 
[��� �������] varchar(10) not null
);  

create table ����� (
[� ������] integer primary key, 
[� �����] smallint not null foreign key references ����������([� �����]) ON UPDATE CASCADE ON DELETE NO ACTION,  
[������� �������/��������] onetype not null check (([������� �������/��������] = '�������') OR ([������� �������/��������] = '�������')), 
[���� �������/��������] date not null, 
[���� �����������] date not null, 
[��� ���������] varchar(10) not null, 
[����� ��������] varchar(12) not null unique, 
[��� �������] integer not null  foreign key references ������([��� �������]) ON UPDATE CASCADE ON DELETE NO ACTION, 
����� money not null check (����� > 0), 
[� ������] smallint not null check ([� ������] > 0), 
[� �����] smallint not null check ([� �����] > 0), 
[��� ������] smallint not null foreign key references [��� ������]([��� ���� ������]) ON UPDATE CASCADE ON DELETE NO ACTION
); 

create table ������� (
[� �����] smallint not null foreign key references ����������([� �����]) ON UPDATE CASCADE ON DELETE NO ACTION, 
[������� ���� ������� ��������] varchar(12) not null foreign key references [������� ���� ������� ��������]([��� ��������]) ON UPDATE CASCADE ON DELETE NO ACTION, 
[� ������� �����] smallint, 
[��� ���. ������] integer not null foreign key references [����������_������]([��� ���. ������]) ON UPDATE CASCADE ON DELETE CASCADE, 
[���������� �������] integer not null check ([���������� �������] > 0),  
[����� �����������] time not null
); 


