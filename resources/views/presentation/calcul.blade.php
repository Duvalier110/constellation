
<script language="javascript">
    function calculer(heure)
    {
        var date1 = document.getElementById('date1').value;
        var date2 = document.getElementById('date2').value;

    var d1 = new Date(date1) ;
    var d2 = new Date(date2) ;
    var prix= parseInt(document.getElementById('prix').value);
    if(d2>=d1)
    {
    var  diffTime = Math.abs(d2 - d1);
    var differcheHours= (diffTime / (1000 * 60 * 60));
     document.getElementById('heur').value = differcheHours;
    document.getElementById('total').value = differcheHours *  prix;
    }
    if(d1>=d2)
    {
        alert("verifier les deux dates")
    }
    }
</script>
