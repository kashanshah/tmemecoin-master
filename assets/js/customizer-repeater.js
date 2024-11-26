(function ($) {
    $(document).on('click', '.add-repeater-item', function () {
        const $list = $(this).siblings('.repeater-list');
        const $template = $(`#repeater-item-template-${$list.data('setting')}`).html();
        $list.append($template);
        updateRepeaterValue($list);
    });

    $(document).on('click', '.remove-repeater-item', function () {
        const $list = $(this).closest('.repeater-list');
        $(this).closest('.repeater-item').remove();
        updateRepeaterValue($list);
    });

    $(document).on('input change', '.repeater-input', function () {
        const $list = $(this).closest('.repeater-list');
        updateRepeaterValue($list);
    });

    function updateRepeaterValue($list) {
        const settingId = $list.data('setting');
        const values = [];
        $list.find('.repeater-item').each(function () {
            const item = {};
            $(this).find('.repeater-input').each(function () {
                const key = $(this).data('key');
                const value = $(this).val();
                item[key] = value;
            });
            values.push(item);
        });
        $(`.repeater-value[data-customize-setting-link="${settingId}"]`).val(JSON.stringify(values)).trigger('change');
    }
})(jQuery);
