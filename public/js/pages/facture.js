function account() {
    for (let index = 0; index < 30; index++) {
        const element = [index];
        var account_id_value = parseInt(document.getElementById("account_id" + index).innerHTML);
        var account_id = document.getElementById("account_id" + index);
        if (account_id_value < 1000) {
            account_id.classList.remove("account");
            account_id.classList.add("account_red");
        } else {
            account_id.classList.add("account");
        }
    }
}