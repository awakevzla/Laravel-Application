DELIMITER $$

CREATE PROCEDURE Sessions_GetUserTypeWhereToken(p_token CHAR(32))
BEGIN
	SELECT UC.usertype FROM UserCredentials UC
    INNER JOIN Sessions S ON S.usercredentialsid = UC.usercredentialsid
    WHERE S.token = p_token;
END;$$