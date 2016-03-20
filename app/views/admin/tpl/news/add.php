<div class="box">
    <div class="box-header with-border"><h3 class="box-title">Добавление новости</h3></div>
    <div class="box-body">
        {{ form('/admin/ajax/savenews', 'method': 'post', 'class': 'saveform') }}
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Сео</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="form-group">
                            <label>Наименование</label>
                            {{ news.render('name') }}
                        </div>
                        <div class="form-group">
                            <label>Краткое описание</label>
                            {{ news.render('summary') }}
                        </div>
                        <div class="form-group">
                            <label>Полное описание</label>
                            {{ news.render('content') }}
                        </div>
                        <div class="form-group">
                            {{ news.render('is_published') }} Опубликована
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_2">
                        <div class="form-group">
                            <label>Алиас</label>
                            {{ news.render('slug') }}
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            {{ news.render('title') }}
                        </div>
                        <div class="form-group">
                            <label>Описание</label>
                            {{ news.render('description') }}
                        </div>
                        <div class="form-group">
                            <label>Ключевые слова</label>
                            {{ news.render('keywords') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn btn-primary" onclick="admin.saveForm()">Сохранить</div>
        {{ end_form() }}
    </div>
</div>
<script>$('input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_flat-green',});</script>