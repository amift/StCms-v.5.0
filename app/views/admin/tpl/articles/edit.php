<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Редактирование статьи</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-danger btn-sm" onclick="admin.checkConfirm('delarticles','Вы точно хотите удалить этот элемент?',{id:{{id}} },function(){ location.reload() })"><i class="fa fa-close"></i> Удалить</button>
        </div>
    </div>
    <div class="box-body">
        {{ form('/admin/ajax/savearticles', 'method': 'post', 'class': 'saveform') }}
            {{ articles.render('id') }}
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Сео</a></li>
                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Изображения</a></li>
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
                    <div class="tab-pane" id="tab_3">
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
<script>admin.uploadImage('articles','imagesarticles[]',{{ id }})</script>