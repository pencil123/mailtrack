create database mailstack;

create table record(
id int auto_increment primary key,
receive_mail varchar(20) comment '接收通知邮件',
imgpath varchar(20) comment '图片路径',
title varchar(20) default '' comment '特殊说明',
create_time timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP comment '创建时间',
ip int(10) comment '创建IP',
user_id int default 0
)comment='跟踪标识记录表';


create table access(
record_id int comment '记录ID',
access_time timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP comment '访问时间',
ip int(10) comment '访问IP'
)comment='访问表';



create table user(
id int auto_increment primary key,
mail varchar(20) comment '用户邮件',
passwd varchar(20) comment '用户密码'
)comment='用户表';



grant all privileges on mailstack.* to mailstack@'localhost' identified by 'mailstack';
flush privileges;