<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Список страниц</h3>
            <div class="box-tools">
                <button class="btn btn-primary btn-sm" onclick="admin.transport('typeslist', {}, admin.setContent)">Типы страниц</button>
                <button class="btn btn-primary btn-sm" onclick="admin.transport('addpage', {}, admin.setContent)">Добавить страницу</button>
            </div>
        </div>
        <div class="box-body">
            {{ tree }}
        </div>
    </div>
</div>
<div class="col-md-6 col-sm-6 col-xs-12 edit_page"></div>