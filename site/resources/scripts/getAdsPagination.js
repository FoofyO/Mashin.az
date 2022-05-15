function pagination(currentPage, totalItems) {
    let button = ''
    button += `<button onclick="getAds(${currentPage - 1})" ${currentPage == 1 ? 'disabled' : ''}>◀</button>`
    
    if((totalItems / 16) > 4) {
        if(currentPage == parseInt(totalItems / 16)) button += `<button onclick="getAds(${currentPage-2})">${currentPage-2}</button>`
        if(currentPage - 1 > 0) button += `<button onclick="getAds(${currentPage-1})">${currentPage-1}</button>`
        button += `<button class='current' onclick="getAds(${currentPage})">${currentPage}</button>`
        if(currentPage + 1 < totalItems / 16) button += `<button onclick="getAds(${currentPage+1})">${currentPage+1}</button>`
        if(currentPage + 2 < totalItems / 16) button += `<button onclick="getAds(${currentPage+2})">${currentPage+2}</button>`
    }
    else {
        for (let i = 0; i < totalItems / 16; i++) {
            button += `<button onclick="getAds(${i+1})" ${i == currentPage - 1 ? 'class="current"' : ''}>${i+1}</button>`
        }    
    }
    button += `<button onclick="getAds(${currentPage + 1})" ${currentPage > parseInt(totalItems / 16) ? 'disabled' : ''}>▶</button>`
    $('#pagination').empty();
    $('#pagination').append(button);
}

function getAds(page) {
    let code = '';
    $.get({url: `../site/api/getAdsList.php?page=${page}`, success: function(result) {
        JSON.parse(result).forEach(item => {
            code += `<form onclick="window.location.href='?page=detail&id=${item['aid']}'" class="ad">`
            $.get({url: `../site/api/getCarImage.php?aid=${item['aid']}`, async: false, success: function(image) {
                code += '<div class="image">'
                code += `<img src="../../../../Coursework/site/resources/images${JSON.parse(image)['path']}" onerror="this.src = 'https:upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png?20200912122019" />`
                code += '</div>'
            }});
            code += '<div class="information">'
            code += '<div>'
            code += `<p class="price">${item['price'].toLocaleString('ru-RU')} ${item['priceType'] == 0 ? 'AZN' : ((item['priceType'] == 1 ? 'USD' : 'EUR'))}</p>`
            code += '</div>'
            code += '<div>'
            code += `<p class="main">${item['brand']} ${item['model']}</p>`
            code += '</div>'
            code += '<div>'
            code += `<p class="main">${item['year']}, ${(item['capacity'] / 1000).toFixed(1)} L, ${(item['mileage']).toLocaleString('ru-RU')} ${item['mileageType'] == 0 ? 'km' : 'mi'}</p>`
            code += '</div>'
            code += '<div>'
            code += `<p class="datetime">${item['city']}, ${item['date']}</p>`
            code += '</div>'
            code += '</div>'
            code += '</form>'
        });
            $('#all').empty();
            $('#all').append(code)
        }});
        $.get({url: `../site/api/getTotalAdsCount.php`, success: function(count) { pagination(page, JSON.parse(count)); }});
}

$('#all').load(getAds(1));