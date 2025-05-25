INSERT INTO admin_users (username, password, role)
VALUES (
    'admin',  -- username
    crypt('admin123', gen_salt('bf')), -- hashed password
    'superadmin' -- role
);
