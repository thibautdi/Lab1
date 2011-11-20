//Removing a club by id :
DELIMITER //
CREATE PROCEDURE RemoveClub(IN clubID INT(11))
BEGIN
DELETE FROM clubs WHERE id = clubID;
END //
DELIMITER ;


//Reviewing a club by id :
DELIMITER //
CREATE PROCEDURE ValidateClub(IN clubID INT(11))
BEGIN
UPDATE clubs SET reviewed = 1 WHERE id = clubID;
END //
DELIMITER ;

//Getting a rating
DELIMITER //
CREATE PROCEDURE IsRated(IN clubID INT(10), IN userID INT(10), OUT rate INT(2))
BEGIN
SELECT rating INTO rate FROM ratings WHERE club_id = clubID AND user_id = userID;
END //
DELIMITER ;

