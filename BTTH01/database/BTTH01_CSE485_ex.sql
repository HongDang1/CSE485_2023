-- a
SELECT ma_bviet, ten_bhat, noidung
FROM baiviet INNER JOIN theloai ON baiviet.ma_tloai=theloai.ma_tloai
WHERE ten_tloai = N'Nhạc trữ tình';

-- b
SELECT ma_bviet, tieude, ten_bhat, tomtat, noidung, ten_tgia, ngayviet
FROM baiviet INNER JOIN tacgia ON baiviet.ma_tgia=tacgia.ma_tgia
WHERE ten_tgia = N'Nhacvietplus';

-- c
SELECT * FROM theloai WHERE ma_tloai NOT IN(SELECT ma_tloai FROM baiviet WHERE ma_tloai IS NOT NULL);

-- d
SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, tacgia.ten_tgia, theloai.ten_tloai, baiviet.ngayviet 
FROM baiviet 
JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai;

-- e
SELECT theloai.ten_tloai, COUNT(*) AS so_bviet
FROM baiviet
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
GROUP BY baiviet.ma_tloai
ORDER BY so_bviet DESC
LIMIT 1;

-- f
SELECT tacgia.ten_tgia, COUNT(*) AS so_bviet
FROM baiviet
JOIN tacgia ON tacgia.ma_tgia = baiviet.ma_tgia
GROUP BY baiviet.ma_tgia
ORDER BY so_bviet DESC
LIMIT 2;
-- g
SELECT * FROM `baiviet` WHERE ten_bhat LIKE '%yêu%' OR ten_bhat LIKE '%thương%' OR ten_bhat LIKE '%anh%' OR ten_bhat LIKE '%em%' LIMIT 1;


SELECT * FROM `baiviet` WHERE ten_bhat LIKE '%yêu%' OR ten_bhat LIKE '%thương%' OR ten_bhat LIKE '%anh%' OR ten_bhat LIKE '%em%' LIMIT 1;

-- j
DELIMITER //
CREATE PROCEDURE sp_DSBaiViet(IN ten_tloai VARCHAR(50))
BEGIN
    IF NOT EXISTS(SELECT ma_tloai FROM theloai tl WHERE tl.ten_tloai = ten_tloai) THEN
        SELECT 'Thể loại không tồn tại';
    END IF;
        SELECT ma_bviet, tieude, ten_bhat, ten_tgia, ten_tloai, ngayviet 
        FROM baiviet 
        INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia 
        INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai 
        WHERE theloai.ten_tloai = ten_tloai;
END//
DELIMITER ;

-- k    
-- Thêm mới cột SLBaiViet vào trong bảng theloai
ALTER TABLE theloai ADD SLBaiViet INT DEFAULT 0;
-- Tạo TRIGGER
DROP TRIGGER IF EXISTS tg_CapNhatTheLoai_Insert;
DELIMITER $$
CREATE TRIGGER tg_CapNhatTheLoai_Insert
AFTER INSERT ON baiviet
FOR EACH ROW
BEGIN
  UPDATE theloai
  SET SLBaiViet = SLBaiViet + 1
  WHERE ma_tloai = NEW.ma_tloai;
END$$
DELIMITER ;

DROP TRIGGER IF EXISTS tg_CapNhatTheLoai_Update;
DELIMITER $$
CREATE TRIGGER tg_CapNhatTheLoai_Update
AFTER UPDATE ON baiviet
FOR EACH ROW
BEGIN
  IF NEW.ma_tloai <> OLD.ma_tloai THEN
    UPDATE theloai
    SET SLBaiViet = SLBaiViet + 1
    WHERE ma_tloai = NEW.ma_tloai;

    UPDATE theloai
    SET SLBaiViet = SLBaiViet - 1
    WHERE ma_tloai = OLD.ma_tloai;
  END IF;
END$$
DELIMITER ;

DROP TRIGGER IF EXISTS tg_CapNhatTheLoai_Delete;
DELIMITER $$
CREATE TRIGGER tg_CapNhatTheLoai_Delete
AFTER DELETE ON baiviet
FOR EACH ROW
BEGIN
  UPDATE theloai
  SET SLBaiViet = SLBaiViet - 1
  WHERE ma_tloai = OLD.ma_tloai;
END$$
DELIMITER ;

-- l
CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
)