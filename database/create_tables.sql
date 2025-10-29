-- =====================================
-- DATABASE: admission_chatbot
-- =====================================
CREATE DATABASE IF NOT EXISTS admission_chatbot;
USE admission_chatbot;

-- =====================================
-- DROP EXISTING TABLES (for reruns)
-- =====================================
DROP TABLE IF EXISTS login;
DROP TABLE IF EXISTS registration;
DROP TABLE IF EXISTS faq;
DROP TABLE IF EXISTS roaster;
DROP TABLE IF EXISTS fee;
DROP TABLE IF EXISTS sem1_c;
DROP TABLE IF EXISTS sem2_c;
DROP TABLE IF EXISTS sem1_o;
DROP TABLE IF EXISTS sem2_o;
DROP TABLE IF EXISTS Subject;
DROP TABLE IF EXISTS Course;


-- ===============================
-- Registration Table
-- ===============================
DROP TABLE IF EXISTS registration;
CREATE TABLE registration (
    r_no VARCHAR(10) PRIMARY KEY,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    passed_from_Modern_College_Pune_05 ENUM('Yes', 'No') NOT NULL,
    Gap ENUM('Yes', 'No') NOT NULL
);

-- Sample data
INSERT INTO registration (r_no, firstname, lastname, passed_from_Modern_College_Pune_05, Gap) VALUES 
('2023000001', 'Aarav', 'Sharma', 'No', 'No'),
('2023000002', 'Vihaan', 'Patel', 'Yes', 'No'),
('2023000003', 'Ishaan', 'Reddy', 'No', 'Yes'),
('2023000004', 'Mira', 'Singh', 'Yes', 'No'),
('2023000005', 'Anika', 'Chopra', 'No', 'No'),
('2023000006', 'Dev', 'Joshi', 'Yes', 'No'),
('2023000007', 'Riya', 'Mehta', 'No', 'No'),
('2023000008', 'Arjun', 'Nair', 'Yes', 'Yes'),
('2023000009', 'Sneha', 'Gupta', 'No', 'No'),
('2023000010', 'Kabir', 'Malhotra', 'Yes', 'No');

-- ===============================
-- Login Table
-- ===============================
DROP TABLE IF EXISTS login;
CREATE TABLE login (
    r_no VARCHAR(10) NOT NULL,
    password VARCHAR(255) NOT NULL,
    FOREIGN KEY (r_no) REFERENCES registration(r_no)
);

-- ===============================
-- FAQ Table
-- ===============================
DROP TABLE IF EXISTS faq;
CREATE TABLE faq (
    id INT AUTO_INCREMENT PRIMARY KEY,
    keyword VARCHAR(255),
    answer TEXT
);

INSERT INTO faq (keyword, answer) VALUES 
-- Greetings
('hi, hello, greetings', 'Hello! How can I assist you today?'),
('good morning, good afternoon, good evening', 'Good day! How can I help you?'),

-- Admission Queries
('admission, eligibility, requirements', 'To be eligible for admission, candidates must have completed their higher secondary education (10+2) from a recognized board.'),
('application, process, steps', 'The admission process includes filling out the online application form, submitting required documents, and paying the application fee.'),
('important dates, admission, deadlines', 'Check the college website for the latest admission dates and deadlines.'),
('documents, required, admission', 'Required documents typically include mark sheets, a birth certificate, and category certificates (if applicable).'),
('scholarship, available, admission', 'Various merit and need-based scholarships are available.'),
('contact, help, support', 'You can contact the admission office via email or phone during working hours.'),

-- Fees Related Queries
('fees, structure, open', 'The fee structure for the open category is ₹57,690.'),
('fees, structure, SC, ST', 'The fee for SC/ST students is ₹24,955.'),
('fees, foreign, students', 'The fee for foreign students is ₹1,18,990.'),
('admission, fee, payment', 'Fees can be paid online through the college website using credit/debit cards or net banking.'),
('fee, waiver, eligibility', 'Fee waivers are available for economically disadvantaged students.'),
('tuition, additional, fees', 'Additional charges may include lab, library, and miscellaneous fees.'),
('scholarship, fee, reduction', 'Certain scholarships can help reduce overall fees.'),

-- Roaster Related Queries
('roaster, seats, OBC', 'For the OBC category, there are 15 normal seats and 10 in-house seats available.'),
('roaster, seats, SC', 'The SC category has 11 normal seats and 8 in-house seats.'),
('roaster, total, categories', 'Categories include OPEN, SC, ST, OBC, and others.'),
('seats, available, admission', 'Check the admission guidelines for total seats per category.'),

-- Subjects Related Queries
('subjects, semester 1, compulsory', 'Compulsory subjects: Programming in C, Discrete Mathematics, Basics of Electronics, and Computer Fundamentals.'),
('subjects, semester 1, optional', 'Optional subjects: Fundamentals of Economics, Professional English Skills I, and Music of India.'),
('subjects, semester 2, compulsory', 'Compulsory subjects: Advance C Programming, Matrix Theory, and Digital Marketing.'),
('subjects, semester 2, optional', 'Optional subjects: Micro Economics, English Skills II, and History for Policy Makers.'),
('all, subjects, available', 'Full subject list is available on the college website.'),
('lab, courses, subjects', 'Lab courses include C Programming, Discrete Mathematics, and Statistical Analysis.'),
('elective, subjects, information', 'Elective subjects vary by semester and include topics like International Economics or Stress Management.');

-- ===============================
-- Roaster Table
-- ===============================
DROP TABLE IF EXISTS roaster;
CREATE TABLE roaster (
    id INT AUTO_INCREMENT PRIMARY KEY,
    caste VARCHAR(50) NOT NULL,
    seat_normal INT NOT NULL,
    seat_in_house VARCHAR(20) NOT NULL
);

INSERT INTO roaster (caste, seat_normal, seat_in_house) VALUES
('OPEN', 33, '22'),
('SC', 11, '8'),
('ST', 6, '4'),
('VJNT-A', 2, '2'),
('NT-B-1', 2, '2'),
('NT-C-2', 3, '2'),
('NT-D-3', 2, '1'),
('SBC', 2, '1'),
('OBC', 15, '10'),
('EWS', 8, '6'),
('DEFENCE', 7, 'NOT-APPLICABLE'),
('DISABILITY', 4, 'NOT-APPLICABLE'),
('ORPHAN', 1, 'NOT-APPLICABLE');

-- ===============================
-- Fee Table
-- ===============================
DROP TABLE IF EXISTS fee;
CREATE TABLE fee (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(50) NOT NULL,
    fee INT NOT NULL
);

INSERT INTO fee (category, fee) VALUES
('OPEN', 57690),
('SC', 24955),
('ST', 24955),
('EBC', 46790),
('OBC', 57690),
('NT', 57690),
('SBC', 57690),
('EWS', 57690),
('SEBC', 57690),
('ARMY', 57690),
('SAARC-SELF', 88590),
('OUT-OF-STATE', 88590),
('FOREIGNER', 118990);

-- ===============================
-- Semester 1 Compulsory Subjects
-- ===============================
DROP TABLE IF EXISTS sem1_c;
CREATE TABLE sem1_c (
    subject_id VARCHAR(30) PRIMARY KEY,
    complusory_name VARCHAR(100) NOT NULL
);

INSERT INTO sem1_c (subject_id, complusory_name) VALUES
('24CsCmpU1101', 'PROGRAMMING IN C'),
('24CsCmpU1102', 'LAB COURSE ON C PROGRAMMING'),
('24CsCmpU1201', 'DISCRETE MATHEMATICS'),
('24CsCmpU1202', 'LAB COURSE ON DISCRETE MATHEMATICS'),
('24CsCmpU1301', 'BASICS OF ELECTRONICS COMPONENTS AND CIRCUITS'),
('24CsCmpU1302', 'LAB COURSE ON BASICS OF ELECTRONICS COMPONENTS AND CIRCUITS'),
('24CsCmpU1901', 'GENERIC IKS'),
('24CsCmpU1401', 'COMPUTER FUNDAMENTALS'),
('24CsCmpU1601', 'LAB COURSE ON STATISTICAL ANALYSIS USING R PROGRAMMING I'),
('24CsCmpU1701', 'MIL-I (HINDI) OR MIL-I (MARATHI)'),
('24CsCmpU1801', 'ENVIRONMENTAL SCIENCE');

-- ===============================
-- Semester 2 Compulsory Subjects
-- ===============================
DROP TABLE IF EXISTS sem2_c;
CREATE TABLE sem2_c (
    subject_id VARCHAR(30) PRIMARY KEY,
    complusory_name VARCHAR(100) NOT NULL
);

INSERT INTO sem2_c (subject_id, complusory_name) VALUES
('24CsCmpU2101', 'ADVANCE C PROGRAMMING'),
('24CsCmpU2102', 'LAB COURSE ON ADVANCE C PROGRAMMING'),
('24CsMatU2201', 'MATRIX THEORY'),
('24CsMatU2202', 'LAB COURSE ON MATRIX THEORY'),
('24CsEleU2301', 'BASICS OF ELECTRONIC INSTRUMENTATION'),
('24CsEleU2302', 'LAB COURSE ON BASICS OF ELECTRONIC INSTRUMENTATION'),
('24CsCopU2401', 'DIGITAL MARKETING'),
('24CsStaU2601', 'LAB COURSE ON STATISTICAL ANALYSIS USING R PROGRAMMING II'),
('24CsCopU2703', 'ENGLISH COMMUNICATION SKILLS I'),
('24CsCopU2801', 'DEMOCRACY, ELECTION AND GOVERNANCE'),
('24CsCopU2001', 'PHYSICAL EDUCATION'),
('24CsCopU2011', 'CULTURAL ACTIVITIES'),
('24CsCopU2021', 'NSS'),
('24CsCopU2031', 'NCC'),
('24CsCopU2041', 'FINE ARTS'),
('24CsCopU2051', 'APPLIED ARTS'),
('24CsCopU2061', 'VISUAL ARTS'),
('24CsCopU2071', 'PERFORMING ARTS');

-- ===============================
-- Semester 1 Optional Subjects
-- ===============================
DROP TABLE IF EXISTS sem1_o;
CREATE TABLE sem1_o (
    subject_id INT AUTO_INCREMENT PRIMARY KEY,
    optional_name VARCHAR(100) NOT NULL
);

INSERT INTO sem1_o (optional_name) VALUES
('FUNDAMENTALS OF ECONOMICS'),
('PROFESSIONAL ENGLISH SKILLS I'),
('GEOGRAPHY OF TOURISM I'),
('ANUWAD KAUSHALYA I : SAHITIK ANUWAD'),
('GERMAN FOR BEGINNERS I'),
('HERITAGE STUDIES'),
('MARATHI PRAMAN LEKHAN'),
('MUSIC OF INDIA'),
('CONSTITUTIONAL BODIES OF INDIA'),
('STRESS MANAGEMENT'),
('PRARAMBHIK SANSKRIT'),
('BUSINESS CORRESPONDENCE'),
('PRODUCTION AND OPERATION MANAGEMENT'),
('LAB COURSE OF FASHION DRAPING'),
('FUNDAMENTALS OF TRADE AND COMMERCE I');

-- ===============================
-- Semester 2 Optional Subjects
-- ===============================
DROP TABLE IF EXISTS sem2_o;
CREATE TABLE sem2_o (
    subject_id INT AUTO_INCREMENT PRIMARY KEY,
    optional_name VARCHAR(100) NOT NULL
);

INSERT INTO sem2_o (optional_name) VALUES
('INTRODUCTION TO MICRO ECONOMICS'),
('PROFESSIONAL ENGLISH SKILLS II'),
('GEOGRAPHY OF TOURISM II'),
('GERMAN FOR BEGINNERS II'),
('ANUWAD KAUSHALYA II : SAHITETAR ANUWAD'),
('HISTORY FOR POLICY MAKERS AND ADMINISTRATORS'),
('MUDRISHODHAN'),
('INTRODUCTION OF INDIAN INSTRUMENTS'),
('ETHICS IN GOVERNANCE'),
('NURTURING EMOTIONAL INTELLIGENCE'),
('VYAKARAN PRAVESH'),
('PERSONALITY DEVELOPMENT'),
('INTERNATIONAL ECONOMICS'),
('LAB COURSE ON HAND EMBROIDERY'),
('FUNDAMENTALS OF TRADE AND COMMERCE II');

-- ===============================
-- General Subject and Course Tables
-- ===============================
DROP TABLE IF EXISTS Subject;
CREATE TABLE Subject (
    id VARCHAR(30) PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

DROP TABLE IF EXISTS Course;
CREATE TABLE Course (
    id VARCHAR(30) PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    duration INT NOT NULL
);

-- =====================================
-- DISPLAY SECTION
-- =====================================

SELECT '===== REGISTRATION TABLE =====' AS '';
SELECT * FROM registration;

SELECT '===== LOGIN TABLE =====' AS '';
SELECT * FROM login;

SELECT '===== FAQ TABLE =====' AS '';
SELECT * FROM faq;

SELECT '===== ROASTER TABLE =====' AS '';
SELECT * FROM roaster;

SELECT '===== FEE TABLE =====' AS '';
SELECT * FROM fee;

SELECT '===== SEM1 COMPULSORY SUBJECTS =====' AS '';
SELECT * FROM sem1_c;

SELECT '===== SEM2 COMPULSORY SUBJECTS =====' AS '';
SELECT * FROM sem2_c;

SELECT '===== SEM1 OPTIONAL SUBJECTS =====' AS '';
SELECT * FROM sem1_o;

SELECT '===== SEM2 OPTIONAL SUBJECTS =====' AS '';
SELECT * FROM sem2_o;

SELECT '===== SUBJECT TABLE =====' AS '';
SELECT * FROM Subject;

SELECT '===== COURSE TABLE =====' AS '';
SELECT * FROM Course;
