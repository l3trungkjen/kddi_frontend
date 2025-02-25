function showContent(appId) {
  var selectedValue = document.getElementById("selectBox").value;
  $('#category_list').hide();
  $.ajax({
    url: `/api/kintone/get-record?app-id=${appId}&query=カテゴリ in ("${selectedValue}")`,
    type: 'GET',
    success: function(response) {
      const records = response.records;
      let tbody = $('#table_categories tbody');
      tbody.empty();

      records.forEach(record => {
        const formattedA = Number(record.Aランク.value).toLocaleString("en-US");
        const formattedB = Number(record.Bランク.value).toLocaleString("en-US");
        const formattedC = Number(record.Cランク.value).toLocaleString("en-US");
        const formattedJ = Number(record.Jランク.value).toLocaleString("en-US");
        let row = `
          <tr>
            <td>${record.機種名.value}</td>
            <td>${record.容量.value}GB</td>
            <td class="price">${formattedA} 円</td>
            <td class="price">${formattedB} 円</td>
            <td class="price">${formattedC} 円</td>
            <td class="price">${formattedJ} 円</td>
          </tr>
        `;

        tbody.append(row);
      });
      $('#category_list').show();
    },
    error: function(xhr, status, error) {
        console.error('Error:', error);
    }
  });
}
