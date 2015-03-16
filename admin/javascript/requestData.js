// **************************** start Category ***************************************//

$("#categoryForm").on("click", function(e) {
    var $target = $(e.target),
        type = null,
        dataRequest = {},
        textOutput = $("#categoryOutput");

    if($target.hasClass("btn-remove")) {
        type = 'remove';
    } else if($target.hasClass("btn-add")) {
        type = 'add';
    } else if($target.hasClass("btn-update")) {
        type = 'update';
    }
    if(type == "add") {
        dataRequest = {
            "type": "add",
            "title": $(e.target).parents('#inputCategory').find(".title input").val(),
            "url": $(e.target).parents('#inputCategory').find(".url input").val(),
            "image": $("#categoryImage").val().split("\\").pop()
        };

        var formData = new FormData();
        formData.append('file', $("#inputCategory").find("input:file").get(0).files[0]);

        $.ajax({
            processData: false,
            cache: false,
            contentType: false,
            url: "ajax/uploadCategoryImage.php",
            type: "POST",
            context: e.target,
            data: formData
        });

    } else {
        dataRequest = {
            "type": type,
            "id": e.target.getAttribute('data-id'),
            "title": $(e.target).parents('tr').find(".title textarea").val(),
            "url": $(e.target).parents('tr').find(".url textarea").val(),
            "image": $(e.target).parents('tr').find(".image textarea").val()
        };
    }

    if(!type) return;

    $.ajax({
        url: "ajax/categoryData.php",
        type: "POST",
        context: e.target,
        data: {
            "type": dataRequest['type'],
            "id": dataRequest['id'],
            "title": dataRequest['title'],
            "url": dataRequest['url'],
            "image": dataRequest['image']
        },
        success: success
    });

    

    function success(data) {
        switch(data.type) {
            case "remove":
                $(this).parents("tr").remove();
                textOutput.get(0).innerHTML = "Тип товара <b>" + data['title'] + "</b> был удалён";
            break;
            case "update":
                textOutput.get(0).innerHTML = "Данные изменены";
            break;
            case "add":
                if(data && typeof data == 'object') {

                    $(this).parents("#inputCategory").find("input").val("");

                    $("<tr>\n" + 
                        "<td class='id'>" + data['id'] + "</td>\n" + 
                        "<td class='title'><textarea cols=\"30\" rows=\"1\">" + data['title'] + "</textarea></td>\n" + 
                        "<td class='url'><textarea cols=\"30\" rows=\"1\">" + data['url'] + "</textarea></td>\n" + 
                        "<td class='image'><textarea cols=\"30\" rows=\"1\">" + data['image'] + "</textarea></td>\n" + 
                        "<td><button class=\"btn btn-update\" type='submit' name='update_type' data-id='" + data['id'] + "'>Update</button></td>\n" + 
                        "<td><button class=\"btn btn-remove\" type='submit' name='remove_type' data-id='" + data['id'] + "'>Remove</button></td>\n" + 
                    "</tr>").appendTo(".table-category");

                    textOutput.get(0).innerHTML = "Тип " + data['title'] + " добавлен";
                } else {
                    textOutput.get(0).innerHTML = "Такой тип уже существует";
                }
            break;
        }
    }
});

// **************************** end Category ***************************************//

$("#brandForm").on("click", function(e) {
    e.preventDefault();

    var $target = $(e.target),
        textOutput = $("#brandDescEvent");

    if($target.hasClass("btn-remove")) {
        $.ajax({
            url: "ajax/removeDataBrand.php",
            type: "POST",
            context: e.target,
            data: {
                "id": e.target.value
            },
            success: removeDataBrands
        });
    } else if($target.hasClass("btn-update")) {

        $.ajax({
            url: "ajax/updateDataBrand.php",
            type: "POST",
            data: {
                "id": e.target.value,
                "id_type": $(e.target).parents('tr').find(".id_type textarea").val(),
                "id_brand": $(e.target).parents('tr').find(".id_brand textarea").val(),
                "brand": $(e.target).parents('tr').find(".brand textarea").val(),
                "id_collection": $(e.target).parents('tr').find(".id_collection textarea").val(),
                "collection": $(e.target).parents('tr').find(".collection textarea").val(),
                "country": $(e.target).parents('tr').find(".country textarea").val(),
                "describe": $(e.target).parents('tr').find(".describe textarea").val()
            },
            success: updateDataBrand
        })
    } else if($target.hasClass("btn-add")) {

        $.ajax({
            url: "ajax/addDataBrand.php",
            type: "POST",
            context: e.target,
            data: {
                "id_type": $(e.target).parents('#inputBrandData').find(".id_type input").val(),
                "id_brand": $(e.target).parents('#inputBrandData').find(".id_brand input").val(),
                "brand": $(e.target).parents('#inputBrandData').find(".brand input").val(),
                "id_collection": $(e.target).parents('#inputBrandData').find(".id_collection input").val(),
                "collection": $(e.target).parents('#inputBrandData').find(".collection input").val(),
                "country": $(e.target).parents('#inputBrandData').find(".country input").val(),
                "describe": $(e.target).parents('#inputBrandData').find(".describe textarea").val()
            },
            success: addDataBrand
        })
    }

    function removeDataBrands(data) {
        if(data) {
            $(this).parents("tr").remove();
            textOutput.get(0).innerHTML = "Тип товара <b>" + data['brand'] + "</b> был удалён";
        }
    };

    function updateDataBrand(data) {
        if(data) {
            $("#brandDescEvent").text("Данные изменены");
        } else {
            $("#brandDescEvent").text("Данные не были изменены");
        }
    };

    function addDataBrand(data) {
        var row = $(this).parents("#inputBrandData");

        if(data && typeof data == 'object') {
            row.find("input[type='text']").val("");
            row.find("textarea").val("");
            textOutput.get(0).innerHTML = "Бренд <b>" + data['brand'] + "</b> был добавлен в таблицу";

            $("<tr>\n" + 
                "<td>" + data['id'] + "</td>\n" + 
                "<td class='id_type'><textarea cols=\"10\" rows=\"1\">" + data['id_type'] + "</textarea></td>\n" + 
                "<td class='id_brand'><textarea cols=\"12\" rows=\"1\">" + data['id_brand'] + "</textarea></td>\n" + 
                "<td class='brand'><textarea cols=\"12\" rows=\"1\">" + data['brand'] + "</textarea></td>\n" + 
                "<td class='id_collection'><textarea cols=\"12\" rows=\"1\">" + data['id_collection'] + "</textarea></td>\n" + 
                "<td class='collection'><textarea cols=\"12\" rows=\"1\">" + data['collection'] + "</textarea></td>\n" + 
                "<td class='country'><textarea cols=\"12\" rows=\"1\">" + data['country'] + "</textarea></td>\n" + 
                "<td class='describe'><textarea cols=\"17\" rows=\"1\">" + data['describe'] + "</textarea></td>\n" + 
                "<td><button class=\"btn btn-update\" type='submit' value='" + data['id'] + "'>Update</button></td>\n" + 
                "<td><button class=\"btn btn-remove\" type='submit' value='" + data['id'] + "'>Remove</button></td>\n" + 
            "</tr>").appendTo(".brand-table")
        } else {
            textOutput.text(data);
        }
    }

});

$("#shipmentForm").on("click", function(e) {

    var $target = $(e.target),
        textOutput = $("#shipmentDescEvent");

    if($target.hasClass("btn-remove")) {
        $.ajax({
            url: "ajax/removeDataShipment.php",
            type: "POST",
            context: e.target,
            data: {
                "id": e.target.getAttribute("value")
            },
            success: removeDataShipment
        });
    } else if($target.hasClass("btn-update")) {

        $.ajax({
            url: "ajax/updateDataShipment.php",
            type: "POST",
            data: {
                "id": e.target.getAttribute("value"),
                "title": $(e.target).parents('tr').find(".title textarea").val(),
                "image": $(e.target).parents('tr').find(".image textarea").val(),
                "id_brand": $(e.target).parents('tr').find(".id_brand textarea").val(),
                "id_collection": $(e.target).parents('tr').find(".id_collection textarea").val(),
                "id_shipment": $(e.target).parents('tr').find(".id_shipment textarea").val(),
                "wood": $(e.target).parents('tr').find(".wood textarea").val(),
                "describe": $(e.target).parents('tr').find(".describe textarea").val(),
                "news": ($(e.target).parents('tr').find(".news input").prop("checked") == true) ? 1 : 0,
                "discount": ($(e.target).parents('tr').find(".discount input").prop("checked")) ? 1 : 0
            },
            success: updateDataShipment
        })
    } else if($target.hasClass("btn-add")) {
        
        var formData = new FormData();
        formData.append('file', $("#inputShipmentData").find("input:file").get(0).files[0]);

        $.ajax({
            processData: false,
            cache: false,
            contentType: false,
            url: "ajax/addDataShipment.php",
            type: "POST",
            context: e.target,
            data: {
                "title": $(e.target).parents('#inputShipmentData').find(".title input").val(),
                "image": $("#shipmentImage").val().split("\\").pop(),
                "id_brand": $(e.target).parents('#inputShipmentData').find(".id_brand input").val(),
                "id_collection": $(e.target).parents('#inputShipmentData').find(".id_collection input").val(),
                "id_shipment": $(e.target).parents('#inputShipmentData').find(".id_shipment input").val(),
                "wood": $(e.target).parents('#inputShipmentData').find(".wood input").val(),
                "describe": $(e.target).parents('#inputShipmentData').find(".describe textarea").val(),
                "news": ($(e.target).parents('#inputShipmentData').find(".news input").prop("checked")) ? 1 : 0,
                "discount": ($(e.target).parents('#inputShipmentData').find(".discount input").prop("checked")) ? 1 : 0
            },
            success: addDataShipment
        });

        $.ajax({
            processData: false,
            cache: false,
            contentType: false,
            url: "ajax/uploadImage.php",
            type: "POST",
            context: e.target,
            data: formData,
            success: imgUpload
        });

    }

    function removeDataShipment(data) {
        if(data) {
            $(this).parents("tr").remove();
            textOutput.get(0).innerHTML = "Тип товара <b>" + data['title'] + "</b> был удалён";
        }
    };

    function updateDataShipment(data) {
        if(data) {
            $("#shipmentDescEvent").text("Данные изменены");
        } else {
            $("#shipmentDescEvent").text("Данные не были изменены");
        }
    };

    function addDataShipment(data) {
        var row = $(this).parents("#inputShipmentData"),
            newsChecked = "",
            discountChecked = "";

        if(data && typeof data == 'object') {

            row.find("input[type='text']").val("");
            row.find("input[type='file']").val("");
            row.find("input[type='checkbox']").prop("checked", false);
            row.find("textarea").val("");
            textOutput.get(0).innerHTML = "Товар <b>" + data['title'] + "</b> был добавлен в таблицу";
            console.log(data['news']);
            console.log(data['discount']);
            if(parseInt(data['news'])) {
                newsChecked = "checked";
            }

            if(parseInt(data['discount'])) {
                discountChecked = "checked";
            }

            $("<tr>\n" + 
                "<td>" + data['id'] + "</td>\n" + 
                "<td class='title'><textarea cols=\"17\" >" + data['title'] + "</textarea></td>\n" + 
                "<td class='image'><textarea cols=\"17\" >" + data['image'] + "</textarea></td>\n" + 
                "<td class='id_brand'><textarea cols=\"12\" >" + data['id_brand'] + "</textarea></td>\n" + 
                "<td class='id_collection'><textarea cols=\"12\" >" + data['id_collection'] + "</textarea></td>\n" + 
                "<td class='id_shipment'><textarea cols=\"12\" >" + data['id_shipment'] + "</textarea></td>\n" + 
                "<td class='wood'><textarea cols=\"12\" >" + data['wood'] + "</textarea></td>\n" + 
                "<td class='describe'><textarea cols=\"12\" >" + data['describe'] + "</textarea></td>\n" + 
                "<td class='news'><input type='checkbox' " + newsChecked + " name='" + data['id_shipment'] + "' value='" + data['id_shipment'] + "'></td>\n" + 
                "<td class='discount'><input type='checkbox' " + discountChecked + " name='" + data['id_shipment'] + "' value='" + data['id_shipment'] + "'></td>\n" + 
                "<td><div class=\"btn btn-update\" type='submit' value='" + data['id'] + "'>Update</div></td>\n" + 
                "<td><div class=\"btn btn-remove\" type='submit' value='" + data['id'] + "'>Remove</div></td>\n" + 
            "</tr>").appendTo(".shipment-table")
        } else {
            textOutput.text(data);
        }
    }
});