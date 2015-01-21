DELIMITER $$

USE `rrhh_`$$

DROP PROCEDURE IF EXISTS `dataGrid`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dataGrid`(
	IN _criterio VARCHAR(200)
    )
BEGIN
	DECLARE search VARCHAR(200) DEFAULT '';
	
	IF _criterio != '' THEN
		SET search = CONCAT(' WHERE CONCAT(nombres," ",apellidos) LIKE "%',_criterio,'%" ');
	END IF;
	
	SET @sentencia = CONCAT('
	SELECT 
		nombres,apellidos
	FROM f_trabajador
	',search,';
	');
	
	PREPARE consulta FROM @sentencia;
	EXECUTE consulta;
	
	DEALLOCATE PREPARE consulta;
	SET @sentencia = NULL;
    END$$

DELIMITER ;