const qtyInput = document.getElementById("qty");
const amountInput = document.getElementById("amount");
const priceInput = document.getElementById("price");

qtyInput.addEventListener("input", calculateAmount);

function calculateAmount() {
    const price = parseFloat(priceInput.value);
    const qty = parseInt(qtyInput.value);

    if (!isNaN(price) && !isNaN(qty)) {
        const amount = price * qty;
        amountInput.value = amount;
    } else {
        amountInput.value = "";
    }
}
