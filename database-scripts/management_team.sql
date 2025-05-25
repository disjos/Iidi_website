-- Create management_team table
CREATE TABLE management_team (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    designation VARCHAR(100),
    bio TEXT,
    photo VARCHAR(255)
);

-- Insert demo records
INSERT INTO management_team (name, designation, bio, photo) VALUES
('Mr. Rajesh Kumar', 'Chief Executive Officer', 'Over 18 years of experience in leadership and operations.', 'rajesh.jpg'),
('Ms. Anjali Verma', 'Chief Financial Officer', 'Expert in financial planning and strategy.', 'anjali.jpg'),
('Dr. Suresh Nair', 'Chief Technology Officer', 'Leader in technology innovation and development.', 'suresh.jpg'),
('Ms. Neeta Joshi', 'Head of Human Resources', 'Specialist in talent acquisition and employee engagement.', 'neeta.jpg');
