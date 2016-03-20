<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Редактирование товара</h3>
        <div class="box-tools">
            <button class="btn btn-primary btn-sm" onclick="admin.transport('getproducts',{id:{{ product.getValue('cat_id') }} },admin.setContent)">Назад</button>
            <button class="btn btn-danger btn-sm" onclick="admin.transport('delproducts',{id:{{ product.getValue('id') }} },admin.setContent)">Удалить</button>
        </div>
    </div>
    <div class="box-body">
        {{ form('/admin/ajax/saveproduct', 'method': 'post', 'class': 'saveform') }}
            {{ product.render('id') }}
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Сео</a></li>
                    <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Изображения</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="form-group">
                            <label>Наименование</label>
                            {{ product.render('name') }}
                        </div>
                        <div class="form-group">
                            <label>Краткое описание</label>
                            {{ product.render('summary') }}
                        </div>
                        <div class="form-group">
                            <label>Полное описание</label>
                            {{ product.render('content') }}
                        </div>
                        <div class="form-group">
                            <label>Элемент каталога</label>
                            {{ product.render('cat_id') }}
                        </div>
                        <div class="form-group">
                            <label>Текущая цена</label>
                            {{ product.render('current_price') }}
                        </div>
                        <div class="form-group">
                            <label>Старая цена</label>
                            {{ product.render('old_price') }}
                        </div>
                        <div class="form-group">
                            {{ product.render('is_published') }} Опубликована
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_2">
                        <div class="form-group">
                            <label>Алиас</label>
                            {{ product.render('slug') }}
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            {{ product.render('title') }}
                        </div>
                        <div class="form-group">
                            <label>Описание</label>
                            {{ product.render('description') }}
                        </div>
                        <div class="form-group">
                            <label>Ключевые слова</label>
                            {{ product.render('keywords') }}
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_4">
                        <div class="form-group">
                            <label>Изображения</label>
                            <div class="block upload-block">
                                {{ images }}
                            </div>
                            <div class="block upload"><div class="btn btn-primary upload-button">Загрузить</div></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn btn-primary" onclick="admin.saveForm()">Сохранить</div>
        {{ end_form() }}
    </div>
</div>
<script>$('input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_flat-green',});</script>
<script>admin.uploadImage('products','imagesproducts[]',{{ id }})</script>