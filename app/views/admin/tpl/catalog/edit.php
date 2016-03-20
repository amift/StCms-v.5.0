<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Редактирование</h3>
        <div class="box-tools pull-right">
            {% if cat.getValue('parent_id') != 0 %}
                <button type="button" class="btn btn-primary btn-sm" onclick="admin.transport('getproducts',{ id: {{ cat.getValue('id') }} },admin.setContent)"><i class="fa fa-list"></i> Товары</button>
                <button type="button" class="btn btn-danger btn-sm" onclick="admin.checkConfirm('delcatalog','Вы точно хотите удалить этот элемент?',{id:{{id}} },function(){ location.reload() })"><i class="fa fa-close"></i> Удалить</button>
            {% endif %}
        </div>
    </div>
    <div class="box-body">
        {{ form('/admin/ajax/savecatalog', 'method': 'post', 'class': 'saveform', 'enctype': 'multipart/form-data') }}
            {{ cat.render('id') }}
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
                            {{ cat.render('name') }}
                        </div>
                        <div class="form-group">
                            <label>Краткое описание</label>
                            {{ cat.render('summary') }}
                        </div>
                        <div class="form-group">
                            <label>Полное описание</label>
                            {{ cat.render('content') }}
                        </div>
                        <div class="form-group">
                            <label>Родительская страница</label>
                            {% if cat.getValue('parent_id') != 0 %}
                                {{ cat.render('parent_id') }}
                            {% endif %}
                        </div>
                        <div class="form-group">
                            {{ cat.render('is_published') }} Опубликована
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_2">
                        <div class="form-group">
                            <label>Алиас</label>
                            {{ cat.render('slug') }}
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            {{ cat.render('title') }}
                        </div>
                        <div class="form-group">
                            <label>Описание</label>
                            {{ cat.render('description') }}
                        </div>
                        <div class="form-group">
                            <label>Ключевые слова</label>
                            {{ cat.render('keywords') }}
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
<script>admin.uploadImage('catalog','imagescatalog[]',{{ id }})</script>