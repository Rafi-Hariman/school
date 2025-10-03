

SET SERVEROUTPUT ON;

DECLARE
    student_score NUMBER := &input_score;
    grade_case CHAR(1);
    grade_if CHAR(1);
    
BEGIN
    DBMS_OUTPUT.PUT_LINE('=========================================');
    DBMS_OUTPUT.PUT_LINE('SISTEM KLASIFIKASI NILAI');
    DBMS_OUTPUT.PUT_LINE('=========================================');
    DBMS_OUTPUT.PUT_LINE('Nilai input: ' || student_score);
    DBMS_OUTPUT.PUT_LINE('-----------------------------------------');
    

    IF student_score < 0 OR student_score > 100 THEN
        DBMS_OUTPUT.PUT_LINE('ERROR: Nilai tidak valid. Nilai harus antara 0 dan 100.');
        DBMS_OUTPUT.PUT_LINE('Nilai yang diterima: ' || student_score);
        RETURN;
    END IF;
    

    DBMS_OUTPUT.PUT_LINE('Metode 1: Menggunakan CASE Expression');
    DBMS_OUTPUT.PUT_LINE('-----------------------------------------');
    

    grade_case := CASE 
                    WHEN student_score >= 85 THEN 'A'
                    WHEN student_score >= 70 THEN 'B'
                    WHEN student_score >= 60 THEN 'C'
                    ELSE 'D'
                  END;
    

    DBMS_OUTPUT.PUT_LINE('Nilai: ' || student_score || ', Grade: ' || grade_case);
    

    CASE grade_case
        WHEN 'A' THEN 
            DBMS_OUTPUT.PUT_LINE('Baik sekali (Nilai >= 85)');
        WHEN 'B' THEN 
            DBMS_OUTPUT.PUT_LINE('Baik (Nilai 70-84)');
        WHEN 'C' THEN 
            DBMS_OUTPUT.PUT_LINE('Cukup (Nilai 60-69)');
        WHEN 'D' THEN 
            DBMS_OUTPUT.PUT_LINE('Perlu perbaikan (Nilai < 60)');
    END CASE;
    
    DBMS_OUTPUT.PUT_LINE(' ');
    

    DBMS_OUTPUT.PUT_LINE('Metode 2: Menggunakan IF-ELSIF-ELSE');
    DBMS_OUTPUT.PUT_LINE('-----------------------------------------');
    
    IF student_score >= 85 THEN
        grade_if := 'A';
        DBMS_OUTPUT.PUT_LINE('Nilai: ' || student_score || ', Grade: A');
        DBMS_OUTPUT.PUT_LINE('Baik sekali (Nilai >= 85)');
        
    ELSIF student_score >= 70 THEN
        grade_if := 'B';
        DBMS_OUTPUT.PUT_LINE('Nilai: ' || student_score || ', Grade: B');
        DBMS_OUTPUT.PUT_LINE('Baik (Nilai 70-84)');
        
    ELSIF student_score >= 60 THEN
        grade_if := 'C';
        DBMS_OUTPUT.PUT_LINE('Nilai: ' || student_score || ', Grade: C');
        DBMS_OUTPUT.PUT_LINE('Cukup (Nilai 60-69)');
        
    ELSE
        grade_if := 'D';
        DBMS_OUTPUT.PUT_LINE('Nilai: ' || student_score || ', Grade: D');
        DBMS_OUTPUT.PUT_LINE('Perlu perbaikan (Nilai < 60)');
    END IF;
    
    DBMS_OUTPUT.PUT_LINE(' ');
    
    DBMS_OUTPUT.PUT_LINE('Verifikasi');
    DBMS_OUTPUT.PUT_LINE('-----------------------------------------');
    IF grade_case = grade_if THEN
        DBMS_OUTPUT.PUT_LINE('Kedua metode menghasilkan hasil sama: Grade ' || grade_case);
    ELSE
        DBMS_OUTPUT.PUT_LINE('Metode menghasilkan hasil berbeda');
        DBMS_OUTPUT.PUT_LINE('Metode CASE: ' || grade_case);
        DBMS_OUTPUT.PUT_LINE('Metode IF-ELSIF: ' || grade_if);
    END IF;
    
    DBMS_OUTPUT.PUT_LINE('=========================================');
    
EXCEPTION
    WHEN VALUE_ERROR THEN
        DBMS_OUTPUT.PUT_LINE('ERROR: Format input tidak valid. Masukkan nilai numerik.');
    WHEN OTHERS THEN
        DBMS_OUTPUT.PUT_LINE('ERROR: ' || SQLERRM);
END;
