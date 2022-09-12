$(function(){
    selectedIds = [];
    selectedTable = '';
});

function login(){
    let username = $('.usr').first().val();
    let password = $('.pswrd').first().val();

    $.post('admin/login',{'username': username, 'password': password }, 
        function(data){
            console.log(data)
            if(data != 'success') return 1;  

            $('.login-form').fadeOut(200);
            $('#adminPanel').fadeIn(200);
        });
}

function logout(){
    $.post('admin/logout');
    $('.login-form').fadeIn(200);
    $('#adminPanel').fadeOut(200);
    selectedIds = [];
    $('#data').html('');
    selectedTable='';
}

function query(t, q, c){
    if(c){
        $.post("admin/query", {'table' : t, 'query' : q}, (d)=>c(d));
    }else
        $.post("admin/query", {'table' : t, 'query' : q}, (d)=>console.log(d));
}

function showTable(table){
    selectedIds = [];
    $('#data').html('');
    selectedTable = table;
    query(table, '', (d)=>
        createREALTable(JSON.parse(d), $('#data'))
    );
}

function deleteRows(ids){
    query('', "DELETE FROM "+selectedTable+" WHERE id IN ("+ids+")");
    showTable(selectedTable);
}

function addRow(){
    let values = [];
    inputs = $('.offer-modal').find('input');
    for(let i = 0; i < inputs.length; i++) values.push(inputs[i].value);

    q = "INSERT INTO "+selectedTable+" VALUES(NULL, '"+values.join("','")+"')";
    console.log('executing: '+q);
    query('', q);
    showTable(selectedTable);
    hideAddModal();
}

function addBtn(){
    if(selectedTable==''){
        alert('select a table!');
        return;
    }
    addRowPrompt(selectedTable);
}

function addRowPrompt(table){
    query('', 'SHOW COLUMNS FROM '+table, function(d){
        headers = JSON.parse(d);

        modalBox = $('<div>').addClass('offer-modal bg-light rounded'); 
        console.log(headers);
        headers.forEach((field)=>{
            if(field.Field != 'id'){
                let input = $('<input>').addClass(field.Field+'-input form-control w-100')
                                        .attr({type:(field.Type.includes('int')?'number':'text'),placeholder:field.Field});
                
                let p = $('<p>').append(input);

                modalBox.append(p);     
            }           
        });

        modalBox.append($('<a>').addClass('text-primary').click(hideAddModal).text('cancel'));
        modalBox.append($('<a>').addClass('btn bg-primary text-white rounded float-end').text('ADD').click(addRow));

        $('.modal-bg').append(modalBox).fadeIn(200);
    });
    
}

function createREALTable(items, target){
    let table = $('<tabl>').addClass('table');

    let header = $('<tr>').addClass('table-header');
    
    let col = $('<th>').addClass('select-col bi-check').css({'max-width':'75px'});

    header.append(col)

    Object.keys(items[0]).forEach(colName=>{
        let col = $('<th>').addClass('').text(colName)
        header.append(col);
    });
    header.appendTo(table)

    items.forEach(rowData=>{
        if(!rowData) return;
        let row = $('<tr>').addClass('table-data');
        let col = $('<td>').addClass('select-col').css({'max-width':'75px'}).
                    append($('<input>').attr({  type:'checkbox',
                                                onchange:"selectRow("+rowData.id+")",
                                                id:"cb"+rowData.id}));
        row.append(col)
        for (cell in rowData){
            let col = $('<td>').addClass('').attr({id:rowData.id}).text(rowData[cell])
            row.append(col)
        }
        row.appendTo(table);
    });
    table.appendTo(target);
}

// =========DEPRECATED!!===========
// function createTable(items, target){
//     let header = $('<div></div>').addClass('row table-header');
    
//     let col = $('<div></div>').addClass('col select-col bi-check').css({'max-width':'75px'});

//     header.append(col)

//     Object.keys(items[0]).forEach(colName=>{
//         let col = $('<div></div>').addClass('col').text(colName)
//         header.append(col);
//     });
//     header.appendTo(target)

//     items.forEach(rowData=>{
//         if(!rowData) return;
//         let row = $('<div></div>').addClass('row table-data');
//         let col = $('<div></div>').addClass('col select-col').css({'max-width':'75px'}).
//                     append($('<input>').attr({  type:'checkbox',
//                                                 onchange:"selectRow("+rowData.id+")",
//                                                 id:"cb"+rowData.id}));
//         row.append(col)
//         for (cell in rowData){
//             let col = $('<div></div>').addClass('col').attr({id:rowData.id}).text(rowData[cell])
//             row.append(col)
//         }
//         row.appendTo(target);
//     });
// }

function selectRow(id){
    if($('#cb'+id).is(":checked")){
        selectedIds.push(id);
        return;
    }
    let i = selectedIds.indexOf(id);
    if(i > -1) selectedIds.splice(i, 1);
}

function hideAddModal(){
    $('.offer-modal').first().remove();
    $('.modal-bg').first().fadeOut(200);
}