
CREATE feedbacksystem;
USE feedbacksystem;

-- -----------------------------------------------------
-- Table user
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS user (
  uid INT(10) NOT NULL AUTO_INCREMENT,
  usertype VARCHAR(10) NOT NULL DEFAULT 'student',
  loginid VARCHAR(45) NOT NULL,
  password VARCHAR(45) NOT NULL DEFAULT '0',
  name VARCHAR(30) NOT NULL,
  dob DATE NOT NULL,
  email VARCHAR(50) NULL DEFAULT NULL,
  phone VARCHAR(15) NULL DEFAULT NULL,
  create_time TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  usercol VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (uid),
  UNIQUE INDEX loginid_UNIQUE (loginid ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table feedback_form
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS feedback_form (
  uid INT(10) NOT NULL AUTO_INCREMENT,
  createdby INT(10) NOT NULL,
  title TEXT NULL DEFAULT NULL,
  fromrange VARCHAR(45) NULL DEFAULT NULL,
  torange VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (uid),
  INDEX fk_feedback_form_user1_idx (createdby ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table assignment
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS assignment (
  uid INT(11) NOT NULL AUTO_INCREMENT,
  user_uid INT(10) NOT NULL,
  feedback_form_uid INT(10) NOT NULL,
  status TINYINT(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (uid),
  INDEX fk_assignment_user1_idx (user_uid ASC),
  INDEX fk_assignment_feedback_form1_idx1 (feedback_form_uid ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 61
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table feedback_questions
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS feedback_questions (
  uid INT(10) NOT NULL AUTO_INCREMENT,
  user_uid INT(10) NOT NULL,
  feedback_form INT(10) NOT NULL,
  question TEXT NULL DEFAULT NULL,
  type VARCHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (uid),
  INDEX fk_feedback_questions_user_idx (user_uid ASC),
  INDEX fk_feedback_questions_feedback_form1_idx (feedback_form ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table feedback_record
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS feedback_record (
  uid INT(10) NOT NULL AUTO_INCREMENT,
  feedback_questions_uid INT(10) NOT NULL,
  feedback_form_uid INT(10) NOT NULL,
  answer TEXT NULL DEFAULT NULL,
  PRIMARY KEY (uid),
  INDEX fk_feedback_record_feedback_questions1_idx (feedback_questions_uid ASC),
  INDEX fk_feedback_record_feedback_form1_idx1 (feedback_form_uid ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table preferences
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS preferences (
  name TEXT NOT NULL,
  value TEXT NOT NULL)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;



INSERT INTO user (uid, usertype, loginid, password, name, dob, email, phone, create_time, usercol) VALUES 
(NULL, 'student', '123', '123', 'Devang Chhajed', '1996-06-10', 'geekdevang@gmail.com', '9887722857', CURRENT_TIMESTAMP, NULL), 
(NULL, 'student', '2017450001', '123', 'Abc Xyz', '1996-06-10', 'abc@xyz.com', '0123456789', CURRENT_TIMESTAMP, NULL), 
(NULL, 'student', '2017450002', '123', 'Abc Xyz', '1996-06-10', 'abc@xyz.com', '0123456789', CURRENT_TIMESTAMP, NULL), 
(NULL, 'student', '2017450003', '123', 'Abc Xyz', '1996-06-10', 'abc@xyz.com', '0123456789', CURRENT_TIMESTAMP, NULL), 
(NULL, 'hod', '111', '111', 'Pooja', '2017-10-04', 'abc@xyz/com', '0123654789', CURRENT_TIMESTAMP, NULL), 
(NULL, 'teacher', '222', '222', 'Harshil Kanakia', '2017-10-04', 'abc@xyz/com', '0123654789', CURRENT_TIMESTAMP, NULL);
INSERT INTO feedback_form (uid, createdby, title, fromrange, torange) VALUES
(1, 3, 'Demo Subject', '2017450001', '2017450060');
INSERT INTO feedback_questions (uid, user_uid, feedback_form, question, type) VALUES
(1, 3, 1, 'Understanding of teacher about the subject.', 'rating'),
(2, 3, 1, 'How likely do you ask your doubts in class?', 'rating'),
(3, 3, 1, 'Does teacher rush the course?', 'rating'),
(4, 3, 1, 'Any suggestion regarding the subject or teacher..?', 'review');

