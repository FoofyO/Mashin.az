$('#brand').change(function () {
    $('#model').empty();
    let code = '';
    code = `<option value='' selected disabled>Seçin:</option>`;
    if($('#brand').val() != '') {
        $.get({url: `../site/api/getModelsList.php?id=${$('#brand').val()}`, success: function(result) {
            JSON.parse(result).forEach(m => {
                code += `<option value="${m['id']}">${m['name']}</option>`;
            });
            $('#model').append(code);
        }});
    } else $('#model').append(code);
});

$('#sbrand').change(function () {
    $('#smodel').empty();
    let code = '';
    code = `<option value='' selected disabled>Model</option>`;
    if($('#sbrand').val() != '') {
        $.get({url: `../site/api/getModelsList.php?id=${$('#sbrand').val()}`, success: function(result) {
            JSON.parse(result).forEach(m => {
                code += `<option value="${m['id']}">${m['name']}</option>`;
            });
            $('#smodel').append(code);
        }});
    } else $('#smodel').append(code);
});