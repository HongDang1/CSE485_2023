SELECT ma_bviet, ten_bhat, noidung
FROM baiviet INNER JOIN theloai ON baiviet.ma_tloai=theloai.ma_tloai
WHERE ten_tloai = N'Nhạc trữ tình';
SELECT ma_bviet, tieude, ten_bhat, tomtat, noidung, ten_tgia, ngayviet
FROM baiviet INNER JOIN tacgia ON baiviet.ma_tgia=tacgia.ma_tgia
WHERE ten_tgia = N'Nhacvietplus';
SELECT ten_tloai FROM theloai WHERE ma_tloai NOT IN (SELECT ma_tloai FROM baiviet);
SELECT ma_bviet, ma_bviet, ten_bhat, ten_tgia, ten_tloai, ngayviet
FROM baiviet INNER JOIN tacgia ON baiviet.ma_tgia=tacgia.ma_tgia
INNER JOIN theloai ON theloai.ma_tloai=baiviet.ma_tloai;
SELECT ma_bviet,tieude,ten_bhat,tacgia.ten_tgia,theloai.ten_tloai,ngayviet
FROM tacgia, baiviet, theloai
WHERE tacgia.ma_tgia=baiviet.ma_tgia AND theloai.ma_tloai=baiviet.ma_tloai;
SELECT * FROM theloai WHERE ma_tloai IN (
    SELECT ma_tloai FROM (
        SELECT ma_tloai, COUNT(*) AS so_luong FROM baiviet
        GROUP BY ma_tloai
        ORDER BY so_luong DESC
        LIMIT 1) AS tb_tloai_max
);
SELECT * FROM tacgia WHERE ma_tgia IN (
    SELECT ma_tgia FROM (
        SELECT ma_tgia, COUNT(*) AS so_luong FROM baiviet
        GROUP BY ma_tgia
        ORDER BY so_luong DESC
        LIMIT 2
    ) AS tb_tgia_max
);
SELECT * FROM baiviet where ten_bhat like '%yêu%' or '%thương%' or '%anh%' or '%em%';
SELECT tieude from baiviet where ten_bhat like '%yêu%' or ten_bhat like '%thương%' or ten_bhat like '%anh%' or ten_bhat like '%em%' or tieude like '%yêu%' or tieude like '%thương%' or tieude like '%anh%' or tieude like '%em%';
CREATE VIEW vw_MUSIC AS 
SELECT tieude,ten_tloai,ten_tgia from tacgia INNER join baiviet on tacgia.ma_tgia=baiviet.ma_tgia 
           INNER join theloai on theloai.ma_tloai=baiviet.ma_tloai
