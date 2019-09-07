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


