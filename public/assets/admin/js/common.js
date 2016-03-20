var admin = {};
function adminClass() {
    this.init = function () {};
    this.sendform = function (url, data, callback) {
        $.ajax({type: 'post', url: url, data: data, success: callback});
    };
    this.transport = function (method, data, callback) {
        $.ajax({type: 'post', url: '/admin/ajax/' + method, data: data, success: callback});
    };
    this.checkConfirm = function(method,question,data,callback){
        if(confirm(question)){admin.transport(method,data,callback);return true;}
        else{return false;}
    };
    this.delImageItemById = function(id){
        $('li[data-img-id="'+id+'"]').remove();
    };
    this.saveForm = function () {
        if ($('.saveform').length) {
            var formdata = $('.saveform').serialize();
            admin.sendform($('.saveform').attr('action'), formdata, admin.setContent);
        } else { console.log('error'); }
    };
    this.setErrors = function (errors) {
        $('.saveform .has-error').removeClass('has-error');
        for (var i = 0; i < errors.length; i++) {
            for (var item in errors[i]) {
                $('.saveform *[name="' + item + '"]').parent().addClass('has-error');
            }
        }
    };
    this.setContent = function (data) {
        var data = $.parseJSON(data);
        if (data.status) {
            if (data.results[0] == 'success') {
                $('.edit_page').html('<div class="callout callout-info"><p>Данные успешно сохранены</p></div>');
                if(data.redirect){ eval(data.redirect); }
                else { setTimeout(function () { location.reload(); }, 500); }
            } else {
                $('.edit_page').html(data.results[0]);
            }
        } else {
            admin.setErrors(data.errors);
        }
    };
    this.uploadImage = function (method, type, id) {
        var btnUpload = $('.upload-button');
        var statImg = $('.upload-block');
        new AjaxUpload(btnUpload, {action: '/admin/upload/' + method, name: type, data: {type: type, id: id}, onSubmit: function (file, ext) {}, onComplete: function (file, response) {
                statImg.find('*').remove();
                statImg.append(response);
            }});
    };
    this.formSubmit = function (form, action, callback, type) {
        type = type || 'html';
        var data = this.prepareUploadFiles();
        $.each($(form).serializeArray(), function (key, value) {
            data.append(value.name, value.value);
        });
        this.ajaxWithFiles(action, data, callback, type);
        this.removeUploadFiles();
    };
    this.init();
}
$(function () {
    admin = new adminClass();
});