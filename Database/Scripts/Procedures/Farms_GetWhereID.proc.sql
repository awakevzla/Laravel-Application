DELIMITER $$

CREATE PROCEDURE Farms_GetWhereId(p_id INT)
BEGIN
	SELECT * FROM Farms WHERE farmid = @p_id;
END;$$