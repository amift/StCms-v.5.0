<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Редактирование</h3>
        <div class="box-tools pull-right">
            <!--<button type="button" class="btn btn-danger btn-sm" onclick="admin.checkConfirm('delpage','Вы точно хотите удалить эту страницу?',{id:{{id}} },function(){ location.reload() })"><i class="fa fa-close"></i> Удалить</button>-->
        </div>
    </div>
    <div class="box-body">
        {{ form('/admin/ajax/saveuser', 'method': 'post', 'class': 'saveform', 'enctype': 'multipart/form-data') }}
            {{ user.render('id') }}
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                    <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Изображения</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="form-group">
                            <label>Имя</label>
                            {{ user.render('firstname') }}
                        </div>
                        <div class="form-group">
                            <label>Фамилия</label>
                            {{ user.render('lastname') }}
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            {{ user.render('email') }}
                        </div>
                        <div class="form-group">
                            <label>Роль</label>
                            {{ user.render('role') }}
                        </div>
                        <div class="form-group">
                            {{ user.render('status') }} Статус
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
<script>admin.uploadImage('users','imagesusers[]',{{ id }})</script>