<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <button id="Btn">Oprimir</button>
    <button id="Btn2">Oprimir2</button>
    <div id="base"></div>
</body>

<script>
    var dato = <?php echo(json_encode($QuePaso));?>;
    console.log(dato)

    function invorcar2(){
        $.ajax({
            url: 'IrPanel',
            method: 'GET',
            success: function(d){
               
            },
            error : function(a,b,c){
                console.log(b)
            }
        })
    }


    function invorcar(){
        $.ajax({
            url: '/Paso1/Paso2',
            method: 'GET',
            success: function(d){
                $("#base").append("<h1>"+d+"</h1>")
               //console.log(d)
            },
            error : function(a,b,c){
                console.log(b)
            }
        })
    }

    $(document).ready(function(){
        $("#Btn").click(function(){
            invorcar()
        })

        $("#Btn2").click(function(){
            invorcar2()
        })
    })

</script>
</html>