
<script>
    $('.tool-tip').tooltip({html: true});

    function deleteItem(obj) {
        if (confirm('Are you sure you want to delete this?')) {
            $(obj).parent().submit();
        }
        return false;
    }
</script>

@yield('scripts')