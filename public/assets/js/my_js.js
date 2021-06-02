$(function () {

    window.livewire.on('add_product', function () {
        $('#form_add_product')[0].reset();
    });

    window.livewire.on('update_product', function () {
        $('#form_update_product')[0].reset();
    });

    window.livewire.on('add_slider', function () {
        $('#form_slider')[0].reset();
    });

});
