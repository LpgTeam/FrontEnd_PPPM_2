<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
        $("#cari").autocomplete({
            minLength: 0,
            source: 'penelitian/list',
            focus: function(event, ui) {
                $("#cari").val(ui.item.label);
                return false;
            },
            select: function(event, ui) {
                $("#cari").val(ui.item.label);
                // $("#namalengkap").val(ui.item.namalengkap);
                $("#nip").val(ui.item.nip);
                $("#jabatan").val(ui.item.jabatan);
                $("#progStudi").val(ui.item.progStudi);
                $("#hp").val(ui.item.hp);
                $("#email").val(ui.item.email);

                findData = true;
                // $("#results").text(ui.item.email);
                // $("#results").val(ui.item.email);
                return findData;
            }
        })

    });
</script>