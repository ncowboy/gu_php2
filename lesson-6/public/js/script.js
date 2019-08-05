  "use strict";
/* Cart visibility */

const cartBtn = document.querySelector('.cart-toggle');
cartBtn.addEventListener('click', () => {
  document.querySelector('.cart-content').classList.toggle('hidden');
});

/* Cart */

//Add to cart
$('.cart-button').click(function (event) {
  event.preventDefault();
  const $this = $(this);
  const $form = $this.parent().parent();
  const $add_url = $form.attr('action');
  const $get_url = '/cart/get?id=';
  const $id = $this.data('id');
  const $qty = $form.find(`input[name="cart${$id}[quantity]"]`).val();
  $.post($add_url, {
    cart: {
      product_id: $id,
      quantity: $qty,
    }
  }, function(data) {
    let json_data = JSON.parse(data);
    if(!json_data.errors){
      $.get(`${$get_url}${json_data.cart_id}`, function (data) {
        renderCart(JSON.parse(data));
      });
    }
  });
});

function renderCart(cart) {
  let html = '';
  let count = 0;
  let sum = 0;
  $('.cart-content').html(html);
  cart.forEach(el => {
    html += `
    <div class="cart-item">
        <div class="cart-item-img">
          <img src="uploads/${el.img}" alt="${el.name}">
        </div>
        <div class="cart-item-name">${el.name}</div>
        <div class="cart-item-qty">${el.quantity}</div>
        <div class="cart-item-sum">${el.quantity * el.price}</div>
      </div>
    `;
    count += +el.quantity;
    sum += +el.quantity * +el.price;
  });
  html += `
  <p class="text-center"><span class="cart-count">${count}</span> товаров на сумму <span
            class="cart-sum">${sum}</span> р. </p>
    <button class="cart-clear btn btn-danger mb-3" data-id="${cart[0].cart_id}">Очистить корзину</button>
    <a href="/checkout" class="btn btn-success mb-3">Оформить заказ</a>
  `;
  clearCart();
   $('.cart-content').html(html);
   $('.cart-count').html(count);
}

//delete cart

$('.cart-content').click(function (event) {
  if(event.target.tagName === 'BUTTON'){
    $.post('/cart/clear', {"id": event.target.dataset.id},
      function (data) {
        if(!JSON.parse(data).errors){
          clearCart();
        }
      }
    );
  }
});

function clearCart() {
  $('.cart-content').html('');
  $('.cart-count').html('');
}
