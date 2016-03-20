<div class="box">
    <div class="box-header with-border"><h3 class="box-title">Добавление статьи</h3></div>
    <div class="box-body">
        {{ form('/admin/ajax/savearticles', 'method': 'post', 'class': 'saveform') }}
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Сео</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="form-group">
                            <label>Наименование</label>
                            {{ articles.render('name') }}
                        </div>
                        <div class="form-group">
                            <label>Краткое описание</label>
                            {{ articles.render('summary') }}
                        </div>
                        <div class="form-group">
                            <label>Полное описание</label>
                            {{ articles.render('content') }}
                        </div>
                        <div class="form-group">
                            {{ articles.render('is_published') }} Опубликована
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_2">
                        <div class="form-group">
                            <label>Алиас</label>
                            {{ articles.render('slug') }}
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            {{ articles.render('title') }}
                        </div>
                        <div class="form-group">
                            <label>Описание</label>
                            {{ articles.render('description') }}
                        </div>
                        <div class="form-group">
                            <label>Ключевые слова</label>
                            {{ articles.render('keywords') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn btn-primary" onclick="admin.saveForm()">Сохранить</div>
        {{ end_form() }}
    </div>
</div>
<script>$('input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_flat-green',});</script>