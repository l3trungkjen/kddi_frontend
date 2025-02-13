function showContent(appId) {
  var selectedValue = document.getElementById("selectBox").value;
  console.log('selectedValue', selectedValue)
  $('#category_list').hide();
  $.ajax({
    url: `/api/kintone/get-record?app-id=${appId}&query=カテゴリ in ("${selectedValue}")`,
    type: 'GET',
    success: function(response) {
      const records = response.records;
      let tbody = $('#table_categories tbody');
      tbody.empty();

      records.forEach(record => {
        let row = `
          <tr>
            <td>${record.機種名.value}</td>
            <td>${record.容量.value}GB</td>
            <td class="price">${record.Aランク.value} 円</td>
            <td class="price">${record.Bランク.value} 円</td>
            <td class="price">${record.Cランク.value} 円</td>
            <td class="price">${record.Jランク.value} 円</td>
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
