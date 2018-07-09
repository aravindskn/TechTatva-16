create table users(
user_id int(11) unsigned PRIMARY KEY AUTO_INCREMENT,
email varchar(255) UNIQUE NOT NULL,
password_hash char(60) NOT NULL,
first_name varchar(255) NOT NULL,
last_name varchar(255) NOT NULL
);

create table subjects(
subject_id int unsigned PRIMARY KEY AUTO_INCREMENT,
name varchar(255) NOT NULL
);


create table questions(
question_id int unsigned PRIMARY KEY AUTO_INCREMENT,
subject_id int unsigned,
question TEXT NOT NULL,
options TEXT NOT NULL,
answer char(1) NOT NULL,
FOREIGN KEY(subject_id) REFERENCES subjects(subject_id)
);

create table answers(
user_id int unsigned,
question_id int unsigned,
answer char(1),
PRIMARY KEY(user_id,question_id),
FOREIGN KEY(user_id) REFERENCES users(user_id),
FOREIGN KEY(question_id) REFERENCES questions(question_id)
);