function closeWin() {
    // @grant        window.close
    var win = window.open("searchproduct ", "_self");
    win.close();
  }



  function change_theam() {
    var decider = document.getElementById('switch');

    if(decider.checked){
        document.body.style.backgroundColor = "#071E3D";
        document.body.style.color = "#FFFFFF";

        var tableback=document.getElementById('tablebackground');
        tableback.style.backgroundColor="#1f4287";
        tableback.style.color="#ffffff";

        var tableback_tableplane=document.getElementById('tableplane');
        tableback_tableplane.style.backgroundColor="#278ea5";
        tableback_tableplane.style.color="#ffffff";

        var tableback_tableplane=document.getElementById('dataTable');
        tableback_tableplane.style.backgroundColor="#160f30";
        tableback_tableplane.style.color="#ffffff";
    }else{
        document.body.style.backgroundColor = "#F1F1F1";

        document.body.style.backgroundColor = "#f6f6f6";
        document.body.style.color = "#111111";

        var tableback=document.getElementById('tablebackground');
        tableback.style.backgroundColor="#eae9e9";
        tableback.style.color="#111111";

        var tableback_tableplane=document.getElementById('tableplane');
        tableback_tableplane.style.backgroundColor="#d4d7dd";
        tableback_tableplane.style.color="#111111";

        var tableback_tableplane=document.getElementById('dataTable');
        tableback_tableplane.style.backgroundColor="#ffffff";
        tableback_tableplane.style.color="#111111";
    }

}



function groupByFirst(table) {

    // Add expand/collapse button
    function addButton(cell) {
      var button = cell.appendChild(document.createElement('button'));
      button.className = 'toggleButton';
      button.textContent = '+';
      button.setAttribute("class","catogory_table_btn");
      button.addEventListener('click', toggleHidden, false);
      return button;
    }

    // Expand/collapse all rows below this one until next header reached
    function toggleHidden(evt) {
      var row = this.parentNode.parentNode.nextSibling;

      while (row && !row.classList.contains('groupHeader')) {
        row.classList.toggle('hiddenRow');
        row = row.nextSibling;
      }
    }

    // Use tBody to avoid Safari bug (appends rows to table outside tbody)
    var tbody = table.tBodies[0];

    // Get rows as an array, exclude first row
    var rows = Array.from(tbody.rows).slice(0);

    // Group rows in object using first cell value
    var groups = rows.reduce(function(groups, row) {
      var val = row.cells[0].textContent;

      if (!groups[val]) groups[val] = [];

      groups[val].push(row);
      return groups;
    }, Object.create(null));

    // Put rows in table with extra header row for each group
    Object.keys(groups).forEach(function(value, i) {

      // Add header row
      var row = tbody.insertRow();
      row.className = 'groupHeader';
      var cell = row.appendChild(document.createElement('td'));
      cell.colSpan = groups[value][0].cells.length;
      cell.appendChild(
        document.createTextNode(
          'Grouped by ' + table.rows[0].cells[0].textContent +
          ' (' + value + ') Number of product '+ groups[value].length
        )
      );
      var button = addButton(cell);

      // Put the group's rows in tbody after header
      groups[value].forEach(function(row){tbody.appendChild(row)});

      // Call listener to collapse group
      button.click();
    });
  }



function generalItemChart(generalorder_rady,generalorder_shiped,generalorder_waiting){

    var ctx = document.getElementById('myChartmedical');
    var myChartmedical = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: ['Ready', 'Shiped', 'Waiting'],
        datasets: [{
            label: 'General order Details',
            data: [generalorder_rady,generalorder_shiped ,generalorder_waiting],
            backgroundColor: [
                'rgba(57, 153, 248, 0.68)',
                'rgba(8, 221, 8, 0.68)',
                'rgba(234, 200, 66, 0.69)'
            ],
            borderColor: [
                'rgba(57, 153, 248, 0.88)',
                'rgba(8, 221, 8, 0.88)',
                'rgba(234, 200, 66, 0.9)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});




  }

  function medicalItemChart(medical_rady,medical_shiped,medical_waiting){
    var ctx = document.getElementById('myChartgeneral');
    var myChartgeneral = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: ['Ready', 'Shiped', 'Waiting'],
        datasets: [{
            label: 'Medical Order Details',
            data: [medical_rady, medical_shiped,medical_waiting],
            backgroundColor: [
                'rgba(57, 153, 248, 0.68)',
                'rgba(8, 221, 8, 0.68)',
                'rgba(234, 200, 66, 0.68)'
            ],
            borderColor: [
                'rgba(57, 153, 248, 0.88)',
                 'rgba(8, 221, 8, 0.88)',
                'rgba(234, 200, 66, 0.9)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});




  }



 
