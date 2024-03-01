<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src=<?php echo $recursos_bs_jq ?>></script>
<script>
    $(".linkborrar").click(function () {
        var id = $(this).attr('href');
        $("#inpborrar").val(id)
    });
</script>
</body>
</html>