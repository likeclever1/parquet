<script type="text/javascript">
    $("#featureShipmentBtn").on("click", function(e) {
        var dataRequest = {};

        $("#featureShipment").find("input").each(function() {
            if($(this).val()) dataRequest[$(this).siblings('label').text()] = $(this).val();
        });

        $.ajax({
            url: "ajax/shipmentDataFeaturesData.php",
            type: "POST",
            data: dataRequest,
            success: success
        });

        function success(data) {
            parseData = JSON.parse(data);
            $.fancybox.close();
        }
    });
</script>

<div id="featureShipment" class="popup">
    <h3>Характеристики</h3>
    <div class="row">
        <label for="type">id</label>
        <input type="text" name="id">
    </div>
    <div class="row">
        <label for="type">Тип товара:</label>
        <input type="text" name="type">
    </div>
    <div class="row">
        <label for="type">Производитель:</label>
        <input type="text" name="brand">
    </div>
    <div class="row">
        <label for="type">Коллекция:</label>
        <input type="text" name="collection">
    </div>
    <div class="row">
        <label for="type">Страна производитель:</label>
        <input type="text" name="country">
    </div>
    <div class="row">
        <label for="type">Название:</label>
        <input type="text" name="name">
    </div>
    <div class="row">
        <label for="type">Порода дерева:</label>
        <input type="text" name="wood">
    </div>
    <div class="row">
        <label for="type">Покрытие:</label>
        <input type="text" name="wood">
    </div>
    <div class="row">
        <label for="type">Покрытие:</label>
        <input type="text" name="cover">
    </div>
    <div class="row">
        <label for="type">Наличие фаски:</label>
        <input type="text" name="faska">
    </div>
    <div class="row">
        <label for="type">Тип соединения:</label>
        <input type="text" name="connection_type">
    </div>
    <div class="row">
        <label for="type">Селекция:</label>
        <input type="text" name="selection">
    </div>
    <div class="row">
        <label for="type">Поверхность:</label>
        <input type="text" name="surface">
    </div>
    <div class="row">
        <label for="type">Термообработка древесины:</label>
        <input type="text" name="curing">
    </div>
    <div class="row">
        <label for="type">Наличие полос:</label>
        <input type="text" name="strip">
    </div>
    <div class="row">
        <label for="type">Толщина верхнего слоя:</label>
        <input type="text" name="weight_top_layer">
    </div>
    <div class="row">
        <label for="type">Оттенок:</label>
        <input type="text" name="tone">
    </div>
    <div class="row">
        <label for="type">Подходит для теплого пола:</label>
        <input type="text" name="warm_floor">
    </div>
    <div class="row">
        <label for="type">Размер:</label>
        <input type="text" name="size">
    </div>
    <div class="row">
        <label for="type">м2 в упаковке:</label>
        <input type="text" name="m2_in_package">
    </div>
    <div class="row">
        <label for="type">Вес упаковки / вес 1м2:</label>
        <input type="text" name="weight_package">
    </div>
    <div class="row">
        <label for="type">Досок в упаковке:</label>
        <input type="text" name="boards_per_pack">
    </div>

    <div class="row">
        <div id="featureShipmentBtn" class="btn fl-left btn-add">Add</div>
    </div>
</div>