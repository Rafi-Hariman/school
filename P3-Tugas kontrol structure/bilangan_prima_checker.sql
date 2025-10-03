SET SERVEROUTPUT ON;

DECLARE
    
    input_number NUMBER := &number_to_check;

    is_prime BOOLEAN := TRUE;
    
    max_divisor NUMBER;
    
BEGIN
    DBMS_OUTPUT.PUT_LINE('=================================');
    DBMS_OUTPUT.PUT_LINE('CEK BILANGAN PRIMA');
    DBMS_OUTPUT.PUT_LINE('=================================');
    DBMS_OUTPUT.PUT_LINE('Angka yang dicek: ' || input_number);
    DBMS_OUTPUT.PUT_LINE('---------------------------------');
    
    IF input_number < 2 THEN

        is_prime := FALSE;
        DBMS_OUTPUT.PUT_LINE('Angka kurang dari 2 bukan prima');
        
    ELSIF input_number = 2 THEN

        is_prime := TRUE;
        DBMS_OUTPUT.PUT_LINE('Angka 2 adalah satu-satunya bilangan prima genap');
        
    ELSIF MOD(input_number, 2) = 0 THEN

        is_prime := FALSE;
        DBMS_OUTPUT.PUT_LINE('Bilangan genap lebih dari 2 bukan prima');
        
    ELSE

        max_divisor := FLOOR(SQRT(input_number));
        DBMS_OUTPUT.PUT_LINE('Cek pembagi dari 3 sampai ' || max_divisor);
        

        FOR i IN 3..max_divisor LOOP

            IF MOD(i, 2) = 1 THEN
                IF MOD(input_number, i) = 0 THEN

                    is_prime := FALSE;
                    DBMS_OUTPUT.PUT_LINE('Ditemukan pembagi: ' || i);
                    EXIT; 
                END IF;
            END IF;
        END LOOP;
        

        IF is_prime THEN
            DBMS_OUTPUT.PUT_LINE('Tidak ada pembagi dalam rentang ini');
        END IF;
    END IF;
    

    DBMS_OUTPUT.PUT_LINE('---------------------------------');
    IF is_prime THEN
        DBMS_OUTPUT.PUT_LINE('Bilangan ' || input_number || ' adalah bilangan PRIMA');
    ELSE
        DBMS_OUTPUT.PUT_LINE('Bilangan ' || input_number || ' BUKAN bilangan prima');
    END IF;
    DBMS_OUTPUT.PUT_LINE('=================================');
    
EXCEPTION
    WHEN OTHERS THEN
        DBMS_OUTPUT.PUT_LINE('Terjadi kesalahan: ' || SQLERRM);
END;