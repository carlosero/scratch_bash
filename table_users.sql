# TABLE
create table users (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(20) NOT NULL,
  user varchar(20) UNIQUE NOT NULL,
  password varchar(255),
  credits int(11) default 0
)
