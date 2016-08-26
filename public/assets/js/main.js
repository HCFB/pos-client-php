$(".spinner").TouchSpin({
    min: 0,
    max: 100,
    step: 1,
    boostat: 5,
    maxboostedstep: 10,
    width: 40
});

$(".spinner").change(function (ev) {
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
        items.push(item);
    });
    data["items"] = items;
    $.ajax({
        data : JSON.stringify(data),
        method : "post",
        dataType : "json",
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