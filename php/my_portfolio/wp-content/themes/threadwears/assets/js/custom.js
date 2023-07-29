/**
 * Custom JS for theme elements
 */

/**
 * WooCommerce active class for category list
 */
let url     = window.location.href;
let catLink = document.querySelectorAll(".wc-block-product-categories-list li a");
catLink.forEach((item) => {
	if (item.href === url) {
		item.classList.add("active");
	}
});

// Add to cart button postioned over product image on block WooCommerce template all products.
window.addEventListener("load", () => {
	threadwearsProductButtonHeightInit();
	threadwearsProductOverlapBtnFunction();
});
window.addEventListener("resize", () => {
	threadwearsProductButtonHeightInit();
	threadwearsProductOverlapBtnFunction();
});

function threadwearsProductOverlapBtnFunction(e) {
	var blockProductImgHeight = document.querySelectorAll(".wc-block-featured-product .wc-block-featured-product__background-image, ul.products li.product img");
	var blockProductBtn       = document.querySelectorAll(".wc-block-featured-product .wc-block-featured-product__link, ul.products li .add_to_cart_button,  ul.wc-block-grid__products li .add_to_cart_button");
	blockProductImgHeight.forEach((product) => {
		let productHeight   = product.clientHeight;
		blockProductBtn.forEach((btn) => {
			let btnHeight   = btn.clientHeight;
			btn.setAttribute("style", `top: ${productHeight - btnHeight}px`);
		});
	});

	
}

function threadwearsProductButtonHeightInit() {
	setTimeout(() => {
		var blockProductImgHeight = document.querySelectorAll(" ul.wc-block-grid__products li .wc-block-grid__product-image img");
		var blockProductBtn       = document.querySelectorAll("ul.products li .add_to_cart_button, ul.wc-block-grid__products li .add_to_cart_button ");
		blockProductImgHeight.forEach((product) => {
			let productHeight   = product.clientHeight;
			blockProductBtn.forEach((btn) => {
				let btnHeight   = btn.clientHeight;
				btn.setAttribute("style", `top: ${productHeight - btnHeight}px`);
			});
		});
	}, 15000);
}

// Plus minus function added on product input counter
function threadwearsQtyChange() {
	let qtyWrap         = document.querySelectorAll('.quantity');
	qtyWrap.forEach((wrap) => {
		let qNav      = document.createElement('div');
		let qUp       = document.createElement('div');
		let qDown     = document.createElement('div');
		let input       = wrap.querySelectorAll('.qty');
		qUp.innerHTML   = '+';
		qDown.innerHTML = '-';
		qNav.appendChild(qUp);
		qNav.appendChild(qDown);
		wrap.appendChild(qNav)
		qUp.setAttribute('class', 'quantity-button quantity-up');
		qDown.setAttribute('class', 'quantity-button quantity-down');
		max             = 99999;
		let min         = '';
		input.forEach((inputItem) => {
			min         = inputItem.getAttribute('min');
			qNav.setAttribute('class', 'quantity-nav');
			let btnUp   = wrap.querySelectorAll('.quantity-up');
			btnUp.forEach((btnItem) => {
				btnItem.addEventListener('click', function() {
					let oldValue = parseFloat(inputItem.value);
					if (oldValue >= max) {
						var newVal = oldValue;
					} else {
						var newVal = oldValue + 1;
					}
					inputItem.value = newVal
					var element     = document.createEvent('HTMLEvents');
					var event       = new Event('change', {
						bubbles: true
					});
					inputItem.dispatchEvent(event);
					return event;
				})
			})
			let btnDown = wrap.querySelectorAll('.quantity-down');
			btnDown.forEach((btnItem) => {
				btnItem.addEventListener('click', function() {
					let oldValue = parseFloat(inputItem.value);
					if (oldValue >= max) {
						var newVal = oldValue;
					} else if (oldValue <= 0) {
						var newVal = 0;
					} else {
						var newVal = oldValue - 1;
					}
					inputItem.value = newVal
					var element     = document.createEvent('HTMLEvents');
					var event       = new Event('change', {
						bubbles: true
					});
					inputItem.dispatchEvent(event);
					return event;
				})
			})
		})
	})
}
threadwearsQtyChange();

function threadwearsCartUpdate() {
	let btnTrigger = document.querySelector('button[name="update_cart"]');
	if (btnTrigger !== null) {
		btnTrigger.addEventListener('click', function() {
			setTimeout(function() {
				threadwearsQtyChange();
			}, 5000);
			setTimeout(function() {
				threadwearsCartUpdate();
			}, 5000);
		});
	}
}
threadwearsCartUpdate();

// Added to cart text change when product added
let cartBtn = document.querySelectorAll('.add_to_cart_button');
if (cartBtn !== null) {
	cartBtn.forEach((item) => {
	let text = 'added to cart';
	item.addEventListener('click', function() {
			item.innerHTML = text;
		});
});}

let checkDiv = document.querySelector('.woocommerce-shipping-fields .checkbox span');
if (checkDiv !== null) {
	checkDiv.onclick = function(e) {
		this.classList.toggle('checked');
	}
}

// Sticky Mobile Icon Menu body padding bottom
let fixedMenu = document.querySelector('.wp-mobile-icon-menu');
if (fixedMenu !== null) {
	document.body.style.paddingBottom = `${fixedMenu.clientHeight}px`;
}
