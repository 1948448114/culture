CREATE TABLE news_table
    (
    news_id int unsigned auto_increment,
    news_title varchar(50) not null,
    news_author varchar(50) not null,
    news_time int(10) not null,
    news_content text not null,
    news_link text not null,
    news_beRead int unsigned not null default 0,
    PRIMARY KEY  (`news_id`)
    );

CREATE TABLE admins_table
    (
    admin_username varchar(50),
    admin_password varchar(50)
    );