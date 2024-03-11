-- Create a scheduled event to run every day
SET GLOBAL event_scheduler=ON;
DELIMITER //

-- DROP EVENT update_payment_status_event;

CREATE EVENT update_payment_status_event
ON SCHEDULE EVERY 1 DAY
DO
BEGIN
    UPDATE customer
    SET isPaid = 'Unpaid'
    WHERE Date_due < CURDATE() AND isPaid = 'Paid';
END;
//

DELIMITER //

DROP TRIGGER update_isPaid_status;

CREATE TRIGGER update_isPaid_status
AFTER INSERT ON transactions
FOR EACH ROW
BEGIN
    UPDATE customer
    SET isPaid = 'Pending'
    WHERE Customer_id = NEW.Customer_id ; -- Assuming you have a customer_id linking the two tables
      -- AND Date_due >= NEW.`Date`;
END;
//

DELIMITER ;


DELIMITER ;

-- DROP TRIGGER update_Date_due;

DELIMITER //








DELIMITER ;