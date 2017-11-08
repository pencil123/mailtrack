create database mailstack;

create table record(
id int auto_increment primary key,
receive_mail varchar(20) comment '����֪ͨ�ʼ�',
imgpath varchar(20) comment 'ͼƬ·��',
title varchar(20) default '' comment '����˵��',
create_time timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP comment '����ʱ��',
ip int(10) comment '����IP',
user_id int default 0
)comment='���ٱ�ʶ��¼��';


create table access(
record_id int comment '��¼ID',
access_time timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP comment '����ʱ��',
ip int(10) comment '����IP'
)comment='���ʱ�';



create table user(
id int auto_increment primary key,
mail varchar(20) comment '�û��ʼ�',
passwd varchar(20) comment '�û�����'
)comment='�û���';



grant all privileges on mailstack.* to mailstack@'localhost' identified by 'mailstack';
flush privileges;