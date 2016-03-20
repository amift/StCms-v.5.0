<div class="box">
    <div class="box-header with-border"><h3 class="box-title">Редактирование</h3></div>
    <div class="box-body">
        {{ form('/admin/ajax/savetype', 'method': 'post', 'class': 'saveform') }}
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="form-group">
                            <label>Наименование</label>
                            {{ type.render('name') }}
                        </div>
                        <div class="form-group">
                            <label>Идентификатор</label>
                            {{ type.render('ident') }}
                        </div>
                        <div class="form-group">
                            {{ type.render('status') }} Статус
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn btn-primary" onclick="admin.saveForm()">Сохранить</div>
        {{ end_form() }}
    </div>
</div>
<script>$('input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_flat-green',});</script>