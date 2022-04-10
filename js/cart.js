//đơn hàng
var itemList={
    // Phân bón
    "pb01":{ "name":"Phân Bón Hữu Cơ BB", 
    "price":105000, 
    "photo":"img/products/PhanBon/phan_huu_co_bb.jpg"}, 
    "pb02":{ "name":"Phân Trùn", 
    "price":105000, 
    "photo":"img/products/PhanBon/phan_trun.jpg"}, 
    "pb03":{ "name":"Phân Đạm", 
    "price":105000, 
    "photo":"img/products/PhanBon/phan_dam.jpg"}, 
    "pb04":{ "name":"Phân Lân", 
    "price":105000, 
    "photo":"img/products/PhanBon/phan_lan.jpg"}, 
    // Hạt giống
    "hg01":{ "name":"Hạt cà chua bi", 
    "price":15000, 
    "photo":"img/products/HatGiong/ca_chua_bi.jpg"}, 
    "hg02":{ "name":"Hạt giống cải bẹ dún", 
    "price":23000, 
    "photo":"img/products/HatGiong/cai_be_dun.jpg"}, 
    "hg03":{ "name":"Hạt giống xà lách xoong", 
    "price":15000, 
    "photo":"img/products/HatGiong/xa_lach_xoong.jpg"},
    "hg04":{ "name":"Hạt giống xà lách xoăn", 
    "price":15000, 
    "photo":"img/products/HatGiong/xa_lach_xoan.jpg"},
    // Nông cụ
    "nc01":{ "name":"Bình Tưới Cây", 
    "price":15000, 
    "photo":"img/products/NongCu/binh_tuoi.jpg"}, 
    "nc02":{ "name":"Bình Tưới Cây DuDaCo", 
    "price":200000, 
    "photo":"img/products/NongCu/binh_tuoi2.jpg"}, 
    "nc03":{ "name":"Kéo Cắt Cành Cây", 
    "price":70000, 
    "photo":"img/products/NongCu/keo_cat_canh2.jpg"}, 
    "nc04":{ "name":"Liềm Cắt Cỏ", 
    "price":90000, 
    "photo":"img/products/NongCu/liem_cat_co.jpg"},
    //IOT
    "iot01":{ "name":"Bút đo độ cứng nước", 
    "price":45000, 
    "photo":"img/products/IOT/but_do_do_cung_nuoc.jpg"}, 
    "iot02":{ "name":"Máy đo độ mặn", 
    "price":100000, 
    "photo":"img/products/IOT/may_do_do_man.jpg"}, 
    "iot03":{ "name":"Máy đo pH", 
    "price":60000, 
    "photo":"img/products/IOT/may_do_ph.jpg"}, 
    "iot04":{ "name":"Thiết bị đuổi côn trùng", 
    "price":200000, 
    "photo":"img/products/IOT/may_duoi_con_trung.jpg"},
    };
// Thêm vào đơn hàng
function addCart(barcode){
    var number = parseInt(document.getElementById(barcode).value);
    if(number == 0) alert('Số sản phẩm tối thiểu là 1!');
    else{
        if(typeof localStorage[barcode] === "undefined"){
            if(number > 100) alert('Chỉ được đặt mỗi loại tối đa 100 sản phẩm!');
            else{
                window.localStorage.setItem(barcode, number);
                alert(`Đã đưa ${number} sản phẩm ${itemList[barcode].name} vào giỏ hàng!`);
            }
        }
        else{
            var current = parseInt(window.localStorage.getItem(barcode));
            if(number+current > 100){
                window.localStorage.setItem(barcode, 100);
                alert('Chỉ được đặt mỗi loại tối đa 100 sản phẩm!');
                alert(`Đã đưa 100 sản phẩm ${itemList[barcode].name} vào giỏ hàng!`);
            }
            else{
                window.localStorage.setItem(barcode, current+number);
                alert(`Đã đưa ${number+current} sản phẩm ${itemList[barcode].name} vào giỏ hàng!`);
            }
        }
    }
}
// Định dạng tiền tệ VND
function VNDFomat(number) {
    return new Intl.NumberFormat('vi-VI', {
        style: 'currency', currency: 'VND'
    }).format(number);
}
// Tính khuyến mãi
function getDiscountRate() {
    var today = new Date();
    var weekday = today.getDay();
    var totalMins = today.getHours() * 60 + today.getMinutes(); 
    if ( (weekday >= 1 && weekday <= 3) && ((totalMins >= 420 && totalMins <= 660) || (totalMins >= 780 && totalMins <= 1020))){
        return 0.1;
    }
    else{
        return 0;    
    }    
    
}
// Hiển thị đơn hàng
function showCart(){
    var keys = Object.keys(itemList);
    var TotalPreTax = 0;
    for (var i=0; i < localStorage.length; i++){
        var key = localStorage.key(i);
        keys.forEach(function(e){
            if(key==e){
                var item = itemList[key];
                var photo = item.photo;
                var name = item.name;
                var price = item.price;
                var orderNumber = localStorage.getItem(key);
                var tr = document.createElement("tr");   
                var td_photo = document.createElement("td");
                tr.appendChild(td_photo);   
                var td_name = document.createElement("td");
                tr.appendChild(td_name);  
                var td_number = document.createElement("td");
                tr.appendChild(td_number);
                var td_price = document.createElement("td");
                tr.appendChild(td_price); 
                var td_total = document.createElement("td");
                tr.appendChild(td_total);
                var remove = document.createElement("td");
                tr.appendChild(remove);
                document.getElementById("cartDetail").getElementsByTagName('tbody')[0].appendChild(tr);
                //Hien thi cac td cua 1 sp
                td_photo.innerHTML ="<img src='"+ photo +"'class='round-figure' width='100px'/>";
                td_name.innerHTML = name;
                td_number.innerHTML = orderNumber;
                td_price.innerHTML = VNDFomat(price);
                td_total.innerHTML = VNDFomat((price * orderNumber));
            
                remove.innerHTML=`<button class="search10" onclick='removeCart("${key}");' class='trash-btn'><i class='fa fa-trash'></i></button>`; 
                TotalPreTax = TotalPreTax + (price * orderNumber);
            }
        }); 
    }
    var A = document.getElementById('totals');
    var B = document.getElementById('discount');
    var C = document.getElementById('tax');
    var D = document.getElementById('final-totals');
    A.innerHTML = VNDFomat(TotalPreTax);
    B.innerHTML = VNDFomat(getDiscountRate() * TotalPreTax)
    C.innerHTML = VNDFomat((10*(TotalPreTax- (getDiscountRate() * TotalPreTax)))/100);
    var discountRate = getDiscountRate();
    D.innerHTML = VNDFomat(TotalPreTax - (getDiscountRate() * TotalPreTax) + (((10*(TotalPreTax- (discountRate * TotalPreTax)))/100)));
}
// Xóa sản phẩm khỏi đơn hàng
function removeCart(code) {
    if(typeof window.localStorage[code] !== "undefined"){
        window.localStorage.removeItem(code);
        document.getElementById("cartDetail").getElementsByTagName('tbody')[0].innerHTML="";
        showCart();
    } 
 }
 // Hiển thị sau khi load trang
window.onload = function () { 
    showCart();
}

//validated form

function Validated(){
    var email = document.getElementById("ck-email").value;
    var emailValidation = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if(emailValidation.test(email) ==  false){
        alert("Email không hợp lệ!");
        return false; 
    }  
    alert('Đặt hàng thành công');
    return true;
}

