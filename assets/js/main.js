$(document).ready(function () {

    $(".category").click(function (e) {
        let idCategory = $(this).attr('id').slice(9);
        let sort = $("#sortBox").val();

        if (history.pushState) {
            let baseUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
            let newUrl = baseUrl + '?idCategory=' + idCategory + '&sort=' + sort;
            history.pushState(null, null, newUrl);
        }

        $.get("../index.php",
            {
                ajax: true,
                categoryId: idCategory,
                sort: sort
            },
            function (data) {
                let products = JSON.parse(data);
                showProducts(products);
        });
    });

    $("#sortBox").on('change', function (e) {

        let sort = $("#sortBox").val();
        let idCategory = 0;

        if (history.pushState) {
            let baseUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
            let params = getUrlParams(window.location);

            if (params["idCategory"]) {
                idCategory = params["idCategory"];
                let newUrl = baseUrl + '?idCategory=' + idCategory + '&sort=' + sort;
                history.pushState(null, null, newUrl);
            } else {
                let newUrl = baseUrl + '?sort=' + sort;
                history.pushState(null, null, newUrl);
            }
        }

        $.get("../index.php",
            {
                ajax: true,
                categoryId: idCategory,
                sort: sort
            },
            function (data) {
                let products = JSON.parse(data);
                showProducts(products);
            });
    })
});

function getUrlParams(url = location.search){
    var regex = /[?&]([^=#]+)=([^&#]*)/g, params = {}, match;
    while(match = regex.exec(url)) {
        params[match[1]] = match[2];
    }
    return params;
}

function openInModal(el) {
    let productId = el.id.slice(4);

    $("#modal-auto").html($("#pb-" + productId).html());
    $("#modal-auto img").height($("#modal-auto img").height() + 50);
    $("#productModalLabel").text($("#modal-auto h5").text());
    $("#modal-auto h5").hide();
    $("#modal-auto div").addClass("d-inline");
    $("#modal-auto div:last").css("float", "right");
}

function showProducts(products) {
    let productsBoxHtml = '';
    products.forEach(function (product) {
        productsBoxHtml +=
            "<div class=\" col-lg-4 col-md-6 col-sm-6 col-12\">\n" +
            "        <section class=\"p-3 product mt-3\">\n" +
            "            <div id=\"pb-" + product['id'] + "\" class=\"product-body\">\n" +
            "                <img class=\"photo\" src=\"" + product['photo'] + "\" alt=\"photo\">\n" +
            "                <h5 class=\"mt-1\">" + product['name'] + "</h5>\n" +
            "                <div>\n" +
            "                    <span class=\"text-danger fw-bold\">Ціна:</span>\n" +
            "                    <span class=\"fw-bold\">" + product['price'] + "$</span>\n" +
            "                </div>\n" +
            "                <div>\n" +
            "                    <span class=\"text-primary fw-bold\">Дата:</span>\n" +
            "                    <span class=\"fw-bold\">" + product['date'] + "</span>\n" +
            "                </div>\n" +
            "            </div>\n" +
            "            <button onclick='openInModal(this)' data-bs-toggle=\"modal\" data-bs-target=\"#productModal\" id=\"btn-" + product['id'] +"\" class=\"btn btn-danger w-100 abtn\">Купити</button>\n" +
            "        </section>\n" +
            "    </div>";

    });

    $("#product-box").html(productsBoxHtml);
}