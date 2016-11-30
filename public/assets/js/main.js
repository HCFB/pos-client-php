$(".spinner").TouchSpin({
    min: 0,
    max: 100,
    step: 1,
    boostat: 5,
    maxboostedstep: 10,
    width: 40
});

$(".spinner").change(function () {
    $(".summ-number").text(getSumm());
});

function getSumm() {
    var summ=0;
    $.each($(".shop-item-price"),function (key,el) {
        summ += $(el).text() * $(el).parent().find(".shop-item-number input").val()
    });
    return summ;
}

$(document).ready(function (doc) {
    $(".summ-number").text(getSumm());
    $("#cod-phone").val(Math.floor(100000000 + Math.random() * 900000000) + 9000000000);
});

$.validate({lang : "ru"});

$("#client-info-form").on("submit", function (ev) {
    ev.preventDefault();
    var data = {};
    $(this).serializeArray().map(function(x){data[x.name] = x.value;});
    $.each(data, function (key, value) {
        if(key == "address") {
            data['code'] = $("option[value='"+value+"']").attr("data-code");
        }
    });
    var items = [];
    $.each($(".shop-item"), function (key, val) {
        var item = {
            model : "ItemModel",
            name : $(val).find(".shop-item-name").text(),
            partnerGoodCatalog : "TEST",
            price : $(val).find(".shop-item-price").text(),
            "producer" : "Someone",
            "quantity" : $(val).find(".shop-item-number input").val(),
            "weight" : 1
        };
        if(item.quantity > 0) {
            items.push(item);
        }
    });
    data["items"] = items;
    $.ajax({
        data : JSON.stringify(data),
        method : "post",
        dataTYpe : "json",
        contentType : "application/json",
        url : "/applicationCreate"
    }).done(function (res) {
        console.log(res);
        $("#client-info-form")[0].reset()
        $("#myModal").fadeOut();
        $(".modal-backdrop").fadeOut();
        window.location.href = res.bankUrl;
    }).fail(function (res) {
        console.log(res);
        alert("Произошла ошибка");
    });
});

$("#cod-client-info-form").on("submit", function (el) {
    el.preventDefault();
    if(getSumm() > 35000) { //mock limit
        alert("Сумма покупок должна быть меньше 35000");
        return;
    }
    var data = {};
    $(this).serializeArray().map(function(x){data[x.name] = x.value;});
    var items = [];
    $.each($(".shop-item"), function (key, val) {
        var item = {
            name : $(val).find(".shop-item-name").text(),
            itemPrice :
            { amount : $(val).find(".shop-item-price").text(), currency : "RUR" },
            category : "LENOVO_TEST_CATEGORY",
            quantity : $(val).find(".shop-item-number input").val(),
            weight : 10,
            seller : "lenovo_test_seller"
        };
        if(item.quantity > 0) {
            items.push(item);
        }
    });
    data["items"] = items;

    $.ajax({
        method : "post",
        url : "/offerCreate",
        data : JSON.stringify(data),
        dataTYpe : "json",
        contentType : "application/json"
    }).done(function (res) {
        console.log(res);
        if(res.rel == "REDIRECT_URL") {
            window.location.href = res.href;
        }
    });
});


function setTestData() {
    var form = $("#client-info-form");
    form.find("#name").val("Иван");
    form.find("#lastname").val("Иванов");
    form.find("#email").val("mail@mail.ru");
    form.find("#phone").val("9101231221");
    form.find("#male").prop('checked', true);
    form.find("#moscow").prop("selected", true);
}

$(".pos-sample").on("click", function (el) {
    el.preventDefault();
    setTestData();
    if($(this).attr("id").includes("base")) {
        $("#client-info-form").find("#lastname").val("Базовский");
    }
    switch ($(this).attr("id")) {
        case "error":
        case "base-error":
            $("#client-info-form").find("#middlename").val("Ошибкович");
            break;
        case "reject":
        case "base-reject":
            $("#client-info-form").find("#middlename").val("Отказович");
            break;
        case "approve":
        case "base-approve":
            $("#client-info-form").find("#middlename").val("Иванович");
            break;
        case "nmd":
        case "base-nmd":
            $("#client-info-form").find("#middlename").val("Нидмордатович");
            break;
    }
});