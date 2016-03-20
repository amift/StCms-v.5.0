<div class="col-md-6">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Каталог</h3>
            <div class="box-tools">
                <button class="btn btn-primary btn-sm" onclick="admin.transport('addcatalog', {}, admin.setContent)">Добавить елемент</button>
            </div>
        </div>
        <div class="box-body">
            {{ tree }}
        </div>
    </div>
</div>
<div class="col-md-6 edit_page"></div>