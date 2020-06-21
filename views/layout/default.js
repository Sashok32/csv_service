$('.editTaskForm #exercise').change(function () {
    var $self = $(this);
    var oldText = $self.text();
    var updated = $self.closest('.editTaskForm').find('.updatedTask');
    if (updated.val() == 0) {
        var newText = $self.val();
        if (newText != oldText) {
            updated.val(1);
        }
    }
});

$('.clear-records').click(function () {
    if (confirm('Do you really want to delete all records?')) {
        $('.delete').val('1');
    } else {
        return false;
    }
});

if ($('.flush')) {
    setTimeout(function () {
        $('.flush').slideUp(1000, function () {
            $('.flush').remove();
        });
    }, 500)
}

$('.filter-link').click(function () {
    var $self = $(this);
    var value = $self.closest('td').find('.filter').val();
    var href = $self.attr('href') + value;
    $self.attr('href', href);
});