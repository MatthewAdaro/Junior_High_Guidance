-- Create the 'user' table
CREATE TABLE user (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    middle_name VARCHAR(50),
    last_name VARCHAR(255) NOT NULL,
    birthday DATE,
    address VARCHAR(255)
);

-- Create the 'guidance_Offense' table
CREATE TABLE guidance_offense (
    offense_id INT PRIMARY KEY AUTO_INCREMENT,
    student_name VARCHAR(50) NOT NULL,
    school_year VARCHAR(50) NOT NULL,
    reason TEXT NOT NULL,
    date DATE NOT NULL,
    status VARCHAR(10) NOT NULL,
    offense_level VARCHAR(50) NOT NULL,
    is_active BOOLEAN NOT NULL
);