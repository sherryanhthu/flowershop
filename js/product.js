// let productsHTY = [
//     {
//         code:'JKA',
//         name: 'Hoa Hướng Dương',
//         image: './img/home/hd1.jpg',
//         price_old: '22.500đ',
//         price_current: '18.500đ'
//     },
//     {
//         code:'ESP',
//         name: 'Hoa Hướng Dương',
//         image: './img/home/hd2.jpg',
//         price_old: '20.500đ',
//         price_current: '18.500đ'
//     },{
//         code:'KAA',
//         name: 'Hoa Hướng Dương',
//         image: './img/home/hd3.jpg',
//         price_old: '100.000đ',
//         price_current: '90.000đ'
//     },{
//         code:'SPS',
//         name: 'Hoa Hướng Dương',
//         image: './img/home/hd4.jpg',
//         price_old: '80.900đ',
//         price_current: '75.000đ'
//     },
// ];
// let productsRCQ = [
//     {
//         code:'ABH',
//         name: 'Hoa Cẩm Chướng',
//         image: './img/home/hcc1.jpg',
//         price_old: '22.500đ',
//         price_current: '18.500đ'
//     },
//     {
//         code:'JJJ',
//         name: 'Hoa Cẩm Chướng',
//         image: './img/home/hcc2.jpg',
//         price_old: '15.500đ',
//         price_current: '12.500đ'
//     },{
//         code:'MNJ',
//         name: 'Hoa Cẩm Chướng',
//         image: './img/home/hcc3.jpg',
//         price_old: '100.000đ',
//         price_current: '90.000đ'
//     },{
//         code:'PLA',
//         name: 'Hoa Cẩm Chướng',
//         image: './img/home/hcc4.jpg',
//         price_old: '10.800đ/100g',
//         price_current: '5.000đ'
//     },
// ];
// let productsTCHS = [
//     {
//         code:'AUU',
//         name: 'Hoa Thủy Tiên',
//         image: './img/home/thuytien1.jpg',
//         price_old: '60.000đ/kg',
//         price_current: '50.500đ'
//     },
//     {
//         code:'YXT',
//         name: 'Hoa Thủy Tiên',
//         image: './img/home/thuytien2.jpg',
//         price_old: '60.500đ',
//         price_current: '57.000đ'
//     },{
//         code:'QSS',
//         name: 'Hoa Thủy Tiên',
//         image: './img/home/thuytien3.jpg',
//         price_old: '25.000đ',
//         price_current: '21.000đ'
//     },{
//         code:'VBB',
//         name: 'Hoa Thủy Tiên',
//         image: './img/home/thuytien4.jpg',
//         price_old: '150.800đ',
//         price_current: '130.000đ'
//     },
// ];
// let productsXR = [
//     {
//         code:'AUU',
//         name: 'Thịt đùi heo',
//         image: './img/thit-dui-heo.jpeg',
//         price_old: '60.000đ/kg',
//         price_current: '50.500đ'
//     },
//     {
//         code:'YXT',
//         name: 'Vay cá hồi Trần Gia khay 500g',
//         image: './img/vay-ca-hoi.jpg',
//         price_old: '60.500đ',
//         price_current: '57.000đ'
//     },{
//         code:'QSS',
//         name: 'Hợp 6 trứng vịt tươi sạch',
//         image: './img/hop-vit.jpg',
//         price_old: '25.000đ',
//         price_current: '21.000đ'
//     },{
//         code:'VBB',
//         name: 'Đùa bò nhập khẩu đông lạnh 500g',
//         image: './img/dui-bo-nhap-khau.jpg',
//         price_old: '150.800đ',
//         price_current: '130.000đ'
//     },
// ];

// function renderUI(arr, str) {
//     let productsEle = document.querySelector(str);
//     productsEle.innerHTML = '';
//     arr.forEach(item => {
//         productsEle.innerHTML += `
        // <div class="col col-3 col-c-3">
        //     <a codeProduct="${item.code}" class="home-product-item">
        //         <div url="${item.image}" class="home-product-item__img" style="background-image: url('${item.image}');">
        //         </div>
        //         <h4 class="home-product-item__name">${item.name}</h4>
        //         <div class="home-product-item__price">
        //             <span class="home-product-item__price-old">${item.price_old}</span>
        //             <span class="home-product-item__price-current">${item.price_current}</span>
        //         </div>
        //         <div>
        //             <button class="home-product-item-button">
        //                 Chọn Mua
        //             </button>
        //         </div>
        //     </a>
        // </div>`
//     });
// }

// renderUI(productsHTY, '.product_HTY')
// renderUI(productsRCQ, '.product_RCQ')
// renderUI(productsTCHS, '.product_TCHS')

// let bProductBtn = document.getElementsByClassName('home-product-item-button')
// for (let i = 0; i < bProductBtn.length; i++) {
//     bProductBtn[i].addEventListener('click', (e) => {
//         let code = document.getElementsByClassName('home-product-item')[i].getAttribute('codeProduct')
//         let img = document.getElementsByClassName('home-product-item__img')[i].getAttribute('url')
//         let name = document.getElementsByClassName('home-product-item__name')[i].innerText
//         let price_od = document.getElementsByClassName('home-product-item__price-old')[i].innerText
//         let price_current = document.getElementsByClassName('home-product-item__price-current')[i].innerText

//         let product = {
//             code: code,
//             name: name,
//             image: img,
//             price_old: price_od,
//             price_current: price_current,
//             count: 1
//         }

//         // Tao mang products
//         let products  = JSON.parse(localStorage.getItem("products")) || []
//         let flag = true
//         // Neu san pham da co trong products thi SL san pham do tang len 1
//         for(i = 0;i < products.length; i++){
//             if(products[i].code == product.code){
//                 products[i].count += 1
//                 flag = false
//                 break;
//             }
//         }
//         // Nguoc lai thi them vao
//         if(flag == true){
//             products.push(product)
//         }
//         localStorage.setItem("products", JSON.stringify(products));
//         let divCount = document.getElementById('product-count')
//         divCount.innerText = Number(divCount.innerText) + 1
//     })
// }

