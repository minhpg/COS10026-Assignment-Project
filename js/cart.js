cart_items = []
const updateCart = async () => {
    response = await fetch("api/cart/get.php", {
        body: 'cart_id='+cart_id,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        method: "post",
    })
    response_data = await response.json()
    cart_items = response_data.data
    return cart_items
}

const refreshCart = async () => {
    await updateCart()
    setTimeout(refreshCart, 1000);
}

// refreshCart()


// // initial call, or just call refresh directly
// setTimeout(refresh, 1000);


const serializeForm = (form) => {
	const obj = {};
	const form_data = new FormData(form)
	for (const key of form_data.keys()) {
		obj[key] = form_data.get(key)
	}
	return obj
}

const objectToUrlEncode = (object) => {
    const form_body = [];
    for (const property in object) {
        encoded_key = encodeURIComponent(property);
        encoded_value = encodeURIComponent(object[property]);
        form_body.push(encoded_key + "=" + encoded_value);
    }
    return form_body.join("&")
}

const processCart = async (form_id) => {
    response = await fetch("api/cart/add.php", {
        body: objectToUrlEncode(serializeForm(document.getElementById(form_id))),
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            //"Content-Type": "multipart/form-data"
        },
        method: "post",
    })
    await updateCart()
}   