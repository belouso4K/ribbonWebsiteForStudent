$(".slider-products").slick({
    slidesToShow: 4,
    responsive: [{
        breakpoint: 1024,
        settings: {
            slidesToShow: 3,
            infinite: true,
            dots: false
        }

    }, {

        breakpoint: 768,
        settings: {
            slidesToShow: 2,
            dots: false
        }

    }, {
        breakpoint: 473,
        settings: {
            slidesToShow: 1,
            dots: false
        }
        // settings: "unslick" // destroys slick

    }]

})
$(".slider").slick({
    autoplay: true,
    autoplaySpeed: 9000,
    // normal options...
    // infinite: false,

    // the magic
});

var d = document,
    itemBox = d.querySelectorAll('.product-item'), // блок каждого товара
    cartCont = d.querySelector('.basket-products');

// Получаем данные из LocalStorage
function getCartData(){
    return JSON.parse(localStorage.getItem('cart'));
}

// Записываем данные в LocalStorage
function setCartData(o){
    localStorage.setItem('cart', JSON.stringify(o));
    return false;
}

// Добавляем товар в корзину
function addToCart(e){
    // localStorage.removeItem('cart');
    this.disabled = true; // блокируем кнопку на время операции с корзиной
    var cartData = getCartData() || {}, // получаем данные корзины или создаём новый объект, если данных еще нет
        parentBox = this.parentNode, // родительский элемент кнопки "Добавить в корзину"
        itemId = this.getAttribute('data-id'), // ID товара
        itemTitle = parentBox.querySelector('h4').innerHTML, // название товара
        itemWeight = parentBox.querySelector('.product-item__elem p span').innerHTML, // название товара
        itemImg = parentBox.closest('.product-item').querySelector('.img-product img').src, // название товара
        itemPrice = parentBox.querySelector('.product-item__price .product-item__promotion .price').innerHTML, // стоимость товара
        itemPriceOld = parentBox.querySelector('.product-item__price .product-item__old .price').innerHTML; // стоимость товара
    if(cartData.hasOwnProperty(itemId)){ // если такой товар уже в корзине, то добавляем +1 к его количеству
        cartData[itemId][4] += 1;
    } else { // если товара в корзине еще нет, то добавляем в объект
        cartData[itemId] = [itemImg, itemTitle, itemPrice, itemPriceOld, 1, itemWeight];
    }
    if(!setCartData(cartData)){ // Обновляем данные в LocalStorage
        this.disabled = false; // разблокируем кнопку после обновления LS
    }
    quantity()
    return false;
}

// Устанавливаем обработчик события на каждую кнопку "Добавить в корзину"
itemBox.forEach((el) => {
    el.querySelector('.product-item__btn').addEventListener('click', addToCart)
})

// Открываем корзину со списком добавленных товаров
function openCart(e){
    var cartData = getCartData(), // вытаскиваем все данные корзины
        totalItems = '';
    // если что-то в корзине уже есть, начинаем формировать данные для вывода
    if(cartData !== null){

        for(var items in cartData){
            totalItems += '<div class="basket-products__item">';
            totalItems += '<div class="img"><img src="' + cartData[items][0] + '" alt=""></div>';
            totalItems += '<p>' + cartData[items][1] + '</p>';
            totalItems += '<div class="basket-products__control"><i onclick="minusBtn('+items+')" class="fas fa-minus"></i>' +
                '<input type="text" value="' + cartData[items][4] + '"><i onclick="plusBtn('+items+')" class="fas fa-plus"></i></div>';
            totalItems += '<div class="price-info"><div><p>' + patern(cartData[items][3]) + '</p><p>ОБЫЧНАЯ ЦЕНА</p></div>';
            totalItems += ' <div><p class="main">' + patern(cartData[items][2]) + '</p><p>ПО КАРТЕ ЛЕНТА</p></div></div>';
            totalItems += '<i onclick="deleteBtn('+items+')" class="fas fa-times"></i>';

            totalItems += '</div>';
        }

        cartCont.innerHTML = totalItems;
    } else {
        // если в корзине пусто, то сигнализируем об этом
        cartCont.innerHTML = 'В корзине пусто!';
    }
    return false;
}

/* Очистить корзину */
if(d.querySelector('.basket-del')) {
    d.querySelector('.basket-del').addEventListener('click', function(e){
        localStorage.removeItem('cart');
        cartCont.innerHTML = 'Корзина очищена.';
        calc()
        quantity()
        getIdProducts()
    })
}
window.onload = () => {
    document.querySelector('.loader').style.display = 'none'
    quantity()
    getIdProducts()
    if (cartCont) {
        openCart()
        calc()
    }


}

function minusBtn (id) {
    var cartData = getCartData()
    cartData[id][4] -= 1;
    var myArray = cartData[id][4] <= 0 ? true : false;
    if (myArray) {
        delete cartData[id]
    }
    setCartData(cartData)
    openCart()
    calc()
    quantity()
    getIdProducts()
}

function patern(int) {
    int = Number(int.substring(0, int.length - 1))
    return int.toLocaleString('ru')+ ' ₽'
}

function plusBtn (id) {
    var cartData = getCartData()
    cartData[id][4] += 1;
    setCartData(cartData)
    openCart()
    calc()
    getIdProducts()
}

function deleteBtn (id) {
    var cartData = getCartData()
    delete cartData[id]
    setCartData(cartData)
    openCart()
    calc()
    quantity()
    getIdProducts()
}

var TotalPriceHTML = document.querySelector('.total-price')
var TotalOldPriceHTML = document.querySelector('.total-old-price')
var TotalWeightHTML = document.querySelector('.weight')
function calc() {
    var cartData = getCartData()
    var TotalPrice = 0
    var oldTotalPrice = 0
    var TotalWeight = 0
    if(cartData !== null){
        for(var items in cartData){
            var price = Number(cartData[items][2].substring(0, cartData[items][2].length - 1))
            var priceOld = Number(cartData[items][3].substring(0, cartData[items][3].length - 1))
            var quantity = Number(cartData[items][4])
            var weight = Number(cartData[items][5])
            TotalPrice += price * quantity
            oldTotalPrice += priceOld * quantity
            TotalWeight += weight * quantity
        }
    }
    TotalWeight = String(TotalWeight).replace(/^\d+(?=.|$)/, function (int) {
        return int.replace(/(?=(?:\d{3})+$)(?!^)/g, "."); })
    TotalPriceHTML.innerHTML = TotalPrice.toLocaleString('ru')+ ' ₽'
    TotalOldPriceHTML.innerHTML = oldTotalPrice.toLocaleString('ru')+ ' ₽'
    TotalWeightHTML.innerHTML = TotalWeight+ ' кг'
}

function quantity() {

    var cartData = 0
    if (getCartData()) {
        var cartData = Object.keys(getCartData()).length ? Object.keys(getCartData()).length : 0
    }
    var cart_quant = document.querySelectorAll('.current-cart')
    cart_quant.forEach(el => {
        el.innerHTML = cartData
        if(document.querySelector(".order-btn") && cartData === 0) {
            document.querySelector(".order-btn").disabled = true;
        }
        return cartData;
    })

}

function getIdProducts() {
    if (getCartData()) {
        var cartData = Object.keys(getCartData()).join(",");
        if (document.querySelector('input[name="id_products"]')) {
            document.querySelector('input[name="id_products"]').value = cartData
        }

    }

}

function submitOrdres() {
    localStorage.removeItem('cart');
}

function searchSubmit(e) {
    var input = e.querySelector('input').value

    if (input !== '' && input.length > 2) {
        e.submit()
        return true;
    } else {
        return false
    }

}




