<div class="box">
    <div class="box-header with-border"><h3 class="box-title">Добавление страницы</h3></div>
    <div class="box-body">
        {{ form('/admin/ajax/savepage', 'method': 'post', 'class': 'saveform') }}
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Сео</a></li>
                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Тип страницы</a></li>
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
                            {{ page.render('parent_id') }}
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
                            {{ page.render('type') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn btn-primary" onclick="admin.saveForm()">Сохранить</div>
        {{ end_form() }}
    </div>
</div>
<script>$('input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_flat-green',});</script>