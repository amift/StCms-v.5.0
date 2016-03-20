<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Редактирование</h3>
        <div class="box-tools pull-right">
            {% if page.getValue('type') != "main" %}
                <button type="button" class="btn btn-danger btn-sm" onclick="admin.checkConfirm('delpage','Вы точно хотите удалить эту страницу?',{id:{{id}} },function(){ location.reload() })"><i class="fa fa-close"></i> Удалить</button>
            {% endif %}
        </div>
    </div>
    <div class="box-body">
        {{ form('/admin/ajax/savepage', 'method': 'post', 'class': 'saveform', 'enctype': 'multipart/form-data') }}
            {{ page.render('id') }}
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Сео</a></li>
                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Тип</a></li>
                    <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Изображения</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="form-group">
                            <label>Наименование</label>
                            {{ page.render('name') }}
                        </div>
                        <div class="form-group">
                            <label>Краткое описание</label>
                            {{ page.render('summary') }}
                        </div>
                        <div class="form-group">
                            <label>Полное описание</label>
                            {{ page.render('content') }}
                        </div>
                        <div class="form-group">
                            <label>Родительская страница</label>
                            {% if page.getValue('type') != "main" %}
                                {{ page.render('parent_id') }}
                            {% endif %}
                        </div>
                        <div class="form-group">
                            {{ page.render('is_published') }} Опубликована
                        </div>
                        <div class="form-group">
                            {{ page.render('is_menu') }} В меню
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_2">
                        <div class="form-group">
                            <label>Алиас</label>
                            {{ page.render('slug') }}
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            {{ page.render('title') }}
                        </div>
                        <div class="form-group">
                            <label>Описание</label>
                            {{ page.render('description') }}
                        </div>
                        <div class="form-group">
                            <label>Ключевые слова</label>
                            {{ page.render('keywords') }}
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_3">
                        <div class="form-group">
                            <label>Тип страницы</label>
                            {% if page.getValue('type') == "main" %}
                                <p>Главная страница</p>
                            {% else %}
                                {{ page.render('type') }}
                            {% endif %}
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
<script>admin.uploadImage('pages','imagespages[]',{{ id }})</script>