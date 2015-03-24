// **************************** start Category ***************************************//

$("#categoryForm").on("click", function(e) {
    var $target = $(e.target),
        type = null,
        dataRequest = {},
        formData,
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
            "image": $("#categoryImage").val().split("\\").pop(),
            "text": $(e.target).parents('#inputCategory').find(".text textarea").val(),
        };

        formData = new FormData();
        formData.append('file', $("#categoryImage").get(0).files[0]);
        formData.append('folder', 'category');

        $.ajax({
            processData: false,
            cache: false,
            contentType: false,
            url: "ajax/uploadImage.php",
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
            "image": $(e.target).parents('tr').find(".image textarea").val(),
            "text": $(e.target).parents('tr').find(".text textarea").val()
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
            "image": dataRequest['image'],
            "text": dataRequest['text']
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
                if(data['data']) {

                    $(this).parents("#inputCategory").find("input").val("");
                    $(this).parents("#inputCategory").find("textarea").val("");

                    $("<tr>\n" + 
                        "<td class='id'>" + data['id'] + "</td>\n" + 
                        "<td class='title'><textarea cols=\"30\" rows=\"1\">" + data['title'] + "</textarea></td>\n" + 
                        "<td class='url'><textarea cols=\"30\" rows=\"1\">" + data['url'] + "</textarea></td>\n" + 
                        "<td class='image'><textarea cols=\"30\" rows=\"1\">" + data['image'] + "</textarea></td>\n" + 
                        "<td class='text'><textarea cols=\"30\" rows=\"1\">" + data['text'] + "</textarea></td>\n" + 
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


// **************************** start Brand ***************************************//

$("#brandForm").on("click", function(e) {

    var $target = $(e.target),
        type = null,
        dataRequest = {},
        formData,
        textOutput = $("#brandOutput");

    if($target.hasClass("btn-remove")) {
        type = 'remove';
    } else if($target.hasClass("btn-add")) {
        type = 'add';
    } else if($target.hasClass("btn-update")) {
        type = 'update';
    } else {
        return;
    }
    
    if(type == "add") {

        formData = new FormData();
        formData.append('file', $("#brandImage").get(0).files[0]);
        formData.append('folder', 'brand');

        $.ajax({
            processData: false,
            cache: false,
            contentType: false,
            url: "ajax/uploadImage.php",
            type: "POST",
            context: e.target,
            data: formData
        });

    }

    dataRequest = {
        "type": type,
        "title": $('#inputBrand').find(".title input").val() || $target.parents("tr").find(".title textarea").val(),
        "url": $('#inputBrand').find(".url input").val() || $target.parents("tr").find(".url textarea").val(),
        "image": $("#brandImage").val().split("\\").pop() || $target.parents("tr").find(".image textarea").val(),
        "id_category": $('#inputBrand').find(".id_category input").val() || $target.parents("tr").find(".id_category textarea").val(),
        "country": $('#inputBrand').find(".country input").val() || $target.parents("tr").find(".country textarea").val(),
        "text": $('#inputBrand').find(".text textarea").val() || $target.parents("tr").find(".text textarea").val()
    };

    if(type != "add") {
        dataRequest['id'] = e.target.getAttribute('data-id');
    }
    

    $.ajax({
        url: "ajax/brandData.php",
        type: "POST",
        context: e.target,
        data: dataRequest,
        success: success,
        error: error
    });

    function success(data) {

        switch(data['type']) {
            case "remove":
                $(this).parents("tr").remove();
                textOutput.get(0).innerHTML = "Бренд <b>" + data['title'] + "</b> был удалён";
            break;
            case "update":
                textOutput.get(0).innerHTML = "Данные изменены";
            break;
            case "add":
                if(data && typeof data == 'object') {

                    $("#inputBrand").find("input").val("");
                    $("#inputBrand").find("textarea").val("");

                    $("<tr>\n" + 
                        "<td class='id'>" + data['id'] + "</td>\n" + 
                        "<td class='title'><textarea cols=\"10\" rows=\"1\">" + data['title'] + "</textarea></td>\n" + 
                        "<td class='url'><textarea cols=\"12\" rows=\"1\">" + data['url'] + "</textarea></td>\n" + 
                        "<td class='image'><textarea cols=\"12\" rows=\"1\">" + data['image'] + "</textarea></td>\n" + 
                        "<td class='id_category'><textarea cols=\"12\" rows=\"1\">" + data['id_category'] + "</textarea></td>\n" + 
                        "<td class='country'><textarea cols=\"12\" rows=\"1\">" + data['country'] + "</textarea></td>\n" + 
                        "<td class='text'><textarea cols=\"17\" rows=\"1\">" + data['text'] + "</textarea></td>\n" + 
                        "<td><button class=\"btn btn-update\" type='submit' name='update_type' data-id='" + data['id'] + "'>Update</button></td>\n" + 
                        "<td><button class=\"btn btn-remove\" type='submit' name='remove_type' data-id='" + data['id'] + "'>Remove</button></td>\n" + 
                    "</tr>").appendTo(".table-brand");

                    textOutput.get(0).innerHTML = "Бренд " + data['title'] + " добавлен";
                } else {
                    textOutput.get(0).innerHTML = "Такой бренд уже существует";
                }
            break;
        }
    }

    function error() {
        textOutput.get(0).innerHTML = "Запрос не удалось выполнить!";
    }
});

// **************************** end Brand ***************************************//


// **************************** start Collection ***************************************//

$("#collectionForm").on("click", function(e) {
    var $target = $(e.target),
        type = null,
        dataRequest = {},
        formData,
        featureData = null,
        textOutput = $("#collectionOutput");

    if($target.hasClass("btn-remove")) {
        type = 'remove';
    } else if($target.hasClass("btn-add")) {
        type = 'add';
    } else if($target.hasClass("btn-update")) {
        type = 'update';
    } else {
        return;
    }
    
    if(type == "add") {

        formData = new FormData();
        formData.append('file', $("#collectionImage").get(0).files[0]);
        formData.append('folder', 'collection');

        featureData = "";

        $("#featureTable td").each(function(item) {
            debugger;
            if(item == $("#featureTable td").length - 1) {
                featureData += this.innerHTML;
            } else {
                featureData += this.innerHTML + ", ";
            }
        });


        $.ajax({
            processData: false,
            cache: false,
            contentType: false,
            url: "ajax/uploadImage.php",
            type: "POST",
            context: e.target,
            data: formData
        });

    }

    dataRequest = {
        "type": type,
        "title": $('#inputCollection').find(".title input").val() || $target.parents("tr").find(".title textarea").val(),
        "url": $('#inputCollection').find(".url input").val() || $target.parents("tr").find(".url textarea").val(),
        "image": $("#collectionImage").val().split("\\").pop() || $target.parents("tr").find(".image textarea").val(),
        "id_brand": $('#inputCollection').find(".id_brand input").val() || $target.parents("tr").find(".id_brand textarea").val(),
        "feature": featureData || $target.parents("tr").find(".feature textarea").val(),
        "text": $('#inputCollection').find(".text textarea").val() || $target.parents("tr").find(".text textarea").val()
    };

    if(type != "add") {
        dataRequest['id'] = e.target.getAttribute('data-id');
    }
    

    $.ajax({
        url: "ajax/collectionData.php",
        type: "POST",
        context: e.target,
        data: dataRequest,
        success: success,
        error: error
    });

    function success(data) {

        switch(data['type']) {
            case "remove":
                $(this).parents("tr").remove();
                textOutput.get(0).innerHTML = "Коллекция <b>" + data['title'] + "</b> была удалёна";
            break;
            case "update":
                textOutput.get(0).innerHTML = "Данные изменены";
            break;
            case "add":
                if(data && typeof data == 'object') {

                    $("#inputCollection").find("input").val("");
                    $("#inputCollection").find("textarea").val("");
                    $("#featureTable").remove();

                    $("<tr>\n" + 
                        "<td class='id'>" + data['id'] + "</td>\n" + 
                        "<td class='title'><textarea cols=\"10\" rows=\"1\">" + data['title'] + "</textarea></td>\n" + 
                        "<td class='url'><textarea cols=\"12\" rows=\"1\">" + data['url'] + "</textarea></td>\n" + 
                        "<td class='image'><textarea cols=\"12\" rows=\"1\">" + data['image'] + "</textarea></td>\n" + 
                        "<td class='id_brand'><textarea cols=\"12\" rows=\"1\">" + data['id_brand'] + "</textarea></td>\n" + 
                        "<td class='feature'><textarea cols=\"17\" rows=\"1\">" + data['feature'] + "</textarea></td>\n" + 
                        "<td class='text'><textarea cols=\"17\" rows=\"1\">" + data['text'] + "</textarea></td>\n" + 
                        "<td><span class=\"btn btn-update\" name='update_type' data-id='" + data['id'] + "'>Update</span></td>\n" + 
                        "<td><span class=\"btn btn-remove\" name='remove_type' data-id='" + data['id'] + "'>Remove</span></td>\n" + 
                    "</tr>").appendTo(".table-collection");

                    textOutput.get(0).innerHTML = "Коллекция " + data['title'] + " добавлен";
                } else {
                    textOutput.get(0).innerHTML = "Такая коллекция уже существует";
                }
            break;
        }
    }

    function error() {
        textOutput.get(0).innerHTML = "Запрос не удалось выполнить!";
    }
});

// **************************** end Collection ***************************************//

// **************************** start shipment ***************************************//

$("#shipmentForm").on("click", function(e) {

    var $target = $(e.target),
        type = null,
        dataRequest = {},
        formData,
        textOutput = $("#shipmentOutput");

    if($target.hasClass("btn-remove")) {
        type = 'remove';
    } else if($target.hasClass("btn-add")) {
        type = 'add';
    } else if($target.hasClass("btn-update")) {
        type = 'update';
    } else {
        return;
    }
    
    if(type == "add") {

        formData = new FormData();
        formData.append('file', $("#shipmentImage").get(0).files[0]);
        formData.append('folder', 'shipment');

        $.ajax({
            processData: false,
            cache: false,
            contentType: false,
            url: "ajax/uploadImage.php",
            type: "POST",
            context: e.target,
            data: formData
        });

    }

    dataRequest = {
        "type": type,
        "title": $('#inputShipment').find(".title input").val() || $target.parents("tr").find(".title textarea").val(),
        "url": $('#inputShipment').find(".url input").val() || $target.parents("tr").find(".url textarea").val(),
        "image": $("#shipmentImage").val().split("\\").pop() || $target.parents("tr").find(".image textarea").val(),
        "id_collection": $('#inputShipment').find(".id_collection input").val() || $target.parents("tr").find(".id_collection textarea").val(),
        "text": $('#inputShipment').find(".text textarea").val() || $target.parents("tr").find(".text textarea").val(),
        "feature": $('#inputShipment').find(".feature textarea").val() || $target.parents("tr").find(".feature textarea").val(),
        "news": ($('#inputShipment').find(".news input").prop("checked")) ? 1 : 0,
        "discount": ($('#inputShipment').find(".discount input").prop("checked")) ? 1 : 0
    };

    if(type != "add") {
        dataRequest['id'] = e.target.getAttribute('data-id');
        dataRequest['news'] = ($target.parents("tr").find(".news input").prop("checked")) ? 1 : 0;
        dataRequest['discount'] = ($target.parents("tr").find(".discount input").prop("checked")) ? 1 : 0;
    }
    

    $.ajax({
        url: "ajax/shipmentData.php",
        type: "POST",
        context: e.target,
        data: dataRequest,
        success: success,
        error: error
    });

    function success(data) {

        switch(data['type']) {
            case "remove":
                $(this).parents("tr").remove();
                textOutput.get(0).innerHTML = "Товар <b>" + data['title'] + "</b> был удалён";
            break;
            case "update":
                textOutput.get(0).innerHTML = "Данные изменены";
            break;
            case "add":
                if(data && typeof data == 'object') {

                    var discountChecked = "",
                        newsChecked = "";

                    $("#inputShipment").find("input").val("");
                    $("#inputShipment").find("textarea").val("");
                    $("#inputShipment").find("input:checked").attr("checked", false);

                    if(parseInt(data['news'])) {
                        newsChecked = "checked";
                    }

                    if(parseInt(data['discount'])) {
                        discountChecked = "checked";
                    }

                    $("<tr>\n" + 
                        "<td class='id'>" + data['id'] + "</td>\n" + 
                        "<td class='title'><textarea cols=\"10\" rows=\"1\">" + data['title'] + "</textarea></td>\n" + 
                        "<td class='url'><textarea cols=\"12\" rows=\"1\">" + data['url'] + "</textarea></td>\n" + 
                        "<td class='image'><textarea cols=\"12\" rows=\"1\">" + data['image'] + "</textarea></td>\n" + 
                        "<td class='id_collection'><textarea cols=\"12\" rows=\"1\">" + data['id_collection'] + "</textarea></td>\n" + 
                        "<td class='text'><textarea cols=\"17\" rows=\"1\">" + data['text'] + "</textarea></td>\n" + 
                        "<td class='feature'><textarea cols=\"17\" rows=\"1\">" + data['feature'] + "</textarea></td>\n" + 
                        "<td class='news'><input type='checkbox' " + newsChecked + " name='" + data['url'] + "' value='" + data['url'] + "'></td>\n" + 
                        "<td class='discount'><input type='checkbox' " + discountChecked + " name='" + data['url'] + "' value='" + data['url'] + "'></td>\n" + 
                        "<td><span class=\"btn btn-update\" name='update_type' data-id='" + data['id'] + "'>Update</span></td>\n" + 
                        "<td><span class=\"btn btn-remove\" name='remove_type' data-id='" + data['id'] + "'>Remove</span></td>\n" + 
                    "</tr>").appendTo(".table-shipment");

                    textOutput.get(0).innerHTML = "Товар " + data['title'] + " добавлен";
                } else {
                    textOutput.get(0).innerHTML = "Такой товар уже существует";
                }
            break;
        }
    }

    function error() {
        textOutput.get(0).innerHTML = "Запрос не удалось выполнить!";
    }
});

// **************************** end shipment ***************************************//