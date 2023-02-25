/*a*/ 
SELECT tieude from baiviet WHERE ma_tloai = (SELECT ma_tloai FROM theloai WHERE ten_tloai= "Nhạc trữ tình");
/*b*/ 
SELECT tieude FROM baiviet WHERE ma_tgia = (SELECT ma_tgia FROM tacgia WHERE ten_tgia = "Nhacvietplus");
/*c*/
SELECT ten_tloai FROM theloai WHERE ma_tloai NOT IN (SELECT ma_tloai FROM baiviet);
/*d*/
SELECT ma_bviet, tieude, ten_bhat, ten_tgia, ten_tloai, ngayviet
FROM baiviet
INNER JOIN tacgia
ON tacgia.ma_tgia = baiviet.ma_tgia
INNER JOIN theloai
ON baiviet.ma_tloai = theloai.ma_tloai;
/*e*/ 
SELECT  theloai.ma_tloai,theloai.ten_tloai, COUNT(*) AS sobviet from baiviet 
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
GROUP BY baiviet.ma_tloai
ORDER BY sobviet DESC LIMIT 1;
/*f*/ 
SELECT tacgia.ma_tgia,tacgia.ten_tgia, COUNT(*) AS sobviet from baiviet 
JOIN tacgia ON baiviet.ma_tloai = tacgia.ma_tgia 
GROUP BY baiviet.ma_tgia
ORDER BY sobviet DESC LIMIT 2;
/*g*/ 
SELECT * FROM baiviet WHERE ten_bhat LIKE '%yêu%' 
OR ten_bhat LIKE '%thương%' 
OR ten_bhat LIKE '%anh%' 
OR ten_bhat LIKE '%em%';
/*i*/ 
CREATE VIEW vw_Music AS 
SELECT bv.ma_bviet, bv.tieude,bv.ten_bhat,bv.ma_tloai,bv.tomtat,bv.noidung, bv.ma_tgia, bv.ngayviet, bv.hinhanh, tl.ten_tloai, tg.ten_tgia FROM baiviet as bv 
JOIN theloai as tl ON bv.ma_tloai = tl.ma_tloai 
JOIN tacgia as tg ON bv.ma_tgia = tg.ma_tgia;
