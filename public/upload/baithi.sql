CREATE DATABASE Baithi
USE Baithi

CREATE TABLE Marks(
	student_code INT PRIMARY KEY IDENTITY,
	student_name VARCHAR(50) NOT NULL,
	course int  ,
	semester1marks  SMALLINT,
	semester2marks   SMALLINT,
	enrolled_date DATE
) 
	

CREATE TABLE Course(
	code INT PRIMARY KEY,
	course_title NVARCHAR(30),
	credit_hour INT
)
drop table Course
drop table Marks

select * from Course
select * from Marks

--
ALTER TABLE Marks
ADD FOREIGN KEY (course) REFERENCES Course(course_title)

--a: Tiêu đề khoá học có ít nhất 5 ký tự
alter table course
add constraint  CheckCourse_title
check (len(course_title)>5)
--a: Ngày ghi danh luôn bé hơn ngày hiện tại
alter table Marks 
add constraint checkdate
check ((enrolled_date) <=getdate())

ALTER TABLE Marks 
DROP CONSTRAINT checkdate
--a: Điểm có giá trị trong đoạn [0,10]
ALTER TABLE Marks ADD  
CONSTRAINT semester1marks CHECK (semester1marks >=0 and semester1marks<=10)

ALTER TABLE Marks ADD  
CONSTRAINT semester2marks CHECK (semester2marks >=0 and semester2marks<=10)
--5 ban ghi
insert into Marks values ('hoang1',11,5,1,'2021-06-01')
insert into Marks values ('hoang2',10,6,8,'2021-06-02')

insert into Marks values ('hoang3',10,4,7,'2021-06-03')

insert into Marks values ('hoang4',12,3,5,'2021-06-04')

insert into Marks values ('hoang5',9,0,8,'2021-06-05')
 

 

 insert into Course values(1,'bkd0811',20)
 insert into Course values(2,'bkd0911',30)
 insert into Course values(3,'bkd0211',60)
 insert into Course values(4,'bkd0111',70)
 insert into Course values(5,'bkd0611',10)
 select * from Course
 select * from Marks

 --c
 CREATE VIEW marks_course
AS
SELECT Marks.*,Course.* FROM Marks 
INNER JOIN Course ON Marks.course  = Course.course_title

select * from marks_course
