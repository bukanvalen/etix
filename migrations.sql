-- Drop table apabila ingin start ulang
DROP TABLE penumpang;
DROP TABLE kereta;
DROP TABLE tiket;

-- Buat table
CREATE TABLE penumpang ( 
    id_penumpang NUMBER(10) PRIMARY KEY, 
    nama VARCHAR2(50) NOT NULL, 
    gender VARCHAR2(5) NOT NULL,
    alamat VARCHAR2(100) NOT NULL,
    poin NUMBER(10) NOT NULL
);

CREATE TABLE kereta ( 
    id_kereta NUMBER(10) PRIMARY KEY, 
    nama_kereta VARCHAR2(50) NOT NULL, 
    jam_berangkat VARCHAR2(50) NOT NULL, 
    jam_tiba VARCHAR2(50) NOT NULL, 
    dari VARCHAR2(50) NOT NULL,
    ke VARCHAR2(50) NOT NULL,
    harga NUMBER(10) NOT NULL 
);

CREATE TABLE tiket (
    id_tiket NUMBER(10) PRIMARY KEY,
    id_penumpang NUMBER(10) NOT NULL,
    id_kereta NUMBER(10) NOT NULL,
    tanggal DATE NOT NULL,
    tipe_penumpang VARCHAR2(10) NOT NULL,
    harga_total NUMBER(10) NOT NULL
);

-- Trigger untuk menambah poin penumpang setiap kali beli tiket
-- dan menguranginya apabila tiket dibatalkan (delete data)
CREATE OR REPLACE TRIGGER penumpang_tambah_poin
    AFTER
    INSERT
    OR DELETE 
    ON tiket
    FOR EACH ROW 
DECLARE 
BEGIN 
    IF INSERTING THEN
        UPDATE penumpang p
        SET p.poin = p.poin + 1
        WHERE p.id_penumpang = :new.id_penumpang;
    ELSIF DELETING THEN
        UPDATE penumpang p
        SET p.poin = p.poin - 1
        WHERE p.id_penumpang = :new.id_penumpang;
    END IF;
END;