<script>
$(function() {
    $('.expandChildTable').on('click', function() {
        $(this).toggleClass('selected').closest('tr').next().toggle();
    })
});
</script>