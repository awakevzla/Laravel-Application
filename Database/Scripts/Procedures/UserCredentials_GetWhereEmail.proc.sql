DELIMITER $$

CREATE PROCEDURE UserCredentials_GetWhereEmail(p_email CHAR)
BEGIN
	SELECT DISTINCT * FROM UserCredentials WHERE email = p_email;
END;$$