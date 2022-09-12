$(function(){
    
});

function updateItems(table, all = 0){
    let minLength = $('#minLength').val(), 
        maxPrice = $('#maxPrice').val(),
        minCapacity = $('#minCapacity').val(),
        minPower = $('#minPower').val();
        $.post('sale/updateItems', {'table': table, 'all': all,'minLength':minLength,'maxPrice':maxPrice,'minCapacity':minCapacity, 'minPower': minPower})
            .done((data)=>{
                let items = data;
                data = JSON.parse(items);
                updateView(data, table);
            });
}

function updateView(data, table){
    $('.item-row').remove(); 
    if(data.length == 0) {
        $('#forItems').append('<p class="item-row h3">Ничего не найдено.</p>');
        return;
    }
    let html = ''
    let i = 0;
            html += '<div class="item-row row mb-3">';
            for (let x = 0; x < data.length; x++) {
                if (i == 3) {
                    html += '</div><div class="item-row row mb-3">';
                    i = 0;
                }
                html += `
                    <div class="col mx-3 p-0 pb-2 item-tile shadow-sm border">
                        <div class="m-0 p-0 mb-3">
                            <img class="img-fluid" src="../../assets/images/`+data[x].image_path+`">
                        </div>
                        <p class="port h6 mb-0 float-left">
                            <i class="bi-geo-alt-fill h6 mr-1 mx-1"></i>`+data[x].port+`
                        </p>
                        <p class="name h5 mb-0 bold">`+data[x].name+`
                        <p class="price h6">`+formatPrice(data[x].price)+ ` €
                        <a class="clickable-cover" href="sale/item/`+table+`/`+data[x].id+`"></a>
                    </div>
                    `;
                    i++;
            }
            for ( i; i<3; i++){
                html += '<div class="col mx-3 p-0 pb-2 item-tile shadow-sm border"></div>';
            }
            html += '</div>';
       
    $('#forItems').append(html);
    
    //console.log(html)
}

function saleMode(){
    selected = $('.selected');
    $('.unselected').removeClass('unselected').addClass('selected');
    selected.removeClass('selected').addClass('unselected');

    priceController = $('.boat-params').children()[1].children;
    priceController[0].innerHTML =  'Цена от: <span class="price-max font-weight-normal">5 000 000</span> €'
    priceController[1].val = 5000000;
    priceController[1].max = 10000000;

    $('#search').attr('onclick', 'updateItems("yachts_sale")');

    updateItems('yachts_sale', 1);
}

function rentMode(){
    selected = $('.selected');
    $('.unselected').removeClass('unselected').addClass('selected');
    selected.removeClass('selected').addClass('unselected');

    priceController = $('.boat-params').children()[1].children;
    priceController[0].innerHTML =  'Цена от: <span class="price-max font-weight-normal">500</span> €/день'
    priceController[1].val = 1000;
    priceController[1].max = 1000;

    $('#search').attr('onclick', 'updateItems("yachts_rent")');

    updateItems('yachts_rent', 1);
}