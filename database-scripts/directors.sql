-- Create directors table
CREATE TABLE directors (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    designation VARCHAR(100),
    bio TEXT,
    photo VARCHAR(255)
);

-- Insert demo records
INSERT INTO directors (name, designation, bio, photo) VALUES
('Mr. Arvind Mehta', 'Chairman & Managing Director', 'Over 25 years of experience in capital markets and regulatory policy.', 'arvind.jpg'),
('Ms. Priya Sharma', 'Director', 'Expert in finance and investment strategies.', 'priya.jpg'),
('Dr. Ramesh Gupta', 'Board Member', 'Veteran legal advisor with extensive compliance knowledge.', 'ramesh.jpg'),
('Mrs. Sunita Patel', 'Director', 'Specialist in corporate governance and ethics.', 'sunita.jpg'),
('Mr. Sanjay Kumar', 'Board Member', 'Experienced in risk management and operations.', 'sanjay.jpg'),
('Ms. Neha Joshi', 'Director', 'Technology and innovation strategist.', 'neha.jpg'),
('Mr. Anil Desai', 'Board Member', 'Financial auditor with 15 years in the industry.', 'anil.jpg'),
('Ms. Kavita Singh', 'Director', 'Human resources and organizational development expert.', 'kavita.jpg'),
('Mr. Rahul Mehra', 'Board Member', 'Marketing and communications specialist.', 'rahul.jpg'),
('Mr. Vinay Singh', 'Executive Director', 'Responsible for corporate governance and auditing.', 'vinay.jpg');
